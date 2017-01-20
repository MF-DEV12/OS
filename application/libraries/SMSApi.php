<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SMSApi{
    
	 function subscribemobile($mobile){
	 	$data = array(
	 		'utf8'=>'✓',
            'authenticity_token' => "8AKz0v0nlFCVEz1VyYiAqJV2igkE3QGMyy+BexIs8rU=",
            'access_token[app_id]' => "dGo5fEd97jF5bcboMpT9yAFzMGaGf97b",
            'access_token[subscriber_num]'    => $mobile,
            'commit'    => "Grant" 
	    );

	    $url = 'https://developer.globelabs.com.ph/oauth/request_authorization'; 
     	return $this->webrequest($data,  $url);
	 }

	 function getAccessToken($code){
	 	$data = array(
            'app_id' => "dGo5fEd97jF5bcboMpT9yAFzMGaGf97b",
            'app_secret' => "50f5f4dca402216a46ae3947468338aa315ef1b6558034d80fd4a1fb3b00c874",
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
            'senderAddress' => "0160",
            "outboundSMSTextMessage" => array('message'    => $message)
	    );
	    $param["outboundSMSMessageRequest"] = $data;

	    $url = 'https://devapi.globelabs.com.ph/smsmessaging/v1/outbound/0160/requests?access_token='. $access_token;  
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
 
