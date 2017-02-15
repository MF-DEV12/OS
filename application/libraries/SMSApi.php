<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SMSApi{
	  

	 function getAccessToken($code){
	 	$data = array(
            'app_id' => SMS_API_ID,
            'app_secret' => SMS_APP_SECRET,
            'code' => $code
	    );

	     

	    $url = 'http://developer.globelabs.com.ph/oauth/access_token';  
	    $result = $this->webrequest($data,  $url); 
	   
	    $result = json_decode($result);
	    return $result;
	 }

	 function sendmessage($mobile, $message, $messageid, $access_token){
	 	$data = array(
            'clientCorrelator' => $messageid,
            'address' => $mobile,
            'senderAddress' => SMS_API_CODE,
            "outboundSMSTextMessage" => array('message'    => $message)
	    );
	    $param["outboundSMSMessageRequest"] = $data;

	    $url = 'https://devapi.globelabs.com.ph/smsmessaging/v1/outbound/'.SMS_API_CODE.'/requests?access_token='. $access_token;  
	    return $this->webrequest2($url); 
	 }


	 function sendmessage2($mobile, $message){

	   
		$data = array(
	        'key' => 'de12ebb4e32aff602a46095ac3184a6781182c0d',
	        'to' => $mobile,
	        'content' => $message
	    ); 

	    $url = 'https://api.clockworksms.com/http/send.aspx';  
	    return $this->webrequest($data, $url); 
 
	 }

	 function webrequest($post_data, $url){ 
 		

		$ch = curl_init();
	 
		curl_setopt($ch, CURLOPT_URL,$url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);                                                                  
	    curl_setopt($ch, CURLOPT_POSTFIELDS, 
		          http_build_query($post_data));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$result = curl_exec($ch);
		echo curl_error($ch);
		curl_close ($ch); 
		return $result;
 		 
	 }

	 function webrequest2($url){      
		
		 
	 }




 
	 


}
 

