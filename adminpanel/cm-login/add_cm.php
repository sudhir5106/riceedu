<?php
include('../../config.php'); 
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
include(PATH_ADMIN_INCLUDE.'/header.php');
$db = new DBConn();

// get all list of states
$getStates=$db->ExecuteQuery("SELECT * FROM state_master ");
?>
<script type="text/javascript" src="cm.js"></script>

<div class="main">
  <div class="page-title">
    <div>
      <div class="col-lg-5 pull-left">
        <h4><i class="glyphicon glyphicon-plus"></i> Create Login For Center Manager</h4>
      </div>
      <div class="col-lg-5 pull-right text-right">
      	<span class="hidden-phone" style="margin-left: 15px; margin-top: 3px;"><a class="btn btn-primary" href="index.php"><i class="glyphicon glyphicon-share-alt"></i> View CM Login List</a></span>
      </div>
    </div>
    <div class="clearfix">&nbsp;</div>
  </div>
  <div class="clear formbgstyle">
    <form class="form-horizontal" role="form" id="insertCm" method="post">
      <div>
        <div class="form-group">
          <label class="control-label col-sm-4 mandatory" for="centercode">Center Code <span>*</span>:</label>
          <div class="col-sm-5">
            <input type="text" class="form-control input-sm" id="centercode" name="centercode" placeholder="Ex: AB00001" />
          </div>
        </div>
        
        <div class="form-group">
          <label class="control-label col-sm-4 mandatory" for="d_emp_code">DM Employee Code <span>*</span>:</label>
          <div class="col-sm-5">
            <input type="text" class="form-control input-sm" id="d_emp_code" name="d_emp_code" placeholder="Ex: AB00001" />
          </div>
        </div>
        
        <div class="form-group" id="dempNameBlk" style="display:none;">
          <label class="control-label col-sm-4 mandatory" for="d_emp_name">DM Name :</label>
          <div class="col-sm-5 control-label">
            <div id="dEmpName" class="text-left"></div>
          </div>
        </div>
        
        <div class="form-group">
          <label class="control-label col-sm-4 mandatory" for="c_emp_code">CM Employee Code <span>*</span>:</label>
          <div class="col-sm-5">
            <input type="text" class="form-control input-sm" id="c_emp_code" name="c_emp_code" placeholder="Ex: AB00001" />
          </div>
        </div>
        <div class="form-group" id="cempNameBlk" style="display:none;">
          <label class="control-label col-sm-4 mandatory" for="c_emp_name">CM Name :</label>
          <div class="col-sm-5 control-label">
            <div id="cEmpName" class="text-left"></div>
          </div>
        </div>
        
        <div class="small-headings"><strong>Training Center Address</strong></div>
        
        <div class="form-group">
          <label class="control-label col-sm-4 mandatory" for="state">State <span>*</span>:</label>
          <div class="col-sm-3">
            <select name="state" id="state" class="form-control input-sm" >
              <option value="">--Select Type--</option>
              <?php foreach($getStates as $getStatesVal){ ?>
              <option value="<?php echo $getStatesVal['State_Id']; ?>"><?php echo $getStatesVal['State_Name']; ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-4 mandatory" for="district">District <span>*</span>:</label>
          <div class="col-sm-3">
            <select name="district" id="district" class="form-control input-sm" >
              <option value="">--Select Type--</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-4 mandatory" for="block">Block <span>*</span>:</label>
          <div class="col-sm-3">
            <select name="block" id="block" class="form-control input-sm" >
              <option value="">--Select Type--</option>
            </select>
          </div>
        </div>
        
        <div class="form-group">
          <label class="control-label col-sm-4 mandatory" for="address">Address <span>*</span>:</label>
          <div class="col-sm-4">
            <textarea  class="form-control input-sm txtarea" id="address" name="address" placeholder="Address"></textarea>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-4 mandatory" for="contact_no">Contact No. <span>*</span>:</label>
          <div class="col-sm-4">
          <input type="text" class="form-control input-sm" id="contact_no" name="contact_no" placeholder="Contact No." />
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-4 mandatory" for="Emaiid">Email <span>*</span>:</label>
          <div class="col-sm-4">
          <input type="text" class="form-control input-sm" id="email" name="email" placeholder="Email" />
          </div>
        </div>

        <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="imageupload">Image Upload <span class="required">*</span> </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="file" id="imageupload" name="imageupload" required="required" class="form-control col-md-7 col-xs-12 " accept="image/jpg,image/png,image/jpeg,image/gif" multiple>
                <span id="errmsg"></span> (Note : Image size must be geater than 500*300  and you can also upload multiple images also.) </div>
            </div>


        
        <div class="form-group">
          <label class="control-label col-sm-4 mandatory" for="password">Password <span>*</span>:</label>
          <div class="col-sm-3">
            <input type="text" class="form-control input-sm" id="password" name="password" placeholder="Enter Login Password" />
          </div>
        </div>
        
        
        <div class="form-group">
          <div class="col-sm-4"></div>
          <div class="col-sm-3">
            <input type="button" class="btn btn-primary btn-sm" id="submit" value="Submit">
            <input type="reset" class="btn btn-default btn-sm" id="reset" value="Reset">
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
