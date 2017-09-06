<?php 
include('../config.php');
require_once(PATH_STUDENT_INCLUDE.'/header.php');
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
$db = new DBConn();

$GetNotice = $db->ExecuteQuery("SELECT DATE_FORMAT(Notice_Date,'%d-%M-%Y') AS Notice_Date, Notice

FROM ho_notice ORDER BY Notice_Id DESC");
?>

<div>
  <div class="page-title">
    <div class="title_left">
      <h3><i class="fa fa-user" aria-hidden="true"></i> Head Office Notice</h3>
    </div>
  </div>
  
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        
        <div class="x_content">

                  
                  <div>
		<?php foreach($GetNotice as $GetNoticeVal){ ?>
                    <div class="profile_title">
                      <div style="padding-left:10px;">
                        <h2><?php echo $GetNoticeVal['Notice_Date']; ?></h2>
                      </div>
                    </div>
                    <!-- start of user-activity-graph -->
                    <div id="graph_bar" style="margin-top:20px; padding-left:10px; padding-right:10px; padding-bottom:10px;">
                    	<div>
                        	<?php echo $GetNoticeVal['Notice']; ?>
                        </div>
                    </div>
                    <!-- end of user-activity-graph -->
          <?php } ?>
                    
                  </div>
                </div>
        
      </div>
    </div>
  </div>
  
  
</div>

<?php require_once(PATH_STUDENT_INCLUDE.'/footer.php'); ?>