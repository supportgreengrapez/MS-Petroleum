@extends('admin.layout.appadmin')
@section('content')
    
    <!-- page content -->
    <div class="right_col" role="main">
      <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-12">
          <div class="viewadminhead">
            <h2>Dashboard</h2>
          </div>
        </div>
      </div>
      <div class="content-wrapper">
        <div class="container-fluid">
          <div class="row"> 
            
            <!-- Icon Cards-->
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="inforide" style="border-left:5px solid #85ce36;">
                <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <div class="topimages"> <img src="{{url('/')}}/images/icon 4.png" alt="image1"> </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <div class="sideinfo">
                      <h4>Profit and loss</h4>
                      <p>PKR 2500</p>
                      <span>Last 300 Days</span> </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="inforide" style="border-left:5px solid #642b2c;">
                <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <div class="topimages2"> <img src="{{url('/')}}/images/icon 3.png" alt="image2"> </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <div class="sideinfo">
                      <h4>Profit and loss</h4>
                      <p>PKR 2500</p>
                      <span>Last 300 Days</span> </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="inforide" style="border-left:5px solid #00afef;">
                <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <div class="topimages3"> <img src="{{url('/')}}/images/icon 2.png" alt="image1"> </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <div class="sideinfo">
                      <h4>Profit and loss</h4>
                      <p>PKR 2500</p>
                      <span>Last 300 Days</span> </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="inforide" style="border-left:5px solid #3a4652;">
                <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <div class="topimages4"> <img src="{{url('/')}}/images/icon 1.png" alt="image1"> </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <div class="sideinfo">
                      <h4>Profit and loss</h4>
                      <p>PKR 2500</p>
                      <span>Last 300 Days</span> </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
              <div class="boxcolor1">
                <div class="row">
                  <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                    <div class="boxhead1">
                      <h2>Profit & Loss</h2>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="boxmonthprice">
                      <h2>3500000.00</h2>
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="filterbutton">
                      <button href="#" class="btnfilter1 btn">Filter</button>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                    <div class="expensename">
                      <p>Income</p>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="expenseprice">
                      <p>30,000</p>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                    <div class="expensename">
                      <p>Expense</p>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="expenseprice">
                      <p>30,000</p>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                    <div class="expensename">
                      <p>CGS</p>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="expenseprice">
                      <p>30,000</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
              <div class="boxcolor2">
                <div class="row">
                  <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                    <div class="boxhead2">
                      <h2>Expenses</h2>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="boxmonthprice">
                      <h2>3500000.00</h2>
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="filterbutton">
                      <button href="#" class="btnfilter2 btn">Filter</button>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                    <div class="expensename">
                      <p>Bills</p>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="expenseprice">
                      <p>30,000</p>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                    <div class="expensename">
                      <p>General Expense</p>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="expenseprice">
                      <p>30,000</p>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                    <div class="expensename">
                      <p>Purchase Order</p>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="expenseprice">
                      <p>30,000</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
              <div class="boxcolor3">
                <div class="row">
                  <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                    <div class="boxhead3">
                      <h2>Sales</h2>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="boxmonthprice">
                      <h2>3500000.00</h2>
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="filterbutton">
                      <button href="#" class="btnfilter3 btn">Filter</button>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                    <div class="expensename">
                      <p>Invoice</p>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="expenseprice">
                      <p>30,000</p>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                    <div class="expensename">
                      <p>Payments</p>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="expenseprice">
                      <p>30,000</p>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                    <div class="expensename">
                      <p>CGS</p>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="expenseprice">
                      <p>30,000</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
              <div class="boxcolor4">
                <div class="row">
                  <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                    <div class="boxhead4">
                      <h2>Stock Balance</h2>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="boxmonthprice">
                      <h2>3500000.00</h2>
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="filterbutton">
                      <button href="#" class="btnfilter4 btn">Filter</button>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                    <div class="expensename">
                      <p>Furnace Oil</p>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="expenseprice">
                      <p>30,000</p>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                    <div class="expensename">
                      <p>Diesel</p>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="expenseprice">
                      <p>30,000</p>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                    <div class="expensename">
                      <p>Petrol</p>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="expenseprice">
                      <p>30,000</p>
                    </div>
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