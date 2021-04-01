@extends('admin.layout.appadmin')
@section('content') 
    
    <!-- page content -->
    <div class="right_col" role="main">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <div class="viewadminhead">
            <h2>Pumps</h2>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <div class="plusbutton">
            <a href="{{url('/')}}/admin/home/add/pump" class="btn pumpplusbtn" title="Add Pump"><span class="glyphicon glyphicon-plus"></span></a>
          </div>
        </div>
      </div>

      <div class="row">
                @if(count($result)>0)
      @foreach($result as $results)
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"> <a href="{{url('/')}}/admin/home/view/machine/{{$results->pk_id}}">
          <div class="pumpbox">
            <div class="pumpboxlines">
              <h4>Pump Name</h4>
              <p>{{$results->pump_name}}</p>
              <h4>Address :</h4>
              <p>{{$results->pump_address}}</p>
            </div>
          </div>
          </a> 
          <div class="col-lg-6">
            <a href="{{url('/')}}/admin/home/edit/pump/{{$results->pk_id}}" class="btn pumpplusbtn" title="Edit Pump" style="float:left"><span class="glyphicon glyphicon-pencil"></span></a>
          </div>
          <div class="col-lg-6">
            <a href="#" onclick="getId(this.id)"  data-toggle="modal" data-target="#myModal{{$results->pk_id}}" class="btn pumpplusbtn" title="Delete Pump"><span class="glyphicon glyphicon-trash"></span></a>
          </div>
          </div>
          

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
          <a href="{{url('/')}}/admin/home/delete/pump/{{$results->pk_id}}" class="btn btn-danger">Yes</a>
        </div>
      </div>
      
    </div>
  </div>
     @endforeach
     @endif
      </div>
    </div>
  
  <!-- /page content --> 
  


  
 @endsection