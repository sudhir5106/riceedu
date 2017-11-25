<?php include('config.php'); 
include('header.php'); 

if (isset($_REQUEST['submit']) ) {
	
	require_once('recaptchalib.php');
  $privatekey = "6LennPISAAAAAJBERy3ksjlQllAOCn2K7uy9ckC5";
  $resp = recaptcha_check_answer ($privatekey,
		$_SERVER["REMOTE_ADDR"],
		$_POST["recaptcha_challenge_field"],
		$_POST["recaptcha_response_field"]);

  if (!$resp->is_valid) {
 	?>
	
    <script type="text/javascript">
    	$(document).ready(function(){
			$("#captchaError").show();
			$("#captchaError").html("<p class='alert alert-danger' style='margin-top:15px;'>The reCAPTCHA wasn't entered correctly. Please try it again.</p>")
		});// eof ready function
    </script>
    
    <?php
	
  }
  else{
	
		///////////////////////////////////
		//data send to the admin via Email
		///////////////////////////////////
		
		$to  = "support@riceedu.org";
		
		// subject ///////////////////////////////////////
		$subject = 'A New Enquiry has been initiated';
		
		$user_name=$_POST['name'];
		$emailId=$_POST['emailId'];
		$countrycode=$_POST['countrycode'];
		$phone=$_POST['phone'];
		$msg=$_POST['msg'];
		
		
		// message ////////////////////////////////////////////////
		$message = "
		<table width='100%' border='0' cellspacing='0' cellpadding='0'>
		  <tr>
			<td>Name:</td>
			<td align='left'><strong>$user_name</strong></td>
		  </tr>
		  <tr>
			<td>Email:</td>
			<td align='left'><strong>$emailId</strong></td>
		  </tr>
		  <tr>
			<td>Phone:</td>
			<td align='left'><strong>$countrycode-$phone</strong></td>
		  </tr>
		  <tr>
			<td>Message/Enquiry:</td>
			<td align='left'><strong>$msg</strong></td>
		  </tr>
		</table>";
		
		// To send HTML mail, the Content-type header must be set
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		
		
		// Additional headers
		$headers .= 'From: RICE EDU <contact@riceedu.org>' . "\r\n";
		//$headers .= 'Cc: birthdayarchive@example.com' . "\r\n";
		//$headers .= 'Bcc: birthdaycheck@example.com' . "\r\n";
		
		// Mail it
		mail($to, $subject, $message, $headers);
		////////////////////////////////////////////////////////////////
		echo 1;
  }//eof else
	
}// eof submit

?>
<script src="js/jquery.validate.js" type="text/javascript"></script>
<script src="js/contact.js" type="text/javascript"></script>


        <!--eof header ** homeMid starts from here-->
        <div class="container homeMid">
        	<div>
            	<div class="left-sidebar col-sm-3">
                	<div class="left-block contactTxt">
                    	<h3>HEAD OFFICE</h3>
                        <p>
                        	RURAL INSTITUTE FOR CAREER AND EMPLOYMENT SOCIETY (RICEs)<br />
                            Kaledonia 1st Floor, Office No-26<br />
                            Sahar Road , Andheri East<br />
                            Mumbai 400069<br /><br />
                            
                            <strong>In case of any clearance please feel free to call me or mail me if necessary any also. </strong><br />
                            <strong>Mobile</strong>:	9522223699<br />
                            <strong>Landline</strong>: 02266117962<br />
                            <strong>Email</strong> : <a href="mailto:support@riceedu.org">support@riceedu.org</a><br />
                            <strong>Visit us on</strong> : <a target="_blank" href="http://www.riceedu.org">www.riceedu.org</a><br /><br />
                        </p>
                        
                        <h3>CORPORATE OFFICE</h3>
                        <p>RURAL INSTITUTE FOR CAREER AND EMPLOYMENT SOCIETY (RICEs) OLD SARANGARH
