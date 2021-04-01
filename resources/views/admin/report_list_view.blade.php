@extends('admin.layout.appadmin')
@section('content') 
<!-- page content -->
<div class="right_col" role="main">
  <div class="row">
    <div class="col-lg-2 col-md-2 col-sm-12">
      <div class="viewadminhead">
        <h2>Reports</h2>
      </div>
    </div>
  </div>
  <div class="content-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
          <div class="reportboxouter"> <a href="{{url('/')}}/admin/home/view/profit/loss/report">
            <div class="reportbox">
              <h4>Profit & Loss</h4>
            </div>
            </a> </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
          <div class="reportboxouter"> <a href="{{url('/')}}/admin/home/view/account/receivable">
            <div class="reportbox">
              <h4>Account Receivable</h4>
            </div>
            </a> </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
          <div class="reportboxouter"> <a href="{{url('/')}}/admin/home/view/account/payable/reporting">
            <div class="reportbox">
              <h4>Account payable</h4>
            </div>
            </a> </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
          <div class="reportboxouter"> <a href="{{url('/')}}/admin/home/view/trial/balance">
            <div class="reportbox">
              <h4>Trial Balance</h4>
            </div>
            </a> </div>
        </div>
      
      
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
          <div class="reportboxouter"> <a href="{{url('/')}}/admin/home/view/balance/sheet">
            <div class="reportbox">
              <h4>Balance Sheet</h4>
            </div>
            </a> </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
          <div class="reportboxouter"> <a href="{{url('/')}}/admin/expense/report">
            <div class="reportbox">
              <h4>Expense Report</h4>
            </div>
            </a> </div>
        </div>
      </div>


      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
          <div class="reportboxouter"> <a href="{{url('/')}}/admin/home/view/inventory/report">
            <div class="reportbox">
              <h4>Inventory</h4>
            </div>
            </a> </div>
        </div>
        </div>

    </div>
  </div>
</div>
<!-- /page content --> 
@endsection