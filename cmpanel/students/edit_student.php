<?php
include('../../config.php'); 
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
include(PATH_CM_INCLUDE.'/header.php');
$db = new DBConn();

$getstudent=$db->ExecuteQuery("SELECT Student_Id, DATE_FORMAT(Reg_Date,'%d-%m-%Y') AS Reg_Date, DATE_FORMAT(DOB,'%d-%m-%Y') AS dob,
Application_No, Student_Code, Student_Name, Password,Father_Name,Mother_Name, Aadhaar_No,Education,Course_Id, Mode,Session, Address,Pincode,
 Contact_No, Email, Bank_Name,Reference,Gender,Phisical_Status,Religion,Caste, Account_No,Block_Id,Bank_Address,About_Fee_Deposite,Bank_Address,Acc_holder_name,
 IFSC_Code, Photo, Signature, Gaurdian_Signature, CASE WHEN Approval_Status=0 THEN 'Pending' WHEN Approval_Status=1 THEN 'Approved' WHEN Approval_Status=2 THEN 'Cancelled' END Approval_Status

FROM student_master WHERE Student_Id =".$_REQUEST['id']);

$getStates=$db->ExecuteQuery("SELECT * FROM state_master ");

// get all list of courses
$getCourse=$db->ExecuteQuery("SELECT * FROM course_master");

     

  $sql_district="SELECT District_Id FROM block_master  where Block_Id=".$getstudent[1]['Block_Id'];
                   $get_district=$db->ExecuteQuery($sql_district);
                   $sql_state="SELECT  State_Id  FROM   district_master  WHERE District_Id=".$get_district[1]['District_Id'];
                   $get_state=$db->ExecuteQuery($sql_state);
				   $getdistrict=$db->ExecuteQuery("SELECT * FROM district_master  WHERE State_Id='".$get_state[1]['State_Id']."' ORDER BY District_Name ASC");
				   $getblock=$db->ExecuteQuery("SELECT * FROM block_master WHERE District_Id='".$get_district[1]['District_Id']."' ORDER BY Block_Name ASC");
                          
                   
?>
<script type="text/javascript" src="student.js"></script>

<div id="loading">
    <div class="loader-block"><i class="fa-li fa fa-spinner fa-spin spinloader"></i></div>
</div>

<div>
  <div class="page-title">
    <div class="title_left">
      <h3><i class="glyphicon glyphicon-plus"></i> Edit Student</h3>
    </div>
  </div>
  
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2></h2>
          <ul class="nav navbar-right panel_toolbox">
            <li>
             
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
        	<form class="form-horizontal" role="form" id="insertStudent" method="post">
              <div>
                <div class="form-group">
                  <label class="control-label col-sm-4 mandatory" for="reference">Reference :</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" id="reference" name="reference" value="<?php echo $getstudent[1]['Reference'];?>"/>
                  </div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-4 control-label mandatory" for="fileupload">Upload Student Photo <span>*</span>:</label>
                    <div class="col-md-4">
                        <label class="col-md-4 control-label" for="fileupload">
                        <img width="50px;" src="<?php echo PATH_DATA_IMAGE ?>/student/thumb/<?php echo $getstudent[1]['Photo'];?>" alt="" />
                        </label>
                        <input class="col-md-8" type="file" id="fileupload" name="fileupload">
                   </div>
                </div>
               
                <div class="form-group">
                    <label class="col-md-4 control-label mandatory" for="student_sign">Upload Student Signature <span>*</span>:</label>
                    <div class="col-md-4">
                        <label class="col-md-4 control-label" for="student_sign"> <img width="50px;" src="<?php echo PATH_DATA_IMAGE ?>/student/student-sign/thumb/<?php echo $getstudent[1]['Signature'];?>" alt="" /></label>
                        <input class="col-md-8" type="file" id="student_sign" name="student_sign">
                   </div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-4 control-label mandatory" for="guardian_sign">Upload Guardian Signature <span>*</span>:</label>
                    <div class="col-md-4">
                        <label class="col-md-4 control-label" for="guardian_sign"><img width="50px;" src="<?php echo PATH_DATA_IMAGE ?>/student/gaurdian-sign/thumb/<?php echo $getstudent[1]['Gaurdian_Signature'];?>" alt="" /></label>
                        <input class="col-md-8" type="file" id="guardian_sign" name="guardian_sign">
                   </div>
                </div>
                
                <div class="form-group">
                  <label class="control-label col-sm-4 mandatory" for="student_name">Student Name <span>*</span>:</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" id="student_name" name="student_name" value="<?php echo $getstudent[1]['Student_Name'];?>" />
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="control-label col-sm-4 mandatory" for="dob">Date of Birth <span>*</span> </label>
                  <div class="col-sm-2">
                    <input type="text" id="dob" name="dob" required="required" class="form-control datetimepicker" value="<?php echo $getstudent[1]['dob'];?>">
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-md-4 control-label" for="gender">Gender</label>
                  <div class="col-md-4"> 
                  <?php if($getstudent[1]['Gender']==1){?>
                    <label class="radio-inline" for="gender-0">
                      <input name="gender" id="gender-0" value="1" checked="checked" type="radio">
                      Male
                    </label> 
                    <label class="radio-inline" for="gender-1">
                      <input name="gender" id="gender-1" value="2" type="radio">
                      Female
                    </label>
                    <?php  } 
                    else
                    {
                      ?>
                       <label class="radio-inline" for="gender-0">
                      <input name="gender" id="gender-0" value="1"  type="radio">
                      Male
                    </label> 
                    <label class="radio-inline" for="gender-1">
                      <input name="gender" id="gender-1" value="2" checked="checked" type="radio">
                      Female
                    </label>
                      <?php
                    }

                    ?>
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="control-label col-sm-4 mandatory" for="father_name">Father's Name <span>*</span>:</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" id="father_name" name="father_name" value="<?php echo $getstudent[1]['Father_Name'];?>"/>
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="control-label col-sm-4 mandatory" for="mother_name">Mother's Name <span>*</span>:</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" id="mother_name" name="mother_name" value="<?php echo $getstudent[1]['Mother_Name'];?>"/>
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-md-4 control-label mandatory" for="religion">Religion <span>*</span></label>
                  <div class="col-md-3">
                    <select id="religion" name="religion" class="form-control">
                     <option value="">--- Select Religion  ---</option>
                      <option value="Hindu" <?php 
                      if($getstudent[1]['Religion']=="Hindu"){
                        ?>
                        selected
                        <?php  
                        }?> >Hindu</option>
                      <option value="Muslim" <?php 
                      if($getstudent[1]['Religion']=="Muslim")
                      {?> selected  <?php  } ?>  >Muslim</option>
                      <option value="Sikh" <?php  if($getstudent[1]['Religion']=="Sikh")
                      {?> selected  <?php  } ?>      >Sikh</option>
                      <option value="Chritsian"  <?php  if($getstudent[1]['Religion']=="Chritsian")
                      {?> selected  <?php  } ?>        >Chritsian</option>
                      <option value="Jain" <?php  if($getstudent[1]['Religion']=="Jain")
                      {?> selected  <?php  } ?>        >Jain</option>
                      <option value="Buddhist" <?php  if($getstudent[1]['Religion']=="Buddhist")
                      {?> selected  <?php  } ?> >Buddhist</option>
                    </select>
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-md-4 control-label mandatory" for="caste">Caste <span>*</span></label>
                  <div class="col-md-3">
                    <select id="caste" name="caste" class="form-control">
                     <option value="">--- Select Caste  ---</option>  Caste
                      <option value="GEN"  <?php 
                      if($getstudent[1]['Caste']=="GEN")
                      {?> selected  <?php  } ?>   >GEN</option>
                      <option value="OBC" <?php 
                      if($getstudent[1]['Caste']=="OBC")
                      {?> selected  <?php  } ?>  >OBC</option>
                      <option value="SC" <?php 
                      if($getstudent[1]['Caste']=="SC")
                      {?> selected  <?php  } ?> >SC</option>
                      <option value="ST" <?php 
                      if($getstudent[1]['Caste']=="ST")
                      {?> selected  <?php  } ?>>ST</option>
                      <option value="SATNAMI"<?php 
                      if($getstudent[1]['Caste']=="SATNAMI")
                      {?> selected  <?php  } ?>   >SATNAMI</option>
                      <option value="MINORITY"<?php 
                      if($getstudent[1]['Caste']=="MINORITY")
                      {?> selected  <?php  } ?>    >MINORITY</option>
                      <option value="JAIN"<?php 
                      if($getstudent[1]['Caste']=="JAIN")
                      {?> selected  <?php  } ?>    >JAIN</option>
                      <option value="MUSLIM" <?php 
                      if($getstudent[1]['Caste']=="MUSLIM")
                      {?> selected  <?php  } ?>>MUSLIM</option>
                    </select>
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-md-4 control-label" for="physical_status">Physical Status</label>
                  <?php if($getstudent[1]['Phisical_Status']==1){?>
                     <div class="col-md-4"> 
                    <label class="radio-inline" for="physical_status-0">
                      <input name="physical_status" id="physical_status-0" value="1" checked="checked" type="radio">
                      Normal
                    </label> 
                    <label class="radio-inline" for="physical_status-1">
                      <input name="physical_status" id="physical_status-1" value="2" type="radio">
                      Physically Challenged
                    </label>
                  </div>
                      
                  <?php } 
                  else
                  {?>
                    <div class="col-md-4"> 
                    <label class="radio-inline" for="physical_status-0">
                      <input name="physical_status" id="physical_status-0" value="1"  type="radio">
                      Normal
                    </label> 
                    <label class="radio-inline" for="physical_status-1">
                      <input name="physical_status" id="physical_status-1" value="2" checked="checked" type="radio">
                      Physically Challenged
                    </label>
                  </div>
                  <?php }
                  ?>
                 
                </div>
                
                <div class="form-group">
                  <label class="control-label col-sm-4 mandatory" for="aadhaar_no">Aadhaar Card No. <span>*</span>:</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" id="aadhaar_no" name="aadhaar_no" value="<?php echo $getstudent[1]['Aadhaar_No'];?>" />
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-md-4 control-label mandatory" for="education">Education <span>*</span></label>
                  <div class="col-md-3">
                    <select id="education" name="education" class="form-control">
                   
                      <option value="8th" <?php 
                      if($getstudent[1]['Education']=="8th")
                      {?> selected  <?php  } ?> >8th</option>
                      <option value="10th"  <?php 
                      if($getstudent[1]['Education']=="10th")
                      {?> selected  <?php  } ?>   >10th</option>
                      <option value="12th" <?php 
                      if($getstudent[1]['Education']=="12th")
                      {?> selected  <?php  } ?>    >12th</option>
                      <option value="Diploma" <?php 
                      if($getstudent[1]['Education']=="Diploma")
                      {?> selected  <?php  } ?>      >Diploma</option>
                      <option value="BA" <?php 
                      if($getstudent[1]['Education']=="BA")
                      {?> selected  <?php  } ?> >BA</option>
                      <option value="B COM" <?php 
                      if($getstudent[1]['Education']=="B COM")
                      {?> selected  <?php  } ?>   >B COM</option>
                      <option value="BSC" <?php 
                      if($getstudent[1]['Education']=="BSC")
                      {?> selected  <?php  } ?>   >BSC</option>
                      <option value="BCA" <?php 
                      if($getstudent[1]['Education']=="BCA")
                      {?> selected  <?php  } ?> >BCA</option>
                      <option value="BE"  <?php 
                      if($getstudent[1]['Education']=="BE")
                      {?> selected  <?php  } ?>>BE</option>
                      <option value="B TECH"  <?php 
                      if($getstudent[1]['Education']=="B TECH")
                      {?> selected  <?php  } ?> >B TECH</option>
                      <option value="MA"<?php 
                      if($getstudent[1]['Education']=="MA")
                      {?> selected  <?php  } ?> >MA</option>
                      <option value="MBA"<?php 
                      if($getstudent[1]['Education']=="MBA")
                      {?> selected  <?php  } ?>  >MBA</option>
                      <option value="MSC" <?php 
                      if($getstudent[1]['Education']=="MSC")
                      {?> selected  <?php  } ?> >MSC</option>
                      <option value="MCA" <?php 
                      if($getstudent[1]['Education']=="MCA")
                      {?> selected  <?php  } ?> >MCA</option>
                      <option value="M TECH"  <?php 
                      if($getstudent[1]['Education']=="M TECH")
                      {?> selected  <?php  } ?> >M TECH</option>
                      <option value="GRADUATE"  <?php 
                      if($getstudent[1]['Education']=="GRADUATE")
                      {?> selected  <?php  } ?>>GRADUATE</option>
                      <option value="POST GRADUATE"  <?php 
                      if($getstudent[1]['Education']=="POST GRADUATE")
                      {?> selected  <?php  } ?> >POST GRADUATE</option>
                    </select>
                  </div>
                </div>
                
                <hr />
                
                <h4>Course Details</h4>
                
                <hr />
                
                <div class="form-group">
                  <label class="control-label col-sm-4 mandatory" for="course">Course <span>*</span>:</label>
                  <div class="col-sm-3">
                 
                    <select id="course" name="course" class="form-control">
                                      
                     <?php foreach($getCourse as $getCourseVal){ ?>
                      <option value="<?php echo $getCourseVal['Course_Id']; ?>" <?php if($getCourseVal['Course_Id']==$getstudent[1]['Course_Id']) {?> selected <?php } ?>


                      ><?php echo $getCourseVal['Course_Name']; ?></option>
                     <?php } ?>
                    </select>
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="control-label col-sm-4 mandatory" for="mode">Mode <span>*</span>:</label>
                  <div class="col-sm-3">
                    <select id="mode" name="mode" class="form-control">
                     <option value="">--- Select Mode  ---</option>
                     <option value="regular" <?php if($getstudent[1]['Mode']=="regular") {?> selected <?php } ?>  >Regular</option>
                     <option value="online" <?php if($getstudent[1]['Mode']=="online") {?> selected <?php } ?>>Online</option>
                     <option value="private" <?php if($getstudent[1]['Mode']=="private") {?> selected <?php } ?>>Private</option>
                    </select>
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="control-label col-sm-4 mandatory" for="session">Session <span>*</span>:</label>
                  <div class="col-sm-3">
                    <select id="session" name="session" class="form-control">
                     <option value="">--- Select Session  ---</option>
                     <option value="january" <?php if($getstudent[1]['Session']=="january") {?> selected <?php } ?>>January</option>
                     <option value="april" <?php if($getstudent[1]['Session']=="april") {?> selected <?php } ?>>April</option>
                     <option value="july" <?php if($getstudent[1]['Session']=="july") {?> selected <?php } ?>>July</option>
                     <option value="october" <?php if($getstudent[1]['Session']=="october") {?> selected <?php } ?>>October</option>
                     <option value="vocational"  <?php if($getstudent[1]['Session']=="vocational") {?> selected <?php } ?>>Vocational</option>
                    </select>
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="control-label col-sm-4 mandatory" for="fee_deposit_detail">Write About Fees Deposit In Future <span>*</span>:</label>
                  <div class="col-sm-4">
                    <textarea  class="form-control txtarea" id="fee_deposit_detail" name="fee_deposit_detail" ><?php echo $getstudent[1]['About_Fee_Deposite']; ?></textarea>
                  </div>
                </div>
                
                <hr />
                
                <h4>Contact Details</h4>
                
                <hr />
                
                <div class="form-group">
                  <label class="control-label col-sm-4 mandatory" for="state">State <span>*</span>:</label>
                  <div class="col-sm-4">
                 
                    <select name="state" id="state" class="form-control" >
                    
                      <option value="">--Select Type--</option>
                      <?php foreach($getStates as $getStatesVal){ ?>
                      <option value="<?php echo $getStatesVal['State_Id']; ?>"
                       <?php if($getStatesVal['State_Id']==$get_state[1]['State_Id'])
                      {?>
                        selected

                     <?php  } ?> ><?php echo $getStatesVal['State_Name']; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="control-label col-sm-4 mandatory" for="district">District <span>*</span>:</label>
                  <div class="col-sm-3">
                 <?php    ?>
                    <select name="district" id="district" class="form-control" >
                    
                     <?php foreach($getdistrict as $getdistrict)
                    { ?>
                     <option value="<?php echo $getdistrict['District_Id']; ?>"   <?php if($get_district[1]['District_Id']==$getdistrict['District_Id']){?> selected <?php }  ?>><?php echo $getdistrict['District_Name']; ?></option>
                    <?php } ?>
                      <option value="">--Select Type--</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-4 mandatory" for="block">Block <span>*</span>:</label>
                  <div class="col-sm-3">
                    <select name="block" id="block" class="form-control" >
                     <option value=" ">--Select Type--</option>
                    <?php foreach($getblock as $block)
                    { ?>
                    <option value="<?php echo $block['Block_Id']; ?>" <?php if($block['Block_Id']==$getstudent[1]['Block_Id']){?> selected <?php }?> ><?php echo $block['Block_Name']; ?></option>
                    <?php }?>
                     
                    </select>
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="control-label col-sm-4 mandatory" for="address">Address <span>*</span>:</label>
                  <div class="col-sm-4">
                    <textarea  class="form-control txtarea" id="address" name="address" ><?php echo $getstudent[1]['Address']; ?></textarea>
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="control-label col-sm-4 mandatory" for="pincode">Pin Code :</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" id="pincode" name="pincode" value="<?php echo $getstudent[1]['Pincode']; ?>" />
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="control-label col-sm-4 mandatory" for="contact_no">Contact No <span>*</span>:</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" id="contact_no" name="contact_no" value="<?php echo $getstudent[1]['Contact_No']; ?>" />
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="control-label col-sm-4 mandatory" for="email">Email <span>*</span>:</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" id="email" name="email" value="<?php echo $getstudent[1]['Email'];?>" />
                  </div>
                </div>
                
                <hr />
                
                <h4>Student Bank Account Details</h4>
                
                <hr />
                
                <div class="form-group">
                  <label class="control-label col-sm-4 mandatory" for="bank_name">Bank Name <span>*</span>:</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" id="bank_name" name="bank_name" value="<?php echo $getstudent[1]['Bank_Name'];?>" />
                  </div>
                </div>
                   <div class="form-group">
                  <label class="control-label col-sm-4 mandatory" for="ac_holder_name">A/C Holder Name <span>*</span>:</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" id="ac_holder_name" name="ac_holder_name" value="<?php echo $getstudent[1]['Acc_holder_name'];?>" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-4 mandatory" for="account_no"> Account No <span>*</span>:</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" id="account_no" name="account_no" value="<?php echo $getstudent[1]['Account_No'];?>" />
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="control-label col-sm-4 mandatory" for="bank_address">Bank Address <span>*</span>:</label>
                  <div class="col-sm-4">
                    <textarea  class="form-control txtarea" id="bank_address" name="bank_address" ><?php echo $getstudent[1]
                    ['Bank_Address'];?></textarea>
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="control-label col-sm-4 mandatory" for="ifsc_code">IFSC Code <span>*</span>:</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" id="ifsc_code" name="ifsc_code" value="<?php echo $getstudent[1]['IFSC_Code'];?> " />
                  </div>
                </div>

              


                <hr />
                
                <div class="form-group">
                  <div class="col-sm-4"></div>
                  <div class="col-sm-3">
                  <input type="hidden" id="student_id" name="student_id" value="<?php echo $_REQUEST['id'];?>">
                  <input type="hidden" id="student_photo" name="student_photo" value="<?php echo $getstudent[1]['Photo'];?>">
                   <input type="hidden" id="student_signature" name="student_signature" value="<?php echo $getstudent[1]['Signature'];?>">
                   <input type="hidden" id="gurdian_signature" name="gurdian_signature" value="<?php echo $getstudent[1]['Gaurdian_Signature'];?>">
                    <input type="button" class="btn btn-primary btn-sm" id="edit" value="Submit">
                    <input type="reset" class="btn btn-default btn-sm" id="reset" value="Reset">
                  </div>
                </div>
              </div>
            </form>
        </div>
      </div>
    </div>
  </div>
  
  
</div>
<?php require_once(PATH_CM_INCLUDE.'/footer.php'); ?>