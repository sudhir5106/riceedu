<div class="noprint">
  <?php
$get_id=$_GET['k'];
include('../../config.php'); 
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
include(PATH_ADMIN_INCLUDE.'/header.php');
$db = new DBConn();

// get all list of students 
$getstudentVal=$db->ExecuteQuery("SELECT Application_No,DOB,Gender,Caste,Mother_Name,Reference,About_Fee_Deposite,Student_Code,Signature,Gaurdian_Signature,Email,Student_Name,Religion, Father_Name, Aadhaar_No, Course_Name, Mode,Session,Education,Phisical_Status,Acc_holder_name,IFSC_Code,Bank_Address,Bank_Name,Application_Fee,Learning_Fee,Registration_Fee,Exam_Fee, CASE WHEN Mode='regular' THEN (Learning_Fee + Registration_Fee + Exam_Fee+Application_Fee) WHEN Mode='online' THEN (Learning_Fee + Registration_Fee + Exam_Fee+Application_Fee) WHEN Mode='private' THEN Exam_Fee+Application_Fee END AS Total_Fees, (SELECT SUM(Paid_Amt) FROM fees_payment WHERE Student_Id=$get_id) AS Paid_Amt,Address, Block_Name, District_Name, State_Name, Pincode, Contact_No, Email, Bank_Name, Account_No, Bank_Address, IFSC_Code, Photo, Signature, Gaurdian_Signature, Registration_No, CASE WHEN Approval_Status=0 THEN 'Pending' WHEN Approval_Status=1 THEN 'Approved' WHEN Approval_Status=2 THEN 'Cancelled' END Approval_Status

FROM student_master st

LEFT JOIN course_master c ON st.Course_Id = c.Course_Id
LEFT JOIN block_master b ON st.Block_Id = b.Block_Id
LEFT JOIN district_master d ON b.District_Id = d.District_Id
LEFT JOIN state_master s ON d.State_Id = s.State_Id 
 WHERE st.Student_Id=$get_id
ORDER BY Student_Id DESC");


?>
</div>
<script type="text/javascript"  src="student.js" ></script>
<style type="text/css">


@media print
{
.noprint {display:none;}
}

@media screen
{
...
}


</style>
<div class="noprint text-center">
    <a href="javascript:window.print()">
      <button type="button"  class="btn btn-xs btn-success status">Print</button>
    </a>
</div>

<div class="main">
  
  <div style="border-bottom:solid 1px #000;">
    <div class="col-sm-2" style="float:left"><img width="115" src="../../images/logo.png" alt=""></div>
    <div class="col-sm-10 text-center" style="float:left">
      <h2 style="margin-top:0;"><strong>APPLICATION FORM FOR STUDENT</strong></h2>
      <p style="font-size:1.5em; font-weight:bold;"> RISEs (Rural Institute for Career & Employment Society)<br>
        AN ISO 9001:2015 CERTIFIED ORGANIZATION<br>
        (Reg. No. <?php echo $getstudentVal[1]['Registration_No']; ?>)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fees 100/-</p>
    </div>
    <div class="clearfix">&nbsp;</div>
  </div>


  <div style="margin-top:30px;">
    <div class="col-sm-10" style="width:80%; float:left;">
      <table width="100%" cellpadding="5">
        <tr>
          <td class="bg-success">Reference :</td>
          <td style="border-bottom:solid 1px #666;"><?php echo $getstudentVal[1]['Reference'];?></td>
        </tr>
        <tr>
          <td class="bg-success">Student’s Name :</td>
          <td style="border-bottom:solid 1px #666;"><?php echo $getstudentVal[1]['Student_Name'];?></td>
        </tr>
        <tr>
          <td class="bg-success">Date Of Birth :</td>
          <td style="border-bottom:solid 1px #666;"><?php echo $getstudentVal[1]['DOB'];?></td>
        </tr>
        <tr>
          <td class="bg-success">Gender :</td>
          <td style="border-bottom:solid 1px #666;"><?php echo $getstudentVal[1]['Gender'];?></td>
        </tr>
        <tr>
          <td class="bg-success">Father's Name :</td>
          <td style="border-bottom:solid 1px #666;"><?php echo $getstudentVal[1]['Father_Name'];?></td>
        </tr>
        <tr>
          <td class="bg-success">Mother's Name  :</td>
          <td style="border-bottom:solid 1px #666;"><?php echo $getstudentVal[1]['Mother_Name'];?></td>
        </tr>
        <tr>
          <td class="bg-success">Religion:</td>
          <td style="border-bottom:solid 1px #666;"><?php echo $getstudentVal[1]['Religion'];?></td>
        </tr>
        <tr>
          <td class="bg-success">Caste:</td>
          <td style="border-bottom:solid 1px #666;"><?php echo $getstudentVal[1]['Caste'];?></td>
        </tr>
        <tr>
          <td class="bg-success">Physical Status:</td>
          <td style="border-bottom:solid 1px #666;"><?php 
                   if($getstudentVal[1]['Phisical_Status']=='1')
                  {
                      echo "Normal";
                  }
                  else
                  {echo "Physically Challenged";}?></td>
        </tr>
        <tr>
          <td class="bg-success">Aadhaar Number:</td>
          <td style="border-bottom:solid 1px #666;"><?php echo $getstudentVal[1]['Aadhaar_No'];?></td>
        </tr>
        <tr>
          <td class="bg-success">Education:</td>
          <td style="border-bottom:solid 1px #666;"><?php echo $getstudentVal[1]['Education'];?></td>
        </tr>
        <tr>
          <td class="bg-success">Course:</td>
          <td style="border-bottom:solid 1px #666;"><?php echo $getstudentVal[1]['Course_Name'];?></td>
        </tr>
        <tr>
          <td class="bg-success">Mode:</td>
          <td style="border-bottom:solid 1px #666;"><?php echo $getstudentVal[1]['Mode'];?></td>
        </tr>
        <tr>
          <td class="bg-success">Session:</td>
          <td style="border-bottom:solid 1px #666;"><?php echo $getstudentVal[1]['Session'];?></td>
        </tr>

        <tr>
          <td colspan="2">&nbsp;</td>
        </tr>

        <tr>
          <td class="bg-success">State:</td>
          <td style="border-bottom:solid 1px #666;"><?php echo $getstudentVal[1]['State_Name'];?></td>
        </tr>
        <tr>
          <td class="bg-success">District:</td>
          <td style="border-bottom:solid 1px #666;"><?php echo $getstudentVal[1]['District_Name'];?></td>
        </tr>
        <tr>
          <td class="bg-success">Block:</td>
          <td><?php echo $getstudentVal[1]['Block_Name'];?></td>
        </tr>
        <tr>
          <td class="bg-success">Address:</td>
          <td style="border-bottom:solid 1px #666;"><?php echo $getstudentVal[1]['Address'];?></td>
        </tr>
        <tr>
          <td class="bg-success">Pincode:</td>
          <td style="border-bottom:solid 1px #666;"><?php echo $getstudentVal[1]['Pincode'];?></td>
        </tr>
        <tr>
          <td class="bg-success">Contact No:</td>
          <td style="border-bottom:solid 1px #666;"><?php echo $getstudentVal[1]['Contact_No'];?></td>
        </tr>
        <tr>
          <td class="bg-success">Email Id:</td>
          <td style="border-bottom:solid 1px #666;"><?php echo $getstudentVal[1]['Email'];?></td>
        </tr>

        <tr>
          <td colspan="2">&nbsp;</td>
        </tr>

        <tr>
            <td class="bg-success">Bank Name:</td>
            <td style="border-bottom:solid 1px #666;"><?php echo $getstudentVal[1]['Bank_Name'];?></td>
          </tr>
          <tr>
            <td class="bg-success">A/C Holder Name:</td>
            <td style="border-bottom:solid 1px #666;"><?php echo $getstudentVal[1]['Acc_holder_name'];?></td>
          </tr>
          <tr>
            <td class="bg-success">Bank Address:</td>
            <td style="border-bottom:solid 1px #666;"><?php echo $getstudentVal[1]['Bank_Address'];?></td>
          </tr>
          <tr>
            <td class="bg-success">IFSC Code:</td>
            <td style="border-bottom:solid 1px #666;"><?php echo $getstudentVal[1]['IFSC_Code'];?></td>
          </tr>
      </table>    
    </div>  
    <div class="col-sm-2" style="width:20%; float:left;">
      <div class="ef_header_tools pull-right"> <img width="100%;" src="<?php echo PATH_DATA_IMAGE ?>/student/thumb/<?php echo $getstudentVal[1]['Photo'];?>" alt="" /> </div>
    </div>
    <div class="clearfix"></div>
  </div>

  <div align="center" style="margin-top:30px;">
    <h4><strong>FEES DETAILS FOR APPLIED COURSE</strong></h4>
    <table class="table table-hover t table-condensed" border="1" width="200" >
      <tr>
        <td class="bg-success" width="50%">Application Fee:</td>
        <td width="50%"><?php echo $getstudentVal[1]['Application_Fee'];?></td>
      </tr>
      <tr>
        <td class="bg-success">Regestration Fee:</td>
        <td><?php echo $getstudentVal[1]['Registration_Fee'];?></td>
      </tr>
      <tr>
        <td class="bg-success">Learning Fee:</td>
        <td><?php echo $getstudentVal[1]['Learning_Fee'];?></td>
      </tr>
      <tr>
        <td class="bg-success">Exam Fee:</td>
        <td><?php echo $getstudentVal[1]['Exam_Fee'];?></td>
      </tr>
      <tr>
        <td class="bg-success">Total Fee:</td>
        <td><?php echo $getstudentVal[1]['Total_Fees'];?></td>
      </tr>
      <tr>
        <td class="bg-success">Paid Fee:</td>
        <td><?php echo $getstudentVal[1]['Paid_Amt'];?></td>
      </tr>
      <tr>
        <td class="bg-success">Balance Fee:</td>
        <td><?php echo $getstudentVal[1]['Total_Fees']-$getstudentVal[1]['Paid_Amt'];?></td>
      </tr>
    </table>
  </div>

  <div align="center">
    <h4><span><strong>Write About Fees Deposit In Future</strong></span></h4>
    <p><?php echo $getstudentVal[1]['Total_Fees']-$getstudentVal[1]['About_Fee_Deposite'];?></p>
  </div>

  <div align="center">
    <strong>Declaration</strong><br>
    I here declare that i have know and considered the condition of eligibility for the above course for which i seek registration for admission. I fulfill the eligibility condition and i have furnished above, the necessary information in this regard. In the event of any information being found incorrect or misleading, my candidature shall be liable to cancellation at any time and i shall not be entitled to get refund of a fee paid by me. In the event of any dispute it shall be resolved though the meditation by the chairmen or committee constitute under the constitution / arbitration act 1940 and its decision shall be binding on all concerned.
  </div>

  <div style="margin-top:30px;">
    <div align="center"><strong>General Rules</strong></div>
    <ul>
      <li>The Student Are Required To Attend The Classes Regularly.</li>
      <li>Student Will Have To Maintain The Discipline Of The Institution And Any Type Of Misconduct Will Not Tolerated. Guardians Can Be Called At Any Time Regarding The Misconduct Of The Ward.</li>
      <li>Fee Once Paid Shall Not Be Refunded. </li>
      <li>Fee Day Will Be 15 of Every Month. </li>
      <li>The entire Course Are Conducted by Rural Institute for Career and Employment. </li>
      <li>In Case Of Any Dispute. If Any Rigor Court Will Be Jurisdiction Only. </li>
    </ul>
  </div>

  <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>

  <div align="left" style="float:left;">
    <img src="<?php echo '../../data_images/student/gaurdian-sign/thumb/'.$getstudentVal[1]['Gaurdian_Signature'];?>" alt=""><br>
    Signature of Guardian
  </div>
  <div align="right" style="float:right;">
    <img src="<?php echo '../../data_images/student/student-sign/thumb/'.$getstudentVal[1]['Signature'];?>" alt=""><br>
    Signature of Student
  </div>

  <div class="clearfix"></div>

  <div style="margin-top:50px;">
    <div align="left">Date --------------- </div>
    <div align="right"> Verified By Branch </div>
  </div>

</div>