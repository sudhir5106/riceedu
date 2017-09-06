<?php
include('../../../config.php'); 
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
include(PATH_ADMIN_INCLUDE.'/header.php');
$db = new DBConn();


// get all list of employee 
$getemployee=$db->ExecuteQuery("SELECT DATE_FORMAT(DOJ,'%d-%m-%Y') AS DOJ, e.EMP_Id, e.EMP_Code, e.EMP_Image, e.EMP_Name, e.EMP_Designation, e.Block_Id, e.District_Id, d.State_Id, e.EMP_Address, e.EMP_Contact, EMP_Email, EMP_Salary, Posting_Place, Duty_Time, Visiting_Date_Place

FROM employee_master e

LEFT JOIN block_master b ON e.Block_Id = b.Block_Id
LEFT JOIN district_master d ON e.District_Id = d.District_Id
LEFT JOIN state_master s ON d.State_Id = s.State_Id

WHERE e.EMP_Id = ".$_GET['id']);

// get all list of states
$getStates=$db->ExecuteQuery("SELECT * FROM state_master ");

// get all list of districts
$getDistrict=$db->ExecuteQuery("SELECT District_Id, District_Name FROM district_master WHERE State_Id=".$getemployee[1]['State_Id']);

// get all list of blocks
$getBlocks=$db->ExecuteQuery("SELECT Block_Id, Block_Name FROM block_master WHERE District_Id=".$getemployee[1]['District_Id']);

?>
<script type="text/javascript"  src="employee.js" ></script>

<div class="main">
  <div class="page-title">
    <div>
      <div class="col-lg-5 pull-left">
        <h4><i class="glyphicon glyphicon-plus"></i> Edit Employee</h4>
      </div>
      <div class="col-lg-5 pull-right text-right">
      	<span class="hidden-phone" style="margin-left: 15px; margin-top: 3px;"><a class="btn btn-primary" href="index.php"><i class="glyphicon glyphicon-share-alt"></i> View Employee List</a></span>
      </div>
    </div>
    <div class="clearfix">&nbsp;</div>
  </div>
  <div class="clear formbgstyle">
    <form class="form-horizontal" role="form" id="editEmployee" action="" method="post">
      <div>
        <div class="form-group">
            <label class="col-md-4 control-label mandatory" for="filebutton">Employee Photo <span>*</span>:</label>
            <div class="col-md-4">
                
              <input type="hidden" id="emp-img" name="emp-img" value="<?php echo $getemployee[1]['EMP_Image']?>"/>
                
  		<?php if(!empty($getemployee[1]['EMP_Image']) && file_exists(ROOT."/data_images/employee/".$getemployee[1]['EMP_Image']))
			{ 
				echo '<div class="col-md-4"><img width="100%" src="'.PATH_DATA_IMAGE."/employee/".$getemployee[1]['EMP_Image'].'"/></div>';
			} 
			  else{
				  echo '<label class="col-md-4 control-label" for="fileupload"><span class="glyphicon glyphicon-user" style="font-size:50pt;"></span></label>';
			  }
				  ?>
                
                <input class="col-md-8" type="file" id="fileupload" name="fileupload" accept="image/jpg,image/png,image/jpeg,image/gif"/>
                
           </div>
        </div>
        
        <div class="form-group">
          <label class="control-label col-sm-4 mandatory" for="emp_code">Employee Code <span>*</span>:</label>
          <div class="col-sm-5">
            <input type="text" class="form-control input-sm" id="emp_code" name="emp_code" placeholder="Ex: AB00001" value="<?php echo $getemployee[1]['EMP_Code'] ?>" />
          </div>
        </div>
        
        <div class="form-group">
          <label class="control-label col-sm-4 mandatory" for="emp_name">Employee Name <span>*</span>:</label>
          <div class="col-sm-5">
            <input type="text" class="form-control input-sm" id="emp_name" name="emp_name" placeholder="Name of the Employee" value="<?php echo $getemployee[1]['EMP_Name'] ?>" />
          </div>
        </div>
        
        <div class="form-group">
          <label class="control-label col-sm-4 mandatory" for="designation">Designation <span>*</span>:</label>
          <div class="col-sm-5">
          	<input class="pull-left checkboxVerAlign" id="rmChkBx" type="checkbox" <?php if($getemployee[1]['EMP_Designation']=='Regional Manager'){echo 'checked="checked"';} ?> />&nbsp; Regional Manager<br />
            <input class="pull-left checkboxVerAlign" id="dmChkBx" type="checkbox" <?php if($getemployee[1]['EMP_Designation']=='District Manager'){echo 'checked="checked"';} ?> />&nbsp; District Manager<br />
            <input class="pull-left checkboxVerAlign" id="cmChkBx" type="checkbox" <?php if($getemployee[1]['EMP_Designation']=='Center Manager'){echo 'checked="checked"';} ?> />&nbsp; Center Manager<br />
            <input class="pull-left checkboxVerAlign" id="otherChkBx" type="checkbox" <?php if($getemployee[1]['EMP_Designation']!='Regional Manager' and $getemployee[1]['EMP_Designation']!='District Manager' and $getemployee[1]['EMP_Designation']!='Center Manager'){echo 'checked="checked"';} ?> />&nbsp; Other<br /><br />
            <input type="text" class="form-control input-sm" id="designation" name="designation" placeholder="Designation" readonly="readonly" value="<?php echo $getemployee[1]['EMP_Designation']?>" /><br />
          </div>
        </div>
        
        <div class="form-group">
          <label class="control-label col-sm-4 mandatory" for="salary">Salary <span>*</span>:</label>
          <div class="col-sm-5">
            <input type="text" class="form-control input-sm" id="salary" name="salary" placeholder="Salary" value="<?php echo $getemployee[1]['EMP_Salary']?>" />
          </div>
        </div>
        
        <div class="form-group">
          <label class="control-label col-sm-4 mandatory" for="state">State <span>*</span>:</label>
          <div class="col-sm-3">
            <select name="state" id="state" class="form-control input-sm" >
              <option value="">--Select Type--</option>
              
              <?php foreach($getStates as $getStatesVal){ ?>
              <option <?php if($getStatesVal['State_Id']==$getemployee[1]['State_Id']){echo 'selected="selected"';}?> value="<?php echo $getStatesVal['State_Id']; ?>"><?php echo $getStatesVal['State_Name']; ?></option>
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
              <option value="<?php echo $getDistrictVal['District_Id']; ?>" <?php if($getDistrictVal['District_Id']==$getemployee[1]['District_Id']){echo "selected";}?>><?php echo $getDistrictVal['District_Name']; ?></option>
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
              <option value="<?php echo $getBlocksVal['Block_Id']; ?>" <?php if($getBlocksVal['Block_Id']==$getemployee[1]['Block_Id']){echo "selected";}?>><?php echo $getBlocksVal['Block_Name']; ?></option>
              <?php } ?>
              
            </select>
          </div>
        </div>
        
        <div class="form-group">
          <label class="control-label col-sm-4 mandatory" for="address">Address <span>*</span>:</label>
          <div class="col-sm-4">
            <textarea  class="form-control input-sm txtarea" id="address" name="address" placeholder="Address"><?php echo $getemployee[1]['EMP_Address']?></textarea>
          </div>
        </div>
        
        <div class="form-group">
          <label class="control-label col-sm-4 mandatory" for="contact_no">Contact No <span>*</span>:</label>
          <div class="col-sm-3">
            <input type="text" class="form-control input-sm" id="contact_no" name="contact_no" placeholder="Contact No" value="<?php echo $getemployee[1]['EMP_Contact']?>" />
          </div>
        </div>
        
        <div class="form-group">
          <label class="control-label col-sm-4 mandatory" for="email">Email <span>*</span>:</label>
          <div class="col-sm-3">
            <input type="text" class="form-control input-sm" id="email" name="email" placeholder="Email" value="<?php echo $getemployee[1]['EMP_Email']?>" />
          </div>
        </div>
        <!--<div class="form-group">
          <label class="control-label col-sm-4 mandatory" for="password">Password <span>*</span>:</label>
          <div class="col-sm-3">
            <input type="password" class="form-control input-sm" id="password" name="password" placeholder="Password" />
          </div>
        </div>-->
        
        <div class="form-group">
          <label class="control-label col-sm-4 mandatory" for="posting_place">Posting Place <span>*</span>:</label>
          <div class="col-sm-5">
            <input type="text" class="form-control input-sm" id="posting_place" name="posting_place" placeholder="Posting Place" value="<?php echo $getemployee[1]['Posting_Place']?>" />
          </div>
        </div>
        
        <div class="form-group">
          <label class="control-label col-sm-4 mandatory" for="duty_time">Duty Time <span>*</span>:</label>
          <div class="col-sm-5">
            <input type="text" class="form-control input-sm" id="duty_time" name="duty_time" placeholder="Ex: 10AM to 6PM" value="<?php echo $getemployee[1]['Duty_Time']?>" />
          </div>
        </div>
        
        <div class="form-group">
          <label class="control-label col-sm-4 mandatory" for="Visiting_Date_Place">Visiting Date &amp; Place <span>*</span>:</label>
          <div class="col-sm-5">
            <input type="text" class="form-control input-sm" id="Visiting_Date_Place" name="Visiting_Date_Place" placeholder="Visiting Date & Place" value="<?php echo $getemployee[1]['Visiting_Date_Place']?>" />
          </div>
        </div>
        
        
        <div class="form-group">
          <div class="col-sm-4"></div>
          <div class="col-sm-3">
          	<input type="hidden" id="emp_id" name="emp_id" value="<?php echo $getemployee[1]['EMP_Id'] ?>">
            
            <input type="button" class="btn btn-primary btn-sm" id="edit" value="Update">
            <input type="reset" class="btn btn-default btn-sm" id="reset" value="Reset">
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
