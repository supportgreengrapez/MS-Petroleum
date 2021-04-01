@extends('admin.layout.appadmin')
@section('content') 

<!-- page content -->
<div class="right_col" role="main">
  <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
      <div class="viewadminhead">
        <h2>Create Pump Purchase</h2>
      </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
      <div class="machinename">
        <h4>{{$pump[0]->pump_name}}</h4>
        <h4>{{$pump[0]->pump_address}}</h4>
      </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
      <div class="invoicestopright">
        <h4>Purchase Invoive #</h4>
        <p>{{$id}}</p>
      </div>
    </div>
  </div>
  <form method="post" action = "{{url('/')}}/admin/home/edit/pump/purchase/{{$id}}" class="login-form" enctype="multipart/form-data">
    {{ csrf_field() }}
    
    @if($errors->any())
    <div class="alert alert-danger"> <strong></strong> {{$errors->first()}} </div>
    @endif
    <div class="row">
      <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
        <div class="createadmininputs">
          <div class="form-group">
            <label for="usr">Supplier Name</label>
            <select class="form-control" name="supplier_name">
              
              
                  @if($result>0)
          @foreach($result as $results)
                  
              
              <option value="{{$results->pk_id}}" @if($supplier == $results->pk_id) selected @endif>{{$results->supplier_name}}</option>
              
              
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
            <input type="text" class="form-control" value="{{$result1[0]->company_name}}" id="" name="company_name">
          </div>
        </div>
      </div>
      <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
        <div class="createadmininputs">
          <div class="form-group">
            <label for="usr">Vehicle No</label>
            <input type="text" class="form-control" value="{{$result1[0]->vehicle_no}}" id="" name="vehicle_no">
          </div>
        </div>
      </div>
    </div>
    @if(count($detail)>0)
      @foreach($detail as $details)
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
          @foreach($tank as $result)
                  
                  
                  <option value="{{$result->pk_id}}" @if($details->tank_id == $result->pk_id) selected @endif >{{$result->tank_name}}</option>
                  
                  
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
                  
                  
                  <option value="{{$results->sku}}" @if($details->sku == $results->sku) selected @endif >{{$results->sku}}</option>
                  
                  
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
                <input type="text" class="form-control" value="{{$details->item_name}}" name="item_name[]" id="name">
              </div>
            </div>
          </div>
          <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
            <div class="createadmininputs">
              <div class="form-group">
                <label for="usr">Quantity</label>
                <input type="text" class="form-control" id="quantity" value="{{$details->quantity}}" name="quantity[]" >
              </div>
            </div>
          </div>
          <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
            <div class="createadmininputs">
              <div class="form-group">
                <label for="usr">Rate</label>
                <input type="text" class="form-control" id="rate" value="{{$details->rate}}" name="rate[]" >
              </div>
            </div>
          </div>
          <div class="col-lg-1 col-md-1 col-sm-12 col-xs-12">
            <div class="createadmininputs">
              <h5>Amount</h5>
              <input type="text" class="form-control" id="amount" name="amount[]" value="{{$details->amount}}" disabled>
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
  </form>
</div>
<!-- /page content --> 

@endsection