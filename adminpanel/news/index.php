<?php
include('../../config.php'); 
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
include(PATH_ADMIN_INCLUDE.'/header.php');
$db = new DBConn();

// get all list of news
$getNews=$db->ExecuteQuery("SELECT * FROM news ORDER BY News_Id DESC");

?>
<script type="text/javascript" src="news.js" ></script>

<div class="main">
  <div class="page-title">
        <div>
            <div class="col-lg-5 pull-left"><h4><i class="glyphicon glyphicon-plus"></i> Add News</h4></div>
        </div>
        <div class="clearfix">&nbsp;</div>
    </div>
  
  
  <div class="clear formbgstyle">
    <form class="form-horizontal" role="form" id="insertNews" method="post">
      <div>
        <div class="form-group">
          <label class="control-label col-sm-3 mandatory" for="news">News:<span>*</span>:</label>
          <div class="col-sm-4">
            <textarea  class="form-control input-sm txtarea" id="news" name="news" placeholder="Training Center Address"></textarea>
          </div>
        </div>
        
        
        <hr />
        <div class="form-group">
          <div class="col-sm-3"></div>
          <div class="col-sm-3">
            <input type="button" class="btn btn-primary btn-sm" id="submit" value="Submit">
            <input type="reset" class="btn btn-default btn-sm" id="reset" value="Reset">
          </div>
        </div>
      </div>
    </form>
    <table class="table table-hover table-bordered" id="addedProducts">
      <thead>
        <tr class="success">
          <th>Sno.</th>
          <th>Date &amp; Time ( yy:mm:dd )</th>
          <th>News</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php 
            $i=1;
            foreach($getNews as $getNewsVal){ ?>
        <tr>
          <td><?php echo $i;?></td>
          <td><?php echo $getNewsVal['News_Date_Time'];?></td>
          <td><?php echo $getNewsVal['News_Content'];?></td>
          
          <td><button type="button" id="editbtn" class="btn btn-success btn-sm" onClick="window.location.href='edit_news.php?id=<?php echo $getNewsVal['News_Id'];?>'" > <span class="glyphicon glyphicon-edit"></span> Edit </button>
            <button type="button" class="btn btn-danger btn-sm delete" id="<?php echo $getNewsVal['News_Id']; ?>" name="delete"> <span class="glyphicon glyphicon-trash"></span> Delete </button></td>
        </tr>
        <?php $i++;} ?>
      </tbody>
    </table>
  </div>
</div>
