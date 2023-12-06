@extends('layout.app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
              <h1 style="font-weight: bold;">My Exam Timetable</h1>  
            </div>
        </div> 
    </div><!-- /.container-fluid -->
    </section>
    <!-- Content Header (Page header) -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">    
                <div class="col-md-12">
                    @foreach($getRecord as $value)
                        <h2 style="font-size: 32px;margin-bottom: 15px;">Class: <span style="color:black">{{ $value['class_name'] }}</span></h2>
                        @foreach($value['exam'] as $exam)
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="class-title">Exam Name: <b>{{ $value['class_name'] }}</b></h3>
                                </div>  
                                <div class="card-body p-0">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Subject Name</th>
                                                <th>Day</th>
                                                <th>Exam Date</th>
                                                <th>Start Time</th>
                                                <th>End Time</th>
                                                <th>Room Number</th>
                                                <th>Full Marks</th>
                                                <th>Passing Marks</th>
                                            </tr>
                                        </thead>    
                                        <tbody>
                                            @foreach($exam['subject'] as $valueS)
                                                <tr>
                                                    <td>{{ $valueS['subject_name'] }}</td>
                                                    <td>{{ date('l', strtotime($valueS['exam_date'])) }}</td>
                                                    <td>{{ date('d-m-y', strtotime($valueS['exam_date'])) }}</td>
                                                    <td>{{ date('h:i A', strtotime($valueS['start_time'])) }}</td>
                                                    <td>{{ date('h:i A', strtotime($valueS['end_time'])) }}</td>
                                                    <td>{{ $valueS['room_number'] }}</td>
                                                    <td>{{ $valueS['full_marks'] }}</td>
                                                    <td>{{ $valueS['passing_marks'] }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        
                        @endforeach
                    @endforeach
                        </div>  
                </div>    
            </div>
        </div>
    </section>

    <!-- Main content -->

    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection  