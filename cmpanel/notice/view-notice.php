<?php
include('../../config.php'); 
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
$db = new DBConn();
include(PATH_CM_INCLUDE.'/header.php');


// get all list of Notice /
$getnotice=$db->ExecuteQuery("SELECT Notice_Id, DATE_FORMAT(Notice_Date,'%d-%m-%Y') AS Notice_Date, Notice, Student_Name, Student_Code

FROM center_notice cn

LEFT JOIN student_master st ON cn.Student_Id = st.Student_Id

WHERE cn.CM_Id =".$_SESSION['cmid']);

?>

<div>
  <div class="page-title">
    <div class="title_left">
      <h3><i class="glyphicon glyphicon-list"></i> List of Notice</h3>
    </div>
  </div>
  
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>List</h2>
          <ul class="nav navbar-right panel_toolbox">
            <li>
              <span><a class="btn btn-primary" href="index.php"><i class="glyphicon glyphicon-share-alt"></i> Send Notice</a></span>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
        	<table class="table table-hover table-bordered table-condensed">
              <thead>
                <tr class="success">
                  <th>Sno.</th>
                  <th width="90">Notice Date</th>
                  <th>Student Name- Code</th>
                  <th>Notice</th>                  
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                    $i=1;
                    foreach($getnotice as $getnoticeVal){ ?>
                <tr>
                  <td><?php echo $i;?></td>
                  <td><?php echo $getnoticeVal['Notice_Date']; ?></td>
                  <td><?php echo $getnoticeVal['Student_Name'].'-'.$getnoticeVal['Student_Code'];?></td>
                  <td><?php echo $getnoticeVal['Notice']; ?></td>
                  
                  <td><button type="button" id="editbtn" class="btn btn-success btn-xs" onClick="window.location.href='edit_notice.php?id=<?php echo $getnoticeVal['Notice_Id'];?>'" > <span class="glyphicon glyphicon-edit"></span> </button>
                    <button type="button" class="btn btn-danger btn-xs delete" id="<?php echo $getnoticeVal['Notice_Id']; ?>" name="delete"> <span class="glyphicon glyphicon-trash"></span> </button></td>
                </tr>
                <?php $i++;} ?>
              </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>
  
</div>
<?php require_once(PATH_CM_INCLUDE.'/footer.php'); ?>