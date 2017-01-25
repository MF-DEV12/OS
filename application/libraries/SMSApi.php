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
	    return $this->webrequest($param,  $url); 
	 }

	 function webrequest($post_data, $url){ 
 
	 	$data_string = json_encode($post_data);                                                                                   
	 	 
		$ch = curl_init($url);                                                                      
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);    
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);                                                                  
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
		    'Content-Type: application/json' )                                                                       
		);                                                                                                                   

		$result = curl_exec($ch);
		echo curl_error($ch);
		//echo $data_string;
		return $result;
	 }

 
	 


}
 

