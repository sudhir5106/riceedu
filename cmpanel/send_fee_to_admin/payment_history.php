
<?php
include('../../config.php'); 
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
$db = new DBConn();
include(PATH_CM_INCLUDE.'/header.php');

/////for course_//////
$a=array();
$sql="SELECT * from course_master";
$res=$db->ExecuteQuery($sql);

        
///////////////////// for submit///
if($_SERVER['REQUEST_METHOD']=='POST')
{
        
    if($_POST['student_name']!="")
    {    $client_name = explode("-",$_POST['student_name']);

       $getdetails=$db->ExecuteQuery("select sent_reg_fees_details.Student_Id,student_master.Student_Name,student_master.Student_Code,course_master.Course_Name,course_master.  Registration_Fee   from sent_reg_fees_details
left join student_master on sent_reg_fees_details.Student_Id=student_master.Student_Id
left join sent_reg_fees on sent_reg_fees_details.Sent_Id=sent_reg_fees.Sent_Id 
left join course_master on course_master.Course_Id=student_master.Course_Id
where student_master.Student_Code='".$client_name[1]."'");



    }



if($_POST['course_id']!="")
    {    
       
       $getdetails=$db->ExecuteQuery("select sent_reg_fees_details.Student_Id,student_master.Student_Name,student_master.Student_Code,course_master.Course_Name,course_master.  Registration_Fee   from sent_reg_fees_details
left join student_master on sent_reg_fees_details.Student_Id=student_master.Student_Id
left join sent_reg_fees on sent_reg_fees_details.Sent_Id=sent_reg_fees.Sent_Id 
left join course_master on course_master.Course_Id=student_master.Course_Id
where student_master.Course_Id='".$_POST['course_id']."'");



    }
if($_POST['course_id']!="" && $_POST['student_name']!="")
    {    
       $client_name = explode("-",$_POST['student_name']);
       $getdetails=$db->ExecuteQuery("select sent_reg_fees_details.Student_Id,student_master.Student_Name,student_master.Student_Code,course_master.Course_Name,course_master.  Registration_Fee   from sent_reg_fees_details
left join student_master on sent_reg_fees_details.Student_Id=student_master.Student_Id
left join sent_reg_fees on sent_reg_fees_details.Sent_Id=sent_reg_fees.Sent_Id 
left join course_master on course_master.Course_Id=student_master.Course_Id
where student_master.Course_Id='".$_POST['course_id']."' and student_master.Student_Code='".$client_name[1]."'");



    }

}
/////////////////////////////

?>

<script>

$(document).ready(function()
{ 



var clientcodelist = [

<?php
$get_resg_fees=$db->ExecuteQuery("select sent_reg_fees_details.Student_Id,student_master.Student_Name,student_master.Student_Code from sent_reg_fees_details
left join student_master on sent_reg_fees_details.Student_Id=student_master.Student_Id
left join sent_reg_fees on sent_reg_fees_details.Sent_Id=sent_reg_fees.Sent_Id 

where student_master.CM_Id='".$_SESSION['cmid']."'");
foreach($get_resg_fees as $val) {
          echo '"'.$val['Student_Name'].'-'.$val['Student_Code'].'", ';
        } // PHP ends here*/

?>
];// eof json format
$("#student_name").autocomplete({
         
      source: function(req, responseFn) {
        var re = $.ui.autocomplete.escapeRegex(req.term);
        var matcher = new RegExp( "^" + re, "i" );
        var a = $.grep( clientcodelist, function(item,index){
          return matcher.test(item);
        });
        responseFn( a );
      }
    });//eof autocomplete

});
</script>





<script type="text/javascript" src="fees.js"></script>

<div id="loading">
    <div class="loader-block"><i class="fa-li fa fa-spinner fa-spin spinloader"></i></div>
</div>

<div>
  <div class="page-title">
    <div class="title_left">
      <h3><i class="fa fa-inr" aria-hidden="true"></i> Check History</h3>
    </div>
  </div>
  
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Search for Student Course Wise</h2>
          
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
        	<form class="form-horizontal" role="form" id="payment_history" method="post">
              <div>
                <div class="form-group">
                  <label class="control-label col-sm-4 mandatory" for="student_code">Course <span>*</span>:</label>
                  <div class="col-sm-4">

                    <select name="course_id"  id="course_id" class="form-control"  tabindex="1">
                              <option value="">---select any one---</option>
                        <?php
                       foreach($res as $course)
                       {                     
                         // $studentIdList = $db->ExecuteQuery("SELECT Student_Id, SUM(Paid_Amt) FROM fees_payment GROUP BY Student_Id");
                      //  print_r($studentIdList);
                  //    $list=$db->ExecuteQuery("SELECT * from student_master GROUP BY Student_Id where Payment_Status='0' and  Course_Id='".$course['Course_Id']."' ");
                    //    echo "SELECT * from student_master where Payment_Status='0' and  Course_Id='".$course['Course_Id']."' GROUP BY Student_Id" ;
                         
                       ?>
                          <option value="<?php echo $course['Course_Id']; ?>"><?php echo $course['Course_Name'];  ?></option>
                      <?php
                       }  
                    
                      ?>
                    </select>
                   
                  </div>
               
              
              
                  </div>
               <div class="form-group">
                   <label class="control-label col-sm-4 mandatory" for="student_code">Name <span>*</span>:</label>
                  <div class="col-sm-4">
                     <input type="text" name="student_name" id="student_name" value=""/>
                </div>
                  </div>



                
                <div class="form-group">
                  <div class="col-sm-4"></div>
                  <div class="col-sm-3">
                  
<button type="button" class="btn btn-primary btn-sm" id="search_history"><i class="fa fa-search"></i> Search</button>
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

