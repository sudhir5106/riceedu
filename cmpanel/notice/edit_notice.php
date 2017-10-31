<?php
include('../../config.php'); 
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
$db = new DBConn();
include(PATH_CM_INCLUDE.'/header.php');


// get Notice details/
$getnotice=$db->ExecuteQuery("SELECT DATE_FORMAT(Notice_Date,'%d-%m-%Y') AS Notice_Date, Notice, cn.Student_Id, Student_Name, Student_Code

FROM center_notice cn

LEFT JOIN student_master st ON cn.Student_Id = st.Student_Id

WHERE Notice_Id =".$_GET['id']);

?>
<script type="text/javascript" src="notice.js"></script>

<div id="loading">
    <div class="loader-block"><i class="fa-li fa fa-spinner fa-spin spinloader"></i></div>
</div>

<div>
  <div class="page-title">
    <div class="title_left">
      <h3><i class="glyphicon glyphicon-edit"></i> Edit Notice</h3>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Edit Notice</h2>
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
                    <input type="text" class="form-control" id="student_code" name="student_code" placeholder="Student Code" value="<?php echo $getnotice[1]['Student_Code']; ?>" />
                  </div>
                </div>
                
                <div class="form-group" id="student-info">
                  <label class="control-label col-sm-4 mandatory"></label>
                  <div class="col-sm-5" id="student-name">
                  <input type="hidden" class="form-control" id="student_id" name="student_id" value="<?php echo $getnotice[1]['Student_Id']; ?>" />
					<?php echo $getnotice[1]['Student_Name']; ?>
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="control-label col-sm-4 mandatory" for="notice">Write Notice <span>*</span>:</label>
                  <div class="col-sm-4">
                    <textarea  class="form-control txtarea" id="notice" name="notice" placeholder="Write Notice"><?php echo $getnotice[1]['Notice']; ?></textarea>
                  </div>
                </div>
                
                <hr />
                
                <div class="form-group">
                  <div class="col-sm-4"></div>
                  <div class="col-sm-3">
                    <input type="hidden" id="notice_id" name="notice_id" value="<?php echo $_GET['id']; ?>">
            
                    <input type="button" class="btn btn-primary btn-sm" id="edit" value="Update">
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
