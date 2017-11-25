<?php 
include('../../config.php'); 
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
require_once(PATH_LIBRARIES.'/classes/resize.php');
require_once(PATH_LIBRARIES.'/classes/send_sms.php');
require (ROOT."/PHPMailer-master/class.phpmailer.php");
$db = new DBConn();
error_reporting(null);

///*******************************************************
/// for Student invalid ///////////////////////////////////
///*******************************************************
if($_POST['type']=="InvalidStudentCode")
{
	
	$sql=$db->ExecuteQuery("SELECT EXISTS( SELECT 1 FROM student_master WHERE Student_Code='".$_POST['student_code']."' AND CM_Id=".$_SESSION['cmid']." ) AS 'Find'");
	
	echo $sql[1]['Find'];	  
}

///*******************************************************
/// Get Student name /////////////////////////////////
///*******************************************************

if($_POST['type']=="getStudentInfo")
{
	 if(!empty($_POST['course_code']))
	 {
        $a=array();
	 	$total=0;
	 	$code=explode(',',$_POST['course_code']);
	 	?>
	 	<table class="table table-striped table-hover jambo_table">
				<thead>
				<tr class="headings"><td colspan="2">
				STUDENT LIST
				</td>
				</tr>
				</thead>
				<?php
				$getfees=$db->ExecuteQuery("select sum(fees_payment.Paid_Amt) as amount,Student_Id from fees_payment GROUP BY fees_payment.Student_Id ORDER BY `fees_payment`.`Student_Id`");
			for($i=0;$i<count($code);$i++)
			{
	 	
    $get_resg_fees=$db->ExecuteQuery("select Registration_Fee from course_master where Course_Id='".$code[$i]."'");
  	
    ?>
	 
				<?PHP 
				$count_result=0;

foreach($getfees as $result)
{
   $getstudent=$db->ExecuteQuery("select * from student_master where Student_Id='".$result['Student_Id']."'
   and student_master.Course_Id ='".$code[$i]."'");
   
           if($result['amount']>=$get_resg_fees[1]['Registration_Fee'])
                {
    
        $student_id.= $getstudent[1]['Student_Id'].",";
        
?>    

                  <tr><td><?php echo $getstudent[1]['Student_Name']; ?></td></tr>


<?php
     $count_result++;
                }  //IF CLOSE
}  
$total+=$get_resg_fees[1]['Registration_Fee']*$count_result;
 ?> 
 
<?PHP
 } //if close
 ?>
			
</table>
<div>
Total amount:   <?php echo $total; ?>
</br>
Mode :
cash<input type="radio" name="mode" id="cash" class="mode" value="cash" checked></br>
cheque<input type="radio" name="mode" class="mode" value="cheque" ></br>

dd<input type="radio" name="mode" id="dd" class="mode" value="dd"></br>

neft<input type="radio" name="mode" id="neft" class="mode" value="neft"></br>
<input type="text" name="tranisation" id="cheque_no" value="" style="display:none;"/>
<input type="hidden" name="get_val" id="get_val" value="<?php echo $student_id;?>"/>
AMOUNT SUBMIT<input type="button" name="save" id="save"  value="Pay Regestration"></br>
</div>

<?php

}//explode end


}   //FOR MAIN CLOSE

///*******************************************************
/// To Insert FEES  /////////////////////////////////
///*******************************************************
if($_POST['type']=='regestration_fees_send')
{

	$student_id=explode(',',$_POST['student']);
	$mode=$_POST['mode'];
	for($i=0;$i<count($student_id);$i++)
	{
		
if($student_id[$i]!="")
{
	
	$res=mysql_query("INSERT INTO sent_reg_fees (Sent_id, Paid_Amt, Payment_Mode, Cheque_DD_No, Transaction_No, Which_Bank_Cheque_DD, Student_Id,Receipt_no,CM_Id) 			
		
	VALUES (NOW(), ".$_REQUEST['amount'].", ".$_REQUEST['paymentmode'].", '".$_REQUEST['cDDNo']."', '".$_REQUEST['transactionNo'].
	"', '".$_REQUEST['bank']."', ".$_REQUEST['studentid'].",$receipt_no, ".$_SESSION['cmid'].")");	
}

	}

}

///*******************************************************
/// To Insert NOTICE  /////////////////////////////////
///*******************************************************
if($_POST['type']=="sendNotice")
{
	
	$notice = mysql_real_escape_string($_REQUEST['notice']);
	/////////////////////////////////////////////////////
	// Query to insert the data into center_notice table
	/////////////////////////////////////////////////////
	$res=mysql_query("INSERT INTO center_notice (Notice_Date, Notice, Student_Id, CM_Id) 			
		
	VALUES (NOW(), '".$notice."', ".$_REQUEST['student_id'].", ".$_SESSION['cmid'].")");	
	
	if(!$res)
	{
	  echo 0;
	}
	 else
	{	
	  echo 1;
	}
}

///*******************************************************
/// Edit Notice
///*******************************************************
if($_POST['type']=="editNotice")
{
	
			
		$notice = mysql_real_escape_string($_REQUEST['notice']);
	
		// Update Center Notice Tabel
		$tblname="center_notice";		
		$tblfield=array('Notice','Student_Id');		
		$tblvalues=array($notice, $_POST['student_id']);
		
		$condition="Notice_Id=".$_POST['notice_id'];
		$res=$db->updateValue($tblname,$tblfield,$tblvalues,$condition);
		
		if(!$res)
		{
		  echo 0;
		}
		 else
		{	
		  echo 1;
		}
	
		
}


///*******************************************************
/// Delete row from franchise_master table
///*******************************************************
if($_POST['type']=="delete")
{		
	 $tblname="center_notice";
	 $condition="Notice_Id=".$_POST['id'];
	 $res=$db->deleteRecords($tblname,$condition);	 
}


?>