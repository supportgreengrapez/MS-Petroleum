@extends('admin.layout.appadmin')
@section('content')
    
<form method="post" action = "{{url('/')}}/admin/home/add/purchase" class="login-form" enctype="multipart/form-data">
                   
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
            <h2>Create Purchase / Normal Entry</h2>
          </div>
        </div>

  

         <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
         
          <div class="invoicestopright">
          <h4>purchase Invoice #</h4>
           <p>00{{$sale_id}}</p>
          </div>
        
         </div>

         <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
          <!-- <div class="plusbutton">
            <a href="{{url('/')}}/admin/home/add/supplier" class="btn pumpplusbtn" title="Add Supplier"><span class="glyphicon glyphicon-plus"></span></a>
          </div> -->
        </div>
      </div>
      <div class="row">
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
                  <label for="usr">Supplier Name</label>
                  <a class="bordersets" data-toggle="modal" data-target="#modal_fullscreen"> Add  </a>


                  <input list="supplier_names" class=" form-control"  id="supplier_name" name="supplier_name"  autocomplete="off"  required>
  <datalist id="supplier_names">
  @if($result>0)
          @foreach($result as $results)
        
                    
                  <option value="{{$results->pk_id}}" >{{$results->supplier_name}}</option>
                  
                    
           @endforeach
                  @endif
       
  </datalist>


 <!-- <select class="selectpicker form-control" data-show-subtext="true" id="supplier_name" name="supplier_name" data-live-search="true">
                <option  class="form-control" >Select Supplier</option>
                  @if($result>0)
          @foreach($result as $results)
        <option  class="form-control"  value="{{$results->pk_id}}" >{{$results->supplier_name}}</option>
           @endforeach
                  @endif
       
      </select> -->


                  <!-- <select class="form-control" id="supplier_name" name="supplier_name">
                  <option value="">Select Supplier</option>
                  @if($result>0)
          @foreach($result as $results)
                  <option value="{{$results->pk_id}}">{{$results->supplier_name}}</option>
                  @endforeach
                  @endif
              </select> -->

                </div>
          </div>
        </div>
       

        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
          <div class="createadmininputs">
            <div class="form-group">
                  <label for="usr">Account Type</label>
                  
                  
                      <input type="text" class="form-control" value="Credit" placeholder="Credit" name="account_type" readonly>
                  
                  
       
      </div>
          </div>
        </div>


          <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
          <div class="createadmininputs">
            <div class="form-group">
                  <label for="usr">purchase Type</label>
                   
              <select class="form-control" id="purchase_type" name="purchase_type" required>
                
                 <option value="purchase" >Purchase</option>
                 <option value="return">Purchase Return</option>
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
         
         <!-- <div class="invoicestopright">
         <h4>D-Invoice</h4>
          <p id="bills">0</p>
         </div> -->
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
                  <label for="item_name">Name</label>
                    

                  <input list="names" class=" form-control"   id="name"  name="item_name[]" autocomplete="off" >
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
                  <input type="text" class="form-control" id="quantity" name="quantity[]" required>
                </div>
              </div>
            </div>
             <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
              <div class="createadmininputs">
                <div class="form-group">
                  <label for="usr">Rate</label>
                  <input type="text" class="form-control" id="rate" name="rate[]" required>
                </div>
              </div>
               
            </div>
            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
            <div class="createadmininputs">
            <div class="form-group">
              <label for="usr">Amount</label>
              <input type="text" class="form-control" id="amount" name="amount[]" disabled>
            </div>
          </div>
           
        </div>
            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
              <div class="plusbutton">
                <button type="button" class="add_buttonsale plusbtn" title="Add field"><span class="glyphicon glyphicon-plus"></span></button>
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
            <p id="total">0</p>
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
    <!-- /page content --> 
    
   
  <div class="modal fade modal-fullscreen" id="modal_fullscreen" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="myModalLabel">Add Supplier</h4>
                </div>
                <div class="modal-body"> 
             
                <form method="post" action = "{{url('/')}}/admin/home/add/supplier" class="login-form" enctype="multipart/form-data">
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
                  <label for="usr">Supplier Name</label>
                  <input type="text" name="supplier_name" class="form-control" id="usr" required>
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
                  <input type="text" name="phone" class="form-control" id="">
                </div>
          </div>
    </div>
    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
      <div class="createadmininputs">
            <div class="form-group">
                  <label for="usr">Billing Address</label>
                  <input type="text" name="billing_address" class="form-control" id="">
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



    
    
   @endsection