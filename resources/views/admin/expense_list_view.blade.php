@extends('admin.layout.appadmin')
@section('content')
    
    <!-- page content -->
    <div class="right_col" role="main">
     <div class="row">
       <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <div class="viewadminhead">
            <h2>View Expenses</h2>
          </div>
        </div>
          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <div class="plusbutton">
            <a href="{{URL('/')}}/admin/home/add/expense/view" class="btn pumpplusbtn" title="Add field"><span class="glyphicon glyphicon-plus"></span></a>
          </div>
        </div>
      </div>
      <div class="clearfix"></div>
  <form method="post" action = "{{url('/')}}/admin/home/search/expense" class="login-form" enctype="multipart/form-data">
                   
                   {{ csrf_field() }}




                   @if($errors->any())
             
             <div class="alert alert-success">
             <strong></strong> {{$errors->first()}}
             </div>
             @endif 
                   
                   <div class="row">
                       <div class="col-lg-6 col-sm-12">
                           <div class="alert alert-info">
  <strong>Info!</strong>  Please tick the check box whom you want to filte..
</div>
                       </div>
                   </div>
    <div class="row">
        
        
      <div class="col-lg-2">
        <div class="form-group">
        <label><input type="checkbox" name="id" value="1"> ID</label>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="form-group">
          <label>From</label>
          <input type="number" name="id_from" class="form-control">
        </div>
      </div>
      <div class="col-lg-4">
        <div class="form-group">
          <label>To:</label>
          <input type="number"name="id_to"class="form-control">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-2">
        <div class="form-group">
        <label><input type="checkbox" name="amount" value="1"> Amount</label>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="form-group">
          <label>From</label>
          <input type="number" min="1" name="amount_from" class="form-control">
        </div>
      </div>
      <div class="col-lg-4">
        <div class="form-group">
          <label>To:</label>
          <input type="number" name="amount_to" class="form-control">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-2">
        <div class="form-group">
        <label><input type="checkbox" name="date" value="1"> Date</label>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="form-group">
          <label>From</label>
          <input type="date" id="birthdaytime" name="date_from" class="form-control">
        </div>
      </div>
      <div class="col-lg-4">
        <div class="form-group">
          <label>To:</label>
          <input type="date" id="birthdaytime" name="date_to" class="form-control">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-2">
        <div class="totalamountp">
          <button type="submit" class="amountbtn btn">Filter</button>
        </div>
      </div>
    </div>
  </form>

      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_content">
              <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead class="headbgcolor">
                  <tr>
                    <th>ID</th>
                    <th>Payee</th>
                    <th>Account Name</th>
                    <th>Payment Method</th>
                    <th>Payment Account</th>
                    <th>Description</th>
                    <th>Amount</th>
                    <th>Date</th>
                    <th>Actions</th>
                    
                  </tr>
                </thead>
                <tbody>
                @if(count($result)>0)
                @foreach($result as $results)
                  <tr>
                    <td>{{$results->pk_id}}</td>
                    <td>{{$results->payee}}</td>
                    <td>{{$results->account_name}}</td>
                    <td>{{$results->payment_method}}</td>
                    <td>{{$results->payment_account}}</td>
                    <td>{{$results->description}}</td>
                    <td>PKR {{number_format($results->amount)}}</td>
                    <td>{{$results->date}}</td>
                    <td><a href="{{URL('/')}}/admin/home/edit/expense/view/{{$results->pk_id}}" class="bordersets">Edit</a></td>
                  </tr>
                  @endforeach
          @endif
         
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /page content --> 
  
 @endsection