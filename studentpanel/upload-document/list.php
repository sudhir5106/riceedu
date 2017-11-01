<?php
include('../../config.php'); 
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
$db = new DBConn();

include(PATH_STUDENT_INCLUDE.'/header.php');

// get all list of student documents 
$getdoc=$db->ExecuteQuery("SELECT Doc_Id, Doc_Name, Doc_File FROM student_document
WHERE Student_Id =".$_SESSION['sid']);

?>
<script type="text/javascript"  src="document.js"></script>
<div>
  <div class="page-title">
    <div class="title_left">
      <h3><i class="glyphicon glyphicon-list"></i> List of Documents</h3>
    </div>
  </div>
  
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>List</h2>
          <ul class="nav navbar-right panel_toolbox">
            <li>
              <span><a class="btn btn-primary" href="index.php"><i class="glyphicon glyphicon-share-alt"></i> Upload New Document</a></span>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
        	<table class="table table-hover table-stripped table-bordered table-condensed">
              <thead>
                <tr class="success">
                  <th>Sno.</th>
                  <th>Document Name</th>
                  <th>File</th>                 
                  <!--<th>Action</th>-->
                </tr>
              </thead>
              <tbody>
                <?php 
                    $i=1;
                    foreach($getdoc as $getdocVal){ ?>
                <tr>
                  <td><?php echo $i;?></td>
                  <td><?php echo $getdocVal['Doc_Name']; ?></td>
                  <td><img width="50px;" src="<?php echo PATH_DATA_DOC ?>/student-doc/thumb/<?php echo $getdocVal['Doc_File'];?>" alt="" /></td>
                  <!--<td><button type="button" id="editbtn" class="btn btn-success btn-xs" onClick="window.location.href='edit.php?id=<?php echo $getdocVal['Doc_Id'];?>'" > <span class="glyphicon glyphicon-edit"></span> </button>
                    <button type="button" class="btn btn-danger btn-xs delete" id="<?php echo $getdocVal['Doc_Id']; ?>" name="delete"> <span class="glyphicon glyphicon-trash"></span> </button></td>-->
                </tr>
                <?php $i++;} ?>
              </tbody>
            </table>            
        </div>
      </div>
    </div>
  </div>
  
</div>
<?php require_once(PATH_STUDENT_INCLUDE.'/footer.php'); ?>