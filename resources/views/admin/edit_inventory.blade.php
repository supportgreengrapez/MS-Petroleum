@extends('admin.layout.appadmin')
@section('content')

    
    <!-- page content -->
    <div class="right_col" role="main">
    
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="viewadminhead">
            <h2>Edit Inventory</h2>
          </div>
        </div>
      </div>
      @if(count($result)>0)
      <form method="post" action = "{{url('/')}}/admin/home/edit/inventory/{{$result[0]->pk_id}}" class="login-form">
                   
                   {{ csrf_field() }}
             
             @if($errors->any())
             
             <div class="alert alert-danger">
             <strong></strong> {{$errors->first()}}
             </div>
             @endif 

    <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
      <div class="createadmininputs">
            <div class="form-group">
              <label for="sel1">Item</label>
              <select class="form-control" name="item" id="mainCategory" required>
              <option value="" disable="true" selected="true" >---Select Item---</option>
              @if($result1>0)
          @foreach($result1 as $results)
                  <option value="{{urlencode($results->main_category)}}" @if($result[0]->item == $results->main_category) selected @endif>{{$results->main_category}}</option>
                  @endforeach
                  @endif

              </select>
            </div>
          </div>
    </div>
    </div>
    <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
      <div class="createadmininputs">
           <div class="form-group">
              <label for="sel1">Sub Item</label>
              <select class="form-control" name="sub_item" id="SubCategory" required>
              <option value="{{$result[0]->sub_item}}" >{{$result[0]->sub_item}}</option>
              </select>
            </div>
          </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
      <div class="createadmininputs">
            <div class="form-group">
                  <label for="usr">Item Name</label>
                  <input type="text" name="name" value="{{$result[0]->name}}"  class="form-control" id="usr" required>
                </div>
          </div>
    </div>
    </div>
    <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
      <div class="createadmininputs">
           <div class="form-group">
                  <label for="usr">UOM(Unit Of Measurement)</label>
                  <input type="text" value="{{$result[0]->uom}}" name="uom" class="form-control" id="usr">
                </div>
          </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
      <div class="createadmininputs">
            <div class="form-group">
                  <label for="usr">Current Stock</label>
                  <input type="text" name="stock" value="{{$result[0]->stock}}" class="form-control" id="usr">
                </div>
          </div>
    </div>
    </div>
    
    <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
      <div class="createadmininputs">
           <div class="form-group">
                  <label for="usr">Opening Balance(PKR)</label>
                  <input type="text" value="{{$result[0]->opening_balance}}" name="opening_balance" class="form-control" id="usr">
                </div>
          </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
      
    </div>
    </div>
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 col-lg-offset-8">
          <div class="viewadminbtn">
            <button type="submit" class="btnedit btn">Save</button>
          </div>
        </div>
      </div>
    </form>
    @endif
     </div>
    <!-- /page content --> 
    
   

   @endsection
