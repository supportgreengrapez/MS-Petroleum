@extends('admin.layout.appadmin')
@section('content') 

<!-- page content -->
<div class="right_col" role="main">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="viewadminhead">
        <h2>Account Payable</h2>
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
              <h4>Account Payable Summary</h4>
              <p>January 1-Faburary 10</p>
            </div>
          </div>
        </div>
        <table  class="table table-striped dt-responsive nowrap">
          <thead class="headbgcolor2">
            <tr>
              <th>Current</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>
          
          @if($result>0)
          @foreach($result as $results)
          @php
          $supplier_name = $results->supplier_name;
          $supplier_name = DB::select("select* from supplier where pk_id = '$supplier_name'");
          @endphp
          <tr>
            <td class="color"><?php if(isset($supplier_name[0])) {?>
              {{$supplier_name[0]->supplier_name}}
              <?php } ?></td>
            <td>PKR {{number_format($results->paying_account)}}</td>
          </tr>
          @endforeach
          @endif
            </tbody>
          
        </table>
        <div class="row">
          <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
            <div class="totalpayabletable">
              <h4>Total</h4>
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="totalpayabletable">
              <p>PKR @php $data=0; foreach($result as $results){  $data+=$results->paying_account ; } @endphp 
                {{$data}}</p>
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