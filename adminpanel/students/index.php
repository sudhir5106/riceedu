<?php
include('../../config.php'); 
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
include(PATH_ADMIN_INCLUDE.'/header.php');
$db = new DBConn();

// get all list of students 
$getstudent=$db->ExecuteQuery("SELECT Student_Id, DATE_FORMAT(Reg_Date,'%d-%m-%Y') AS Reg_Date, Application_No, Student_Code, Student_Name, Password,  Father_Name, Aadhaar_No, Course_Name, Mode, Session, CASE WHEN Mode='regular' THEN (Learning_Fee + Registration_Fee + Exam_Fee+Application_Fee) WHEN Mode='online' THEN (Learning_Fee + Registration_Fee + Exam_Fee+Application_Fee) WHEN Mode='private' THEN Exam_Fee+Application_Fee END AS Total_Fees, (SELECT SUM(Paid_Amt) FROM fees_payment WHERE Student_Id IN(SELECT Student_Id FROM student_master)) AS Paid_Amt, Address, Block_Name, District_Name, State_Name, Pincode, Contact_No, Email, Bank_Name, Account_No, Bank_Address, IFSC_Code, Photo, Signature, Gaurdian_Signature, CASE WHEN Approval_Status=0 THEN 'Pending' WHEN Approval_Status=1 THEN 'Approved' WHEN Approval_Status=2 THEN 'Cancelled' END Approval_Status

FROM student_master st

LEFT JOIN course_master c ON st.Course_Id = c.Course_Id
LEFT JOIN block_master b ON st.Block_Id = b.Block_Id
LEFT JOIN district_master d ON b.District_Id = d.District_Id
LEFT JOIN state_master s ON d.State_Id = s.State_Id 

ORDER BY Student_Id DESC");
$get_list=$db->ExecuteQuery("select sent_reg_fees_details.Student_Id from sent_reg_fees_details left join sent_reg_fees on sent_reg_fees_details.Sent_Id=sent_reg_fees.Sent_Id where sent_reg_fees.Appr_Status=1");
if($get_list)
{
foreach($get_list as $s_id)
{
$studentid[]= $s_id['Student_Id'];

}

}
?>
<script type="text/javascript"  src="student.js" ></script>
<div class="main">
	<div class="page-title">
        <div>
            <div class="col-lg-5 pull-left"><h4><i class="glyphicon glyphicon-list"></i> Students List</h4></div>
            <!--<div class="col-lg-5 pull-right">
                <div class="ef_header_tools pull-right">
                    <a class="btn btn-primary" href="add_cm.php" title="Add course"><i class="glyphicon glyphicon-plus"></i>&nbsp;Add New CM Login</a>
                </div>
            </div>-->
        </div>
        <div class="clearfix">&nbsp;</div>
    </div>
  
    <div class="table-responsive" style="overflow: auto;"> 
            	<table class="table table-hover table-bordered table-condensed" >
                  <thead>
                    <tr class="success">
                      <th>Sno.</th>
                      <th>App. No.</th>
                      <th width="90">Reg. Dt.</th>                      
                      <th>Photo</th>
                      <th>Student Code</th>
                      <th width="100">Student Name</th>
                      <th>Password</th>
                      <th width="100">Father Name</th>
                      <th>Aadhaar No</th>
                      <th width="150">Course Details</th>
                      <th>Address</th>
                      <th>Approval Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                        $i=1;
                        foreach($getstudent as $getstudentVal)
                        { 
                        if(!empty($studentid))
                        {
                        if(in_array($getstudentVal['Student_Id'],$studentid))
                        {
                        
                          $payment_staus=1;
                        }
                        else
                        {
                          $payment_staus=0;
                        }
                        }
                        else
                        {$payment_staus=0;}

                          ?>
                    <tr>
                      <td><?php echo $i;?></td>
                      <td><?php echo $getstudentVal['Application_No']; ?></td>
                      <td><?php echo $getstudentVal['Reg_Date']; ?></td>
                      <td><img width="50px;" src="<?php echo PATH_DATA_IMAGE ?>/student/thumb/<?php echo $getstudentVal['Photo'];?>" alt="" /></td>
                      <td><?php echo $getstudentVal['Student_Code'];?></td>
                      <td><?php echo $getstudentVal['Student_Name'];?></td>
                      <td><?php echo $getstudentVal['Password'];?></td>
                      <td><?php echo $getstudentVal['Father_Name'];?></td>
                      <td><?php echo $getstudentVal['Aadhaar_No'];?></td>
                      
                      <td><?php echo $getstudentVal['Course_Name'].'- <span class="label label-info">'.strtoupper($getstudentVal['Mode']).'</span>- <span class="label label-warning">'.strtoupper($getstudentVal['Session']).' SESSION</span><br><br>Course Fees: '.$getstudentVal['Total_Fees'].'<br>Fees Paid: '.$getstudentVal['Paid_Amt'];?></td>
                      
                      <td><?php echo $getstudentVal['Address'].', Block:'.$getstudentVal['Block_Name'].', Distt:'.$getstudentVal['District_Name'].', '.$getstudentVal['State_Name'].' Pincode-'.$getstudentVal['Pincode'];?><br />Contact No.:<?php echo $getstudentVal['Contact_No'] ?></td>
                      




                      <td><span class="label <?php echo $getstudentVal['Approval_Status']=='Pending'?'label-warning': ($getstudentVal['Approval_Status']=='Approved'?'label-success':'label-danger');?>"><?php echo $getstudentVal['Approval_Status'];?></span></td>
                      
                      <td>
                        <button type="button" id="editbtn" class="btn btn-success btn-sm" onClick="window.location.href='edit_student.php?id=<?php echo $getstudentVal['Student_Id'];?>'" > <span class="glyphicon glyphicon-edit"></span> Edit </button>



                      <?php if($getstudentVal['Approval_Status']=='Approved' && $payment_staus=='1'){ ?>
                      <button type="button" id="<?php echo $getstudentVal['Student_Id']; ?>" class="btn btn-xs btn-warning approve_status">Not Approve</button>
                      
                     <a href="view_pdf.php?k=<?php echo $getstudentVal['Student_Id']; ?>"> <button type="button" id="pdf-<?php echo $getstudentVal['Student_Id']; ?>" class="btn btn-xs btn-default status">View PDF</button>
                     </a>
                      <?php } ?>
                         
                        <?php if($getstudentVal['Approval_Status']=='Pending' && $payment_staus=='1'){ ?>
                      <button type="button" id="<?php echo $getstudentVal['Student_Id']; ?>" class="btn btn-xs btn-success status">Approve</button>
                    <a href="view_pdf.php?k=<?php echo $getstudentVal['Student_Id']; ?>"> <button type="button" id="pdf-<?php echo $getstudentVal['Student_Id']; ?>" class="btn btn-xs btn-default status">View PDF</button>
                      <?php } ?>
                      </td>
                      
                    </tr>
                    <?php $i++;} ?>
                  </tbody>
                </table>
            </div>
</div>