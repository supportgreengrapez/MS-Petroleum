@extends('admin.layout.appadmin')
    @section('content')
    
    <!-- page content -->
    <div class="right_col" role="main">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="viewadminhead">
            <h2>Inventories Report</h2>
          </div>
        </div>
      </div>
      
      
      <div class="row">
        <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 col-lg-offset-2">
          <div class="Adminprofilebox">
            <div class="row">
             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
               <div class="accountpayablehead">
             <h4>Inventories Report</h4>
             <!-- <p>January 1-Faburary 10</p> -->
             </div>
             </div>
            
            </div>
            
            <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead class="headbgcolor">
                  <tr>
                    <th>SKU</th>
                    <th>Item</th>
                    <th>Sub Item</th>
                    <th>Item Name</th>
                    <th>Current Stock</th>

                  </tr>
                </thead>
                <tbody>
                @if(count($result)>0)
                @foreach($result as $results)
                <tr>
                  <td>{{$results->sku}}</td>
                  <td>{{$results->item}}</td>
                  <td>{{$results->sub_item}}</td>
                  <td>{{$results->name}}</td>
                  <td>{{$results->stock}} {{$results->uom}}</td>
                 
                 </tr>

                 <!-- Modal -->
  <div class="modal fade" id="myModal{{$results->pk_id}}" role="dialog">
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
          <a href="{{URL('/')}}/admin/home/delete/inventory/{{$results->pk_id}}" class="btn btn-danger">Yes</a>
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
