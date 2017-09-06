<?php 
include('../../../config.php'); 
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
$db = new DBConn();

///*******************************************************
/// Validate that the data already exist or not
///*******************************************************
if($_POST['type']=="validate")
{

	$sql="SELECT District_Name FROM district_master WHERE District_Name='".$_POST['district_name']."'";
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
/// To Insert New Jobroll /////////////////////////////////
///*******************************************************
if($_POST['type']=="addDistrict")
{
	$con= mysql_connect(SERVER,DBUSER,DBPASSWORD);
	mysql_query('SET AUTOCOMMIT=0',$con);
	mysql_query('START TRANSACTION',$con);
	
	try
	{	
		$tablename = "district_master";		
		$tblfield=array('State_Id', 'District_Name');		
		$tblvalues=array($_POST['state'], $_POST['district_name']);
		
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
if($_POST['type']=="editDistrict")
{
	$tblname="district_master";	
	$tblfield=array('District_Name', 'State_Id');
	$tblvalues=array($_POST['district_name'], $_POST['state']);
	
	$condition="District_Id=".$_POST['district_id'];
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
/// Search Districts state wise
///*******************************************************
if($_POST['type']=="searchByState")
{
	$res=$db->ExecuteQuery("SELECT dm.District_Id, dm.District_Name, s.State_Name FROM district_master dm

LEFT JOIN state_master s ON dm.State_Id = s.State_Id
WHERE dm.State_Id=".$_POST['stateId']);
	
	echo "<table class='table table-hover table-bordered' id='addedProducts'>
          <thead>
            <tr class='success'>
              <th>Sno.</th>
              <th>District Name</th>
              <th>State Name</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>";
	$i=1;
	foreach($res as $val){
		echo "<tr><td>".$i."</td><td>".$val['District_Name']."</td><td>".$val['State_Name']."</td>
		
		<td><button type='button' id='editbtn' class='btn btn-success btn-sm' onClick='window.location.href=edit_district.php?id=".$val['District_Id']."'> <span class='glyphicon glyphicon-edit'></span> Edit </button>
            <button type='button' class='btn btn-danger btn-sm delete' id='".$val['District_Id']."' name='delete'> <span class='glyphicon glyphicon-trash'></span> Delete </button></td></tr>";
			
			$i++;
		
	}
	
	echo "</tbody></table>";
}


///*******************************************************
/// Delete row from franchise_master table
///*******************************************************
if($_POST['type']=="delete")
{
	 $tblname="district_master";
	 $condition="District_Id=".$_POST['district_id'];
	 $res=$db->deleteRecords($tblname,$condition);
}


?>