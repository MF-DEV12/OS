<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email_Lib{
   
	 

	function sendMailTemplate($subject,$template,$data){ 
		$message = "";
 		if($template != "")
			$message = $this->load->view("template/".$template,$data,true); 


		$headers = array("From: cms_automail@cmsyouth.esy.es" ,
		        "Reply-To: friazmarkanthony@gmail.com",
		        "X-Mailer: PHP/" . PHP_VERSION,
		        "MIME-Version: 1.0",
		        "Content-Type: text/html; charset=ISO-8859-1"

		    );

			if($data["attachment"]){
				$attachment = 'bkdb/'. $data["attachment"];
				$attachment = chunk_split(base64_encode(file_get_contents($attachment))); 
				array_push($headers,"Content-Type: application/octet-stream; name=\"".$data["attachment"]);
				array_push($headers,"Content-Transfer-Encoding: base64");
				array_push($headers,"Content-Disposition: attachment; filename=\"".$data["attachment"]);
				array_push($headers, $attachment);
			}


		    $headers = implode("\r\n", $headers);

	        ini_set("SMTP",'mx1.hostinger.ph');
	        ini_set("smtp_port", 465);
	        ini_set("sendmail_from",'cms_automail@cmsyouth.esy.es');
	        if(!mail("friazmarkanthony@gmail.com", $subject, $message,$headers )){
	          return false;
	        }    
	        return true;
	        ini_restore("SMTP"); 
	        ini_restore("smtp_port"); 
	        ini_restore("sendmail_from");  
	 
	} 


}


