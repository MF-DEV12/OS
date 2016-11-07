<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
 private $param;
 	function __construct(){
 		parent::__construct();
 		$this->param = $this->param = $this->query_model->param; 
 		$this->param["table"] = "tblusers";
 	}
	function validateUser(){
		$username = $this->input->post("username");
		$password = $this->input->post("password");
		$password = MD5($password);
		$this->param["fields"] = "*";
		$this->param["conditions"] = " USERNAME = '$username' AND `PASSWORD` = '$password'";
		$result = $this->query_model->getData($this->param);
		if($result){
			$data["username"] = $result[0]->USERNAME;
			$this->session->set_userdata($data);

			echo json_encode(array("result"=>"ok"));

		}
		else
			echo json_encode(array("result"=>"no")); 
	}

	function clearSession(){
		$this->session->sess_destroy();
		redirect("/Indexpage");
	}
	
	 
}
