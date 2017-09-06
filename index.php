<?php include('config.php'); 
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
include('header.php'); 

$db = new DBConn();

// get all list of news
$getNews=$db->ExecuteQuery("SELECT News_Content FROM news ORDER BY News_Id DESC");
?>

<script type="text/javascript">

	$('.carousel').carousel()

	$(document).ready(function(){
		
		$('.carousel').carousel()
		
		
		$("#msg").hide();
		document.onkeydown = function(event) {
		   if (event.keyCode == 13) {
			   $("#login").trigger("click");
		   }
		}
	
		$("#login").click(function(){
			//alert("sdf");
			$("#msg").hide();
			$("#msg").text('');
			var fcode = $("#fcode").val();
			var user_name =$("#user").val();
			var password =$("#password").val();
			
			//alert(fcode);
			//alert(user_name);
			//alert(password);
		
			if (fcode=="")
			{
				$("#msg").append("<strong>Warning!</strong> Enter Franchise Code");
				$("#msg").show();
				return false;
			}
			if (user_name=="")
			{
				$("#msg").append("<strong>Warning!</strong> Enter User Name");
				$("#msg").show();
				return false;
			}
			if (password=="")
			{
				$("#msg").append("<strong>Warning!</strong> Enter Password");
				$("#msg").show();
				return false;
			}
		
			var x;
			$.ajax(
			{
				url:'check_login.php',
				type:'POST',
				data:{fcode:fcode, user:user_name, password:password},
				async:false,
				success:function(data){ //alert(data);
					x=data;
				}
			});// eof ajax
	
			if(x=="true")
			{
				document.location.href="franchise/index.php";
			}
			else
			{
				$("#msg").append("<strong>Warning!</strong> Incorrect Username/Password!");
				$("#msg").show();
			}
		}); // eof login
	});// eof ready function
</script>

        <!--eof header ** homeMid starts from here-->
        <div class="container homeMid">
        
        	<div class="slider-block box-shadow">
                <!-- Bootstrap slider starts from here -->
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                  <!-- Wrapper for slides -->
                  <div class="carousel-inner">
                    <div class="item active">
                      <img src="images/slides/slide-1.jpg" alt="slide1" width="100%">
                    </div>
                    <div class="item">
                      <img src="images/slides/slide-2.jpg" alt="slide2" width="100%">
                    </div>
                    <div class="item">
                      <img src="images/slides/slide-3.jpg" alt="slide3" width="100%">
                    </div>
                    <div class="item">
                      <img src="images/slides/slide-4.jpg" alt="slide4" width="100%">
                    </div> 
                    <div class="item">
                      <img src="images/slides/slide-5.jpg" alt="slide5" width="100%">
                    </div>                           
                  </div>
                
                  <!-- Controls -->
                  <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                  </a>
                  <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                  </a>
                </div>
                <!-- Bootstrap slider ends here -->
                
            </div>
        
        	<div class="homeContentBlock">
                <div class="col-md-8">  
                
                    <div class="white-bg">
                        <div class="related-logos">
                            <ul>
                                
                                <li class="last"><a href="http://smartnsdc.org/" target="_blank">
                                    <img src="images/logo_SMART.png" alt=""></a></li>
                                    
                                <li><a href="http://www.pmkvyofficial.org/index.aspx" target="_blank">
                                    <img src="images/skills-india-nav-logo.png" alt=""></a></li>
                                
                                <li><a href="http://nsdcindia.org" target="_blank">
                                    <img src="images/nsdc-corporation-logo-nav.png" alt=""></a></li>
                                
                                <li><a href="http://www.skilldevelopment.gov.in" target="_blank">
                                    <img src="images/aindian-emblem-nav.png" alt=""></a></li>
                                
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <section class="content">
                            <h1 class="section-heading text-highlight"><span class="line">Welcome to RICE</span></h1>
                            <div class="section-content">
                                <div class="col-sm-3"><img src="images/girl-img.png" alt="" /></div>
                                <div class="col-sm-9">
                                    <section class="scrollingContent2">
                                        <article>
                                            <div class="news-slider">
                                                                                  
                                              <div class="owl-item-box">
                                                <p>
                                                    <img src="images/quotations/q1.png" alt="" />
                                                </p>
                                              </div>
                                              <div class="owl-item-box">
                                                <p>
                                                    <img src="images/quotations/q2.png" alt="" />
                                                </p>
                                              </div>
                                              <div class="owl-item-box">
                                                <p>
                                                    <img src="images/quotations/q3.png" alt="" />
                                                </p>
                                              </div>
                                              <div class="owl-item-box">
                                                <p>
                                                    <img src="images/quotations/q4.png" alt="" />
                                                </p>
                                              </div>
                                              <div class="owl-item-box">
                                                <p>
                                                    <img src="images/quotations/q5.png" alt="" />
                                                </p>
                                              </div>
                                              <div class="owl-item-box">
                                                <p>
                                                    <img src="images/quotations/q6.png" alt="" />
                                                </p>
                                              </div>
                                              <div class="owl-item-box">
                                                <p>
                                                    <img src="images/quotations/q7.png" alt="" />
                                                </p>
                                              </div>
                                                                                   
                                            </div>
                                        </article>
                                    </section>
                                </div>
                            </div>
                        </section><!--//video-->
                    </div>          
                    
                </div>
                
                
                
                <div class="col-sm-4 homeContent-left">
                    <h3>News &amp; Updates</h3>
                    <div class="news-section">
                        <marquee height="295" onmouseout="this.start()" onmouseover="this.stop()" scrolldelay="5" scrollamount="1" direction="up" behavior="scroll">
                            <ul>
                            <?php foreach($getNews as $getNewsVal){ ?>
                                <li><i class="glyphicon glyphicon-share-alt"></i> <?php echo $getNewsVal['News_Content']; ?></li>
                            <?php } ?>
                            </ul>
                        </marquee>
                    </div>
                </div>
                
                <div class="clearfix"></div>
                    
                
                
            </div>
        </div>
        <!--eof homeMid ** footer starts from here-->
<?php include('footer.php'); ?>