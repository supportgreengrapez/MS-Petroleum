@extends('admin.layout.appadmin')
@section('content')
    
    <!-- page content -->
    <div class="right_col" role="main">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="viewadminhead">
            <h2>Create Bank Deposit</h2>
          </div>
        </div>
      </div>

      
      <form method="post" action = "{{url('/')}}/admin/home/add/bank/deposit" class="login-form">
                   
                   {{ csrf_field() }}


                   @if($errors->any())
             
             <div class="alert alert-success">
             <strong></strong> {{$errors->first()}}
             </div>
             @endif 

      <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
          <div class="createadmininputs">
            <div class="form-group">
                  <label for="usr">Account</label>
                  <select class="form-control selectpicker" name="bank_account" data-show-subtext="true" data-live-search="true">
                  <option value=""> </option>
                  @if($result>0)
          @foreach($result as $results)
                  <option value="{{$results->account_name}}">{{$results->account_name}}</option>
                  @endforeach
                  @endif
       
      </select>
                </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 col-lg-offset-1">
          <div class="createadmininputs">
             <div class="form-group">
                  <label for="usr">Date</label>
                  <input type="text" class="form-control" id="mydate" name="date">
                </div>
          </div>
        </div>
      </div>
      <div class="row">
          <div class="borderrow">
            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
              <div class="createadmininputs">
                <div class="form-group">
                  <label for="usr">Received From</label>
                 
                 
                  <select class="form-control selectpicker"  data-show-subtext="true" name="recive_from" data-live-search="true">
                  <option value=""> </option>
                  @if($result1>0)
          @foreach($result1 as $results)
                  <option value="{{$results->customer_name}}">{{$results->customer_name}}</option>
                  @endforeach
                  @endif
      </select>
     
                </div>
              </div>
            </div>
            <!-- <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
              <div class="createadmininputs">
                <div class="form-group">
                  <label for="usr">Account Type</label>
                  
                  <select class="form-control selectpicker" data-show-subtext="true" name="main_acc" data-live-search="true">
                  <option value=""> </option>
                  @if($result>0)
          @foreach($result as $results)
                  <option value="{{$results->pk_id}}">{{$results->account_name}}</option>
                  @endforeach
                  @endif
      </select>
     
                </div>
              </div>
            </div> -->



            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
              <div class="createadmininputs">
                <div class="form-group">
                  <label for="usr"> Account Name</label>
                  
                  <select class="form-control selectpicker" data-show-subtext="true" name="account_type" data-live-search="true">
                  <option value=""> </option>
                  @if($sub_account>0)
          @foreach($sub_account as $results)
                  <option value="{{$results->pk_id}}"> {{$results->sub_account}}</option>
                  @endforeach
                  @endif
      </select>
     
                </div>
              </div>
            </div>




            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
              <div class="createadmininputs">
                <div class="form-group">
                  <label for="usr">Description</label>
                  <input class="form-control" name="description" >
                </div>
              </div>
            </div>
            <!-- <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
              <div class="createadmininputs">
                <div class="form-group">
                  <label for="usr">Payment Method</label>
                  <select class="form-control selectpicker" name="method" data-show-subtext="true" data-live-search="true">
                  <option value=""> </option>
        <option >Cash</option>
       
      </select>
                </div>
              </div>
            </div> -->
             <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
              <div class="createadmininputs">
                <div class="form-group">
                  <label for="usr">Amount</label>
                  <input type="number" name = "amount" class="form-control">
                </div>
              </div>
            </div>
         
          </div>
      </div>
      
      <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 col-lg-offset-9">
          <div class="totalamountp">
            <button type="submit"  class="amountbtn btn">Save</button>
          </div>
        </div>
      </div>
</form>
    </div>
    <!-- /page content --> 
    
    @endsection