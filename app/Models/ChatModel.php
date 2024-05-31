<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class ChatModel extends Model
{
    use HasFactory;
    protected $table = "chat";
    static public function getChat($receiver_id,$sender_id)
    {
        $query=self::select('chat.*')
            ->where(function($q) use ($receiver_id,$sender_id){
              $q->where(function($q) use ($receiver_id,$sender_id){
                $q->where('receiver_id',$sender_id)
                    ->where('sender_id',$receiver_id)
                    ->where('status','>','-1');
                })->orWhere(function($q) use ($receiver_id,$sender_id){
                    $q->where('receiver_id',$receiver_id)
                        ->where('sender_id',$sender_id);
                });
              })
              ->where('message','!=','')
              ->orderBy('id','asc')
              ->get();
        return $query;

    }
    public function getSender()
    {
        return $this ->belongsTo(User::class,'sender_id');
    }
    public function getReceiver()
    {
        return $this ->belongsTo(User::class,'sender_id');
    }
    public function getConnectUser()
    {
        return $this ->belongsTo(User::class,'connect_user_id');
    }

    static public function getChatUser($user_id)
    {
        $getUserchat = self::select('chat.*', DB::raw('(CASE WHEN chat.sender_id = "'.$user_id.'" THEN chat.receiver_id ELSE chat.sender_id END) AS connect_user_id'))
            ->join('users as sender', 'sender.id', '=', 'chat.sender_id')
            ->join('users as receiver', 'receiver.id', '=', 'chat.receiver_id');

        if(!empty(Request::get('search')))
        {
            $search=Request::get('search');
            $getUserchat=$getUserchat->where(function($query) use ($search){
                $query->where('sender.name','like','%'.$search.'%')
                ->orWhere('receiver.name','like','%'.$search.'%');
            });
        }

        $getUserchat =$getUserchat->whereIn('chat.id', function($query) use ($user_id) {
                $query->selectRaw('max(chat.id)')
                    ->from('chat')
                    ->where('chat.status', '<', 2)
                    ->where(function($query) use ($user_id) {
                        $query->where('chat.sender_id', '=', $user_id)
                            ->orWhere(function($query) use ($user_id) {
                                $query->where('chat.receiver_id', '=', $user_id)
                                    ->where('chat.status', '<', 2);
                            });
                    })
                    ->groupBy(DB::raw('CASE WHEN chat.sender_id = "'.$user_id.'" THEN chat.receiver_id ELSE chat.sender_id END'));
            })
            ->orderBy('chat.id', 'desc')
            ->get();

            $result=array();

            foreach ($getUserchat as $value)
            {
                $data=array();
                $data['id']=$value->id;
                $data['message']=$value->message;
                $data['created_at']=$value->created_at;
                $data['user_id']=$value->connect_user_id;
                $data['is_online']=$value->getConnectUser->OnlineUser();
                $data['name']=$value->getConnectUser->name.''.$value->getConnectUser->last_name;
                $data['profile_pic']=$value->getConnectUser->getProfile();
                $data['message_count']=$value->CountMessage($value->connect_user_id,$user_id);
                $result[]=$data;
            }

            return $result;

    }
    static public function CountMessage($connect_user_id,$user_id)
    {
        return self::where('sender_id','=',$connect_user_id)
            ->where ('receiver_id','=',$user_id)
            ->where('chat.status', '=', 0)
            ->count();
    }

    static public function UpdateCount($sender_id,$receiver_id)
    {
        self::where('sender_id',$receiver_id)
            ->where('receiver_id',$sender_id)
            ->where('chat.status', '=', 0)
            ->update(['status' =>1]);
    }
    
}