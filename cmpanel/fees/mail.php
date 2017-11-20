<?php
class Send
{
  public function Sms($contactno,$content)
  {
     
	$authKey = "63a0d84e-11e5-4b0c-afaa-67e4560569f3";

	//Multiple mobiles numbers seperated by comma
	$mobileNumber = sdfgtsert;

	//Your message to send, Add URL endcoding here.
	$message = urlencode($content);
	$senderId = "WEBSMS";
	//Define route 
	$route = "Normal Connect";
	//Prepare you post parameters
	$postData = array(
		'authkey' => $authKey,
		'mobiles' => $mobileNumber,
		'message' => $message,
		'sender'=> $senderId,
		'route' => $route
	);
	
	//API URL
	//$url="https://control.msg91.com/sendhttp.php";
	$url="http://sms.technocratws.com";
	// init the resource
	$ch = curl_init();
	curl_setopt_array($ch, array(
		CURLOPT_URL => $url,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_POST => true,
		CURLOPT_POSTFIELDS => $postData
		//,CURLOPT_FOLLOWLOCATION => true
	));
	
	//get response
	$output = curl_exec($ch);
	
	curl_close($ch);
	
	echo $output;
  }
  
 
 
 /*############################################## */
 /*####### CLASS FOR VOICE SMS ####### */
 /*############################################## */
 
  
  public function VoiceSms($contactno,$a,$b)
  {
     
	$authKey = "69360AvE2Z7vRS9e15433d66e";

	//Multiple mobiles numbers seperated by comma
	$mobileNumber = $contactno;

$draft_file_name="69206_1404817758_aud_20140713_wa0004.wav";

$sender = "6888688868";
$schtimestart=$a;
$schtimeend=$b;

$campaign="New Folder";
//Prepare you post parameters
$postData = array(
    'authkey' => $authKey,
    'mobiles' => $mobileNumber,
    'draft_file_name'=>$draft_file_name,
	'sender'=> $sender,
    'route' => 4,
	'campaign'=>$campaign,
	'duration'=>30,
	'schtimestart'=>$schtimestart,
	'schtimeend'=>$schtimeend,
	'campaign'=>$campaign
);

//API URL
$url="https://control.msg91.com/send_voice_mail.php";

// init the resource
$ch = curl_init();
curl_setopt_array($ch, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $postData
    //,CURLOPT_FOLLOWLOCATION => true
));

//get response
$output = curl_exec($ch);

curl_close($ch);

return $output;
  }
  
  
 
}
?>
