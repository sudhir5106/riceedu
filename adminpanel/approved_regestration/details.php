<?php
include('../../config.php'); 
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
include(PATH_ADMIN_INCLUDE.'/header.php');
$db = new DBConn();

// get all list of news

$getList=
$db->ExecuteQuery("select a.Student_Name,a.Registration_No, b.Course_Name, b.Registration_Fee, c.Student_Id from student_master a join course_master b on a.Course_Id=b.Course_Id join sent_reg_fees_details c on a.Student_Id=c.Student_Id where c.Sent_id='".$_REQUEST['id']."'");
?>
<script type="text/javascript" src="list.js" ></script>

<div class="main">
  <div class="page-title">
        <div>
            <div class="col-lg-5 pull-left"><h4><i class="glyphicon glyphicon-plus"></i>List For  Regestration</h4></div>
            <div class="col-lg-5 pull-left"><button type="button" id="back" class="btn btn-primary" onClick="window.location.href='index.php'">   BACK </button></div>
        </div>
        <div class="clearfix">&nbsp;</div>
    </div>
  
  
  <div class="clear formbgstyle">
    
    <table class="table table-hover table-bordered" id="addedProducts">
      <thead>
        <tr class="success">
          <th>Sno.</th>
          <th>Student Name</th>
          <th>Course Name</th>
          <th>Registration_No</th> 
          <th>Registration Fee</th>
          
        </tr>
      </thead>
      <tbody>
        <?php 
            $i=1;
            foreach($getList as $getList){ ?>
        <tr>
          <td><?php echo $i;?></td>
          <td><?php echo ucfirst($getList['Student_Name']);?></td>
          <td><?php echo ucfirst($getList['Course_Name']);?></td>
          <td><?php echo $getList['Registration_No'];?></td>
          <td><?php echo $getList['Registration_Fee'];?></td>
          
           </tr>
        <?php $i++;} ?>
      </tbody>
    </table>
  </div>
</div>
