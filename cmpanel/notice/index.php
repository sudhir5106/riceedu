<?php
include('../../config.php'); 
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
$db = new DBConn();
include(PATH_CM_INCLUDE.'/header.php');


?>
<script type="text/javascript" src="notice.js"></script>

<div id="loading">
    <div class="loader-block"><i class="fa-li fa fa-spinner fa-spin spinloader"></i></div>
</div>

<div>
  <div class="page-title">
    <div class="title_left">
      <h3><i class="glyphicon glyphicon-plus"></i> Send Notice</h3>
    </div>
  </div>
  
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Add New</h2>
          <ul class="nav navbar-right panel_toolbox">
            <li>
              <span><a class="btn btn-primary" href="view-notice.php"><i class="glyphicon glyphicon-share-alt"></i> View Student Notice</a></span>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
        	<form class="form-horizontal" role="form" id="insertNotice" method="post">
              <div>
                <div class="form-group">
                  <label class="control-label col-sm-4 mandatory" for="student_code">Student Code <span>*</span>:</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="student_code" name="student_code" placeholder="Student Code" />
                  </div>
                </div>
                
                <div class="form-group" id="student-info">
                  <label class="control-label col-sm-4 mandatory"></label>
                  <div class="col-sm-5" id="student-name">

                  </div>
                </div>
                
                <div class="form-group">
                  <label class="control-label col-sm-4 mandatory" for="notice">Write Notice <span>*</span>:</label>
                  <div class="col-sm-4">
                    <textarea  class="form-control txtarea" id="notice" name="notice" placeholder="Write Notice"></textarea>
                  </div>
                </div>
                
                <hr />
                
                <div class="form-group">
                  <div class="col-sm-4"></div>
                  <div class="col-sm-3">
                    <input type="button" class="btn btn-primary btn-sm" id="submit" value="Submit">
                    <input type="reset" class="btn btn-default btn-sm" id="reset" value="Reset">
                  </div>
                </div>
              </div>
            </form>
        </div>
      </div>
    </div>
  </div>
  
  
</div>
<?php require_once(PATH_CM_INCLUDE.'/footer.php'); ?>