@extends('layout.app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6 text-left">
                <h1 style="font-weight: bold;">Fees Collection</h1>
            </div>
            <div class="col-sm-6" style="text-align:right;">
                <button type-"button" class="btn btn-primary" id="AddFees">Add Fees</button>
            </div>
        </div>
        

    </div>

                    <div class="card">
                        <div class="card-header">
                            <h3 style="font-weight: bold; text-align: Center;">Payment Details</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Class Name</th>
                                        <th>Total Amount</th>
                                        <th>Paid Amount</th>
                                        <th>Remaining Amount</th>
                                        <th>Payment Type</th>
                                        <th>Remark</th>
                                        <th>Created at</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @forelse($getFees as $key)
                                    <tr>
                                        <td>{{ $key->class_name }}</td>
                                        <td>${{ number_format($key->total_amount,2 )}}</td>
                                        <td>${{ number_format($key->paid_amount,2 )}}</td>
                                        <td>${{ number_format($key->remaining_amount,2 )}}</td>
                                        <td>{{ $key->payment_types }}</td>
                                        <td>{{ $key->remark }}</td>
                                        
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
<div class="modal fade" id="AddFeesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Fees</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="POST">
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <label class="col-form-label">Student Name : {{$getStudent->name}} {{$getStudent->last_name}}</label>
          </div>
          <div class="form-group">
            <label class="col-form-label">Class Name : {{$getStudent->class_name}}</label>
          </div>
          <div class="form-group">
            <label class="col-form-label">Total Amount : ${{ number_format($getStudent->amount,2 )}}</label>
          </div>
          <div class="form-group">
            <label class="col-form-label">Paid Amount :${{ number_format($paid_amount,2 )}}</label>
          </div>
          <div class="form-group">
            @php
                $remaining_amount=$getStudent->amount-$paid_amount;
            @endphp
            <label class="col-form-label">Remaining Amount :${{ number_format($remaining_amount,2 )}}</label>
          </div>
          <div class="form-group">
            <label class="col-form-label">Amount</label>
            <input type="text" class="form-control" name="amount">
          </div>
          <div class="form-group">
            <label class="col-form-label">Payment Type</label>
            <select class="form-control" name="payment_type" required>
                <option value="">Select</option>
                <option value="cash">Cash</option>
                <option value="cheque">Cheque</option>
                <option value="stripe">Stripe</option>
            </select>
          </div>
          <div class="form-group">
            <label  class="col-form-label">Remark:</label>
            <textarea class="form-control" name="remarks"></textarea>
          </div>
        
        </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- /.content-wrapper -->
@endsection
@section('script')
    <script type ="text/javascript">
        $('#AddFees').click(function(){
            $('#AddFeesModal').modal('show');
        });
    </script>
@endsection




