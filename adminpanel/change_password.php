<?php
require('../config.php');
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
include(PATH_ADMIN_INCLUDE.'/header.php');
$db = new DBConn();
$res=$db->ExecuteQuery("SELECT Login_Pwd FROM admin_login");

?>
<script src="change_password.js" type="text/javascript"></script>

<div class="main">
	<div class="page-title">
        <div>
            <div class="col-lg-5 pull-left"><h4><i class="glyphicon glyphicon-edit"></i> Change Password</h4></div>
        </div>
        <div class="clearfix">&nbsp;</div>
    </div>
    
    <div>
    	<form class="form-horizontal" id="edit_password" role="form" method="post">
        	<!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="pass">Password</label>  
              <div class="col-md-4">
              <input id="pass" name="pass" placeholder="Password" class="form-control input-md" type="text" value="<?php echo $res[1]['Login_Pwd']; ?>">
                
              </div>
            </div>
            <!-- Button (Double) -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="button1id"></label>
              <div class="col-md-8">
                 <input type="button" class="btn btn-success btn-sm" id="edit" value="Update">
                <input type="reset" class="btn btn-danger btn-sm" value="Reset" id="reset">
              </div>
            </div>
        </form>
    </div> 
    
</div>