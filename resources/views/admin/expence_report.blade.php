@extends('admin.layout.appadmin')
@section('content') 
<!-- page content -->
<div class="right_col" role="main">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="viewadminhead">
        <h2>Expense Report</h2>
      </div>
    </div>
  </div>
  <div class="row">
    <form method="post" action="">
      <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <div class="createadmininputs">
          <div class="form-group">
            <input type="date" class="form-control">
          </div>
        </div>
      </div>
      <div class="col-lg-1 col-md-1 col-sm-12 col-xs-12">
        <div class="Tohead">
          <h4>To</h4>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <div class="createadmininputs">
          <div class="form-group">
            <div class="createadmininputs">
              <div class="form-group">
                <input type="date" class="form-control">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
        <div class="Applybtn">
          <button type="submit" class="btnapply btn">Apply</button>
        </div>
      </div>
    </form>
  </div>
  <div class="row">
    <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 col-lg-offset-2">
      <div class="Adminprofilebox">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="accountpayablehead">
              <h4>Expense Report Summary</h4>
              <p>January 1-Faburary 10</p>
            </div>
          </div>
        </div>
        <div class="x_panel">
          <div class="x_content">
            <table  class="table table-striped dt-responsive nowrap">
              <thead class="headbgcolor2">
                <tr>
                  <th>Heading</th>
                  <th>Total</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="color">ID</td>
                  <td></td>
                </tr>
                <tr>
                  <td class="color">Payee</td>
                  <td>101,862.00</td>
                </tr>
                <tr>
                  <td class="color">Account Name</td>
                  <td>Current account</td>
                </tr>
                <tr>
                  <td>Payment Method</td>
                  <td>Bank</td>
                </tr>
                <tr>
                  <td class="color">Payment Account</td>
                  <td>Cash in hand</td>
                </tr>
                <tr>
                  <td class="color">Amount</td>
                  <td>{{$expense}}</td>
                </tr>
                <tr>
                  <td class="color">Date</td>
                  <td>12-1-2020</td>
                </tr>
                <tr>
                  <td class="color">Nature of Account</td>
                  <td>Fixed Asset</td>
                </tr>
                <tr>
                  <td class="color">Description</td>
                  <td>Test</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /page content --> 
@endsection