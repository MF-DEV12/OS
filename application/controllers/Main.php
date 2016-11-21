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

			// $data["allorders"] = $this->getOrders("");
			// $data["neworders"] = $this->getOrders("New");
			// $data["processorders"] = $this->getOrders("Process");
			// $data["shippedorders"] = $this->getOrders("Ship");
			// $data["cancelledorders"] = $this->getOrders("Cancel");

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
			$this->param["table"] = "vw_getorderbysupplier";
			$this->param["fields"] = "*"; 
		 
			$this->param["conditions"] = "SupplierNo = '$supplierID'";

			$data["list"] =  $this->query_model->getData($this->param);
			$data["fields"] = "Action| ,ItemNo|Item No.,Description|Description,DPOCost|DPO Cost";
			$json["pobysupplier"] = $data;
			$json["posubmit"] = $this->GetPOSubmit($supplierID); 
			$json["lowstockbysupplier"] = $this->GetLowStockBySupplier($supplierID); 

			echo json_encode($json); 
		}

		function addToPO(){
			$itemNo = $this->input->post("ino");
			$variantNo = $this->input->post("vno");
			$supplierNo = $this->input->post("sno");
			$createdby = $this->session->userdata("username");

			$this->param = $this->query_model->param; 
			$this->param["table"] = "requestlist";
			$this->param["fields"] = "*";
			$this->param["conditions"] = "ItemNo = '$itemNo' AND VariantNo = '$variantNo' AND createdby = '$createdby' AND Temp = 1";
			$resultrequestlist = $this->query_model->getData($this->param);
			if(!$resultrequestlist){

				$qry =  "INSERT INTO requestlist(Temp, ItemNo, VariantNo, createdby) ";
				$qry .= "VALUES( 1, '$itemNo', '$variantNo', '$createdby' )"; 
				$this->db->query($qry);  

			}
			
			$json["posubmit"] = $this->GetPOSubmit($supplierNo); 
		 	echo json_encode($json);  
		}

		function deletePO(){
			$requestlistno = $this->input->post("rlno");
			$this->param = $this->query_model->param; 
			$this->param["table"] = "requestlist";
			$this->param["conditions"] = "RequestListNo = '$requestlistno'";
			$result = $this->query_model->removeData($this->param); 
			echo $result; 
		}

		function updatePOQty(){
			$requestlistno = $this->input->post("rlno");
			$qty = $this->input->post("qty");
			$this->param = $this->query_model->param; 
			$data["Quantity"] = $qty;
			$this->param["dataToUpdate"] = $data;
			$this->param["table"] = "requestlist";
			$this->param["conditions"] = "RequestListNo = '$requestlistno'";
			$result = $this->query_model->updateData($this->param); 
			echo $result; 
		}

		function deleteAllRequestPO(){
			$rlno = $this->input->post("rlno");
			$this->param = $this->query_model->param; 
			$this->param["table"] = "requestlist";
			$this->param["conditions"] = "RequestListNo IN ($rlno)";
			$result = $this->query_model->removeData($this->param); 
			echo $result; 
		}

		function submitPo(){
			date_default_timezone_set("Asia/Manila");
			$date = date('Y-m-d H:i:s');
			$datetime = date('Y-m-d H:i:s', strtotime($date));

			$requestlistno = $this->input->post("rlno");
			$supplierNo = $this->input->post("sno");

			// Insert to SupplyRequest
			$this->param = $this->query_model->param; 
			$data["Date"] = $datetime;
			$data["SupplierNo"] = $supplierNo;
			$data["isReceived"] = 0;
			$this->param["dataToInsert"] = $data;
			$this->param["table"] = "supplyrequest";
			$this->query_model->insertData($this->param); 

			// Get SupplierRequestNo 
			$this->param = $this->query_model->param;  
			$this->param["fields"] = "*";
			$this->param["table"] = "supplyrequest";
			$this->param["conditions"] = "Date = '$datetime' AND SupplierNo = '$supplierNo'";
			$result = $this->query_model->getData($this->param); 
 			
 			$SupplyRequestNo = $result[0]->SupplyRequestNo;

			// Update SupplyRequestNo and Temp in requestlist
			$this->param = $this->query_model->param; 
			$data = array();
			$data["Temp"] = 0;
			$data["SupplyRequestNo"] = $SupplyRequestNo;
			$this->param["dataToUpdate"] = $data;
			$this->param["table"] = "requestlist";
			$this->param["conditions"] = "RequestListNo IN ($requestlistno)";
			$result = $this->query_model->updateData($this->param); 

			$data = array();

			$data["purchaseorder"] = $this->GetListOfPO();

			echo json_encode($data); 
		}

		function GetLowStockBySupplier($supid){

			$this->param = $this->param = $this->query_model->param; 
			$this->param["table"] = "vw_getlowstockbysupplier";
			$this->param["fields"] = "*";
			$this->param["conditions"] = "SupplierNo = '$supid'";
			$data["list"] =  $this->query_model->getData($this->param);
			$data["fields"] = "ItemNo|Item No.,ItemDescription|Description,STOCKS|Stocks,LOWSTOCKS|Low,CRITICAL|Critical";
			return $data;

		}

		function GetPOSubmit($supplierNo){
			$createdby = $this->session->userdata("username");
			$this->param = $this->param = $this->query_model->param; 
			$this->param["table"] = "vw_getposubmit";
			$this->param["fields"] = "*";
			$this->param["conditions"] = "createdby = '$createdby' AND SupplierNo = '$supplierNo'";
			$data["list"] =  $this->query_model->getData($this->param);
			$data["fields"] = "Remove| ,ItemQty|Quantity,Item|Item No.,ItemDescription|Description,DPOCost|DPO Cost,Total|Total";
			return $data;
		}

		function GetReceivings(){
			$this->param = $this->param = $this->query_model->param; 
			$this->param["table"] = "vw_receivings";
			$this->param["fields"] = "*";  

			$data["list"] =  $this->query_model->getData($this->param);
			$data["fields"] = "SupplyNo|No,DateReceive|Date Received,SupplierName|Supplier name,ItemDescription|Item Description,QuantityReceived|Qty Received,PendingQuantity|Qty Back Order,Quantity|QTY Expected Received";
			return $data;

		}

		function GetOrderToReceive(){
			$this->param = $this->param = $this->query_model->param; 
			$this->param["table"] = "vw_getpotoreceive";
			$this->param["fields"] = "*";  

			$data["list"] =  $this->query_model->getData($this->param);
			$data["fields"] = "SupplyRequestNo|No,NoOfItems|No. of Items,SupplierName|Supplier name,Date|Order Date";
			$list["porequest"] = $data;
			echo json_encode($list); 
		}

		function GetSelectedOrderDetails(){
			$supplierNo = $this->input->post("sno");
			$this->param = $this->param = $this->query_model->param; 
			$this->param["table"] = "vw_getselectedorderdetails";
			$this->param["fields"] = "*";  
			$this->param["conditions"] = "SupplyRequestNo = '$supplierNo'";  

			$data["list"] =  $this->query_model->getData($this->param);
			$data["fields"] = "RequestListNo|No,ItemDescription|Item,Received|Received,Requested|Requested";
			$list["poreceivesubmit"] = $data;
			echo json_encode($list);  
		}

		function updatePOReceived(){
			$requestlistno = $this->input->post("rlno");
			$rec = $this->input->post("rec");
			$this->param = $this->query_model->param; 
			$data["Received"] = $rec;
			$this->param["dataToUpdate"] = $data;
			$this->param["table"] = "requestlist";
			$this->param["conditions"] = "RequestListNo = '$requestlistno'";
			$result = $this->query_model->updateData($this->param); 
			echo $result; 
		}

		function submitPOReceived(){
			date_default_timezone_set("Asia/Manila");
			$date = date('Y-m-d H:i:s');
			$datetime = date('Y-m-d H:i:s', strtotime($date));

			$SupplyRequestNo = $this->input->post("sno");

			// Insert to Supply
			$qry =  "INSERT INTO supply(QuantityReceived, PendingQuantity, DateReceive, RequestListNo, SupplyRequestNo) ";
			$qry += "SELECT Received, (Received-Quantity), '$datetime', RequestListNo, SupplyRequestNo ";
			$qry += "FROM requestlist WHERE SupplyRequestNo = '$SupplyRequestNo'";
			$this->db->query($qry);

			//Update isReceived = 1 for the selected SupplyRequest
			$this->param = $this->query_model->param; 
			$data["isReceived"] = 1;
			$this->param["dataToUpdate"] = $data;
			$this->param["table"] = "supplyrequest";
			$this->param["conditions"] = "SupplyRequestNo = '$SupplyRequestNo'";
			$this->query_model->updateData($this->param); 

			//UPDATE Stocks of the received items
			$qry = " UPDATE itemvariant iv ";
			$qry += "INNER JOIN vw_getselectedorderdetails o ";
			$qry += "ON iv.VariantNo = o.VariantNo ";
			$qry += "SET iv.Stocks = iv.Stocks - o.QtyReceived ";
			$qry += "WHERE o.SupplyRequestNo = '$SupplyRequestNo'";

			$this->db->query($qry);
  			
  			// Get the latest the list of order to receive
			$this->GetOrderToReceive();
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
