<?php
require('../config.php');
include_once(PATH_ADMIN_INCLUDE.'/header.php');
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
$db = new DBConn();
$res=$db->ExecuteQuery("Select DATE_FORMAT(Last_Login_Date,'%d-%m-%Y %H:%i:%s') AS 'Last_Login_Date',Login_Ip from admin_login")
?>
<div id="middle_container">
 
<div class="deshbord_wrth">
 <div class="container deshbord">
 <div class="row">

<div class="col-md-3">


<div><img src="../images/add-user.png" class="img_deshbord" /></div>
<div class="admin_text">Admin last login date</div>
<div class="showe_dade"><?php echo $res[1]['Last_Login_Date'];?></div>
</div>

  <div class="col-md-9"><div><img src="../images/login_ip.png" class="img_deshbord" /></div>
  <div class="admin_text">Login IP</div>
<div class="showe_dade"><?php echo $res[1]['Login_Ip'];?></div>
  
  </div>
</div>
 </div>
 </div>



