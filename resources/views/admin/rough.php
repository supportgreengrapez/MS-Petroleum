<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
          <div class="createadmininputs">
            <div class="form-group">
              <label for="sel1">Account Type</label>
              <select class="selectpicker form-control" required="" data-show-subtext="true" name="account_type" id=" " data-live-search="true">
                <?php foreach ($account_type as $key => $value) {
             
                ?>
                  <option  class="form-control"  value="{{$value->pk_id}}" >{{$value->account_name}}</option>
                <!-- <option value="{{$value->pk_id}}">{{$value->account_name}}</option> -->
                
              <?php } ?>
              </select>
            </div>
          </div>
        </div>