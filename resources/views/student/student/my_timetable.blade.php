@extends('layout.app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-md-12 text-center">
              <h1 style="font-weight: bold;">My Timetable</h1>  
            </div>
        </div> 
    </div><!-- /.container-fluid -->
    </section>
    <!-- Content Header (Page header) -->
    <section class="content">
        <div class="container-fluid">
        <div class="row">    
                <div class="col-md-12">
                    @foreach($getRecord as $value)
                        <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" style="font-weight:bold">{{$value['subject_name']}}</h4>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Week Days</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                        <th>Room Number</th>
                                    </tr>
                                </thead>    
                                <tbody>
                                    @foreach($value['week'] as $key)
                                    <tr>
                                        <td>{{$key['week_name']}}</td>
                                        <td>{{$key['start_time']}}</td>
                                        <td>{{$key['end_time']}}</td>
                                        <td>{{$key['room_number']}}</td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endforeach
    </section>

    <!-- Main content -->

    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection