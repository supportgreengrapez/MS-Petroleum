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
      @if($result1>0)
      @foreach($result1 as $results)
    <form method="post" action = "{{url('/')}}/admin/home/edit/sub/category/{{$results->SKU}}" class="login-form">
                        
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
                         <option value="{{$results->main_category}}" @if($results->main_category == $result1[0]->main_category) selected @endif>{{$results->main_category}}</option>
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
                  @if($result1>0)
                  <input type="text" name="subCategory"  value="{{$result1[0]->sub_category}}" class="form-control" id="">
                  @endif
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
