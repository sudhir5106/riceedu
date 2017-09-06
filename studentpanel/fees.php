<?php 
include('../config.php');
require_once(PATH_STUDENT_INCLUDE.'/header.php');
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
$db = new DBConn();

$getfees=$db->ExecuteQuery("SELECT Payment_Id, DATE_FORMAT(Payment_Date,'%d-%m-%Y') AS Payment_Date, Paid_Amt, CASE WHEN Payment_Mode=1 THEN 'CASH' WHEN Payment_Mode=2 THEN 'CHEQUE/DD' WHEN Payment_Mode=3 THEN 'NEFT' END AS Payment_Mode, Cheque_DD_No, Transaction_No, Which_Bank_Cheque_DD FROM fees_payment WHERE Student_Id=".$_SESSION['sid']);
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
					<th class="column-title">Payment Date</th>
					<th class="column-title">Paid Amount</th>
					<th class="column-title">Mode</th>
					<th class="column-title">Cheque/ DD No.</th>
					<th class="column-title">NEFT Trans. No.</th>
					<th class="column-title">Bank Name</th>
				</tr>
				</thead>
				<?php $i = 1;
				foreach($getfees as $getfeesVal){ ?>
				
				<tr>
					<td><?php echo $i ?></td>
					<td><?php echo $getfeesVal['Payment_Date'] ?></td>
					<td><?php echo $getfeesVal['Paid_Amt'] ?></td>
					<td><?php echo $getfeesVal['Payment_Mode'] ?></td>
					<td><?php echo $getfeesVal['Cheque_DD_No'] ?></td>
					<td><?php echo $getfeesVal['Transaction_No'] ?></td>
					<td><?php echo $getfeesVal['Which_Bank_Cheque_DD'] ?></td>
				</tr>
				<?php $i++;}
				?>
			</table>                  
        </div>
        
      </div>
    </div>
  </div>
  
  
</div>

<?php require_once(PATH_STUDENT_INCLUDE.'/footer.php'); ?>