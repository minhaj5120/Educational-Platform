@extends('layout.app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-md-12 text-center">
              <h1 style="font-weight: bold;">My Timetable</h1>  
            </div>
        </div> 
    </div><!-- /.container-fluid -->
    </section>
    <!-- Content Header (Page header) -->
    <section class="content">
        <div class="container-fluid">
        <div class="row">    
                <div class="col-md-12">
                        <div class="card">
                        <div class="card-header">
                            <h4 style=" text-align: Center;">My Timetable</h4>
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
                                </thead>    
                                <tbody>
                                    @php
                                    $i=1;
                                    @endphp
                                    @foreach($week as $key)
                                    
                                        
                                            
                                    @php
                                    $i++;
                                    @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
    </section>

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