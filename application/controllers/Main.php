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
		$data["suppliers"] = $this->GetSuppliers();
		$this->load->view('index', $data);



	}

	function initializeAllData(){
			$data["purchaseorder"] = $this->GetListOfPO();
			$data["receivings"] = $this->GetReceivings();
			$data["backorders"] = $this->GetBackOrders();
			$data["suppliers"] = $this->GetSuppliers();

			$data["inventory"] = $this->getInventory();
			$data["items"] = $this->getItems();
			$data["lowstocks"] = $this->getLowStocks();

			$data["allorders"] = $this->getOrders("");
			$data["neworders"] = $this->getOrders("New");
			$data["processorders"] = $this->getOrders("Process");
			$data["shippedorders"] = $this->getOrders("Ship");
			$data["cancelledorders"] = $this->getOrders("Cancel");

			echo json_encode($data); 
	}


	 
// ADMIN SIDE
	// PURCHASE ORDERS 
		
		function GetListOfPO(){
			$this->param = $this->param = $this->query_model->param; 
			$this->param["table"] = "vw_getpurchaseorders";
			$this->param["fields"] = "*"; 
 
			$data["list"] =  $this->query_model->getData($this->param);
			$data["fields"] = "SupplyRequestNo|No,NoOfItems|No of items,SupplierName|Supplier name,Date|Date Order,Action|Action";
			return $data;

		}

		function getSupplierOrder(){
			$supplierID = $this->input->post("sid");
			$this->param = $this->param = $this->query_model->param; 
			$this->param["table"] = "item i";
			$this->param["fields"] = "CONCAT('<input type=\"checkbox\" data-item=\"', i.ItemNo, '\" data-variant=\"', iv.VariantNo ,'\" checked>') Action,"; 
			$this->param["fields"] .= "CONCAT(i.ItemNo,'-', iv.VariantNo) ItemNo, CONCAT(Name, '<br/>', iv.Size, ' ', iv.Color, ' ', iv.Description) Description, DPOCost"; 
			$this->param["joins"] = "INNER JOIN itemvariant iv ON i.ItemNo = iv.ItemNo"; 
			$this->param["conditions"] = "i.SupplierNo = '$supplierID'";

			$data["list"] =  $this->query_model->getData($this->param);
			$data["fields"] = "Action| ,ItemNo|Item No.,Description|Item Description,DPOCost|DPO Cost";
			$json["pobysupplier"] = $data;
			echo json_encode($json); 
		}


		function GetReceivings(){
			$this->param = $this->param = $this->query_model->param; 
			$this->param["table"] = "vw_receivings";
			$this->param["fields"] = "*";  

			$data["list"] =  $this->query_model->getData($this->param);
			$data["fields"] = "SupplyNo|No,DateReceive|Date Received,SupplierName|Supplier name,ItemDescription|Item Description,QuantityReceived|Qty Received,PendingQuantity|Qty Back Order,Quantity|QTY Expected Received";
			return $data;

		}

		function GetBackOrders(){
			$this->param = $this->param = $this->query_model->param;  
			$this->param["table"] = "vw_getbackorders";
			$this->param["fields"] = "*"; 
	 
			$data["list"] =  $this->query_model->getData($this->param);
			$data["fields"] = "RequestListNo|No,SupplierName|Supplier name,ItemDescription|Item Description,Received|Qty Received,PendingQuantity|Qty Pending";
			return $data; 
		}

		function GetSuppliers(){
			$this->param = $this->param = $this->query_model->param;  
			$this->param["table"] = "supplier";
			$this->param["fields"] = "*,CONCAT('<button class=\"btn btn-default\">View Order</button>') AS `Action`"; 
	 	 
			$data["list"] =  $this->query_model->getData($this->param);
			$data["fields"] = "SupplierNo|Supplier No.,SupplierName|Supplier name,Address|Address,ContactNo|Contact Number,Action|Action";
			return $data; 
		}
	///

	// INVENTORY 
		function getInventory(){
			$this->param = $this->param = $this->query_model->param; 
			$this->param["table"] = "vw_inventory";
			$this->param["fields"] = "*"; 
 
			$data["list"] =  $this->query_model->getData($this->param);
			$data["fields"] = "ItemNo|Item Number,ItemDescription|Item Name,Category|Category,STOCKCOMMIT|Available Quantity,STOCKS|Onhand Stocks,COMMIT|Quantity Committed";
			return $data; 
		}

		function getItems(){
			$this->param = $this->param = $this->query_model->param; 
			$this->param["table"] = "vw_items";
			$this->param["fields"] = "*"; 
 
			$data["list"] =  $this->query_model->getData($this->param);
			$data["fields"] = "ItemNo|Item Number,Name|Item Name,NoOfItems|No of Variant,Name1|Family,Name2|Category,Name3|Subcategory,SupplierName|Supplier name";
			return $data; 
		}
		
		function getLowStocks(){
			$this->param = $this->param = $this->query_model->param; 
			$this->param["table"] = "vw_lowstocks";
			$this->param["fields"] = "*"; 
 
			$data["list"] =  $this->query_model->getData($this->param);
			$data["fields"] = "ItemNo|Item Number,ItemDescription|Item Name,SupplierName|Supplier name,STOCKS|Stocks,LOWSTOCKS|Low Stock Threshold,CRITICAL|Critical";
			return $data; 
		}
		 
	///

	// ORDERS 
		function getOrders($status){
			$this->param = $this->param = $this->query_model->param; 
			$this->param["table"] = "vw_allorders";
			$this->param["fields"] = "*"; 
 			if($status != "") { $this->param["conditions"] = "Status = '$status'"; }
			$data["list"] =  $this->query_model->getData($this->param);
			$data["fields"] = "OrderNo|OR#,Name|Customer Name,Address|Address,Date|Order Date,TotalAmount|Total Amount,Status|Status,Status,Action|Action";
			return $data; 
		}
	 
	///


}
