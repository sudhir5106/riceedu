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
                	<h1>Knowledge Bank</h1>
                    
                    <div class="container" >
                       
                       <article class="welcome ">   
                  
                        <h5>Links to Download</h5>
                        <ul>
                        	<li><a target="_blank" href="http://www.pmkvyofficial.org/Index.aspx">APMKVY JOB ROLLES TRADE</a></li>
                            <li><a target="_blank" href="http://www.pmkvyofficial.org/Index.aspx">LIST OF SSC</a></li>
                            <li><a target="_blank" href="http://www.pmkvyofficial.org/Index.aspx">HOW TO BE PARTNER OF RICE UNDER PMKVY</a></li>
                            <li><a target="_blank" href="http://www.pmkvyofficial.org/Index.aspx">PM MODI JI SPEECH</a></li>
                            <li><a target="_blank" href="http://www.pmkvyofficial.org/Index.aspx">PMKVY PROMO</a></li>
                        </ul>
                        
                        <h5>GUIDELINES</h5>
                        <ul>
                        	<li><a target="_blank" href="http://pmkvyofficial.org/App_Documents/News/PMKVY%20Guidelines%20(2016-2020).pdf">PMKVY Guidelines (2016-2020)</a></li>
                            <li><a target="_blank" href="http://pmkvyofficial.org/App_Documents/News/Guidelines%20for%20Skill%20Ecosystem.pdf">Guidelines for Accreditation, Affiliation & Continuous Monitoring of Training Centres for the Skills Ecosystem</a></li>
                            <li><a target="_blank" href="http://pmkvyofficial.org/App_Documents/News/PMKVY%20Branding%20and%20Communication%20Guidelines%2018th%20July%202016.pdf">Branding and Communication Guidelines</a></li>
                            <li><a target="_blank" href="http://pmkvyofficial.org/App_Documents/News/AEBAS_Onboarding_Instructions(1).pdf">PMKVY-Process for Aadhaar Enabled Biometric Attendance System On Boarding</a></li>
                            <li><a target="_blank" href="http://pmkvyofficial.org/App_Documents/News/Nodal%20Officer%20Manual_AEBAS_PMKVY2.pdf">Biometric Attendance Authentication System</a></li>
                            <li><a target="_blank" href="http://pmkvyofficial.org/App_Documents/News/Onboarding%20Manual_AEBAS_PMKVY%202.pdf">On Boarding Manual for Training Centers to Install Aadhaar-enabled Biometric Attendance System</a></li>
                        </ul>
                        
                        <h5>Recognition of Prior Learning (RPL)</h5>
                        <ul>
                        	<li><a target="_blank" href="http://pmkvyofficial.org/App_Documents/News/SOP_RPL-Target-Allotment-FINAL-with-PMKK-(REVISED).pdf">SOP RPL Target Allotments</a></li>
                            <li><a target="_blank" href="http://pmkvyofficial.org/App_Documents/News/Approved-Alterations-to-RPL-Guidelines-19092016.pdf">Approved Alterations to RPL Guidelines</a></li>
                            <li><a target="_blank" href="http://pmkvyofficial.org/App_Documents/News/RPL_Proposal_Template_30012017.docx">RPL Project Proposal Template</a></li>
                            <li><a target="_blank" href="http://pmkvyofficial.org/App_Documents/News/RPL-Application-Form-for-PMKKs.docx">RPL Application form for PMKKS</a></li>
                        </ul>
                        
                        
                </article> 
                       
                    </div>
                    
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <!--eof homeMid ** footer starts from here-->
        <a href="#" class="back-to-top">&nbsp;</a>
<?php include('footer.php'); ?>