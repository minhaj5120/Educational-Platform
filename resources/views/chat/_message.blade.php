<div class="chat-header clearfix">
    @include('chat._header')
</div>
<div class="chat-history">
    @include('chat._chat_inbox')
</div>
<div class="chat-message clearfix">
    <form action="" id="submit_message" method="post" class="mb-0">
        <input type="hidden" value="{{$getReceiver->id}}" name="receiver_id">
        @csrf
        <textarea class="form-control" id="ClearMessage"name="message"></textarea>
        <div class="row">
            <div class="col-md-6">  
                <div class="col-lg-6 hidden-sm">
                    <a href="javascript:void(0);" style="margin-top:10px;" class="btn btn-outline-primary"><i class="fa fa-image"></i></a>
                </div>
            </div>
            <div class="col-md-6" style="text-align: right;">
                <button style="margin-top:10px;" class="btn btn-primary" type="submit">Send</button>
            </div>
        </div>                                    
    </form>
</div>