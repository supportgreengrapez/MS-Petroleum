@extends('admin.layout.appadmin')
@section('content')

    
    <!-- page content -->
    <div class="right_col" role="main">
    
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="viewadminhead">
            <h2>Create Inventory</h2>
          </div>
        </div>
      </div>
      <form method="post" action = "{{url('/')}}/admin/home/add/inventory" class="login-form">
                   
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
            
              <a type="button" class="bordersets" data-toggle="modal" data-target="#myModal" required>
              Add Category 
              
  </a>
              <select class="form-control" name="item" id="mainCategory" >
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
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
      <div class="createadmininputs">
           <div class="form-group">
              <label for="sel1">Sub Item</label>
              <a type="button" class="bordersets" data-toggle="modal" data-target="#myModal2" required>
              Add new  
  </a>
              <select class="form-control" name="sub_item" id="SubCategory" >
              <option value="" disable="true" selected="true">---Select Sub Item---</option>
              </select>
            </div>
          </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
      <div class="createadmininputs">
            <div class="form-group">
                  <label for="usr">Item Name</label>
                  <input type="text" name="name" class="form-control" id="usr" required >
                </div>
          </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
      <div class="createadmininputs">
           <div class="form-group">
                  <label for="usr">UOM(Unit Of Measurement)</label>
                 
                  <select class="form-control" name="uom" class="form-control" required>
              <option value="" d>Select UOM</option>
              <option value="kg" d>kg</option>
              <option value="litter" d>litter</option>
              <option value="pieces" d>pieces</option>
              </select>
                </div>
          </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
      <div class="createadmininputs">
            <div class="form-group">
                  <label for="usr">Current Stock</label>
                  <input type="text" name="stock" value="0" class="form-control" id="usr" required>
                </div>
          </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
      <div class="createadmininputs">
           <div class="form-group">
                  <label for="usr">Opening Balance(PKR)</label>
                  <input type="number" value="0" name="opening_balance" class="form-control" id="usr">
                </div>
          </div>
    </div>












    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
      <div class="createadmininputs">
            <div class="form-group">
                  <label for="usr">Description</label>
                  <textarea class="form-control" name="description" rows="9"></textarea>
                </div>
          </div>
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
     </div>
    <!-- /page content --> 
    
   



  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Modal Heading</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <form method="post" action = "{{url('/')}}/admin/home/add/main/category" >
                            {{ csrf_field() }}
                            
                    @if($errors->any())
                    <div class="alert alert-success"> <strong></strong> {{$errors->first()}} </div>
                    @endif
               
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="createadmininputs">
                          <div class="form-group">
                          <label for="usr">Item</label>
                  <input type="text" name="mainCategory"  class="form-control" id="" >
                          </div>
                        </div>
                      </div>
                     
       <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
          <div class="editpart">
            <button type="submit" class="btn edit btn">Save</button>
          </div>
        
      </div>

</form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>






  <!-- The Modal -->
  <div class="modal" id="myModal2">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Modal Heading</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
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
            <button type="submit" class="btn edit btn">Save</button>
          </div>
        </div>
      </div>
    </form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>




   @endsection
