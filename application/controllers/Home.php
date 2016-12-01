<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
 private $param;
 	function __construct(){
 		parent::__construct();
 
 	}

 	function index(){
 		$data["family"] = $this->getFamilyName();
 		$this->load->view('home',$data);
 	}

 	function getFamilyName(){ 
 		$this->param = $this->param = $this->query_model->param; 
 		$this->param["table"] = "Level1";
 		$this->param["fields"] = "*";
		$this->param["order"] = "Name1";
		$result = $this->query_model->getData($this->param);
		return $result;
 	}
 
	 
}
