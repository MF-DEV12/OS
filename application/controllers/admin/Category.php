<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {
 
	private $param;  
	private $fielddesc;  

 	function __construct(){ 
 		parent::__construct();    
		$this->param = $this->param = $this->query_model->param; 
 		$this->param["table"] = "customer";
 		$this->param["fields"] = "CustomerNo,Lastname,Firstname,ContactNo,Email,Address";
 		$this->param["fields_list"] = "CustomerNo|ACTION,CustomerNo|ID,Lastname|Last name,Firstname|First name,ContactNo|Contact Number,Email|Email Address,Address|Address";
 		$this->param["primaryfld"] = "CustomerNo"; // single condition only
 		$this->param["requiredfields"] = "Lastname,Firstname,ContactNo,Email,Address";
 
	}
 
	public function index()
	{
		 $data = array();
		 $data["title"] = "Customers"; 
		 $data["mode"] = "maintenance"; 
		 $data["requiredfields"] = $this->param["requiredfields"]; 
		 $data["list"] = $this->getData(); 
		 $data["fields"] = $this->param["fields_list"]; 
		 $data["controller"] = "admin/Category/";  
		 $data["columns"] =  $this->param["fields_list"];
		 $this->load->view("admin/maintenance",$data); 
	}

	function getData(){
		$param = $this->param;
		//$param["conditions"] = "status = 1";
		$param["order"] = "Lastname";
		return $this->query_model->getData($param);

	}

	function addData(){ 
		$data = json_decode($this->input->post("data"),true);
		$this->param["dataToInsert"] = $data;
		echo $this->query_model->insertData($this->param);
	}

	function editData(){ 
		$data = json_decode($this->input->post("data"),true);
		$this->param["conditions"] = $this->param["primaryfld"] . " = '" . $data[$this->param["primaryfld"]] . "'"; // single condition only
		$this->param["dataToUpdate"] = $data;
		echo $this->query_model->updateData($this->param);
	}

	function listData(){
		echo json_encode($this->getData());
	}



	 
	
	 
}
