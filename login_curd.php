<?php 
include('config.php'); 
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
$db = new DBConn();

if($_POST['type']=="checkLogin")
{
	$table = "rm_login";
	$usrfield = "R_Emp_Code";
	$usrpassfield = "R_Password";
	
	$result = $db->checkLogin($table,$usrfield,$_POST['user'],$usrpassfield,$_POST['password']);
	
	if(!empty($result)){
		
		if($result[1]['R_Status']==1){
			
			$rmName = $db->ExecuteQuery("SELECT EMP_Name FROM employee_master WHERE EMP_Code='".$result[1]['R_Emp_Code']."'");
			
			$_SESSION['rmid']=$result[1]['R_Id'];
			$_SESSION['rmname']=$rmName[1]['EMP_Name'];
			
			echo "true";	
		}
		else{
			echo "blocked";
		}
		
	}
	else{
		echo "false";
	}
}//eof if condition

///*******************************************************
/// check dm login
///*******************************************************
if($_POST['type']=="checkdmLogin")
{
	$table = "dm_login";
	$usrfield = "DM_Emp_Code";
	$usrpassfield = "DM_Password";
	
	$result = $db->checkLogin($table,$usrfield,$_POST['user'],$usrpassfield,$_POST['password']);
	
	if(!empty($result)){
		
		if($result[1]['DM_Status']==1){
			
			$dmName = $db->ExecuteQuery("SELECT EMP_Name FROM employee_master WHERE EMP_Code='".$result[1]['DM_Emp_Code']."'");
			
			$_SESSION['dmid']=$result[1]['DM_Id'];
			$_SESSION['dmname']=$dmName[1]['EMP_Name'];
			
			echo "true";	
		}
		else{
			echo "blocked";
		}
		
	}
	else{
		echo "false";
	}
}//eof if condition

///*******************************************************
/// check cm login
///*******************************************************
if($_POST['type']=="checkcmLogin")
{
	$table = "cm_login";
	$usrfield = "CM_Emp_Code";
	$usrpassfield = "CM_Password";
	
	$result = $db->checkLogin($table,$usrfield,$_POST['user'],$usrpassfield,$_POST['password']);
	
	if(!empty($result)){
		
		if($result[1]['CM_Status']==1){
			
			$dmName = $db->ExecuteQuery("SELECT EMP_Name FROM employee_master WHERE EMP_Code='".$result[1]['CM_Emp_Code']."'");
			
			$_SESSION['cmid']=$result[1]['CM_Id'];
			$_SESSION['cmname']=$dmName[1]['EMP_Name'];
			
			echo "true";	
		}
		else{
			echo "blocked";
		}
		
	}
	else{
		echo "false";
	}
}//eof if condition

///*******************************************************
/// check Student login
///*******************************************************
if($_POST['type']=="checkStudentLogin")
{
	$table = "student_master";
	$usrfield = "Student_Code";
	$usrpassfield = "Password";
	
	$result = $db->checkLogin($table,$usrfield,$_POST['user'],$usrpassfield,$_POST['password']);
	
	if(!empty($result)){
		
		if($result[1]['Approval_Status']==1){
			  $_SESSION['user_code']=$result[1]['Student_Id'];;
			$_SESSION['sid']=$result[1]['Student_Id'];
			$_SESSION['sname']=$result[1]['Student_Name'];
		   
			echo "true";	
		}
		else{
			echo "blocked";
		}
		
	}
	else{
		echo "false";
	}
}//eof if condition


///*******************************************************
/// Validate that the data already exist or not
///*******************************************************
if($_POST['type']=="validEmpCode")
{

	$sql="SELECT EMP_Name FROM employee_master WHERE EMP_Code='".$_POST['emp_code']."'";
	$res=$db->ExecuteQuery($sql);
		
	if(!empty($res))
    {
 		echo 1;
    }
	else
	{
		echo 0;
	}

}

