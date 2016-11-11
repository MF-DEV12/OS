<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

 	function __construct(){
 		parent::__construct(); 
		if(!$this->session->userdata("username"))
 			redirect("/login"); 
 	}
	public function index()
	{
		$data['role'] = $this->session->userdata("role");
		$this->load->view('index', $data);



	}

	 
	// ADMIN SIDE

	// PURCHASE ORDERS 
		function PurchaseOrderData(){
			$data["purchaseorder"] = $this->GetListOfPO();
			$data["receivings"] = $this->GetReceivings();
			$data["backorders"] = $this->GetBackOrders();

			echo json_encode($data); 
		}

		function GetListOfPO(){
			$this->param = $this->param = $this->query_model->param; 
			$this->param["table"] = "supplyrequest sr";
			$this->param["fields"] = "sr.SupplyRequestNo, s.SupplierName, COUNT(rl.SupplyRequestNo) `NoOfItems` , Date";
			$this->param["joins"]  = "INNER JOIN requestlist rl ";
			$this->param["joins"] .= "ON sr.SupplyRequestNo = rl.SupplyRequestNo AND rl.Quantity IS NOT NULL ";
			$this->param["joins"] .= "INNER JOIN supplier s ";
			$this->param["joins"] .= "ON sr.SupplierNo = s.SupplierNo ";
			$this->param["groups"] = "rl.SupplyRequestNo";
			$this->param["order"] = "Date DESC";
 
			$data["list"] =  $this->query_model->getData($this->param);
			$data["fields"] = "SupplyRequestNo|No,NoOfItems|No of items,SupplierName|Supplier name,Date|Date Order";
			return $data;

		}
		function GetReceivings(){
			$this->param = $this->param = $this->query_model->param; 
			$this->param["table"] = "supplyrequest sr";
			$this->param["fields"] = "SupplyNo, DateReceive, s.SupplierName, CONCAT(Name, '<br/>', Size, ' ', Color, ' ', Description, ' ') `ItemDescription`, QuantityReceived, PendingQuantity, Quantity";
			$this->param["joins"]  = "INNER JOIN supply sup ON sr.SupplyRequestNo = sup.SupplyRequestNo ";
			$this->param["joins"] .= "INNER JOIN requestlist rl ON sr.SupplyRequestNo = rl.SupplyRequestNo AND sup.`RequestListNo` = rl.`RequestListNo` ";
			$this->param["joins"] .= "INNER JOIN item i ON rl.ItemNo = i.ItemNo ";
			$this->param["joins"] .= "INNER JOIN itemvariant iv ON rl.VariantNo = iv.VariantNo ";
			$this->param["joins"] .=  "INNER JOIN supplier s ON sr.SupplierNo = s.SupplierNo ";
			$this->param["conditions"] = "isReceived = 1";	
			$this->param["order"] = "DateReceive Desc";	


		 

			$data["list"] =  $this->query_model->getData($this->param);
			$data["fields"] = "SupplyNo|No,DateReceive|Date Received,SupplierName|Supplier name,ItemDescription|Item Description,QuantityReceived|Qty Received,PendingQuantity|Qty Back Order,Quantity|QTY Expected Received";
			return $data;

		}

		function GetBackOrders(){
			$this->param = $this->param = $this->query_model->param; 
			$this->param["table"] = "supplyrequest sr";
			$this->param["fields"] = "rq.RequestListNo, s.SupplierName, CONCAT(Name, '<br/>', Size, ' ', Color, ' ', Description, ' ') `ItemDescription`, Received, PendingQuantity";
			$this->param["joins"] = "INNER JOIN requestlist rq ON sr.SupplyRequestNo = rq.SupplyRequestNo ";
			$this->param["joins"] .= "INNER JOIN supply sup ON rq.RequestListNo = sup.RequestListNo ";
			$this->param["joins"] .=  "INNER JOIN supplier s ON sr.SupplierNo = s.SupplierNo ";
			$this->param["joins"] .= "INNER JOIN item i ON rq.ItemNo = i.ItemNo ";
			$this->param["joins"] .= "INNER JOIN itemvariant iv ON rq.VariantNo = iv.VariantNo AND i.ItemNo = iv.VariantNo ";
			$this->param["conditions"] = "PendingQuantity > 0";	
			$this->param["order"] = "DateReceive Desc";	
	 
			$data["list"] =  $this->query_model->getData($this->param);
			$data["fields"] = "RequestListNo|No,s.SupplierName|Supplier name,ItemDescription|Item Description,Received|Qty Received,PendingQuantity|Qty Pending";
			return $data;

		}
	///


}