BUS STAND BEHIND KANHA HOSPITAL WARD NO. 31 RAIGARH 496001 C.G.</p>
                            
                        <p><strong>FOR ENQUARY</strong> – 07762222569, 9522223698, 9329057958 <br />
                        <strong>EMAIL</strong> - <a href="mailto:admin@riceedu.org">admin@riceedu.org</a><br /><br /></p>
                        
                        <h3>Database & Founder Office</h3>
                        <p>Near Substation Visa Power Project,<br /> Dumarpali, Raigarh</p>
                        <p><strong>Contact No.</strong> : 07762215448<br />
                        	<strong>Email</strong> : <a href="mailto:database@riceedu.org">database@riceedu.org</a><br />
                            <strong>Timing</strong> : 10:30am to 12:30pm
                        </p>
                    </div>
                </div>
                <div class="page-content contact-page col-sm-9">
                	<h1>Contact Us</h1>
                    <p class="directorMsg">
                        <strong>We appreciate your stated interest in continuing partnership with me to build ecosystem for skill development.</strong><br /><br />
                        <span>ADMINISTRATION OFFICE</span><br />
                        RURAL INSTITUTE FOR CAREER AND EMPLOYMENT SOCIETY (RICEs)<br>
                        OLD SARANGARH BUS STAND BEHIND KANHA HOSPITAL<br>
                        WARD NO. 31 RAIGARH 496001 (C.G.)<br>

                        TIMING 10 AM TO 7 PM<br>
                        <strong>FOR ENQUARY</strong> – 07762222569, 9522223698, 9329057958<br>
                        Email - <a href="mailTo:support@riceedu.org">support@riceedu.org</a><br />
                        Visit us on: <a href="http://www.riceedu.org">www.riceedu.org</a>                        
                    </p>

                    <div>
                        <div class="col-sm-6">
                            <h3>MAHARASHTRA OFFICE</h3>
                            <p>Under maintenance or sifting <br>
                            Contact -  – 07762222569, 9522223698, 9329057958
                            </p>
                        </div>
                        <div class="col-sm-6">
                            <h3>UTTAR PRADESH OFFICE</h3>
                            <p>PURANA KOPA GANJ NEAR GOVT. HOSPITAL<br>
                            DIST MAU PIN CODE 275305 U.P.<br>
                            CONTACT - 8169971843<br>
                            EMAIL - <a href="mailTo:dspchrs6@gmail.com">dspchrs6@gmail.com</a>
                            </p>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div style="margin-top:30px;">
                        <div class="col-sm-6">
                            <h3>BIHAR OFFICE</h3>
                            <p>FIRST FLOOR KHAKI BLENDER<br>
                            NAHI ROAD GLIMMER BUXAR- 802101<br>
                            CONTACT – 9004769710<br>
                            EMAIL - <a href="mailTo:manojkumargupta533@gmail.com">manojkumargupta533@gmail.com</a>

                            </p>
                        </div>
                        <div class="col-sm-6">
                            <h3>COMPUTER EDUCATION, SKILL CENTER & BANKING SERVICE </h3>
                            <p>RURAL INSTITUTE FOR CAREER AND EMPLOYMENT SOCIETY (RICEs) NEAR SUBSTATION BAZAAR CHOWK DUMARPALI (VISA POWER PLANT) RAIGARH 496001 C.G. <br><br>
                            TIMING 9AM TO 6 PM <br>
                            CONTACT - 9522223700<br>
                            EMAIL - <a href="mailTo:dumarpali@riceedu.org">dumarpali@riceedu.org</a>
                            </p>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div style="margin-top:30px;">
                        <div class="col-sm-6">
                            <h3>EDUCATION & SKILL CENTER</h3>
                            <p>RURAL INSTITUTE FOR CAREER AND EMPLOYMENT SOCIETY (RICEs) PUSSOR ROAD 1ST FLOOR TULSI HOTEL KONDATARAI NEW RAIGARH 496100 C.G. <br><br>
                            TIMING 9AM TO 6 PM <br>
                            CONTACT – 9303014203 <br>
                            EMAIL - <a href="mailTo:kondatarai@riceedu.org">kondatarai@riceedu.org</a>

                            </p>
                        </div>
                        <div class="col-sm-6">
                            <h3>EDUCATION & SKILL CENTER</h3>
                            <p>RURAL INSTITUTE FOR CAREER AND EMPLOYMENT SOCIETY (RICEs) NEAR BAJAJ AGENCY SHANTI NAGAR SADAK PARA WARD NO. 13 NAWAGARH DIST JANJGIR CHAMPA 495557 C.G. <br><br>
                            TIMING 8 AM TO 6 PM br>
                            CONTACT - 9522223689<br>
                            EMAIL - <a href="mailTo:nawagarh@riceedu.org">nawagarh@riceedu.org</a>
                            </p>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div style="margin-top:30px;">
                        <div class="col-sm-6">
                            <h3>EDUCATION & SKILL CENTER</h3>
                            <p>RURAL INSTITUTE FOR CAREER AND EMPLOYMENT SOCIETY (RICEs) MAIN ROAD WARD NO. 10 NEAR KRISHI UPAJ MANDI PENDRY BLOCK NAWAGARH DIST JANJGIR CHAMPA C.G. <br><br>
                            TIMING 9AM TO 6 PM <br>
                            CONTACT – 9522223644 <br>
                            EMAIL - <a href="mailTo:janjgir@riceedu.org">janjgir@riceedu.org</a>

                            </p>
                        </div>
                        <div class="col-sm-6">
                            <h3>EDUCATION & SKILL CENTER</h3>
                            <p>RURAL INSTITUTE FOR CAREER AND EMPLOYMENT SOCIETY (RICEs) MAIN ROAD WARD NO. 10 NEAR KRISHI UPAJ MANDI PENDRY BLOCK NAWAGARH DIST JANJGIR CHAMPA C.G. <br><br>
                            TIMING 8 AM TO 6 PM br>
                            CONTACT - 9522223644 <br>
                            EMAIL - <a href="mailTo:janjgir@riceedu.org">janjgir@riceedu.org</a>
                            </p>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div style="margin-top:30px;">
                        <div class="col-sm-6">
                            <h3>EDUCATION & SKILL CENTER</h3>
                            <p>RURAL INSTITUTE FOR CAREER AND EMPLOYMENT SOCIETY (RICEs) SIND PLAZA NEAR  JANPAD PANCHAYAT  WARD NO. 7 RAIGARH ROAD DHARAMJAIGARH  496116  DIST  RAIGARH C.G.<br><br>
                            TIMING 9AM TO 6 PM <br>
                            CONTACT – 9522223690<br>
                            EMAIL - <a href="mailTo:dharamjaigarh@riceedu.org">dharamjaigarh@riceedu.org</a>

                            </p>
                        </div>
                        
                    </div>
                    <div class="clearfix"></div>

                    <div style="display:none;" id="captchaError"></div>
                    <div class="contactFrm col-sm-6" style="margin:to:30px">
                        <form class="form-horizontal fromstyle" role="form" id="contactform" method="post">
                            <div>
                                <div class="form-group clear fieldRow">
                                    <label class="control-label col-sm-12 mandatory" for="name">Full Name <span>*</span></label>
                                    <div class="col-sm-12  col-height">
                                        <input type="text" class="form-control input-sm" id="name" name="name" placeholder="Name"  />
                                    </div>
                                </div>
                                <div class="form-group clear fieldRow">
                                    <label class="control-label col-sm-12 mandatory" for="emailId">Email Id <span>*</span></label>
                                    <div class="col-sm-12 col-height">
                                        <input type="text" class="form-control input-sm" id="emailId" name="emailId" placeholder="Email Id"  />
                                    </div>
                                </div>
                                <div class="form-group clear fieldRow">
                                    <label class="control-label col-sm-12" for="phone">Phone</label>
                                    <div>
                                        <div class="col-sm-3 col-height"><input type="text" class="form-control input-sm" id="countrycode" name="countrycode" placeholder="Ext." /></div>
                                        <div class="col-sm-9 col-height">
                                            <input type="text" class="form-control input-sm" id="phone" name="phone" placeholder="Phone" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group clear">
                                    <label class="control-label col-sm-12 mandatory" for="msg">Message <span>*</span></label>
                                    <div class="col-sm-12 col-height fieldTxtareaRow">
                                        <textarea class="form-control input-sm textarea" id="msg" name="msg" placeholder="Message"></textarea> 
                                    </div>
                                </div>
                                <div class="form-group clear">
                                	<div class="col-sm-12">
                                    	<?php 
										  require_once('recaptchalib.php');
										  $publickey = "6LennPISAAAAAAwbLk1VSEy4h50Zwk1bOJZgwnYN"; // you got this from the signup page
										  echo recaptcha_get_html($publickey);
										  ?>
                                    </div>
                                </div>
                                
                                
                                <div style="clear:both;"></div>
                                <div class="form-group">
                                    <div class="align_center col-height"><input type="submit" name="submit" class="btn btn-primary btn-sm" id="submit" value="Submit"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!--<div class="col-sm-6 gmap">
                    		<iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=magneto+mall,+raipur&amp;aq=&amp;sll=37.0625,-95.677068&amp;sspn=42.901912,56.513672&amp;ie=UTF8&amp;hq=&amp;hnear=&amp;ll=21.24072,81.684126&amp;spn=0.006295,0.006295&amp;t=m&amp;iwloc=A&amp;output=embed"></iframe><br /><small><a href="https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=magneto+mall,+raipur&amp;aq=&amp;sll=37.0625,-95.677068&amp;sspn=42.901912,56.513672&amp;ie=UTF8&amp;hq=&amp;hnear=&amp;ll=21.24072,81.684126&amp;spn=0.006295,0.006295&amp;t=m&amp;iwloc=A" style="color:#0000FF;text-align:left">View Larger Map</a></small>
                    </div>-->
                    
                    
                      <!--  <h3 class="title"><strong>DEPARTMENT</strong></h3>
                    <table class="table">
                        <tr>
                            <td>CORDINATION</td>
                            <td>9522223691</td>
                            <td><a href="mailto:CORDI@RICEEDU.ORG">CORDI@RICEEDU.ORG</a></td>
                        </tr>
                        <tr>
                            <td>ADMINISTRATION</td>
                            <td>9329057958</td>
                            <td><a href="mailto:ADMIN@RICEEDU.ORG">ADMIN@RICEEDU.ORG</a></td>
                        </tr>
                        <tr>
                            <td>ACCOUNTS</td>
                            <td>9329057958</td>
                            <td><a href="mailto:ACCOUNTS@RICEEDU.ORG">ACCOUNTS@RICEEDU.ORG</a></td>
                        </tr>
                        <tr>
                            <td>EXAM</td>
                            <td>9522223642</td>
                            <td><a href="mailto:EXAM@RICEEDU.ORG">EXAM@RICEEDU.ORG</a></td>
                        </tr>
                        <tr>
                            <td>PMKVY</td>
                            <td>9522223698</td>
                            <td><a href="mailto:SUPPORT@RICEEDU.ORG">SUPPORT@RICEEDU.ORG</a></td>
                        </tr>
                        <tr>
                            <td>PMGDISHA</td>
                            <td>9522223646</td>
                            <td><a href="mailto:PMGDISHA@RICEEDU.ORG">PMGDISHA@RICEEDU.ORG</a></td>
                        </tr>
                        <tr>
                            <td>PLACEMENT</td>
                            <td>9522223644</td>
                            <td><a href="mailto:PLACEMENT@RICEEDU.ORG">PLACEMENT@RICEEDU.ORG</a></td>
                        </tr>
                    </table>-->
                    
                    <p class="directorMsg">
                    <span>MRS.K.MEHTA<br>
                    NATIONAL MARKETING HEAD</span><br>
                    
                    Contact - 9522223688<br>
                    Email - <a href="mailTo:kmehta@riceedu.org">kmehta@riceedu.org</a>
                    </p>        
                    
                    <h3><strong>FOR COMPLAIN</strong></h3>
                    <p>Email: <a href="mailto:complain@riceedu.org">complain@riceedu.org</a></p>
                    
                    <h3>Important</h3>
                    <p>Please note that our office timing is 10 A.M. to 5:30 P.M.(Monday - Saturday)</p>
                    <p>Please do not make us any calls before and after the office timing.</p>
                    
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <!--eof homeMid ** footer starts from here-->
        <a href="#" class="back-to-top">&nbsp;</a>
<?php include('footer.php'); ?>