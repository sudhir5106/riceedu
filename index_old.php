<?php include('header.php');

// get all slider images
$res11=$db->ExecuteQuery("SELECT Slider_Image FROM homepage_slider");
// get profile details
$res33=$db->ExecuteQuery("SELECT Profile_Title, Profile_Image, Image_Title, Profile_Content FROM profile");
// get about samriddhi details
$res44=$db->ExecuteQuery("SELECT Page_Content FROM about_samriddhi");
?>
<!--header contaner end here ** top-slider contaner start here-->
<div class="top-slider">
    <div>
        <div class="col-sm-4">
            <div class="welcome-txt">
            	<h2>Welcome!</h2>
            <?php echo substr($res44[1]['Page_Content'],0,380); ?><!--<a href="about_samriddhi_parisar.php">more »</a>-->
            </div>
        </div>
        <div class="col-sm-8">
        	<div class="profileTxt">
            	<h1 class="homeTitle"><?php echo $res33[1]['Profile_Title']; ?></h1>
                <article>
                    <div class="entry-content">
                        <div class="pull-left usrImg align_center col-sm-3"><img class="img-responsive" src="images/<?php echo $res33[1]['Profile_Image']; ?>" alt="" /><br /><span><?php echo $res33[1]['Image_Title']; ?></span></div>
                        <div class="pull-left usrProfile col-sm-9"><?php echo substr($res33[1]['Profile_Content'],0,530); ?>... <a href="profile.php">more »</a></div>
                    </div>
                    <div class="clearfix">&nbsp;</div>
                </article>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!--top-slider contaner end here ** middle containar start here-->
<div class="wrapper">
    <div>
        <?php include('left_sidebar.php'); ?>
        <div class="col-sm-6 content">
            <!-- slides strats here -->
            <div class="slides">
                <div id="slides" class="relative">
                  <a href="#" class="slidesjs-previous slidesjs-navigation left-arrow "><i></i></a>
                  <a href="#" class="slidesjs-next slidesjs-navigation right-arrow "><i></i></a>
                <?php 
                foreach($res11 as $val11){ ?>
                  <img src="images/slides/<?php echo $val11['Slider_Image'];?>" alt="" />
                <?php } ?>
                </div>
            </div>
            <!-- slides ends here -->
        </div>
        <?php include('right_sidebar.php'); ?>
    </div>
    <div class="clearfix">&nbsp;</div>
</div>
<!--middle containar end here ** footer container start here -->
<?php include('footer.php'); ?>