
    @extends('admin.layout.appadmin')
    @section('content')
    <!-- page content -->
    <div class="right_col" role="main">
      <div class="row">
        
            <h2>Sale Report</h2>
          
      </div>
    
 
      <div class="row">
        <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 col-lg-offset-2">
          <div class="Adminprofilebox">
            <div class="row">
             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
               <div class="accountpayablehead">
               <h2>Company Name</h2>
             <h4>Sale Report by Customer</h4>
             <p>January 1-Faburary 10</p>
             </div>
             </div>
            
            </div>
            
            <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead class="headbgcolor2">
                  <tr>
                    <th></th>
                    <th>Credit Rs</th>
                    
                    
                  </tr>
                </thead>
                <tbody>
                @if(count($result)>0)
                @foreach($result as $results)
                @php
                $customer = DB::select("select* from customer  where pk_id = '$results->customer_name'");
             @endphp
                  <tr>
                    <td >{{$customer[0]->customer_name}}</td>
                     <td>{{$results->total_amount}}</td>
                   
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
           
             <p>{{number_format($total_amount[0]->{'SUM(total_amount)'})}}</p>
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