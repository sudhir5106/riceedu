<?php 
include('../config.php'); 
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
$db = new DBConn();

$table = "admin_login";
$usrfield = "Login_Name";
$usrpassfield = "Login_Pwd";

$result = $db->checkLogin($table,$usrfield,$_POST['user'],$usrpassfield,$_POST['password']);

if(!empty($result)){
	
	$tblname="admin_login";
	$tblfield=array('Login_Ip','Last_Login_Date');
	$tblvalues=array($_SERVER["REMOTE_ADDR"],date('Y-m-d H:i:s'));
	$condition="Login_Id=".$result[1]['Login_Id'];
	$re=$db->updateValue($tblname,$tblfield,$tblvalues,$condition);
	
	$_SESSION['Login_Id']=$result[1]['Login_Id'];
	
	echo "true";
}
else{
	echo "false";
}

/*

$sql="SELECT Login_Id,Login_Name,Login_Pwd FROM admin_login WHERE Login_Name='".$_POST['user']."'";
$res=$db->ExecuteQuery($sql);
if (!empty($res))
{
	if($res[1]['Login_Name']== $_POST['user'])
	{
		
		if($res[1]['Login_Pwd']== $_POST['password'])
		{
			$tblname="admin_login";
			$tblfield=array('Login_Ip','Last_Login_Date');
			$tblvalues=array($_SERVER["REMOTE_ADDR"],date('Y-m-d H:i:s'));
			$condition="Login_Id=".$res[1]['Login_Id'];
			$re=$db->updateValue($tblname,$tblfield,$tblvalues,$condition);
			
			$_SESSION['Login_Id']=$res[1]['Login_Id'];
		
			echo "true";
		
		}
		else
		{
			
			echo "false";
			}
	}
	else
	{
	echo "false";
		}
	
}
  else
  {
      echo "false";
  }*/
?>