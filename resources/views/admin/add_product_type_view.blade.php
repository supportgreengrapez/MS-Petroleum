@extends('admin.layout.appadmin')
@section('content')

    
    <!-- page content -->
    <div class="right_col" role="main">
    
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="viewadminhead">
            <h2>Create Item Name</h2>
          </div>
        </div>
      </div>
      <form method="post" action = "{{url('/')}}/admin/home/add/product/type" class="login-form">
                   
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
                  <label for="usr">Item</label>
                  <a href="{{ url('/admin/home/add/main/category') }}" target="_blank">Add Category</a>
                  <select class="selectpicker form-control" data-show-subtext="true" name="mainCategory" id="mainCategory"  data-live-search="true" required>
               
                 
                  <option value="" disable="true" selected="true" >---Select Item---</option>
                  @if($result>0)
              @foreach($result as $results)
                      <option value="{{urlencode($results->main_category)}}">{{$results->main_category}}</option>
                      @endforeach
                      @endif
    
                  </select>
                </div>
          </div>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
      <div class="createadmininputs">
           <div class="form-group">
                  <label for="usr">Sub Item</label>
                  <a href="{{ url('/admin/home/add/sub/category') }}" target="_blank">Add new</a>
                  <select class="form-control" name="sub_item" id="SubCategory" required>
                  <option value="" disable="true" selected="true">---Select Sub Item---</option>
                  </select>
                </div>
          </div>
    </div>
     <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
      <div class="createadmininputs">
           <div class="form-group">
                  <label for="usr">Item Name</label>
                  <input type="text" name="name" class="form-control" id="">
                </div>
          </div>
    </div>
    
     <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
      <div class="createadmininputs">
           <div class="form-group">
                  <label for="usr">Descriptional (Optional)</label>
                  <textarea class="form-control" rows="9" name="description"></textarea>
                </div>
          </div>
    </div>
    </div>
    
      <div class="row">
       <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
          <div class="editpart">
            <button type="submit" class="btnedit btn">Save</button>
          </div>
        </div>
      </div>
    </form>
     </div>
    <!-- /page content --> 
  


      @endsection
