@extends('admin.layout.appadmin')
@section('content')

    
    <!-- page content -->
    <div class="right_col" role="main">
    
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="viewadminhead">
            <h2>Create Sub Item</h2>
          </div>
        </div>
      </div>
      <form method="post" action = "{{url('/')}}/admin/home/add/sub/category" class="login-form">
                   
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
                  <select class="form-control" name="mainCategory">
                @if($result>0)
                @foreach($result as $results)
                       <option value="{{$results->main_category}}">{{$results->main_category}}</option>
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
                  <input type="text" name="subCategory" class="form-control" id="">
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
