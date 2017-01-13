<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email_Lib{
   
	 

	// function sendMailTemplate($subject,$template,$data){ 
	// 	$message = "";
 // 		if($template != ""){
 // 			$this->ci = & get_instance();
	// 		$message = $this->ci->load->view("email/".$template,$data,true);
			
 // 		}


	// 	$headers = array("From: friazmarkanthony@gmail.com'" ,
	// 	        "Reply-To: markanthony.friaz@emerson.com",
	// 	        "X-Mailer: PHP/" . PHP_VERSION,
	// 	        "MIME-Version: 1.0",
	// 	        "Content-Type: text/html; charset=ISO-8859-1"

	// 	    );

	// 		if(isset($data["attachment"])){
	// 			$attachment = 'bkdb/'. $data["attachment"];
	// 			$attachment = chunk_split(base64_encode(file_get_contents($attachment))); 
	// 			array_push($headers,"Content-Type: application/octet-stream; name=\"".$data["attachment"]);
	// 			array_push($headers,"Content-Transfer-Encoding: base64");
	// 			array_push($headers,"Content-Disposition: attachment; filename=\"".$data["attachment"]);
	// 			array_push($headers, $attachment);
	// 		}
	// 		// echo  $message;

	// 	    $headers = implode("\r\n", $headers);

	//         ini_set("SMTP",'smtp.gmail.com');
	//         ini_set("smtp_port", 465);
	//         ini_set("sendmail_from",'friazmarkanthony@gmail.com');
	//         if(!mail("markanthony.friaz@emerson.com", $subject, $message, $headers)){
	//           return false;
	//         }    
	//         ini_restore("SMTP"); 
	//         ini_restore("smtp_port"); 
	//         ini_restore("sendmail_from");  
	 
	//         return true;
	        
	// } 

	function sendMailTemplate($subject,$template,$data){ 
		$message = "";
		$this->ci = & get_instance();
 		if($template != ""){ 
			$message = $this->ci->load->view("email/".$template,$data,true);
			
 		}

			$config = Array(
			    'protocol' => 'smtp',
			    'smtp_host' => 'smtp.gmail.com',
			    'smtp_port' => 587,
			    'smtp_user' => 'friazmarkanthony@gmail.com',
			    'smtp_pass' => 'mark921221',
			    'mailtype'  => 'html', 
			    'charset'   => 'iso-8859-1'
			);

			$this->ci->load->library('email', $config);
			$this->ci->email->set_newline("\r\n");
			$this->ci->email->from("friazmarkanthony@gmail.com");
			$this->ci->email->to("markanthony.friaz@emerson.com");
			$this->ci->email->subject($subject);
			$this->ci->email->message($message );

			$result = $this->ci->email->send();
			if(!$result)
				echo $this->ci->email->print_debugger();

			return $result;
	      
	        
	} 

	// FOR ADMIN
	function sendPurchaseOrder($data){
		$subject = "Lampano Hardware: Purchase Order";
		return $this->sendMailTemplate($subject, "purchaseorder", $data);
	}


}


