<?php
include('../../config.php'); 
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
$db = new DBConn();
include(PATH_CM_INCLUDE.'/header.php');

// get all list of students 
$getstudent=$db->ExecuteQuery("SELECT Student_Id, DATE_FORMAT(Reg_Date,'%d-%m-%Y') AS Reg_Date,Registration_No,Application_No, Student_Code, Student_Name, Password,Registration_No,Father_Name, Aadhaar_No, Course_Name, Mode, Session, Address, Block_Name, District_Name, State_Name, Pincode, Contact_No, Email, Bank_Name, Account_No, Bank_Address, IFSC_Code, Photo, Signature, Gaurdian_Signature, CASE WHEN Approval_Status=0 THEN 'Pending' WHEN Approval_Status=1 THEN 'Approved' WHEN Approval_Status=2 THEN 'Cancelled' END Approval_Status

FROM student_master st

LEFT JOIN course_master c ON st.Course_Id = c.Course_Id
LEFT JOIN block_master b ON st.Block_Id = b.Block_Id
LEFT JOIN district_master d ON b.District_Id = d.District_Id
LEFT JOIN state_master s ON d.State_Id = s.State_Id

WHERE CM_Id =".$_SESSION['cmid']);

?>

<div>
  <div class="page-title">
    <div class="title_left">
      <h3><i class="glyphicon glyphicon-list"></i> List of Students</h3>
    </div>
  </div>
  
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>List</h2>
          <ul class="nav navbar-right panel_toolbox">
            <li>
              <span><a class="btn btn-primary" href="add_student.php"><i class="glyphicon glyphicon-share-alt"></i> Add New Student</a></span>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
        	<div class="table-responsive" style="overflow: auto;"> 
            	<table class="table table-hover table-bordered table-condensed" style="width:1500px;">
                  <thead>
                    <tr class="success">
                      <th>Sno.</th>
                      <th width="90">Reg. Dt.</th>
                      <th width="90">Reg. NO.</th> 
                      <th>Application No.</th>
                      <th>Photo</th>
                      <th>Student Code</th>
                      <th width="100">Student Name</th>
                      <th>Password</th>
                      <th width="100">Father Name</th>
                      <th>Aadhaar No</th>
                      <th width="100">Course Details</th>
                      <th>Address</th>
                      <th>Email</th>
                      <th>Bank Info</th>
                      <th>Sign</th>
                      <th>Gaurdian's Sign</th>
                      <th>Approval Status</th>                  
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                        $i=1;
                        foreach($getstudent as $getstudentVal){ ?>
                    <tr>
                      <td><?php echo $i;?></td>
                      <td><?php echo $getstudentVal['Reg_Date']; ?></td>
                      <td><?php echo $getstudentVal['Registration_No']; ?></td>
                      <td><?php echo $getstudentVal['Application_No']; ?></td>
                      <td><img width="50px;" src="<?php echo PATH_DATA_IMAGE ?>/student/thumb/<?php echo $getstudentVal['Photo'];?>" alt="" /></td>
                      <td><?php echo $getstudentVal['Student_Code'];?></td>
                      <td><?php echo $getstudentVal['Student_Name'];?></td>
                      <td><?php echo $getstudentVal['Password'];?></td>
                      <td><?php echo $getstudentVal['Father_Name'];?></td>
                      <td><?php echo $getstudentVal['Aadhaar_No'];?></td>
                      <td><?php echo $getstudentVal['Course_Name'].'- <span class="label label-info">'.strtoupper($getstudentVal['Mode']).'</span>- <span class="label label-warning">'.strtoupper($getstudentVal['Session']).' SESSION</span>';?></td>
                      <td><?php echo $getstudentVal['Address'].', Block:'.$getstudentVal['Block_Name'].', Distt:'.$getstudentVal['District_Name'].', '.$getstudentVal['State_Name'].' Pincode-'.$getstudentVal['Pincode'];?><br />Contact No.:<?php echo $getstudentVal['Contact_No'] ?></td>
                      <td><?php echo $getstudentVal['Email'];?></td>
                      <td><?php echo $getstudentVal['Bank_Name'].', A/c No: '.$getstudentVal['Account_No'].', Address: '.$getstudentVal['Bank_Address'];?><br /> IFSC Code: <?php echo $getstudentVal['IFSC_Code'] ?></td>
                      <td><img width="50px;" src="<?php echo PATH_DATA_IMAGE ?>/student/student-sign/thumb/<?php echo $getstudentVal['Signature'];?>" alt="" /></td>
                      <td><img width="50px;" src="<?php echo PATH_DATA_IMAGE ?>/student/gaurdian-sign/thumb/<?php echo $getstudentVal['Gaurdian_Signature'];?>" alt="" /></td>
                      <td><span class="label <?php echo $getstudentVal['Approval_Status']=='Pending'?'label-warning': ($getstudentVal['Approval_Status']=='Approved'?'label-success':'label-danger');?>"><?php echo $getstudentVal['Approval_Status'];?></span></td>
                      
                      <td><?php if($getstudentVal['Registration_No']==0){ ?><button type="button" id="editbtn" class="btn btn-success btn-xs" onClick="window.location.href='edit_student.php?id=<?php echo $getstudentVal['Student_Id'];?>'" > <span class="glyphicon glyphicon-edit">EDIT</span> </button>
                     <?php  } ?>   </td>
                    </tr>
                    <?php $i++;} ?>
                  </tbody>
                </table>
            </div>
            
        </div>
      </div>
    </div>
  </div>
  
</div>
<?php require_once(PATH_CM_INCLUDE.'/footer.php'); ?>