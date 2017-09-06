<?php
include('../../../config.php'); 
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
include(PATH_ADMIN_INCLUDE.'/header.php');
$db = new DBConn();

// get all list of employee 
$getemployee=$db->ExecuteQuery("SELECT DATE_FORMAT(DOJ,'%d-%m-%Y') AS DOJ, e.EMP_Id, e.EMP_Code, e.EMP_Image, e.EMP_Name, e.EMP_Designation, b.Block_Name, d.District_Name, s.State_Name, e.EMP_Contact, EMP_Email, EMP_Salary

FROM employee_master e

LEFT JOIN block_master b ON e.Block_Id = b.Block_Id
LEFT JOIN district_master d ON e.District_Id = d.District_Id
LEFT JOIN state_master s ON d.State_Id = s.State_Id

");

?>
<script type="text/javascript"  src="employee.js" ></script>
<div class="main">
	<div class="page-title">
        <div>
            <div class="col-lg-5 pull-left"><h4><i class="glyphicon glyphicon-list"></i> Employee List</h4></div>
            <div class="col-lg-5 pull-right">
                <div class="ef_header_tools pull-right">
                    <a class="btn btn-primary" href="add_employee.php" title="Add course"><i class="glyphicon glyphicon-plus"></i>&nbsp;Add New Employee</a>
                </div>
            </div>
        </div>
        <div class="clearfix">&nbsp;</div>
    </div>
  
    <table class="table table-hover table-bordered" id="addedProducts">
      <thead>
        <tr class="success">
          <th>Sno.</th>
          <th>DOJ</th>
          <th>Emp. Image</th>
          <th>Emp. Code</th>
          <th>Emp. Name</th>
          <th>Designation</th>
          <th>Salary</th>
          <th>Block</th>
          <th>District</th>
          <th>State</th>
          <th>Contact No.</th>
          <th>Email</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php 
            $i=1;
            foreach($getemployee as $getemployeeVal){ ?>
        <tr>
          <td><?php echo $i;?></td>
          <td><?php echo $getemployeeVal['DOJ'];?></td>
          <td><img width="50px;" src="<?php echo PATH_DATA_IMAGE ?>/employee/thumb/<?php echo $getemployeeVal['EMP_Image'];?>" alt="" /></td>
          <td><?php echo $getemployeeVal['EMP_Code'];?></td>
          <td><?php echo $getemployeeVal['EMP_Name'];?></td>
          <td><?php echo $getemployeeVal['EMP_Designation'];?></td>
          <td><?php echo $getemployeeVal['EMP_Salary'];?></td>
          <td><?php echo $getemployeeVal['Block_Name'];?></td>
          <td><?php echo $getemployeeVal['District_Name'];?></td>
          <td><?php echo $getemployeeVal['State_Name'];?></td>
          <td><?php echo $getemployeeVal['EMP_Contact'];?></td>
          <td><?php echo $getemployeeVal['EMP_Email'];?></td>
          
          <td><button type="button" id="editbtn" class="btn btn-success btn-sm" onClick="window.location.href='edit_employee.php?id=<?php echo $getemployeeVal['EMP_Id'];?>'" > <span class="glyphicon glyphicon-edit"></span> Edit </button>
            <button type="button" class="btn btn-danger btn-sm delete" id="<?php echo $getemployeeVal['EMP_Id']; ?>" name="delete"> <span class="glyphicon glyphicon-trash"></span> Delete </button></td>
        </tr>
        <?php $i++;} ?>
      </tbody>
    </table>
</div>