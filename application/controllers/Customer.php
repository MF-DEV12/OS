<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {
 private $param;
 	function __construct(){
 		parent::__construct();
 
 	}

 	function index(){

 		$level1no = $this->input->get("family");
 		$data["family"] = $this->getFamilyName($level1no);
 		$data["category"] = $this->getCategoryByFamily($level1no);
 		$this->load->view('customerorder',$data);
 	}

 	function getFamilyName($level1no = ""){ 
 		$this->param = $this->param = $this->query_model->param; 
 		$this->param["table"] = "Level1";
 		$this->param["fields"] = "*";
		$this->param["conditions"] = "Level1No = '$level1no'";
		$this->param["order"] = "Name1";
		$result = $this->query_model->getData($this->param);
		return $result;
 	}
 	function getCategoryByFamily($level1no){ 
 		$this->param = $this->param = $this->query_model->param; 
 		$this->param["table"] = "Level2";
 		$this->param["fields"] = "*";
		$this->param["conditions"] = "Level1No = '$level1no'";
		$this->param["order"] = "Name2";
		$result = $this->query_model->getData($this->param);
		return $result;
 	}
 	function getSubCategory($level1no){ 
 		$this->param = $this->param = $this->query_model->param; 
 		$this->param["table"] = "Level2";
 		$this->param["fields"] = "*";
		$this->param["conditions"] = "Level1No = '$level1no'";
		$this->param["order"] = "Name2";
		$result = $this->query_model->getData($this->param);
		return $result;
 	}

 
	 
}
