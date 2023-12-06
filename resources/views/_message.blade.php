@if(!empty(Session('success')))
    <div class="alert alert-success" role="alert">
        {{session('success')}}
    </div>
@endif
@if(!empty(Session('error')))
    <div class="alert alert-danger" role="alert">
        {{session('error')}}
    </div>
@endif