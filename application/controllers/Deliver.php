<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Deliver extends CI_Controller {
 private $param;
 	function __construct(){
 		parent::__construct();
 		// if($this->session->userdata("username"))
 		// 	redirect("/main"); 
 		$this->param = $this->param = $this->query_model->param; 
 		$this->param["table"] = "accounts";
 	}

 	function index(){
 		$data['username'] = $this->session->userdata("username");
		$data['role'] = $this->session->userdata("role");
		$data['name'] = $this->session->userdata("name");
 		
 
 		$data["shipping"] = $this->getOrders("Ship");
 		$data["delivered"] = $this->getOrders("Delivered");
 		$data["cancelled"] = $this->getOrders("Cancel");

 		$this->load->view('deliver-list',$data);
 	}

 	
 	
 	function getOrders($status){
 		$this->param = $this->param = $this->query_model->param; 
 		$accountno	 = $this->session->userdata("accountno");
 		$this->param["table"] = "vw_allorders";
 		$this->param["fields"] = "*";
 		$this->param["conditions"] = "Status = '$status' and DeliverBy = '$accountno'";
		$result = $this->query_model->getData($this->param);
		//die($this->db->last_query());
		return $result; 
 	}
	 
	function trackcustomer(){
		$data['username'] = $this->session->userdata("username");
		$data['role'] = $this->session->userdata("role");
		$data['name'] = $this->session->userdata("name");
		$landmark = $this->input->get("dest");
		$data["delivertrack"] = "https://www.google.com/maps/embed/v1/directions?key=". GPS_API . "&origin=14.7202842,121.01659&destination=". $landmark ."&avoid=tolls|highways&zoom=12";
		$this->load->view("deliver-map",$data);
	}
	 
}
