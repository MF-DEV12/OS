<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {
 
	private $param;  
	private $fielddesc;  

 	function __construct(){ 
 		parent::__construct();    
		$this->param = $this->param = $this->query_model->param; 
 		$this->param["table"] = "tblcategory";
 		$this->param["fields"] = "catid,catdescription";
 		$this->param["fields_list"] = "catid|ACTION,catid|ID,catdescription|Category Name";
 
	}
 
	public function index()
	{
		 $data = array();
		 $data["title"] = "Vote Category"; 
		 $data["list"] = $this->getData(); 
		 $data["fields"] = $this->param["fields_list"]; 
		 $data["controller"] = "admin/Category/";  
		 $data["columns"] =  $this->param["fields_list"];
		 $this->load->view("admin/maintenance",$data); 
	}

	function getData(){
		$param = $this->param;
		$param["conditions"] = "status = 1";
		$param["order"] = "catdescription";
		return $this->query_model->getData($param);

	}

	function listData(){
		echo json_encode($this->getData());
	}

	 
	
	 
}
