<?php
include('../../config.php'); 
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
$db = new DBConn();
include(PATH_RM_INCLUDE.'/header.php');

 
  $sql_sm=$db->ExecuteQuery("select R_Emp_Code from rm_login where R_Id='".$_SESSION['rmid']."'");
  $getdetails=$db->ExecuteQuery("SELECT Center_Code FROM cm_login WHERE  DM_Emp_Code='".$_GET['c_id']."'");
 // $getdetails=$db->ExecuteQuery("select DM_Emp_Code from dm_login where R_Emp_Code='".$sql_sm[1]['R_Emp_Code']."'");
  



?>



<script type="text/javascript" src="list.js"></script>

<div id="loading">
    <div class="loader-block"><i class="fa-li fa fa-spinner fa-spin spinloader"></i></div>
</div>

<div>
  <div class="page-title">
    <div class="title_left">
      <h3> Center List</h3>
    </div>
  </div>
  
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Search Center</h2>
          
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
        	<form class="form-horizontal" role="form" id="findcmFrm" method="post">
              <div>
                <div class="form-group">
                  <label class="control-label col-sm-4 mandatory" for="center_Code">Center Code <span>*</span>:</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="center_Code" name="center_Code" placeholder="Center Code" />
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
            <div id="displayInfo">

              <table class="table table-striped table-hover jambo_table">
            <thead>
                <tr class="headings">
                  <td>Center Code</td>
                  </tr>
            </thead>
              
<?php
             foreach($getdetails as $result)
             {?>
              
                    <tr class="">
                <td><a href="student_list.php?c_id=<?php echo $result['Center_Code']; ?>"><?php echo $result['Center_Code']; ?></a></td>
                   </tr>

          <?php 
            }

?>

</table>

            </div>
        </div>
      </div>
    </div>
  </div>
  
  
</div>
<?php require_once(PATH_CM_INCLUDE.'/footer.php'); ?>