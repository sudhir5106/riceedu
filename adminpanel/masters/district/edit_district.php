<?php
include('../../../config.php'); 
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
include(PATH_ADMIN_INCLUDE.'/header.php');
$db = new DBConn();

// get all list of job rolls
$getStateDistrict=$db->ExecuteQuery("SELECT dm.District_Id, dm.District_Name, s.State_Id FROM district_master dm

LEFT JOIN state_master s ON dm.State_Id = s.State_Id
WHERE dm.District_Id =".$_GET['id']);

?>
<script type="text/javascript"  src="district_name.js" ></script>

<div class="main">
  <div class="page-title">
        <div>
            <div class="col-lg-5 pull-left"><h4><i class="glyphicon glyphicon-edit"></i> Edit Dsitrict</h4></div>
            <div class="col-lg-5 pull-right">
                <div class="ef_header_tools pull-left">
                    <a class="btn btn-primary" href="index.php" title="Add course"><i class="glyphicon glyphicon-plus"></i>&nbsp;Add District</a>
                </div>
            </div>
        </div>
        <div class="clearfix">&nbsp;</div>
    </div>
  
  
  <div class="clear formbgstyle">
    <form class="form-horizontal" role="form" id="editDistrict" method="post">
      <div>
        <div class="form-group">
          <label class="control-label col-sm-3 mandatory" for="state">State <span>*</span>:</label>
          <div class="col-sm-5">
            <select name="state" id="state" class="form-control input-sm" >
              <option value="">-- Select --</option>
              <?php 
			  $getState=$db->ExecuteQuery("SELECT * FROM state_master ");
			  
			  foreach($getState as $getStateVal){ ?>
              <option <?php if($getStateDistrict[1]['State_Id']==$getStateVal['State_Id']){echo "selected";} ?> value="<?php echo $getStateVal['State_Id']; ?>"><?php echo $getStateVal['State_Name']; ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3 mandatory" for="district_name">Name of District <span>*</span>:</label>
          <div class="col-sm-6">
            <input type="text" class="form-control input-sm" id="district_name" name="district_name" placeholder="Name of District" value="<?php echo $getStateDistrict[1]['District_Name']; ?>" />
          </div>
        </div>
        
        
        <div class="form-group">
          <div class="col-sm-3"></div>
          <div class="col-sm-3">
          	<input type="hidden" id="district_id" value="<?php echo $getStateDistrict[1]['District_Id']; ?>">
            <input type="button" class="btn btn-primary btn-sm" id="edit" value="Update">
            <input type="reset" class="btn btn-default btn-sm" id="reset" value="Reset">
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
