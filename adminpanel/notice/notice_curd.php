<?php 
include('../../config.php'); 
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
require_once(PATH_LIBRARIES.'/classes/resize.php');
$db = new DBConn();


///*******************************************************
/// for Student invalid ///////////////////////////////////
///*******************************************************
if($_POST['type']=="InvalidStudentCode")
{
	
	$sql=$db->ExecuteQuery("SELECT EXISTS(SELECT 1 FROM student_master WHERE Student_Code='".$_POST['student_code']."') AS 'Find'");
	echo $sql[1]['Find'];	  
}

///*******************************************************
/// Get Student name /////////////////////////////////
///*******************************************************

if($_POST['type']=="getStudentName")
{
	 if(!empty($_POST['student_code'])){
	 	
		$sql_student="SELECT Student_Id, Student_Name FROM student_master WHERE Student_Code=".$_POST['student_code']; 
	 	$res=$db->ExecuteQuery($sql_student);
	
		if(!empty($res)){
		 	echo '<input type="hidden" class="form-control" id="student_id" name="student_id" value="'.$res[1]['Student_Id'].'" />
		 <div>'.$res[1]['Student_Name'].'</div>';
		 }
		 
	 }

}

///*******************************************************
/// To Insert NOTICE  /////////////////////////////////
///*******************************************************
if($_POST['type']=="sendNotice")
{
	
	$notice = mysql_real_escape_string($_REQUEST['notice']);
	/////////////////////////////////////////////////////
	// Query to insert the data into center_notice table
	/////////////////////////////////////////////////////
	$res=mysql_query("INSERT INTO ho_notice (Notice_Date, Notice, Student_Id) 			
		
	VALUES (NOW(), '".$notice."', ".$_REQUEST['student_id'].")");	
	
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
/// Edit Notice
///*******************************************************
if($_POST['type']=="editNotice")
{
	
			
		$notice = mysql_real_escape_string($_REQUEST['notice']);
	
		// Update Center Notice Tabel
		$tblname="center_notice";		
		$tblfield=array('Notice','Student_Id');		
		$tblvalues=array($notice, $_POST['student_id']);
		
		$condition="Notice_Id=".$_POST['notice_id'];
		$res=$db->updateValue($tblname,$tblfield,$tblvalues,$condition);
		
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
/// Delete row from ho_notice table
///*******************************************************
if($_POST['type']=="delete")
{
	
	 $tblname="ho_notice";
	 $condition="Notice_Id=".$_POST['id'];
	 $res=$db->deleteRecords($tblname,$condition);
	 
}


?>