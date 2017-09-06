<?php
include('../../config.php'); 
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
include(PATH_ADMIN_INCLUDE.'/header.php');
$db = new DBConn();

// get all list of rm logins 
$getrmlogin=$db->ExecuteQuery("SELECT CM_Id, Center_Code, DM_Emp_Code, CM_Emp_Code, CM_Address, e.EMP_Name AS CEMP_Name, em.EMP_Name AS DEMP_Name, CM_Password, b.Block_Name, d.District_Name, s.State_Name, CASE WHEN CM_Status = 1 THEN 'Block' WHEN CM_Status = 0 THEN 'Unblock' END CM_Status

FROM cm_login cm

LEFT JOIN block_master b ON cm.CM_Block = b.Block_Id
LEFT JOIN district_master d ON cm.CM_District = d.District_Id
LEFT JOIN state_master s ON d.State_Id = s.State_Id
LEFT JOIN employee_master e ON cm.CM_Emp_Code = e.EMP_Code
LEFT JOIN employee_master em ON cm.DM_Emp_Code = em .EMP_Code

");

?>
<script type="text/javascript"  src="cm.js" ></script>
<div class="main">
	<div class="page-title">
        <div>
            <div class="col-lg-5 pull-left"><h4><i class="glyphicon glyphicon-list"></i> CM Login List</h4></div>
            <div class="col-lg-5 pull-right">
                <div class="ef_header_tools pull-right">
                    <a class="btn btn-primary" href="add_cm.php" title="Add course"><i class="glyphicon glyphicon-plus"></i>&nbsp;Add New CM Login</a>
                </div>
            </div>
        </div>
        <div class="clearfix">&nbsp;</div>
    </div>
  
    <table class="table table-hover table-bordered" id="addedProducts">
      <thead>
        <tr class="success">
          <th>Sno.</th>
          <th>Center Code</th>
          <th>CM Emp. Name - Code</th>
          <th>DM Emp. Name - Code</th>
          <th>Block</th>
          <th>District</th>
          <th>State</th>
          <th>Office Address</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php 
            $i=1;
            foreach($getrmlogin as $getrmloginVal){ ?>
        <tr>
          <td><?php echo $i;?></td>
          <td><?php echo $getrmloginVal['Center_Code'];?></td>
          <td><?php echo $getrmloginVal['CEMP_Name'].' - '.$getrmloginVal['CM_Emp_Code'];?></td>
          <td><?php echo $getrmloginVal['DEMP_Name'].' - '.$getrmloginVal['DM_Emp_Code'];?></td>
          <td><?php echo $getrmloginVal['Block_Name'];?></td>
          <td><?php echo $getrmloginVal['District_Name'];?></td>
          <td><?php echo $getrmloginVal['State_Name'];?></td>
          <td><?php echo $getrmloginVal['CM_Address'];?></td>
          
          <td><button type="button" id="editbtn" class="btn btn-success btn-sm" onClick="window.location.href='edit_cm.php?id=<?php echo $getrmloginVal['CM_Id'];?>'" > <span class="glyphicon glyphicon-edit"></span> Edit </button>
            <button type="button" class="btn btn-danger btn-sm delete" id="<?php echo $getrmloginVal['CM_Id']; ?>" name="delete"> <span class="glyphicon glyphicon-trash"></span> Delete </button>
            
            <?php if($getrmloginVal['CM_Status']=="Block"){ ?>
            <button type="button" class="btn btn-warning btn-sm  status" id="status-<?php echo $getrmloginVal['CM_Id']; ?>" name="status"> <span class="glyphicon glyphicon-lock"></span> <?php echo $getrmloginVal['CM_Status'] ?> </button>
            <?php }else{ ?>
            <button type="button" class="btn btn-primary btn-sm status" id="status-<?php echo $getrmloginVal['CM_Id']; ?>" name="status"> <i class="fa fa-unlock" aria-hidden="true"></i> <?php echo $getrmloginVal['CM_Status'] ?> </button>
            <?php } ?>
            </td>
        </tr>
        <?php $i++;} ?>
      </tbody>
    </table>
</div>