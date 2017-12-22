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
/// Edit  Student List ///*******************************************************
if($_POST['type']=="editStudent")
{
	
	
	/////////////////////////////////
	// Code for student photo
	/////////////////////////////////
		
	
	 $name = $_FILES['file']['name'];
	 $signname = $_FILES['student_sign']['name'];
	 $signname2 = $_FILES['guardian_sign']['name'];
	if($name!="")
	{
	$path = ROOT."/data_images/student/";
	$path1 = ROOT."/data_images/student/thumb/";	
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
							
							//////////////////////////////////////////////////////////////////////
							// move the image in the data_images/student/student-sign/thumb folder
							//////////////////////////////////////////////////////////////////////
									
						}
	
	}
	if($name=="")
	{
		$actual_image_name=$_REQUEST['student_photo'];
	}
	
	/////////////////////////////////
	// Code for student signature
	/////////////////////////////////
	
	if($signname!="")
	{
		
		$student_sign = ROOT."/data_images/student/student-sign/";
	   $student_sign_thumb = ROOT."/data_images/student/student-sign/thumb/";	
	
	
	  $signimage=explode('.',$signname);
	 $signimage_name = time().'.'.$signimage[1]; // rename the file name
	 $tmp2 = $_FILES['student_sign']['tmp_name'];
	
					if(move_uploaded_file($tmp2, $student_sign.$signimage_name))
					{
						//////////////////////////////////////////////////////////////////////
						// move the image in the data_images/student/student-sign/thumb folder
						//////////////////////////////////////////////////////////////////////
						$resizeObj1 = new resize($student_sign.$signimage_name);
						$resizeObj1 -> resizeImage(200, 200, 'auto');
						$resizeObj1 -> saveImage($student_sign_thumb.$signimage_name, 100);
					
							
					}
	}
	if($signname=="")
	{
		
		$signimage_name=$_REQUEST['student_signature'];
	}
	if($signname2=="")
	{
		$gaurdiansignimage_name=$_REQUEST['gurdian_signature'];
	}
	if($signname2!="")
	{   /////////////////////////////////
	// Code for gaurdian signature
	/////////////////////////////////
	$gaurdian_sign = ROOT."/data_images/student/gaurdian-sign/";
	$gaurdian_sign_thumb = ROOT."/data_images/student/gaurdian-sign/thumb/";	
	
	$signname2 = $_FILES['guardian_sign']['name'];
	$signimage2=explode('.',$signname2);
	$gaurdiansignimage_name = time().'.'.$signimage2[1]; // rename the file name
	$tmp3 = $_FILES['guardian_sign']['tmp_name'];
		
					if(move_uploaded_file($tmp3, $gaurdian_sign.$gaurdiansignimage_name))
					{
				
						 //////////////////////////////////////////////////////////////////////
					// move the image in the data_images/student/gaurdian-sign/thumb folder
					//////////////////////////////////////////////////////////////////////
					$resizeObj1 = new resize($gaurdian_sign.$gaurdiansignimage_name);
					$resizeObj1 -> resizeImage(200, 200, 'auto');
					$resizeObj1 -> saveImage($gaurdian_sign_thumb.$gaurdiansignimage_name, 100);
				
					}
	}
	
		
		
		
		
		
	
	
	
	
	
	
	
	
	
	
	
	
	// Update Employee Master Tabel
	$tblname="student_master";
	$dob=date('Y-m-d',strtotime($_POST['dob']));
	$tblfield=array('Student_Name','DOB','Gender','Father_Name','Mother_Name','Religion',
	'Caste','Phisical_Status','Aadhaar_No','Education','Course_Id','Mode','Session','About_Fee_Deposite','Block_Id',
	 'Address','Pincode', 'Contact_No','Email','Bank_Name','Account_No','Bank_Address','IFSC_Code',
	 'Photo','Signature','Gaurdian_Signature','Reference','Acc_holder_name');			
				
	$tblvalues=array($_REQUEST['student_name'],$dob,$_REQUEST['gender'],$_REQUEST['father_name'],$_REQUEST['mother_name'],$_REQUEST['religion'],$_REQUEST['caste']
	,$_REQUEST['physical_status'],$_REQUEST['aadhaar_no'],$_REQUEST['education'],$_REQUEST['course'],$_REQUEST['mode'],$_REQUEST['session'],$_REQUEST['fee_deposit_detail']
	,$_REQUEST['block'],$_REQUEST['address'],$_REQUEST['pincode'],$_REQUEST['contact_no'],$_REQUEST['email'],$_REQUEST['bank_name'],$_REQUEST['account_no']
	,$_REQUEST['bank_address'],$_REQUEST['ifsc_code'],$actual_image_name,$signimage_name,$gaurdiansignimage_name,$_REQUEST['reference'],$_REQUEST['ac_holder_name']);
	
	$condition="Student_Id=".$_POST['student_id'];
	$res=$db->updateValue($tblname,$tblfield,$tblvalues,$condition);
	echo "1";
	
	
}
?>