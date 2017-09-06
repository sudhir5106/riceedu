<?php
include('../../config.php'); 
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
include(PATH_ADMIN_INCLUDE.'/header.php');
$db = new DBConn();


// get all list of rm logins 
$getrmlogin=$db->ExecuteQuery("SELECT R_Id, R_Emp_Code, R_Address, e.EMP_Name, R_Password, R_Block, R_District, R_State
FROM rm_login r
LEFT JOIN employee_master e ON r.R_Emp_Code = e.EMP_Code

WHERE r.R_Id = ".$_GET['id']);

// get all list of states
$getStates=$db->ExecuteQuery("SELECT * FROM state_master ");

// get all list of districts
$getDistrict=$db->ExecuteQuery("SELECT District_Id, District_Name FROM district_master WHERE State_Id=".$getrmlogin[1]['R_State']);

// get all list of blocks
$getBlocks=$db->ExecuteQuery("SELECT Block_Id, Block_Name FROM block_master WHERE District_Id=".$getrmlogin[1]['R_District']);

?>
<script type="text/javascript"  src="rm.js" ></script>

<div class="main">
  <div class="page-title">
    <div>
      <div class="col-lg-5 pull-left">
        <h4><i class="glyphicon glyphicon-edit"></i> Edit Login Details of Regional Manager</h4>
      </div>
      <div class="col-lg-5 pull-right text-right">
      	<span class="hidden-phone" style="margin-left: 15px; margin-top: 3px;"><a class="btn btn-primary" href="index.php"><i class="glyphicon glyphicon-share-alt"></i> View RM Login List</a></span>
      </div>
    </div>
    <div class="clearfix">&nbsp;</div>
  </div>
  <div class="clear formbgstyle">
    <form class="form-horizontal" role="form" id="editRm" method="post">
      <div>
        <div class="form-group">
          <label class="control-label col-sm-4 mandatory" for="emp_code">RM Employee Code <span>*</span>:</label>
          <div class="col-sm-5">
            <input type="text" class="form-control input-sm" id="emp_code" name="emp_code" placeholder="Ex: AB00001" value="<?php echo $getrmlogin[1]['R_Emp_Code']; ?>" />
          </div>
        </div>
        <div class="form-group" id="empNameBlk">
          <label class="control-label col-sm-4 mandatory" for="emp_name">RM Name :</label>
          <div class="col-sm-5 control-label">
            <div id="empName" class="text-left"><?php echo $getrmlogin[1]['EMP_Name'] ?></div>
          </div>
        </div>
        
        <div class="small-headings"><strong>Regional Office Address</strong></div>
        
        <div class="form-group">
          <label class="control-label col-sm-4 mandatory" for="state">State <span>*</span>:</label>
          <div class="col-sm-3">
            <select name="state" id="state" class="form-control input-sm" >
              <option value="">--Select Type--</option>
              
			  <?php foreach($getStates as $getStatesVal){ ?>
              <option <?php if($getStatesVal['State_Id']==$getrmlogin[1]['R_State']){echo 'selected="selected"';}?> value="<?php echo $getStatesVal['State_Id']; ?>"><?php echo $getStatesVal['State_Name']; ?></option>
              <?php } ?>
              
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-4 mandatory" for="district">District <span>*</span>:</label>
          <div class="col-sm-3">
            <select name="district" id="district" class="form-control input-sm" >
              <option value="">--Select Type--</option>
              
              <?php foreach($getDistrict as $getDistrictVal){ ?>
              <option <?php if($getDistrictVal['District_Id']==$getrmlogin[1]['R_District']){echo "selected";}?> value="<?php echo $getDistrictVal['District_Id']; ?>"><?php echo $getDistrictVal['District_Name']; ?></option>
              <?php } ?>
              
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-4 mandatory" for="block">Block <span>*</span>:</label>
          <div class="col-sm-3">
            <select name="block" id="block" class="form-control input-sm" >
              <option value="">--Select Type--</option>
              
              <?php foreach($getBlocks as $getBlocksVal){ ?>
              <option <?php if($getBlocksVal['Block_Id']==$getrmlogin[1]['R_Block']){echo "selected";}?> value="<?php echo $getBlocksVal['Block_Id']; ?>"><?php echo $getBlocksVal['Block_Name']; ?></option>
              <?php } ?>
              
            </select>
          </div>
        </div>
        
        <div class="form-group">
          <label class="control-label col-sm-4 mandatory" for="address">Address <span>*</span>:</label>
          <div class="col-sm-4">
            <textarea  class="form-control input-sm txtarea" id="address" name="address" placeholder="Address"><?php echo $getrmlogin[1]['R_Address'] ?></textarea>
          </div>
        </div>
        
        <div class="form-group">
          <label class="control-label col-sm-4 mandatory" for="password">Password <span>*</span>:</label>
          <div class="col-sm-3">
            <input type="text" class="form-control input-sm" id="password" name="password" placeholder="Enter Login Password" value="<?php echo $getrmlogin[1]['R_Password'] ?>" />
          </div>
        </div>
        
        
        <div class="form-group">
          <div class="col-sm-4"></div>
          <div class="col-sm-3">
          	<input type="hidden" id="rid" value="<?php echo $_GET['id']; ?>">
            <input type="button" class="btn btn-primary btn-sm" id="edit" value="Update">
            <input type="reset" class="btn btn-default btn-sm" id="reset" value="Reset">
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
