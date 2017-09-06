<?php
include('../../../config.php'); 
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
include(PATH_ADMIN_INCLUDE.'/header.php');
$db = new DBConn();

// get all list of states
$getState=$db->ExecuteQuery("SELECT State_Id, State_Name FROM state_master ");
?>

<script type="text/javascript" src="block.js"></script>

<div class="main">
  <div class="page-title">
        <div>
            <div class="col-lg-5 pull-left">
            	<h4><i class="glyphicon glyphicon-plus"></i> Add Block</h4>
            </div>
            <div class="col-lg-5 pull-right text-right">
                <span class="hidden-phone" style="margin-left: 15px; margin-top: 3px;"><a class="btn btn-primary" href="block-list.php"><i class="glyphicon glyphicon-share-alt"></i> View Block List</a></span>
            </div>
        </div>
        <div class="clearfix">&nbsp;</div>
    </div>
  
  
  <div class="clear formbgstyle">
    <form class="form-horizontal" role="form" id="insertBlock" method="post">
      <div>
        <div class="form-group">
          <label class="control-label col-sm-3 mandatory" for="state">State <span>*</span>:</label>
          <div class="col-sm-3">
            <select name="state" id="state" class="form-control input-sm" >
              <option value="">-- Select --</option>
              <?php foreach($getState as $getStateVal){ ?>
              <option value="<?php echo $getStateVal['State_Id']; ?>"><?php echo $getStateVal['State_Name']; ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        
        <div class="form-group">
          <label class="control-label col-sm-3 mandatory" for="district">District <span>*</span>:</label>
          <div class="col-sm-3" id="districtDiv">
            <select name="district" id="district" class="form-control input-sm" >
              <option value="">-- Select --</option>
            </select>
          </div>
        </div>
        
        <div class="form-group">
          <label class="control-label col-sm-3 mandatory" for="blockName">Name of Block <span>*</span>:</label>
          <div class="col-sm-3">
            <input type="text" class="form-control input-sm" id="blockName" name="blockName" placeholder="Name of Block"  />
          </div>
        </div>
        
        
        <hr />
        <div class="form-group">
          <div class="col-sm-3"></div>
          <div class="col-sm-3">
            <input type="button" class="btn btn-primary btn-sm" id="submit" value="Submit">
            <input type="reset" class="btn btn-default btn-sm" id="reset" value="Reset">
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
