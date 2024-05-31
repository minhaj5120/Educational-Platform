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
   
        <div class="card-body">
            <div class="card-header">
                <h1 style="font-weight: bold;" class="card-title">My Attendance Report</h1>
            </div>
            <div class="card-body p-0">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th >Class Name</th>
                                        <th>Attendance Type</th>
                                        <th>Attendance Date</th>
                                        <th>Created At</th>

                                        
                                    </tr>
                                </thead>
                                <tbody>
                                
                                  @forelse($getRecord as $key)
                                    <tr>
                                        
                                        <td>{{ $key->class_name }}</td>
                                        
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