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
      formdata.append('type', "all");
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
            <div id="displayInfo"></div>
        </div>
      </div>
    </div>
  </div>
  
  
</div>
<?php require_once(PATH_CM_INCLUDE.'/footer.php'); ?>