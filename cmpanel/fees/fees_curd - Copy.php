<?php 
include('../../config.php'); 
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
require_once(PATH_LIBRARIES.'/classes/resize.php');
require_once(PATH_LIBRARIES.'/classes/send_sms.php');
$db = new DBConn();

require (ROOT."/PHPMailer-master/class.phpmailer.php");


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
	 if(!empty($_POST['student_code'])){
	 	
		$sql_student="SELECT Student_Id, Student_Name, Father_Name, Mother_Name, Photo, Course_Name, Application_Fee, Learning_Fee, Registration_Fee, Exam_Fee, CASE WHEN Mode='regular' THEN 'Regular' WHEN Mode='online' THEN 'Online' WHEN Mode='private' THEN 'Private' END AS Mode, Session, About_Fee_Deposite, CASE WHEN Mode='regular' THEN (Application_Fee + Learning_Fee + Registration_Fee + Exam_Fee) WHEN Mode='online' THEN (Application_Fee + Learning_Fee + Registration_Fee + Exam_Fee) WHEN Mode='private' THEN Exam_Fee END AS Total_Fees, (SELECT SUM(Paid_Amt) FROM fees_payment WHERE Student_Id=(SELECT Student_Id FROM student_master WHERE Student_Code=".$_POST['student_code'].")) AS Paid_Amt
		FROM student_master s
		
		LEFT JOIN course_master c ON s.Course_Id = c.Course_Id
		WHERE Student_Code=".$_POST['student_code']." AND CM_Id=".$_SESSION['cmid']; 
	 	$res=$db->ExecuteQuery($sql_student);

	 	$getfees=$db->ExecuteQuery("SELECT Payment_Id, DATE_FORMAT(Payment_Date,'%d-%m-%Y') AS Payment_Date, Paid_Amt, CASE WHEN Payment_Mode=1 THEN 'CASH' WHEN Payment_Mode=2 THEN 'CHEQUE/DD' WHEN Payment_Mode=3 THEN 'NEFT' END AS Payment_Mode, Cheque_DD_No, Transaction_No, Which_Bank_Cheque_DD FROM fees_payment WHERE Student_Id=".$res[1]['Student_Id']);
	
		if(!empty($res)){
			
			echo '
			<script>
				///////////////////////////////////
				// Payment form validation
				////////////////////////////////////
				$("#payentFrm").validate({
					rules: 
					{ 
						amount:
						{
							required: true,
							number:true,
							checkamt:true,	
							iszero:true,			
						},
						cDDNo:
						{
							required: true,
						},
						bank:
						{
							required: true,
						},
						transactionNo:
						{
							required: true,
						}
					},
					messages:
					{
						
					}
				});// eof validation
			</script>
			<div>
				<div class="col-sm-6">
					<div class="col-sm-3">
						<div style="width:120px; border:solid 1px #e5e5e5; padding:3px;"><img width="100%" src="'.PATH_DATA_IMAGE.'/student/'.$res[1]['Photo'].'" alt=""></div>
					</div>
					<div class="col-sm-9">
						<div style="height:30px;">
							<div class="col-sm-4">Student Name: </div>
							<div class="col-sm-8">'.strtoupper($res[1]['Student_Name']).'
							<input type="hidden" id="studentid" value="'.$res[1]['Student_Id'].'" >
							</div>
						</div>
						<div style="height:30px;">
							<div class="col-sm-4">Father Name: </div>
							<div class="col-sm-8">'.strtoupper($res[1]['Father_Name']).'</div>
						</div>
						<div style="height:30px;">
							<div class="col-sm-4">Mother Name: </div>
							<div class="col-sm-8">'.strtoupper($res[1]['Mother_Name']).'</div>
						</div>
						
						<div style="height:30px;">
							<div class="col-sm-4">Session: </div>
							<div class="col-sm-8">'.strtoupper($res[1]['Session']).'</div>
						</div>
						
					</div>
					<div class="clearfix"></div>
					<h4>About Fees Deposite</h4>
					<div>'.$res[1]['About_Fee_Deposite'].'</div>
				</div>
				<div class="col-sm-6" style="border-left:solid 1px #e5e5e5;">
					<div style="height:30px;">
						<div class="col-sm-4">Course Name: </div>
						<div class="col-sm-8">'.strtoupper($res[1]['Course_Name']).'</div>
					</div>
					<div style="height:30px;">
						<div class="col-sm-4">Mode: </div>
						<div class="col-sm-8"><span class="label label-info">'.$res[1]['Mode'].'</span></div>
					</div>';
					if($res[1]['Mode']!="Private"){ echo'

					<div style="height:30px;">
						<div class="col-sm-4"><strong>Application Fees</strong>: </div>
						<div class="col-sm-8">'.$res[1]['Application_Fee'].'</div>
					</div>
					<div style="height:30px;">
						<div class="col-sm-4"><strong>Learning Fees</strong>: </div>
						<div class="col-sm-8">'.$res[1]['Learning_Fee'].'</div>
					</div>
					<div style="height:30px;">
						<div class="col-sm-4"><strong>Registration Fees</strong>: </div>
						<div class="col-sm-8">'.$res[1]['Registration_Fee'].'</div>
					</div>
					<div style="height:30px;">
						<div class="col-sm-4"><strong>Exam Fees</strong>: </div>
						<div class="col-sm-8">'.$res[1]['Exam_Fee'].'</div>
					</div>';
					}
					if($res[1]['Mode']=="Private"){ echo'
					<div style="height:30px;">
						<div class="col-sm-4"><strong>Application Fees</strong>: </div>
						<div class="col-sm-8">'.$res[1]['Application_Fee'].'</div>
					</div>
					<div style="height:30px;">
						<div class="col-sm-4"><strong>Exam Fees</strong>: </div>
						<div class="col-sm-8">'.$res[1]['Exam_Fee'].'</div>
					</div>';
					}
					echo '
					<form class="form-horizontal form-label-left" action="" method="post" id="payentFrm" name="payentFrm">
						<div style="background-color: #f9f9f9; border-bottom:1px solid #eee; border-top:1px solid #eee; padding:5px 0;">
							<div class="col-sm-4"><strong>Total Fees</strong>: </div>
							<div class="col-sm-8">'.$res[1]['Total_Fees'].'</div>
							<div class="clearfix"></div>
						</div>
						<div style="background-color: #f9f9f9; border-bottom:1px solid #eee; border-top:1px solid #eee; padding:5px 0;">
							<div class="col-sm-4"><strong>Fees Paid</strong>: </div>
							<div class="col-sm-4"><input type="text" id="paidamt" name="paidamt" class="form-control input-sm col-md-7 col-xs-12 " placeholder="Rs." value="'.(empty($res[1]['Paid_Amt'])?'0':$res[1]['Paid_Amt']).'" readonly="readonly">
					  </div>
							<div class="clearfix"></div>
						</div>
						<div style="background-color: #f9f9f9; border-bottom:1px solid #eee; border-top:1px solid #eee; padding:5px 0;">
							<div class="col-sm-4"><strong>Balance Fees</strong>: </div>
							<div class="col-sm-4"><input type="text" id="balance" name="balance" class="form-control input-sm col-md-7 col-xs-12 " placeholder="Rs." value="'.($res[1]['Total_Fees']-$res[1]['Paid_Amt']).'" readonly="readonly"></div>
							<div class="clearfix"></div>
						</div>
						<div>&nbsp;</div>
					
					
						<div class="item form-group">
						  <label class="control-label col-sm-4" for="amount">Fees Payment <span class="required">*</span> </label>
						  <div class="col-sm-4">
							<input type="text" id="amount" name="amount" class="form-control col-md-7 col-xs-12 " placeholder="Rs." value="">
						  </div>
						</div>
						
						<div class="item form-group">
						  <label class="col-md-4 control-label" for="paymentmode">Payment Mode <span class="required">*</span></label>
						  <div class="col-md-8"> 
							<label class="radio-inline" for="paymentmode-0">
							  <input name="paymentmode" id="paymentmode-0" value="1" checked="checked" type="radio">
							  Cash
							</label> 
							<label class="radio-inline" for="paymentmode-1">
							  <input name="paymentmode" id="paymentmode-1" value="2" type="radio">
							  Cheque/DD
							</label>
							<label class="radio-inline" for="paymentmode-1">
							  <input name="paymentmode" id="paymentmode-2" value="3" type="radio">
							  NEFT
							</label>
						  </div>
						</div>
						
						<div id="chDdNo" style="display:none;">
							<div class="item form-group">
							  <label class="control-label col-sm-4" for="cDDNo">Cheque/DD No. <span class="required">*</span> </label>
							  <div class="col-sm-4">
								<input type="text" id="cDDNo" name="cDDNo" class="form-control col-md-7 col-xs-12 " placeholder="">
							  </div>
							</div>
							
							<div class="item form-group">
							  <label class="control-label col-sm-4" for="bank">Bank Name <span class="required">*</span> </label>
							  <div class="col-sm-6">
								<input type="text" id="bank" name="bank" class="form-control col-md-7 col-xs-12 " placeholder="">
							  </div>
							</div>
						</div>
						
						<div id="neftinfo" style="display:none">
							<div class="item form-group">
							  <label class="control-label col-sm-4" for="transactionNo">Transaction No. <span class="required">*</span> </label>
							  <div class="col-sm-6">
								<input type="text" id="transactionNo" name="transactionNo" class="form-control col-md-7 col-xs-12 " placeholder="">
							  </div>
							</div>
						</div>
						
						<div class="form-group">
						  <div class="col-sm-4"></div>
						  <div class="col-sm-3">
							<button type="button" class="btn btn-success btn-sm" name="pay" id="pay"><i class="fa fa-credit-card"></i> Submit Payment</button>
						  </div>
						</div>

					</form>
					
				</div>
				<div class="clearfix"></div>
			</div><hr />
			<table class="table table-striped table-hover jambo_table">
				<thead>
				<tr class="headings">
					<th class="column-title">Sno</th>
					<th class="column-title">Payment Date</th>
					<th class="column-title">Paid Amount</th>
					<th class="column-title">Mode</th>
					<th class="column-title">Cheque/ DD No.</th>
					<th class="column-title">NEFT Trans. No.</th>
					<th class="column-title">Bank Name</th>
				</tr>
				</thead>';
				$i = 1;
				foreach($getfees as $getfeesVal){ 
				
				echo '
				<tr>
					<td>'.$i.'</td>
					<td>'.$getfeesVal['Payment_Date'].'</td>
					<td>'.$getfeesVal['Paid_Amt'].'</td>
					<td>'.$getfeesVal['Payment_Mode'].'</td>
					<td>'.$getfeesVal['Cheque_DD_No'].'</td>
					<td>'.$getfeesVal['Transaction_No'].'</td>
					<td>'.$getfeesVal['Which_Bank_Cheque_DD'].'</td>
				</tr>';
				$i++;}
				echo '
			</table>
			';			
			
		 }
		 
	 }

}

