@extends('admin.layout.appadmin')
@section('content')
    
<form method="post" action = "{{url('/')}}/admin/home/edit/purchase/{{$result1[0]->pk_id}}" class="login-form" enctype="multipart/form-data">
                   
                   {{ csrf_field() }}
              
             @if($errors->any())
             
             <div class="alert alert-danger">
             <strong></strong> {{$errors->first()}}
             </div>
             @endif
    <!-- page content -->
    <div class="right_col" role="main">
      <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
          <div class="viewadminhead">
            <h2>Edit Purchase</h2>
          </div>
        </div>

         <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
         
          <div class="invoicestopright">
          <h4>purchase Invoice #</h4>
           <p>{{$result1[0]->pk_id}}</p>
          </div>
        
         </div>
      </div>
      <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
          <div class="createadmininputs">
            <div class="form-group">
                  <label for="usr">Supplier Name</label>
                  <select class="form-control" id="supplier_name" name="supplier_name">
                  <option value="">Select Supplier</option>
               
                  @if($supplier>0)
          @foreach($supplier as $results)
                  <option value="{{$results->pk_id}}" @if($results->pk_id == $result1[0]->supplier_name) selected @endif >{{$results->supplier_name}}</option>
                  @endforeach
                  @endif
              </select>
                </div>
          </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
          <div class="createadmininputs">
            <div class="form-group">
              <label for="sel1">Account Type</label>
              <select class="form-control" id="" name="account_type">
                <option value="cash" @if($result1[0]->account_type == 'cash') selected @endif>Cash</option>
                <option value="credit" @if($result1[0]->account_type == 'credit') selected @endif>Credit (A/P)</option>
              </select>
            </div>
          </div>
        </div>
          <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
          <div class="createadmininputs">
            <div class="form-group">
                  <label for="usr">Purchase Type</label>
                  <select class="form-control" id="" name="purchase_type">
                <option value="purchase" @if($result1[0]->purchase_type == 'purchase') selected @endif>purchase</option>
                <option value="purchase return" @if($result1[0]->purchase_type == 'purchase return') selected @endif>purchase Return</option>
              </select>
                </div>
          </div>
        </div>
          <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
          <div class="createadmininputs">
            <div class="form-group">
                  <label for="usr">Company Name</label>
                  <input type="text" value="{{$result1[0]->company_name}}" class="form-control" id="" name="company_name">
                </div>
          </div>
        </div>
          <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
          <div class="createadmininputs">
            <div class="form-group">
                  <label for="usr">Vehicle No</label>
                  <input type="text" class="form-control" id="" value="{{$result1[0]->vehicle_no}}" name="vehicle_no">
                </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
         
         <div class="invoicestopright">
         <h4>Bills #</h4>
          <p id="bills">{{$result1[0]->supplier_name}}</p>
         </div>
       
        </div>
     
      @if(count($result)>0)
      @foreach($result as $results)
      <div class="container-fluid">
        
             <div class="field_wrapper">
               <div class="borderrow">
           <div class="row">
          
            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
              <div class="createadmininputs">
                <div class="form-group">
                  <label for="usr">SKU</label>
                  <select class="form-control" id="sku" name="sku[]">
                  <option value="">Select Item SKU</option>
                  @if($inventory>0)
          @foreach($inventory as $inventories)
                  <option value="{{$inventories->sku}}" @if($inventories->sku == $results->sku) selected @endif>{{$inventories->sku}}</option>
                  @endforeach
                  @endif
              </select>
                </div>
              </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
              <div class="createadmininputs">
                <div class="form-group">
                  <label for="usr">Item Name</label>
                  <input type="text" class="form-control" name="item_name[]" value="{{$results->item_name}}" id="name">
                </div>
              </div>
            </div>
           
          
             <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
              <div class="createadmininputs">
                <div class="form-group">
                  <label for="usr">Quantity</label>
                  <input type="text" class="form-control" value="{{$results->quantity}}" id="quantity" name="quantity[]" >
                </div>
              </div>
            </div>
             <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
              <div class="createadmininputs">
                <div class="form-group">
                  <label for="usr">Rate</label>
                  <input type="text" class="form-control" id="rate" name="rate[]" value="{{$results->rate}}" >
                </div>
              </div>
               
            </div>
            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
            <div class="createadmininputs">
            <div class="form-group">
              <label for="usr">Amount</label>
              <input type="text" class="form-control" id="amount" value="{{$results->amount}}" name="amount[]" disabled>
            </div>
          </div>
           
        </div>
            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
              <div class="plusbutton">
                <button class="add_buttonsale plusbtn" title="Add field"><span class="glyphicon glyphicon-plus"></span></button>
              </div>
            </div>
          </div>
          </div>
        </div>
         </div>
      @endforeach
    @endif
        <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 col-lg-offset-6">
          <div class="totalamounth">
            <h3>Total Amount</h3>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
          <div class="totalamountp">
            <p id="total">{{$result1[0]->total_amount}}</p>
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
   @endsection