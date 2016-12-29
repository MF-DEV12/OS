<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GeneratePDF{
    
	function Generate($data){ 
		 
		$this->ci = & get_instance();
  
	    $this->ci->load->library('cezpdf');
		$this->ci->load->helper('pdf');
		
		prep_pdf(); // creates the footer for the document we are creating.
 
		$this->ci->cezpdf->ezTable($data["list"], $data["columns"], $data["title"], array('width'=>550));
		$this->ci->cezpdf->ezStream();
	} 

 
	 


}