///*******************************************************
/// To Insert FEES  /////////////////////////////////
///*******************************************************
if($_POST['type']=='feespayment'){
	
	/////////////////////////////////////////////////////
	// Query to insert the data into fees_payment table
	/////////////////////////////////////////////////////

	$sql_receipt="select max(Receipt_no)as receipt from fees_payment";
	$res_query_receipt=$db->ExecuteQuery($sql_receipt);
	$receipt_no=0;

	if(!($res_query_receipt[1]['receipt'])=="")
	{
		$receipt_no= $res_query_receipt[1]['receipt']+1;
		$receipt_no=$receipt_no;
	}
	else
	{
		
       $receipt_no="10000";
       
	}
	
	$res=mysql_query("INSERT INTO fees_payment (Payment_Date, Paid_Amt, Payment_Mode, Cheque_DD_No, Transaction_No, Which_Bank_Cheque_DD, Student_Id,Receipt_no,CM_Id) 			
		
	VALUES (NOW(), ".$_REQUEST['amount'].", ".$_REQUEST['paymentmode'].", '".$_REQUEST['cDDNo']."', '".$_REQUEST['transactionNo'].
	"', '".$_REQUEST['bank']."', ".$_REQUEST['studentid'].",$receipt_no, ".$_SESSION['cmid'].")");	
	
	if(!$res)
	{
	  echo 0;
	}
	else
	{	
	  
    
		$sql_student_mail="SELECT  Student_Name, Father_Name, Mother_Name,Email,Photo,Contact_No,Course_Name, Application_Fee, Learning_Fee, Registration_Fee, Exam_Fee, CASE WHEN Mode='regular' THEN 'Regular' WHEN Mode='online' THEN 'Online' WHEN Mode='private' THEN 'Private' END AS Mode, Session, About_Fee_Deposite, CASE WHEN Mode='regular' THEN (Application_Fee + Learning_Fee + Registration_Fee + Exam_Fee) WHEN Mode='online' THEN (Application_Fee + Learning_Fee + Registration_Fee + Exam_Fee) WHEN Mode='private' THEN Exam_Fee END AS Total_Fees, (SELECT SUM(Paid_Amt) FROM fees_payment WHERE Student_Id=".$_POST['studentid'].") AS Paid_Amt
		FROM student_master s
		
		LEFT JOIN course_master c ON s.Course_Id = c.Course_Id
		WHERE Student_Id=".$_POST['studentid']; 
	 	$res_query=$db->ExecuteQuery($sql_student_mail);
	 	$total=$res_query[1]['Application_Fee']+$res_query[1]['Learning_Fee']+$res_query[1]['Registration_Fee']+$res_query[1]['Exam_Fee'];
        $to=$res_query[1]['Email'];
        $balance=$total-$res_query[1]['Paid_Amt'];
        $subject="RICE EDU Fees Receipt";
      	$message= '
      			<div style="text-align:center; border-bottom:solid 1px #e5e5e5;">
      				<h1>RICE EDU</h1>
	      			<h3>Payment Receipt</h3>
      			</div>
      			<table border="1" cellspacing="0">
      			     <tr><td>Receipt No.</td><td>'.$receipt_no.'</td></tr>
      				 <tr><td>Name</td><td>'.$res_query[1]['Student_Name'].'</td></tr>
      				<tr><td>Course Name</td><td>'.$res_query[1]['Course_Name'].'</td></tr>
                     <tr><td>Total Course Fees:</td><td>'.$total.'</td></tr>
                     <tr><td>Total Fees Paid</td><td>'.$res_query[1]['Paid_Amt'].'</td></tr>
                      <tr><td>Balance Fees </td><td>'.$balance.'</td></tr>
                     <tr><td>Date</td><td>'.date('d/m/Y').'</td></tr>
      	</table>';
 
		///*******************************************************
		///for mail //////////////////////////////////////////////
		///*******************************************************

	    $mail = new PHPMailer();
			
		$mail->From="admin@riceedu.org";
		$mail->FromName="RICE EDU";
		$mail->Sender="mailer@example.com";
		$mail->AddReplyTo("replies@example.com", "Replies for my site");
		
		$mail->AddAddress($to);
		$mail->Subject = $subject;
		//$mail->AddAttachment( PATH_PDF."/invoice/".$cust[1]['Invoice_No'].".pdf");
		$mail->Body = $message;
		
		///*******************************************************
		///for SMS //////////////////////////////////////////////
		///*******************************************************
		$sendsms = new Send();
		$contactno=$res_query[1]['Contact_No'];
		$str="Thanks for Fee Submission";
		$ressend=$sendsms->Sms($contactno,$str);

        if($mail->Send() && $ressend)
        {
        	echo "1";
        }
        else
        {
        	echo "0";
        }
	}//eof else
	
}//eof if condition

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
/// Edit Notice //////////////////////////////////////////
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
/// Delete row from franchise_master table ///////////////
///*******************************************************
if($_POST['type']=="delete")
{		
	 $tblname="center_notice";
	 $condition="Notice_Id=".$_POST['id'];
	 $res=$db->deleteRecords($tblname,$condition);	 
}


?>