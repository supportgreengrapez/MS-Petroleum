@extends('admin.layout.appadmin')
 @section('content')
<div class="right_col" role="main">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="viewadminhead">
        <h2>Profit and Loss</h2>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 col-lg-offset-2">
      <div class="Adminprofilebox">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="accountpayablehead">
              <h4>Company Name</h4>
              <h4>Sale Report by Customer</h4>
              <p>January 1-Faburary 10</p>
            </div>
          </div>
        </div>
        <table id="example" class="table" cellspacing="0" width="100%">
          <a href="{{ url('/admin/home/view/profit/loss/report/print') }}" class="amountbtn btt btn">Print Preview</a>
          <thead class="headbgcolor2">
            <tr>
              <th></th>
              <th style="text-align:right;">Total</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><strong>Income</strong>
                <table cellspacing="0" width="100%" style="margin-bottom: 0px;">
                  <tbody>
                    <tr>
                      <td width="100%" style="padding :7px 10px 5px;">Sales</td>
                    </tr>
                    <tr>
                      <td width="100%" style="padding: 7px 10px 5px;">Cost og Goods Sold</td>
                    </tr>
                  </tbody>
                </table></td>
              <td style="text-align:right;">.
                <table cellspacing="0" width="100%" style="margin-bottom: 0px;">
                  <tbody>
                    <tr>
                      <td></td>
                      <td style="text-align:right; padding :7px 10px 5px;">PKR {{number_format($sale)}}</td>
                    </tr>
                    <tr>
                      <td></td>
                      <td style="text-align:right; padding: 7px 10px 5px;">PKR {{number_format($purchase)}}</td>
                    </tr>
                  </tbody>
                </table></td>
            </tr>
            <tr>
              <td><strong>Total Income</strong></td>
              <td style="text-align:right;">PKR {{$sale}}</td>
            </tr>
            <tr>
              <td>Gross Profit</td>
              <td style="text-align:right;"><strong>PKR {{number_format($gross_profit)}}</strong></td>
            </tr>
            <tr>
              <td>Expenses</td>
              <td style="text-align:right;">PKR {{number_format($expense)}}</td>
            </tr>
            <tr>
              <td><strong>Total Expenses</strong></td>
              <td style="text-align:right;">PKR {{number_format($expense)}}</td>
            </tr>
            <tr>
              <td><div class="totalpayabletable">
                  <h4>Net Earning</h4>
                </div></td>
              <td style="text-align:right;"><div class="totalpayabletable">
                  <p>PKR {{number_format($net_income)}}</p>
                </div></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection