<?php include('config.php'); 
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
include('header.php'); 

$db = new DBConn();

// get all list of news
$getSector=$db->ExecuteQuery("SELECT * FROM sector_master ORDER BY Sector_Name ASC");

// get jobrolls as per selected sector
$getjobrolls=$db->ExecuteQuery("SELECT s.Sector_Name, j.Job_Roll_Name FROM sector_master s
LEFT JOIN job_roll_master j ON s.Sector_Id = j.Sector_Id
WHERE s.Sector_Id=".$_GET['id']);

?>
<!-- Back to Top Script-->
<script>
	jQuery(document).ready(function() {
		var offset = 220;
		var duration = 500;
		jQuery(window).scroll(function() {
			if (jQuery(this).scrollTop() > offset) {
				jQuery('.back-to-top').fadeIn(duration);
			} else {
				jQuery('.back-to-top').fadeOut(duration);
			}
		});
		
		jQuery('.back-to-top').click(function(event) {
			event.preventDefault();
			jQuery('html, body').animate({scrollTop: 0}, duration);
			return false;
		});
		
		
	});
</script>
<!-- eof Back to Top Script-->

        <!--eof header ** homeMid starts from here-->
        <div class="container homeMid">
        	<div>
            	<div class="left-sidebar col-sm-3">
                	<div class="left-block">
                    	<h3>Sectors</h3>
                        <ul>
                        	<?php foreach($getSector as $getSectorVal){ ?>
                            <li><i class="glyphicon glyphicon-share-alt"></i> <a href="jobrolls.php?id=<?php echo $getSectorVal['Sector_Id'] ?>"><?php echo $getSectorVal['Sector_Name'] ?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="page-content col-sm-9">
                	<h1>Sectors > <?php echo $getjobrolls[1]['Sector_Name']; ?></h1>
                    <ul class="simplelist">
					<?php 
					 
					 foreach($getjobrolls as $getjobrollsVal){
					 ?>
                    	<li><?php echo $getjobrollsVal['Job_Roll_Name']; ?></li>
                <?php } ?>
                    </ul>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <!--eof homeMid ** footer starts from here-->
        <a href="#" class="back-to-top">&nbsp;</a>
<?php include('footer.php'); ?>