if($_POST['type']=="getEmpDetails")
{
	


	$sql="SELECT DATE_FORMAT(DOJ,'%d-%m-%Y') AS DOJ, e.EMP_Code, e.EMP_Image, e.EMP_Name, e.EMP_Designation, b.Block_Name, d.District_Name, s.State_Name, e.EMP_Contact, e.EMP_Email,e.Paymenr_Record,e.Perfromance

FROM employee_master e 
LEFT JOIN block_master b ON e.Block_Id = b.Block_Id
LEFT JOIN district_master d ON e.District_Id = d.District_Id
LEFT JOIN state_master s ON d.State_Id = s.State_Id

WHERE EMP_Code='".$_POST['emp_code']."'";

	$empInfo=$db->ExecuteQuery($sql);
?>
	<div class="modalTxt">
        <div class="col-sm-3"><img width="100%" src="<?php echo PATH_DATA_IMAGE."/employee/".$empInfo[1]['EMP_Image'] ?>" alt=""></div>
        <div class="col-sm-9 padding-left-zero">
        	<div class="tblrow">
            	<div class="col-sm-4 padding-left-zero">Date of Joining:</div>
                <div class="col-sm-8"><strong><?php echo $empInfo[1]['DOJ'] ?></strong></div>
                <div class="clearfix"></div>
            </div>
            <div class="tblrow">
            	<div class="col-sm-4 padding-left-zero">Name of Employee:</div>
                <div class="col-sm-8"><strong><?php echo $empInfo[1]['EMP_Name'] ?></strong></div>
                <div class="clearfix"></div>
            </div>
            <div class="tblrow">
            	<div class="col-sm-4 padding-left-zero">Employee Code:</div>
                <div class="col-sm-8"><strong><?php echo $empInfo[1]['EMP_Code'] ?></strong></div>
                <div class="clearfix"></div>
            </div>
            <div class="tblrow">
            	<div class="col-sm-4 padding-left-zero">Designation:</div>
                <div class="col-sm-8"><strong><?php echo $empInfo[1]['EMP_Designation'] ?></strong></div>
                <div class="clearfix"></div>
            </div>


            <div class="tblrow">
            	<div class="col-sm-4 padding-left-zero">Advance Payment Record:</div>
                <div class="col-sm-8"><strong><?php echo $empInfo[1]['Paymenr_Record'] ?></strong></div>
                <div class="clearfix"></div>
            </div> 
            <div class="tblrow">
            	<div class="col-sm-4 padding-left-zero">Working Performance:</div>
                <div class="col-sm-8"><strong><?php echo $empInfo[1]['Perfromance'] ?></strong></div>
                <div class="clearfix"></div>
            </div> 

            <div class="tblrow">
            	<div class="col-sm-4 padding-left-zero">Contact No:</div>
                <div class="col-sm-8"><strong><?php echo $empInfo[1]['EMP_Contact'] ?></strong></div>
                <div class="clearfix"></div>
            </div>
            <div class="tblrow">
            	<div class="col-sm-4 padding-left-zero">Email:</div>
                <div class="col-sm-8"><strong><?php echo $empInfo[1]['EMP_Email'] ?></strong></div>
                <div class="clearfix"></div>
            </div>
            <div class="tblrow">
            	<div class="col-sm-4 padding-left-zero">Block:</div>
                <div class="col-sm-8"><strong><?php echo $empInfo[1]['Block_Name'] ?></strong></div>
                <div class="clearfix"></div>
            </div>
            <div class="tblrow">
            	<div class="col-sm-4 padding-left-zero">District:</div>
                <div class="col-sm-8"><strong><?php echo $empInfo[1]['District_Name'] ?></strong></div>
                <div class="clearfix"></div>
            </div>
            <div class="tblrow">
            	<div class="col-sm-4 padding-left-zero">State:</div>
                <div class="col-sm-8"><strong><?php echo $empInfo[1]['State_Name'] ?></strong></div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    
<?php
}

?>