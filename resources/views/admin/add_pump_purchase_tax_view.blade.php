@extends('admin.layout.appadmin')
@section('content')
    
<form method="post" action = "{{url('/')}}/admin/home/add/pump/purchase/tax/{{$pump_id}}" class="login-form" enctype="multipart/form-data">
                   
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
            <h2>Create Pump Purchase / Tax Applicable</h2>
          </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
         
         <div class="invoicestopright">
         <h4>Purchase Invoice #</h4>
          <p>{{$sale_id}}</p>
         </div>
       
        </div>
  

         <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
         
         <div class="createadmininputs invoicestopright">
            <h4>STI #</h4>
                  <input type="text" class="form-control" id="" name="sti">
          </div>
        
         </div>
      </div>
      <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
          <div class="createadmininputs">
            <div class="form-group">
                  <label for="usr">Supplier Name</label>
                  <select class="form-control" id="supplier" name="supplier_name" required>
                  <option value="">Select Supplier</option>
                  @if($result>0)
          @foreach($result as $results)
                  <option value="{{$results->pk_id}}">{{$results->supplier_name}}</option>
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
                <option value="cash">Cash</option>
                <option value="credit">Credit (A/P)</option>
              </select>
            </div>
          </div>
        </div>
          <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
          <div class="createadmininputs">
            <div class="form-group">
                  <label for="usr">purchase Type</label>
                  <select class="form-control" id="" name="purchase_type">
                <option value="purchase">purchase</option>
                <option value="purchase return">purchase Return</option>
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
         
         <div class="invoicestopright">
         <h4>p-Invoice #</h4>
          <p id="invoice">0</p>
         </div>
       
        </div>
      <div class="container-fluid">
             <div class="field_wrapper">
               <div class="borderrow">
           <div class="row">
           <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
            <div class="createadmininputs">
              <div class="form-group">
                <label for="usr">Tank Name</label>
                <select class="form-control" name ="tank_name[]">
                  <option value="">Select Tank</option>
                  
                  
                  @if($tank>0)
          @foreach($tank as $results)
                  
                  
                  <option value="{{$results->pk_id}}">{{$results->tank_name}}</option>
                  
                  
                  @endforeach
                  @endif
              
                
                </select>
              </div>
            </div>
          </div>
            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
              <div class="createadmininputs">
                <div class="form-group">
                  <label for="usr">SKU</label>
                  <select class="form-control" id="sku" name="sku[]">
                  <option value="">Select Item SKU</option>
                  @if($inventory>0)
          @foreach($inventory as $results)
                  <option value="{{$results->sku}}">{{$results->sku}}</option>
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
                  <input type="text" class="form-control" name="item_name[]" id="name">
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
    <!-- /page content --> 
   @endsection