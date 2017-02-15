<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
 private $param;
 	function __construct(){
 		parent::__construct();
 
 	}

 	function index(){
 		$data['username'] = $this->session->userdata("username");
		$data['role'] = $this->session->userdata("role");
		$data['name'] = $this->session->userdata("name");
 		$data["family"] = $this->getFamilyName();
		$listItemsInCart = $this->session->userdata("cartitems");
 		$data["totalItemCart"] = ($listItemsInCart) ? count($listItemsInCart) : "";
 		$this->load->view('home',$data);
 	}

 	function getFamilyName(){ 
 		$this->param = $this->param = $this->query_model->param; 
 		$this->param["table"] = "level1";
 		$this->param["fields"] = "*";
		$this->param["order"] = "Name1";
		$this->param["limit"] = "8";
		$result = $this->query_model->getData($this->param);
		return $result;
 	}
 	function test(){
 		$this->load->view('test');

 	}
	function mobile(){
		header("Location: http://developer.globelabs.com.ph/dialog/oauth?app_id=dGo5fEd97jF5bcboMpT9yAFzMGaGf97b");
		exit();
	} 
}
