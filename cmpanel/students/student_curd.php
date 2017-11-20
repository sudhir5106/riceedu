<?php 
include('../../config.php'); 
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
require_once(PATH_LIBRARIES.'/classes/resize.php');
$db = new DBConn();

///*******************************************************
/// Get District name /////////////////////////////////
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
/// Generate Alpha Numeric password //////////////////////
///*******************************************************

function generatePassword($length) {
    $password='';
	$pool = array_merge(range(0,9), range('a', 'z'),range('A', 'Z'));

    for($i=0; $i < $length; $i++) {
        $password .= $pool[mt_rand(0, count($pool) - 1)];
    }
    return $password;
}

///*******************************************************
/// To Insert New Branch /////////////////////////////////
///*******************************************************
if($_POST['type']=="addStudent")
{
	
	/////////////////////////////////
	// Code for student photo
	/////////////////////////////////
	$path = ROOT."/data_images/student/";
	$path1 = ROOT."/data_images/student/thumb/";	
	
	$name = $_FILES['file']['name'];
	$image=explode('.',$name);
	$actual_image_name = time().'.'.$image[1]; // rename the file name
	$tmp = $_FILES['file']['tmp_name'];
	
	
	/////////////////////////////////
	// Code for student signature
	/////////////////////////////////
	$student_sign = ROOT."/data_images/student/student-sign/";
	$student_sign_thumb = ROOT."/data_images/student/student-sign/thumb/";	
	
	$signname = $_FILES['student_sign']['name'];
	$signimage=explode('.',$signname);
	$signimage_name = time().'.'.$signimage[1]; // rename the file name
	$tmp2 = $_FILES['student_sign']['tmp_name'];
	
	
	/////////////////////////////////
	// Code for gaurdian signature
	/////////////////////////////////
	$gaurdian_sign = ROOT."/data_images/student/gaurdian-sign/";
	$gaurdian_sign_thumb = ROOT."/data_images/student/gaurdian-sign/thumb/";	
	
	$signname2 = $_FILES['guardian_sign']['name'];
	$signimage2=explode('.',$signname2);
	$gaurdiansignimage_name = time().'.'.$signimage2[1]; // rename the file name
	$tmp3 = $_FILES['guardian_sign']['tmp_name'];
	
	
	if(move_uploaded_file($tmp, $path.$actual_image_name) && move_uploaded_file($tmp2, $student_sign.$signimage_name) && move_uploaded_file($tmp3, $gaurdian_sign.$gaurdiansignimage_name))
	{
		
		///////////////////////////////////////////////////////////
		// move the image in the data_images/student/thumb folder
		///////////////////////////////////////////////////////////
		$resizeObj1 = new resize($path.$actual_image_name);
		$resizeObj1 -> resizeImage(200, 200, 'auto');
		$resizeObj1 -> saveImage($path1.$actual_image_name, 100);
		
		//////////////////////////////////////////////////////////////////////
		// move the image in the data_images/student/student-sign/thumb folder
		//////////////////////////////////////////////////////////////////////
		$resizeObj1 = new resize($student_sign.$signimage_name);
		$resizeObj1 -> resizeImage(200, 200, 'auto');
		$resizeObj1 -> saveImage($student_sign_thumb.$signimage_name, 100);
		
		//////////////////////////////////////////////////////////////////////
		// move the image in the data_images/student/gaurdian-sign/thumb folder
		//////////////////////////////////////////////////////////////////////
		$resizeObj1 = new resize($gaurdian_sign.$gaurdiansignimage_name);
		$resizeObj1 -> resizeImage(200, 200, 'auto');
		$resizeObj1 -> saveImage($gaurdian_sign_thumb.$gaurdiansignimage_name, 100);
		
		/////////////////////////////////////
		// Query to get the Max Student Code
		/////////////////////////////////////
		$studentCode=$db->ExecuteQuery("SELECT Student_Code FROM student_master WHERE Student_Id= (SELECT MAX(Student_Id) FROM student_master)");
		
		// Generate Invoice No serial wise
		if(!empty($studentCode[1]['Student_Code'])){
			
			$NewStudentCode = $studentCode[1]['Student_Code'] + 1;
		}
		else{
			$NewStudentCode = 4376;	
		}
		
		/////////////////////////////////////
		// Query to get the Max Application_No
		/////////////////////////////////////
		$maxApplicationNo=$db->ExecuteQuery("SELECT MAX(Application_No) AS Application_No FROM student_master");
		
		// Generate Application_No serial wise
		if(!empty($maxApplicationNo[1]['Application_No'])){
			
			$NewApplication_No = sprintf( '%03d', ($maxApplicationNo[1]['Application_No'] + 1));
		}
		else{
			$NewApplication_No = sprintf( '%03d', 1);	
		}
		
		/////////////////////////////////////
		// Query to Generate student password
		/////////////////////////////////////
		$password = generatePassword(6);
		
		
		/////////////////////////////////////
		// Query to convert date format 
		/////////////////////////////////////
		$dob=date('Y-m-d',strtotime($_POST['dob']));
		
		
		/////////////////////////////////////////////////////
		// Query to insert the data into student_master table
		/////////////////////////////////////////////////////
		$res=mysql_query("INSERT INTO student_master (Reg_Date, Application_No, Student_Code, Password, Student_Name, DOB, Gender, Father_Name, Mother_Name, Religion, Caste, Phisical_Status, Aadhaar_No, Education, Course_Id, Mode, Session, About_Fee_Deposite, Block_Id, Address, Pincode, Contact_No, Email, Bank_Name, Account_No, Bank_Address, IFSC_Code, Photo, Signature, Gaurdian_Signature, CM_Id, Reference, Approval_Status,Acc_holder_name) 			
			
		VALUES (NOW(), ".$NewApplication_No.", ".$NewStudentCode.", '".$password."', '".$_REQUEST['student_name']."', '".$dob."', ".$_REQUEST['gender'].", '".$_REQUEST['father_name']."', '".$_REQUEST['mother_name']."', '".$_REQUEST['religion']."', '".$_REQUEST['caste']."', ".$_REQUEST['physical_status'].", '".$_REQUEST['aadhaar_no']."', '".$_REQUEST['education']."', ".$_REQUEST['course'].", '".$_REQUEST['mode']."', '".$_REQUEST['session']."', '".$_REQUEST['fee_deposit_detail']."', ".$_REQUEST['block'].", '".$_REQUEST['address']."', '".$_REQUEST['pincode']."', '".$_REQUEST['contact_no']."', '".$_REQUEST['email']."', '".$_REQUEST['bank_name']."', '".$_REQUEST['account_no']."', '".$_REQUEST['bank_address']."', '".$_REQUEST['ifsc_code']."', '".$actual_image_name."', '".$signimage_name."', '".$gaurdiansignimage_name."', ".$_SESSION['cmid'].", '".$_REQUEST['reference']."', 0,'".$_REQUEST['ac_holder_name']."')");
		
		
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