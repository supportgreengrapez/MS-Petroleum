
    @extends('admin.layout.appadmin')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
          <div class="viewadminhead">
          <h2>View Accounts</h2>
          </div>
        </div>
         <!-- <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
          <div class="machinename">
         <h4>Hera Petroleum</h4>
         <h4>92 K Defence,Lahore</h4>
         </div>
         </div> -->
          <!-- <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
          <div class="plusbutton">
            <a href="create-machine.html" class="btn pumpplusbtn" title="Add field"><span class="glyphicon glyphicon-plus"></span></a>
          </div>
        </div> -->
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
                
                
                
                
                <td>{{$results->recive_from}}
                
                    </td>
                
                   
                
          
                  <td>{{$results->description}}</td>
                    
                    <td>{{$results->amount}}

                    </td>

                   </tr>
                  <tr>
                  

                    </tr>
                  <tr>
                   
                   
                    </tr>




                    @endforeach


@endif
                  <tr>
                   
                  @if(count($result4)>0)
            @foreach($result4 as $results)
            <td>{{$results->date}}</td>
                
                <td>{{$results->payee}}</td>
               
                  
                  <td>{{$results->description}}</td>
                  <td></td>
                    <td>{{$results->amount}}</td>
                   
                   
                  
                   
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