@extends('layout.app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <!-- /.col -->
                <div class="col-md-12">

                    <!-- /.card -->

                    <div class="card">
                        <div class="card-header">
                            <h3 style="font-weight: bold; text-align: Center;">All Students</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th style="width: 100px">Profile Pic</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Roll Number</th>
                                        <th>Admission Number</th>
                                        <th>Class</th> 
                                        <th>Email</th>
                                        <th>Number</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($getRecord as $key)
                                    <tr>
                                        <td>{{ $key->id }}</td>
                                        <td>
                                            @if(!empty($key->getProfile()))
                                                <img src="{{ $key->getProfile() }}" style="height:50px;width:60px;border-radius:80px">
                                                
                                            @endif
                                        </td>
                                        <td>{{ $key->name }}</td>
                                        <td>{{ $key->last_name }}</td>
                                        <td>{{ $key->roll_number }}</td>
                                        <td>{{ $key->admission_number }}</td>
                                        <td>{{ $key->class_id }}</td> 
                                        <td>{{ $key->email }}</td>
                                        <td>{{ $key->number }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>

        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection

