@extends('layout.app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-md-12 text-center">
                <h1 style="font-weight: bold;">Class List</h1>
            </div>
        </div>
        <div class="row mb-6">
            <div class="col-md-6">
                <form action="{{url('admin/class/search')}}" method="GET" class="form-inline">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search by name">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6 text-right">
                <a href="{{url('admin/class/add')}}" class="btn btn-primary">Add New Class</a>
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
                            <h3 style="font-weight: bold; text-align: Center;">All Classes</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Name</th>
                                        <th>Amount</th>
                                        <th>Created at</th>
                                        <th>Created by</th>
                                        <th>Status</th>
                                        <th>Action</th>

                                    </tr>
                                    <tbody>
                                    @foreach($getRecord as $key)
                                    <tr>
                                        <td>{{ $key->id }}</td>
                                        <td>{{ $key->name }}</td>
                                        <td>${{ number_format($key->amount,2 )}}</td>
                                        <td>{{ $key->created_at }}</td>
                                        <td>{{ $key->created_by_name }}</td>
                                        <td>
                                            @if($key->status==0)
                                                Active
                                            @else
                                                Inactive
                                            @endif
                                        </td>
                                        <td>
                                          <a href="{{url('admin/class/edit/'.$key->id)}}"class="btn btn-primary">Edit</a>
                                          <a href="{{url('admin/classs/delete/'.$key->id)}}"class="btn btn-danger">Delete</a>

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



