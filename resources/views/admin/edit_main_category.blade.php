@extends('admin.layout.appadmin')
@section('content')
    
    <!-- page content -->
    <div class="right_col" role="main">
    
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="viewadminhead">
            <h2>Edit Item</h2>
          </div>
        </div>
      </div>
      @if($result>0)
                        @foreach($result as $results)
                        <form method="post" action = "{{url('/')}}/admin/home/edit/main/category/{{$results->SKU}}" class="login-form">
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
                  <input type="text" value="{{$results->main_category}}" name="mainCategory"  class="form-control" id="">
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
    @endforeach
            @endif
     </div>
    <!-- /page content --> 
    
  

          @endsection
