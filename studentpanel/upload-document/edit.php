<?php
include('../../config.php'); 
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
$db = new DBConn();

include(PATH_STUDENT_INCLUDE.'/header.php');

// get all list of student document 
$getdoc=$db->ExecuteQuery("SELECT Doc_Id, Doc_Name, Doc_File FROM student_document
WHERE Doc_Id =".$_GET['id']);

?>
<script type="text/javascript"  src="document.js"></script>

<div>
  <div class="page-title">
    <div class="title_left">
      <h3><i class="glyphicon glyphicon-edit"></i> Edit Document</h3>
    </div>
  </div>
  
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>List</h2>
          <ul class="nav navbar-right panel_toolbox">
            <li>
              <span><a class="btn btn-primary" href="list.php"><i class="glyphicon glyphicon-share-alt"></i> View Document List</a></span>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
        	<form class="form-horizontal" role="form" id="editDoc" action="" method="post">
              <div>
                
                <div class="form-group">
                  <label class="control-label col-sm-4 mandatory" for="doc_name">Document Name :</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" id="doc_name" name="doc_name" placeholder="Ex: Voter Id Card" value="<?php echo  $getdoc[1]['Doc_Name']; ?>" />
                  </div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-4 control-label mandatory" for="filebutton">Upload Document <span>*</span>:</label>
                    <div class="col-md-4">
                        
                      <input type="hidden" id="doc-img" name="doc-img" value="<?php echo $getdoc[1]['Doc_File']?>"/>
                        
                <?php if(!empty($getdoc[1]['Doc_File']) && file_exists(ROOT."/documents/student-doc/".$getdoc[1]['Doc_File']))
                    { 
                        echo '<div class="col-md-4"><img width="100%" src="'.PATH_DATA_DOC."/student-doc/thumb/".$getdoc[1]['Doc_File'].'"/></div>';
                    } 
                      else{
                          echo '<label class="col-md-4 control-label" for="fileupload"><span class="glyphicon glyphicon-user" style="font-size:50pt;"></span></label>';
                      }
                          ?>                
                        <input class="col-md-8" type="file" id="fileupload" name="fileupload" accept="image/jpg,image/png,image/jpeg,image/gif"/>
                        
                   </div>
                </div>
                
                <div class="form-group">
                  <div class="col-sm-4"></div>
                  <div class="col-sm-3">
                    <input type="hidden" id="doc_id" name="doc_id" value="<?php echo $getdoc[1]['Doc_Id'] ?>">
                    
                    <input type="button" class="btn btn-primary btn-sm" id="edit" value="Update">
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

<?php include(PATH_STUDENT_INCLUDE.'/footer.php'); ?>