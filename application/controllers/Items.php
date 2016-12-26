<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Items extends CI_Controller {
 private $param;
 	function __construct(){
 		parent::__construct();
 		$this->load->helper('url');
 	}

 	function index(){

 		$level1no = $this->input->get("family");
 		$level2no = $this->input->get("category");
 		$level3no = $this->input->get("subcategory");
 		$data["family"] = $this->getFamilyName($level1no);
 		$data["category"] = ($level2no) ? $this->getCategoryName($level2no) : array();
 		$data["subcategory"] = ($level3no) ? $this->getSubCategoryName($level2no) : array();
 		$data["listfamily"] = $this->getListFamily();
 		$data["listcategory"] = $this->getCategoryByFamily();
 		$data["listsubcategory"] = $this->getSubCategory();
 		$this->session->sess_destroy();

 		$listItemsInCart = $this->session->userdata("cartitems");
 		$data["totalItemCart"] = ($listItemsInCart) ? count($listItemsInCart) : "";

 		$this->load->view('customerorder',$data);
 	}

 	function getFamilyName($level1no = ""){ 
 		$this->param = $this->param = $this->query_model->param; 
 		$this->param["table"] = "level1";
 		$this->param["fields"] = "*";
		$this->param["conditions"] = "Level1No = '$level1no'";
		$this->param["order"] = "Name1";
		$result = $this->query_model->getData($this->param);
		return $result;
 	}

 	function getCategoryName($level2no = ""){ 
 		$this->param = $this->param = $this->query_model->param; 
 		$this->param["table"] = "level2";
 		$this->param["fields"] = "*";
		$this->param["conditions"] = "Level2No = '$level2no'";
		$this->param["order"] = "Name2";
		$result = $this->query_model->getData($this->param);
		return $result;
 	}

 	function getSubCategoryName($level3no = ""){ 
 		$this->param = $this->param = $this->query_model->param; 
 		$this->param["table"] = "level3";
 		$this->param["fields"] = "*";
		$this->param["conditions"] = "Level3No = '$level3no'";
		$this->param["order"] = "Name3";
		$result = $this->query_model->getData($this->param);
		return $result;
 	}



 	function getListFamily(){ 
 		$this->param = $this->param = $this->query_model->param; 
 		$this->param["table"] = "level1";
 		$this->param["fields"] = "*";
		$this->param["order"] = "Name1";
		$result = $this->query_model->getData($this->param);
		return $result;
 	}

 	function getCategoryByFamily(){ 
 		$this->param = $this->param = $this->query_model->param; 
 		$this->param["table"] = "level2";
 		$this->param["fields"] = "*";
		$this->param["order"] = "Name2";
		$result = $this->query_model->getData($this->param);
		return $result;
 	}
 	function getSubCategory(){ 
 		$this->param = $this->param = $this->query_model->param; 
 		$this->param["table"] = "level3";
 		$this->param["fields"] = "*";
		$this->param["order"] = "Name3";
		$result = $this->query_model->getData($this->param);
		return $result;
 	}

 	function getItemsByItemNo($listItemsInCart){ 
 		$listitem = "";
 		if(is_array($listItemsInCart)){
 			$listitemkeys = array_keys($listItemsInCart);
			$listitem = implode(",", $listitemkeys);
 		}
 		else{
 			$listitem = $listItemsInCart;
 		}
 		
 		$this->param = $this->param = $this->query_model->param; 
 		$this->param["table"] = "vw_itemsforsale";
 		$this->param["fields"] = "*,0 Quantity";
		$this->param["conditions"] = "ItemNumber IN($listitem)";
		$this->param["order"] = "Name";
		$result = $this->query_model->getData($this->param);
		
		// die($this->db->last_query());
		if(is_array($listItemsInCart)){
			foreach ($result as $key) 
				$key->Quantity = $listItemsInCart["'" . $key->ItemNumber . "'"]; 
		}
		return $result;
 	}

 	function getItems(){
 		$data = $this->input->post("id");
 		$data = json_decode($data);
 		// print_r($data);
 		// die($data->l2);
 		$this->param = $this->param = $this->query_model->param; 
 		$this->param["table"] = "vw_itemsforsale";
 		$this->param["fields"] = "*";
		$this->param["conditions"] = "Level1No = '$data->l1'";
		if(isset($data->l2))
			$this->param["conditions"] .= " AND Level2No = '$data->l2'";
		if(isset($data->l3))
			$this->param["conditions"] .= " AND Level3No = '$data->l3'";

		$this->param["groups"] = "ItemNo, ItemNoV";
		$this->param["order"] = "Name";
		 
		$result = $this->query_model->getData($this->param);
		echo json_encode($result); 
 	}

 	function getItemVariant($item){ 
 		$this->param = $this->param = $this->query_model->param; 
 		$this->param["table"] = "itemvariant";
 		$this->param["fields"] = "*";
 		$this->param["conditions"] = "ItemNo = '$item'";
		$result = $this->query_model->getData($this->param);
		return $result;
 	}
 	

 	// VIEW ITEMS

 	function view(){
 		$item = $this->input->get("id"); 

 		$data["listfamily"] = $this->getListFamily();
 		$data["listcategory"] = $this->getCategoryByFamily();
 		$data["listsubcategory"] = $this->getSubCategory();
 		$listItemsInCart = $this->session->userdata("cartitems");
 		$data["totalItemCart"] = ($listItemsInCart) ? count($listItemsInCart) : "";

 		$data["items"] = $this->getItemsByItemNo("'" . $item . "'");
 		$itemno = explode("-", $item);
 		$data["itemvariant"] = $this->getItemVariant($itemno[0]);

 		$this->load->view("viewitem", $data);
 	}


 	// CART
	function cart(){ 
 	  
 		$data["listfamily"] = $this->getListFamily();
 		$data["listcategory"] = $this->getCategoryByFamily();
 		$data["listsubcategory"] = $this->getSubCategory();
 		$listItemsInCart = $this->session->userdata("cartitems");
 		$data["totalItemCart"] = ($listItemsInCart) ? count($listItemsInCart) : "";
 		$data["itemsoncart"] = array();
 		if($listItemsInCart)	 
 			$data["itemsoncart"] = $this->getItemsByItemNo($listItemsInCart);

 		$this->load->view("cart", $data);
 	}

 	function orderToCart(){
 		$item = $this->input->post("id");
 		$bindItemQty["'". $item . "'" ] = 1; // ITEM => ORDER QTY
 		 
 		$listItemsInCart = $this->session->userdata("cartitems"); 
 		 
 		if($listItemsInCart){
 			if(!array_key_exists($item, $listItemsInCart)){ 
 				$listItemsInCart["'". $item ."'"] = 1; // ITEM => ORDER QTY
 				$this->session->set_userdata('cartitems', $listItemsInCart); 
 			} 
 		}
 		else{
 			$data["cartitems"] = $bindItemQty; 
			$this->session->set_userdata($data);   
 		} 
 		
 		$listItemsInCart = $this->session->userdata("cartitems");

 		echo count($listItemsInCart);
 	}
	 
	function updateItemQtyonCart(){
 		$item = $this->input->post("id");
 		$qty = $this->input->post("qty"); 
 		$listItemsInCart = $this->session->userdata("cartitems"); 
 		$listItemsInCart["'". $item ."'"] = $qty;
 		$this->session->set_userdata('cartitems', $listItemsInCart); 
 		echo true;
	}
}
