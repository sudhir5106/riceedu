<?php include('header.php'); ?>

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
                <div class="page-content container">
                	<h1>Important Notice</h1>
                    
                    <div class="container" >
                        <article class="welcome">
                          
                         	<ul class="imp-notice">
                            	<li><a target="_blank" href="downloads/174-account-notice.pdf">Account Related Notice Click Here</a></li>
                                <li><a target="_blank" href="downloads/173-employee-notice.pdf">Employee Related Notice Click Here</a></li>
                                <li><a target="_blank" href="downloads/175-department-notice.pdf">Department Related Notice Click Here</a></li>
                            </ul>
                            
                        </article><!--//page-content-->
                        
                       
                        
                    </div>
                    
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <!--eof homeMid ** footer starts from here-->
        <a href="#" class="back-to-top">&nbsp;</a>
<?php include('footer.php'); ?>