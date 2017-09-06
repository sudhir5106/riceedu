<?php 
include(PATH_MASTERS.'/include/head.php');
if($_SESSION['Login_Id']=="")
{?>
<script>
		window.location.href = '<?php echo PATH_ADMIN_LINK.'/index.php'; ?>';
	</script>
<?php } ?>

<script>
	$(document).ready(function() {
		$("#logoff").click(function(){
			$.ajax(
			{
				url:'<?php echo PATH_ADMIN_LINK.'/logout.php'; ?>',
				type:'POST',
				data:{},
				async:false,
				success:function(data){
				if (data=="true")
					{
						document.location.href='<?php echo PATH_ADMIN_LINK.'/index.php'; ?>';
					}
				}
			});//eof ajax
		});// eof click function
	});// eof ready function
</script>

<div class="headPart noPrint">
  <div>
    <!--<div class="title flote_left"><img width="60" src="<?php echo PATH_IMAGE ?>/logo.png" alt="" /></div>-->
    <div class="pull-left" style="padding-left:20px;">
      <h2>Admin Panel</h2>
    </div>
    <div class="logout float_right">
      <div class="btn-toolbar">
        <div class="user_style">
          <button type="button" class="btn btn-default logoffBtn" id="logoff"> <span class="glyphicon glyphicon-off"></span> Logoff </button>
        </div>
        <div class="float_right">
          <div class="btn-group">
            <button class="btn btn-primary" style="padding:11px 10px 11px 10px"><span class="glyphicon glyphicon-user"></span></button>
            <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle" style=" padding:16px 6px 15px 6px"> <span class="caret"> </span></button>
            <ul class="dropdown-menu">
              <li><a href="<?php echo PATH_ADMIN_LINK?>/change_password.php">Change Password</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="clear"></div>
</div>

<!--logout menu end here-->
<div class="clear"></div>
<nav class="navbar navbar-inverse" role="navigation" style="border-radius:0;">
<ul class="nav nav-pills dropdown open">
  <li class="active"><a href="<?php echo PATH_ADMIN_LINK?>/home.php">Dashboard</a></li>
  <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="100">Masters <b class="caret"></b></a>
    <ul class="dropdown-menu">
      <li><a href="<?php echo MASTERS_LINK_CONTROL?>/district">District</a></li>
      <li><a href="<?php echo MASTERS_LINK_CONTROL?>/block">Block</a></li>
      <li><a href="<?php echo MASTERS_LINK_CONTROL?>/course">Course</a></li>
      <li><a href="<?php echo MASTERS_LINK_CONTROL?>/employee">Employee</a></li>
    </ul>
  </li>
  
  <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="100">Create Logins <b class="caret"></b></a>
  	<ul class="dropdown-menu">
    	<li class="dropdown"><a href="<?php echo PATH_ADMIN_LINK?>/rm-login">Regional Manager Login</a></li>
        <li class="dropdown"><a href="<?php echo PATH_ADMIN_LINK?>/dm-login">District Manager Login</a></li>
        <li class="dropdown"><a href="<?php echo PATH_ADMIN_LINK?>/cm-login">Center Manager Login</a></li>
    </ul>
  </li>
  <li class="dropdown"><a href="<?php echo PATH_ADMIN_LINK?>/students">Students</a></li>
  <li class="dropdown"><a href="<?php echo PATH_ADMIN_LINK?>/notice">Notice</a></li>
  <li class="dropdown"><a href="<?php echo PATH_ADMIN_LINK?>/news">News</a></li>
  
</ul>
</div>
