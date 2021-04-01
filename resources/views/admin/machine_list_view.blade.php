@extends('admin.layout.appadmin')
@section('content') 
    <!-- page content -->
    <div class="right_col" role="main">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
          <div class="viewadminhead">
            <h2>View Machines</h2>
          </div>
        </div>
         <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
          <div class="machinename">
          @if(count($result1)>0)
                @foreach($result1 as $results)
         <h4>{{$results->pump_name}}</h4>
         <h4>{{$results->pump_address}}</h4>
         @endforeach
         @endif
         </div>
         </div>
          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
          <div class="plusbutton">
            <a href="{{url('/')}}/admin/home/add/machine/{{$result1[0]->pk_id}}" class="btn pumpplusbtn" title="Add field"><span class="glyphicon glyphicon-plus"></span></a>
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
                    <th>Tank Name</th>
                    <th>Current Stock</th>
                    <th>Machine Name</th>
                    <th>Closing Reading</th>
                   
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                @if(count($result)>0)
                @foreach($result as $results)
                @php
                $tank_id = $results->tank_id;
                $tank_name = DB::select("select* from tank where pk_id = '$tank_id'");
                @endphp
                  <tr>
                    <td>{{$tank_name[0]->tank_name}}</td>
                    <td>{{$tank_name[0]->opening_stock}} {{$tank_name[0]->uom}}</td>
                    <td>{{$results->machine_name}}</td>
                    <td>{{$results->closing_reading}}</td>
                    <td><a href="{{url('/')}}/admin/home/view/machine/detail/{{$results->pk_id}}" class="bordersets">view</a> &nbsp;&nbsp;<a href="{{url('/')}}/admin/home/delete/machine/{{$results->pk_id}}">Delete</a></td>
                  </tr>
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