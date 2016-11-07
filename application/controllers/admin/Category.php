<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {
 
	private $param;  
	private $fielddesc;  

 	function __construct(){ 
 		parent::__construct();    
		$this->param = $this->param = $this->query_model->param; 
 		$this->param["table"] = "tblcategory";
 		$this->param["fields"] = "catid `ID`, catdescription `Category`, createddate `Date Created`";
 
	}

	public function index()
	{
		 $data = array();
		 $data["title"] = "Vote Category"; 
		 $data["list"] = $this->getData(); 
		 $this->load->view("admin/maintenance",$data); 
	}

	function getData(){
		$param = $this->param;
		$param["conditions"] = "status = 1";
		$param["order"] = "catdescription";
		return $this->query_model->getData($param);

	}

	 
	
	 
}
