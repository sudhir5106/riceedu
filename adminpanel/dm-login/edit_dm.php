<?php
include('../../config.php'); 
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
include(PATH_ADMIN_INCLUDE.'/header.php');
$db = new DBConn();


// get all list of rm logins 
$getdmlogin=$db->ExecuteQuery("SELECT DM_Id, R_Emp_Code, DM_Emp_Code, DM_Address, e.EMP_Name AS DEMP_Name, em.EMP_Name AS REMP_Name, DM_Password, DM_Block, DM_District, DM_State
FROM dm_login dm
LEFT JOIN employee_master e ON dm.DM_Emp_Code = e.EMP_Code
LEFT JOIN employee_master em ON dm.R_Emp_Code = em.EMP_Code

WHERE dm.DM_Id = ".$_GET['id']);

// get all list of states
$getStates=$db->ExecuteQuery("SELECT * FROM state_master ");

// get all list of districts
$getDistrict=$db->ExecuteQuery("SELECT District_Id, District_Name FROM district_master WHERE State_Id=".$getdmlogin[1]['DM_State']);

// get all list of blocks
$getBlocks=$db->ExecuteQuery("SELECT Block_Id, Block_Name FROM block_master WHERE District_Id=".$getdmlogin[1]['DM_District']);

?>
<script type="text/javascript"  src="dm.js" ></script>

<div class="main">
  <div class="page-title">
    <div>
      <div class="col-lg-5 pull-left">
        <h4><i class="glyphicon glyphicon-edit"></i> Edit Login Details of District Manager</h4>
      </div>
      <div class="col-lg-5 pull-right text-right">
      	<span class="hidden-phone" style="margin-left: 15px; margin-top: 3px;"><a class="btn btn-primary" href="index.php"><i class="glyphicon glyphicon-share-alt"></i> View DM Login List</a></span>
      </div>
    </div>
    <div class="clearfix">&nbsp;</div>
  </div>
  <div class="clear formbgstyle">
    <form class="form-horizontal" role="form" id="editDm" method="post">
      <div>
        <div class="form-group">
          <label class="control-label col-sm-4 mandatory" for="r_emp_code">RM Employee Code <span>*</span>:</label>
          <div class="col-sm-5">
            <input type="text" class="form-control input-sm" id="r_emp_code" name="r_emp_code" placeholder="Ex: AB00001" value="<?php echo $getdmlogin[1]['R_Emp_Code']; ?>" />
          </div>
        </div>
        <div class="form-group" id="rempNameBlk">
          <label class="control-label col-sm-4 mandatory" for="r_emp_name">RM Name :</label>
          <div class="col-sm-5 control-label">
            <div id="rEmpName" class="text-left"><?php echo $getdmlogin[1]['REMP_Name'] ?></div>
          </div>
        </div>
        
        <div class="form-group">
          <label class="control-label col-sm-4 mandatory" for="d_emp_code">DM Employee Code <span>*</span>:</label>
          <div class="col-sm-5">
            <input type="text" class="form-control input-sm" id="d_emp_code" name="d_emp_code" placeholder="Ex: AB00001" value="<?php echo $getdmlogin[1]['DM_Emp_Code']; ?>" />
          </div>
        </div>
        <div class="form-group" id="dempNameBlk">
          <label class="control-label col-sm-4 mandatory" for="d_emp_name">DM Name :</label>
          <div class="col-sm-5 control-label">
            <div id="dEmpName" class="text-left"><?php echo $getdmlogin[1]['DEMP_Name'] ?></div>
          </div>
        </div>
        
        <div class="small-headings"><strong>Regional Office Address</strong></div>
        
        <div class="form-group">
          <label class="control-label col-sm-4 mandatory" for="state">State <span>*</span>:</label>
          <div class="col-sm-3">
            <select name="state" id="state" class="form-control input-sm" >
              <option value="">--Select Type--</option>
              
			  <?php foreach($getStates as $getStatesVal){ ?>
              <option <?php if($getStatesVal['State_Id']==$getdmlogin[1]['DM_State']){echo 'selected="selected"';}?> value="<?php echo $getStatesVal['State_Id']; ?>"><?php echo $getStatesVal['State_Name']; ?></option>
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
              <option <?php if($getDistrictVal['District_Id']==$getdmlogin[1]['DM_District']){echo "selected";}?> value="<?php echo $getDistrictVal['District_Id']; ?>"><?php echo $getDistrictVal['District_Name']; ?></option>
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
              <option <?php if($getBlocksVal['Block_Id']==$getdmlogin[1]['DM_Block']){echo "selected";}?> value="<?php echo $getBlocksVal['Block_Id']; ?>"><?php echo $getBlocksVal['Block_Name']; ?></option>
              <?php } ?>
              
            </select>
          </div>
        </div>
        
        <div class="form-group">
          <label class="control-label col-sm-4 mandatory" for="address">Address <span>*</span>:</label>
          <div class="col-sm-4">
            <textarea  class="form-control input-sm txtarea" id="address" name="address" placeholder="Address"><?php echo $getdmlogin[1]['DM_Address'] ?></textarea>
          </div>
        </div>
        
        <div class="form-group">
          <label class="control-label col-sm-4 mandatory" for="password">Password <span>*</span>:</label>
          <div class="col-sm-3">
            <input type="text" class="form-control input-sm" id="password" name="password" placeholder="Enter Login Password" value="<?php echo $getdmlogin[1]['DM_Password'] ?>" />
          </div>
        </div>
        
        
        <div class="form-group">
          <div class="col-sm-4"></div>
          <div class="col-sm-3">
          	<input type="hidden" id="dmid" value="<?php echo $_GET['id']; ?>">
            <input type="button" class="btn btn-primary btn-sm" id="edit" value="Update">
            <input type="reset" class="btn btn-default btn-sm" id="reset" value="Reset">
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
