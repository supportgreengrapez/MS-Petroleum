@extends('admin.layout.appadmin')
@section('content')
    
<form method="post" action = "{{url('/')}}/admin/home/add/sale/tax" class="login-form" enctype="multipart/form-data">
                   
                   {{ csrf_field() }}
             
             @if($errors->any())
             
             <div class="alert alert-danger">
             <strong></strong> {{$errors->first()}}
             </div>
             @endif 
    <!-- page content -->
    <div class="right_col" role="main">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <div class="viewadminhead">
            <h2>Create Sale / Tax Applicable</h2>
          </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
         
         <div class="invoicestopright">
         <h4>sale Invoice #</h4>
          <p>{{$sale_id}}</p>
         </div>
       
        </div>
  

        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
          <div class="plusbutton">
            <a href="{{url('/')}}/admin/home/add/customer" class="btn pumpplusbtn" title="Add Customer"><span class="glyphicon glyphicon-plus"></span></a>
          </div>
        </div>
         </div>
         <div class="row">

         <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
         
         <div class="createadmininputs invoicestopright">
            <h4>STI #</h4>
                  <input type="text" class="form-control" id="" name="sti">
          </div>
        
         </div>
      <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
      <div class="createadmininputs invoicestopright">
      <h4>Date</h4>
      <input type="text" class="form-control" id="mydate" name="date">
                  </div>
      </div>
      </div>
      <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
          <div class="createadmininputs">
            <div class="form-group">
                  <label for="usr">Customer Name</label>

                  <a class="bordersets" data-toggle="modal" data-target="#modal_fullscreen"> Add  </a>

<input list="customer_names" class=" form-control"  id="customer_name" name="customer_name"  autocomplete="off"  required>
<datalist id="customer_names">
@if($result>0)
@foreach($result as $results)

        
      <option value="{{$results->pk_id}}" >{{$results->customer_name}}</option>
      
        
@endforeach
      @endif

</datalist>


                </div>
          </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
          <div class="createadmininputs">
            <div class="form-group">
              <label for="sel1">Account Type</label>
              <input type="text" class="form-control" value="credit"  name="account_type" readonly>
              
            </div>
          </div>
        </div>
          <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
          <div class="createadmininputs">
            <div class="form-group">
                  <label for="usr">Sale Type</label>
                  <select class="form-control" id="" name="sale_type">
                <option value="sale">sale</option>
                <option value="return">Sale Return</option>
              </select>
                </div>
          </div>
        </div>
          <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
          <div class="createadmininputs">
            <div class="form-group">
                  <label for="usr">Company Name</label>
                  <input type="text" class="form-control" id="" name="company_name">
                </div>
          </div>
        </div>
          <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
          <div class="createadmininputs">
            <div class="form-group">
                  <label for="usr">Vehicle No</label>
                  <input type="text" class="form-control" id="" name="vehicle_no">
                </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
         
       
       
        </div>
      <div class="container-fluid">
             <div class="field_wrapper">
               <div class="borderrow">
           <div class="row">
          
            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
              <div class="createadmininputs">
                <div class="form-group">
                  <label for="usr">SKU</label>


                  <input list="skus" class=" form-control"  id="sku" name="sku[]"  autocomplete="off" required>
  <datalist id="skus">
  @if($inventory>0)
          @foreach($inventory as $results)
        
                    
                  <option value="{{$results->sku}}" >
                  
                    
           @endforeach
                  @endif
       
  </datalist>

                  
                </div>
              </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
              <div class="createadmininputs">
                <div class="form-group">
                  <label for="usr">Item Name</label>
                  <!-- <input type="text" class="form-control" name="item_name[]" id="name" autocomplete="off">
                   <div id="itemlist">
    </div> -->
                
           



            <input list="names" class=" form-control"   id="name"  name="item_name[]" autocomplete="off" required>
  <datalist id="names">
  @if($inventory>0)
          @foreach($inventory as $results)
        
                    
                  <option value="{{$results->name}}" >
                  
                    
           @endforeach
                  @endif
       
  </datalist>
  </div>
               
               
               </div>
             </div>
          
             <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
              <div class="createadmininputs">
                <div class="form-group">
                  <label for="usr">Quantity</label>
                  <input type="text" class="form-control" value="0" id="quantitys" name="quantity[]" >
                </div>
              </div>
            </div>
             <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
              <div class="createadmininputs">
                <div class="form-group">
                  <label for="usr">Rate</label>
                  <input type="text" class="form-control" value="0" id="rates" name="rate[]" >
                </div>
              </div>
               
            </div>
     
        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
            <div class="createadmininputs">
            <div class="form-group">
              <label for="usr">Percentage of Tax</label>
              <input type="text" value="0" class="form-control" id="tax" name="tax[]" >
            </div>
          </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
            <div class="createadmininputs">
            <div class="form-group">
              <label for="usr">Tax Amount</label>
              <input type="text" class="form-control" id="tax_amount" name="tax_amount[]" >
            </div>
          </div>
        </div>

            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
            <div class="createadmininputs">
            <div class="form-group">
              <label for="usr">Amount</label>
              <input type="text" class="form-control" id="amounts" name="amount[]" >
            </div>
          </div>
        </div>


            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
              <div class="plusbutton">
                <button type="button" class="add_buttontax plusbtn" title="Add field"><span class="glyphicon glyphicon-plus"></span></button>
              </div>
            </div>
          </div>
          </div>
        </div>
         </div>
     
        <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 col-lg-offset-6">
          <div class="totalamounth">
            <h3>Total Amount</h3>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
          <div class="totalamountp">
            <p id="totals">0</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 col-lg-offset-9">
          <div class="totalamountp">
            <button type="submit" class="amountbtn btn">Save</button>
          </div>
        </div>
     
      </div>
    </div>
    </form>








    <div class="modal fade modal-fullscreen" id="modal_fullscreen" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="myModalLabel">Add Customer</h4>
                </div>
                <div class="modal-body"> 
             
                <form method="post" action = "{{url('/')}}/admin/home/add/customer" class="login-form" enctype="multipart/form-data">
                      {{ csrf_field() }}
                      @if($errors->any())

