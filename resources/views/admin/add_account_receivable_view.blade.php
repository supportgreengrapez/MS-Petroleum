@extends('admin.layout.appadmin')
@section('content')
    

    <!-- page content -->
    <div class="right_col" role="main">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="viewadminhead">
            <h2>Account Receivable</h2>
          </div>
        </div>
      </div>

      <form method="post" action = "{{url('/')}}/admin/home/add/account/receivable" class="login-form">
                   
                   {{ csrf_field() }}
             
             @if($errors->any())
             
             <div class="alert alert-danger">
             <strong></strong> {{$errors->first()}}
             </div>
             @endif

      <div class="row">
        <!--<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">-->
        <!--  <div class="createadmininputs">-->
        <!--    <div class="form-group">-->
        <!--          <label for="usr">Customer Name</label>-->
        <!--          <select class="form-control" id="account_receivable" name="customer_name">-->
        <!--          <option value="">Select Customer</option>-->
        <!--          @if($result>0)-->
        <!--        @foreach($result as $results)-->
        <!--        <option value="{{$results->pk_id}}">{{$results->customer_name}}</option>-->
        <!--        @endforeach-->
        <!--                  @endif-->
        <!--      </select>-->
        <!--        </div>-->
        <!--  </div>-->
        <!--</div>-->
        
        
           <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
          <div class="createadmininputs">
            <div class="form-group">
                  <label for="usr">Customer Name</label>

<select class="selectpicker form-control" data-show-subtext="true" name="customer_name" data-live-search="true" >
                <option  class="form-control" >Select Customer</option>
                  @if($result>0)
          @foreach($result as $results)
        <option class="form-control"  value="{{$results->pk_id}}" >{{$results->customer_name}}</option>
           @endforeach
                  @endif
       
      </select>



                </div>
                
               
          </div>
        </div>
        
        
        
         <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
          <div class="createadmininputs">
            <div class="form-group">
                  <label for="usr">Amount Receivable</label>
                  <input type="text" class="form-control" value="0" id="amount_receivable" name="amount_receivable">
                </div>
          </div>
        </div>
          <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
          <div class="createadmininputs">
            <div class="form-group">
                  <label for="usr">Date</label>
                  <input type="date" class="form-control" id="" name="date">
                </div>
          </div>
        </div>
         
         
      </div>
     <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
          <div class="createadmininputs">
            <div class="form-group">
                  <label for="usr">Amount Received</label>
                  <input type="text" class="form-control" id="" name="amount_received">
                </div>
          </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
          <div class="createadmininputs">
            <div class="form-group">
              <label for="sel1">Receiving Method</label>
              <select class="form-control" id="" name="receiving_method">
                <option value="bank">Bank</option>
                <option value="cash">Cash</option>
              </select>
            </div>
          </div>
        </div>
          <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
          <div class="createadmininputs">
            <div class="form-group">
              <label for="sel1">Receiving Account</label>
              <select class="selectpicker form-control" required="" data-show-subtext="true" name="account_type" id=" " data-live-search="true">
                  <?php foreach ($account_type as $key => $value) {
             
                ?>
                <option  class="form-control"  value="{{$value->pk_id}}" >{{$value->account_name}}</option>
              
              <?php } ?>
              </select>
            </div>
          </div>
        </div>
        
          
      </div>
      
     
        
      <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 col-lg-offset-4">
          <div class="totalamountp">
            <button type="submit" class="amountbtn btn">Save</button>
          </div>
        </div>
      </div>
      </form>
    </div>
    <!-- /page content --> 
  
 @endsection