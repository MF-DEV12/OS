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
 		$item = $this->input->get("name");
 		$data["family"] = ($level1no) ? $this->getFamilyName($level1no) : array();
 		$data["category"] = ($level2no) ? $this->getCategoryName($level2no) : array();
 		$data["subcategory"] = ($level3no) ? $this->getSubCategoryName($level2no) : array();
 		$data["listfamily"] = $this->getListFamily();
 		$data["listcategory"] = $this->getCategoryByFamily();
 		$data["listsubcategory"] = $this->getSubCategory();
 		// $this->session->sess_destroy();

 		// Get Items
 		$id = "{"; 
 		$id .= ($level1no) ? "\"l1\": \"$level1no\"" : ""; 
 		$id .= ($level2no) ? ",\"l2\": \"$level2no\"" : ""; 
 		$id .= ($level3no) ? ",\"l3\": \"$level3no\"" : ""; 
 		$id .= ($item) ? "\"name\": \"$item\"" : ""; 
 		$id .= "}"; 
 		$data["items"] = $this->getItemsForSale($id);

 		$listItemsInCart = $this->session->userdata("cartitems");
 		$data["totalItemCart"] = ($listItemsInCart) ? count($listItemsInCart) : "";

 		$this->load->view('items',$data);
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
 		 
		echo json_encode($this->getItemsForSale($data)); 
 	}

 	function getItemsForSale($id){
 		$data = $id; 
 		$data = json_decode($data);
 		 
 		$this->param = $this->param = $this->query_model->param; 
 		$this->param["table"] = "vw_itemsforsale";
 		$this->param["fields"] = "*";
		$this->param["conditions"] = "";
		if(isset($data->l1))
			$this->param["conditions"] .= " Level1No = '$data->l1'";
		if(isset($data->l2))
			$this->param["conditions"] .= " AND Level2No = '$data->l2'";
		if(isset($data->l3))
			$this->param["conditions"] .= " AND Level3No = '$data->l3'";


		if(isset($data->name))
			$this->param["conditions"] .= " Name like '%$data->name%'";


		$this->param["groups"] = "ItemNo, ItemNoV";
		$this->param["order"] = "Name";
		 
		return $this->query_model->getData($this->param);
 	}

 	function getItemVariant($item){ 
 		$this->param = $this->param = $this->query_model->param; 
 		$this->param["table"] = "itemvariant";
 		$this->param["fields"] = "*";
 		$this->param["conditions"] = "ItemNo = '$item' and Owned = 1 and Price is not null";
		$result = $this->query_model->getData($this->param);
		return $result;
 	}
 	

 	// VIEW ITEMS

 	function view(){
 		$item = $this->input->get("id"); 
		$level1no = $this->input->get("family");
 		$level2no = $this->input->get("category");
 		$level3no = $this->input->get("subcategory");
		$data["family"] = ($level1no) ? $this->getFamilyName($level1no) : array();
 		$data["category"] = ($level2no) ? $this->getCategoryName($level2no) : array();
 		$data["subcategory"] = ($level3no) ? $this->getSubCategoryName($level2no) : array();
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
 	  	$data['username'] = $this->session->userdata("username");
		$data['role'] = $this->session->userdata("role");
		$data['name'] = $this->session->userdata("name");
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

 		$data["carttotal"] = count($listItemsInCart);
 		$data["item"] = $this->getItemsByItemNo("'" . $item . "'");
 		$data["itemstotal"] = $this->getTotalPriceFromCart($listItemsInCart);
 		echo json_encode($data);
 	}
	 
	function updateItemQtyonCart(){
 		$item = $this->input->post("id");
 		$qty = $this->input->post("qty"); 
 		$listItemsInCart = $this->session->userdata("cartitems"); 
 		$listItemsInCart["'". $item ."'"] = $qty;
 		$this->session->set_userdata('cartitems', $listItemsInCart); 
 		echo true;
	}

	function getTotalPriceFromCart($listItemsInCart){
	  
		$listitemkeys = array_keys($listItemsInCart);
		$listitem = implode(",", $listitemkeys);
	 
 		
 		$this->param = $this->param = $this->query_model->param; 
 		$this->param["table"] = "vw_itemsforsale";
 		$this->param["fields"] = "*,0 Quantity";
		$this->param["conditions"] = "ItemNumber IN($listitem)";
		$this->param["order"] = "Name";
		$result = $this->query_model->getData($this->param);
		
		$total = 0.00;
		foreach ($result as $key) 
			$total += (int)$listItemsInCart["'" . $key->ItemNumber . "'"] * (float)$key->Price;
		 
		return $total;
	}

	function removeCart(){
		$item = $this->input->post("id");
 		$listItemsInCart = $this->session->userdata("cartitems"); 
 		unset($listItemsInCart["'" . $item . "'"]);
 		$this->session->set_userdata('cartitems', $listItemsInCart); 
 		$listItemsInCart = $this->session->userdata("cartitems"); 
 		$data["carttotal"] = (count($listItemsInCart) == 0)  ?  "" : count($listItemsInCart);
 		$data["itemstotal"] = (count($listItemsInCart) == 0)  ?  array() : $this->getTotalPriceFromCart($listItemsInCart);
 		

 		echo json_encode($data);
	}


	// CHECKOUT
	function checkout(){ 
 	  	$data['username'] = $this->session->userdata("username");
		$data['role'] = $this->session->userdata("role");
		$data['name'] = $this->session->userdata("name");
 		$data["listfamily"] = $this->getListFamily();
 		$data["listcategory"] = $this->getCategoryByFamily();
 		$data["listsubcategory"] = $this->getSubCategory();
 		$listItemsInCart = $this->session->userdata("cartitems");
 		$data["totalItemCart"] = ($listItemsInCart) ? count($listItemsInCart) : "";
 		$email = $this->session->userdata("username");
 		$data["customer"] = ($email) ? $this->getCustomerDetailsByEmail($email) : array();
 		$data["itemsoncart"] = array();
 		if($listItemsInCart)	 
 			$data["itemsoncart"] = $this->getItemsByItemNo($listItemsInCart);

 		$this->load->view("checkout", $data);
 	
 	}

 	function submitOrder(){
 	 	date_default_timezone_set("Asia/Manila");
		$date = date('Y-m-d H:i:s');
		$datetime = date('Y-m-d H:i:s', strtotime($date));

 		$data = $this->input->post("data");
 		$data = json_decode($data);
		$username = $this->session->userdata("username");
		if(!$username){ 
			//Insert Customer
			$this->param = $this->param = $this->query_model->param; 
			$this->param["table"] = "customer";
			$this->param["dataToInsert"] = $data;
			$this->param["transactionname"] = "New customer";
			$this->query_model->insertData($this->param);

			//Insert Account
			$password = 'password';//$this->randomPassword();
			$this->param = $this->param = $this->query_model->param; 
			$this->param["table"] = "accounts";
			$account["Username"] = $data->Email;
			$account["LastName"] = $data->LastName;
			$account["FirstName"] =$data->FirstName;
			$account["Password"] = md5($password);
			$account["LoginType"] = 'customer'; 
			$this->param["dataToInsert"] = $account;
			$this->query_model->insertData($this->param);
		}


		// Get CustomerNo by Email
		$this->param = $this->param = $this->query_model->param; 
		$this->param["table"] = "customer";
		$this->param["fields"] = "*";
		if(!$username)
			$this->param["conditions"] = "Email = '$data->Email'"; 
		else
			$this->param["conditions"] = "Email = '$username'"; 

		$result = $this->query_model->getData($this->param);
		$customerNo = $result[0]->CustomerNo;
		$shippingaddress = $data->ShipAddress;

		//Insert tblOrder 
		$data = array();
		$this->param = $this->param = $this->query_model->param; 
		$this->param["table"] = "tblorder";
		$data["CustomerNo"] = $customerNo;
		$data["Date"] = $datetime;
		$data["ShipAddress"] = $shippingaddress;
		$this->param["dataToInsert"] = $data;
		$this->param["transactionname"] = "New Order";
		$this->query_model->insertData($this->param);

		// Get OrderNo by Date and CustomerNo
		$this->param = $this->param = $this->query_model->param; 
		$this->param["table"] = "tblorder";
		$this->param["fields"] = "*";
		$this->param["conditions"] = "Date = '$datetime' and CustomerNo = '$customerNo'";
		$result = $this->query_model->getData($this->param);
		$OrderNo = $result[0]->OrderNo;
 

		$listItemsInCart = $this->session->userdata("cartitems"); 
		$itemsoncart = $this->getItemsByItemNo($listItemsInCart);

		$total = 0.00;

		// INSERT ORDER ITEM DETAILS - tblorderdetails
		foreach ($itemsoncart as $key) {
			$data = array();
			$this->param = $this->param = $this->query_model->param; 
			$this->param["table"] = "tblorderdetails";
			$data["OrderNo"] = $OrderNo;
			$data["ItemVariantNo"] = $key->ItemNumber;
			$data["Quantity"] = $key->Quantity;
			$data["Price"] = $key->Price;
			$data["SubTotal"] = (float)$key->Price * $key->Quantity;
			$this->param["dataToInsert"] = $data; 
			$this->query_model->insertData($this->param);

			$total += (float)$key->Price * $key->Quantity;
		}
		

		//Update TotalAmount from tblorder
		$data = array();
		$this->param = $this->param = $this->query_model->param; 
		$this->param["table"] = "tblorder";
		$this->param["conditions"] = "Date = '$datetime' and CustomerNo = '$customerNo'";
		$data["TotalAmount"] = $total;
		$this->param["dataToUpdate"] = $data;
		$this->query_model->updateData($this->param);
 		
		$this->session->unset_userdata('cartitems');

  		echo true;
 	}

 	function randomPassword() {
	    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
	    $pass = array(); //remember to declare $pass as an array
	    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
	    for ($i = 0; $i < 6; $i++) {
	        $n = rand(0, $alphaLength);
	        $pass[] = $alphabet[$n];
	    }
	    return implode($pass); //turn the array into a string
	}

	function getCustomerDetailsByEmail($email){
		$this->param = $this->param = $this->query_model->param; 
		$this->param["table"] = "customer";
		$this->param["fields"] = "*";
		$this->param["conditions"] = "Email = '$email'";
		return $this->query_model->getData($this->param);	 
	}

	function termsandconditions(){
		$this->load->view("termsandconditions");
	}

}
