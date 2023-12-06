<!-- Navbar -->

  <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->

    <a href="#" class="brand-link text-center">
        <span class="brand-text font-weight-bold">Educational Platform</span>
    </a>

    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="info"style="color: white; font-weight: bold;">
          {{ Auth::user()->name }}
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
              <i class="nav-icon far fa-user"></i>
              <p>
                Admin
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('admin/teacher/list')}}" class="nav-link @if(Request::segment(2)=='teacher') active @endif">
              <i class="nav-icon far fa-user"></i>
              <p>
                Teacher
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('admin/student/list')}}" class="nav-link @if(Request::segment(2)=='student') active @endif">
              <i class="nav-icon far fa-user"></i>
              <p>
                Student
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('admin/payment/list')}}" class="nav-link @if(Request::segment(2)=='payment') active @endif">
              <i class="nav-icon far fa-user"></i>
              <p>
                Payment
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
              <i class="nav-icon far fa-user"></i>
              <p>
                Class
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('admin/subject/list')}}" class="nav-link @if(Request::segment(2)=='subject') active @endif">
              <i class="nav-icon far fa-user"></i>
              <p>
                Subject
              </p>
            </a>
          </li>

          <li class="nav-item @if(Request::segment(2)=='examinations') menu-is-opening menu-open @endif">
            <a href="#" class="nav-link @if(Request::segment(2)=='examinations') active @endif">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Examinations
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('admin/examinations/exam/list')}}" class="nav-link @if(Request::segment(3)=='exam') active @endif">
                  <i class="nav-icon far fa-user"></i>
                  <p>
                    Exam
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{url('admin/examinations/exam_schedule')}}" class="nav-link @if(Request::segment(3)=='exam_schedule') active @endif">
                  <i class="nav-icon far fa-user"></i>
                  <p>
                    Exam Schedule
                  </p>
                </a>
              </li>
          
          <li class="nav-item">
            <a href="{{url('admin/assign_subject/list')}}" class="nav-link @if(Request::segment(2)=='assign_subject') active @endif">
             <i class="fas fa-graduation-cap"></i>
              <p>
                Assign Subject
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('admin/assign_class_teacher/list')}}" class="nav-link @if(Request::segment(2)=='assign_class_teacher') active @endif">
             <i class="fas fa-graduation-cap"></i>
              <p>
                Assign Class Teacher
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('admin/class_time/list')}}" class="nav-link @if(Request::segment(2)=='class_time') active @endif">
             <i class="fas fa-graduation-cap"></i>
              <p>
                Class Time
              </p>
            </a>
          </li>
            </ul>
          </li>
          <li class="nav-item @if(Request::segment(2)=='fees_collection') menu-is-opening menu-open @endif">
            <a href="#" class="nav-link @if(Request::segment(2)=='fees_collection') active @endif">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Fees Collection
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
            <a href="{{url('admin/fees_collection/collect_fees')}}" class="nav-link @if(Request::segment(3)=='collect_fees') active @endif">
              <i class="nav-icon far fa-user"></i>
              <p>
                Collect Fees
              </p>
            </a>
            </li>
            </ul>
          </li>
          <li class="nav-item">
                <a href="{{url('admin/settings')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>My Settings</p>
                </a>
          </li>

          <li class="nav-item">
                <a href="{{url('admin/change_password')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Change Password</p>
                </a>
          </li>
        @elseif(Auth::user()->category==2)
          <li class="nav-item">
            <a href="{{url('student/student/dashboard')}}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('student/my_calendar')}}" class="nav-link">
              <i class="nav-icon far fa-user"></i>
              <p>
                My Calendar
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('student/my_class_subject')}}" class="nav-link">
              <i class="nav-icon far fa-user"></i>
              <p>
                My Subject
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('student/fees_collection')}}" class="nav-link">
              <i class="nav-icon far fa-user"></i>
              <p>
                Fees Collection
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('student/my_timetable')}}" class="nav-link @if(Request::segment(2)=='my_timetable') active @endif">
              <i class="nav-icon far fa-user"></i>
              <p>
                My Timetable
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url('student/my_exam_timetable')}}" class="nav-link @if(Request::segment(2)=='my_exam_timetable') active @endif">
              <i class="nav-icon far fa-user"></i>
              <p>
                My Exam Timetable
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url('student/list')}}" class="nav-link">
              <i class="nav-icon far fa-user"></i>
              <p>
                My Exam Result
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('student/list')}}" class="nav-link">
              <i class="nav-icon far fa-user"></i>
              <p>
                My Attendance
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('student/my_account')}}" class="nav-link">
              <i class="nav-icon far fa-user"></i>
              <p>
                My Account
              </p>
            </a>
          </li>
          <li class="nav-item">
                <a href="{{url('student/change_password')}}" class="nav-link">
                  <i class="nav-icon far fa-user"></i>
                  <p>Change Password</p>
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
              <i class="nav-icon far fa-user"></i>
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
              <i class="nav-icon far fa-user"></i>
              <p>
                My class and subject
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url('teacher/my_exam_timetable')}}" class="nav-link @if(Request::segment(2)=='my_exam_timetable') active @endif">
              <i class="nav-icon far fa-user"></i>
              <p>
                My Exam Timetable
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url('teacher/list')}}" class="nav-link">
              <i class="nav-icon far fa-user"></i>
              <p>
                Marks Register 
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('teacher/list')}}" class="nav-link">
              <i class="nav-icon far fa-user"></i>
              <p>
                Attendance
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('teacher/list')}}" class="nav-link">
              <i class="nav-icon far fa-user"></i>
              <p>
                 Homework
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('teacher/list')}}" class="nav-link">
              <i class="nav-icon far fa-user"></i>
              <p>
                My notice board
              </p>
            </a>
          </li>
      <!--  <li class="nav-item">
            <a href="{{url('teacher/list')}}" class="nav-link">
              <i class="nav-icon far fa-user"></i>
              <p>
                Send email to students
              </p>
            </a>
          </li>  -->  
          <li class="nav-item">
            <a href="{{url('teacher/list')}}" class="nav-link">
              <i class="nav-icon far fa-user"></i>
              <p>
                My Profile
              </p>
            </a>
          </li>
          <li class="nav-item">
                <a href="{{url('teacher/change_password')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Change Password</p>
                </a>
          </li>


        @endif

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

    