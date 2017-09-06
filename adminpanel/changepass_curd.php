<?php 
include('../config.php'); 
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
require_once(PATH_LIBRARIES.'/classes/resize.php');
$db = new DBConn();


if($_POST['type']=="update")
{
	
	$res=mysql_query("Update admin_login set Login_Pwd='".$_POST['pass']."' Where Login_Id=1");
	if(!$res)
	{
		echo 0;
	}
	else
	{
		echo 1;
	}
}
?>