@extends('admin.layout.appadmin')
@section('content')
    
    <!-- page content -->
    <div class="right_col" role="main">
      <div class="row">
        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
          <div class="viewadminhead">
            <h2>View Sale Return</h2>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
          <div class="machinename">
        
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="plusbutton"> <a href="{{URL('/')}}/admin/home/add/sale" class="btn pumpplusbtn" title="Add field"><span class="glyphicon glyphicon-plus"></span></a> </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="dropbtnstyle">
              <div class="dropdown">
                <button class="btn dropdown-toggle" type="button" data-toggle="dropdown">
                Select Field <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                  <li><a href="{{URL('/')}}/admin/home/view/sale/by/customer">View sale</a></li>
                  <li><a href="{{URL('/')}}/admin/home/view/sale/return/by/customer">View sale Return</a></li>
                  
                </ul>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
          <div class="dateinputcircles">
            <div class="form-group">
              <input type="date" name="bday">
            </div>
          </div>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-12 col-xs-12">
          <div class="Tohead">
            <h4>To</h4>
          </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
          <div class="dateinputcircles">
            <div class="form-group">
              <input type="date" name="bday">
            </div>
          </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
          <div class="Applybtn">
            <button href="#" class="btnapply btn">Apply</button>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 col-lg-offset-2">
          <div class="Totalpurchasehead">
            <h4>Total Sale Return:</h4>
            <p>PKR {{number_format($total_amount[0]->{'SUM(total_amount)'})}}</p>
          </div>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_content">
              <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead class="headbgcolor">
                  <tr>
                    <th>Customer Name</th>
                    <th>Total Sale</th>
                    <th>D-Invoice #</th>
                    <th>Current Balance</th>
                  </tr>
                </thead>
                <tbody>
                @if(count($result)>0)
                @foreach($result as $results)
                @php
                $invoice = DB::select("select* from sale where customer_name = '$results->pk_id' and sale_type = 'sale return'");
                $total_sale = DB::select("select SUM(total_amount) from sale where customer_name = '$results->pk_id' and sale_type = 'sale return'");
                @endphp
                  <tr>
                    <td>{{$results->customer_name}}</td>
                    <td>PKR {{number_format($total_sale[0]->{'SUM(total_amount)'})}}</td>
                       <td><a href="{{url('/')}}/admin/home/view/sale/return/{{$results->pk_id}}">{{count($invoice)}} Invoice</a></td>
                    <td>PKR {{number_format($results->opening_balance)}}</td>
                  </tr>
                  @endforeach
          @endif
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