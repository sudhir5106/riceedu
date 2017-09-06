<?php 
include('../../../config.php'); 
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
require_once(PATH_LIBRARIES.'/classes/resize.php');
$db = new DBConn();

///*******************************************************
/// Validate that the data already exist or not
///*******************************************************

if($_POST['type']=="CourseNameExist")
{

	$sql="SELECT Course_Name FROM course_master WHERE Course_Name='".$_POST['course_name']."'";
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

if($_POST['type']=="EditCourseNameExist")
{

	$sql="SELECT Course_Name FROM course_master WHERE Course_Name='".$_POST['course_name']."' and Course_Id<>".$_REQUEST['id'];
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
/// To Insert New Course /////////////////////////////////
///*******************************************************
if($_POST['type']=="addCourse")
{		
	$tblfield=array('Course_Name','Learning_Fee','Registration_Fee','Exam_Fee');
	$tblvalues=array($_POST['course_name'], $_POST['learning_fee'], $_POST['registration_fee'], $_POST['exam_fee']);
	$res=$db->valInsert("course_master",$tblfield,$tblvalues);
	if(empty($res))
	{
		echo 0;
	}
	else
	{
		echo 1;
	}
}

///*******************************************************
/// Edit Center
///*******************************************************
if($_POST['type']=="editCourse")
{
	$tblname="course_master";
	$tblfield=array('Course_Name','Learning_Fee','Registration_Fee','Exam_Fee');
	$tblvalues=array($_POST['course_name'], $_POST['learning_fee'], $_POST['registration_fee'], $_POST['exam_fee']);
	$condition="Course_Id=".$_POST['id'];
	$res=$db->updateValue($tblname,$tblfield,$tblvalues,$condition);
	
	if (empty($res))
	{
		echo 0;
	}
	else
	{
		echo 1;
	}
}

///*******************************************************
/// Delete row from course_master table
///*******************************************************
if($_POST['type']=="delete")
{
	 
	$tblname="course_master";
	$condition="Course_Id=".$_POST['course_id'];
	$res=$db->deleteRecords($tblname,$condition);
	
}

///*******************************************************
/// Search Course Name wise
///*******************************************************
if($_POST['type']=="searchByCourseName")
{
	
	$res=$db->ExecuteQuery("SELECT * FROM course_master WHERE Course_Name='".$_POST['course_name']."'");	
	
	echo "<table class='table table-hover table-bordered'>
          <thead>
            <tr class='success'>
              <th>Sno.</th>
              <th>Course Name</th>
              <th>Learning Fees</th>
              <th>Registration Fees</th>
              <th>Exam Fees</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>";
	$i=1;
	
	if(!empty($res)){
		foreach($res as $val){
			echo "<tr><td>".$i."</td><td>".$val['Course_Name']."</td><td>".$val['Learning_Fee']."</td><td>".$val['Registration_Fee']."</td><td>".$val['Exam_Fee']."</td>
			
			<td><a id='editbtn' class='btn btn-success btn-sm' href='edit_course.php?id='".$val['Course_Id']."'><span class='glyphicon glyphicon-edit'></span> Edit </a>
					<button type='button' class='btn btn-danger btn-sm delete' id='".$val['Course_Id']."' name='delete'> <span class='glyphicon glyphicon-trash'></span> Delete </button></td>
			
			</tr>";
				
			$i++;
		
		}
			
	}
	else{
		echo "<tr><td colspan='6' align='center'>Data Not Found</td></tr>	";
	}
	
	echo "</tbody></table>";
	
}


?>