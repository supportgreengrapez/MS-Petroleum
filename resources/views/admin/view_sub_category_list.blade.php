@extends('admin.layout.appadmin')
@section('content')

    
    <!-- page content -->
    <div class="right_col" role="main">
      <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
          <div class="viewadminhead">
            <h2>View Sub Items</h2>
          </div>
        </div>
         <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="plusbutton"> <a href="{{URL('/')}}/admin/home/add/sub/category" class="btn pumpplusbtn" title="Add field"><span class="glyphicon glyphicon-plus"></span></a> </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="dropbtnstyle">
              <div class="dropdown">
                <button class="btn dropdown-toggle" type="button" data-toggle="dropdown">
                Select Field <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="{{URL('/')}}/admin/home/view/sub/category">View Sub Items</a></li>
                  <li><a href="{{URL('/')}}/admin/home/view/main/category">View Items</a></li>
                  
                  <li><a href="{{URL('/')}}/admin/home/view/product/type">View Items Name</a></li>
                  
                </ul>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_content">
              <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead class="headbgcolor">
                  <tr>
                    <th>ID</th>
                    <th>SKU</th>
                    <th>Item</th>
                     <th>Sub Item</th>
                     <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                @if(count($result)>0)
                @foreach($result as $results)
                <tr>
                  <td>{{$results->SKU}}</td>
                  <td>{{$results->sub_item_id}}</td>
                  <td>{{$results->main_category}}</td>
                  <td>{{$results->sub_category}}</td>
                     <td><a href="#" onclick="getId(this.id)"  data-toggle="modal" data-target="#myModal{{$results->SKU}}" class="">Delete</a> &nbsp;&nbsp;<a href="{{URL('/')}}/admin/home/edit/sub/category/{{$results->SKU}}">Edit</a></td>
                  </tr>

                  <!-- Modal -->
  <div class="modal fade" id="myModal{{$results->SKU}}" role="dialog">
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
          <a href="{{URL('/')}}/admin/home/delete/sub/category/{{$results->SKU}}" class="btn btn-danger">Yes</a>
        </div>
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
