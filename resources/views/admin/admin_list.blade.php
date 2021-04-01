@extends('admin.layout.appadmin')
    @section('content')
    
    <!-- page content -->
    <div class="right_col" role="main">
       <div class="row">
       <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <div class="viewadminhead">
            <h2>View Admin</h2>
          </div>
        </div>  
          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <div class="plusbutton">
            <a href="{{url('/')}}/admin/home/add/admin/view" class="btn pumpplusbtn" title="Add field"><span class="glyphicon glyphicon-plus"></span></a>
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
                      <th>Name</th>
                      <th>Email</th>
                     
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                   
                  @if($result>0)
                          @foreach($result as $results)
                          <tr>
                          <td>{{$results->pk_id}}</td>
                            <td>{{$results->fname}} {{$results->lname}}</td>
                            <td> {{$results->username}}</td>
                          <td><a href="{{URL('/')}}/admin/home/view/admin/detail/{{$results->pk_id}}">View</a></td>
                         
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