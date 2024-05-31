<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="{{url('chat')}}" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
    </ul>
  </nav>

  <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #1E1E1E;">
    <!-- Brand Logo -->

    <a href="#" class="brand-link text-center">
        <span class="brand-text font-weight-bold" style="color: white;font-weight: bold;">Educational Platform</span>
    </a>

    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="info" style="color: white;">
        User Role      : 
        @if(Auth::user()->category == 1)
            Admin
        @elseif(Auth::user()->category == 2)
            Student
        @elseif(Auth::user()->category == 3)
            Teacher
        @endif
        <br>
        User Name: {{ Auth::user()->name }}
      </div>
    </div>
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

        @if(Auth::user()->category==1)
          <li class="nav-item">
            <a href="{{url('admin/admin/dashboard')}}" class="nav-link @if(Request::segment(3)=='dashboard') active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('admin/admin/list')}}" class="nav-link @if(Request::segment(2)=='admin' && Request::segment(3)=='list') active @endif">
              <i class="nav-icon fas fa-user-cog"></i>
              <p>
                Admin
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('admin/teacher/list')}}" class="nav-link @if(Request::segment(2)=='teacher') active @endif">
              <i class="nav-icon fas fa-chalkboard-teacher"></i>
              <p>
                Teacher
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('admin/student/list')}}" class="nav-link @if(Request::segment(2)=='student') active @endif">
              <i class="nav-icon fas fa-user-graduate"></i>
              <p>
                Student
              </p>
            </a>
          </li>

          <li class="nav-item @if(Request::segment(2)=='class' || Request::segment(2)=='subject' || Request::segment(2)=='assign_subject' || Request::segment(2)=='assign_class_teacher' || Request::segment(2)=='class_time') menu-is-opening menu-open @endif">
            <a href="#" class="nav-link @if(Request::segment(2)=='class' || Request::segment(2)=='subject' || Request::segment(2)=='assign_subject' || Request::segment(2)=='assign_class_teacher' || Request::segment(2)=='class_time') active @endif">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Academics
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
            <a href="{{url('admin/class/list')}}" class="nav-link @if(Request::segment(2)=='class') active @endif">
              <i class="nav-icon fas fa-chalkboard-teacher"></i>
              <p>
                Class
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('admin/subject/list')}}" class="nav-link @if(Request::segment(2)=='subject') active @endif">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Subject
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('admin/assign_subject/list')}}" class="nav-link @if(Request::segment(2)=='assign_subject') active @endif">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Assign Subject
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('admin/assign_class_teacher/list')}}" class="nav-link @if(Request::segment(2)=='assign_class_teacher') active @endif">
              <i class="nav-icon fas fa-user-circle"></i>
              <p>
                Assign Class Teacher
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('admin/class_time/list')}}" class="nav-link @if(Request::segment(2)=='class_time') active @endif">
              <i class="nav-icon fas fa-clock"></i>
              <p>
                Class Time
              </p>
            </a>
          </li>
            </ul>
          </li>
          <li class="nav-item @if(Request::segment(2)=='fees_collection') menu-is-opening menu-open @endif">
            <a href="#" class="nav-link @if(Request::segment(2)=='fees_collection') active @endif">
              <i class="nav-icon fas fa-dollar-sign"></i>
              <p>
                Fees Collection
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
            <a href="{{url('admin/fees_collection/collect_fees')}}" class="nav-link @if(Request::segment(3)=='collect_fees') active @endif">
              <i class="nav-icon fas fa-wallet"></i>
              <p>
                Collect Fees
              </p>
            </a>
            </li>
            </ul>
          </li>
          <li class="nav-item @if(Request::segment(2)=='examinations') menu-is-opening menu-open @endif">
            <a href="#" class="nav-link @if(Request::segment(2)=='examinations') active @endif">
              <i class="nav-icon fas fa-file-alt"></i>
              <p>
                Examinations
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('admin/examinations/exam/list')}}" class="nav-link @if(Request::segment(3)=='exam') active @endif">
                  <i class="nav-icon fas fa-file-alt"></i>
                  <p>
                    Exam
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{url('admin/examinations/exam_schedule')}}" class="nav-link @if(Request::segment(3)=='exam_schedule') active @endif">
                  <i class="nav-icon fas fa-clock"></i>
                  <p>
                    Exam Schedule
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/examinations/mark_register')}}" class="nav-link">
                  <i class="nav-icon fas fa-check"></i>
                  <p>
                    Marks Register 
                  </p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item @if(Request::segment(2)=='attendance') menu-is-opening menu-open @endif">
            <a href="#" class="nav-link @if(Request::segment(2)=='attendance') active @endif">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Attendance
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('admin/attendance/student')}}" class="nav-link @if(Request::segment(3)=='student') active @endif">
                  <i class="nav-icon fas fa-user-check"></i>
                  <p>
                    Student Attendance
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/attendance/report')}}" class="nav-link @if(Request::segment(3)=='report') active @endif">
                  <i class="nav-icon fas fa-clipboard-list"></i>
                  <p>
                    Attendance Report
                  </p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{url('chat')}}" class="nav-link  @if(Request::segment(2)=='my_attendance') active @endif">
              <i class="nav-icon fas fa-user-check"></i>
              <p>
                Inbox
              </p>
            </a>
          </li>
          <li class="nav-item">
                <a href="{{url('admin/settings')}}" class="nav-link">
                  <i class="nav-icon fas fa-key"></i>
                  <p>My Settings</p>
                </a>
          </li>

          <li class="nav-item">
                <a href="{{url('admin/change_password')}}" class="nav-link">
                  <i class="nav-icon fas fa-key"></i>
                  <p>Change Password</p>
                </a>
          </li>
          <li class="nav-item">
                <a href="{{url('logout')}}" class="nav-link">
                  <i class="fas fa-sign-out-alt nav-icon"></i>
                  <p>Logout</p>
                </a>
          </li>
        @elseif(Auth::user()->category==2)
          <li class="nav-item">

            <a href="{{url('student/student/dashboard')}}" class="nav-link @if(Request::segment(3)=='dashboard') active @endif">

            <a href="{{url('student/dashboard')}}" class="nav-link @if(Request::segment(3)=='dashboard') active @endif">

              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('student/my_calendar')}}" class="nav-link @if(Request::segment(2)=='my_calendar') active @endif">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                My Calendar
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('student/my_subject')}}" class="nav-link @if(Request::segment(2)=='my_subject') active @endif">
              <i class="nav-icon fas fa-book"></i>
              <p>
                My Subject
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('student/fees_collection')}}" class="nav-link @if(Request::segment(2)=='fees_collection') active @endif">
              <i class="nav-icon fas fa-dollar-sign"></i>
              <p>
                Payment
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('student/my_timetable')}}" class="nav-link @if(Request::segment(2)=='my_timetable') active @endif">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                My Timetable
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('student/my_exam_timetable')}}" class="nav-link  @if(Request::segment(2)=='my_exam_timetable') active @endif">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                My Exam Timetable
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('student/my_exam_result')}}" class="nav-link  @if(Request::segment(2)=='my_exam_result') active @endif">
              <i class="nav-icon fas fa-file-alt"></i>
              <p>
                My Exam Result
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('student/my_attendance')}}" class="nav-link  @if(Request::segment(2)=='my_attendance') active @endif">
              <i class="nav-icon fas fa-user-check"></i>
              <p>
                My Attendance
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('chat')}}" class="nav-link  @if(Request::segment(2)=='my_attendance') active @endif">
              <i class="nav-icon fas fa-user-check"></i>
              <p>
                My Inbox
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('student/my_account')}}" class="nav-link">
              <i class="nav-icon fas fa-user-circle"></i>
              <p>
                My Account
              </p>
            </a>
          </li>
          <li class="nav-item">
                <a href="{{url('student/change_password')}}" class="nav-link">
                  <i class="nav-icon fas fa-key"></i>
                  <p>Change Password</p>
                </a>
          </li>
          <li class="nav-item">
                <a href="{{url('logout')}}" class="nav-link">
                  <i class="fas fa-sign-out-alt nav-icon"></i>
                  <p>Logout</p>
                </a>
          </li>
        @elseif(Auth::user()->category==3)
          <li class="nav-item">
            <a href="{{url('teacher/dashboard')}}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('teacher/my_calendar')}}" class="nav-link">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                My Calendar
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('teacher/my_student')}}" class="nav-link">
              <i class="nav-icon far fa-user"></i>
              <p>
                My Student
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('teacher/my_class_subject')}}" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                My class and subject
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('teacher/list')}}" class="nav-link">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                My Exam timetable
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('teacher/mark_register')}}" class="nav-link">
              <i class="nav-icon fas fa-check"></i>
              <p>
                Marks Register 
              </p>
            </a>
          </li>
          <li class="nav-item @if(Request::segment(2)=='attendance') menu-is-opening menu-open @endif">
            <a href="#" class="nav-link @if(Request::segment(2)=='attendance') active @endif">
              <i class="nav-icon fas fa-user-check"></i>
              <p>
                Attendance
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('teacher/attendance/student')}}" class="nav-link @if(Request::segment(3)=='student') active @endif">
                  <i class="nav-icon fas fa-user-check"></i>
                  <p>
                    Student Attendance
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('teacher/attendance/report')}}" class="nav-link @if(Request::segment(3)=='report') active @endif">
                  <i class="nav-icon fas fa-clipboard-list"></i>
                  <p>
                    Attendance Report
                  </p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">

            <a href="{{url('teacher/my_account')}}" class="nav-link">

            <a href="{{url('teacher/list')}}" class="nav-link">
              <i class="nav-icon far fa-user"></i>
              <p>
                My notice board
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('chat')}}" class="nav-link  @if(Request::segment(2)=='my_attendance') active @endif">
              <i class="nav-icon fas fa-user-check"></i>
              <p>
                My Inbox
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('teacher/account')}}" class="nav-link">

              <i class="nav-icon fas fa-user-circle"></i>
              <p>
                My Account
              </p>
            </a>
          </li>
          <li class="nav-item">
                <a href="{{url('teacher/change_password')}}" class="nav-link">
                  <i class="nav-icon fas fa-key"></i>
                  <p>Change Password</p>
                </a>
          </li>
          <li class="nav-item">
                <a href="{{url('logout')}}" class="nav-link">
                  <i class="fas fa-sign-out-alt nav-icon"></i>
                  <p>Logout</p>
                </a>
          </li>


        @endif



        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

    