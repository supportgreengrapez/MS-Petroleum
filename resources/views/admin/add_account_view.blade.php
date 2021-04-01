@extends('admin.layout.appadmin')
@section('content') 
<style>
    
    .cls{
        display:none;
    }
</style>

<!-- page content -->
<div class="right_col" role="main">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="viewadminhead">
        <h2>Create Chart of Account</h2>
      </div>
    </div>
  </div>
  <form method="post" action = "{{url('/')}}/admin/home/add/account" class="login-form">
    {{ csrf_field() }}
    
    @if($errors->any())
    <div class="alert alert-danger"> <strong></strong> {{$errors->first()}} </div>
    @endif
    <div class="row">
      <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
        <div class="createadmininputs">
          <div class="form-group">
            <label for="sel1">Nature of Account</label>
            
            <select class="selectpicker form-control" id="noa" data-show-subtext="true" name="detail_type" data-live-search="true">
             <option >Select</option> 
              <option value="Fixed_Asset">Fixed Asset</option>
              <option value="Current_Asset">Current Asset</option>
              <option value="Account_Payable">Account Payable (A/P)</option>
              <option value="Account_Reciveable">Account Reciveable (A/R)</option>
              <option value="Expense">Expense</option>
              <option value="Revenue">Revenue</option>
              <option value="Liabilities">Liabilities</option>
              <option value="Purchase">Purchase</option>
              
              <option value="Cash_and_Cash_Equilants">Cash and Cash Equilants</option>
              
              <option value="Capital">Capital</option>
            </select>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
        <div class="createadmininputs">
          <div class="form-group">
            <label for="sel1">Account Type</label>
             <select class="cls Fixed form-control" id="Account_Payable"  name="account_type" >
               
             <option >Select</option> 
            <option value="Account Payable (A/P)">Account Payable (A/P)</option>
           
            </select>
            
            
            
              <select class="cls Fixed form-control" id="Account_Reciveable"  name="account_type" >
               
             <option >Select</option> 
            <option value="Account Reciveable (A/R)">Account Reciveable (A/R)</option>
          
            </select>
            
            
            <select class="cls Fixed form-control" id="Purchase"  name="Purchase" >
               
               <option >Select</option> 
              <option value="Purchase">Purchase</option>
            
              </select>
              
            
            
            <select class="cls Fixed form-control" id="Fixed_Asset"  name="account_type" >
               
             <option >Select</option> 
            <option value="Land">Land</option>
            <option value="Vehicles">Vehicles</option>
              <option value="Buildings">Buildings</option>
              <option value="Machinery">Machinery</option>
            
            </select>
            
            
              <select class="cls Fixed form-control" id="Current_Asset"  name="account_type" >
               
             <option >Select</option> 
            <option value="Inventory">Inventory</option>
           
            
            </select>
            
            
                  <select class="cls Fixed form-control" id="Expense"  name="account_type" >
               
             <option >Select</option> 
            <option value="Cost of Labour">Cost of Labour</option>
            <option value="Dues and Subscription">Dues and Subscription</option>
            <option value="Equipments Rent">Equipments Rent</option>
            <option value="Utilities">Utilities</option>
           
            
            </select>
            
            
            
            
          <select class="cls Current form-control" id="Revenue"  name="Revenue" >
               
             
            <option value="Sales Retail">Sales Retail</option>
              <option value="Sales Wholesale">Sales Wholesale</option>
               <option value="Income">Income</option>
            </select>



            <select class="cls Current form-control" id="Cash_and_Cash_Equilants"  name="Cash_and_Cash_Equilants" >
               
             
               <option value="Cash on Hand">Cash on Hand</option>
                 <option value="Bank">Bank</option>
                  <option value="Savings">Savings</option>
               </select>
            
             <select class="cls Current form-control" id="Liabilities"  name="account_type" >
               
             <option >Select</option> 
            <option value="Liabilities">Liabilities</option>
              
            </select>
            
             <select class="cls Current form-control" id="Capital"  name="account_type" >
               
             <option >Select</option> 
            <option value="Owners Equity">Owners Equity</option>
               <option value="Accumulated adjustment">Accumulated adjustment</option>
            </select>
           
          
          </div>
        </div>
      </div>
      <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
        <div class="createadmininputs">
          <div class="form-group">
            <label for="usr">Account Name</label>
          
            <input list="account_name" name="account_name"  class="form-control" id="" autocomplete="off">

         
  <datalist id="account_name">
  @if($account_name>0)
          @foreach($account_name as $results)
        
                    
                  <option value="{{$results->account_name}}{{$results->sub_account}}" >
                  
                    
           @endforeach
                  @endif
       
  </datalist>



          </div>
        </div>
      </div>
      <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
        <div class="createadmininputs">
          <div class="form-group">
            <label for="usr">Description</label>
            <input type="text" name="description" class="form-control" id="">
          </div>
        </div>
      </div>
      <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
        <div class="createadmininputs">
          <div class="form-group">
            <label for="usr">Balance</label>
            <input type="text" name="balance" class="form-control" id="">
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
        <div class="createadmininputs">
          <div class="form-group">
            <label for="usr">Date</label>
            <input type="text" class="form-control" id="mydate" name="date">
          </div>
        </div>
      </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <label for="myCheck">Is Sub-Account?</label> 
            <input type="checkbox" id="myCheck" onclick="myFunction()">

            <div id="text" style="display:none">
            <div class="createadmininputs">
          <div class="form-group">
            <label for="sel1">Parent Account</label>
            <select class="selectpicker form-control" data-show-subtext="true"  name="sub_account" data-live-search="true">
               
            <option value="">Select</option>
            <option value="Owners Equity">Owners Equity</option>
            <option value="Cash and Cash Equivalents">Cash and Cash Equivalents</option>
              <option value="Account Receivable">Account Receivable</option>
              <option value="Account Payable">Account Payable</option>
              <option value="Expense">Expense</option>
              <option value="Cash On Hand">Cash On Hand</option>
              <option value="Bank Account">Bank Account</option>
              <option value="Sale Manegment">Sale Management</option>
              <option value="Purchase Manegment">Purchase Management</option>
            </select>
          </div>
        </div>
            </div>
        </div>
    </div>
    <div class="row">
      <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
        <div class="totalamountp">
          <button type="submit" class="amountbtn btn">Save</button>
        </div>
      </div>
    </div>
  </form>
</div>
<!-- /page content --> 

@endsection 