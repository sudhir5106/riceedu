<?php 

	require_once(PATH_CM_INCLUDE.'/head.php');
	//Check Here If Admin is authorised or not
	if(empty($_SESSION['cmid']))
	{?>
		<script>
			window.location.href = '<?php echo PATH_ROOT.'/login.php'; ?>';
		</script>
	<?php } ?>
 
<script>
	$(document).ready(function() {
		$("#logoff").click(function(){
			
			$.ajax(
			{
				url:'<?php echo LINK_CONTROL_CM.'/logout.php'; ?>',
				type:'POST',
				data:{},
				async:false,
				success:function(data){
				if (data=="true")
					{
						document.location.href='<?php echo PATH_ROOT; ?>';
					}
				}
			});//eof ajax
		});// eof click function
	});// eof ready function
</script>
<style>
#loading img
{
	width:60px;
}
#loading
{
	text-align:center;
}
</style>

<?php 

require_once(PATH_LIBRARIES.'/classes/DBConn.php');
$db = new DBConn();

$cmImg=$db->ExecuteQuery("SELECT EMP_Image FROM employee_master WHERE EMP_Code = (SELECT CM_Emp_Code FROM cm_login WHERE CM_Id =".$_SESSION['cmid'].")"); 

?>

<div class="col-md-3 left_col">
  <div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;"> <a href="index.php" class="site_title"><i class="fa fa-laptop"></i> <span>CM Panel</span></a> </div>
    <div class="clearfix"></div>
    
    <!-- menu prile quick info -->
    <div class="profile">
      <div class="profile_pic"> <img src="<?php echo PATH_DATA_IMAGE ?>/employee/thumb/<?php echo $cmImg[1]['EMP_Image'] ?>" alt="..." class="img-circle profile_img"> </div>
      <div class="profile_info"> <span>Welcome,</span>
        <h2><?php echo $_SESSION['cmname']?></h2>
      </div>
    </div>
    <!-- /menu prile quick info --> 
    
    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
      <div class="menu_section">
        <div class="clearfix"></div>
        <ul class="nav side-menu">
          <li><a href="<?php echo LINK_CONTROL_CM?>"><i class="fa fa-home"></i>Dashboard</a></li>
          <li><a><i class="fa fa-graduation-cap"></i>Students<span class="fa fa-chevron-down"></span></a>
          	<ul class="nav child_menu" style="display: none">
              <li><a href="<?php echo LINK_CONTROL_CM?>/students/add_student.php">Add New</a></li>
              <li><a href="<?php echo LINK_CONTROL_CM?>/students/index.php">View List</a></li>
            </ul>
          </li>
          <li><a><i class="fa fa-thumb-tack" aria-hidden="true"></i>Student Notice<span class="fa fa-chevron-down"></span></a>
          	<ul class="nav child_menu" style="display: none">
              <li><a href="<?php echo LINK_CONTROL_CM?>/notice/index.php">Add New</a></li>
              <li><a href="<?php echo LINK_CONTROL_CM?>/notice/view-notice.php">View Notice</a></li>
            </ul>
          </li>
          <li><a href="<?php echo LINK_CONTROL_CM?>/fees"><i class="fa fa-inr" aria-hidden="true"></i>Fees Payment</a>
          	
          </li>
          <li><a href="<?php echo LINK_CONTROL_CM?>/send_fee_to_admin"><i class="fa fa-inr" aria-hidden="true"></i>Send Regestration Payment</a>
            
          </li>

          <li><a href="<?php echo LINK_CONTROL_CM?>/send_fee_to_admin/payment_history.php"><i class="fa fa-inr" aria-hidden="true"></i>Payment History</a>
            
          </li>

        </ul>
      </div>
    <div class="clearfix"></div>
    </div>
    <!-- /sidebar menu --> 
    
    <!-- /menu footer buttons -->
    <div class="sidebar-footer hidden-small"> <a data-toggle="tooltip" data-placement="top" title="Settings"> <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> </a> <a data-toggle="tooltip" data-placement="top" title="FullScreen"> <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span> </a> <a data-toggle="tooltip" data-placement="top" title="Lock"> <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span> </a> <a data-toggle="tooltip" data-placement="top" title="Logout"> <span class="glyphicon glyphicon-off" aria-hidden="true"></span> </a> </div>
    <!-- /menu footer buttons --> 
  </div>
</div>

<!-- top navigation -->
<div class="top_nav">
  <div class="nav_menu">
    <nav class="" role="navigation">
      <div class="nav toggle"> <a id="menu_toggle"><i class="fa fa-bars"></i></a> </div>
      <ul class="nav navbar-nav navbar-right">
        <li style="padding-right:10px"> <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> <img src="<?php echo PATH_DATA_IMAGE ?>/employee/thumb/<?php echo $cmImg[1]['EMP_Image'] ?>" alt=""><?php echo $_SESSION['cmname']?> <span class=" fa fa-angle-down"></span> </a>
          <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
            <li><a href="#" id="logoff"><i class="fa fa-sign-out pull-right"></i> Log Out</a> </li>
          </ul>
        </li>
        
          </ul>
        </li>
      </ul>
    </nav>
  </div>
</div>
<!-- /top navigation --> 
<!-- page content -->
<div class="right_col" role="main">