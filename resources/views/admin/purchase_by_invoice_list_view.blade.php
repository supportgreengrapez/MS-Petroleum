@extends('admin.layout.appadmin')
@section('content')
    
    <!-- page content -->
    <div class="right_col" role="main">
      <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
          <div class="viewadminhead">
            <h2>View Purchase</h2>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
          
         
            
            <div class="dropbtnstyle" style="margin-top:15px;">
              <div class="dropdown">
                <button class="btn dropdown-toggle" type="button" data-toggle="dropdown">
                Select Field <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                     <li><a href="{{url('/')}}/admin/home/view/purchase/by/item">View Purchase/By Item</a></li>
                  <li><a href="{{url('/')}}/admin/home/view/purchase/by/invoice">View Purchase</a></li>
                  
                </ul>
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
            <h4>Total Sale :</h4>
            <p>{{number_format($total_amount[0]->{'SUM(total_amount)'})}}</p>
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
                  <th>PI #</th>
                    <th>Supplier Name</th>
                    <th>Account Type</th>
                    <th>Purchase Type</th>
                    <th>Company Name</th>
                    <th>Vehicle #</th>
                    <th>Total Amount</th>
                    <th>date</th>
                  </tr>
                </thead>
                <tbody>
               
                @if(count($result)>0)
                @foreach($result as $results)
                @php
                $supplier = DB::select("select* from supplier  where pk_id = '$results->supplier_name'");
             @endphp
                  <tr>
                    <td>{{$results->pk_id}}</td>
                    <td></td>
                    <td>{{$results->account_type}}</td>
                    <td>{{$results->purchase_type}}</td>
                    <td>{{$results->company_name}}</td>
                    <td>{{$results->vehicle_no}}</td>
                    <td>{{$results->total_amount}}</td>
                      <td><a href="{{url('/')}}/admin/home/view/purchase/detail/by/invoice/{{$results->pk_id}}" class="">View</a></td>
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