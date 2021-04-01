@extends('admin.layout.appadmin')
    @section('content')
    <!-- page content -->
    <div class="right_col" role="main">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="viewadminhead">
            <h2>Create Admin</h2>
          </div>
        </div>
      </div>
      <form method="post" action ="{{url('/')}}/admin/home/add/admin" class="login-form" enctype="multipart/form-data">
    {{ csrf_field() }}
    
    @if($errors->any())
    <div class="alert alert-danger"> <strong></strong> {{$errors->first()}} </div>
    @endif
      <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
          <div class="createadmininputs">
            <div class="form-group">
              <label for="usr">First Name</label>
              <input type="text" class="form-control" name="fname">
            </div>
          </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
          <div class="createadmininputs">
            <div class="form-group">
              <label for="usr">Last Name</label>
              <input type="text" class="form-control" name="lname">
            </div>
          </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
          <div class="createadmininputs">
            <div class="form-group">
              <label for="usr">Email</label>
              <input type="email" class="form-control" name="username">
            </div>
          </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
          <div class="createadmininputs">
            <div class="form-group">
              <label for="pwd">Password</label>
              <input type="password" class="form-control" name="pass">
            </div>
          </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
          <div class="createadmininputs">
            <div class="form-group">
              <label for="pwd">Confirm Password</label>
              <input type="password" class="form-control" name="confirm">
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="permissionhead">
            <p>Permission</p>
          </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 col-lg-offset-4">
          <div class="selectallhead">
            <ul>
              <li>
                <input type="checkbox" id="select_all"/>
                Select All</li>
            </ul>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
          <div class="chkboxdesign">
            <div class="checkboxes">
              <label for="">
                <input id="myCheckbox" class="checkbox" type="checkbox" value="1" name="Machine_Management"/>
                Machine Management</label>
            </div>
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="subcheckboxes">
                  <label for="">
                    <input id="myButton" disabled class="checkbox" value="1" type="checkbox" name="Machine_Management_edit"/>
                    Edit</label>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="subcheckboxes">
                  <label for="">
                    <input id="myButton2" value="1" disabled class="checkbox" type="checkbox" name="Machine_Management_delete"/>
                    Delete</label>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
          <div class="chkboxdesign">
            <div class="checkboxes">
              <label for="">
                <input id="adminCheckbox" class="checkbox" type="checkbox" value="1" name="Admin_Management"/>
                Admin Management</label>
            </div>
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="subcheckboxes">
                  <label for="">
                    <input id="admincheckbox1" disabled class="checkbox" value="1" type="checkbox" name="check[]"/>
                    Edit</label>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="subcheckboxes">
                  <label for="">
                    <input id="admincheckbox2" disabled class="checkbox" value="1" type="checkbox" name="check[]"/>
                    Delete</label>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
          <div class="chkboxdesign">
            <div class="checkboxes">
              <label for="">
                <input id="expenseCheckbox" class="checkbox" value="1" type="checkbox" name="Expense_Management"/>
                Expense Management</label>
            </div>
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="subcheckboxes">
                  <label for="">
                    <input id="expensecheckbox1" disabled class="checkbox" value="1" type="checkbox" name="Expense_Management_edit"/>
                    Edit</label>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="subcheckboxes">
                  <label for="">
                    <input id="expensecheckbox2" disabled class="checkbox" value="1" type="checkbox" name="Expense_Management_delete"/>
                    Delete</label>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
          <div class="chkboxdesign">
            <div class="checkboxes">
              <label for="">
                <input id="customerCheckbox" class="checkbox" value="1" type="checkbox" name="Customer_Management"/>
                Customer Management</label>
            </div>
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="subcheckboxes">
                  <label for="">
                    <input id="customercheckbox1" disabled class="checkbox" value="1" type="checkbox" name="Customer_Management_edit"/>
                    Edit</label>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="subcheckboxes">
                  <label for="">
                    <input id="customercheckbox2" disabled class="checkbox" value="1" type="checkbox" name="Customer_Management_delete"/>
                    Delete</label>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
          <div class="chkboxdesign">
            <div class="checkboxes">
              <label for="">
                <input id="salesCheckbox" class="checkbox" type="checkbox" value="1" name="Sales_Management"/>
                Sales Management</label>
            </div>
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="subcheckboxes">
                  <label for="">
                    <input id="salescheckbox1" disabled class="checkbox" value="1" type="checkbox" name="Sales_Management_edit"/>
                    Edit</label>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="subcheckboxes">
                  <label for="">
                    <input id="salescheckbox2" disabled class="checkbox" value="1" type="checkbox" name="Sales_Management_delete"/>
                    Delete</label>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
          <div class="chkboxdesign">
            <div class="checkboxes">
              <label for="">
                <input id="supplierCheckbox" class="checkbox" type="checkbox" value="1" name="Supplier_Management"/>
                Supplier Management</label>
            </div>
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="subcheckboxes">
                  <label for="">
                    <input id="suppliercheckbox1" disabled class="checkbox" value="1" type="checkbox" name="Supplier_Management_edit"/>
                    Edit</label>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="subcheckboxes">
                  <label for="">
                    <input id="suppliercheckbox2" disabled class="checkbox" value="1" type="checkbox" name="Supplier_Management_delete"/>
                    Delete</label>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
          <div class="chkboxdesign">
            <div class="checkboxes">
              <label for="">
                <input id="purchaseCheckbox" class="checkbox" type="checkbox" value="1" name="Purchase_Management"/>
                Purchase Management</label>
            </div>
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="subcheckboxes">
                  <label for="">
                    <input id="purchasecheckbox1" disabled class="checkbox" value="1" type="checkbox" name="Purchase_Management_edit"/>
                    Edit</label>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="subcheckboxes">
                  <label for="">
                    <input id="purchasecheckbox2" disabled class="checkbox" value="1" type="checkbox" name="Purchase_Management_delete"/>
                    Delete</label>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
          <div class="chkboxdesign">
            <div class="checkboxes">
              <label for="">
                <input id="categoryCheckbox" class="checkbox" type="checkbox" value="1" name="Category_Management"/>
                Category Management</label>
            </div>
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="subcheckboxes">
                  <label for="">
                    <input id="categorycheckbox1" disabled class="checkbox" value="1" type="checkbox" name="Category_Management_edit"/>
                    Edit</label>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="subcheckboxes">
                  <label for="">
                    <input id="categorycheckbox2" disabled class="checkbox" value="1" type="checkbox" name="Category_Management_delete"/>
                    Delete</label>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
          <div class="chkboxdesign">
            <div class="checkboxes">
              <label for="">
                <input id="reportCheckbox" class="checkbox" type="checkbox" value="1" name="Report"/>
                Report</label>
            </div>
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="subcheckboxes">
                  <label for="">
                    <input id="reportcheckbox1" disabled class="checkbox" value="1" type="checkbox" name="Report_edit"/>
                    Edit</label>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="subcheckboxes">
                  <label for="">
                    <input id="reportcheckbox2" disabled class="checkbox" value="1" type="checkbox" name="Report_delete"/>
                    Delete</label>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
          <div class="chkboxdesign">
            <div class="checkboxes">
              <label for="">
                <input id="itemCheckbox" class="checkbox" type="checkbox" value="1" name="Item_Management"/>
                Item Management</label>
            </div>
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="subcheckboxes">
                  <label for="">
                    <input id="itemcheckbox1" disabled class="checkbox" value="1" type="checkbox" name="Item_Management_edit"/>
                    Edit</label>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="subcheckboxes">
                  <label for="">
                    <input id="itemcheckbox2" disabled class="checkbox" value="1" type="checkbox" name="Item_Management_delete"/>
                    Delete</label>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
          <div class="chkboxdesign">
            <div class="checkboxes">
              <label for="">
                <input id="kachiCheckbox" class="checkbox" type="checkbox" value="1" name="Kachi_Parchi"/>
                Kachi Parchi</label>
            </div>
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="subcheckboxes">
                  <label for="">
                    <input id="kachicheckbox1" disabled class="checkbox" value="1" type="checkbox" name="Kachi_Parchi_edit"/>
                    Edit</label>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="subcheckboxes">
                  <label for="">
                    <input id="kachicheckbox2" disabled class="checkbox" value="1" type="checkbox" name="Kachi_Parchi_delete"/>
                    Delete</label>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
          <div class="chkboxdesign">
            <div class="checkboxes">
              <label for="">
                <input id="pumpCheckbox" class="checkbox" value="1" type="checkbox" name="Pump_Management"/>
                Pump Management</label>
            </div>
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="subcheckboxes">
                  <label for="">
                    <input id="pumpcheckbox1" disabled class="checkbox" value="1" type="checkbox" name="Pump_Management_edit"/>
                    Edit</label>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="subcheckboxes">
                  <label for="">
                    <input id="pumpcheckbox2" disabled class="checkbox" value="1" type="checkbox" name="Pump_Management_delete"/>
                    Delete</label>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
          <div class="chkboxdesign">
            <div class="checkboxes">
              <label for="">
                <input id="accountCheckbox" class="checkbox" value="1" type="checkbox" name="Accounts_Management"/>
                Accounts Management</label>
            </div>
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="subcheckboxes">
                  <label for="">
                    <input id="accountcheckbox1" disabled class="checkbox" value="1" type="checkbox" name="Accounts_Management_edit"/>
                    Edit</label>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="subcheckboxes">
                  <label for="">
                    <input id="accountcheckbox2" disabled class="checkbox" value="1" type="checkbox" name="Accounts_Management_delete"/>
                    Delete</label>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12"> </div>
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12"> </div>
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12"> </div>
      </div>
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 col-lg-offset-8">
          <div class="viewadminbtn">
            <button href="#" class="btnedit">Save</button>
          </div>
        </div>
      </div>
</form>
    </div>
    <!-- /page content --> 
    @endsection