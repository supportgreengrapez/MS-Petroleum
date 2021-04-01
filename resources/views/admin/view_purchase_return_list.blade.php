@extends('admin.layout.appadmin')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
      <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
          <div class="viewadminhead">
            <h2>View Purchases Return / By Supplier</h2>
          </div>
        </div>
         <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="machinename">
         <h4>{{$result1[0]->billing_address}}</h4>
         </div>
        </div>
      </div>
      <div class="row">
       <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
         <div class="Totalpurchasehead">
         <h4>Supplier Name :</h4>
          <p>{{$result1[0]->supplier_name}}</p>
         </div>       
      </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
         <div class="Totalpurchasehead">
         <h4>Balance :</h4>
          <p>PKR {{number_format($result1[0]->opening_balance)}}</p>
         </div>       
      </div>
     
        
  
      
       <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
         <div class="Totalpurchasehead">
         <h4>Total Purchases :</h4>
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
                    <th>D-Invoice</th>
                    <th>Company Name</th>
                        <th>Vehicle No</th>
                        <th>Bills #</th>
                        <th>Account Type</th>
                         <th>purchase Type</th>
                          <th>Amount</th>
                            <th>Date</th>
                             <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                @if(count($result)>0)
                @foreach($result as $results)
                   <tr>
                   <td>{{$results->pk_id}}</td>
                     <td>{{$results->company_name}}</td>
                      <td>{{$results->vehicle_no}}</td>
                      <td>001</td>
                      <td>{{$results->account_type}}</td>
                    <td>{{$results->purchase_type}}</td>
                     <td>PKR {{number_format($results->total_amount)}}</td>
                      <td>{{$results->created_at}}</td>
                        <td><a href="{{url('/')}}/admin/home/view/purchase/return/detail/{{$results->pk_id}}" class="bordersets">view</a>  &nbsp;&nbsp;&nbsp;<a href="#"><i class="fa fa-print sizecol"></i></a></td>
                            
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