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
	$regNo = rand(1000,1000000);
	$entryNo = rand(1000,1000000);
	
	// Update rm_login Tabel
	$tblname="student_master";	
	$tblfield=array('Registration_No', 'Entry_No', 'Approval_Status');	
	$tblvalues=array($regNo, $entryNo, 1);	
	$condition="Student_Id=".$_POST['student_id'];
	
	$res=$db->updateValue($tblname,$tblfield,$tblvalues,$condition);
	
	if(!empty($res)){
		echo 1;	
	}
	else{
		echo 0;
	}
}

?>