@extends('admin.layout.appadmin')
@section('content')

<form method="post" action = "{{url('/')}}/admin/home/edit/expense/{{$result2[0]->pk_id}}" class="login-form">
                   
                   {{ csrf_field() }}
             
             @if($errors->any())
             
             <div class="alert alert-danger">
             <strong></strong> {{$errors->first()}}
             </div>
             @endif 
    
    <!-- page content -->
    <div class="right_col" role="main">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="viewadminhead">
            <h2>Edit Expense</h2>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="field_wrapper ">
          <div class="borderrow">
            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
              <div class="createadmininputs">
                <div class="form-group">
                  <label for="usr">Payee(optional)</label>
                  <input type="text" class="form-control" value="{{$result2[0]->payee}}" name="payee" id="usr">
                </div>
              </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
              <div class="createadmininputs">
                <div class="form-group">
                  <label for="sel1">Account Name</label>
             
                  <select class="form-control" id="" name="account_name">
                  @if(count($result)>0)
                  @foreach($result as $results)
                    <option value"{{$results->account_name}}" @if($results->account_name == $result2[0]->account_name) selected @endif>{{$results->account_name}}</option>
               @endforeach
               @endif
                  </select>
                </div>
              </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
              <div class="createadmininputs">
                <div class="form-group">
                  <label for="sel1">Payment Method</label>
                  <select class="form-control" id="" name="payment_method">
                    <option value="cash" @if($result2[0]->payment_method == 'cash') selected @endif>Cash</option>
                    <option value="bank" @if($result2[0]->payment_method == 'bank') selected @endif>bank</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
              <div class="createadmininputs">
                <div class="form-group">
                  <label for="sel1">Payment Account</label>
                  <select class="form-control" id="" name="payment_account">
                  <option value="">Select Account</option>
                  <option value="cash" @if($result2[0]->payment_account == 'cash') selected @endif>Cash on Hand</option>
                  @if(count($result1)>0)
                  @foreach($result1 as $results)
                    <option value="{{$results->account_name}}" @if($result2[0]->payment_account == $results->account_name) selected @endif>{{$results->account_name}}</option>
               @endforeach
               @endif
                  </select>
                </div>
              </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
              <div class="createadmininputs">
                <div class="form-group">
                  <label for="usr">Description</label>
                  <input type="text" value="{{$result2[0]->description}}" class="form-control" id="" name="description">
                </div>
              </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
              <div class="createadmininputs">
                <div class="form-group">
                  <label for="usr">Amount</label>
                  <input type="number" value="{{$result2[0]->amount}}" class="form-control" id="" name="amount">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    
      <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 col-lg-offset-7">
          <div class="totalamountp">
            <button type="submit" class="amountbtn btn">Save</button>
          </div>
        </div>
      </div>
    </div>
    <!-- /page content --> 
    </form>
  @endsection