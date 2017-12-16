<?php 
include('../../config.php'); 
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
$db = new DBConn();


///*******************************************************
/// Delete row from franchise_master table
///*******************************************************
if($_POST['type']=="approved")
{       


                  $con= mysql_connect(SERVER,DBUSER,DBPASSWORD);
	               mysql_query('SET AUTOCOMMIT=0',$con);
	              mysql_query('START TRANSACTION',$con);
                      


                    try
	                  {
									$tblname="sent_reg_fees";
									$condition="Sent_Id=".$_POST['sent_id'];
									// Update Center sent_reg_fees Table
									$tblfield=array('Appr_Status');		
									$tblvalues=array('1');
									$res=$db->updateValue($tblname,$tblfield,$tblvalues,$condition);
									if (empty($res)) 
									{
									throw new Exception('error on Update Center sent_reg_fees Table');
									}

	                                $sql_get_student=$db->ExecuteQuery("SELECT Student_Id FROM sent_reg_fees_details WHERE Sent_Id='".$_POST['sent_id']."'");
	                               	$regestration_number=0;
	                              
	                                foreach($sql_get_student as $student)
	                                {          
                                            ///////////////////**for generate Regestration Number start**/////////////////////
                                            $sql_result=$db->ExecuteQuery("select max(Registration_No) as regestration_number from student_master");
                                                if($sql_result[1]['regestration_number']!=0)
                                                {$regestration_number=$sql_result[1]['regestration_number']+1;}
                                                else{$regestration_number='43763001';}
                                            	///////////////////**for generate Regestration Number end**/////////////////////
                                              
									                  $tblname="student_master";  
												      $condition="Student_Id=".$student['Student_Id'];
													  $tblfield=array('Approval_Status','Registration_No');	
													  $tblvalues=array('1',$regestration_number);
	                                                  $update_student_master=$db->updateValue($tblname,$tblfield,$tblvalues,$condition);
	                                                    
	                                                    if(empty($update_student_master)) 
							                                {
						                                     	throw new Exception('error on Update  student_master Table');
							                             }


	                                } //for each close
                                   mysql_query("COMMIT",$con);
		                          echo "1";
	              } //try close
                  catch(Exception $e)
	            {
					echo  $e->getMessage();
					mysql_query('ROLLBACK',$con);
					mysql_query('SET AUTOCOMMIT=1',$con);
				}

} // main if close


?>