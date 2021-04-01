@extends('admin.layout.appadmin')
@section('content') 

<!-- page content -->
<div class="right_col" role="main">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="viewadminhead">
        <h2>Account Receivable</h2>
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
              <h4>Account Receivable Summary</h4>
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
          $customer_name = $results->customer_name;
          $customer_name = DB::select("select* from customer where pk_id = '$customer_name'");
          //dd($customer_name[0]->customer_name);
          @endphp
          <tr>
            <td class="color">@php if(isset($customer_name[0]->customer_name)) { echo $customer_name[0]->customer_name; } @endphp</td>
            <td>PKR
              <?php if(isset($results->receiving_account) && !empty($results->receiving_account)) { ?>
              {{number_format($results->receiving_account)}}
              <?php } ?></td>
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
              <p>PKR @php $data=0; foreach($result as $results){  $data+=$results->receiving_account; } @endphp 
                {{$data}} </p>
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