@extends('admin.layout.appadmin')
@section('content') 
    
    <!-- page content -->
    <div class="right_col" role="main">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="viewadminhead">
            <h2>Create Machine</h2>
          </div>
        </div>
      </div>
      <form method="post" action = "{{url('/')}}/admin/home/edit/machine/{{$result[0]->pk_id}}" class="login-form">
                   
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
                  <label for="usr">Pump Name</label>
            
                  <input type="text" class="form-control" value="@if(count($result1)>0) {{$result1[0]->pump_name}}  @endif" name="pump_name">
                
                </div>
          </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
          <div class="createadmininputs">
            <div class="form-group">
              <label for="sel1">Tank Name</label>
              <select class="form-control" id="" name="tank_name">
              @if(count($result2)>0)
              @foreach($result2 as $results)
                <option value="{{$results->pk_id}}" @if($result[0]->tank_id == $results->pk_id) selected @endif>{{$results->tank_name}}</option>
                @endforeach
                @endif
               
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="field_wrapper ">
          <div class="borderrow">
            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
              <div class="createadmininputs">
                <div class="form-group">
                  <label for="usr">Machine Name</label>
                  <input type="text" class="form-control" value="{{$result[0]->machine_name}}" id="usr" name="machine_name">
                </div>
              </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
              <div class="createadmininputs">
                <div class="form-group">
                  <label for="usr">Closing Reading</label>
                  <input type="text" class="form-control" id="usr" value="{{$result[0]->closing_reading}}" name="closing_reading">
                </div>
              </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
              <div class="createadmininputs">
                <div class="form-group">
                  <label for="usr">Rate</label>
                  <input type="text" class="form-control" id="" value="{{$result[0]->rate}}"  name="rate">
                </div>
              </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
              <div class="createadmininputs">
                <div class="form-group">
                  <label for="usr">Current Dip</label>
                  <input type="text" class="form-control" value="{{$result[0]->current_dip}}" id="" name="current_dip">
                </div>
              </div>
            </div>
            <!-- <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
              <div class="plusbutton">
                <button href="javascript:void(0);" class="add_buttonmachine plusbtn" title="Add field"><span class="glyphicon glyphicon-plus"></span></button>
              </div>
            </div> -->
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
      </form>
    </div>
    <!-- /page content --> 
    
   @endsection