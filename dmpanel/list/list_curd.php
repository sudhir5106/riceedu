<?php 
include('../../config.php'); 
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
require_once(PATH_LIBRARIES.'/classes/resize.php');

$db = new DBConn();


///*******************************************************
/// for Student invalid ///////////////////////////////////
///*******************************************************
if($_POST['type']=="InvalidstudentCode")
{
	
	$sql=$db->ExecuteQuery("SELECT EXISTS( SELECT 1 FROM student_master WHERE Student_Code='".$_POST['student_code']."') AS 'Find'");
	
	echo $sql[1]['Find'];	  
}
if($_POST['type']=="findstudentfrm")
{   
	 $sql_dm=$db->ExecuteQuery("select DM_Emp_Code from dm_login where DM_Id='".$_SESSION['dmid']."'");
   if($_POST['student_code']!=" ")
   {
   $getdetails=$db->ExecuteQuery("select student_master.Student_Name,student_master.Student_Code,course_master.Course_Name,course_master.Registration_Fee,(select Center_Code from cm_login where CM_Id=student_master.CM_Id)as Center_code from student_master left join course_master on course_master.Course_Id=student_master.Course_Id where student_master.Student_Code='".$_POST['student_code']."'");
  }
  else
  {
  	
  	$getdetails=$db->ExecuteQuery("select student_master.Student_Name,student_master.Student_Code,course_master.Course_Name,course_master.Registration_Fee,(select Center_Code from cm_login where CM_Id=student_master.CM_Id) as Center_code from student_master left join course_master on course_master.Course_Id=student_master.Course_Id right join cm_login on cm_login.CM_Id=student_master.CM_Id where 
  	cm_login.DM_Emp_Code='".$sql_dm[1]['DM_Emp_Code']."' and cm_login.Center_code='".$_POST['c_id']."'");
  
  }



?>

 <table class="table table-striped table-hover jambo_table">
            <thead>
                <tr class="headings">
                	<td>Name</td>
                	<td>Student Code</td>
                	<td>Center Code</td>
                	<td>Course Name</td>
                	<td>Regestration Fee</td>
                </tr>
            </thead>
              
<?php
             foreach($getdetails as $result)
             {?>
             	
                   <tr class="">
                	<td><?php echo $result['Student_Name']; ?></td>
                	<td><?php echo $result['Student_Code']; ?></td>
                	<td><?php echo $result['Center_code']; ?></td>
                	<td><?php echo $result['Course_Name']; ?></td>
                	<td><?php echo $result['Registration_Fee']; ?></td>
               </tr>

          <?php 
            }
}







///*******************************************************
/// Get center code  /////////////////////////////////
///*******************************************************
if($_POST['type']=="InvalidCenterCode")
{    $sql_dm=$db->ExecuteQuery("select DM_Emp_Code from dm_login where DM_Id='".$_SESSION['dmid']."'");
	
	$sql=$db->ExecuteQuery("SELECT EXISTS( SELECT 1 FROM cm_login WHERE Center_Code='".$_POST['center_Code']."' AND DM_Emp_Code='".
	$sql_dm[1]['DM_Emp_Code']."' ) AS 'Find'");
	
	echo $sql[1]['Find'];	  
}
if($_POST['type']=="findcmFrm")
{
	 if(!empty($_POST['center_Code']))
	 {
      
      $sql=$db->ExecuteQuery("SELECT Center_Code FROM cm_login WHERE Center_Code='".$_POST['center_Code']."'");
      ?>
         <table class="table table-striped table-hover jambo_table">
            <thead>
                <tr class="headings">
                	<td>Name</td>
                	       </tr>
            </thead>
              <tr class="">
                	<td><a href="student_list.php?c_id=<?php echo $sql[1]['Center_Code']; ?>"><?php echo $sql[1]['Center_Code']; ?></a></td>
               </tr>


      <?php
	 }

}	 

//////for all search//////
if($_POST['type']=="all")
{ 
 $sql_dm=$db->ExecuteQuery("select DM_Emp_Code from dm_login where DM_Id='".$_SESSION['dmid']."'");

  $sql=$db->ExecuteQuery("SELECT Center_Code FROM cm_login where DM_Emp_Code  ='".$sql_dm[1]['DM_Emp_Code']."'");

   ?>
         <table class="table table-striped table-hover jambo_table">
            <thead>
                <tr class="headings">
                	<td>Name</td>
                </tr>
            </thead>
             

      <?php
      foreach($sql as $result)
      {    	
      	?>
      	 <tr class="">
                	<td><a href="student_list.php?c_id=<?php echo $sql[1]['Center_Code']; ?>"><?php echo $result['Center_Code']; ?></a></td>
               </tr>

      	<?php
      }
	 

}	 

//////////////
?>