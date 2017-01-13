<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SMSApi{
    
	 function subscribemobile($mobile){
	 	$data = array(
            'authenticity_token' => "8AKz0v0nlFCVEz1VyYiAqJV2igkE3QGMyy+BexIs8rU=",
            'access_token[app_id]' => "dGo5fEd97jF5bcboMpT9yAFzMGaGf97b",
            'access_token[subscriber_num]'    => $mobile,
            'commit'    => "Grant" 
	    );

	    $url = 'https://developer.globelabs.com.ph/oauth/request_authorization'; 
     	return $this->webrequest($data,  $url);
	 }

	 function sendmessage($mobile, $message, $messageid){
	 	$data = array(
            'clientCorrelator' => $messageid,
            'address' => $mobile,
            'senderAddress' => "0160",
            "outboundSMSTextMessage" => array('message'    => $message)
	    );
	    $param["outboundSMSMessageRequest"] = $data;

	    $url = 'https://devapi.globelabs.com.ph/smsmessaging/v1/outbound/0160/requests?access_token=VqS6EkKYN2wug7QR4ILQmD-zjcn_FTJCGbYL_k6Fr0Q';  
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
 

