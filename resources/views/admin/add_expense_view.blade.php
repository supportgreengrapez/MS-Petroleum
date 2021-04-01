@extends('admin.layout.appadmin')
@section('content')

<form method="post" action = "{{url('/')}}/admin/home/add/expense" class="login-form">
                   
                   {{ csrf_field() }}
             
             @if($errors->any())
             
             <div class="alert alert-success">
             <strong></strong> {{$errors->first()}}
             </div>
             @endif 
    
    <!-- page content -->
    <div class="right_col" role="main">
      <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <div class="viewadminhead">
            <h2>Create Expenseeds</h2>
          </div>
        </div>
      
      

      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <div class="plusbutton">
            <a href="{{url('/')}}/admin/home/add/account" class="btn pumpplusbtn" title="Add field"><span class="glyphicon glyphicon-plus"></span></a>
          </div>
        </div>
    
        </div>


      
      <div class="row">
        <div class="field_wrapper ">
          <div class="borderrow">
            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
              <div class="createadmininputs">
                <div class="form-group">
                  <label for="usr">Payee</label>
                  
                  <select class="selectpicker form-control" data-show-subtext="true" name="payee" id="usr" data-live-search="true">
                <option  class="form-control" >Select Customer</option>
                  @if($customer>0)
          @foreach($customer as $results)
        <option  class="form-control"  value="{{$results->customer_name}}" >{{$results->customer_name}} </option>
        @endforeach
                  @endif
                  @if($supplier>0)
          @foreach($supplier as $results)
        <option  class="form-control"  value="{{$results->supplier_name}}" >{{$results->supplier_name}}</option>
        @endforeach
                  @endif


       
      </select>
                </div>
              </div>
            </div>
          


            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
              <div class="createadmininputs">
                <div class="form-group">
                  <label for="sel1">Nature of Account</label>
             




                  <select class="selectpicker form-control" data-show-subtext="true" id="" name="main_acc" data-live-search="true">
                <option  class="form-control" >Select Account</option>
                  @if($result>0)
          @foreach($result as $results)
        <option  class="form-control"  value="{{$results->pk_id}}" >{{$results->account_type}}</option>
           @endforeach
                  @endif
       
      </select>




                 
                </div>
              </div>
            </div>





            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
              <div class="createadmininputs">
                <div class="form-group">
                  <label for="sel1">Account Name</label>
             

                  <select class="selectpicker form-control" data-show-subtext="true" id="" name="account_name" data-live-search="true">
               
                <option  class="form-control" >Select Account</option>
                  @if($result>0)
          @foreach($result as $results)
        <option  class="form-control"  value="{{$results->pk_id}}" >{{$results->account_name}}{{$results->sub_account}}</option>
           @endforeach
                  @endif
       
      </select>




                 
                </div>
              </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
              <div class="createadmininputs">
                <div class="form-group">
                  <label for="sel1">Payment Method</label>
                  <select class="form-control" id="" name="payment_method">
                    <option value="cash">Cash</option>
                    <option value="bank">bank</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
              <div class="createadmininputs">
                <div class="form-group">
                  <label for="sel1">Payment Account</label>



                  <select class="selectpicker form-control" data-show-subtext="true"  id="" name="payment_account" data-live-search="true">
                <option  class="form-control" >Select Account</option>
                  @if($result1>0)
          @foreach($result1 as $results)
        <option  class="form-control"  value="{{$results->account_name}}" >{{$results->account_name}}</option>
           @endforeach
                  @endif
       
      </select>



                  <!-- <select class="form-control" id="" name="payment_account[]">
                  <option value="">Select Account</option>
                  <option value="cash">Cash on Hand</option>
                  @if(count($result1)>0)
                  @foreach($result1 as $results)
                    <option value="{{$results->account_name}}">{{$results->account_name}}</option>
               @endforeach
               @endif
                  </select> -->
                </div>
              </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
              <div class="createadmininputs">
                <div class="form-group">
                  <label for="usr">Description</label>
                  <input type="text" class="form-control" id="" name="description">
                </div>
              </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
              <div class="createadmininputs">
                <div class="form-group">
                  <label for="usr">Amount</label>
                  <input type="text" class="form-control" id=""name="amount" >
                </div>
              </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
              <div class="plusbutton">
                <button class="add_button plusbtn" type="button" title="Add field"><span class="glyphicon glyphicon-plus"></span></button>
              </div>
            </div>
          </div>
        </div>
      </div>
    
      <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 col-lg-offset-7">
          <div class="totalamountp">
            <button type="submit" class="amountbtn btn">Save</button>
          </div>
        </div>
      </div>
    </div>
    <!-- /page content --> 
    </form>
  @endsection