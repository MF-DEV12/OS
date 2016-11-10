<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {
 
	private $param;  
	private $fielddesc;  

 	function __construct(){ 
 		parent::__construct();    
		$this->param = $this->param = $this->query_model->param; 
 		$this->param["table"] = "tblcategory";
 		$this->param["fields"] = "catid,catdescription,createddate";
 		$this->param["fields_list"] = "catid|ACTION,catid|ID,catdescription|Category Name,createddate|Date Created";
 		$this->param["primaryfld"] = "catid"; // single condition only
 		$this->param["requiredfields"] = "catdescription";
 
	}
 
	public function index()
	{
		 $data = array();
		 $data["title"] = "Category"; 
		 $data["mode"] = "maintenance"; 
		 $data["primarykey"] = $this->param["primaryfld"]; 
		 $data["requiredfields"] = $this->param["requiredfields"]; 
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

	function deleteData(){
		$data = json_decode($this->input->post("data"),true);
		$this->param["conditions"] = $this->param["primaryfld"] . " = '" . $data[$this->param["primaryfld"]] . "'"; // single condition only
		echo $this->query_model->removeData($this->param);
	}


	function listData(){
		echo json_encode($this->getData());
	}



	 
	
	 
}
