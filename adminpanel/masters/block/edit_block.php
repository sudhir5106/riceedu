<?php
include('../../../config.php'); 
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
include(PATH_ADMIN_INCLUDE.'/header.php');
$db = new DBConn();

// get block details
$getBlock=$db->ExecuteQuery("SELECT Block_Id, Block_Name, b.District_Id, dm.State_Id
FROM block_master b
LEFT JOIN district_master dm ON b.District_Id = dm.District_Id
LEFT JOIN state_master s ON dm.State_Id = s.State_Id

WHERE Block_Id=".$_GET['id']);

// get all list of states
$getState=$db->ExecuteQuery("SELECT State_Id, State_Name FROM state_master ");
// get all list of districts
$getDistrict=$db->ExecuteQuery("SELECT District_Id, District_Name FROM district_master WHERE State_Id=".$getBlock[1]['State_Id']);

?>
<script type="text/javascript" src="block.js"></script>

<div class="main">
  <div class="page-title">
        <div>
            <div class="col-lg-5 pull-left">
            	<h4><i class="glyphicon glyphicon-edit"></i> Edit Block</h4>
            </div>
            
            <div class="col-lg-5 pull-right text-right">
                <span class="hidden-phone" style="margin-left: 15px; margin-top: 3px;"><a class="btn btn-primary" href="index.php" title="Add course"><i class="glyphicon glyphicon-plus"></i>&nbsp;Add Block</a></span>
            </div>
        </div>
        <div class="clearfix">&nbsp;</div>
    </div>
  
  
  <div class="clear formbgstyle">
    <form class="form-horizontal" role="form" id="editBlock" method="post">
      <div>
        <div class="form-group">
          <label class="control-label col-sm-3 mandatory" for="state">State <span>*</span>:</label>
          <div class="col-sm-3">
            <select name="state" id="state" class="form-control input-sm" >
              <option value="">-- Select --</option>
              <?php foreach($getState as $getStateVal){ ?>
              <option value="<?php echo $getStateVal['State_Id']; ?>" <?php if($getStateVal['State_Id']==$getBlock[1]['State_Id']){echo "selected";}?>><?php echo $getStateVal['State_Name']; ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        
        <div class="form-group">
          <label class="control-label col-sm-3 mandatory" for="district">District <span>*</span>:</label>
          <div class="col-sm-3" id="districtDiv">
            <select name="district" id="district" class="form-control input-sm" >
              <option value="">-- Select --</option>
              
              <?php foreach($getDistrict as $getDistrictVal){ ?>
              <option value="<?php echo $getDistrictVal['District_Id']; ?>" <?php if($getDistrictVal['District_Id']==$getBlock[1]['District_Id']){echo "selected";}?>><?php echo $getDistrictVal['District_Name']; ?></option>
              <?php } ?>
              
            </select>
          </div>
        </div>
        
        <div class="form-group">
          <label class="control-label col-sm-3 mandatory" for="blockName">Name of Block <span>*</span>:</label>
          <div class="col-sm-3">
            <input type="text" class="form-control input-sm" id="blockName" name="blockName" placeholder="Name of Block" value="<?php echo $getBlock[1]['Block_Name']; ?>" />
          </div>
        </div>
        
        
        <hr />
        <div class="form-group">
          <div class="col-sm-3"></div>
          <div class="col-sm-3">
          	<input type="hidden" id="blockId" value="<?php echo $getBlock[1]['Block_Id']; ?>">
            
            <input type="button" class="btn btn-primary btn-sm" id="edit" value="Update">
            <input type="reset" class="btn btn-default btn-sm" id="reset" value="Reset">
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
