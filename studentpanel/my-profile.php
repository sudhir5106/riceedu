<?php 
include('../config.php');

require_once(PATH_LIBRARIES.'/classes/DBConn.php');
$db = new DBConn();

require_once(PATH_STUDENT_INCLUDE.'/header.php');

$GetStudentInfo = $db->ExecuteQuery("SELECT *, DATE_FORMAT(Reg_Date,'%d-%M-%Y') AS DOJ, DATE_FORMAT(DOB,'%d-%M-%Y') AS DateOfBirth , Block_Name, District_Name, State_Name, CASE WHEN Gender=1 THEN 'Male' ELSE 'Female' END Sex, CASE WHEN Phisical_Status=1 THEN 'Normal' ELSE 'Physically Challenged' END Phisical_Status, CASE WHEN Approval_Status=0 THEN 'Pending' ELSE 'Approved' END Approval_Status, CASE WHEN Status=0 THEN 'Blocked' ELSE 'Active' END Status, Entry_No

FROM student_master st

LEFT JOIN course_master c ON st.Course_Id = c.Course_Id
LEFT JOIN block_master b ON st.Block_Id = b.Block_Id
LEFT JOIN district_master d ON b.District_Id = d.District_Id
LEFT JOIN state_master s ON d.State_Id = s.State_Id

WHERE Student_Id='".$_SESSION['sid']."'");
?>

<div>
  <div class="page-title">
    <div class="title_left">
      <h3><i class="fa fa-user" aria-hidden="true"></i> My Profile</h3>
    </div>
    <div class="text-right">Profile : <span class="<?php echo $GetStudentInfo[1]['Status']=='Blocked'?'text-danger':'text-primary'?>"><strong><?php echo $GetStudentInfo[1]['Status']; ?></strong></span> &nbsp;&nbsp;|&nbsp;&nbsp; Admin Approval : <span class="<?php echo $GetStudentInfo[1]['Approval_Status']=='Pending'?'text-danger':'text-primary'?>"><strong><?php echo $GetStudentInfo[1]['Approval_Status']?></strong></span></div>
  </div>
  
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        
        <div class="x_content">

                  <div class="col-md-3 col-sm-3 col-xs-12 profile_left">

                    <div class="profile_img">

                      <!-- end of image cropping -->
                      <div id="crop-avatar">
                        <!-- Current avatar -->
                        <div class="avatar-view" title="Change the avatar">
                          <img src="<?php echo PATH_DATA_IMAGE.'/student/'.$GetStudentInfo[1]['Photo']; ?>" alt="Avatar">
                        </div>
                      </div>
                      <!-- end of image cropping -->

                    </div>
                    
                    <h3><?php echo $GetStudentInfo[1]['Student_Name']; ?></h3>

                    <ul class="list-unstyled user_data">
                      <li><i class="fa fa-map-marker user-profile-icon"></i> <?php echo $GetStudentInfo[1]['Address'].', '. $GetStudentInfo[1]['Block_Name'].', '.$GetStudentInfo[1]['District_Name'].', '.$GetStudentInfo[1]['State_Name'].', Pin:'.$GetStudentInfo[1]['Pincode']; ?>
                      </li>

                      <li>
                        <i class="fa fa-briefcase fa fa-graduation-cap"></i> <?php echo $GetStudentInfo[1]['Education']; ?>
                      </li>

                      <li class="m-top-xs">
                        <i class="fa fa-external-link fa fa-envelope"></i>
                        <a href="mailTo:<?php echo $GetStudentInfo[1]['Email']; ?>"><?php echo $GetStudentInfo[1]['Email']; ?></a>
                      </li>
                      
                      <li class="m-top-xs">
                        <i class="fa fa-phone-square"></i> <?php echo $GetStudentInfo[1]['Contact_No']; ?>
                      </li>
                    </ul>
                    
                    <h3 class="sign-head">Signature</h3>
                    <div class="signature">
                      <img src="<?php echo PATH_DATA_IMAGE.'/student/student-sign/'.$GetStudentInfo[1]['Signature']; ?>" alt="Avatar">
                    </div>
                    
                    <h3 class="sign-head">Gaurdian Signature</h3>
                    <div class="signature">
                      <img src="<?php echo PATH_DATA_IMAGE.'/student/gaurdian-sign/'.$GetStudentInfo[1]['Gaurdian_Signature']; ?>" alt="Avatar">
                    </div>

                    

                  </div>
                  <div class="col-md-9 col-sm-9 col-xs-12">

                    <div class="profile_title">
                      <div class="col-md-6">
                        <h2>Personal Details</h2>
                      </div>
                      <div class="col-md-6">
                        <div id="reportrange" class="pull-right" style="margin-top: 5px; background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #E6E9ED">
                          <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                          <span>Registration Date: <?php echo $GetStudentInfo[1]['DOJ']; ?></span> <b class="caret"></b>
                        </div>
                      </div>
                    </div>
                    <!-- start of user-activity-graph -->
                    <div id="graph_bar" style="margin-top:20px;">
                    	<div class="data-row">
                        	<div class="col-sm-3">Application No</div>
                            <div class="col-sm-7"><?php echo $GetStudentInfo[1]['Application_No']; ?></div>
                        </div>
                        <div class="data-row">
                        	<div class="col-sm-3">Registration No</div>
                            <div class="col-sm-7"><?php echo $GetStudentInfo[1]['Registration_No']==0?'Not Generated':$GetStudentInfo[1]['Registration_No']; ?></div>
                        </div>
                        <div class="data-row">
                        	<div class="col-sm-3">Entry No</div>
                            <div class="col-sm-7"><?php echo $GetStudentInfo[1]['Entry_No']==0?'Not Generated':$GetStudentInfo[1]['Registration_No']; ?></div>
                        </div>
                        <div class="data-row">
                        	<div class="col-sm-3">Student Code</div>
                            <div class="col-sm-7"><?php echo $GetStudentInfo[1]['Student_Code']; ?></div>
                        </div>
                        <div class="data-row">
                        	<div class="col-sm-3">Password</div>
                            <div class="col-sm-7"><?php echo $GetStudentInfo[1]['Password']; ?></div>
                        </div>
                        <div class="data-row">
                        	<div class="col-sm-3">Date of Birth</div>
                            <div class="col-sm-7"><?php echo $GetStudentInfo[1]['DateOfBirth']; ?></div>
                        </div>
                        <div class="data-row">
                        	<div class="col-sm-3">Gender</div>
                            <div class="col-sm-7"><?php echo $GetStudentInfo[1]['Sex']; ?></div>
                        </div>
                        <div class="data-row">
                        	<div class="col-sm-3">Father's Name</div>
                            <div class="col-sm-7"><?php echo $GetStudentInfo[1]['Father_Name']; ?></div>
                        </div>
                        <div class="data-row">
                        	<div class="col-sm-3">Mother's Name</div>
                            <div class="col-sm-7"><?php echo $GetStudentInfo[1]['Mother_Name']; ?></div>
                        </div>
                        <div class="data-row">
                        	<div class="col-sm-3">Religion</div>
                            <div class="col-sm-7"><?php echo $GetStudentInfo[1]['Religion']; ?></div>
                        </div>
                        <div class="data-row">
                        	<div class="col-sm-3">Caste</div>
                            <div class="col-sm-7"><?php echo $GetStudentInfo[1]['Caste']; ?></div>
                        </div>
                        <div class="data-row">
                        	<div class="col-sm-3">Phisical Status</div>
                            <div class="col-sm-7"><?php echo $GetStudentInfo[1]['Phisical_Status']; ?></div>
                        </div>
                        <div class="data-row">
                        	<div class="col-sm-3">Aadhaar No</div>
                            <div class="col-sm-7"><?php echo $GetStudentInfo[1]['Aadhaar_No']; ?></div>
                        </div>
                        
                    </div>
                    <!-- end of user-activity-graph -->
                    
                    <div class="" role="tabpanel" data-example-id="togglable-tabs" style="margin-top:50px;">
                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Course</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Bank Details</a>
                        </li>
                        
                      </ul>
                      <div id="myTabContent" class="tab-content">
                      
                      	<div role="tabpanel" class="tab-pane fade active in" id="tab_content3" aria-labelledby="profile-tab">
                          
                          <div>
                          	<div class="data-row">
                                <div class="col-sm-3">Applied Course</div>
                                <div class="col-sm-7"><?php echo $GetStudentInfo[1]['Course_Name']; ?></div>
                            </div>
                            
                            <div class="data-row">
                                <div class="col-sm-3">Mode</div>
                                <div class="col-sm-7"><?php echo $GetStudentInfo[1]['Mode']; ?></div>
                            </div>
                            
                            <div class="data-row">
                                <div class="col-sm-3">Session</div>
                                <div class="col-sm-7"><?php echo $GetStudentInfo[1]['Session']; ?></div>
                            </div>
                            
                            <div class="data-row">
                                <div class="col-sm-3">About Fees Deposite</div>
                                <div class="col-sm-7"><?php echo $GetStudentInfo[1]['About_Fee_Deposite']; ?></div>
                            </div>
                            <div class="clearfix"></div>
                          </div>
                          
                        </div>
                        
                        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                          	<div class="data-row">
                                <div class="col-sm-3">Bank Name</div>
                                <div class="col-sm-7"><?php echo $GetStudentInfo[1]['Bank_Name']; ?></div>
                            </div>
                            <div class="data-row">
                                <div class="col-sm-3">Account No</div>
                                <div class="col-sm-7"><?php echo $GetStudentInfo[1]['Account_No']; ?></div>
                            </div>
                            <div class="data-row">
                                <div class="col-sm-3">Bank Address</div>
                                <div class="col-sm-7"><?php echo $GetStudentInfo[1]['Bank_Address']; ?></div>
                            </div>
                            <div class="data-row">
                                <div class="col-sm-3">IFSC Code</div>
                                <div class="col-sm-7"><?php echo $GetStudentInfo[1]['IFSC_Code']; ?></div>
                            </div>
                            <div class="clearfix"></div>

                        </div>
                        
                        
                      </div>
                    </div>
                  </div>
                </div>
        
      </div>
    </div>
  </div>
  
  
</div>



<?php 
require_once(PATH_STUDENT_INCLUDE.'/footer.php');

?>
