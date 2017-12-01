<?php
include('../../config.php'); 
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
$db = new DBConn();
include(PATH_CM_INCLUDE.'/header.php');

/////for course_//////
$a=array();
$sql="SELECT * from course_master";
$res=$db->ExecuteQuery($sql);

        
/////////////////////

?>
<script type="text/javascript" src="fees.js"></script>

<div id="loading">
    <div class="loader-block"><i class="fa-li fa fa-spinner fa-spin spinloader"></i></div>
</div>

<div>
  <div class="page-title">
    <div class="title_left">
      <h3><i class="fa fa-inr" aria-hidden="true"></i> Send Registration Fees To Admin</h3>
    </div>
  </div>
  
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Search for Student Course Wise</h2>
          
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
        	<form class="form-horizontal" role="form" id="findstudentFrm" method="post">
              <div>
                <div class="form-group">
                  <label class="control-label col-sm-4 mandatory" for="student_code">Course <span>*</span>:</label>
                  <div class="col-sm-4">

                    <select name="course_code"  id="course_code" size="3" multiple="multiple" class="form-control"  tabindex="1">
                        <?php
                       foreach($res as $course)
                       {                     
                         // $studentIdList = $db->ExecuteQuery("SELECT Student_Id, SUM(Paid_Amt) FROM fees_payment GROUP BY Student_Id");
                      //  print_r($studentIdList);
                  //    $list=$db->ExecuteQuery("SELECT * from student_master GROUP BY Student_Id where Payment_Status='0' and  Course_Id='".$course['Course_Id']."' ");
                    //    echo "SELECT * from student_master where Payment_Status='0' and  Course_Id='".$course['Course_Id']."' GROUP BY Student_Id" ;
                         
                       ?>
                          <option value="<?php echo $course['Course_Id']; ?>"><?php echo $course['Course_Name'];  ?></option>
                      <?php
                       }  
                    
                      ?>
                    </select>






                   
                  </div>
                </div>
                
                <div class="form-group">
                  <div class="col-sm-4"></div>
                  <div class="col-sm-3">
                    <button type="button" class="btn btn-primary btn-sm" id="search"><i class="fa fa-search"></i> Search</button>
                  </div>
                </div>
                
                <hr />
                
              </div>
            </form>
            <div id="displayInfo"></div>
        </div>
      </div>
    </div>
  </div>
  
  
</div>
<?php require_once(PATH_CM_INCLUDE.'/footer.php'); ?>