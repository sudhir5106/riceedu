<?php 
include('../../../config.php'); 
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
require_once(PATH_LIBRARIES.'/classes/resize.php');
$db = new DBConn();

///*******************************************************
/// Validate that the data already exist or not
///*******************************************************
if($_POST['type']=="validate")
{

	$sql="SELECT Center_Name FROM franchise_master WHERE Center_Name='".$_POST['center_name']."'";
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

///*******************************************************
/// To Insert New Branch /////////////////////////////////
///*******************************************************
if($_POST['type']=="addEmployee")
{
	
	/////////////////////////////////
	// Code for student photo
	/////////////////////////////////
	$path = ROOT."/data_images/employee/";
	$path1 = ROOT."/data_images/employee/thumb/";
	
	
	$name = $_FILES['file']['name'];
	$image=explode('.',$name);
	$actual_image_name = time().'.'.$image[1]; // rename the file name
	$tmp = $_FILES['file']['tmp_name'];
	
	
    
	/////////////////////////////////
	// Code for employee  photo
	/////////////////////////////////
	$path_sign = ROOT."/data_images/employee/signature";
	$path_sign1 = ROOT."/data_images/employee/signature/thumb/";
	
	
	$name_sign = $_FILES['file_sign']['name'];
	$image_sign=explode('.',$name_sign);
	$actual_image_name_sign = time().'.'.$image[1]; // rename the file name
	$tmp_sign = $_FILES['file_sign']['tmp_name'];
	









	if(move_uploaded_file($tmp, $path.$actual_image_name) &&  move_uploaded_file($tmp_sign, $path_sign.$actual_image_name_sign))
	{
		
		///////////////////////////////////////////////////////////
		// move the image in the data_images/addmision thumb folder
		///////////////////////////////////////////////////////////
		$resizeObj1 = new resize($path.$actual_image_name);
		$resizeObj1 -> resizeImage(200, 200, 'auto');
		$resizeObj1 -> saveImage($path1.$actual_image_name, 100);
		


    ///////////////////////////////////////////////////////////
		// move the image in the data_images/addmision thumb folder
		///////////////////////////////////////////////////////////
		$resizeObj1 = new resize($path_sign.$actual_image_name_sign);
		$resizeObj1 -> resizeImage(200, 200, 'auto');
		$resizeObj1 -> saveImage($path_sign1.$actual_image_name_sign, 100);




		$res=mysql_query("INSERT INTO employee_master (DOJ, EMP_Code, EMP_Name, EMP_Designation, EMP_Image, State_Id, District_Id, Block_Id, EMP_Address, EMP_Contact, EMP_Email, EMP_Salary, Posting_Place, Duty_Time, Visiting_Date_Place,emp_sign) 			
			
		VALUES (NOW(), '".$_REQUEST['emp_code']."', '".$_REQUEST['emp_name']."', '".$_REQUEST['designation']."', '".$actual_image_name."', ".$_REQUEST['state'].", ".$_REQUEST['district'].", ".$_REQUEST['block'].", '".$_REQUEST['address']."', '".$_REQUEST['contact_no']."', '".$_REQUEST['email']."', '".$_REQUEST['salary']."', '".$_REQUEST['posting_place']."', '".$_REQUEST['duty_time']."', '".$_REQUEST['Visiting_Date_Place']."','".$actual_image_name_sign."')");
		
		
		if(!$res)
		{
		  echo 0;
		}
		 else
		{	
		  echo 1;
		}
		
	}
	else
	echo "failed";
}

///*******************************************************
/// Edit Center
///*******************************************************
if($_POST['type']=="editEmployee")
{
	
	/////////////////////////////////
	// Code for student photo
	/////////////////////////////////
	$path = ROOT."/data_images/employee/";
	$path1 = ROOT."/data_images/employee/thumb/";

	
	$con= mysql_connect(SERVER,DBUSER,DBPASSWORD);
	mysql_query('SET AUTOCOMMIT=0',$con);
	mysql_query('START TRANSACTION',$con);
	
	try
	{
	
		//Upload Here Employee Image	
		if($_REQUEST['imageval']==1)
		{
			$gallary = $_FILES['emp_image']['name'];		
			$tmp2 = $_FILES['emp_image']['tmp_name'];
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
			  $remove=$db->ExecuteQuery("SELECT EMP_Image FROM employee_master WHERE EMP_Id=".$_REQUEST['emp_id']);
			  if(count($remove)>0 )
			  {
				  if(file_exists($path.$remove[1]['EMP_Image']) && $remove[1]['EMP_Image']!='')
				  {
						unlink($path.$remove[1]['EMP_Image']);
						unlink($path1.$remove[1]['EMP_Image']);
				  }
			  }
		}
		else
		{
			//if Image Is Empty Than
			$gallary_image = $_REQUEST['emp-img'];
		}
	
	
	// Update Employee Master Tabel
	$tblname="employee_master";
	
	$tblfield=array('EMP_Code','EMP_Name','EMP_Designation','EMP_Image','State_Id','District_Id','Block_Id','EMP_Address', 'EMP_Contact', 'EMP_Email', 'EMP_Salary', 'Posting_Place', 'Duty_Time', 'Visiting_Date_Place');
	
	$tblvalues=array($_POST['emp_code'], $_POST['emp_name'], $_POST['designation'], $gallary_image, $_POST['state'], $_POST['district'], $_POST['block'], $_POST['address'], $_POST['contact_no'], $_POST['email'], $_POST['salary'], $_POST['posting_place'], $_POST['duty_time'], $_POST['Visiting_Date_Place']);
	
	$condition="EMP_Id=".$_POST['emp_id'];
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
	/////////////////////////////////
	// Code for student photo
	/////////////////////////////////
	$path = ROOT."/data_images/employee/";
	$path1 = ROOT."/data_images/employee/thumb/";
	
	 $tblname="employee_master";
	 $condition="EMP_Id=".$_POST['emp_id'];
	 $res=$db->deleteRecords($tblname,$condition);
	 
	 unlink($path.$remove[1]['EMP_Image']);
	 unlink($path1.$remove[1]['EMP_Image']);
}


?>