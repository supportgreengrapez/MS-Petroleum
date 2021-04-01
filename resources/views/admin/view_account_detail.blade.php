

@extends('admin.layout.appadmin')
@section('content')

   
    <!-- page content -->
    <div class="right_col" role="main">
     <div class="row">
       <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <div class="viewadminhead">
            <h2>View Accounts</h2>
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
                  <th>Date</th>
                    
                    <th>Account Name</th>
                    <th>Description</th>
                    <th>Increase</th>
                    <th>Decrease</th>
                    
                    
              
                  </tr>
                </thead>
                <tbody>

                @if(count($result3)>0)
            @foreach($result3 as $results)
            <tr>

                <td>{{$results->date}}</td>
                
                <td>{{$results->recive_from}}</td>
               
                  
                  <td>{{$results->description}}</td>
                 
               

                  <td>{{$results->amount}}</td>

                  @endforeach


@endif


@foreach($result4 as $results)
<td>{{$results->amount}}</td>
@endforeach
                 
        </tr>
                 
                  




                   
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>


    
  @endsection