<div class="alert alert-danger">
  <strong></strong> {{$errors->first()}}
</div>
@endif
    <div class="row">
    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
      <div class="createadmininputs">
           <div class="form-group">
                  <label for="usr">Customer Name</label>
                  <input type="text" name="customer_name" class="form-control" id="usr" required>
                </div>
          </div>
    </div>
    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
      <div class="createadmininputs">
             <div class="form-group">
                  <label for="usr">CNIC No</label>
                  <input type="text" name="cnic" class="form-control" id="">
                </div>
          </div>
    </div>
    </div>
    <div class="row">
     <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
      <div class="createadmininputs">
           <div class="form-group">
                  <label for="usr">Phone No</label>
                  <input type="text" name="phone" class="form-control" id="" required>
                </div>
          </div>
    </div>
    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
      <div class="createadmininputs">
            <div class="form-group">
                  <label for="usr">Billing Address</label>
                  <input type="text" name="billing_address" class="form-control" id="" required> 
                </div>
          </div>
    </div>
    </div>
    <div class="row">
   <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
      <div class="createadmininputs">
           <div class="form-group">
                  <label for="usr">National Tax Number</label>
                  <input type="text" name="ntn" class="form-control" id="">
                </div>
          </div>
    </div>
      <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
      <div class="createadmininputs">
            <div class="form-group">
                  <label for="usr">Sales Tax Registration Number</label>
                  <input type="text" name="strn" class="form-control" id="">
                </div>
          </div>
    </div>
    </div>
    
    <div class="row">
     <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
      <div class="createadmininputs">
           <div class="form-group">
                  <label for="usr">Opening Balance(PKR)</label>
                  <input type="text" name="opening_balance" value="0" class="form-control" id="">
                </div>
          </div>
    </div>
    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
      <div class="createadmininputs">
           <div class="form-group">
                  <label for="usr">Current Balance(PKR)</label>
                  <input type="text" name="current_balance" value="0" class="form-control" id="">
                </div>
          </div>
    </div>
    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
        <div class="viewadminbtn">
            <button type="submit" class="btnedit btn" style="float:left !important;">Save</button>
          </div>
    </div>
    </div>
    
    </form>



                   </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>











    <!-- /page content --> 
   @endsection