<?php
include('../../config.php'); 
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
include(PATH_STUDENT_INCLUDE.'/header.php');
$db = new DBConn();

?>
<script type="text/javascript" src="document.js"></script>

<div id="loading">
    <div class="loader-block"><i class="fa-li fa fa-spinner fa-spin spinloader"></i></div>
</div>

<div>
  <div class="page-title">
    <div class="title_left">
      <h3><i class="glyphicon glyphicon-plus"></i> Upload Document</h3>
    </div>
  </div>
  
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Upload New</h2>
          <ul class="nav navbar-right panel_toolbox">
            <li>
              <span><a class="btn btn-primary" href="list.php"><i class="glyphicon glyphicon-share-alt"></i> View Document List</a></span>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
        	<form class="form-horizontal" role="form" id="insertDoc" method="post">
              <div>
                <div class="form-group">
                  <label class="control-label col-sm-4 mandatory" for="doc_name">Document Name :</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" id="doc_name" name="doc_name" placeholder="Ex: Voter Id Card" />
                  </div>
                </div>
                
                <div class="item form-group">
                  <label class="control-label col-md-4 col-sm-4 col-xs-12" for="fileupload">Updoad Document <span class="required">*</span> </label>
                  <div class="col-md-5 col-sm-5 col-xs-12">
                        <input type="file" id="fileupload" name="fileupload" required="required" class="form-control col-md-7 col-xs-12" accept="pdf">
                        <span id="errmsg"></span> (Note : Only JPG, PNG, GIF Can Upload.) </div>
                  </div>
                
                <hr />
                
                <div class="form-group">
                  <div class="col-sm-4"></div>
                  <div class="col-sm-3">
                    <input type="button" class="btn btn-primary btn-sm" id="submit" value="Submit">
                    <input type="reset" class="btn btn-default btn-sm" id="reset" value="Reset">
                  </div>
                </div>
              </div>
            </form>
        </div>
      </div>
    </div>
  </div>
  
  
</div>
<?php require_once(PATH_STUDENT_INCLUDE.'/footer.php'); ?>