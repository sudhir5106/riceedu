<?php 
include('../../config.php'); 
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
require_once(PATH_LIBRARIES.'/classes/resize.php');
$db = new DBConn();


///*******************************************************
/// Validate that the data valid or not
///*******************************************************
if($_POST['type']=="dempCodeValid")
{

	$sql="SELECT EMP_Code FROM employee_master WHERE EMP_Code='".$_POST['emp_code']."' AND 	EMP_Designation='District Manager'";
	$res=$db->ExecuteQuery($sql);
		
	if(empty($res))
    {
 		echo 0;
    }
	else
	{
		echo 1;
	}

}

///*******************************************************
/// Validate that the data Exist or Not
///*******************************************************
if($_POST['type']=="dmloginCheck")
{

	$sql="SELECT DM_Emp_Code FROM dm_login WHERE DM_Emp_Code='".$_POST['emp_code']."'";
	$res=$db->ExecuteQuery($sql);
		
	if(empty($res))
    {
 		echo 0;
    }
	else
	{
		echo 1;
	}

}

///*******************************************************
/// Validate that the data Exist or Not
///*******************************************************
if($_POST['type']=="centerCodeCheck")
{

	$sql="SELECT Center_Code FROM cm_login WHERE Center_Code='".$_POST['centercode']."'";
	$res=$db->ExecuteQuery($sql);
		
	if(empty($res))
    {
 		echo 1;
    }
	else
	{
		echo 0;
	}

}

///*******************************************************
/// Validate that the data Exist or Not
///*******************************************************
if($_POST['type']=="EditCenterCodeCheck")
{

	$sql="SELECT Center_Code FROM cm_login WHERE Center_Code='".$_POST['centercode']."' AND CM_Id<>".$_POST['cmid'];
	$res=$db->ExecuteQuery($sql);
		
	if(empty($res))
    {
 		echo 1;
    }
	else
	{
		echo 0;
	}

}

///*******************************************************
/// Validate that the data valid or not
///*******************************************************
if($_POST['type']=="cempCodeValid")
{

	$sql="SELECT EMP_Code FROM employee_master WHERE EMP_Code='".$_POST['emp_code']."' AND 	EMP_Designation='Center Manager'";
	$res=$db->ExecuteQuery($sql);
		
	if(empty($res))
    {
 		echo 0;
    }
	else
	{
		echo 1;
	}

}

///*******************************************************
/// Validate that the data already exist or not
///*******************************************************
if($_POST['type']=="cmAdded")
{

	$sql="SELECT CM_Emp_Code FROM cm_login WHERE CM_Emp_Code='".$_POST['emp_code']."'";
	$res=$db->ExecuteQuery($sql);
		
	if(!empty($res))
    {
 		echo 0;
    }
	else
	{
		echo 1;
	}

}


///*******************************************************
/// Validate that the data already exist or not
///*******************************************************
if($_POST['type']=="cmAddedEdit")
{

	$sql="SELECT CM_Emp_Code FROM cm_login WHERE CM_Id<>".$_POST['cmid']." AND CM_Emp_Code='".$_POST['emp_code']."'";
	$res=$db->ExecuteQuery($sql);
		
	if(!empty($res))
    {
 		echo 0;
    }
	else
	{
		echo 1;
	}

}

///*******************************************************
/// Get Employee Name ////////////////////////////////////
///*******************************************************
if($_POST['type']=="getEmpName")
{	
	
	 	$getEmpName=$db->ExecuteQuery("SELECT EMP_Name FROM employee_master WHERE EMP_Code='".$_POST['emp_code']."'");
		
		if(!empty($getEmpName))
		{
		  echo $getEmpName[1]['EMP_Name'];
		}
}

///*******************************************************
/// Get Destination name /////////////////////////////////
///*******************************************************

if($_POST['type']=="getDistrict")
{
	 $sql_district="SELECT District_Id, District_Name FROM district_master WHERE State_Id='".$_POST['stateId']."' ORDER BY District_Name ASC"; 
	 $res=$db->ExecuteQuery($sql_district);
	
	 echo '<option value="">--Select Type--</option>';
	 
	 foreach($res as $val){
		 echo '<option value="'.$val['District_Id'].'">'.$val['District_Name'].'</option>';
	 }
}

///*******************************************************
/// Get Block name ///////////////////////////////////////
///*******************************************************

if($_POST['type']=="getBlocks")
{
	 $sql_district="SELECT Block_Id, Block_Name FROM block_master WHERE District_Id='".$_POST['districtId']."' ORDER BY Block_Name ASC"; 
	 $res=$db->ExecuteQuery($sql_district);
	
	 echo '<option value="">--Select Type--</option>';
	 
	 foreach($res as $val){
		 echo '<option value="'.$val['Block_Id'].'">'.$val['Block_Name'].'</option>';
	 }
}

///***************************************************
/// Change RM Status ////////////////////////////////////
///***************************************************
if($_POST['type']=="changeStatus")
{	
		$cmid = explode("-", $_POST['cmid']);
		
		//Get Current Status from DB
	 	$getStatus=$db->ExecuteQuery("SELECT CM_Status FROM cm_login WHERE CM_Id=".$cmid[1]);
		
		if($getStatus[1]['CM_Status']==1){
			$status	= 0;
		}
		else {$status = 1;}
		
		// Update RM Status
		$tblname="cm_login";		
		$tblfield=array('CM_Status');
		$tblvalues=array($status);
		
		$condition="CM_Id=".$cmid[1];
		$res=$db->updateValue($tblname,$tblfield,$tblvalues,$condition);
		
}


///*******************************************************
/// To Insert New CM Login ///////////////////////////////
///*******************************************************
if($_POST['type']=="addCmLogin")
{	
	
		$res=mysql_query("INSERT INTO cm_login (Center_Code, DM_Emp_Code, CM_Emp_Code, CM_State, CM_District, CM_Block, CM_Address, CM_Password, CM_Status) 			
			
		VALUES ('RTC-".$_REQUEST['centercode']."', '".$_REQUEST['d_emp_code']."', '".$_REQUEST['c_emp_code']."', ".$_REQUEST['state'].", ".$_REQUEST['district'].", ".$_REQUEST['block'].", '".$_REQUEST['address']."', '".$_REQUEST['password']."', 1)");
		
		if(!$res)
		{
		  echo 0;
		}
		 else
		{	
		  echo 1;
		}
}

///*******************************************************
/// Edit Center
///*******************************************************
if($_POST['type']=="editCmLogin")
{
	// Update rm_login Tabel
	$tblname="cm_login";	
	$tblfield=array('Center_Code', 'DM_Emp_Code', 'CM_Emp_Code', 'CM_State', 'CM_District', 'CM_Block', 'CM_Address', 'CM_Password');	
	$tblvalues=array($_POST['centercode'], $_POST['d_emp_code'], $_POST['c_emp_code'], $_POST['state'], $_POST['district'], $_POST['block'], $_POST['address'], $_POST['password']);	
	$condition="CM_Id=".$_POST['cmid'];
	
	$res=$db->updateValue($tblname,$tblfield,$tblvalues,$condition);
	
	if(!empty($res)){
		echo 1;	
	}
	else{
		echo 0;
	}
}


///*******************************************************
/// Delete row from franchise_master table
///*******************************************************
if($_POST['type']=="delete")
{
	 $tblname="cm_login";
	 $condition="CM_Id=".$_POST['cmid'];
	 $res=$db->deleteRecords($tblname,$condition);
}


?>