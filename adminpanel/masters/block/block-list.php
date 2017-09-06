<?php
include('../../../config.php'); 
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
include(PATH_ADMIN_INCLUDE.'/header.php');
$db = new DBConn();

// get all list of employee 
$getBlock=$db->ExecuteQuery("SELECT Block_Id, Block_Name, District_Name, State_Name
FROM block_master b
LEFT JOIN district_master dm ON b.District_Id = dm.District_Id
LEFT JOIN state_master s ON dm.State_Id = s.State_Id
ORDER BY State_Name, District_Name, Block_Name ASC
");

// get all list of states
$getState=$db->ExecuteQuery("SELECT State_Id, State_Name FROM state_master ");

?>
<script type="text/javascript"  src="block.js" ></script>
<div class="main">
	<div class="page-title">
        <div>
            <div class="col-lg-5 pull-left"><h4><i class="glyphicon glyphicon-list"></i> Block List</h4></div>
            <div class="col-lg-5 pull-right">
                <div class="ef_header_tools pull-right">
                   <a class="btn btn-primary" href="index.php" title="Add Block"><i class="glyphicon glyphicon-plus"></i> Add New Block</a>
                </div>
            </div>
        </div>
        <div class="clearfix">&nbsp;</div>
    </div>
    
    <div style="background:#FCF1B1; padding:10px;">
    	<form class="form-horizontal" role="form" id="searchFrm" method="post">
        	<label class="control-label pull-left mandatory" for="state">State <span>*</span>:</label>
            <div class="pull-left search-fields">
                <select name="state" id="state" class="form-control input-sm">
                  <option value="">-- Select --</option>
                  <?php foreach($getState as $getStateVal){ ?>
                  <option value="<?php echo $getStateVal['State_Id']; ?>"><?php echo $getStateVal['State_Name']; ?></option>
                  <?php } ?>
                </select>
            </div>
            
            <label class="control-label pull-left mandatory" for="district">District <span>*</span>:</label>
            <div class="pull-left search-fields" id="districtDiv">
              <select name="district" id="district" class="form-control input-sm">
                <option value="">-- Select --</option>
              </select>
            </div>
          
            <div><button type="button" class="btn btn-primary btn-sm" id="search">Search</button></div>
        </form>
    </div>
    <div id="blockList">
    	<table class="table table-hover table-bordered">
          <thead>
            <tr class="success">
              <th>Sno.</th>
              <th>Block Name</th>
              <th>District</th>
              <th>State</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            
            if(!empty($getBlock)){
                $i=1;
                foreach($getBlock as $getBlockVal){ ?>
            <tr>
              <td><?php echo $i;?></td>
              <td><?php echo $getBlockVal['Block_Name'];?></td>
              <td><?php echo $getBlockVal['District_Name'];?></td>
              <td><?php echo $getBlockVal['State_Name'];?></td>
                        
              <td><a id="editbtn" class="btn btn-success btn-sm" href="edit_block.php?id=<?php echo $getBlockVal['Block_Id'];?>"><span class="glyphicon glyphicon-edit"></span> Edit </a>
                <button type="button" class="btn btn-danger btn-sm delete" id="<?php echo $getBlockVal['Block_Id']; ?>" name="delete"> <span class="glyphicon glyphicon-trash"></span> Delete </button></td>
            </tr>
            <?php $i++;} 
            }else{
            ?>
            <tr>
                <td colspan="5">No Records Found</td>
            </tr>
            <?php } ?>
            
          </tbody>
        </table>
    </div>
</div>