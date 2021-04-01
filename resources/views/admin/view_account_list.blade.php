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






        
          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">



          
          <div class="plusbutton">


          <div class="clearfix"></div>
  <form method="post" action = "{{url('/')}}/admin/home/search/account" class="login-form" enctype="multipart/form-data">
                   
                   
                   {{ csrf_field() }}
                   
                      
          <div class="row">
      <div class="col-lg-2">
        <div class="form-group">
        <label><input type="checkbox" name="date" value="1"> Date</label>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="form-group">
          <label>From</label>
          <input type="datetime-local" id="birthdaytime" name="date_from" class="form-control">
        </div>
      </div>
      <div class="col-lg-4">
        <div class="form-group">
          <label>To:</label>
          <input type="datetime-local" id="birthdaytime" name="date_to" class="form-control">
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-2">
        <div class="totalamountp">
          <button type="submit" class="amountbtn btn">Filter</button>
        </div>
      </div>
    </div>
  </form>
          
            <a href="{{URL('/')}}/admin/home/add/account" class="btn pumpplusbtn" title="Add field"><span class="glyphicon glyphicon-plus"></span></a>
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
                    
                    <th>Account Type</th>
                    <th>Account Name</th>
                    <!-- <th>Sub Account</th> -->
                    <th>Description</th>
                    <th>Balance</th>
                    <th>Date</th>
                    <th>View</th>
              
                  </tr>
                </thead>
                <tbody>

                  @if(count($result)>0)
                @php   $i = 0; @endphp
                @foreach($result as $results)

                <tr> 
                  
                  <td>{{$results->account_type}}</td>
                  
                  <td>
                 
                  {{$results->account_name}}
                
                  <li>
                 {{$results->sub_account}}
                 </li>
                 
                 </td>
        
                  <td>{{$results->description}}</td>
                  
                  <td>{{$results->balance}}</td>
        
                  <td>{{$results->date}}</td>
                  <td>
                  
                  <a  href="{{url('/')}}/admin/home/view/account/detail/{{$results->pk_id}}/{{$results->sub_account}}" >
                   
                view</a>
                  
                 
                  </td>
                  
                 </tr>
                 @php   $i++; @endphp
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
