<?php
include('../../config.php'); 
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
include(PATH_ADMIN_INCLUDE.'/header.php');
$db = new DBConn();

// get all list of news
$getNews=$db->ExecuteQuery("SELECT * FROM news WHERE News_Id=".$_GET['id']);

?>
<script type="text/javascript" src="news.js" ></script>

<div class="main">
  <div class="page-title">
        <div>
            <div class="col-lg-5 pull-left"><h4><i class="glyphicon glyphicon-edit"></i> Edit News</h4></div>
        </div>
        <div class="clearfix">&nbsp;</div>
    </div>
  
  
  <div class="clear formbgstyle">
    <form class="form-horizontal" role="form" id="editNews" method="post">
      <div>
        <div class="form-group">
          <label class="control-label col-sm-3 mandatory" for="news">News:<span>*</span>:</label>
          <div class="col-sm-4">
            <textarea  class="form-control input-sm txtarea" id="news" name="news" placeholder="Training Center Address"><?php echo $getNews[1]['News_Content']; ?></textarea>
          </div>
        </div>
        
        
        <div class="form-group">
          <div class="col-sm-3"></div>
          <div class="col-sm-3">
          	<input type="hidden" id="Newsid" value="<?php echo $getNews[1]['News_Id']; ?>">
            <input type="button" class="btn btn-primary btn-sm" id="edit" value="Update">
            <input type="reset" class="btn btn-default btn-sm" id="reset" value="Reset">
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
