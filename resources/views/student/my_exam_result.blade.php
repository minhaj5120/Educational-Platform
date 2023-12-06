@extends('layout.app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-md-12 text-center">
                <h1 style="font-weight: bold;">Examination Result Report</h1>
            </div>
        </div>
    </div><!-- /.container-fluid -->
    </section>
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                @foreach($getRecord as $value)
                 <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 style="font-weight: bold;">{{$value['exam_name']}}</h3>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Subject Name</th>
                                        <th>Attendance Marks</th>
                                        <th>Assignment Marks</th>
                                        <th>Midterm Marks</th>
                                        <th>Final Marks</th>
                                        <th>Total Marks (100)</th>
                                        <th>Grade</th>


                                    </tr>
                                    <tbody>
                                    @foreach($value['subject'] as $key)
                                    <tr>
                                        @php
                                            $totalMarks=$key['attendance'] + $key['assignment'] + $key['midterm'] + $key['final'];
                                        @endphp
                                        <td>{{ $key['subject_name'] }}</td>
                                        <td>{{ $key['attendance'] }}</td>
                                        <td>{{ $key['assignment'] }}</td>
                                        <td>{{ $key['midterm'] }}</td>
                                        <td>{{ $key['final'] }}</td>
                                        <td>{{ $totalMarks }}</td>
                                        <td>
                                            @if($totalMarks>=80)
                                                <span style="color:green;font_weight:bold;">A+</span>
                                            @elseif($totalMarks>=70)
                                                <span style="color:green;font_weight:bold;">A</span>
                                            @elseif($totalMarks>=60)
                                                <span style="color:green;font_weight:bold;">A-</span>
                                            @elseif($totalMarks>=50)
                                                <span style="color:green;font_weight:bold;">B</span>
                                            @elseif($totalMarks < 50)
                                                <span style="color:red;font_weight:bold;">F</span>
                                        
                                            @endif
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
                @endforeach


                <!-- /.col -->
            </div>

        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection



