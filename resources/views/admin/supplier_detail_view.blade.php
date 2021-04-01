@extends('admin.layout.appadmin')
@section('content')
    
    
    <!-- page content -->
    <div class="right_col" role="main">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="viewadminhead">
            <h2>View Supplier</h2>
          </div>
        </div>
      </div>
      
      <div class="row">
        <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 col-lg-offset-2">
          <div class="Adminprofilebox">
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="viewexpenselines">
                  <h4>Supplier Name</h4>
                   <p>{{$result[0]->supplier_name}}</p>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="viewexpenselines">
                  <h4>CNIC</h4>
                   <p>{{$result[0]->cnic}}</p>
                </div>
            </div>
            </div>
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="viewexpenselines">
                  <h4>Phone No</h4>
                   <p>{{$result[0]->phone}}</p>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="viewexpenselines">
                  <h4>Billing Address</h4>
                   <p>{{$result[0]->billing_address}}</p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="viewexpenselines">
                  <h4>National Tax Number</h4>
                   <p>{{$result[0]->ntn}}</p>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <div class="viewexpenselines">
                  <h4>Sales Tax Registration Number</h4>
                   <p>{{$result[0]->strn}}</p>
                </div>
              </div>
              </div>
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <div class="viewexpenselines">
                  <h4>Opening Balance</h4>
                   <p>PKR {{number_format($result[0]->opening_balance)}}</p>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <div class="viewexpenselines">
                  <h4>Current Balance</h4>
                   <p>PKR {{number_format($result[0]->current_balance)}}</p>
                </div>
              </div>
               <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <div class="viewadminbtn">
                    <a href="{{url('/')}}/admin/home/edit/supplier/{{$result[0]->pk_id}}" class="btnedit btn">Edit</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /page content --> 
  @endsection