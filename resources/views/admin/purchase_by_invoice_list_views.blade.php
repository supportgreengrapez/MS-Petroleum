
    @extends('admin.layout.appadmin')
    @section('content')
    <!-- page content -->
    <div class="right_col" role="main">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="viewadminhead">
            <h2>Purchase Report</h2>
          </div>
        </div>
      </div>
      <!-- <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
          <div class="createadmininputs">
            <div class="form-group">
              <select class="form-control" id="">
                <option>Year</option>
                <option>Month</option>
                <option>Week</option>
              </select>
            </div>
          </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
          <div class="createadmininputs">
            <div class="form-group">
              <select class="form-control" id="">
                <option>2010</option>
                <option>2011</option>
                <option>2012</option>
                <option>2013</option>
                <option>2014</option>
                <option>2015</option>
                <option>2016</option>
                <option>2017</option>
                <option>2018</option>
                <option>2019</option>
              </select>
            </div>
          </div>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-12 col-xs-12">
          <div class="Tohead">
            <h4>To</h4>
          </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
          <div class="createadmininputs">
            <div class="form-group">
              <select class="form-control" id="">
                <option>2011</option>
                <option>2012</option>
                <option>2013</option>
                <option>2014</option>
                <option>2015</option>
                <option>2016</option>
                <option>2017</option>
                <option>2018</option>
                <option>2019</option>
              </select>
            </div>
          </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
          <div class="Applybtn">
            <button href="#" class="btnapply btn">Apply</button>
          </div>
        </div>
      -->

        <div class="row">
        <form method="post" action = "{{url('/')}}/admin/home/search/purchase/invoice/by/date" class="login-form" enctype="multipart/form-data">
                   
                   {{ csrf_field() }}
   
        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
          <div class="dateinputcircles">
            <div class="form-group">
              <input type="date" name="date_from">
            </div>
          </div>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-12 col-xs-12">
          <div class="Tohead">
            <h4>To</h4>
          </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
          <div class="dateinputcircles">
            <div class="form-group">
              <input type="date" name="date_to">
            </div>
          </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
          <div class="Applybtn">
            <button href="#" class="btnapply btn">Apply</button>
          </div>
        </div>

</form>




        <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="form-group">
        <label> customer_name</label>
        </div>
      </div>
  <form method="post" action = "{{url('/')}}/admin/home/search/purchase/by/invoice" class="login-form" enctype="multipart/form-data">
                   
                   {{ csrf_field() }}

      <div class="col-lg-4">
        <div class="form-group">
          <label></label>
          <select class="selectpicker form-control" data-show-subtext="true" name="supplier_name" id=""  data-live-search="true">
                <option  class="form-control" ></option>
                  
                        @foreach($result1 as $results )
        <option  class="form-control"  value="{{$results->pk_id}}" >{{$results->supplier_name}}</option>
           @endforeach
                 
       
      </select>
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


      </div>
   
      
      <div class="row">
        <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 col-lg-offset-2">
          <div class="Adminprofilebox">
            <div class="row">
             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
               <div class="accountpayablehead">
             <h4>Purchase Report by Customer</h4>
             <!-- <p>January 1-Faburary 10</p> -->
             </div>
             </div>
            
            </div>
            
         <table id="example" class="table" cellspacing="0" width="100%">
            
            <a href="{{ url('/admin/home/print/purchase/by/customer') }}" class="amountbtn btb btn">Print Preview</a>
            <thead class="headbgcolor2">
                  <tr>
                    <th></th>
                    <th style="text-align:right;">Credit Rs</th>
                    
                    
                  </tr>
                </thead>
                <tbody>
                @if(count($result)>0)
                @foreach($result as $results)
                @php
                $customer = DB::select("select* from supplier  where pk_id = '$results->supplier_name'");
             @endphp
                  <tr>
                    <td ><a href="{{url('/')}}/admin/home/view/purchase/by/supplier/name/deatiled/{{$results->supplier_name}}">{{$customer[0]->supplier_name}}</a></td>
                     <td style="text-align:right;"><a href="{{url('/')}}/admin/home/view/purchase/by/customer/deatiled/{{$results->pk_id}}">{{$results->total_amount}}</a></td>
                   
                  </tr>
                 
                 
                  @endforeach
          @endif
                
              
                </tbody>
              </table>
           <div class="row">
           <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
            <div class="totalpayabletable">
            <h4>Total</h4>
           </div>
           </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
             <div class="totalpayabletable">
           
             <p>{{number_format($total_amount[0]->{'SUM(total_amount)'})}}</p>
           </div>
           </div>
           </div>
          
           
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /page content --> 
    
    @endsection