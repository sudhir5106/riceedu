<?php
include('../../../config.php'); 
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
include(PATH_ADMIN_INCLUDE.'/header.php');
$db = new DBConn();

// get all list of states
$getState=$db->ExecuteQuery("SELECT * FROM state_master");

// get all list of job rolls
$getDistrict=$db->ExecuteQuery("SELECT dm.District_Id, dm.District_Name, s.State_Name FROM district_master dm

LEFT JOIN state_master s ON dm.State_Id = s.State_Id
ORDER BY State_Name, District_Name ASC
");

?>
<script type="text/javascript" src="district_name.js"></script>

<div class="main">
  <div class="page-title">
        <div>
            <div class="col-lg-5 pull-left"><h4><i class="glyphicon glyphicon-plus"></i> Add District</h4></div>
        </div>
        <div class="clearfix">&nbsp;</div>
    </div>
  
  
  <div class="clear formbgstyle">
    <form class="form-horizontal" role="form" id="insertDistrict" method="post">
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
          <label class="control-label col-sm-3 mandatory" for="district_name">Name of District <span>*</span>:</label>
          <div class="col-sm-3">
            <input type="text" class="form-control input-sm" id="district_name" name="district_name" placeholder="Name of District"  />
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
    
    <!-- Searching DropDown -->
    <div class="form-horizontal">
    	<div style="background:#FCF1B1; padding:10px;">
          <label class="control-label pull-left mandatory" for="searchStateId">Search By State <span>*</span>:</label>
          <div class="pull-left search-fields">
            <select name="searchStateId" id="searchStateId" class="form-control input-sm " >
              <option value="">-- Select --</option>
              <?php foreach($getState as $getStateVal){ ?>
              <option value="<?php echo $getStateVal['State_Id']; ?>"><?php echo $getStateVal['State_Name']; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="clearfix"></div>
    </div>
    <!-- Eof Searching DropDown -->
    
    <div id="districtList">
        <table class="table table-hover table-bordered" id="addedProducts">
          <thead>
            <tr class="success">
              <th>Sno.</th>
              <th>District Name</th>
              <th>State Name</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php 
                $i=1;
                foreach($getDistrict as $getDistrictVal){ ?>
            <tr>
              <td><?php echo $i;?></td>
              <td><?php echo $getDistrictVal['District_Name'];?></td>
              <td><?php echo $getDistrictVal['State_Name'];?></td>
              
              <td><button type="button" id="editbtn" class="btn btn-success btn-sm" onClick="window.location.href='edit_district.php?id=<?php echo $getDistrictVal['District_Id'];?>'"> <span class="glyphicon glyphicon-edit"></span> Edit </button>
                <button type="button" class="btn btn-danger btn-sm delete" id="<?php echo $getDistrictVal['District_Id']; ?>" name="delete"> <span class="glyphicon glyphicon-trash"></span> Delete </button></td>
            </tr>
            <?php $i++;} ?>
          </tbody>
        </table>
    </div>
    
  </div>
</div>
