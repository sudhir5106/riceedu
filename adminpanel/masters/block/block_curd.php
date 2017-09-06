<?php 
include('../../../config.php'); 
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
$db = new DBConn();

///*******************************************************
/// Validate that the data already exist or not
///*******************************************************
if($_POST['type']=="BlockExist")
{

	$sql="SELECT Block_Name FROM block_master WHERE Block_Name='".$_POST['blockName']."' AND District_Id=".$_POST['district'];
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
/// Validate that the data already exist or not
///*******************************************************
if($_POST['type']=="BlockEditExist")
{

	$sql="SELECT Block_Name FROM block_master WHERE Block_Id<>".$_POST['blockId']." AND Block_Name='".$_POST['blockName']."' AND District_Id=".$_POST['district'];
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
/// To get all disrticts state wise //////////////////////
///*******************************************************
if($_POST['type']=="getDistricts")
{
	$sql="SELECT District_Id, District_Name FROM district_master WHERE State_Id=".$_POST['state']." ORDER BY District_Name ASC";
	$getDistricts=$db->ExecuteQuery($sql);
		
	if(empty($getDistricts))
    {
 		echo 0;
    }
	else
	{ ?>
		
        <select name="district" id="district" class="form-control input-sm" >
          <option value="">-- Select --</option>
          <?php foreach($getDistricts as $getDistrictsVal){ ?>
          <option value="<?php echo $getDistrictsVal['District_Id']; ?>"><?php echo $getDistrictsVal['District_Name']; ?></option>
          <?php } ?>
        </select>
		
<?php }
}

///*******************************************************
/// To Insert New District ///////////////////////////////
///*******************************************************
if($_POST['type']=="addBlock")
{
	$con= mysql_connect(SERVER,DBUSER,DBPASSWORD);
	mysql_query('SET AUTOCOMMIT=0',$con);
	mysql_query('START TRANSACTION',$con);
	
	try
	{	
		$tablename = "block_master";		
		$tblfield=array('Block_Name', 'District_Id');		
		$tblvalues=array($_POST['blockName'], $_POST['district']);
		
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
if($_POST['type']=="editBlock")
{
	$tblname="block_master";	
	$tblfield=array('Block_Name', 'District_Id');
	$tblvalues=array($_POST['blockName'], $_POST['district']);
	
	$condition="Block_Id=".$_POST['blockId'];
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
if($_POST['type']=="searchByDistrict")
{
	
	$res=$db->ExecuteQuery("SELECT b.Block_Id, b.Block_Name, dm.District_Name, s.State_Name 
	FROM block_master b
	
	LEFT JOIN district_master dm ON b.District_Id = dm.District_Id
	LEFT JOIN state_master s ON dm.State_Id = s.State_Id
	WHERE dm.District_Id=".$_POST['district']);
	
	
	echo "<table class='table table-hover table-bordered'>
          <thead>
            <tr class='success'>
              <th>Sno.</th>
              <th>Block Name</th>
              <th>District</th>
              <th>State</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>";
	$i=1;
	foreach($res as $val){
		echo "<tr><td>".$i."</td><td>".$val['Block_Name']."</td><td>".$val['District_Name']."</td><td>".$val['State_Name']."</td>
		
		<td><a id='editbtn' class='btn btn-success btn-sm' href='edit_block.php?id='".$val['Block_Id']."'><span class='glyphicon glyphicon-edit'></span> Edit </a>
                <button type='button' class='btn btn-danger btn-sm delete' id='".$val['Block_Id']."' name='delete'> <span class='glyphicon glyphicon-trash'></span> Delete </button></td>
		
		</tr>";
			
		$i++;
		
	}
	
	echo "</tbody></table>";
}


///*******************************************************
/// Delete row from franchise_master table
///*******************************************************
if($_POST['type']=="delete")
{
	 $tblname="block_master";
	 $condition="Block_Id=".$_POST['block_id'];
	 $res=$db->deleteRecords($tblname,$condition);
}


?>