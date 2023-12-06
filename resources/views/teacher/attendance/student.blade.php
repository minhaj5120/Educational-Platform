@extends('layout.app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-md-12 text-center">
                <h1 style="font-weight: bold;">Student Attendance</h1>
            </div>
        </div>
        <div class="card">
            <form action="" method="GET">
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label>Class Name</label>
                            <select id="getClass" class="form-control getClasses" name="class_id" required>
                                <option value="">Select</option>
                                @foreach($getClass as $class)
                                <option {{ (Request::get('class_id') == $class->class_id) ? 'selected' : '' }} value="{{ $class->class_id }}">{{ $class->class_name }}</option>

                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Date</label>
                            <input type="date" class="form-control" id="getDate" name="attendance_date" value="{{Request::get('attendance_date')}}" required>
                        </div>
                        <div class="form-group col-md-3">
                            <button class="btn-btn-primary" type="submit" style="margin-top:35px;">Search</button>
                            <a href="{{url('teacher/attendance/student')}}" class="btn btn-primary" type="submit" style="margin-top:5px;">Reset</a>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    @if(!empty(Request::get('class_id') && !empty(Request::get('attendance_date'))))
   
        <div class="card-body">
            <div class="card-header">
                <h1 style="font-weight: bold;" class="card-title">Student List</h1>
            </div>
            <div class="card-body p-0">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Student ID</th>
                                        <th >Student Name</th>
                                        <th>Attendance</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($getStudent) && !empty($getStudent->count()))
                                        @foreach($getStudent as $key)
                                          @php
                                            $type='';
                                            $getAttendance=$key->getAttendance($key->id,Request::get('class_id'),Request::get('attendance_date'));
                                            if(!empty($getAttendance->type))
                                            {
                                                $type=$getAttendance->type;
                                            }
                                          @endphp

                                            <tr>
                                                <td>{{ $key->id }}</td>
                                                <td>{{ $key->name }} {{ $key->last_name }}</td>
                                                <td>
                                                    <label style="margin-right:20px"><input type ="radio" {{($type =='1') ? 'checked' : ''}} id="{{ $key->id }}" value="1" class="SaveAttendance" name="attendance{{ $key->id }}">Present</lebel>
                                                    <label style="margin-right:20px"><input type ="radio" {{($type =='2') ? 'checked' : ''}} id="{{ $key->id }}" value="2" class="SaveAttendance" name="attendance{{ $key->id }}">Absent</lebel>
                                                    <label style="margin-right:20px"><input type ="radio" {{($type =='3') ? 'checked' : ''}} id="{{ $key->id }}" value="3" class="SaveAttendance" name="attendance{{ $key->id }}">Late</lebel>
                                                        
                                                    
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
            </div>
        </div>
    @endif


    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
@section('script')
<script type="text/javascript">
 $('.SaveAttendance').change(function () {
    var student_id = $(this).attr('id');
    var class_id = $('#getClass').val(); 
    var type = $(this).val();
    var date = $('#getDate').val();

    // Make an AJAX request to get subjects based on the selected class
    $.ajax({
        url: "{{ url('teacher/attendance/student/save') }}",
        type: "POST",
        data: {
            student_id: student_id,
            class_id: class_id,
            type: type,
            date: date,
            _token: '{{ csrf_token() }}',
        },
        dataType: "json",
        success: function (data) {
            alert(data.success)
        },
    });
 });

</script>
@endsection