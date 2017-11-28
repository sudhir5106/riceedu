     <?php         $mobile="8827327607";
          //$msg="Student Name".$check[1]['Student_Name']."Receipt Number".$receipt_no."Center Code".$check[1]['Center_Code']."Course Name".$check[1]['Course_Name']."Pay Amount".$_REQUEST['amount'];
       $msg="Student%20Name".$check[1]['Student_Name'];
   //$msg="Its%20Working";

              echo $url="sms.technocratws.com/api/mt/SendSMS?APIKey=63a0d84e-11e5-4b0c-afaa-67e4560569f3&senderid=TESTIN&channel=2&DCS=0&flashsms=0&number=".$mobile."&text=".$msg."&route=1";

              //$url="http://sms.technocratws.com/api/mt/SendSMS?APIKey=63a0d84e-11e5-4b0c-afaa-67e4560569f3&senderid=TESTIN&channel=2&DCS=0&flashsms=0&number=91".$mobile."&text=".$msg."&route=1";
								  $ch = curl_init();
								  $timeout = 5;
								  curl_setopt($ch,CURLOPT_URL,$url);
								  curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
								  curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
								  $data = curl_exec($ch);
								  curl_close($ch);
								  echo  $data;












         ?>