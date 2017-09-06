<?php
include('../../config.php'); 
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
include(PATH_ADMIN_INCLUDE.'/header.php');
$db = new DBConn();


// get all list of rm logins 
$getdmlogin=$db->ExecuteQuery("SELECT CM_Id, Center_Code, DM_Emp_Code, CM_Emp_Code, CM_Address, e.EMP_Name AS CEMP_Name, em.EMP_Name AS DEMP_Name, CM_Password, CM_Block, CM_District, CM_State
FROM cm_login cm
LEFT JOIN employee_master e ON cm.CM_Emp_Code = e.EMP_Code
LEFT JOIN employee_master em ON cm.DM_Emp_Code = em.EMP_Code

WHERE cm.CM_Id = ".$_GET['id']);

// get all list of states
$getStates=$db->ExecuteQuery("SELECT * FROM state_master ");

// get all list of districts
$getDistrict=$db->ExecuteQuery("SELECT District_Id, District_Name FROM district_master WHERE State_Id=".$getdmlogin[1]['CM_State']);

// get all list of blocks
$getBlocks=$db->ExecuteQuery("SELECT Block_Id, Block_Name FROM block_master WHERE District_Id=".$getdmlogin[1]['CM_District']);

?>
<script type="text/javascript"  src="cm.js" ></script>

<div class="main">
  <div class="page-title">
    <div>
      <div class="col-lg-5 pull-left">
        <h4><i class="glyphicon glyphicon-edit"></i> Edit Login Details of Center Manager</h4>
      </div>
      <div class="col-lg-5 pull-right text-right">
      	<span class="hidden-phone" style="margin-left: 15px; margin-top: 3px;"><a class="btn btn-primary" href="index.php"><i class="glyphicon glyphicon-share-alt"></i> View CM Login List</a></span>
      </div>
    </div>
    <div class="clearfix">&nbsp;</div>
  </div>
  <div class="clear formbgstyle">
    <form class="form-horizontal" role="form" id="editCm" method="post">
      <div>
        <div class="form-group">
          <label class="control-label col-sm-4 mandatory" for="centercode">Center Code :</label>
          <div class="col-sm-2">
            <input type="text" class="form-control input-sm" id="centercode" name="centercode" placeholder="Ex: AB00001" value="<?php echo $getdmlogin[1]['Center_Code']; ?>" />
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
        
        <div class="form-group">
          <label class="control-label col-sm-4 mandatory" for="c_emp_code">CM Employee Code <span>*</span>:</label>
          <div class="col-sm-5">
            <input type="text" class="form-control input-sm" id="c_emp_code" name="c_emp_code" placeholder="Ex: AB00001" value="<?php echo $getdmlogin[1]['CM_Emp_Code']; ?>" />
          </div>
        </div>
        <div class="form-group" id="cempNameBlk">
          <label class="control-label col-sm-4 mandatory" for="c_emp_name">CM Name :</label>
          <div class="col-sm-5 control-label">
            <div id="cEmpName" class="text-left"><?php echo $getdmlogin[1]['CEMP_Name'] ?></div>
          </div>
        </div>
        
        <div class="small-headings"><strong>Regional Office Address</strong></div>
        
        <div class="form-group">
          <label class="control-label col-sm-4 mandatory" for="state">State <span>*</span>:</label>
          <div class="col-sm-3">
            <select name="state" id="state" class="form-control input-sm" >
              <option value="">--Select Type--</option>
              
			  <?php foreach($getStates as $getStatesVal){ ?>
              <option <?php if($getStatesVal['State_Id']==$getdmlogin[1]['CM_State']){echo 'selected="selected"';}?> value="<?php echo $getStatesVal['State_Id']; ?>"><?php echo $getStatesVal['State_Name']; ?></option>
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
              <option <?php if($getDistrictVal['District_Id']==$getdmlogin[1]['CM_District']){echo "selected";}?> value="<?php echo $getDistrictVal['District_Id']; ?>"><?php echo $getDistrictVal['District_Name']; ?></option>
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
              <option <?php if($getBlocksVal['Block_Id']==$getdmlogin[1]['CM_Block']){echo "selected";}?> value="<?php echo $getBlocksVal['Block_Id']; ?>"><?php echo $getBlocksVal['Block_Name']; ?></option>
              <?php } ?>
              
            </select>
          </div>
        </div>
        
        <div class="form-group">
          <label class="control-label col-sm-4 mandatory" for="address">Address <span>*</span>:</label>
          <div class="col-sm-4">
            <textarea  class="form-control input-sm txtarea" id="address" name="address" placeholder="Address"><?php echo $getdmlogin[1]['CM_Address'] ?></textarea>
          </div>
        </div>
        
        <div class="form-group">
          <label class="control-label col-sm-4 mandatory" for="password">Password <span>*</span>:</label>
          <div class="col-sm-3">
            <input type="text" class="form-control input-sm" id="password" name="password" placeholder="Enter Login Password" value="<?php echo $getdmlogin[1]['CM_Password'] ?>" />
          </div>
        </div>
        
        
        <div class="form-group">
          <div class="col-sm-4"></div>
          <div class="col-sm-3">
          	<input type="hidden" id="cmid" value="<?php echo $_GET['id']; ?>">
            <input type="button" class="btn btn-primary btn-sm" id="edit" value="Update">
            <input type="reset" class="btn btn-default btn-sm" id="reset" value="Reset">
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
