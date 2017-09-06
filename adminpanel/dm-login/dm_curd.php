<?php 
include('../../config.php'); 
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
require_once(PATH_LIBRARIES.'/classes/resize.php');
$db = new DBConn();

///*******************************************************
/// Validate that the data valid or not
///*******************************************************
if($_POST['type']=="rmCodeValid")
{

	$sql="SELECT EMP_Code FROM employee_master WHERE EMP_Code='".$_POST['emp_code']."' AND 	EMP_Designation='Regional Manager'";
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
/// Validate that the data valid or not
///*******************************************************
if($_POST['type']=="rempCodeValid")
{

	$sql="SELECT EMP_Code FROM employee_master WHERE EMP_Code='".$_POST['emp_code']."' AND 	EMP_Designation='Regional Manager'";
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
if($_POST['type']=="rmloginCheck")
{

	$sql="SELECT R_Emp_Code FROM rm_login WHERE R_Emp_Code='".$_POST['emp_code']."'";
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
/// Validate that the data already exist or not
///*******************************************************
if($_POST['type']=="dmAdded")
{

	$sql="SELECT DM_Emp_Code FROM dm_login WHERE DM_Emp_Code='".$_POST['emp_code']."'";
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
if($_POST['type']=="dmAddedEdit")
{

	$sql="SELECT DM_Emp_Code FROM dm_login WHERE DM_Id<>".$_POST['dmid']." AND DM_Emp_Code='".$_POST['emp_code']."'";
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
		$dmid = explode("-", $_POST['dmid']);
		
		//Get Current Status from DB
	 	$getStatus=$db->ExecuteQuery("SELECT DM_Status FROM dm_login WHERE DM_Id=".$dmid[1]);
		
		if($getStatus[1]['DM_Status']==1){
			$status	= 0;
		}
		else {$status = 1;}
		
		// Update RM Status
		$tblname="dm_login";		
		$tblfield=array('DM_Status');
		$tblvalues=array($status);
		
		$condition="DM_Id=".$dmid[1];
		$res=$db->updateValue($tblname,$tblfield,$tblvalues,$condition);
		
}


///*******************************************************
/// To Insert New RM Login ///////////////////////////////
///*******************************************************
if($_POST['type']=="addDmLogin")
{	
	
		$res=mysql_query("INSERT INTO dm_login (R_Emp_Code, DM_Emp_Code, DM_State, DM_District, DM_Block, DM_Address, DM_Password, DM_Status) 			
			
		VALUES ('".$_REQUEST['r_emp_code']."', '".$_REQUEST['d_emp_code']."', ".$_REQUEST['state'].", ".$_REQUEST['district'].", ".$_REQUEST['block'].", '".$_REQUEST['address']."', '".$_REQUEST['password']."', 1)");
		
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
if($_POST['type']=="editDmLogin")
{
	
	$con= mysql_connect(SERVER,DBUSER,DBPASSWORD);
	mysql_query('SET AUTOCOMMIT=0',$con);
	mysql_query('START TRANSACTION',$con);
	
	try
	{
		
		//Get Current RM Emp Code from DB
	 	$getRMCode=$db->ExecuteQuery("SELECT DM_Emp_Code FROM dm_login WHERE DM_Id=".$_POST['dmid']);
		
		//if RM Emp Code will not match with input RM EMP Code
		//Then below code will update the dm_login table
		if($getRMCode[1]['DM_Emp_Code']!=$_POST['d_emp_code']){
			
			// Update cm_login Tabel
			$tblname="cm_login";	
			$tblfield=array('DM_Emp_Code');	
			$tblvalues=array($_POST['d_emp_code']);	
			$condition="DM_Emp_Code='".$getRMCode[1]['DM_Emp_Code']."'";
			
			$res1=$db->updateValue($tblname,$tblfield,$tblvalues,$condition);		
			
			if(!$res1)
			{
				throw new Exception('a');
			}
			
		}
		
		// Update rm_login Tabel
		$tblname="dm_login";	
		$tblfield=array('R_Emp_Code', 'DM_Emp_Code', 'DM_State', 'DM_District', 'DM_Block', 'DM_Address', 'DM_Password');	
		$tblvalues=array($_POST['r_emp_code'], $_POST['d_emp_code'], $_POST['state'], $_POST['district'], $_POST['block'], $_POST['address'], $_POST['password']);	
		$condition="DM_Id=".$_POST['dmid'];
		
		$res=$db->updateValue($tblname,$tblfield,$tblvalues,$condition);
		
		if(!$res)
		{
			throw new Exception('b');
		}
		
		mysql_query("COMMIT",$con);
		echo 1;
	}
	catch(Exception $e)
	{
		echo  $e->getMessage();
		mysql_query('ROLLBACK',$con);
		mysql_query('SET AUTOCOMMIT=1',$con);
	}
	
	/*if(!empty($res)){
		echo 1;	
	}
	else{
		echo 0;
	}*/
}


///*******************************************************
/// Delete row from franchise_master table
///*******************************************************
if($_POST['type']=="delete")
{
	 $tblname="dm_login";
	 $condition="DM_Id=".$_POST['dmid'];
	 $res=$db->deleteRecords($tblname,$condition);
}


?>