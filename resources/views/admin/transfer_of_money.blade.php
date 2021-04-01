@extends('admin.layout.appadmin')
@section('content') 

<!-- page content -->
<div class="right_col" role="main">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="viewadminhead">
        <h2>Transfer of Money</h2>
      </div>
    </div>
  </div>
  <form method="post" action = "{{url('/')}}/admin/home/add/transfer_of_money" class="login-form">
    {{ csrf_field() }}
    
    @if($errors->any())
    <div class="alert alert-success"> <strong>{{$errors->first()}}</strong>  </div>
    @endif
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div class="createadmininputs">
          <div class="form-group">
            <label for="sel1">Transfer Funds From</label>
            <select  class="selectpicker form-control" data-show-subtext="true" name="fund_from" id="main"  data-live-search="true">
              <option value=""  ></option>
              
              @if($result>0)
          @foreach($result as $results)
                  
              <option value="{{urlencode($results->pk_id)}}">{{$results->account_name}}</option>
              
                  @endforeach
                  @endif

              
            </select>
          </div>
        </div>
      </div>
      
      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div class="createadmininputs">
          <div class="form-group">
            <label for="usr">Balance</label>
            <h3 id="Sub"><span>PKR:00</span></h3>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div class="createadmininputs">
          <div class="form-group">
            <label for="sel1">Transfer Funds To</label>
            <select  class="selectpicker form-control" data-show-subtext="true" name="fund_to" id="Main" data-live-search="true">
              <option value="" ></option>
              
              @if($result>0)
          @foreach($result as $results)
                  
              <option value="{{urlencode($results->pk_id)}}">{{$results->account_name}}</option>
              
                  @endforeach
                  @endif

              
            </select>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div class="createadmininputs">
          <div class="form-group">
            <label>Balance</label>
            <h3 id="sub"><span>PKR:00</span></h3>
          </div>
        </div>
      </div>
      
      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div class="createadmininputs">
          <div class="form-group">
            <label for="usr">Transfer Amount</label>
            <input type="number" name="tansfer_amount" class="form-control">
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div class="createadmininputs">
          <div class="form-group">
            <label for="usr">Date</label>
            <input type="text" class="form-control" id="mydate" name="date">
          </div>
        </div>
      </div>
      
      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div class="createadmininputs">
          <div class="form-group">
            <label for="usr">Memo</label>
            <textarea class="form-control" name="description" rows="9"></textarea>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 col-lg-offset-8">
        <div class="viewadminbtn">
          <button type="submit" class="btnedit btn">Save</button>
        </div>
      </div>
    </div>
  </form>
</div>
<!-- /page content --> 

@endsection 