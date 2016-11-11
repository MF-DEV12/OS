<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
 private $param;
 	function __construct(){
 		parent::__construct();
 		// if($this->session->userdata("username"))
 		// 	redirect("/main"); 
 		$this->param = $this->param = $this->query_model->param; 
 		$this->param["table"] = "accounts";
 	}

 	function index(){
 		$this->load->view('login');
 	}

	function validateUser(){
		$username = $this->input->post("username");
		$password = $this->input->post("password");
		$password = MD5($password);
		$this->param["fields"] = "*";
		$this->param["conditions"] = " Username = '$username' AND `Password` = '$password'";
		$result = $this->query_model->getData($this->param);
		// $this->session->set_flashdata('error', $this->db->last_query()); // debug purpose
		if($result){
			$data["username"] = $result[0]->Username;
			$data["role"] = $result[0]->LoginType;
			$this->session->set_userdata($data); 
			redirect("/main");
		}
		else
			$this->session->set_flashdata('error', "Username and password did not match.");
			redirect("login");
	}

	function clearSession(){

		$this->session->sess_destroy();
		redirect("/login");
	}
	
	 
}
