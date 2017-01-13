<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Query_model extends CI_Model {
     
	 public $param  = array(
	 						 "table" => "",
	 						 "fields" => "",
	 						 "joins" => "",
	 						 "conditions" => "",
	 						 "groups" => "",
	 						 "order" => "",
	 						 "limit" => "",
	 						 "dataToInsert" => "",
	 						 "dataToUpdate" => "",
	 						 "queryFile" => "",
	 						 "queryReplace" => "",
	 						 "transactionname" =>"", 
	 						 "isArrayReturn" => false 
	 				 );

	 function getData($data){
	 	if($data["queryFile"] == ""){
	 		$qry = "SELECT ";
		 	$qry .= $data["fields"] . " "; 
		 	$qry .= "FROM "; 
		 	$qry .= $data["table"] . " "; 
		 	
		 	if($data["joins"] != "")
		 		$qry .= $data["joins"] . " "; 

		 	if($data["conditions"] != "")
		 		$qry .= "WHERE " .  $data["conditions"] . " ";

		 	if($data["groups"] != "")
		 		$qry .= "GROUP BY " . $data["groups"] . " "; 

		 	if($data["order"] != "")
		 		$qry .= "ORDER BY " . $data["order"] . " "; 

		 	if($data["limit"] != "")
		 		$qry .= "LIMIT " . $data["limit"];


		 	
	 	}
	 	else{
	 		$qry = file_get_contents('sp/'. $data["queryFile"] .'.txt');
	 		foreach ($data["queryReplace"] as $key) {
	 			$qry = str_replace($key["KEY"], $key["VALUE"], $qry);
	 		} 
	 	}

	 	$query = $this->db->query($qry); 
	 	if($data["isArrayReturn"])
	 		return $query->result_array();
	 	else
	 		return $query->result();

	 	

	 }

	 function insertData($data){ 
		$this->db = $this->load->database('default',TRUE);
		$dbdebug = $this->db->db_debug; 
		$this->db->db_debug = FALSE;

		$result = $this->db->insert($data['table'],$data['dataToInsert']);
		@mysqli_next_result($this->db);
		$this->db->db_debug = $dbdebug;
		if(!$result){
			$error = $this->db->error();
			if($error['code'] == 1062){
				return 1062;
			}
			return $error['message'];

		} 

		$this->insertAuditLogs($data['transactionname'],"Insert");
		
		return $result;
	}


	function updateData($data){
		if($data['conditions']!=""){$this->db->where($data['conditions']);}
		$this->db->update($data['table'],$data['dataToUpdate']);

	 	if($data['transactionname'] != "") {$this->insertAuditLogs($data['transactionname'],"Update");}

		// $this->setAuditLogs('edit',$data['table']); 
		return true;
	}

	function removeData($data){
		if($data['conditions']!=""){$this->db->where($data['conditions']);}
		$this->db->delete($data['table']);
		if($data['transactionname'] != "") {$this->insertAuditLogs($data['transactionname'],"Delete");}
		// $this->setAuditLogs('remove',$data['table']); 
		return true;
	}

	function insertAuditLogs($transaction,$action){
		$username = $this->session->userdata("username");
		$data["Transaction"] = $transaction;
		$data["ModifiedBy"] = $username;
		$data["Action"] = $action; 
		$this->db->insert("tblauditlogs",$data);
	}

}


?>