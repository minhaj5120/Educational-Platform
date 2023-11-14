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
              <i class="nav-icon far fa-user"></i>
              <p>
                Class
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('admin/class/list')}}" class="nav-link">
              <i class="nav-icon far fa-user"></i>
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

@endsection



