<?php 
include('config.php'); 
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
$db = new DBConn();
$res=$db->ExecuteQuery("SELECT Enrolment_Number,CONCAT(Title,' ',Student_Name) AS 'Name',
Student_rollNo,Batch_Name,Exam_Center_Code,Photo,Signature,Center_Code,Center_Name,Exam_Center_Address,
DATE_FORMAT(Exam_Date,'%d-%m-%Y') AS  'Exam_Date',DAYNAME(Exam_Date) AS 'Day',CONCAT(Start_Time,' - ',End_Time) AS 'Time',Job_Roll_Name,
Sector_Name,Sector_Image,Exam_Name
FROM student_master s INNER JOIN batch_master b 
ON s.Batch_Id=b.Batch_Id INNER JOIN allotment_detail ad ON  
ad.Batch_Id=b.Batch_Id INNER JOIN exam_center ec ON ad.Exam_Center_Id=ec.Exam_Center_Id INNER JOIN franchise_master f ON 
f.Center_Id=s.Center_Id INNER JOIN exam_schedule es ON ad.`Exam_Id`=es.`Exam_Id` INNER JOIN job_roll_master j ON
es.`Job_Roll_Id`=j.`Job_Roll_Id`INNER JOIN sector_master sm ON j.`Sector_Id`=sm.`Sector_Id` 
INNER JOIN exam_sector_schedule ess ON es.`Schedule_Id`=ess.`Schedule_Id` 
INNER JOIN exam_master em ON ess.id=em.id WHERE Enrolment_Number='".$_REQUEST['id']."'"); 
?>
<style>
	body{font:11pt Arial, Helvetica, sans-serif;}
	.student-info{background:#000;}
	.student-info td{background:#fff;}
	.student-info table td{padding:3px;}
</style>


<div style="width:96%; height:886px; margin:0 auto; padding:10px; border:solid 1px #666;">
    <h1 style="font:bold 16pt Arial, Helvetica, sans-serif; color:#000; text-align:center; padding:0 0 15px 0;">E-ADMIT CARD</h1>
	
    
    
    <table width="100%" cellpadding="0" cellspacing="0">
    	<tr>
        	<td><img src="images/nsdc-logo.jpg" width="150" alt="NSDC Logo"></td>
            <td align="center">
            	<h1 style="font:bold 13pt Arial, Helvetica, sans-serif; color:#000; text-align:center; padding:15px 0 0 0;">
                GOVERNMENT OF INDIA<br>
                <?php echo $res[1]['Sector_Name']?><br>
                <?php echo $res[1]['Exam_Name']?>
                </h1>
            </td>
            <td align="right"><img src="<?php echo PATH_DATA_IMAGE."/sector/thumb/".$res[1]['Sector_Image']; ?>" width="150"/></td>
        </tr>
    </table>
    
    <table width="100%" class="student-info" style="margin-top:30px;">
    	<tr>
        	<td>
            	<table width="100%" cellpadding="0" cellspacing="0">
                    <tr>
                    	<td style="border-right:solid 1px #000;"><strong>Name of Candidate:</strong> <?php echo $res[1]['Name'];?></td>
                        <td style="border-right:solid 1px #000;"><strong>ROLL NUMBER:</strong> <?php echo $res[1]['Student_rollNo'];?></td>
                        <td><strong>ENROLLMENT NUMBER:</strong> <?php echo $res[1]['Enrolment_Number'];?></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
        	<td>
            	<table width="100%" cellpadding="0" cellspacing="0">
                    <tr>
                        <td style="border-right:solid 1px #000;"><strong>CENTER CODE:</strong> <?php echo $res[1]['Center_Code'];?></td>
                        <td style="border-right:solid 1px #000;"><strong>CENTER NAME:</strong> <?php echo $res[1]['Center_Name'];?></td>
                        <td><strong>BATCH CODE:</strong> <?php echo $res[1]['Batch_Name'];?></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
        	<td>
            	<table width="100%" cellpadding="0" cellspacing="0">
                    <tr>
                        <td style="border-right:solid 1px #000; text-align:center;">
                        	<div><img src="<?php echo PATH_DATA_IMAGE."/admission/thumb/".$res[1]['Photo']; ?>" height="100" alt="Candidate photo"></div>
                            <div><img src="<?php echo PATH_DATA_IMAGE."/admission/thumb/".$res[1]['Signature']; ?>" height="25" alt="Signature"></div>
                        </td>
                        <td style="border-right:solid 1px #000; text-align:right;"><strong>EXAM CENTER:</strong></td>
                        <td><?php echo $res[1]['Exam_Center_Address'];?></td>
                    </tr>
                </table>
            </td>
        </tr>
        
    </table>
    
    
    
    
    <div style="height:50px;">&nbsp;</div>
    <table width="90%" align="center" border="1" cellspacing="0" cellpadding="0" style="text-align:center;">
         <thead>
            <tr bgcolor="#EBEBEB" style="font:9pt Arial, Helvetica, sans-serif;">
                <th width="15%" style="height:35px;">Date</th>
                <th width="15%">DAY</th>
                <th width="25%">DURATION</th>
                <th width="20%">JOBROLL</th>
                <th width="25%">INVIGILATOR</th>
             </tr>
         </thead>
         
         <tr>
            <td style="height:25px;"><?php echo $res[1]['Exam_Date'];?></td>
            <td><?php echo $res[1]['Day'];?></td>
            <td><?php echo $res[1]['Time'];?></td>
            <td><?php echo $res[1]['Job_Roll_Name'];?></td>
            <td>&nbsp;</td>
        </tr>
    </table>
    
    <div style="text-align:center; margin-top:40px;">
    	<form>
            <input type="button" onClick="window.print()" id="submit" name="submit" value="Print"/>
        </form>
    </div>
    
    <div style="margin-top:50px;">
    	<strong>Note:</strong>
        <ul>
        	<li>Mobile phones are not allowed inside examination hall.</li>
            <li>You should be present in the examination hall one hour before the commencement of examination.</li>
        </ul>
    </div>
    
</div>