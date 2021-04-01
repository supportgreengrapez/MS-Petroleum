@extends('admin.layout.appadmin')
@section('content')
    

    <!-- page content -->
    <div class="right_col" role="main">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="viewadminhead">
            <h2>Account Payable</h2>
          </div>
        </div>
      </div>

      <form method="post" action = "{{url('/')}}/admin/home/add/account/payable" class="login-form">
                   
                   {{ csrf_field() }}
             
             @if($errors->any())
             
             <div class="alert alert-danger">
             <strong></strong> {{$errors->first()}}
             </div>
             @endif

      <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
         <div class="createadmininputs">
       <div class="form-group">
       



       

        
        
                  <label for="usr">Supplier Name</label>

                  <select class="selectpicker form-control" data-show-subtext="true" id="" name="supplier_name" data-live-search="true">
                <option  class="form-control" >Select Supplier</option>
                  @if($result>0)
          @foreach($result as $results)
        <option  class="form-control"  value="{{$results->pk_id}}" >{{$results->supplier_name}}</option>
           @endforeach
                  @endif
       
      </select>
                
                  
                </div>
               
               
          </div>
        </div>
        
        
        
         <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
          <div class="createadmininputs">
            <div class="form-group">
                  <label for="usr">Amount Paybale</label>
                  <input type="text" class="form-control" value="0" id="amount_payable" name="amount_payable">
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
                  <label for="usr">Amount Payed</label>
                  <input type="text" class="form-control" id="" name="amount_payed">
                </div>
          </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
          <div class="createadmininputs">
            <div class="form-group">
              <label for="sel1">Paying Method</label>
              <select class="form-control" id="" name="paying_method">
                <option value="bank">Bank</option>
                <option value="cash">Cash</option>
              </select>
            </div>
          </div>
        </div>
          <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
          <div class="createadmininputs">
            <div class="form-group">
              <label for="sel1">Paying Account</label>

                
                 <select class="selectpicker form-control" required="" data-show-subtext="true" name="account_type" id=" " data-live-search="true">
                  <?php foreach ($account_type as $key => $value) {
             
                ?>
                <option  class="form-control"  value="{{$value->pk_id}}" >{{$value->account_name}}</option>
                
              <?php } ?>
              </select>

              
             <!--  <select class="form-control" id="" name="receiving_account">
              <option value="">Select Account</option>
                <option value = "HBL">HBL</option>
                <option value="MCB">MCB</option>
              </select> -->
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