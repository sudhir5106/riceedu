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
if($_POST['type']=="findrmform")
{ 

if($_POST['dm_code']=" ")  
{
	$sql_sm=$db->ExecuteQuery("select R_Emp_Code from rm_login where R_Id='".$_SESSION['rmid']."'");
  
  $getdetails=$db->ExecuteQuery("select DM_Emp_Code from dm_login where R_Emp_Code='".$sql_sm[1]['R_Emp_Code']."'");
 } 
else
{
  echo "dm code".$_POST['dm_code'];
$getdetails=$db->ExecuteQuery("select DM_Emp_Code from dm_login where DM_Emp_Code='".$_POST['dm_code']."'");

}


?>

 <table class="table table-striped table-hover jambo_table">
            <thead>
                <tr class="headings">
                	<td>District Manager Code</td>
                  </tr>
            </thead>
              
<?php
             foreach($getdetails as $result)
             {?>
             	
                    <tr class="">
               	<td><a href="cm_panel_list.php?c_id=<?php echo $result['DM_Emp_Code']; ?>"><?php echo $result['DM_Emp_Code']; ?></a></td>
                	 </tr>

          <?php 
            }
}

////////get cm panel list//

/////////////////////////////





///*******************************************************
/// Get center code  /////////////////////////////////
///*******************************************************
if($_POST['type']=="InvalidCenterCode")
{    //$sql_dm=$db->ExecuteQuery("select DM_Emp_Code from dm_login where DM_Id='".$_SESSION['dmid']."'");
	
	$sql=$db->ExecuteQuery("SELECT EXISTS( SELECT 1 FROM cm_login WHERE Center_Code='".$_POST['center_Code']."') AS 'Find'");
	
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
                	<td>Center Code</td>
                	       </tr>
            </thead>
              <tr class="">
                	<td><?php echo $sql[1]['Center_Code']; ?></td>
               </tr>


      <?php
	 }

}	 

//////for all search//////
if($_POST['type']=="all")
{   $sql=$db->ExecuteQuery("SELECT Center_Code FROM cm_login ");
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
                	<td><?php echo $result['Center_Code']; ?></td>
               </tr>

      	<?php
      }
	 

}	 

//////////////


if($_POST['type']=="findstudentfrm")
{   
   
  
   if($_POST['student_code']!=" ")
   {
   $getdetails=$db->ExecuteQuery("select student_master.Student_Name,student_master.Student_Code,course_master.Course_Name,course_master.Registration_Fee,(select Center_Code from cm_login where CM_Id=student_master.CM_Id)as Center_code from student_master left join course_master on course_master.Course_Id=student_master.Course_Id where student_master.Student_Code='".$_POST['student_code']."'");
  }
  else
  {
    $sql_dm=$db->ExecuteQuery("select CM_Id from cm_login where Center_Code='".$_POST['c_id']."'");

    $getdetails=$db->ExecuteQuery("select student_master.Student_Name,student_master.Student_Code,course_master.Course_Name,course_master.Registration_Fee,(select Center_Code from cm_login where CM_Id=student_master.CM_Id) as Center_code from student_master left join course_master on course_master.Course_Id=student_master.Course_Id right join cm_login on cm_login.CM_Id=student_master.CM_Id where 
    cm_login.CM_Id='".$sql_dm[1]['CM_Id']."'");
  
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


///////////////////////for dm code valid or not check//////////////////////////

///*******************************************************
if($_POST['type']=="InvalidDMCode")
{    //$sql_dm=$db->ExecuteQuery("select DM_Emp_Code from dm_login where DM_Id='".$_SESSION['dmid']."'");
  
 $sql=$db->ExecuteQuery("SELECT EXISTS( SELECT 1 FROM dm_login WHERE DM_Emp_Code='".$_POST['dm_code']."') AS 'Find'");
  
  echo $sql[1]['Find'];   
}



///////////////////////End for rm code valid or not check//////////////////////////



?>