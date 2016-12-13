<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {
 private $param;
 	function __construct(){
 		parent::__construct();
 
 	}

 	function index(){
 		 
 		$this->load->view('print/printlist',$data);
 	}


 	
 	 
 
	 
}
