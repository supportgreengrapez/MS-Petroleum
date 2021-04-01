@extends('admin.layout.appadmin')
@section('content')
<div class="right_col" role="main">
  <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
      <div class="viewadminhead">
        <h2>Receive Payment</h2>
      </div>
    </div>
  </div>
  @if($result1>0)
          @foreach($result1 as $results)
  <form method="post" action ="{{url('/')}}/admin/home/create/sale_invoice/payment/{{$results->pk_id}}" class="login-form" enctype="multipart/form-data">
    
  @endforeach
                  @endif
       
    
    {{ csrf_field() }}
    
    @if($errors->any())
    <div class="alert alert-success"> <strong></strong> {{$errors->first()}} </div>
    @endif
    
     
    
    <div class="row">
      <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
        <div class="createadmininputs">
          <div class="form-group">
            <label for="usr">Customer Name</label>
            
                  @if($customer2>0)
          @foreach($customer2 as $results)
        
              
              <input  class="form-control"  name="customer_name" value="{{$results->customer_name}}" readonly >
              
              
           @endforeach
                  @endif
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
        <div class="createadmininputs">
          <div class="form-group">
            <label for="usr">Payment Date</label>
            <input type="text" class="form-control" id="mydate" name="date">
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
        <div class="createadmininputs">
          <div class="form-group">
            <label for="usr">Payment Method</label>
            <select class="selectpicker form-control" data-show-subtext="true" id="Cash" name="account_type" data-live-search="true">
                <option  class="form-control" >Account Type</option>
              
        <option    value="cash" >Cash</option>
        <option    value="credit" >Credit</option>
       
      </select>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
        <div class="createadmininputs">
          <div class="form-group">
            <label for="usr">Deposit To</label>
            
            <select class="selectpicker form-control" data-show-subtext="true" name="deposit_to" data-live-search="true">
              <option  class="form-control" >Select Deposit to</option>
              
              
                  @if($result>0)
          @foreach($result as $results)
        
              
              <option  class="form-control"  value="{{$results->pk_id}}" >{{$results->customer_name}}</option>
              
              
           @endforeach
                  @endif
       
      
            
            </select>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="borderrow">
        <div class="row">
        @if($result1>0)
          @foreach($result1 as $results)
          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="createadmininputs">
              <div class="form-group">
                <label for="usr">Description</label>
                <input type="text" class="form-control" value="{{$results->pk_id}}Invoice{{$results->bill_date}}" name="description" readonly>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="createadmininputs">
              <div class="form-group">
                <label for="usr">Due Date</label>
                <input type="date" class="form-control"  value="{{$results->due_date}}"  name="due_date" readonly>
              </div>
            </div>
          </div>
         
         

          <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
            <div class="createadmininputs">
              <div class="form-group">
                <label>Orignal Amount</label>
                <input type="text" class="form-control"  value="{{$results->total_amount}}"  name="org_amount" readonly>
              </div>
            </div>
          </div>
         
          <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
            <div class="createadmininputs">
              <div class="form-group">
                <label>Open Balance</label>
                
                <input type="text" class="form-control" value="{{$new_total}}" name="" readonly>
               

              </div>
            </div>
          </div>
          <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
            <div class="createadmininputs">
              <div class="form-group">
                <label>Payment</label>
                <input type="text" class="form-control"  value="{{$results->total_amount}}" name="partial" >
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
          <h3>Amount to apply</h3>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
        <div class="totalamountp">
          <p id="total">0</p>
        </div>
      </div>
    </div>
    <!-- <div class="row">
      <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 col-lg-offset-6">
        <div class="totalamounth">
          <h3>Amount to credit</h3>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
        <div class="totalamountp">
          <p>0</p>
        </div>
      </div>
    </div> -->
    <div class="row">
        <div class="col-lg-6 col-md-3 col-sm-12 col-xs-12">
        <div class="createadmininputs">
              <div class="form-group">
                <label>Memo</label>
                <textarea class="form-control" rows="5" name=""></textarea>
              </div>
            </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 col-lg-offset-3">
        <div class="totalamountp">
          <button type="submit" class="amountbtn btn">Create Payment</button>
        </div>
      </div>
    </div>
  </form>
</div>
@endsection