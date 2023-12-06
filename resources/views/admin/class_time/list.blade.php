@extends('layout.app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-md-12 text-center">
                <h1 style="font-weight: bold;">Class Time</h1>
            </div>
        </div>
        <div class="card">
            <form action="" method="GET">
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Class Name</label>
                            <select id="class_id" class="form-control getClasses" name="class_id" required>
                                <option value="">Select</option>
                                @foreach($getClasses as $class)
                                <option {{ (Request::get('class_id') == $class->id) ? 'selected' : '' }} value="{{ $class->id }}">{{ $class->name }}</option>

                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Subject Name</label>
                            <select id="subject_id" class="form-control getSubject" name="subject_id" required>
                                <option value="">Select</option>
                                @foreach($getSubject as $subject)
                                <option {{ (Request::get('subject_id') == $subject->subject_id) ? 'selected' : '' }} value="{{ $subject->subject_id }}">{{ $subject->subject_name }}</option>

                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <button class="btn-btn-primary" type="submit" style="margin-top:35px;">Search</button>
                            <a href="{{url('admin/class_time/list')}}" class="btn btn-primary" type="submit" style="margin-top:5px;">Reset</a>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div><!-- /.container-fluid -->
    </section>
    <!-- Content Header (Page header) -->
                    @if(!empty(Request::get('class_id')) && !empty(Request::get('subject_id')))
                    <form action="{{url('admin/class_time/add')}}" method="POST">
                        @csrf
                        <input type="hidden" name="class_id" value="{{Request::get('class_id')}}">
                        <input type="hidden" name="subject_id" value="{{Request::get('subject_id')}}">
                        <div class="card-header">
                            <h3 style="font-weight: bold; text-align: Center;">Set Class Time And Room Number</h3>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Week Days</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                        <th>Room Number</th>

                                    </tr>
                                <tbody>
                                    @php
                                    $i=1;
                                    @endphp
                                    @foreach($week as $key)
                                    <tr>

                                        <td>
                                            <input type="hidden" name="timetable[{{$i}}][week_id]" value="{{$key['week_id']}}">
                                            {{ $key['week_name'] }}</td>
                                        <td>
                                            <input type="time" name="timetable[{{$i}}][start_time]" value="{{$key['start_time']}}" class="form-control">
                                        </td>
                                        <td>
                                            <input type="time" name="timetable[{{$i}}][end_time]" value="{{$key['end_time']}}" class="form-control">
                                        </td>
                                        <td>
                                            <input type="text" style="width:200px" name="timetable[{{$i}}][room_number]" value="{{$key['room_number']}}" class="form-control">
                                        </td>
                                    </tr>
                                    @php
                                    $i++;
                                    @endphp
                                    @endforeach
                                </tbody>

                            </table>
                            <div style="text-align:center;padding:20px">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                    @endif

    <!-- Main content -->

    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function () {
        $('.getClasses').change(function () {
            var class_id = $(this).val();

            // Make an AJAX request to get subjects based on the selected class
            $.ajax({
                url: "{{ url('admin/class_time/get_subject') }}",
                type: "POST",
                data: {
                    class_id: class_id,
                    _token: '{{ csrf_token() }}',
                },
                dataType: "json",
                success: function (response) {
                    $('#subject_id').html(response.html);
                },
                error: function (error) {
                    console.log(error);
                }
            });
        });
    });
</script>
@endsection