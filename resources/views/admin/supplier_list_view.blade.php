@extends('admin.layout.appadmin')
@section('content') 

<!-- page content -->
<div class="right_col" role="main">
  <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
      <div class="viewadminhead">
        <h2>View Supplier</h2>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
      <div class="plusbutton"> <a href="{{url('/')}}/admin/home/add/supplier" class="btn pumpplusbtn" title="Add Supplier"><span class="glyphicon glyphicon-plus"></span></a> </div>
    </div>
  </div>
  <div class="clearfix"></div>
  <form method="post" action = "{{url('/')}}/admin/home/search/supplier" class="login-form" enctype="multipart/form-data">
                   
                   
                   {{ csrf_field() }}
                  
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
          <input type="text" name="id_from" class="form-control">
        </div>
      </div>
      <div class="col-lg-4">
        <div class="form-group">
          <label>To:</label>
          <input type="text"name="id_to"class="form-control">
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
          <input type="datetime-local" id="birthdaytime" name="date_from" class="form-control">
        </div>
      </div>
      <div class="col-lg-4">
        <div class="form-group">
          <label>To:</label>
          <input type="datetime-local" id="birthdaytime" name="date_to" class="form-control">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-2">
        <div class="form-group">
        <label><input type="checkbox" name="opening_balance" value="1"> Opening Blance</label>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="form-group">
          <label>From</label>
          <input type="number" min="1" name="opening_balance_from" class="form-control">
        </div>
      </div>
      <div class="col-lg-4">
        <div class="form-group">
          <label>To:</label>
          <input type="number" name="opening_balance_to" class="form-control">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-2">
        <div class="form-group">
        <label><input type="checkbox" name="current_balance" value="1"> Current Balance</label>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="form-group">
          <label>From</label>
          <input type="number" min="1" name="current_balance_from" class="form-control">
        </div>
      </div>
      <div class="col-lg-4">
        <div class="form-group">
          <label>To:</label>
          <input type="number" name="current_balance_to" class="form-control">
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
                <th>Supplier Name</th>
                <th>Opening Balance</th>
                <th>Current Balance</th>
                <th>Date</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
            
            @if(count($result)>0)
            @foreach($result as $results)
            <tr>
              <td>{{$results->pk_id}}</td>
              <td>{{$results->supplier_name}}</td>
              <td>PKR {{number_format($results->opening_balance)}}</td>
              <td>PKR {{number_format($results->current_balance)}}</td>
              <td>{{$results->date}}</td>
              <td><a href="{{url('/')}}/admin/home/supplier/detail/view/{{$results->pk_id}}" class="bordersets">view</a> 
              @if(session('Supplier_Management_delete')==1)
              &nbsp;&nbsp;<a href="#" onclick="getId(this.id)"  data-toggle="modal" data-target="#myModal{{$results->pk_id}}">Delete</a>
              @endif
              </td>
            </tr>
            
            <!-- Modal -->
            <div class="modal fade" id="myModal{{$results->pk_id}}" role="dialog">
              <div class="modal-dialog"> 
                
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Confirmation Message</h4>
                  </div>
                  <div class="modal-body">
                    <p>You are about to delete <b><i class="title"></i></b> record, this procedure is irreversible.</p>
                    <p>Do you want to proceed?</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                    <a href="{{url('/')}}/admin/home/delete/supplier/{{$results->pk_id}}" class="btn btn-danger">Yes</a> </div>
                </div>
              </div>
            </div>
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