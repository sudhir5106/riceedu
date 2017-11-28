<?php
include('../../config.php'); 
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
include(PATH_ADMIN_INCLUDE.'/header.php');
$db = new DBConn();

// get all list of news
$getList=$db->ExecuteQuery("SELECT sent_reg_fees.Sent_Id,sent_reg_fees.Payment_Mode,sent_reg_fees.Transaction_Number,sent_reg_fees.Cheque_No,sent_reg_fees.Appr_Status,sent_reg_fees.Total_Amount,sent_reg_fees.Payment_Date,sent_reg_fees.CM_Id, cm_login.Center_Code FROM sent_reg_fees LEFT JOIN cm_login on sent_reg_fees.CM_Id=cm_login.CM_Id");

?>
<script type="text/javascript" src="list.js" ></script>

<div class="main">
  <div class="page-title">
        <div>
            <div class="col-lg-5 pull-left"><h4><i class="glyphicon glyphicon-plus"></i>List of Received Regestration Fees</h4></div>
        </div>
        <div class="clearfix">&nbsp;</div>
    </div>
  
  
  <div class="clear formbgstyle">
    
    <table class="table table-hover table-bordered" id="addedProducts">
      <thead>
        <tr class="success">
          <th>Sno.</th>
           <th>Date Of Payment</th>
           <th>Amount</th>
           <th>Mode Of Payment</th>
           <th>Cheque No/DD No</th>
           <th>Transaction Number</th>
          <th>Center Code</th>
           <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php 
            $i=1;
            foreach($getList as $getList){ ?>
        <tr>
          <td><?php echo $i;?></td>
          <td><?php echo $getList['Payment_Date'];?></td>
          <td><?php echo $getList['Total_Amount'];?></td>
          <td><?php echo $getList['Payment_Mode'];?></td>
          <td><?php echo $getList['Cheque_No'];?></td>
          <td><?php echo $getList['Transaction_Number'];?></td>
          <td><?php echo $getList['Center_Code'];?></td>
          
          
          <td><button type="button" class="btn btn-success btn-sm" onClick="window.location.href='details.php?id=<?php echo $getList['Sent_Id'];?>'" > <span class="glyphicon "></span>  Details </button>
             
            <?php
             if($getList['Appr_Status']=="1")
            { ?>
            
            <?php }
            else
            { ?>
           <button type="button" class="btn btn-info btn-sm approved" id="<?php echo $getList['Sent_Id'];?>" name="delete"> <span class="glyphicon "></span>Payment Accept</button>
            <?php } ?></td>
        </tr>
        <?php $i++;} ?>
      </tbody>
    </table>
  </div>
</div>
