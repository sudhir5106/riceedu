<?php 
include('../../config.php'); 
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
require_once(PATH_LIBRARIES.'/classes/resize.php');
$db = new DBConn();

///*******************************************************
/// To Insert New Branch /////////////////////////////////
///*******************************************************
if($_POST['type']=="addDoc")
{
	
	/////////////////////////////////
	// Code for student Document
	/////////////////////////////////
	$path = ROOT."/documents/student-doc/";
	$path1 = ROOT."/documents/student-doc/thumb/";	
	
	$name = $_FILES['file']['name'];
	$image=explode('.',$name);
	$actual_image_name = time().'.'.$image[1]; // rename the file name
	$tmp = $_FILES['file']['tmp_name'];
	
	if(move_uploaded_file($tmp, $path.$actual_image_name))
	{
		
		///////////////////////////////////////////////////////////
		// move the image in the data_images/student/thumb folder
		///////////////////////////////////////////////////////////
		$resizeObj1 = new resize($path.$actual_image_name);
		$resizeObj1 -> resizeImage(200, 200, 'auto');
		$resizeObj1 -> saveImage($path1.$actual_image_name, 100);
		
		//insert the tender 
		$tblname="student_document";
		$tblfield=array('Doc_Name', 'Doc_File', 'Student_Id');
		$tblvalues=array($_POST['doc_name'], $actual_image_name, $_SESSION['sid']);
		$res=$db->valInsert($tblname, $tblfield, $tblvalues);
		
		if(empty($res))
		{
			echo 0;
		}
		else
		{
			echo 1;
		}
		
	}//eof if condition
	else
	echo "failed";
	
}

///*******************************************************
/// Edit Center
///*******************************************************
if($_POST['type']=="editDoc")
{
	
	/////////////////////////////////
	// Code for student Document
	/////////////////////////////////
	$path = ROOT."/documents/student-doc/";
	$path1 = ROOT."/documents/student-doc/thumb/";

	
	$con= mysql_connect(SERVER,DBUSER,DBPASSWORD);
	mysql_query('SET AUTOCOMMIT=0',$con);
	mysql_query('START TRANSACTION',$con);
	
	try
	{
	
		//Upload Here Employee Image	
		if($_REQUEST['imageval']==1)
		{
			$gallary = $_FILES['doc_image']['name'];		
			$tmp2 = $_FILES['doc_image']['tmp_name'];
			$image=explode('.',$gallary);
			$gallary_image = time().'.'.$image[1]; // rename the file name
			
			if(move_uploaded_file($tmp2, $path.$gallary_image))
			  {
				// move the image in the thumb folder
				$resizeObj1 = new resize($path.$gallary_image);
				$resizeObj1 ->resizeImage(50,50,'auto');
				$resizeObj1 -> saveImage($path1.$gallary_image, 100);				
			  }
			  
			  //Delete Old Image from folder
			  $remove=$db->ExecuteQuery("SELECT Doc_File FROM student_document WHERE Doc_Id=".$_REQUEST['doc_id']);
			  if(count($remove)>0 )
			  {
				  if(file_exists($path.$remove[1]['Doc_File']) && $remove[1]['Doc_File']!='')
				  {
						unlink($path.$remove[1]['Doc_File']);
						unlink($path1.$remove[1]['Doc_File']);
				  }
			  }
		}
		else
		{
			//if Image Is Empty Than
			$gallary_image = $_REQUEST['doc-img'];
		}
	
	
	// Update Employee Master Tabel
	$tblname="student_document";
	
	$tblfield=array('Doc_Name','Doc_File');
	
	$tblvalues=array($_POST['doc_name'], $gallary_image);
	
	$condition="Doc_Id=".$_POST['doc_id'];
	$res=$db->updateValue($tblname,$tblfield,$tblvalues,$condition);
	
	if (empty($res)) 
		{
			throw new Exception('0');
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
}


///*******************************************************
/// Delete row from franchise_master table
///*******************************************************
if($_POST['type']=="delete")
{
	
	$remove=$db->ExecuteQuery("SELECT Doc_File FROM student_document WHERE Doc_Id=".$_POST['id']);
	
	/////////////////////////////////
	// Code for student document
	/////////////////////////////////
	$path = ROOT."/documents/student-doc/";
	$path1 = ROOT."/documents/student-doc/thumb/";
	
	 $tblname="student_document";
	 $condition="Doc_Id=".$_POST['id'];
	 $res=$db->deleteRecords($tblname,$condition);
	 
	 unlink($path.$remove[1]['Doc_File']);
	 unlink($path1.$remove[1]['Doc_File']);
}


?>