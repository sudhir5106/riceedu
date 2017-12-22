<?php
include('../../../config.php'); 
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
include(PATH_ADMIN_INCLUDE.'/header.php');
$db = new DBConn();

// get all list of states
$getStates=$db->ExecuteQuery("SELECT * FROM state_master ");
?>
<script type="text/javascript"  src="employee.js" ></script>

<div class="main">
  <div class="page-title">
    <div>
      <div class="col-lg-5 pull-left">
        <h4><i class="glyphicon glyphicon-plus"></i> Add Employee</h4>
      </div>
      <div class="col-lg-5 pull-right text-right">
      	<span class="hidden-phone" style="margin-left: 15px; margin-top: 3px;"><a class="btn btn-primary" href="index.php"><i class="glyphicon glyphicon-share-alt"></i> View Employee List</a></span>
      </div>
    </div>
    <div class="clearfix">&nbsp;</div>
  </div>
  <div class="clear formbgstyle">
    <form class="form-horizontal" role="form" id="insertEmployee" method="post">
      <div>
        <div class="form-group">
            <label class="col-md-4 control-label mandatory" for="filebutton">Employee Photo <span>*</span>:</label>
            <div class="col-md-4">
                <label class="col-md-4 control-label" for="fileupload"><span class="glyphicon glyphicon-user" style="font-size:50pt;"></span></label>
                <input class="col-md-8" type="file" id="fileupload" name="fileupload">
           </div>
        </div>

      <div class="form-group">
            <label class="col-md-4 control-label mandatory" for="filebutton">Employee Signature <span>*</span>:</label>
            <div class="col-md-4">
                <label class="col-md-4 control-label" for="fileupload_sign"><span class="glyphicon glyphicon-picture" style="font-size:50pt;"></span></label>
                <input class="col-md-8" type="file" id="fileupload_sign" name="fileupload_sign">
           </div>
        </div>




        
        <div class="form-group">
          <label class="control-label col-sm-4 mandatory" for="emp_code">Employee Code <span>*</span>:</label>
          <div class="col-sm-5">
            <input type="text" class="form-control input-sm" id="emp_code" name="emp_code" placeholder="Ex: AB00001" />
          </div>
        </div>
        
        <div class="form-group">
          <label class="control-label col-sm-4 mandatory" for="emp_name">Employee Name <span>*</span>:</label>
          <div class="col-sm-5">
            <input type="text" class="form-control input-sm" id="emp_name" name="emp_name" placeholder="Name of the Employee" />
          </div>
        </div>
        
        <div class="form-group">
          <label class="control-label col-sm-4 mandatory" for="designation">Designation <span>*</span>:</label>
          <div class="col-sm-5">
          	<input class="pull-left checkboxVerAlign" id="rmChkBx" type="checkbox" />&nbsp; Regional Manager<br />
            <input class="pull-left checkboxVerAlign" id="dmChkBx" type="checkbox" />&nbsp; District Manager<br />
            <input class="pull-left checkboxVerAlign" id="cmChkBx" type="checkbox" />&nbsp; Center Manager<br />
            <input class="pull-left checkboxVerAlign" id="otherChkBx" type="checkbox" />&nbsp; Other<br /><br />
            <input type="text" class="form-control input-sm" id="designation" name="designation" placeholder="Designation" readonly="readonly" /><br />
          </div>
        </div>
        
        <div class="form-group">
          <label class="control-label col-sm-4 mandatory" for="salary">Salary <span>*</span>:</label>
          <div class="col-sm-5">
            <input type="text" class="form-control input-sm" id="salary" name="salary" placeholder="Salary" />
          </div>
        </div>
        
        <div class="form-group">
          <label class="control-label col-sm-4 mandatory" for="state">State <span>*</span>:</label>
          <div class="col-sm-3">
            <select name="state" id="state" class="form-control input-sm" >
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
            <select name="district" id="district" class="form-control input-sm" >
              <option value="">--Select Type--</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-4 mandatory" for="block">Block <span>*</span>:</label>
          <div class="col-sm-3">
            <select name="block" id="block" class="form-control input-sm" >
              <option value="">--Select Type--</option>
            </select>
          </div>
        </div>
        
        <div class="form-group">
          <label class="control-label col-sm-4 mandatory" for="address">Address <span>*</span>:</label>
          <div class="col-sm-4">
            <textarea  class="form-control input-sm txtarea" id="address" name="address" placeholder="Address"></textarea>
          </div>
        </div>
        
        <div class="form-group">
          <label class="control-label col-sm-4 mandatory" for="contact_no">Contact No <span>*</span>:</label>
          <div class="col-sm-3">
            <input type="text" class="form-control input-sm" id="contact_no" name="contact_no" placeholder="Contact No" />
          </div>
        </div>
        
        <div class="form-group">
          <label class="control-label col-sm-4 mandatory" for="email">Email <span>*</span>:</label>
          <div class="col-sm-3">
            <input type="text" class="form-control input-sm" id="email" name="email" placeholder="Email" />
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-4 mandatory" for="Advance_Payment_Record">Advance Payment Record <span>*</span>:</label>
          <div class="col-sm-3">
          <textarea  class="form-control input-sm txtarea" id="payment_record" name="payment_record" placeholder="Advance Payment Record">
          </textarea>
            
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-4 mandatory" for="Working_Performance">Working Performance <span>*</span>:</label>
          <div class="col-sm-3">
          <textarea  class="form-control input-sm txtarea" id="perfromance" name="perfromance" placeholder="Working Performance">
          </textarea>
          </div>
        </div>
        <!--<div class="form-group">
          <label class="control-label col-sm-4 mandatory" for="password">Password <span>*</span>:</label>
          <div class="col-sm-3">
            <input type="password" class="form-control input-sm" id="password" name="password" placeholder="Password" />
          </div>
        </div>-->
        
        <div class="form-group">
          <label class="control-label col-sm-4 mandatory" for="posting_place">Posting Place <span>*</span>:</label>
          <div class="col-sm-5">
            <input type="text" class="form-control input-sm" id="posting_place" name="posting_place" placeholder="Posting Place" />
          </div>
        </div>
        
        <div class="form-group">
          <label class="control-label col-sm-4 mandatory" for="duty_time">Duty Time <span>*</span>:</label>
          <div class="col-sm-5">
            <input type="text" class="form-control input-sm" id="duty_time" name="duty_time" placeholder="Ex: 10AM to 6PM" />
          </div>
        </div>
        
        <div class="form-group">
          <label class="control-label col-sm-4 mandatory" for="Visiting_Date_Place">Visiting Date &amp; Place <span>*</span>:</label>
          <div class="col-sm-5">
            <input type="text" class="form-control input-sm" id="Visiting_Date_Place" name="Visiting_Date_Place" placeholder="Visiting Date & Place" />
          </div>
        </div>
        
        
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
