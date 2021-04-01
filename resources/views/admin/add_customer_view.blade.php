@extends('admin.layout.appadmin')
@section('content')
    
    
    <!-- page content -->
    <div class="right_col" role="main">
    
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="viewadminhead">
            <h2>Create Customer</h2>
          </div>
        </div>
      </div>
      <form method="post" action = "{{url('/')}}/admin/home/add/customer" class="login-form" enctype="multipart/form-data">
                      {{ csrf_field() }}
                      @if($errors->any())

<div class="alert alert-danger">
  <strong></strong> {{$errors->first()}}
</div>
@endif
    <div class="row">
    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
      <div class="createadmininputs">
           <div class="form-group">
                  <label for="usr">Customer Name</label>
                  <input type="text" name="customer_name" class="form-control" id="usr" required>
                </div>
          </div>
    </div>
    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
      <div class="createadmininputs">
             <div class="form-group">
                  <label for="usr">CNIC No</label>
                  <input type="text" name="cnic" class="form-control" id="">
                </div>
          </div>
    </div>
    </div>
    <div class="row">
     <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
      <div class="createadmininputs">
           <div class="form-group">
                  <label for="usr">Phone No</label>
                  <input type="text" name="phone" class="form-control" id="" required>
                </div>
          </div>
    </div>
    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
      <div class="createadmininputs">
            <div class="form-group">
                  <label for="usr">Billing Address</label>
                  <input type="text" name="billing_address" class="form-control" id="" required> 
                </div>
          </div>
    </div>
    </div>
    <div class="row">
   <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
      <div class="createadmininputs">
           <div class="form-group">
                  <label for="usr">National Tax Number</label>
                  <input type="text" name="ntn" class="form-control" id="">
                </div>
          </div>
    </div>
      <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
      <div class="createadmininputs">
            <div class="form-group">
                  <label for="usr">Sales Tax Registration Number</label>
                  <input type="text" name="strn" class="form-control" id="">
                </div>
          </div>
    </div>
    </div>
    
    <div class="row">
     <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
      <div class="createadmininputs">
           <div class="form-group">
                  <label for="usr">Opening Balance(PKR)</label>
                  <input type="text" name="opening_balance" value="0" class="form-control" id="">
                </div>
          </div>
    </div>
    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
      <div class="createadmininputs">
           <div class="form-group">
                  <label for="usr">Current Balance(PKR)</label>
                  <input type="text" name="current_balance" value="0" class="form-control" id="">
                </div>
          </div>
    </div>
    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
        <div class="viewadminbtn">
            <button type="submit" class="btnedit btn" style="float:left !important;">Save</button>
          </div>
    </div>
    </div>
    
    </form>
     </div>
    <!-- /page content --> 
    @endsection