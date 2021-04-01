@extends('admin.layout.appadmin')
@section('content')
    
    <!-- page content -->
    <div class="right_col" role="main">
      <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
          <div class="viewadminhead">
            <h2>View Sale</h2>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
          
         
            
            <div class="dropbtnstyle" style="margin-top:15px;">
              <div class="dropdown">
                <button class="btn dropdown-toggle" type="button" data-toggle="dropdown">
                Select Field <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                  <li><a href="view-sale-by-item-table.html">View Sale/By Item</a></li>
                  <li><a href="{{url('/')}}/admin/home/view/sale/by/invoice">View Sales</a></li>
                  
                </ul>
              </div>
              </div>
            
          
        </div>
      </div>
      <form method="post" action = "{{url('/')}}/admin/home/search/invoice/by/date" class="login-form" enctype="multipart/form-data">
                   
                   {{ csrf_field() }}
      <div class="row">
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
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 col-lg-offset-2">
          <div class="Totalpurchasehead">
            <h4>Total Sale :</h4>
            <p>{{number_format($total_amount[0]->{'SUM(amount)'})}}</p>
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
                    <th>SKU</th>
                    <th>Total Sale</th>
                    <th>Item Name</th>
                    <th>Invoices #</th>
                  </tr>
                </thead>
                <tbody>
                @if(count($result)>0)
                @foreach($result as $results)
                @php
                $invoice = DB::select("select* from detail_sale  where sku = '$results->sku'");
                $total_sale = DB::select("select SUM(amount) from detail_sale where sku = '$results->sku'");
                @endphp
                <td>{{$results->sku}}</td>
                    <td>{{number_format($total_sale[0]->{'SUM(amount)'})}}</td>
                    <td>{{$results->name}}</td>
                      <td><a href="{{url('/')}}/admin/home/view/sale/detail/by/item/{{$results->sku}}" class="">{{count($invoice)}} Invoices</a></td>
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