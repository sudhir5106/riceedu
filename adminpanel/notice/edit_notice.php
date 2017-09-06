<?php
include('../../config.php'); 
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
include(PATH_ADMIN_INCLUDE.'/header.php');
$db = new DBConn();

// get Notice details/
$getnotice=$db->ExecuteQuery("SELECT DATE_FORMAT(Notice_Date,'%d-%m-%Y') AS Notice_Date, Notice, hn.Student_Id, Student_Name, Student_Code

FROM ho_notice hn

LEFT JOIN student_master st ON hn.Student_Id = st.Student_Id

WHERE Notice_Id =".$_GET['id']);

?>
<script type="text/javascript" src="notice.js"></script>


<div class="main">
	<div class="page-title">
        <div>
            <div class="col-lg-5 pull-left"><h4><i class="glyphicon glyphicon-edit"></i> Edit Notice</h4></div>
            <div class="col-lg-5 pull-right">
                <div class="ef_header_tools pull-right">
                    <a class="btn btn-primary" href="view-notice.php" title="View Notice"><i class="glyphicon glyphicon-share-alt"></i>View Student Notice</a>
                </div>
            </div>
        </div>
        <div class="clearfix">&nbsp;</div>
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

<?php require_once(PATH_ADMIN_INCLUDE.'/footer.php'); ?>
