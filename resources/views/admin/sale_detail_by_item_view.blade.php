@extends('admin.layout.appadmin')
@section('content')
    
    <!-- page content -->
    <div class="right_col" role="main">
      <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
          <div class="viewadminhead">
            <h2>View Sale / {{$result[0]->item_name}}</h2>
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
            <h4>Total Purchase :</h4>
            <p>{{number_format($total_amount[0]->{'SUM(amount)'})}}</p>
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
                    <th>Company Name</th>
                        <th>Supplier Name</th>
                        <th>Account Type</th>
                        <th>Purchase Type</th>
                         <th>Quantity</th>
                          <th>Rate</th>
                          <th>Amount</th>
                            <th>Date</th>
                           
                  </tr>
                </thead>
                <tbody>
                @if(count($result)>0)
                @foreach($result as $results)
                @php
               
                $supplier = DB::select("select* from customer  where pk_id = '$results->customer_name'");
              @endphp
                  <tr>
                    <td>{{$results->sale_id}}</td>
                     <td>{{$results->company_name}}</td>
                      <td>{{$supplier[0]->customer_name}}</td>
                      <td>{{$results->account_type}}</td>
                  
                    <td>{{$results->sale_type}}</td>
                    <td>{{$results->quantity}}</td>
                    <td>{{$results->rate}}</td>
                    <td>{{$results->amount}}</td>
                    <td>{{$results->created_at}}</td>    
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