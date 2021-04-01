
    @extends('admin.layout.appadmin')
    @section('content')
    <!-- page content -->
    <div class="right_col" role="main">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="viewadminhead">
            <h2>View Admin</h2>
          </div>
        </div>
      </div>
      
    
      
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-lg-offset-2">
          <div class="Adminprofilebox">
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="redheading">
                  <h4>Name</h4>
                </div>
              </div>
              @if($result>0)
                          @foreach($result as $results)
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="blackheading">
                  <h4>{{$results->fname}}{{$results->lname}}</h4>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="redheading">
                  <h4>Email</h4>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="blackheading">
                  <h4>{{$results->username}}</h4>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="redheading">
                  <h4>Permissions</h4>
                </div>
              </div>

              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                  @if($results->Machine_Management==1)
                    <div class="labels"> <span class="label label-primary">Machine Management</span> </div>
                    @endif
                  </div>
                   </div>

                   <br>
                   <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                  @if($results->Admin_Management==1)
                    <div class="labels"> <span class="label label-primary">Admin Management</span> </div>
                    @endif
                  </div>
                  </div>
<br>

                  <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                  @if($results->Expense_Management==1)
                    <div class="labels"> <span class="label label-primary">Expense Management</span> </div>
                    @endif
                  </div>
                  </div>
                  <br>

                  <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                  @if($results->Customer_Management==1)
                    <div class="labels"> <span class="label label-primary">Customer Management</span> </div>
                    @endif
                  </div>
                  </div>

                  <br>
                  <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                  @if($results->Sales_Management==1)
                    <div class="labels"> <span class="label label-primary">Sales Management</span> </div>
                    @endif
                  </div>
                  </div>
                  <br>

                  <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                  @if($results->Supplier_Management==1)
                    <div class="labels"> <span class="label label-primary">Supplier Management</span> </div>
                    @endif
                  </div>
                  </div>

                  <br>

                  <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                  @if($results->Purchase_Management==1)
                    <div class="labels"> <span class="label label-primary">Purchase Management</span> </div>
                    @endif
                  </div>
                  </div>
                  <br>

                  <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                  @if($results->Category_Management==1)
                    <div class="labels"> <span class="label label-primary">Category Management</span> </div>
                    @endif
                  </div>
                  </div>

                  <br>

                  <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                  @if($results->Report==1)
                    <div class="labels"> <span class="label label-primary">Report</span> </div>
                    @endif
                  </div>
                  </div>
                  <br>

                  <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                  @if($results->Item_Management==1)
                    <div class="labels"> <span class="label label-primary">Item Management</span> </div>
                    @endif
                  </div>
                  </div>




            
              </div>
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-lg-offset-6">
                  <div class="viewadminbtn">
                    <a href="edit-admin.html" class="btnedit btn">Edit</a>
                  </div>
                </div>
              </div>
              @endforeach
                          @endif
                      
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /page content --> 
    
    @endsection