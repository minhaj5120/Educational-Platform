@extends('layout.app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-md-12 text-center">
            <h1 style="font-weight: bold;">Collect Fees</h1>

            </div>
        </div>
        <div class="card">
            <form action="" method="GET">
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-2">
                            <label>Class Name</label>
                            <select id="class_id" class="form-control getClasses" name="class_id" required>
                                <option value="">Select</option>
                                @foreach($getClass as $class)
                                <option {{ (Request::get('class_id') == $class->id) ? 'selected' : '' }} value="{{ $class->id }}">{{ $class->name }}</option>

                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label>Student Id</label>
                            <input type="text" name="student_id" class="form-control" value="{{ Request::get('student_id')}}"placeholder="Student Id">
                        </div>
                        <div class="form-group col-md-2">
                            <label>Student Name</label>
                            <input type="name" name="first_name" class="form-control" value="{{ Request::get('first_name')}}"placeholder="First Name">
                        </div>
                        <div class="form-group col-md-3">
                            <button class="btn-btn-primary" type="submit" style="margin-top:35px;">Search</button>
                            <a href="{{url('admin/fees_collection/collect_fees')}}" class="btn btn-primary" type="submit" style="margin-top:5px;">Reset</a>

                        </div>
                    </div>
                </div>
            </form>
        </div>
        </div>

                    <div class="card">
                        <div class="card-header">
                            <h3 style="font-weight: bold; text-align: Center;">Student List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Student ID</th>
                                        <th>Student Name</th>
                                        <th>Class Name</th>
                                        <th>Total Amount</th>
                                        <th>Paid Amount</th>
                                        <th>Remaining Amount</th>
                                        <th>Created at</th>
                                        <th>Action</th>

                                    </tr>
                                <tbody>
                                  @if(!empty($getRecord))
                                    @forelse($getRecord as $key)
                                        @php
                                            $paid_amount=$key->getPaidAmount($key->id,$key->class_id);
                                            $remaining_amount=$key->amount-$paid_amount;
                                        @endphp
                                    <tr>
                                        <td>{{ $key->id }}</td>
                                        <td>{{ $key->name }} {{ $key->last_name }}</td>
                                        <td>{{ $key->class_name }}</td>
                                        <td>${{ number_format($key->amount,2 )}}</td>
                                        <td>${{ number_format($paid_amount,2 )}}</td>
                                        <td>${{ number_format($remaining_amount,2 )}}</td>
                                        <td>{{ $key->created_at }}</td>
                                        <td>
                                          <a href="{{url('admin/fees_collection/add_fees/'.$key->id)}}"class="btn btn-success">Collect Fees</a>


                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="100%">Record Not Found</td>
                                    </tr>
                                    @endforelse
                                  @else
                                    <tr>
                                        <td colspan="100%">Record Not Found</td>
                                    </tr>
                                  @endif
                                </tbody>

                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
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



