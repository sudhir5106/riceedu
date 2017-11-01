<?php 
include('../config.php');

require_once(PATH_LIBRARIES.'/classes/DBConn.php');
$db = new DBConn();

require_once(PATH_STUDENT_INCLUDE.'/header.php');

$getfees=$db->ExecuteQuery("SELECT Payment_Id, DATE_FORMAT(Payment_Date,'%d-%m-%Y') AS Payment_Date, Paid_Amt, CASE WHEN Payment_Mode=1 THEN 'CASH' WHEN Payment_Mode=2 THEN 'CHEQUE/DD' WHEN Payment_Mode=3 THEN 'NEFT' END AS Payment_Mode, Cheque_DD_No, Transaction_No, Which_Bank_Cheque_DD FROM fees_payment WHERE Student_Id=".$_SESSION['sid']);


$getCourseAmt=$db->ExecuteQuery("SELECT DATE_FORMAT(Reg_Date,'%d-%m-%Y') AS Reg_Date, Course_Name, CASE WHEN Mode='regular' THEN (Application_Fee + Learning_Fee + Registration_Fee + Exam_Fee) WHEN Mode='online' THEN (Application_Fee + Learning_Fee + Registration_Fee + Exam_Fee) WHEN Mode='private' THEN Exam_Fee END AS Total_Fees

FROM student_master s

LEFT JOIN course_master cm ON s.Course_Id=cm.Course_Id

WHERE Student_Id=".$_SESSION['sid']);

$TotalPaidAmt=$db->ExecuteQuery("SELECT SUM(Paid_Amt) AS Paid_Amt FROM fees_payment WHERE Student_Id=".$_SESSION['sid']);

?>

<div>
  <div class="page-title">
    <div class="title_left">
      <h3><i class="fa fa-user" aria-hidden="true"></i> Fees Details</h3>
    </div>
    
  </div>
  
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        
        <div class="x_content">

        	
        	<table class="table table-striped table-hover jambo_table">
				<thead>
					<tr class="headings">
						<th class="column-title">Sno</th>
						<th class="column-title">Date</th>
						<th class="column-title">Transaction Details</th>
						<th class="column-title">Cheque/ DD No.</th>
						<th class="column-title">NEFT Trans. No.</th>
						<th class="column-title">Bank Name</th>
						<th class="column-title">Credit</th>
						<th class="column-title">Debit</th>
					</tr>
				</thead>

				<tbody>
					<tr>
						<td>1</td>
						<td><?php echo $getCourseAmt[1]['Reg_Date'] ?></td>
						<td><?php echo $getCourseAmt[1]['Course_Name'] ?> - Course Fees</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td><?php echo $getCourseAmt[1]['Total_Fees'] ?></td>
					</tr>
					<?php $i = 2;
					foreach($getfees as $getfeesVal){ ?>
					
					<tr>
						<td><?php echo $i ?></td>
						<td><?php echo $getfeesVal['Payment_Date'] ?></td>
						<td>Paid By - <?php echo $getfeesVal['Payment_Mode'] ?></td>
						<td><?php echo $getfeesVal['Cheque_DD_No'] ?></td>
						<td><?php echo $getfeesVal['Transaction_No'] ?></td>
						<td><?php echo $getfeesVal['Which_Bank_Cheque_DD'] ?></td>
						<td><?php echo $getfeesVal['Paid_Amt'] ?></td>
						<td></td>
					</tr>
					<?php $i++;}
					?>
				</tbody>

				<tfoot>
					<tr>
						<td colspan="6" align="right"><strong>Total</strong></td>
						<td><?php echo $TotalPaidAmt[1]['Paid_Amt']; ?></td>
						<td><?php echo $getCourseAmt[1]['Total_Fees'] ?></td>
					</tr>
				</tfoot>

			</table>
			
        </div>
        
      </div>
    </div>
  </div>
  
  
</div>

<?php require_once(PATH_STUDENT_INCLUDE.'/footer.php'); ?>