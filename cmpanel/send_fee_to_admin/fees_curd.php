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
{    $test=0;
	 if(!empty($_POST['course_code']))
	 {
        $a=array();
	 	$total=0;
	 	$code=explode(',',$_POST['course_code']);
	 	?>
	 	<table class="table table-striped table-hover jambo_table">
            <thead>
                <tr class="headings">
                	<td>Name</td>
                	<td>Course Name</td>
                	<td>Registration Fees</td>
                </tr>
            </thead>
				<?php
				
				
			for($i=0;$i<count($code);$i++)
			{
	 	
 
  				$get_resg_fees=$db->ExecuteQuery("SELECT student_master.Student_Name,student_master.Payment_Status,course_master.Registration_Fee,student_master.Student_Id,course_master.Course_Name,student_master.Student_Id FROM student_master LEFT JOIN course_master ON student_master.Course_Id = course_master.Course_Id WHERE student_master.Payment_Status='1' and course_master.Course_Id='".$code[$i]."' and student_master.Payment_Status='1'");
                                             
				   foreach($get_resg_fees as $result)
					{  
						$check=$db->ExecuteQuery("select * from sent_reg_fees_details where Student_Id='".$result['Student_Id']."'");
			  			
						if($check[1]['Student_Id']!=$result['Student_Id']) 
						{  
							$student_id.=$result['Student_Id'].",";
							$course_id.=$code[$i].",";
					  		$total+=$result['Registration_Fee'];  ?>
                               <tr>
                                   <td><?php echo ucfirst($result['Student_Name']); ?></td>
                                   <td><?php echo ucfirst($result['Course_Name']); ?></td>
                                   <td><i class="fa fa-inr" aria-hidden="true"></i> <?php echo $result['Registration_Fee']; ?>  </td>
                               </tr>
<?php		   			}// $result_check['Student_Id']==$result['Student_Id'] close
			         }                              
         		}   ?>
</table>

<?php if($total!='0'){ ?>

<form class="form-horizontal form-label-left" action="" method="post" id="send_fees" name="send_fees">
	<div class="item form-group">
      <label class="col-md-4 control-label" for="paymentmode">Total Amount <span class="required">*</span></label>
      <div class="col-md-8"> 
        <label class="radio-inline" for="paymentmode-0">
          <input type="text" name="total_ammount" id="total_ammount" value="<?php echo $total;?>" readonly="readonly" />
          <input type="hidden" id="student_code" name="student_code" class="form-control col-md-7 col-xs-12 " value="<?php echo $student_id;?>">
          <input type="hidden" id="course_code" name="course_code" class="form-control col-md-7 col-xs-12 " value="<?php echo $course_id;?>">
        </label> 
        
      </div>
    </div>



<div class="item form-group">
      <label class="col-md-4 control-label" for="paymentmode">Payment Mode <span class="required">*</span></label>
      <div class="col-md-8"> 
        <label class="radio-inline" for="paymentmode-0">
          <input name="paymentmode" id="cash" value="cash" checked="checked" type="radio">
          Cash
        </label> 
        <label class="radio-inline" for="paymentmode-1">
          <input name="paymentmode" id="cheque_dd" value="cheque_dd" type="radio">
          Cheque/DD
        </label>
        <label class="radio-inline" for="paymentmode-1">
          <input name="paymentmode" id="neft" value="neft" type="radio" />
          NEFT
        </label>
      </div>
    </div>
    
    <div id="chDdNo" style="display:none;">
        <div class="item form-group">
          <label class="control-label col-sm-4" for="cDDNo">Cheque/DD No. <span class="required">*</span> </label>
          <div class="col-sm-4">
            <input type="text" id="cheque_dd_no" name="cheque_dd_no" class="form-control col-md-7 col-xs-12 " value="">
          </div>
        </div>
        
        
    </div>
    
    <div id="neftinfo" style="display:none">
        <div class="item form-group">
          <label class="control-label col-sm-4" for="transactionNo">Transaction No. <span class="required">*</span> </label>
          <div class="col-sm-6">
            <input type="text" id="transactionNo" name="transactionNo" class="form-control col-md-7 col-xs-12 " value="">
          </div>
        </div>
    </div>
    
    <div class="form-group">
      <div class="col-sm-4"></div>
      <div class="col-sm-3">
        <button type="button" class="btn btn-success btn-sm" name="save" id="save"><i class="fa fa-credit-card"></i> Submit Payment</button>
      </div>
    </div>
    <div id="display">
    </div>
</form>


<?php } ?>
<!--
<div class="col-lg-5 pull-right text-right">
<lable>
Total amount:   <?php //echo $total; ?>
</lable>
</br>
Mode :
cash<input type="radio" name="mode" id="cash" class="mode" value="cash" checked></br>
cheque<input type="radio" name="mode" class="mode" value="cheque" ></br>

dd<input type="radio" name="mode" id="dd" class="mode" value="dd"></br>

neft<input type="radio" name="mode" id="neft" class="mode" value="neft"></br>
<input type="text" name="tranisation" id="cheque_no" value="" style="display:none;"/>
<input type="hidden" name="get_val" id="get_val" value="<?php echo $student_id;?>"/>
AMOUNT SUBMIT<input type="button" name="save" id="save"  value="Pay Regestration"></br>
</div>-->

<?php

}//explode end


}   //FOR MAIN CLOSE

