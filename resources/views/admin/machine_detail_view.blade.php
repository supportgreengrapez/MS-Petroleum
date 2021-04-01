@extends('admin.layout.appadmin')
@section('content') 
    
    <!-- page content -->
    <div class="right_col" role="main">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="viewadminhead">
            <h2>View Machine</h2>
          </div>
        </div>
      </div>
      @php if(isset($result1) && !empty($result1)) { @endphp
            @if(count($result1)>0)
      @foreach($result1 as $results)
      <div class="row">
        <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 col-lg-offset-2">
          <div class="Adminprofilebox">
          <div class="row">
           <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
           <div class="viewpumphead">
           <h3>Tank Info/Detail</h3>
           </div>
          </div>
           <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
             <div class="viewpumpbtn">
                    <a href="{{url('/')}}/admin/home/edit/tank/{{$results->pk_id}}" class="btnedit btn">Edit</a>
                  </div>
          </div>
          </div>
          
            <div class="row">
              <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="viewexpenselines">
                  <h4>Tank Name</h4>
                   <p>{{$results->tank_name}}</p>
                </div>
              </div>
               <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="viewexpenselines">
                  <h4>Total Capacity</h4>
                   <p>{{$results->total_capacity}}</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="viewexpenselines">
                  <h4>Total Dip</h4>
                   <p>{{$results->total_dip}}</p>
                </div>
            </div>
              <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="viewexpenselines">
                  <h4>Opening Stock</h4>
                   <p>{{$results->opening_stock}}</p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="viewexpenselines">
                  <h4>Unit Of Measurement</h4>
                   <p>{{$results->uom}}</p>
                </div>
              </div>
               <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="viewexpenselines">
                  <h4>Opening Balance</h4>
                   <p>PKR {{number_format($results->opening_balance)}}</p>
                </div>
            </div>
              <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="viewexpenselines">
                  <h4>Opening Dip</h4>
                   <p>{{$results->opening_dip}}</p>
                </div>
              </div>
            </div>
            </div>
          </div>
        </div>
        @endforeach
        @endif
         @if(count($result)>0)
      @foreach($result as $results)
        <div class="row">
        <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 col-lg-offset-2">
          <div class="Adminprofilebox">
          <div class="row">
           <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
           <div class="viewpumphead">
           <h3>Machine Info/Detail</h3>
           </div>
          </div>
           <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
             <div class="viewpumpbtn">
                     <a href="{{url('/')}}/admin/home/edit/machine/{{$results->pk_id}}" class="btnedit btn">Edit</a>
                  </div>
          </div>
          </div>
          
            <div class="row">
              <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="viewexpenselines">
                  <h4>Current Dip</h4>
                   <p>{{$results->current_dip}}</p>
                </div>
              </div>
               <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="viewexpenselines">
                  <h4>Machine Name</h4>
                   <p>{{$results->machine_name}}</p>
                </div>
            </div>
              <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="viewexpenselines">
                  <h4>Closing Reading</h4>
                   <p>{{$results->closing_reading}}</p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="viewexpenselines">
                  <h4>Rate</h4>
                   <p>PKR {{number_format($results->rate)}}</p>
                </div>
              </div>
               <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
              
            </div>
              <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
              
              </div>
            </div>
            </div>
          </div>
        </div>
          @endforeach
        @endif
        @php } else @endphp
        <h3>No record found</h3>
        @php @endphp
         
    <!-- /page content --> 
    @endsection
   