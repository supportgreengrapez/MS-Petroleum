@extends('admin.layout.appadmin')
@section('content') 

<!-- page content -->
<div class="right_col" role="main">
<div class="row">
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"></div>
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <div class="plusbutton">
          <a href="{{url('/')}}/admin/home/add/supplier" class="btn pumpplusbtn" title="Add Supplier"><span class="glyphicon glyphicon-plus"></span></a>
          </div>
        </div>
</div>
  <div class="row">
    <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
      <div class="viewadminhead">
        <h2>Create Pump Purchase / Nomal Entry</h2>
      </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
      <div class="machinename">
        <h4>{{$pump[0]->pump_name}}</h4>
        <h5>{{$pump[0]->pump_address}}</h5>
      </div>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
      <div class="invoicestopright">
        <h4>Purchase Invoive #</h4>
        <p>{{$sale_id}}</p>
      </div>
    </div>
  </div>
  <form method="post" action = "{{url('/')}}/admin/home/add/pump/purchase/{{$pump_id}}" class="login-form" enctype="multipart/form-data">
    {{ csrf_field() }}
    
    @if($errors->any())
    <div class="alert alert-danger"> <strong></strong> {{$errors->first()}} </div>
    @endif
<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
          <div class="createadmininputs">
             <div class="form-group">
                  <label for="usr">Date</label>
                  <input type="date" class="form-control" id="" name ="date">
                </div>
          </div>
        </div>
        </div>
    <div class="row">
      <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
        <div class="createadmininputs">
          <div class="form-group">
            <label for="usr">Supplier Name</label>
            <select class="form-control" name="supplier_name">
              
              
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
            <label for="usr">Purchase Type</label>
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
    <div class="row">
      <div class="field_wrapper ">
        <div class="borderrow">
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
                <input type="text" class="form-control" id="quantity" name="quantity[]" >
              </div>
            </div>
          </div>
          <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
            <div class="createadmininputs">
              <div class="form-group">
                <label for="usr">Rate</label>
                <input type="text" class="form-control" id="rate" name="rate[]" >
              </div>
            </div>
          </div>
          <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
            <div class="createadmininputs">
              <label for="usr">Amount</label>
              <input type="text" class="form-control" id="amount" name="amount[]" disabled>
            </div>
          </div>
          <div class="col-lg-1 col-md-1 col-sm-12 col-xs-12">
            <div class="plusbutton">
              <button type="button" class="add_buttoncppr plusbtn" title="Add field"><span class="glyphicon glyphicon-plus"></span></button>
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
  </form>
</div>
<!-- /page content --> 

@endsection