@extends('layout.app')
@section('content')

<div class='content-wrapper'>
    <div class='content-header'>
        <div class='container-fluid'>
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class='m-0'>Dashboard</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class='container-fluid'>
            <div class="row">
                <div class="col-lg-3 co-6">
                    <div class='small-box bg-info'>
                        <div class='inner'>
                            <h3>{{$TotalStudent}}</h3>
                            <h2>Total Student</h2>
                        </div>            
                        <div class="icon">            
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="{{url('admin/student/list')}}" class="small-box-footer">More info <i class='fas fa-arrow-circle-right'></i></a>
                    </div>
                </div>
                <div class="col-lg-3 co-6">
                    <div class='small-box bg-success'>
                        <div class='inner'>
                            <h3>{{$TotalTeacher}}</h3>
                            <h2>Total Teacher</h2>
                        </div>           
                        <div class="icon">            
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="{{url('admin/teacher/list')}}" class="small-box-footer">More info <i class='fas fa-arrow-circle-right'></i></a>
                    </div>
                </div>
                <div class="col-lg-3 co-6">
                    <div class='small-box bg-primary'>
                        <div class='inner'>
                            <h3>{{$TotalClass}}</h3>
                            <h2>Total Active Class</h2>
                        </div>            
                        <div class="icon">            
                            <i class="nav-icon fas fa-table"></i>
                        </div>
                        <a href="{{url('admin/class/list')}}" class="small-box-footer">More info <i class='fas fa-arrow-circle-right'></i></a>
                    </div>
                </div>
                <div class="col-lg-3 co-6">
                    <div class='small-box bg-warning'>
                        <div class='inner'>
                            <h3>{{$TotalSubject}}</h3>
                            <h2>Total Subject</h2>
                        </div>            
                        <div class="icon">            
                            <i class="nav-icon fas fa-table"></i>
                        </div>
                        <a href="{{url('admin/subject/list')}}" class="small-box-footer">More info <i class='fas fa-arrow-circle-right'></i></a>
                    </div>
                </div>
                <div class="col-lg-3 co-6">
                    <div class='small-box bg-danger'>
                        <div class='inner'>
                            <h3>${{ number_format($TotalPayment,2 )}}</h3>
                            <h2>Total Payment</h2>
                        </div>            
                        <div class="icon">            
                            <i class="nav-icon fas fa-table"></i>
                        </div>
                        <a href="{{url('admin/payment/list')}}" class="small-box-footer">More info <i class='fas fa-arrow-circle-right'></i></a>
                    </div>
                </div>
                <div class="col-lg-3 co-6">
                    <div class='small-box bg-secondary' >
                        <div class='inner'>
                            <h3>{{$TotalAdmin}}</h3>
                            <h2>Total Admin</h2>
                        </div>            
                        <div class="icon">            
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="{{url('admin/admin/list')}}" class="small-box-footer">More info <i class='fas fa-arrow-circle-right'></i></a>
                    </div>
                </div>

    </section>
</div>


@endsection