<?php 
include('../config.php');
require_once(PATH_CM_INCLUDE.'/header.php');
$db = new DBConn();

$cmImg=$db->ExecuteQuery("SELECT EMP_Image,EMP_Name,EMP_Designation,EMP_Code,DATE_FORMAT(DOJ,'%d-%M-%Y') AS DOJ,Posting_Place,Block_Name,District_Name,State_Name,EMP_Address,EMP_Contact,EMP_Email 

FROM employee_master

LEFT JOIN block_master b ON employee_master.Block_Id = b.Block_Id
LEFT JOIN district_master d ON b.District_Id = d.District_Id
LEFT JOIN state_master s ON d.State_Id = s.State_Id WHERE EMP_Code = 
(SELECT CM_Emp_Code FROM cm_login WHERE CM_Id =".$_SESSION['cmid'].")  ");
$cm_code=$db->ExecuteQuery("SELECT Center_Code,CM_Password, CM_Contact_No,CM_Emaill FROM cm_login WHERE CM_Id =".$_SESSION['cmid']);
// get all image
$sql_image="SELECT CM_Image,S_NO FROM cm_image_gallery WHERE CM_Id = ".$_SESSION['cmid'];

$getAllimage=$db->ExecuteQuery($sql_image);

?>
<!-- Write here Content-->
<div>
  <div class="page-title">
    <div class="title_left">
      <h3><i class="fa fa-user" aria-hidden="true"></i> My Profile</h3>
    </div>
  </div>
  
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        
        <div class="x_content">

                  <div class="col-md-3 col-sm-3 col-xs-12 profile_left">

                    <div class="profile_img">

                      <!-- end of image cropping -->
                      <div id="crop-avatar">
                        <!-- Current avatar -->
                        <div class="avatar-view" title="Change the avatar">
                         <img width="50px;" src="<?php echo PATH_DATA_IMAGE ?>/employee/thumb/<?php echo $cmImg[1]['EMP_Image'];?>" alt="" />
                        </div>
                      </div>
                      <!-- end of image cropping -->

                    </div>
                    
                    <h3><?php echo $cmImg[1]['EMP_Name']; ?></h3>

                    <ul class="list-unstyled user_data">
                      <li><i class="fa fa-map-marker user-profile-icon"></i> <?php echo $cmImg[1]['EMP_Address'].', '. $cmImg[1]['Block_Name'].', '.$cmImg[1]['District_Name'].', '.$cmImg[1]['State_Name']; ?>
                      </li>

                      <li>
                        <i class="fa fa-briefcase fa fa-graduation-cap"></i> <?php echo $cmImg[1]['EMP_Designation']; ?>
                      </li>

                      <li class="m-top-xs">
                        <i class="fa fa-external-link fa fa-envelope"></i>
                        <a href="mailTo:<?php echo $cmImg[1]['Email']; ?>"><?php echo $cmImg[1]['EMP_Email']; ?></a>
                      </li>
                      
                      <li class="m-top-xs">
                        <i class="fa fa-phone-square"></i> <?php echo $cmImg[1]['EMP_Contact']; ?>
                      </li>
                    </ul>
                    
                    <h3 class="sign-head">Signature</h3>
                    <div class="signature">
                      <img src="<?php echo PATH_DATA_IMAGE.'/employee/signature/thumb/'.$cmImg[1]['EMP_Image']; ?>" alt="Avatar">
                     
                    </div>
                    
                    
 
                
                  </div>

                  
                  <div class="col-md-9 col-sm-9 col-xs-12">
                   <div class="center details">
                      

                    <div class="profile_title">
                      <div class="col-md-6">
                        <h2>Personal Details</h2>
                      </div>
                      <div class="col-md-6">
                        <div id="reportrange" class="pull-right" style="margin-top: 5px; background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #E6E9ED">
                          <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                          <span>Joining Date: <?php echo $cmImg[1]['DOJ']; ?></span> <b class="caret"></b>
                    


                        </div>
                      </div>
                    </div>
                  


                 
                     
                      
                       
                    
                    
                       
                                         <div class="data-row">
                                         <div class="col-sm-3">Center Contact_No</div>
                            <div class="col-sm-7"><?php echo $cm_code[1]['CM_Contact_No']; ?></div>
                             <div class="col-sm-3">Center Email</div>
                            <div class="col-sm-7"><?php echo $cm_code[1]['CM_Emaill']; ?></div>
                        	<div class="col-sm-3">EMPloyee Code</div>
                            <div class="col-sm-7"><?php echo $cmImg[1]['EMP_Code']; ?></div>
                        </div>
                        <div class="data-row">
                        	<div class="col-sm-3">Password</div>
                            <div class="col-sm-7"><?php echo $cm_code[1]['CM_Password']; ?></div>
                        </div>
                       
                        
                    </div>
                    <!-- end of user-activity-graph -->
                    
                    <div class="" role="tabpanel" data-example-id="togglable-tabs" style="margin-top:50px;">

                        <div id="myTabContent" class="tab-content">
                        <h1>Image Gallery</h1>
                        <?php 

                              $i=1;
                              foreach($getAllimage as $value){ 
                               ?>
                          <div class="col-sm-3 imgBlck">
                            
                              <div class="galleryImg"><img width="100%" src="<?php echo PATH_DATA_IMAGE_CM."/img-gallery/thumb/".$value['CM_Image'];?>" alt="" /></div>
                            <div>
                             
                            </div>
                            
                          </div>
                          <?php $i++; }?>
                                      	
                      
                        </div>
                        
                        
                      </div>
                    </div>
                  </div>
                </div>
        
      </div>
    </div>
  </div>
  
  
</div>



<?php 
require_once(PATH_STUDENT_INCLUDE.'/footer.php');

?>
