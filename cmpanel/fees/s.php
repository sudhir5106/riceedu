<?php 
$authKey = "63a0d84e-11e5-4b0c-afaa-67e4560569f3";

	//Multiple mobiles numbers seperated by comma
	$mobileNumber = 8827327607;
    $content="yertyertyert";
	//Your message to send, Add URL endcoding here.
	//$message = urlencode($content);

	$senderId = "naresh_sahu";
	//Define route 
	$route = "template";
	//Prepare you post parameters
	$postData = array(
		'authkey' => $authKey,
		'mobiles' => $mobileNumber,
		'message' => $content,
		'sender'=> $senderId,
		'route' => $route
	);
	
	//API URL
	$url="https://control.msg91.com/sendhttp.php";
	
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

	?>