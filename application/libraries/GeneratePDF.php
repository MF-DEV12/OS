<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GeneratePDF{
    
	function Generate($data){ 
		 
		$this->ci = & get_instance();
  
	    $this->ci->load->library('cezpdf');
		$this->ci->load->helper('pdf');


		$this->ci->cezpdf->ezText($data["title"], 15, array('justification' => 'right'));

		$this->ci->cezpdf->ezText('Lampano Hardware Tradings', 15, array('justification' => 'left'));

	    $this->ci->cezpdf->ezSetDy(-0);

	    $content = "22 General Luis Novaliches, Quezon City, Metro Manila \n";
	    $content .= "Tel no. +63 912 345 6789 \n";

	    $this->ci->cezpdf->ezText($content, 10, array('justification' => 'left'));
		
		prep_pdf(); // creates the footer for the document we are creating.
 
		$this->ci->cezpdf->ezTable($data["list"], $data["columns"], $data["table-title"], array('width'=>550));

		if(isset($data["footer"])){
			$this->ci->cezpdf->ezSetDy(-20);
			$this->ci->cezpdf->ezText($data["footer"], 13, array('justification' => 'right'));
		}
	    	

		$this->ci->cezpdf->ezStream();
	} 

 
	 


}
 

