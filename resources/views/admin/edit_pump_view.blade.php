@extends('admin.layout.appadmin')
@section('content') 
    <!-- page content -->
    <div class="right_col" role="main">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="viewadminhead">
            <h2>Create Pump</h2>
          </div>
        </div>
      </div>
      @if(count($result)>0)
      <form method="post" action = "{{url('/')}}/admin/home/edit/pump/{{$result[0]->pk_id}}" class="login-form" enctype="multipart/form-data">
                   
                   {{ csrf_field() }}
             
             @if($errors->any())
             
             <div class="alert alert-danger">
             <strong></strong> {{$errors->first()}}
             </div>
             @endif 
      <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
          <div class="createadmininputs">
            <div class="form-group">
                  <label for="usr">Pump Name</label>
                  <input type="text" class="form-control" id="" value="{{$result[0]->pump_name}}" name = "pump_name">
                </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 col-lg-offset-1">
          <div class="createadmininputs">
             <div class="form-group">
                  <label for="usr">Pump Address</label>
                  <input type="text" class="form-control" id="" value="{{$result[0]->pump_address}}" name = "pump_address">
                </div>
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
      @endif
    </div>
    <!-- /page content --> 
    
    @endsection