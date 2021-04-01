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
            <a href="{{url('/')}}/admin/home/add/pump" class="btn pumpplusbtn" title="Add field"><span class="glyphicon glyphicon-plus"></span></a>
          </div>
        </div>
      </div>
      <div class="row">
          
      @if(count($result)>0)
      @foreach($result as $results)
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"> <a href="{{url('/')}}/admin/home/view/pump/purchase/by/supplier/{{$results->pk_id}}">
          <div class="pumpbox">
            <div class="pumpboxlines">
              <h4>Pump Name</h4>
              <p>{{$results->pump_name}}</p>
              <h4>Address :</h4>
              <p>{{$results->pump_address}}</p>
            </div>
          </div>
          </a> </div>
          
     @endforeach
     @endif
      </div>
    </div>
  
  <!-- /page content --> 
  


  
 @endsection