///*******************************************************
/// To Insert FEES  /////////////////////////////////
///*******************************************************
if($_POST['type']=='regestration_fees_send')
{
    $con= mysql_connect(SERVER,DBUSER,DBPASSWORD);
	mysql_query('SET AUTOCOMMIT=0',$con);
	mysql_query('START TRANSACTION',$con);
	
	$student_id=explode(',',$_POST['student']);
	$total_ammount=$_POST['total_ammount'];
	$transactionNo=$_POST['transactionNo'];
	$course_id=explode(',',$_POST['course_code']);
	$mode=$_POST['mode'];
	$date=date('Y-m-d');
	$center_code=$_SESSION['cmid'];

	if($mode=="cash")
	{
		$cheque_dd_no="---";
	    $transactionNo="---";
	}
	if($mode=='cheque_dd')
	{  
		$transactionNo="---";
		$cheque_dd_no=$_POST['cheque_dd_no'];
	}
	if($mode=='neft')
	{  
		$transactionNo=$_POST['transactionNo'];
		$cheque_dd_no="---";
	}
	
	try{
  
  		$sql="INSERT INTO `riceedu`.`sent_reg_fees` (`Total_Amount`, `Payment_Mode`,`Payment_Date`, `Transaction_Number`, `Cheque_No`, `CM_Id`)
 VALUES ('".$total_ammount."', '".$mode."','".$date."','".$transactionNo."','".$cheque_dd_no."', '".$center_code."')";
 		$insert=mysql_query($sql);

		if(!$insert)
		{
			throw new Exception('erro on sent_reg_fees');	
		}

		if($insert)
		{  
			$last_id="select max(Sent_Id) as id from sent_reg_fees";
		   	$obctcre_last_id=$db->ExecuteQuery($last_id);
		    $sent_id=$obctcre_last_id[1]['id'];
			
			for($i=0;$i<count($student_id);$i++)
			{ 
			 	if($student_id[$i]!="")
			    {	
			 		 $sql_insert="INSERT INTO `riceedu`.`sent_reg_fees_details` (`Sent_Id`, `Student_Id`, `Course_Id`) VALUES ('".$sent_id."', '".$student_id[$i]."', '".$course_id[$i]."')";
			  		$result_sql_insert= mysql_query($sql_insert);
				  	
				  	if(!$result_sql_insert)
					{
						throw new Exception('erro on sent_reg_fees_details');
					}
			
			     } //student id not null if
			}   //for loop


		}// $insert condition
		
		mysql_query("COMMIT",$con);
		echo "1";
	
	} //try block
	catch(Exception $e)
	{
		echo  $e->getMessage();
		mysql_query('ROLLBACK',$con);
		mysql_query('SET AUTOCOMMIT=1',$con);
	}

}  //main if

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