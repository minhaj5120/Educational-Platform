<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'number',
        'google_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    static public function getAdmin(){
        return self::select('users.*')
        ->where('category', '=',1)
        ->where('is_deleted','=',0)
        ->orderBy('id','desc')
        ->get();
    }
    static public function getTeacher(){
        return self::select('users.*')
        ->where('category', '=',3)
        ->where('is_deleted','=',0)
        ->orderBy('id','desc')
        ->get();
    }
    static public function getStudent(){
        return self::select('users.*','class.name as class_name')
        ->join('class','class.id','=','users.class_id')
        ->where('category', '=',2)
        ->where('users.is_deleted','=',0)
        ->orderBy('id','asc')
        ->paginate(50);
    }
    static public function getSingle($id){
        return self::find($id);
    }
    static public function getSingleClass($id){
        return self::select('users.*','class.amount','class.name as class_name')
        ->join('class','class.id','=','users.class_id')
        ->where('users.id','=',$id)
        ->first();
    }
    public function getProfile(){
        if(!empty($this->profile_pic) && file_exists('upload/profile/'.$this->profile_pic)){
            return(url('upload/profile/'.$this->profile_pic));
        }
        else{
            return "";
        }
    }
    static public function getTeacherStudent( $teacher_id ){
        return self::select('users.*','class.name as class_name')
        ->join('class','class.id','=','users.class_id')
        ->join('class_teacher','class_teacher.class_id','=','class.id')
        ->where('class_teacher.teacher_id','=', $teacher_id)
        ->where('category', '=',2)
        ->orderBy('id','desc')
        ->get();
    }
    static public function CollectFees(){
        // Start building the query
        $query = self::select('users.*', 'class.name as class_name', 'class.amount')
            ->join('class', 'class.id', '=', 'users.class_id')
            ->where('category', '=', 2)
            ->where('users.is_deleted', '=', 0);
    
        // Check if class_id is present in the request
        if (!empty(request()->get('class_id'))) {
            $query->where('users.class_id', '=', request()->get('class_id'));
        }
        if (!empty(request()->get('student_id'))) {
            $query->where('users.id', '=', request()->get('student_id'));
        }
        if (!empty(request()->get('first_name'))) {
            $query->where('users.name', 'like', '%' . request()->get('first_name') . '%');

        }

    
        // Continue building the query
        $result = $query->orderBy('users.name', 'asc')
            ->paginate(50);
    
        return $result;
    }
    static public function getPaidAmount($student_id,$class_id){
        return AddFeesModel::getPaidAmount( $student_id, $class_id );
    }


}
