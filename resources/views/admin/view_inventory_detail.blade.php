@extends('admin.layout.appadmin')
@section('content')
    
    <!-- page content -->
    <div class="right_col" role="main">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="viewadminhead">
            <h2>View Inventory</h2>
          </div>
        </div>
      </div>
      
      <div class="row">
        <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 col-lg-offset-2">
          <div class="Adminprofilebox">
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="viewexpenselines">
                  <h4>SKU</h4>
                   <p>{{$result[0]->sku}}</p>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="viewexpenselines">
                  <h4>UOM(Unit Of Measurement)</h4>
                   <p>{{$result[0]->uom}}</p>
                </div>
            </div>
            </div>
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="viewexpenselines">
                  <h4>Item</h4>
                   <p>{{$result[0]->item}}</p>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="viewexpenselines">
                  <h4>Current Stock</h4>
                   <p>{{$result[0]->stock}} {{$result[0]->uom}}</p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="viewexpenselines">
                  <h4>Sub Item</h4>
                   <p>{{$result[0]->sub_item}}</p>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <div class="viewexpenselines">
                  <h4>Opening Balance(PKR)</h4>
                   <p>{{number_format($result[0]->opening_balance)}}</p>
                </div>
              </div>
              </div>
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <div class="viewexpenselines">
                  <h4>Item Name</h4>
                   <p>{{$result[0]->name}}</p>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <div class="viewexpenselines">
                  <h4>Description</h4>
                   <p>{{$result[0]->description}}</p>
                </div>
              </div>
               <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <div class="viewadminbtn">
                    <a href="{{url('/')}}/admin/home/edit/inventory/{{$result[0]->pk_id}}" class="btnedit btn">Edit</a>
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