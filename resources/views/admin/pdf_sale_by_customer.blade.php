<!DOCTYPE html>
<html lang="en">
<head>
<!-- Meta, title, CSS, favicons, etc. -->
<meta charset="utf-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Ms Petroleum">
<meta name="keywords" content="HTML,CSS,XML,JavaScript">
<meta name="author" content="Ms Petroleum">
<meta name="google-site-verification" content="-3fR2s0fAH-tDmr1Fkt1Zn9Zv3qA3tcabWHX8mpCd28" />
<link rel="shortcut icon" href="{{url('/')}}/images/ms logo.png"/>
<title>Ms Petroleum</title>

<!-- Bootstrap -->
<link href="{{url('/')}}/css/bootstrap.min.css" rel="stylesheet">
 <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
<!-- Font Awesome -->
<link href="{{url('/')}}/css/font-awesome.min.css" rel="stylesheet">
<!-- bootstrap-progressbar -->
<link href="{{url('/')}}/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
<!-- iCheck -->
<link href="{{url('/')}}/css/green.css" rel="stylesheet">
<!-- Custom Theme Style -->
<link href="{{url('/')}}/css/custom.min.css" rel="stylesheet">
<!--Custom Styling-->
<link href="{{url('/')}}/css/style.css" rel="stylesheet">
<!-- Datatables -->

 


<link href="{{url('/')}}/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="{{url('/')}}/css/responsive.bootstrap.min.css" rel="stylesheet">
<link href="{{url('/')}}/css/scroller.bootstrap.min.css" rel="stylesheet">
<link href="https://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" rel="stylesheet" />
</head>

    <div class="right_col" role="main">
      
 
      <div class="row">
        <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 col-lg-offset-2">
          <div class="Adminprofilebox">
            <div class="row">
             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
               <div class="accountpayablehead">
               <h2>Company Name</h2>
             <h4>Sale Report by Customer</h4>
             <p>January 1-Faburary 10</p>
             </div>
             </div>
            
            </div>
            
            <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead class="headbgcolor2">
                  <tr>
                    <th></th>
                    <th>Credit Rs</th>
                    
                    
                  </tr>
                </thead>
                <tbody>
                @if(count($result)>0)
                @foreach($result as $results)
                @php
                $customer = DB::select("select* from customer  where pk_id = '$results->customer_name'");
             @endphp
                  <tr>
                    <td >{{$customer[0]->customer_name}}</td>
                     <td>{{$results->total_amount}}</td>
                   
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
    
 
    </body>
</html>
