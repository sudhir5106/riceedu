<?php 
include('../config.php');
require_once(PATH_STUDENT_INCLUDE.'/header.php');

?>

<div>
  <div class="page-title">
    <div class="title_left">
      <h3><i class="fa fa-home"></i> Dashboard</h3>
    </div>
  </div>
  
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        
        <div class="x_content">
        	<div class="col-sm-3 text-center dashboard-icons text-success"><i class="fa fa-user" aria-hidden="true"></i> <p><a href="my-profile.php">My Profile</a></p></div>
            <div class="col-sm-3 text-center dashboard-icons text-warning"><i class="fa fa-thumb-tack" aria-hidden="true"></i> <p><a href="center-notice.php">Center Notice</a></p></div>
            <div class="col-sm-3 text-center dashboard-icons text-warning"><i class="fa fa-thumb-tack" aria-hidden="true"></i> <p><a href="ho-notice.php">Head Office Notice</a></p></div>
            <div class="col-sm-3 text-center dashboard-icons text-info"><i class="fa fa-upload" aria-hidden="true"></i> <p><a href="upload-document/index.php">Upload Documents</a></p></div>
            <div class="col-sm-3 text-center dashboard-icons text-primary"><i class="fa fa-file-text" aria-hidden="true"></i> <p><a href="">Admit Card</a></p></div>
            <div class="col-sm-3 text-center dashboard-icons text-danger"><i class="fa fa-inr" aria-hidden="true"></i> <p><a href="fees.php">Fees Details</a></p></div>
            <div class="col-sm-3 text-center dashboard-icons text-primary"><i class="fa fa-key" aria-hidden="true"></i> <p><a href="change_password/index.php">Change Password</a></p></div>
            
            
        </div>
      </div>
    </div>
  </div>
  
  
</div>



<?php 
require_once(PATH_STUDENT_INCLUDE.'/footer.php');

?>
