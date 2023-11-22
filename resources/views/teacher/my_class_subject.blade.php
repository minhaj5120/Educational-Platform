@extends('layout.app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-md-12 text-center">
                <h1 style="font-weight: bold;">My Class And Subject</h1>
            </div>
        </div>
    </div><!-- /.container-fluid -->
    </section>
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <!-- /.col -->
                <div class="col-md-12">

                    <!-- /.card -->

                    <div class="card">
                        <div class="card-header">
                            <h3 style="font-weight: bold; text-align: Center;">My Class And Subject List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        
                                        <th>Class Name</th>
                                        <th>Subject Name</th>
                                        <th>Subject Type</th>
                                        <th>Created at</th>
                                        <th>Check Class Time</th>

                                    </tr>
                                    <tbody>
                                    @foreach($getRecord as $key)
                                    <tr>
                                        
                                        <td>{{ $key->class_name }}</td>
                                        <td>{{ $key->subject_name }}</td>
                                        <td>{{ $key->subject_type }}</td>
                                        <td>{{ $key->created_at }}</td>
                                        <td>
                                            <a href="{{url('teacher/my_class_subject/class_time/'.$key->class_id .'/'.$key->subject_id)}}" class="btn btn-primary">Class Time</a>
                                        </td>

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



