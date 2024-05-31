@foreach($getChat as $value)
    @if($value->sender_id == Auth::user()->id)
        <li class="clearfix">
            <div class="message-data text-right">
                <img src="{{ $value->getSender->getProfile()}}" alt="avatar">
                <span class="message-data-time">{{Carbon\Carbon::parse($value->created_at)->diffForHumans()}}</span>
                                
            </div>
            <div class="message other-message float-right">{!! $value->message !!} </div>
        </li>
    @else
        <li class="clearfix">
            <div class="message-data">
                <img src="{{ $value->getReceiver->getProfile()}}" alt="avatar">
                <span class="message-data-time">{{Carbon\Carbon::parse($value->created_at)->diffForHumans()}}</span>
                                
            </div>
            <div class="message my-message">{!! $value->message !!}</div>                                    
        </li>   
    @endif
@endforeach  