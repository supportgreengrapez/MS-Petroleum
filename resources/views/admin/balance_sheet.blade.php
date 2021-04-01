@extends('admin.layout.appadmin')
 @section('content')
<div class="right_col" role="main">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="viewadminhead">
        <h2>Balance Sheet</h2>
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
          <a href="{{ url('/admin/home/print/balance/sheet') }}" class="amountbtn btt btn">Print Preview</a>
          <thead class="headbgcolor2">
            <tr>
              <th></th>
              <th style="text-align:right;">Total</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><strong>Assests</strong>
                <table cellspacing="0" width="100%" style="margin-bottom :0px;">
                  <tbody>
                    <tr>
                      <td width="100%" style="padding : 7px 10px 0px;">Current Assests
                        <table cellspacing="0" width="100%" style="margin-bottom : 0px;">
                          <tbody>
                            <tr>
                              <td width="100%" style="padding : 7px 10px 0px;">Accounts Receiveable
                                <table cellspacing="0" width="100%" style="margin-bottom : 0px;">
                                  <tbody>
                                    <tr>
                                      <td width="100%" style="padding : 7px 10px 5px;">Accounts Receiveable(A/R)</td>
                                    </tr>
                                    <tr class="headbgcolor2">
                                      <td><strong>Total Accounts receivable</strong></td>
                                    </tr>
                                  </tbody>
                                </table></td>
                            </tr>
                            <tr>
                              <td style="padding:0px 10px;">Cash and cash equivalents</td>
                            </tr>
                            <!-- <tr>
                              <td>HBL</td>
                            </tr>
                            <tr>
                              <td>Undeposited Funds</td>
                            </tr> -->
                            <tr  class="headbgcolor2">
                              <td><strong>Total Current Assets</strong></td>
                            </tr>
                          </tbody>
                        </table></td>
                    </tr>
                  </tbody>
                </table></td>
              <td style="text-align:right;"><table cellspacing="0" width="100%" style="margin-bottom = 0px;">
                  <tbody>
                    <tr>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td style="text-align:right;">PKR {{number_format($AR)}}</td>
                    </tr>
                    <tr  class="headbgcolor2">
                      <td><strong></strong></td>
                      <td style="text-align:right;"><strong>PKR {{number_format($AR)}} </strong></td>
                    </tr>
                    <tr>
                      <td><strong></strong></td>
                      <td style="text-align:right;padding :0px 10px 5px;">PKR {{number_format($asset)}}</td>
                    </tr>
                    <!-- <tr>
                      <td><strong></strong></td>
                      <td style="text-align:right;padding :07px 10px 5px;">PKR 4545</td>
                    </tr>
                    <tr>
                      <td><strong></strong></td>
                      <td style="text-align:right;padding :10px 10px 5px;">PKR 4545</td>
                    </tr> -->
                    <tr class="headbgcolor2">
                      <td><strong></strong></td>
                      <td style="text-align:right;"><strong>PKR {{number_format($asset + $AR)}}</strong></td>
                    </tr>
                  </tbody>
                </table></td>
            </tr>
            <tr>
              <td><strong>Total Assets</strong></td>
              <td style="text-align:right;"><strong>PKR {{number_format($asset + $AR)}}</strong></td>
            </tr>
            
            <tr>
              <td><strong>Liabilities </strong>
                <table cellspacing="0" width="100%" style="margin-bottom :0px;">
                  <tbody>
                    <tr>
                      <td width="100%" style="padding : 7px 10px 0px;">Current Assests
                        <table cellspacing="0" width="100%" style="margin-bottom : 0px;">
                          <tbody>
                            <tr>
                              <td width="100%" style="padding : 7px 10px 0px;">Accounts Payable
                                <table cellspacing="0" width="100%" style="margin-bottom : 0px;">
                                  <tbody>
                                    <tr>
                                      <td width="100%" style="padding : 7px 10px 5px;">Accounts Payable(A/P)</td>
                                    </tr>
                                    <tr class="headbgcolor2">
                                      <td><strong>Total Accounts Payable</strong></td>
                                    </tr>
                                  </tbody>
                                </table></td>
                            </tr>
                          </tbody>
                        </table></td>
                    </tr>
                  </tbody>
                </table></td>
              <td style="text-align:right;"><table cellspacing="0" width="100%" style="margin-bottom = 0px;">
                  <tbody>
                    <tr>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td style="text-align:right;">PKR {{number_format($AP)}}</td>
                    </tr>
                    <tr  class="headbgcolor2">
                      <td><strong></strong></td>
                      <td style="text-align:right;"><strong>PKR {{number_format($AP)}} </strong></td>
                    </tr>
                  </tbody>
                </table></td>
            </tr>
            <tr>
              <td><strong>Total Liabilities and Assets</strong></td>
              <td style="text-align:right;"><strong>PKR {{number_format(($asset + $AR)- $AP)}}</strong></td>
            </tr>
            
            <tr>
              <td><strong>Shareholder's equity</strong>
                <table cellspacing="0" width="100%" style="margin-bottom :0px;">
                  <tbody>
                    <tr>
                      <td width="100%" style="padding : 7px 10px 0px;">Shareholders' equity:
                        <table cellspacing="0" width="100%" style="margin-bottom : 0px;">
                          <tbody>
                            <tr>
                              <td width="100%" style="padding : 7px 10px 0px;">Net Income</td>
                            </tr>
                            <!-- <tr>
                              <td width="100%" style="padding : 7px 10px 0px;">Opening Balance Equity</td>
                            </tr> -->
                          </tbody>
                        </table></td>
                    </tr>
                    <tr>
                      <td width="100%" style="padding : 7px 10px 0px;">Owners Equity:
                        <table cellspacing="0" width="100%" style="margin-bottom : 0px;">
                          <tbody>
                            <tr>
                              <td width="100%" style="padding : 7px 10px 0px;">Owner's Drawing</td>
                            </tr>
                            <tr>
                              <td width="100%" style="padding : 7px 10px 0px;">Owner's Investment</td>
                            </tr>
                            <tr class="headbgcolor2">
                              <td width="100%" style="padding : 7px 10px 0px;"><strong>Total Owners Equity</strong></td>
                            <!-- </tr>
                            <tr class="headbgcolor2">
                              <td width="100%" style="padding : 7px 10px 0px;">Retained Earnings</td>
                            </tr> -->
                            <tr class="headbgcolor2">
                              <td width="100%" style="padding : 7px 10px 0px;"><strong>Total shareholders' equity</strong></td>
                            </tr>
                          </tbody>
                        </table></td>
                    </tr>
                  </tbody>
                </table></td>
              <td style="text-align:right;">
                  <table cellspacing="0" width="100%" style="margin-bottom = 0px;">
                  <tbody>
                       <tr>
                      <td></td>
                      <td style="text-align:right;"></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td style="text-align:right;"></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td style="text-align:right; padding : 23px 10px 0px;">PKR {{number_format($net_income)}}</td>
                    </tr>
                    <!-- <tr>
                      <td></td>
                      <td style="text-align:right;padding : 5px 10px 0px;">0</td>
                    </tr> -->
                    <tr>
                      <td></td>
                      <td style="text-align:right;padding : 5px 10px 0px;"></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td style="text-align:right;padding : 15px 10px 0px;">0</td>
                    </tr>
                    <tr>
                      <td></td>
                      <td style="text-align:right;padding : 5px 10px 0px;">0</td>
                    </tr>
                    
                    <tr  class="headbgcolor2">
                      <td></td>
                      <td style="text-align:right;padding : 5px 10px 0px;"><strong>PKR {{number_format($net_income)}}</strong></td>
                    </tr>
                     
                     <!-- <tr  class="headbgcolor2">
                      <td></td>
                      <td style="text-align:right;padding : 5px 10px 0px;">PKR 5000</td>
                    </tr> -->
                      <tr  class="headbgcolor2">
                      <td></td>
                      <td style="text-align:right;padding : 5px 10px 0px;"><strong>PKR {{number_format($net_income)}}</strong></td>
                    </tr>
                  </tbody>
                </table></td>
            </tr>
            <tr>
              <td><strong>Total Equity</strong></td>
              <td style="text-align:right;"><strong>PKR {{number_format($net_income)}}</strong></td>
            </tr>
          </tbody>
          
        </table>
      </div>
    </div>
  </div>
</div>
@endsection