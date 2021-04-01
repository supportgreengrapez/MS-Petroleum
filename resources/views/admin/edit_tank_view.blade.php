@extends('admin.layout.appadmin')
@section('content') 
    <!-- page content -->
    <div class="right_col" role="main">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="viewadminhead">
            <h2>Edit Tank</h2>
          </div>
        </div>
      </div>
      <form method="post" action = "{{url('/')}}/admin/home/edit/tank/{{$result[0]->pk_id}}" class="login-form" enctype="multipart/form-data">
                   
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
                  <input type="text" class="form-control" id="" value= "{{$result1[0]->pump_name}}" name = "pump_name" disabled>
                </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 col-lg-offset-1">
          <div class="createadmininputs">
             <div class="form-group">
                  <label for="usr">Pump Address</label>
                  <input type="text" class="form-control" id="" value= "{{$result1[0]->pump_address}}" name = "pump_address" disabled>
                </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="field_wrapper">
          <div class="borderrow">
            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
              <div class="createadmininputs">
                <div class="form-group">
                  <label for="usr">Tank Name</label>
                  <input type="text" class="form-control" value= "{{$result[0]->tank_name}}" id="usr" name="tank_name">
                </div>
              </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
              <div class="createadmininputs">
                <div class="form-group">
                  <label for="usr">Total Capacity</label>
                  <input type="text" class="form-control" id="" value= "{{$result[0]->total_capacity}}" name="total_capacity">
                </div>
              </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
              <div class="createadmininputs">
                <div class="form-group">
                  <label for="usr">Total Dip</label>
                  <input type="text" class="form-control" id="" value= "{{$result[0]->total_dip}}" name="total_dip">
                </div>
              </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
              <div class="createadmininputs">
                <div class="form-group">
                  <label for="usr">Opening Stock</label>
                  <input type="text" class="form-control" id="" value= "{{$result[0]->opening_stock}}" name="opening_stock">
                </div>
              </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
              <div class="createadmininputs">
                <div class="form-group">
                  <label for="usr">Unit Of Measurement</label>
                  <input type="text" class="form-control" id="" value= "{{$result[0]->uom}}"  name="uom">
                </div>
              </div>
            </div>
             <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
              <div class="createadmininputs">
                <div class="form-group">
                  <label for="usr">Opening Balance</label>
                  <input type="text" class="form-control" id="" value= "{{$result[0]->opening_balance}}"  name="opening_balance">
                </div>
              </div>
            </div>
             <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
              <div class="createadmininputs">
                <div class="form-group">
                  <label for="usr">Opening Dip</label>
                  <input type="text" class="form-control" id="" value= "{{$result[0]->opening_dip}}"  name="opening_dip">
                </div>
              </div>
                 <!-- <div class="plusbutton">
                <button href="javascript:void(0);" class="add_button2 plusbtn" title="Add field"><span class="glyphicon glyphicon-plus"></span></button>
              </div> -->
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
    </div>
    <!-- /page content --> 
    
    @endsection