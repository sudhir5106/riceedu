<?php 
include('config.php'); 
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
$db = new DBConn();

//$sql="SELECT Center_Id,Center_Code,Primary_Person_Email,Password FROM franchise_master WHERE Primary_Person_Email='".$_POST['user']."'";

$sql="SELECT Center_Id, Center_Code, Primary_Person_Email, Password FROM franchise_master WHERE Center_Code=".$_POST['fcode'];
$res=$db->ExecuteQuery($sql);

if (!empty($res))
{
	if($res[1]['Center_Code']== $_POST['fcode'])
	{
		if($res[1]['Primary_Person_Email']== $_POST['user'])
		{
			if($res[1]['Password']== $_POST['password'])
			{
				$_SESSION['center']=$res[1]['Center_Id'];
			
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
	}
}
else
{
  echo "false";
}
?>