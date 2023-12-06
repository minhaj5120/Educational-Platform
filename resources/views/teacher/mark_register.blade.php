@extends('layout.app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-md-12 text-center">
                <h1 style="font-weight: bold;">Examination Marks Registration</h1>
            </div>
        </div>


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Search Exam</h3>
                        </div>
                        <form method="get" action ="">
                            <div class="card-body">
                                <div class="row">

                                <div class="form-group col-md-3">
                                    <label>Exam</label>
                                    <select class="form-control" name="exam_id" required>
                                        <option value="">Select</option>
                                        @foreach($getExam as $exam)
                                            <option {{ (Request::get("exam_id") == $exam->exam_id) ? 'selected' : '' }} value="{{ $exam->exam_id }}">{{ $exam->exam_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-3">
                                    <label>Class</label>
                                    <select class="form-control" name="class_id" required>
                                        <option value="">Select</option>
                                        @foreach($getClass as $class)
                                            <option {{ (Request::get("class_id") == $class->class_id) ? 'selected' : '' }} value="{{ $class->class_id }}">{{ $class->class_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <button class="btn btn-primary" type="submit" style="margin-top: 30px;">Search</button>
                                    <a href="{{ url('teacher/mark_register') }}" class="btn btn-success" style="margin-top: 30px;">Reset</a>
                                </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>



    </section>
    <!-- Content Header (Page header) -->
                <!-- /.col -->
                <div class="col-md-12">
                @include('_message')

                @if(!empty($getSubject) && !empty($getSubject->count()))

                     <div class="card">
                        <div class="card-header">
                            <h3 style="font-weight: bold; text-align: Center;">Marks Registration</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>STUDENT NAME</th>
                                        @foreach($getSubject as $subject)
                                        <th>{{$subject->subject_name}} : ({{$subject->subject_type}}) <br />
                                            Passing Marks/ Full Marks -({{$subject->passing_marks}} / {{$subject->full_marks}})

                                        </th>
                                        @endforeach
                                        <th>ACTION</th>


                                    </tr>
                                </thead>  
                                <tbody>
                                    @if(!empty($getStudent) && !empty($getStudent->count()))
                                        @foreach($getStudent as $student)
                                        <form name="POST" class="submitForm">
                                            @csrf
                                            <input type="hidden" name="student_id" value="{{ $student->id }}">
                                            <input type="hidden" name="exam_id" value="{{ Request::get('exam_id') }}">
                                            <input type="hidden" name="class_id" value="{{ Request::get('class_id') }}">
                                        <tr>
                                            <td style="font-weight:bold">{{$student->name}} {{$student->last_name}}</td>
                                            @php
                                                 $i = 1;
                                            @endphp
                                            @foreach($getSubject as $subject)
                                                @php
                                                    $totalMarks=0;
                                                    $getMarks = $subject->getMarks($student->id,Request::get('exam_id'),Request::get('class_id'),$subject->subject_id);
                                                    if(!empty($getMarks))
                                                    {
                                                        $totalMarks=$getMarks->attendance + $getMarks->assignment + $getMarks->midterm + $getMarks->final;
                                                    }
                                                @endphp
                                                <td>
                                                    <div style="margin-bottom: 10px;">
                                                        Attendance Marks (5)
                                                        <input type="hidden" name="marks[{{ $i }}][full_marks]" value="{{ $subject->full_marks }}">
                                                        <input type="hidden" name="marks[{{ $i }}][passing_marks]" value="{{ $subject->passing_marks }}">
                                                        <input type="hidden" name="marks[{{ $i }}][subject_id]" value="{{ $subject->subject_id }}">
                                                        <input type="text" style="width: 200px;" class="form-control"  value="{{ !empty($getMarks->attendance) ? $getMarks->attendance : '' }}" name="marks[{{ $i }}][attendance_marks]">
                                                    </div>
                                                    <div style="margin-bottom :10px;">
                                                        Assignment Marks (25)
                                                        <input type="text" style="width: 200px;" class="form-control" value="{{ !empty($getMarks->assignment) ? $getMarks->assignment : '' }}" name="marks[{{ $i }}][assignment_marks]">
                                                    </div>
                                                    <div style="margin-bottom: 10px;">
                                                        MidTerm Exam Marks (30)
                                                        <input type="text" style="width: 200px;" class="form-control" value="{{ !empty($getMarks->midterm) ? $getMarks->midterm : '' }}" name="marks[{{ $i }}][mid_marks]">
                                                    </div>
                                                    <div style="margin-bottom: 10px;">
                                                        Final Exam Marks (40)
                                                        <input type="text" style="width: 200px;" class="form-control"  value="{{ !empty($getMarks->final) ? $getMarks->final : '' }}" name="marks[{{ $i }}][final_marks]">
                                                    </div>
                                                    @if(!empty($getMarks))
                                                        <div style="margin-bottom: 10px;font-weight:bold;">
                                                            Total Marks: {{$totalMarks}}</br>
                                                            Passing Marks: {{$subject->passing_marks}}</br>
                                                            @if($totalMarks>=$subject->passing_marks)
                                                                Result: <span style="color:green;font_weight:bold;">Passed</span>
                                                            @else
                                                                Result: <span style="color:red;font_weight:bold;">Failed</span>
                                                            @endif

                                                        
                                                        </div>
                                                    @endif

                                                </td>
                                            @php
                                                $i++;
                                            @endphp
                                            @endforeach
                                            <td>
                                                <button type="submit" class="btn btn-success">Save</button>
                                            </td>
                                        </tr>
                                        </form>
                                        
                                        @endforeach
                                    @endif

                                    
                                </tbody>

                            </table>
                        </div>
                     </div>
                @endif

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
@section('script').
<script type="text/javascript">
 $('.submitForm').submit(function (e) {
    e.preventDefault();
    // Make an AJAX request to get subjects based on the selected class
    $.ajax({
        type: "POST",
        url: "{{ url('teacher/mark_register_save') }}",
        data: $(this).serialize(),
        dataType: "json",
        success: function (data) {
            alert(data.success)
        },
    });
 });

</script>
@endsection


