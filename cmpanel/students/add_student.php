<?php
include('../../config.php'); 
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
$db = new DBConn();
include(PATH_CM_INCLUDE.'/header.php');

// get all list of states
$getStates=$db->ExecuteQuery("SELECT * FROM state_master ");

// get all list of courses
$getCourse=$db->ExecuteQuery("SELECT * FROM course_master ");
?>
<script type="text/javascript" src="student.js"></script>

<div id="loading">
    <div class="loader-block"><i class="fa-li fa fa-spinner fa-spin spinloader"></i></div>
</div>

<div>
  <div class="page-title">
    <div class="title_left">
      <h3><i class="glyphicon glyphicon-plus"></i> Add Student</h3>
    </div>
  </div>
  
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Add New</h2>
          <ul class="nav navbar-right panel_toolbox">
            <li>
              <span><a class="btn btn-primary" href="index.php"><i class="glyphicon glyphicon-share-alt"></i> View Student List</a></span>
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
                    <input type="text" class="form-control" id="reference" name="reference" placeholder="Reference" />
                  </div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-4 control-label mandatory" for="fileupload">Upload Student Photo <span>*</span>:</label>
                    <div class="col-md-4">
                        <label class="col-md-4 control-label" for="fileupload"><span class="glyphicon glyphicon-user" style="font-size:50pt;"></span></label>
                        <input class="col-md-8" type="file" id="fileupload" name="fileupload">
                   </div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-4 control-label mandatory" for="student_sign">Upload Student Signature <span>*</span>:</label>
                    <div class="col-md-4">
                        <label class="col-md-4 control-label" for="student_sign"><span class="glyphicon glyphicon-picture" style="font-size:50pt;"></span></label>
                        <input class="col-md-8" type="file" id="student_sign" name="student_sign">
                   </div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-4 control-label mandatory" for="guardian_sign">Upload Guardian Signature <span>*</span>:</label>
                    <div class="col-md-4">
                        <label class="col-md-4 control-label" for="guardian_sign"><span class="glyphicon glyphicon-picture" style="font-size:50pt;"></span></label>
                        <input class="col-md-8" type="file" id="guardian_sign" name="guardian_sign">
                   </div>
                </div>
                
                <div class="form-group">
                  <label class="control-label col-sm-4 mandatory" for="student_name">Student Name <span>*</span>:</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" id="student_name" name="student_name" placeholder="Name of the Student" />
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="control-label col-sm-4 mandatory" for="dob">Date of Birth <span>*</span> </label>
                  <div class="col-sm-2">
                    <input type="text" id="dob" name="dob" required="required" class="form-control datetimepicker" placeholder="DD/MM/YYYY">
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-md-4 control-label" for="gender">Gender</label>
                  <div class="col-md-4"> 
                    <label class="radio-inline" for="gender-0">
                      <input name="gender" id="gender-0" value="1" checked="checked" type="radio">
                      Male
                    </label> 
                    <label class="radio-inline" for="gender-1">
                      <input name="gender" id="gender-1" value="2" type="radio">
                      Female
                    </label>
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="control-label col-sm-4 mandatory" for="father_name">Father's Name <span>*</span>:</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" id="father_name" name="father_name" placeholder="Father's Name" />
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="control-label col-sm-4 mandatory" for="mother_name">Mother's Name <span>*</span>:</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" id="mother_name" name="mother_name" placeholder="Mother's Name" />
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-md-4 control-label mandatory" for="religion">Religion <span>*</span></label>
                  <div class="col-md-3">
                    <select id="religion" name="religion" class="form-control">
                     <option value="">--- Select Religion  ---</option>
                      <option value="Hindu">Hindu</option>
                      <option value="Muslim">Muslim</option>
                      <option value="Sikh">Sikh</option>
                      <option value="Chritsian">Chritsian</option>
                      <option value="Jain">Jain</option>
                      <option value="Buddhist">Buddhist</option>
                    </select>
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-md-4 control-label mandatory" for="caste">Caste <span>*</span></label>
                  <div class="col-md-3">
                    <select id="caste" name="caste" class="form-control">
                     <option value="">--- Select Caste  ---</option>
                      <option value="GEN">GEN</option>
                      <option value="OBC">OBC</option>
                      <option value="SC">SC</option>
                      <option value="ST">ST</option>
                      <option value="SATNAMI">SATNAMI</option>
                      <option value="MINORITY">MINORITY</option>
                      <option value="JAIN">JAIN</option>
                      <option value="MUSLIM">MUSLIM</option>
                    </select>
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-md-4 control-label" for="physical_status">Physical Status</label>
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
                </div>
                
                <div class="form-group">
                  <label class="control-label col-sm-4 mandatory" for="aadhaar_no">Aadhaar Card No. <span>*</span>:</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" id="aadhaar_no" name="aadhaar_no" placeholder="Aadhaar Card No." />
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-md-4 control-label mandatory" for="education">Education <span>*</span></label>
                  <div class="col-md-3">
                    <select id="education" name="education" class="form-control">
                     <option value="">--- Select Education  ---</option>
                      <option value="8th">8th</option>
                      <option value="10th">10th</option>
                      <option value="12th">12th</option>
                      <option value="Diploma">Diploma</option>
                      <option value="BA">BA</option>
                      <option value="B COM">B COM</option>
                      <option value="BSC">BSC</option>
                      <option value="BCA">BCA</option>
                      <option value="BE">BE</option>
                      <option value="B TECH">B TECH</option>
                      <option value="MA">MA</option>
                      <option value="MBA">MBA</option>
                      <option value="MSC">MSC</option>
                      <option value="MCA">MCA</option>
                      <option value="M TECH">M TECH</option>
                      <option value="GRADUATE">GRADUATE</option>
                      <option value="POST GRADUATE">POST GRADUATE</option>
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
                     <option value="">--- Select Course  ---</option>
                     
                     <?php foreach($getCourse as $getCourseVal){ ?>
                      <option value="<?php echo $getCourseVal['Course_Id']; ?>"><?php echo $getCourseVal['Course_Name']; ?></option>
                     <?php } ?>
                    </select>
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="control-label col-sm-4 mandatory" for="mode">Mode <span>*</span>:</label>
                  <div class="col-sm-3">
                    <select id="mode" name="mode" class="form-control">
                     <option value="">--- Select Mode  ---</option>
                     <option value="regular">Regular</option>
                     <option value="online">Online</option>
                     <option value="private">Private</option>
                    </select>
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="control-label col-sm-4 mandatory" for="session">Session <span>*</span>:</label>
                  <div class="col-sm-3">
                    <select id="session" name="session" class="form-control">
                     <option value="">--- Select Session  ---</option>
                     <option value="january">January</option>
                     <option value="april">April</option>
                     <option value="july">July</option>
                     <option value="october">October</option>
                     <option value="vocational">Vocational</option>
                    </select>
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="control-label col-sm-4 mandatory" for="fee_deposit_detail">Write About Fees Deposit In Future <span>*</span>:</label>
                  <div class="col-sm-4">
                    <textarea  class="form-control txtarea" id="fee_deposit_detail" name="fee_deposit_detail" placeholder="Write Some Brief Note About How The Student Will Deposit The Fees In Future"></textarea>
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
                      <option value="<?php echo $getStatesVal['State_Id']; ?>"><?php echo $getStatesVal['State_Name']; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="control-label col-sm-4 mandatory" for="district">District <span>*</span>:</label>
                  <div class="col-sm-3">
                    <select name="district" id="district" class="form-control" >
                      <option value="">--Select Type--</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-4 mandatory" for="block">Block <span>*</span>:</label>
                  <div class="col-sm-3">
                    <select name="block" id="block" class="form-control" >
                      <option value="">--Select Type--</option>
                    </select>
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="control-label col-sm-4 mandatory" for="address">Address <span>*</span>:</label>
                  <div class="col-sm-4">
                    <textarea  class="form-control txtarea" id="address" name="address" placeholder="Address"></textarea>
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="control-label col-sm-4 mandatory" for="pincode">Pin Code :</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" id="pincode" name="pincode" placeholder="Ex: 490020" />
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="control-label col-sm-4 mandatory" for="contact_no">Contact No <span>*</span>:</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" id="contact_no" name="contact_no" placeholder="Contact No" />
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="control-label col-sm-4 mandatory" for="email">Email <span>*</span>:</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email" />
                  </div>
                </div>
                
                <hr />
                
                <h4>Student Bank Account Details</h4>
                
                <hr />
                
                <div class="form-group">
                  <label class="control-label col-sm-4 mandatory" for="bank_name">Bank Name <span>*</span>:</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" id="bank_name" name="bank_name" placeholder="Bank Name" />
                  </div>
                </div>
                   <div class="form-group">
                  <label class="control-label col-sm-4 mandatory" for="ac_holder_name">A/C Holder Name <span>*</span>:</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" id="ac_holder_name" name="ac_holder_name" placeholder="A/C Holder Name" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-4 mandatory" for="account_no"> Account No <span>*</span>:</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" id="account_no" name="account_no" placeholder="Bank Account No." />
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="control-label col-sm-4 mandatory" for="bank_address">Bank Address <span>*</span>:</label>
                  <div class="col-sm-4">
                    <textarea  class="form-control txtarea" id="bank_address" name="bank_address" placeholder="Bank Address"></textarea>
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="control-label col-sm-4 mandatory" for="ifsc_code">IFSC Code <span>*</span>:</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" id="ifsc_code" name="ifsc_code" placeholder="IFSC Code" />
                  </div>
                </div>

              


                <hr />
                
                <div class="form-group">
                  <div class="col-sm-4"></div>
                  <div class="col-sm-3">
                    <input type="button" class="btn btn-primary btn-sm" id="submit" value="Submit">
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