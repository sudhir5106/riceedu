<?php 
include('../../config.php'); 
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
$db = new DBConn();

///*******************************************************
/// To Insert New Jobroll /////////////////////////////////
///*******************************************************
if($_POST['type']=="addNews")
{
	$con= mysql_connect(SERVER,DBUSER,DBPASSWORD);
	mysql_query('SET AUTOCOMMIT=0',$con);
	mysql_query('START TRANSACTION',$con);
	
	try
	{	
		$tablename = "news";		
		$tblfield=array('News_Content', 'News_Date_Time');		
		$tblvalues=array($_POST['news'], Date('Y-m-d H:i:s'));
		
		$res=$db->valInsert($tablename,$tblfield,$tblvalues);
		
		if(!$res)
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
/// Edit Center
///*******************************************************
if($_POST['type']=="editNews")
{
	$tblname="news";	
	$tblfield=array('News_Content');
	$tblvalues=array($_POST['newsContent']);
	
	$condition="News_Id=".$_POST['newsId'];
	$res=$db->updateValue($tblname,$tblfield,$tblvalues,$condition);
	
	if (empty($res))
	{
		echo 1;
	}
	else
	{
		echo 0;
	}
}

///*******************************************************
/// Delete row from franchise_master table
///*******************************************************
if($_POST['type']=="delete")
{
	 $tblname="news";
	 $condition="News_Id=".$_POST['news_id'];
	 $res=$db->deleteRecords($tblname,$condition);
}


?>