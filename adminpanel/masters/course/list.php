<?php
include('../../../config.php'); 
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
include(PATH_ADMIN_INCLUDE.'/header.php');
$db = new DBConn();

// get all list of employee 
$getCourse=$db->ExecuteQuery("SELECT Course_Id, Course_Name, Application_Fee, Learning_Fee, Registration_Fee, Exam_Fee
FROM course_master
");


?>
<script type="text/javascript"  src="course.js" ></script>
<div class="main">
	<div class="page-title">
        <div>
            <div class="col-lg-5 pull-left"><h4><i class="glyphicon glyphicon-list"></i> Course List</h4></div>
            <div class="col-lg-5 pull-right">
                <div class="ef_header_tools pull-right">
                   <a class="btn btn-primary" href="index.php" title="Add Block"><i class="glyphicon glyphicon-plus"></i> Add New Course</a>
                </div>
            </div>
        </div>
        <div class="clearfix">&nbsp;</div>
    </div>
    
    <div style="background:#FCF1B1; padding:10px;">
    	<form class="form-horizontal" role="form" id="searchFrm" method="post">
        	<label class="control-label pull-left mandatory" for="course_name">Course Name <span>*</span>:</label>
            <div class="pull-left search-fields" id="districtDiv">
				<input type="text" class="form-control input-sm" id="course_name" name="course_name" placeholder="Enter Course Name"  />
            </div>
          
            <div><button type="button" class="btn btn-primary btn-sm" id="search">Search</button></div>
        </form>
    </div>
    <div id="courseList">
    	<table class="table table-hover table-bordered">
          <thead>
            <tr class="success">
              <th>Sno.</th>
              <th>Course Name</th>
              <th>Application Fees</th>
              <th>Learning Fees</th>
              <th>Registration Fees</th>
              <th>Exam Fees</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            
            if(!empty($getCourse)){
                $i=1;
                foreach($getCourse as $getCourseVal){ ?>
            <tr>
              <td><?php echo $i;?></td>
              <td><?php echo $getCourseVal['Course_Name'];?></td>
              <td><?php echo $getCourseVal['Application_Fee'];?></td>
              <td><?php echo $getCourseVal['Learning_Fee'];?></td>
              <td><?php echo $getCourseVal['Registration_Fee'];?></td>
              <td><?php echo $getCourseVal['Exam_Fee'];?></td>
                        
              <td><a id="editbtn" class="btn btn-success btn-sm" href="edit_course.php?id=<?php echo $getCourseVal['Course_Id'];?>"><span class="glyphicon glyphicon-edit"></span> Edit </a>
                <button type="button" class="btn btn-danger btn-sm delete" id="<?php echo $getCourseVal['Course_Id']; ?>" name="delete"> <span class="glyphicon glyphicon-trash"></span> Delete </button></td>
            </tr>
            <?php $i++;} 
            }else{
            ?>
            <tr>
                <td colspan="6" align="center">No Records Found</td>
            </tr>
            <?php } ?>
            
          </tbody>
        </table>
    </div>
</div>