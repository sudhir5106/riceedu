<?php
include('../../../config.php'); 
include(PATH_ADMIN_INCLUDE.'/header.php');
?>
<script type="text/javascript"  src="course.js" ></script>

<div class="main">
  <div class="page-title">
    <div>
      	<div class="col-lg-5 pull-left">
        	<h4><i class="glyphicon glyphicon-plus"></i> Add New Course</h4>
      	</div>
      	<div class="col-lg-5 pull-right text-right">
            <span class="hidden-phone" style="margin-left: 15px; margin-top: 3px;"><a class="btn btn-primary" href="list.php"><i class="glyphicon glyphicon-share-alt"></i> View Course List</a></span>
        </div>
    </div>
    <div class="clearfix">&nbsp;</div>
  </div>
  <div class="clear formbgstyle">
    <form class="form-horizontal" role="form" id="insertCourse" method="post">
      <div>
        <div class="form-group">
          <label class="control-label col-sm-3 mandatory" for="course_name">Name of Course <span>*</span>:</label>
          <div class="col-sm-3">
            <input type="text" class="form-control input-sm" id="course_name" name="course_name" placeholder="Name of Course"  />
          </div>
        </div>
        
        <div class="form-group">
          <label class="control-label col-sm-3 mandatory" for="learning_fee">Learning Fees <span>*</span>:</label>
          <div class="col-sm-3">
            <input type="text" class="form-control input-sm" id="learning_fee" name="learning_fee" placeholder="Learning Fees"  />
          </div>
        </div>
        
        <div class="form-group">
          <label class="control-label col-sm-3 mandatory" for="registration_fee">Registration Fees <span>*</span>:</label>
          <div class="col-sm-3">
            <input type="text" class="form-control input-sm" id="registration_fee" name="registration_fee" placeholder="Registration Fees"  />
          </div>
        </div>
        
        <div class="form-group">
          <label class="control-label col-sm-3 mandatory" for="exam_fee">Exam Fees <span>*</span>:</label>
          <div class="col-sm-3">
            <input type="text" class="form-control input-sm" id="exam_fee" name="exam_fee" placeholder="Exam Fee"  />
          </div>
        </div>
        
        <hr />
        
        <div class="form-group">
          <div class="col-sm-3"></div>
          <div class="col-sm-3">
            <input type="button" class="btn btn-primary btn-sm" id="submit" value="Submit">
            <input type="reset" class="btn btn-default btn-sm" id="reset" value="Reset">
          </div>
        </div>
      </div>
    </form>
    
  </div>
</div>
