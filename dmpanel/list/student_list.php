<?php
include('../../config.php'); 
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
$db = new DBConn();
include(PATH_DM_INCLUDE.'/header.php');


?>

<script>
$(document).ready(function()
{
           var formdata = new FormData();
           var c_id= $('#c_id').val();
      formdata.append('type', "findstudentfrm");
      formdata.append('student_code', " ");
      formdata.append('c_id',c_id);
$.ajax({
         type: "POST",
         url: "list_curd.php",
         data:formdata,
         success: function(data){ //alert(data);
          
          if(data)
          {
            $('#displayInfo').html(data);
          }
          
        },
         cache: false,
         contentType: false,
         processData: false
      });//eof ajax  


});
</script>


<script type="text/javascript" src="list.js"></script>

<div id="loading">
    <div class="loader-block"><i class="fa-li fa fa-spinner fa-spin spinloader"></i></div>
</div>

<div>
  <div class="page-title">
    <div class="title_left">
      <h3> Student List</h3>
    </div>
  </div>
  
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Search Student</h2>
          
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
        	<form class="form-horizontal" role="form" id="findstudentfrm" method="post">
              <div>
                <div class="form-group">
                  <label class="control-label col-sm-4 mandatory" for="student_code">Student Code <span>*</span>:</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="student_code" name="student_code" placeholder="Student Code" />
                     <input type="hidden" class="form-control" id="c_id" name="c_id" value="<?php echo $_GET['c_id'];?>" />
                  </div>
                </div>
                
                <div class="form-group">
                  <div class="col-sm-4"></div>
                  <div class="col-sm-3">
                    <button type="button" class="btn btn-primary btn-sm" id="search_student"><i class="fa fa-search"></i> Search</button>
                  </div>
                </div>
                
                <hr />
                
              </div>
            </form>
            <div id="displayInfo">




            </div>
        </div>
      </div>
    </div>
  </div>
  
  
</div>
<?php require_once(PATH_CM_INCLUDE.'/footer.php'); ?>