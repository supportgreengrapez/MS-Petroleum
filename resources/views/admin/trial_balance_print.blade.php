@extends('admin.layout.appadmin')
    @section('content')
    
    <!-- page content -->
    <div class="right_col" role="main">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="viewadminhead">
            <h2>Trial Balance</h2>
          </div>
        </div>
      </div>
      
      
      <div class="row">
        <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 col-lg-offset-2">
          <div class="Adminprofilebox">
            <div class="row">
             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
               <div class="accountpayablehead">
             <h4>Trial Balance</h4>
             <!-- <p>January 1-Faburary 10</p> -->
             </div>
             </div>
            
            </div>
            
            <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              
                <thead class="headbgcolor2">
                  <tr>
                    <th></th>
                    <th>Debit</th>
                    <th>Credit </th>
                   
                    
                    
                  </tr>
                </thead>
                <tbody>
                <tbody>
              
                  <tr>
                    <td >Sale </td>
                    <td>000</td>
                     <td>{{number_format($sale_inc)}}</td>
                     
                   
                  </tr>
                
                
                
       
               
                  <tr>
                  <td>Cash in Hand</td>
                  
                     <td>{{number_format($coh_inc)}}</td>

                   @if(($coh_dec)>0) 
                  
                    <td>{{number_format($coh_dec)}}</td>
                  @else
            <td>000</td>
        
                   @endif
                   
                  </tr>
                 
                  <tr>
                  <td>Account Reciveable</td>
                  <td>{{number_format($lib_inc)}}</td>
                  <td>000</td>
                   
                    
                   
                  </tr>
                
                  @if($detail_purchase>0)
         
                  <tr>
                  <td>Account payable</td>
                  <td>{{number_format($detail_purchase_sum_return)}}</td>
                     <td>{{number_format($detail_purchase_sum)}}</td>
                     
                   
                  </tr>
                 
                  @endif


                  @if($expense>0)
                
          @foreach($expense as $results)
         <tr>
         <td>{{$results->account_name}}</td>
         <td>{{number_format($expense_inc)}}</td>
         <td>000</td>
         
         </tr>
         @endforeach
         @endif




                  @if($Capital>0)
          @foreach($Capital as $results)
                  <tr>
                  <td>{{$results->account_name}}</td>
                  <td>000</td>
                     <td>{{number_format($Capital_inc)}}</td>
                    
                   
                  </tr>
                  @endforeach
                  @endif


                  @if($Capital_sub>0)
          @foreach($Capital_sub as $results)
                  <tr>
                  <td>{{$results->sub_account}}</td>
                  <td>000</td>
                     <td>{{number_format($Capital_sub_inc)}}</td>
                    
                   
                  </tr>
                  @endforeach
                  @endif

                  @if($Capital_sub_decrease>0)
          @foreach($Capital_sub_decrease as $results)
                  <tr>
                 
                  <td>{{$results->sub_account}}</td>
                  
                     <td>{{number_format($Capital_sub_dec)}}</td>
                    
                     <td>000</td>
                  </tr>
                  @endforeach
                  @endif

                  @if($detail_purchase>0)
          @foreach($detail_purchase as $results)


                  <tr>
                
                  <td>{{$results->item_name}}</td>
                 
                     <td>{{number_format($results->amount)}}</td>
                     <td>000</td>
                  
                  </tr>
                  @endforeach
                  @endif


                  @if($detail_purchase_return>0)
          @foreach($detail_purchase_return as $results)


                  <tr>
                
                  <td>{{$results->item_name}}</td>
                  <td>000</td>
                     <td>{{number_format($results->amount)}}</td>
                    
                  
                  </tr>
                  @endforeach
                  @endif


                </tbody>
              </table>
           <div class="row">
           <div class="col-lg-7 col-md-9 col-sm-12 col-xs-12">
            <div class="totalpayabletable">
            <h4>Total</h4>
           </div>
           </div>
            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
            <div class="totalpayabletable">
             
            <p>PKR {{number_format(($total_amount2)+($expense_inc)
           
            +($detail_purchase_sum)+($lib_inc)+($Capital_sub_dec))}}</p>
           
           </div>
           </div>
           <div class="col-lg-1 col-md-1 col-sm-12 col-xs-12">
             <div class="totalpayabletable">
            
            <p>PKR {{number_format(($total_amount)+($pur_inc)+($detail_purchase_sum)+($Capital_inc)+($total_amount3)+($Capital_sub_inc))}}</p>
           
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