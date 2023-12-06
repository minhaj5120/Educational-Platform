@extends('layout.app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-md-12 text-center">
                <h1 style="font-weight: bold;">Student Attendance Report</h1>
            </div>
        </div>
        <div class="card">
            <form action="" method="GET">
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label>Class Name</label>
                            <select  class="form-control getClasses" name="class_id" required>
                                <option value="">Select</option>
                                @foreach($getClass as $class)
                                <option {{ (Request::get('class_id') == $class->id) ? 'selected' : '' }} value="{{ $class->id }}">{{ $class->name }}</option>

                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Date</label>
                            <input type="date" class="form-control" name="attendance_date" value="{{Request::get('attendance_date')}}">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Attendance Type</label>
                            <select  class="form-control" name="attendance_type" >
                                <option value="">Select</option>
                                <option {{ (Request::get('attendance_type') == 1) ? 'selected' : '' }} value="1">Present</option>
                                <option {{ (Request::get('attendance_type') == 2) ? 'selected' : '' }} value="2">Absent</option>
                                <option {{ (Request::get('attendance_type') == 3) ? 'selected' : '' }} value="3">Late</option>

                            </select>
                            
                        </div>
                        <div class="form-group col-md-3">
                            <button class="btn-btn-primary" type="submit" style="margin-top:35px;">Search</button>
                            <a href="{{url('admin/attendance/report')}}" class="btn btn-primary" type="submit" style="margin-top:5px;">Reset</a>

                        </div>
                    </div>
                </div>
            </form>
        </div>
   
        <div class="card-body">
            <div class="card-header">
                <h1 style="font-weight: bold;" class="card-title">Attendance Report</h1>
            </div>
            <div class="card-body p-0">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Student ID</th>
                                        <th >Class Name</th>
                                        <th >Student Name</th>
                                        <th>Attendance Type</th>
                                        <th>Attendance Date</th>
                                        <th>Created At</th>

                                        
                                    </tr>
                                </thead>
                                @forelse($getRecord as $key)
                                    <tr>
                                        <td>{{ $key->student_id }}</td>
                                        <td>{{ $key->class_name }}</td>
                                        <td>{{ $key->student_name }} {{ $key->student_last_name }}</td>
                                        <td>
                                            @if($key->type==1)
                                                Present
                                            @elseif($key->type==2)
                                                Absent
                                            @elseif($key->type==3)
                                                Late
                                            @endif
                                        </td>
                                        <td>{{ date('d-m-Y',strtotime($key->date))}}</td>
                                        
                                        <td>{{ $key->created_at }}</td>
                                    </tr>
                                  @empty
                                    <tr>
                                        <td colspan="100%">Record Not Found</td>
                                    </tr>
                                  @endforelse
                                </tbody>
                            </table>
            </div>
        </div>


    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection