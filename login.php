<?php  include('header.php'); ?>

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
<script type="text/javascript"  src="js/jquery.validate.js" ></script>
<script type="text/javascript"  src="login.js" ></script>
<!-- eof Back to Top Script-->

<style>
	.empDialogBx{width:800px;}
</style>

        <!--eof header ** homeMid starts from here-->
        <div class="container homeMid">
        	<div>
                <div class="page-content container">
                	<h1>Login</h1>
                    
                    <div class="col-sm-4">
                        <div class="panel-body">
                            <fieldset class="">    	
                                <legend>Regional Manager Login</legend>                                    
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="center-block ">
                                            <form class="form-horizontal" role="form" id="rmloginfrm" name="rmloginfrm" method="post">
                                              <div class="input-group padding"><span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                                <input type="text" id="rmEmpCode" name="rmEmpCode" class="form-control" placeholder="User Id">
                                              </div>
                                              <div class="input-group padding"> <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                                                <input type="password" id="rmpassword" name="rmpassword" class="form-control" placeholder="Password">
                                              </div>
                                              <div class="padding">
                                                <button  type="button" id="rmloginBtn" class="btn btn-success">Login</button>
                                              </div>
                                            </form>
                                            <div class="error" id="msg"></div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    
                    <div class="col-sm-4">
                        <div class="panel-body">
                            <fieldset class="">    	
                                <legend>District Manager Login</legend>                                    
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="center-block">
                                            <form class="form-horizontal" role="form" id="dmloginfrm" name="dmloginfrm" method="post">
                                              <div class="input-group padding"><span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                                <input type="text" id="dmEmpCode" name="dmEmpCode" class="form-control" placeholder="User Id">
                                              </div>
                                              <div class="input-group padding"> <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                                                <input type="password" id="dmpassword" name="dmpassword" class="form-control" placeholder="Password">
                                              </div>
                                              <div class="padding">
                                                <button  type="button" id="dmloginBtn" class="btn btn-success">Login</button>
                                              </div>
                                            </form>
                                            <div class="error" id="msg2"></div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    
                    <div class="col-sm-4">
                        <div class="panel-body">
                            <fieldset class="">    	
                                <legend>Center Manager Login</legend>                                    
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="center-block">
                                            <form class="form-horizontal" role="form" id="cmloginfrm" name="cmloginfrm" method="post">
                                              <div class="input-group padding"><span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                                <input type="text" id="cmEmpCode" name="cmEmpCode" class="form-control" placeholder="User Id">
                                              </div>
                                              <div class="input-group padding"> <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                                                <input type="password" id="cmpassword" name="cmpassword" class="form-control" placeholder="Password">
                                              </div>
                                              <div class="padding">
                                                <button  type="button" id="cmloginBtn" class="btn btn-success">Login</button>
                                              </div>
                                            </form>
                                            <div class="error" id="msg3"></div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    
                    <div class="clearfix"></div>
                    
                    <div class="login-panel" style="margin-top:50px;">
                        <div class="panel-body">
                            <fieldset class="">    	
                                <legend>Check Employee Detail</legend>                                    
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="center-block login-box">
                                            <form class="form-horizontal" role="form" id="empInfo" name="empInfo" method="post">
                                              <div class="input-group padding">
                                              	<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                                <input type="text" id="emp_code" name="emp_code" class="form-control" placeholder="Employee Code">
                                              </div>
                                              
                                              <div class="padding">
                                                <button  type="button" id="FindEmpBtn" class="btn btn-success" >Find Detail</button>
                                                
                                                <!-- Modal -->
                                                <div id="myModal" class="modal fade" role="dialog">
                                                  <div class="modal-dialog empDialogBx">
                                                
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">Employee Details</h4>
                                                      </div>
                                                      
                                                      <div class="modal-body" id="empDetails">
                                                        
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                      </div>
                                                    </div>
                                                
                                                  </div>
                                                </div>
                                                <!-- Eof Modal -->
                                                
                                              </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    
                    <div style="margin-top:50px;">
                        <div class="panel panel-default">
    	
                            <div class="panel-heading">Student Login</div>
                            <div class="panel-body">
                            
                            	<div class="col-sm-6">
                                	<fieldset class="student-sec">    	
                                        <legend>Student Login</legend>
                                        
                                        <div class="center-block" style="width:70%">
                                            <form class="form-horizontal" role="form" id="studentloginfrm" name="studentloginfrm" method="post">
                                              <div class="input-group padding"><span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                                <input type="text" id="studentCode" name="studentCode" class="form-control" placeholder="Student Id">
                                              </div>
                                              <div class="input-group padding"> <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                                                <input type="password" id="spassword" name="spassword" class="form-control" placeholder="Password">
                                              </div>
                                              
                                              <div class="padding">
                                                <button  type="button" id="studentloginBtn" class="btn btn-success">Login</button>
                                              </div>
                                            </form>
                                            <div class="error" id="msg4"></div>
                                        </div>
                                        
                                    </fieldset>				
                                 </div>
                                 <div class="col-sm-6">   
                                    <fieldset class="student-sec">    	
                                        <legend>Admit Card</legend>
                                        
                                        <div class="center-block login-box">
                                            <form class="form-horizontal" role="form" id="index" name="index" method="post">
                                              <div class="input-group padding"><span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                                <input type="text" id="user" name="user" class="form-control" placeholder="Student Id">
                                              </div>
                                              
                                              <div class="padding">
                                                <button  type="button" id="login" class="btn btn-success">Submit</button>
                                              </div>
                                            </form>
                                        </div>
                                        
                                    </fieldset>
                                </div>
                                
                                <div class="clearfix"></div>
                                
                                <div class="col-sm-6">
                                	<fieldset class="student-sec">    	
                                        <legend>Result</legend>
                                        
                                        <div class="center-block login-box">
                                            <form class="form-horizontal" role="form" id="index" name="index" method="post">
                                              <div class="input-group padding"><span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                                <input type="text" id="user" name="user" class="form-control" placeholder="Student Id">
                                              </div>
                                              
                                              <div class="padding">
                                                <button  type="button" id="login" class="btn btn-success">Submit</button>
                                              </div>
                                            </form>
                                        </div>
                                        
                                    </fieldset>
                                 </div>
                                 <div class="col-sm-6">   
                                    <fieldset>    	
                                        <legend>Verification</legend>
                                        
                                        <div class="center-block login-box">
                                            <form class="form-horizontal" role="form" id="index" name="index" method="post">
                                              <div class="input-group padding"><span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                                <input type="text" id="user" name="user" class="form-control" placeholder="Student Id">
                                              </div>
                                              
                                              <div class="padding">
                                                <button  type="button" id="login" class="btn btn-success">Find Detail</button>
                                              </div>
                                            </form>
                                        </div>
                                        
                                    </fieldset>
                                </div>
                                
                            </div>
                                        
                        </div>                                        
                     </div>
                     
                     <div class="login-panel" style="margin-top:50px;">
                        <div class="panel-body">
                            <fieldset>    	
                                <legend>Find Nearest Center</legend>                                    
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="center-block login-box">
                                            <form class="form-horizontal" role="form" id="index" name="index" method="post">
                                              <div class="input-group padding"><span class="input-group-addon"><span class="glyphicon glyphicon-map-marker"></span></span>
                                                <select id="state" name="state" class="form-control input-sm" >
                                                      <option value="">--Select State--</option>
                                                </select>                                                
                                              </div>
                                              
                                              <div class="input-group padding"><span class="input-group-addon"><span class="glyphicon glyphicon-map-marker"></span></span>
                                                <select id="state" name="state" class="form-control input-sm" >
                                                      <option value="">--Select District--</option>
                                                </select>                                                
                                              </div>
                                              
                                              <div class="input-group padding"><span class="input-group-addon"><span class="glyphicon glyphicon-map-marker"></span></span>
                                                <select id="state" name="state" class="form-control input-sm" >
                                                      <option value="">--Select Block--</option>
                                                </select>                                                
                                              </div>
                                              
                                              <div class="padding">
                                                <button  type="button" id="login" class="btn btn-success">Find</button>
                                              </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>

                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <!--eof homeMid ** footer starts from here-->
        <a href="#" class="back-to-top">&nbsp;</a>
<?php include('footer.php'); ?>