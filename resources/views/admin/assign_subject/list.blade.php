@extends('layout.app')
@section('content')
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

    
          <li class="nav-item">
            <a href="{{url('admin/admin/dashboard')}}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('admin/admin/list')}}" class="nav-link">
              <i class="nav-icon far fa-user"></i>
              <p>
                Admin
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('admin/class/list')}}" class="nav-link">
             <i class="fas fa-graduation-cap"></i>
              <p>
                Class
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('admin/subject/list')}}" class="nav-link">
             <i class="fas fa-graduation-cap"></i>
              <p>
                Subject
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('admin/assign_subject/list')}}" class="nav-link">
             <i class="fas fa-graduation-cap"></i>
              <p>
                Assign Subject
              </p>
            </a>
          </li>
          <li class="nav-item">
                <a href="{{url('logout')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Logout</p>
                </a>
          </li>


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
    <!-- Sidebar -->
    <!-- ... (unchanged) ... -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 style="font-weight: bold; text-align: left;">Assign Subject List</h1>
                </div>
                <div class="col-sm-6" style="text-align:right;">
                    <form action="{{url('admin/subject/search')}}" method="GET" class="form-inline">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search by name">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                    </form>
                    <a href="{{url('admin/assign_subject/add')}}" class="btn btn-primary">Add New Subject</a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <!-- /.col -->
                <div class="col-md-12">

                    <!-- /.card -->

                    <div class="card">
                        <div class="card-header">
                            <h3 style="font-weight: bold; text-align: Center;">All Class And Subjects</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Class Name</th>
                                        <th>Subject Name</th>
                                        <th>Created at</th>
                                        <th>Created by</th>
                                        <th>Status</th>
                                        <th>Action</th>

                                    </tr>
                                    <tbody>
                                    @foreach($getRecord as $key)
                                    <tr>
                                        <td>{{ $key->id }}</td>
                                        <td>{{ $key->class_name }}</td>
                                        <td>{{ $key->subject_name }}</td>
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
                                          <a href="{{url('admin/assign_subject/edit/'.$key->id)}}"class="btn btn-primary">Edit</a>
                                          <a href="{{url('admin/assign_subject/delete/'.$key->id)}}"class="btn btn-danger">Delete</a>

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



