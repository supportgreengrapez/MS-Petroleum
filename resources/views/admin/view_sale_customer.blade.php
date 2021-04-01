@extends('admin.layout.appadmin')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
      <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
          <div class="viewadminhead">
            <h2>View Sale / By Customer</h2>
          </div>
        </div>
      </div>
      <div class="row">
       <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
         <div class="Totalpurchasehead">
         <h4>Customer Name :</h4>
          <p>{{$customer[0]->customer_name}}</p>
         </div>       
      </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
         <div class="Totalpurchasehead">
         <h4>Balance :</h4>
          <p>PKR {{number_format($customer[0]->current_balance)}}</p>
         </div>       
      </div>
     
        
  
      
       <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
         <div class="Totalpurchasehead">
         <h4>Total Sale :</h4>
          <p>PKR {{number_format($total_amount)}}</p>
         </div>       
      </div>


      <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="Totalpurchasehead">
            <h4>Billing Address :</h4>
          <p>{{$customer[0]->billing_address}}</p>
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
                        <th>Bills #</th>
                        <th>Sale</th>
                    
                        <th>Qty</th>
                        <th>Account Type</th>
                         <th>Sale Type</th>
                         <th>Balance</th>
                          <th>Amount</th>
                          <th> Status </th>
                            <th>Date</th>
                             <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                @if(count($result1)>0)
                @foreach($result1 as $results)
                @php
               
               $total_q1 = DB::select("select SUM(quantity) from detail_sale where sale_id = '$results->pk_id'");
               $total_q2 = DB::select("select SUM(quantity) from detail_tax_sale where sale_id = '$results->pk_id'");
           
               @endphp
                   <tr>
                   <td>{{$results->pk_id}}</td>
                   <td>{{$result1[0]->pk_id}}</td>
                   <td>{{$results->sale}}</td>
                   
                      @if($results->sale == "tax")
                   <td>{{number_format($total_q2[0]->{'SUM(quantity)'})}}</td>
                   @else
                   <td>{{number_format($total_q1[0]->{'SUM(quantity)'})}}</td>
                   @endif

                <?php $account_type= DB::table('account')->where('pk_id',$results->account_type)->first();
                        if(empty($account_type)){ ?>
                         
                      <td>{{$results->account_type}}</td>

                      <?php }else{ ?>

                         <td>{{$account_type->account_name}}</td>
                         
                       <?php } ?>


                      @if($results->sale == "tax")
                   <td>Tax</td>
                   @else
                   <td>Normal</td>
                  
                   @endif
                     

   @php
                   $balance= ($results->total_amount)  -$results->paid_amount
                   @endphp
                   <td>{{$balance    }}   </td>
<td>PKR {{number_format($results->total_amount)}}</td>

 @if( $results->paid_amount   == $results->total_amount )
<td>  Paid 
</td>

@elseif($results->paid_amount   != $results->total_amount )
<td>  Open</td> 
@endif



                      <td>{{$results->created_at}}</td>
                        <td><a href="{{url('/')}}/admin/home/view/sale/detail/{{$results->pk_id}}/{{$results->sale}}" class="bordersets">view</a> 
                        
                        
                        @if($results->sale=="invoice")
                        <a href="{{url('/')}}/admin/home/create/sale/payment/{{$results->pk_id}}/{{$results->sale}}" target="_blank" class="bordersets">Create Payment</a> 
                     @endif   
                        
                        </td>
                            
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