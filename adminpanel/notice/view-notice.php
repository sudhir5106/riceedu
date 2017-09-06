<?php
include('../../config.php'); 
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
include(PATH_ADMIN_INCLUDE.'/header.php');
$db = new DBConn();

// get all list of Notice /
$getnotice=$db->ExecuteQuery("SELECT Notice_Id, DATE_FORMAT(Notice_Date,'%d-%m-%Y') AS Notice_Date, Notice, Student_Name, Student_Code

FROM ho_notice hn

LEFT JOIN student_master st ON hn.Student_Id = st.Student_Id");

?>

<div class="main">
	<div class="page-title">
        <div>
            <div class="col-lg-5 pull-left"><h4><i class="glyphicon glyphicon-list"></i> List of Notice</h4></div>
            <div class="col-lg-5 pull-right">
                <div class="ef_header_tools pull-right">
                    <a class="btn btn-primary" href="index.php" title="Send Notice"><i class="glyphicon glyphicon-plus"></i>Send Notice</a>
                </div>
            </div>
        </div>
        <div class="clearfix">&nbsp;</div>
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

<?php require_once(PATH_ADMIN_INCLUDE.'/footer.php'); ?>