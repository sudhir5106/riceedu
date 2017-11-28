<?php 
include('../../config.php'); 
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
require_once(PATH_LIBRARIES.'/classes/resize.php');
$db = new DBConn();


///*******************************************************
/// Validate that the data valid or not
///*******************************************************
if($_POST['type']=="approval")
{
	
	$tblname="student_master";	
	$tblfield=array('Approval_Status');	
	$tblvalues=array(1);	
	$condition="Student_Id=".$_POST['student_id'];
	
	$res=$db->updateValue($tblname,$tblfield,$tblvalues,$condition);
	
	if(!empty($res)){
		echo 1;	
	}
	else{
		echo 0;
	}
}
/////////////////////////////// approve -not approve//////////////////////////////


if($_POST['type']=="approve_status")
{
	
	$tblname="student_master";	

	$tblfield=array('Approval_Status');	
	$tblvalues=array(0);	
	$condition="Student_Id=".$_POST['student_id'];
	
	$res=$db->updateValue($tblname,$tblfield,$tblvalues,$condition);
	
	if(!empty($res)){
		echo 1;	
	}
	else{
		echo 0;
	}
}
/////////////////////////////////////////////////////////////////////////////////
?>