@extends('admin.layout.appadmin')
@section('content')
    
    <!-- page content -->
    <div class="right_col" role="main">
      <div class="row">
        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
          <div class="viewadminhead">
            <h2>View Purchase</h2>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
          <div class="machinename">
        
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
          
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="dropbtnstyle">
              <div class="dropdown">
                <div class="btn pumpplusbtn dropdown-toggle" type="button" data-toggle="dropdown"><span class="glyphicon glyphicon-plus"></span>
                </div>
                <ul class="dropdown-menu">
                  <li><a href="{{URL('/')}}/admin/home/add/purchase">Add Normal Entry</a></li>
                  <li><a href="{{URL('/')}}/admin/home/add/purchase/tax">Add Tax Applicable</a></li>
                  
                </ul>
              </div>
              </div>
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
                  <li><a href="{{URL('/')}}/admin/home/view/purchase/by/supplier">View Purchase</a></li>
                  <li><a href="{{URL('/')}}/admin/home/view/purchase/return/by/supplier">View Purchase Return</a></li>
                  
                </ul>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>

        <div class="clearfix"></div>
  <form method="post" action = "{{url('/')}}/admin/home/search/purchase" class="login-form" enctype="multipart/form-data">
                   
                   {{ csrf_field() }}
                    <div class="row">
                       <div class="col-lg-6 col-sm-12">
                           <div class="alert alert-info">
  <strong>Info!</strong>  Please tick the check box whom you want to filte..
</div>
                       </div>
                   </div>
    <!--<div class="row">-->
    <!--  <div class="col-lg-2">-->
    <!--    <div class="form-group">-->
          
                
    <!--    <label><input type="checkbox" name="purchase" value="1"> Total Purchase</label>-->
    <!--    </div>-->
    <!--  </div>-->
    <!--  <div class="col-lg-4">-->
    <!--    <div class="form-group">-->
    <!--      <label>From</label>-->
    <!--      <input type="number" name="purchase_from" class="form-control">-->
    <!--    </div>-->
    <!--  </div>-->
    <!--  <div class="col-lg-4">-->
    <!--    <div class="form-group">-->
    <!--      <label>To:</label>-->
    <!--      <input type="number"name="purchase_to"class="form-control">-->
    <!--    </div>-->
    <!--  </div>-->
    <!--</div>-->
    <!--<div class="row">-->
    <!--  <div class="col-lg-2">-->
    <!--    <div class="form-group">-->
    <!--    <label><input type="checkbox" name="d_invoice" value="1"> D-Invoice</label>-->
    <!--    </div>-->
    <!--  </div>-->
    <!--  <div class="col-lg-4">-->
    <!--    <div class="form-group">-->
    <!--      <label>From</label>-->
    <!--      <input type="number" name="d_invoice_from" class="form-control">-->
    <!--    </div>-->
    <!--  </div>-->
    <!--  <div class="col-lg-4">-->
    <!--    <div class="form-group">-->
    <!--      <label>To:</label>-->
    <!--      <input type="number" name="d_invoice_to" class="form-control">-->
    <!--    </div>-->
    <!--  </div>-->
    <!--</div>-->
    <div class="row">
      <div class="col-lg-2">
        <div class="form-group">
        <label><input type="checkbox" name="current_balance" value="1" > Current Blance</label>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="form-group">
          <label>From</label>
          <input type="number" min="1" name="current_balance_from" class="form-control">
        </div>
      </div>
      <div class="col-lg-4">
        <div class="form-group">
          <label>To:</label>
          <input type="number" name="current_balance_to" class="form-control">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-2">
        <div class="totalamountp">
          <button type="submit" class="amountbtn btn">Filter</button>
        </div>
      </div>
    </div>
     <div style="float: right" class="col-lg-3 col-md-3 col-sm-12 col-xs-12 col-lg-offset-2">
          <div class="Totalpurchasehead">
            <h4>Total Sale :</h4>
            <p>PKR {{number_format($total_amount[0]->{'SUM(total_amount)'})}}</p>
          </div>
        </div>
  </form>

      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_content">
              <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead class="headbgcolor">
                  <tr>
                    <th>Supplier Name</th>
                    <th>Total Purchase</th>
                    <th>D-Invoice #</th>
                    <th>Current Balance</th>
                  </tr>
                </thead>
                <tbody>
                @if(count($result)>0)
                @foreach($result as $results)
                @php
                $invoice = DB::select("select* from purchase where supplier_name = '$results->pk_id' and purchase_type = 'purchase'");
                $total_q1 = DB::select("select SUM(quantity) from detail_purchase,purchase where detail_purchase.purchase_id = purchase.pk_id and purchase.supplier_name = '$results->pk_id' and purchase.purchase_type = 'purchase'");
                $total_q2 = DB::select("select SUM(quantity) from detail_tax_purchase,purchase where detail_tax_purchase.purchase_id = purchase.pk_id and purchase.supplier_name = '$results->pk_id' and purchase.purchase_type = 'purchase'");
             
                $total_purchase = $total_q1[0]->{'SUM(quantity)'} + $total_q2[0]->{'SUM(quantity)'};

                $total_purchase = DB::select("select SUM(total_amount)  from purchase where supplier_name = '$results->pk_id' ");
               

                @endphp
                  <tr>
                    <td>{{$results->supplier_name}}</td>
                    <td>{{number_format($total_purchase[0]->{'SUM(total_amount)'})}}</td>
                    
                       <td><a href="{{url('/')}}/admin/home/view/purchase/{{$results->pk_id}}">{{count($invoice)}} Invoice</a></td>
                    <td>PKR {{number_format($results->current_balance)}}</td>
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