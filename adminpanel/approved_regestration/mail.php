 <?PHP $sms_msg = "Dear, Your Booking is done. Details are sent to your e-mail id.Thank you.";
        $ch = curl_init('http://sms.technocratws.com/api/mt/SendSMS?');
        $mobile=8827327607;
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "username=naresh_sahu&password=43764376&source=WEBSMS&dmobile=91" . 
        $mobile . "&message='THNKS' ");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $data = curl_exec($ch);
 echo $data; 
          

?>