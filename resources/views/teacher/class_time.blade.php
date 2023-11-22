@extends('layout.app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-md-12 text-center">
                <h1 style="font-weight: bold;">Class Time</h1>
            </div>
        </div>
    </div><!-- /.container-fluid -->
    </section>
    <!-- Content Header (Page header) -->
                        <div class="card-header">
                            <h3 style="font-weight: bold; text-align: left;">{{$getClass->name}} - {{$getSubject->name}}</h3>
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
                                <tbody>
                                    @foreach($getRecord as $key)
                                    <tr>

                                        <td>{{ $key['week_name'] }}</td>
                                        <td>{{!empty( $key['start_time']) ? date('h:i A',strtotime($key['start_time'])) :'' }}</td>
                                        <td>{{!empty( $key['end_time']) ? date('h:i A',strtotime($key['end_time'])) :'' }}</td>
                                        <td>{{ $key['room_number'] }}</td>
                                            
                                        
                                    </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>

    <!-- Main content -->

    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
