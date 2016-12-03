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
		$data['username'] = $this->session->userdata("username");
		$data['role'] = $this->session->userdata("role");
		$data["suppliers"] = $this->GetSuppliers();
		$role = $this->session->userdata("role");

		$data["requeststatus"]  = $this->GetRequestStatusTotal();
		$data["mostordereditems"] = $this->GetMostOrderedItems();
		$data["mostcustomer"] = $this->GetMostCustomer();
		$data["totalcustomer"] = $this->GetTotalCustomer();
		$data["totalrevenue"] = $this->restyle_text($this->getTotalRevenue());
		

		$data["listfamily"] = $this->getFamily();
		$data["listuom"] = $this->GetUOM();
		  
		$this->load->view('index', $data);



	}

//DASHBOARD
	function getAuditLogs(){
		$this->param = $this->param = $this->query_model->param; 
		$this->param["table"] = "tblauditlogs";
		$this->param["fields"] = "*"; 
		$this->param["order"] = "TransactionDate DESC"; 

		$data["list"] =  $this->query_model->getData($this->param);
		$data["fields"] = "TransactionDate|Transaction Date,Transaction|Transaction,Action|Action,ModifiedBy|Modified By";
		return $data; 

	}
	function getTotalRevenue(){
		$this->param = $this->param = $this->query_model->param; 
		$this->param["table"] = "tblorder";
		$this->param["fields"] = "IFNULL(SUM(TotalAmount),0) Total"; 
		$this->param["conditions"] = "`Status` = 'Ship'"; 
		$data =  $this->query_model->getData($this->param); 
		return $data[0]->Total; 

	}

	function restyle_text($input){
	    $input = number_format($input);
	    $input_count = substr_count($input, ',');
	    if($input_count != '0'){
	        if($input_count == '1'){
	            return substr($input, 0, -4).'K';
	        } else if($input_count == '2'){
	            return substr($input, 0, -8).'M';
	        } else if($input_count == '3'){
	            return substr($input, 0,  -12).'B';
	        } else {
	            return;
	        }
	    } else {
	        return $input;
	    }
	}

	function getDataForChart(){
		$resultarray = array(); 
		$customerStats = $this->getListofCustomersStats();
		$salesStats = $this->getSalesStats();
	 
		$showMonth = array();
		foreach ($customerStats as $key) {
			$showMonth[] = $key->DESCRIPTION . ' ' . $key->YEAR;
		}

		$customers = array();
		foreach ($customerStats as $key) {
			$customers[] = (int)$key->TOTAL;
		}
		$sales = array();
		foreach ($salesStats as $key) {
			$sales[] = (int)$key->TOTAL;
		} 
		$resultarray["showMonth"] = $showMonth;
		  
		$resultarray['Customers'] = $customers;
		$resultarray['Sales'] = $sales; 
		 
		echo json_encode($resultarray);
	}
 	
 	function getListofCustomersStats(){
 		$qry = file_get_contents('sp/customerstats.txt'); 
		
		$listQry = explode(";", $qry);
	  
		foreach ($listQry as $strQry) {
			if(strlen(trim($strQry)) > 0) 
				$query = $this->db->query($strQry . ";");
		 
			if($strQry == $listQry[count($listQry) - 1])
				$result = $query->result();  
		}   
		 
 		return $result;
 	}

 	function getSalesStats(){
 		$qry = file_get_contents('sp/salestats.txt'); 
		
		$listQry = explode(";", $qry);
	 	
	 	$result = array();
	 
		foreach ($listQry as $strQry) {

			if(strlen(trim($strQry)) > 0) 
				$query = $this->db->query($strQry . ";");
		 
			if($strQry == $listQry[count($listQry) - 1])
				$result = $query->result();  
		}   
 		return $result;
 	}


	function getAuditLogsJson(){
		$list["auditlogs"] = $this->getAuditLogs();
		echo json_encode($list);
	}


	function initializeAllData(){
		$data = array();
		$role = $this->session->userdata("role");
		$data["auditlogs"] = $this->getAuditLogs();

		if($role == "admin"){

			$data["purchaseorder"] = $this->GetListOfPO();
			$data["receivings"] = $this->GetReceivings();
			$data["backorders"] = $this->GetBackOrders();
			$data["suppliers"] = $this->GetSuppliers();

			$data["inventory"] = $this->getInventory();
			$data["items"] = $this->getItems(0);
			$data["removeditems"] = $this->getItems(1);
			$data["lowstocks"] = $this->getLowStocks(); 

			$data["allorders"] = $this->getOrders("");
			// $data["neworders"] = $this->getOrders("New");
			// $data["processorders"] = $this->getOrders("Process");
			// $data["shippedorders"] = $this->getOrders("Ship");
			// $data["cancelledorders"] = $this->getOrders("Cancel");
		} 

		else if($role == "supplier"){
			$data["requestlist"] = $this->GetRequestListFromAdmin("");
			$data["allorders"] = $this->getOrders("");
			// $data["sup-neworders"] = $this->getOrders("New");
			// $data["sup-processorders"] = $this->getOrders("Process");
			// $data["sup-incompleteorders"] = $this->getOrders("Incomplete");
			// $data["sup-shippedorders"] = $this->getOrders("Ship");
			// $data["sup-cancelledorders"] = $this->getOrders("Cancel");
			$data["sup-items"] = $this->getItems(0);
			$data["supremove-items"] = $this->getItems(1);




		} 

			echo json_encode($data); 
	}

	function getLatestData(){
		$table = $this->input->post("table");
		$data = array();
		if($table == "purchaseorder")
			$data = $this->GetListOfPO();
		elseif($table == "receivings")
			$data = $this->GetReceivings();
		elseif($table == "backorders")
			$data = $this->GetBackOrders();
		elseif($table == "suppliers")
			$data = $this->GetSuppliers();
		elseif($table == "inventory")
			$data = $this->getInventory();
		elseif($table == "items")
			$data = $this->getItems(0);
		elseif($table == "removeditems")
			$data = $this->getItems(1);

		elseif($table == "lowstocks")
			$data = $this->getLowStocks();
		elseif($table == "allorders")
			$data = $this->getOrders(""); 

		elseif($table == "requestlist")
			$data = $this->GetRequestListFromAdmin(""); 
		elseif($table == "sup-neworders")
			$data = $this->getOrders("New"); 
		elseif($table == "sup-processorders")
			$data = $this->getOrders("Process"); 
		elseif($table == "sup-incompleteorders")
			$data = $this->getOrders("Incomplete"); 
		elseif($table == "sup-shippedorders")
			$data = $this->getOrders("Ship"); 
		elseif($table == "sup-cancelledorders")
			$data = $this->getOrders("Cancel"); 
		elseif($table == "sup-items")
			$data = $this->getItems(0); 
		elseif($table == "supremove-items")
			$data = $this->getItems(1);
		 







		$list[$table] = $data; 
		echo json_encode($list); 
	}


	 
// ADMIN SIDE
	// PURCHASE ORDERS  
		function GetListOfPO(){
			$this->param = $this->param = $this->query_model->param; 
			$this->param["table"] = "vw_getpurchaseorders";
			$this->param["fields"] = "*"; 
 
			$data["list"] =  $this->query_model->getData($this->param);
			$data["fields"] = "ViewItems|View items|SupplyRequestNo|No,NoOfItems|No of items,SupplierName|Supplier name,TotalDPOCost|Total Amount,Date|Date Order";
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

	 
		function GetSelectedOrderDetailsByPO(){
			$supplierNo = $this->input->post("sno");
			$this->param = $this->param = $this->query_model->param; 
			$this->param["table"] = "vw_getselectedorderdetails";
			$this->param["fields"] = "*"; 
 		    $this->param["conditions"] = "SupplyRequestNo = '$supplierNo'";
			$data["list"] =  $this->query_model->getData($this->param);
			$data["fields"] = "RequestListNo|No,ItemNo|Item Number,VariantNo|Variant Number,ItemDescription|Description,Requested|Request Qty";
			$list["child-".$supplierNo] = $data;
			echo json_encode($list);
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
			$total = $this->input->post("total");
			$this->param = $this->query_model->param; 
			$data["Quantity"] = $qty;
			$data["Total"] = $total;
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
			$this->param["transactionname"] = "Purchase Order";
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
			$qry .= "SELECT Received, (Received-Quantity), '$datetime', RequestListNo, SupplyRequestNo ";
			$qry .= "FROM requestlist WHERE SupplyRequestNo = '$SupplyRequestNo'";
			$this->db->query($qry);
			$this->query_model->insertAuditLogs("New PO Received", "Insert");

			//Update isReceived = 1 for the selected SupplyRequest
			$this->param = $this->query_model->param; 
			$data["isReceived"] = 1;
			$this->param["dataToUpdate"] = $data;
			$this->param["table"] = "supplyrequest";
			$this->param["conditions"] = "SupplyRequestNo = '$SupplyRequestNo'";
			$this->query_model->updateData($this->param); 

			//UPDATE Stocks of the received items
			$qry = " UPDATE itemvariant iv ";
			$qry .= "INNER JOIN vw_getselectedorderdetails o ";
			$qry .= "ON iv.VariantNo = o.VariantNo ";
			$qry .= "SET iv.Stocks = iv.Stocks - o.QtyReceived ";
			$qry .= "WHERE o.SupplyRequestNo = '$SupplyRequestNo'";

			$this->db->query($qry);

			$this->query_model->insertAuditLogs("Update Stock after PO Received", "Update");

  			
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
			$this->param["fields"] = "*,CONCAT('<button class=\"btn btn-action\" onclick=\"viewSupplyItems(',SupplierNo,',this);\">View items</button>') AS `Action`"; 
	 	 
			$data["list"] =  $this->query_model->getData($this->param);
			$data["fields"] = "SupplierNo|Supplier No.,SupplierName|Supplier name,Address|Address,ContactNo|Contact Number,Action|Action";
			return $data; 
		}

		function addSupplier(){
			$supplier = $this->input->post("supplier");
			$account = $this->input->post("account");
			$supplier = json_decode($supplier);
			$account = json_decode($account);
  
			$account->Password = MD5($account->Password);
			$account->LoginType = "supplier";


			//Check username if already taken in Accounts
			$this->param = $this->param = $this->query_model->param;  
			$this->param["table"] = "accounts";
			$this->param["fields"] = "*";
			$this->param["conditions"] = "Username = '$account->Username'";
			$result = $this->query_model->getData($this->param);
			if($result)
				$data["errormessage"] = "Username has already taken";
			else{
				//INSERT INTO Accounts
				$this->param = $this->param = $this->query_model->param;  
				$this->param["table"] = "accounts";
				$this->param["dataToInsert"] = $account;
				$this->param["transactionname"] = "Account for new Supplier";
				$this->query_model->insertData($this->param);


				// GET AccountNo for the Supplier
				$this->param = $this->param = $this->query_model->param;  
				$this->param["table"] = "accounts";
				$this->param["fields"] = "*";
				$this->param["conditions"] = "Username = '$account->Username'";
				$result = $this->query_model->getData($this->param);

				//INSERT INTO Supplier
				$supplier->AccountNo = $result[0]->AccountNo;
				$this->param = $this->param = $this->query_model->param;  
				$this->param["table"] = "supplier";
				$this->param["dataToInsert"] = $supplier;
				$this->param["transactionname"] = "New Supplier";
				$this->query_model->insertData($this->param);
				
	 			$data["suppliers"] = $this->GetSuppliers();
			}  
			echo json_encode($data);
		}
		function GetSupplyItemsBySupplier(){
			$SupplierNo = $this->input->post("sno");
			$this->param = $this->param = $this->query_model->param;  
			$this->param["table"] = "vw_getsupplyitemsbysupplier";
			$this->param["fields"] = "*";
			$this->param["conditions"] = "SupplierNo = '$SupplierNo'";
			$data["list"] =  $this->query_model->getData($this->param);
			$data["fields"] = "ItemNo|ID,ItemDescription|Description,Category|Category,DPOCost|DPO Cost,SRP|SRP"; 
			
			$list["listsupplybysupplier"] = $data;
			echo json_encode($list);

		}
	///

	// INVENTORY 
		function getInventory(){
			$this->param = $this->param = $this->query_model->param; 
			$this->param["table"] = "vw_inventory";
			$this->param["fields"] = "*"; 
 
			$data["list"] =  $this->query_model->getData($this->param);
			$data["fields"] = "ItemNo|Item Number,ItemDescription|Item Name,Category|Category,STOCKCOMMIT|Available Quantity,STOCKS|Onhand Stocks,COMMIT|Quantity Committed,Action|Action";
			return $data; 
		}
		function physicalCount(){
			$variantNo = $this->input->post("vno");
			$qty = $this->input->post("qty");
			$this->param = $this->query_model->param;  
			$data["Stocks"] = $qty; 
			$this->param["dataToUpdate"] = $data;
			$this->param["table"] = "itemvariant";
			$this->param["conditions"] = "VariantNo = '$variantNo'";
			$this->param["transactionname"] = "Update Physical Count for Item variant : " . $variantNo ;
			$result = $this->query_model->updateData($this->param); 


			$list["inventory"] = $this->getInventory();
			echo json_encode($list);
		}

		function getItems($isRemovedItems){
			$this->param = $this->param = $this->query_model->param; 
			$this->param["table"] = "vw_items";
			$this->param["fields"] = "*"; 
			$role = $this->session->userdata("role");
			$sno = $this->session->userdata("supplierno");

			if($role == "supplier")
				$this->param["conditions"] = "SRemoved = '$isRemovedItems'";  
			else
				$this->param["conditions"] = "Removed = '$isRemovedItems'";  


			if($role == "supplier"){
				$this->param["conditions"] .= " AND SupplierNo = '$sno'"; 
			}
 
			$data["list"] =  $this->query_model->getData($this->param);
			$data["fields"] = "ViewItems|Variants,ItemNo|Item Number,Name|Item Name,NoOfItems|No of Variant,UOM|UOM,Name1|Family,Name2|Category,Name3|Subcategory";
			if($role != "supplier")
				$data["fields"].= ",SupplierName|Supplier name";
		 
			$data["fields"].= ",Action|Action"; 
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

		function getFamily($name=""){
			$name = trim($name);
			$this->param = $this->param = $this->query_model->param; 
			$this->param["table"] = "level1";
			$this->param["fields"] = "Level1No `id`, Name1 `Name`, ImageFile";  
			if($name != "")
				$this->param["conditions"] = "Name1 = '$name'";
			$this->param["order"] = "Name1";  

			return $this->query_model->getData($this->param);
			 
		}

		function getCategory(){
			$level1 = $this->input->post("lvl1");
			echo json_encode($this->getDataCategory($level1));
		}

		function getSubCategory(){
			$level1 = $this->input->post("lvl1");
			$level2 = $this->input->post("lvl2");
			echo json_encode($this->getDataSubCategory($level1,$level2));
			
		} 

		function getDataCategory($lvl1,$name=""){
			$this->param = $this->param = $this->query_model->param; 
			$this->param["table"] = "level2";
			$this->param["fields"] = "Level2No `id`, Name2 `Name`";  
			$this->param["conditions"] = "level1No = '$lvl1'";
			$this->param["order"] = "Name2";  
			$data = $this->query_model->getData($this->param);  
			return $data;
		}

		function getDataSubCategory($lvl1,$lvl2,$name=""){
			$this->param = $this->param = $this->query_model->param; 
			$this->param["table"] = "level3";
			$this->param["fields"] = "Level3No `id`, Name3 `Name`";  
			$this->param["conditions"] = "level1No = '$lvl1' AND level2No = '$lvl2'";
			$this->param["order"] = "Name3";  
			$data = $this->query_model->getData($this->param);  
			return $data;
		}

		function addCategory(){
			$name = $this->input->post("name");
			$name = trim($name);
			$lvl = $this->input->post("lvl");
			$this->param = $this->query_model->param; 
			$category = ($lvl == "1") ? "Family" : (($lvl == "2") ? "Category" : "Sub-Category"); 

			$data["Name". $lvl] = $name;
			if($category=="Family"){
				if(count($this->getFamily($name)) > 0){
					echo json_encode(array("Error"=>"Already exists"));
					return;
				} 
			}
			elseif($category=="Category"){
				$level1 = $this->input->post("Level1No"); 
				$data["Level1No"] = $level1;  
				if(count($this->getDataCategory($level1,$name)) > 0){
					echo json_encode(array("Error"=>"Already exists"));
					return;
				} 
			}
			elseif($category=="Sub-Category"){
				$level1 = $this->input->post("Level1No"); 
				$level2 = $this->input->post("Level2No");
				$data["Level1No"] = $level1; 
				$data["Level2No"] = $level2;  
				if(count($this->getDataSubCategory($level1,$level2,$name)) > 0){
					echo json_encode(array("Error"=>"Already exists"));
					return;
				} 
			}

			$this->param["dataToInsert"] = $data;
			$this->param["table"] = "Level". $lvl;
			$this->param["transactionname"] = "New " . $category;
			$this->query_model->insertData($this->param); 

			if($category=="Family"){
				echo json_encode($this->getFamily());
			}
			elseif($category=="Category"){
				$level1 = $this->input->post("Level1No"); 
				echo json_encode($this->getDataCategory($level1));
			}
			elseif($category=="Sub-Category"){
				$level1 = $this->input->post("Level1No"); 
				$level2 = $this->input->post("Level2No"); 
				echo json_encode($this->getDataSubCategory($level1,$level2));
			}

			 
		}

		function updateCategory(){
			$id = $this->input->post("id");
			$name = $this->input->post("name");
			$name = trim($name);
			$lvl = $this->input->post("lvl");
			$this->param = $this->query_model->param;  
			$data["Name". $lvl] = $name; 
			$this->param["dataToUpdate"] = $data;
			$this->param["table"] = "Level". $lvl;
			$this->param["conditions"] = "Level". $lvl. "No = '$id'";
			$category = ($lvl == "1") ? "Family" : (($lvl == "2") ? "Category" : "Sub-Category"); 
			$this->param["transactionname"] = "Update " . $category;
			$result = $this->query_model->updateData($this->param); 
			echo $result;
		}
		function deleteCategory(){
			$id = $this->input->post("id");
			$lvl = $this->input->post("lvl");
			$this->param = $this->query_model->param;  
			$this->param["table"] = "Level". $lvl;
			$this->param["conditions"] = "Level". $lvl. "No = '$id'";
			$category = ($lvl == "1") ? "Family" : (($lvl == "2") ? "Category" : "Sub-Category"); 
			$this->param["transactionname"] = "Delete $category";
			$result = $this->query_model->removeData($this->param); 
			echo $result; 
		}


		function getAttribute(){
			$isreq = $this->input->post("isreq");
			$this->param = $this->param = $this->query_model->param; 
			$this->param["table"] = "itemattribute";
			$this->param["fields"] = "AttributeID, AttributeName"; 
 			$this->param["conditions"] = "isRequired = $isreq"; 
			echo json_encode($this->query_model->getData($this->param)); 
		}
		 
	///

	// ORDERS 
		function getOrders($status){
			$this->param = $this->param = $this->query_model->param; 
			$this->param["table"] = "vw_allorders";
			$this->param["fields"] = "*"; 
 			if($status != "") { $this->param["conditions"] = "Status = '$status'"; }
			$data["list"] =  $this->query_model->getData($this->param);
			$data["fields"] = "ViewItems|View,OrderNo|OR#,CustomerName|Customer Name,Address|Address,OrderDate|Order Date,TotalAmount|Total Amount,Status|Status,Action|Action";
			return $data; 
		}
		function getOrdersJson(){ 
			$status = $this->input->post("status");
			$list["allorders"] = $this->getOrders($status);
			echo json_encode($list);
		}
		function getOrderDetails(){
			$orderno = $this->input->post("orderno");
			$this->param = $this->param = $this->query_model->param; 
			$this->param["table"] = "vw_orderlistbyorderno";
			$this->param["fields"] = "*"; 
 		    $this->param["conditions"] = "OrderNo = '$orderno'";
			$data["list"] =  $this->query_model->getData($this->param);
			$data["fields"] = "ItemNumber|Item Number,ItemDescription|Description,Quantity|QTY,Price|Price,Total|Total";
			$list["child-".$orderno] = $data;
			echo json_encode($list);
		}
		function setStatusOrder(){
			date_default_timezone_set("Asia/Manila");
			$date = date('Y-m-d H:i:s');
			$datetime = date('Y-m-d H:i:s', strtotime($date));
			$orderno = $this->input->post("ono");
			$curstatus = $this->input->post("curstatus");
			$newstatus = $this->input->post("newstatus");

			$this->param = $this->query_model->param; 
			
			$data["Ship"] = ($newstatus=='Ship') ? 1 : 0;
			$data["Status"] = $newstatus;
			$data["TransactionDate"] = $datetime;
			$this->param["dataToUpdate"] = $data;
			$this->param["table"] = "tblorder";
			$this->param["conditions"] = "OrderNo = '$orderno'";
			$this->param["transactionname"] = "Order number: $orderno " . " set order status to " . $newstatus;
			$result = $this->query_model->updateData($this->param); 

			if($newstatus == "Ship")
				$this->updateStocksByOrderNo($orderno);

			$list = array();
			if($this->session->userdata["role"] == "admin")
					$list["allorders"] = $this->getOrders($curstatus);
			else{
				$returntable = "";
				if($curstatus=="New")
					$returntable = "sup-neworders";
				elseif($curstatus=="Process")
					$returntable = "sup-processorders";
				elseif($curstatus=="Incomplete")
					$returntable = "sup-incompleteorders";
				elseif($curstatus=="Ship")
					$returntable = "sup-shippedorders";
				elseif($curstatus=="Cancel")
					$returntable = "sup-cancelledorders";

				$list[$returntable] = $this->getOrders($curstatus); 
			}
			echo json_encode($list);
		}
		function updateStocksByOrderNo($orderno){
			$qry  = "UPDATE itemvariant v ";
			$qry .= "INNER JOIN orderlist o "; 
			$qry .= "ON v.VariantNo = o.VariantNo ";
			$qry .= "SET Stocks = Stocks - Quantity ";
			$qry .= "WHERE o.OrderNo = '$orderno'";
			$this->db->query($qry); 
			$this->query_model->insertAuditLogs("Decrease Stock after Order to shipped", "Update");
		}

	///


// SUPPLIER SIDE
	//REQUEST
		function GetRequestListFromCustomer(){ 
			$this->param = $this->param = $this->query_model->param; 
			$this->param["table"] = "vw_getrequestfromcustomer";
			$this->param["fields"] = "*"; 
 
			$data["list"] =  $this->query_model->getData($this->param);
			$data["fields"] = "OrderNo|Order No,Date|Order Date,Customer|Customer name,Address|Address,TotalAmount|Total Amount,Status|Status";
			return $data;
		}
		function GetRequestListFromAdmin($status){ 
			$sno = $this->session->userdata("supplierno");
			$this->param = $this->param = $this->query_model->param; 
			$this->param["table"] = "vw_requestlistfromadmin";
			$this->param["fields"] = "*"; 
			$this->param["conditions"] = "SupplierNo = '$sno'"; 
 			
 			if($status != "")
				$this->param["conditions"] .= " AND DeliveredStatus = '$status'"; 
 

			$data["list"] =  $this->query_model->getData($this->param);
			$data["fields"] = "ViewItems|Item(s),SupplyRequestNo|Request Order #,OrderDate|Order Date,CustomerName|Customer name,NoOfItems|No of Order items,TotalDPOCost|Total Amount(DPO Cost),Action|Action";
			return $data;
		}

		function GetRequestItemBySupplyRequestNo(){

			$role = $this->session->userdata("role"); 
			$supreqno = $this->input->post("supreqno");  
			 
			$this->param = $this->param = $this->query_model->param; 

			$this->param["table"] = "vw_getrequestlistbysupplyrequestno"; 
			$this->param["fields"] = "*"; 
			$this->param["conditions"] = "SupplyRequestNo = '$supreqno'"; 

			$data["list"] =  $this->query_model->getData($this->param);
			$data["fields"] = "ItemNo|Item No,ThumbNail|ThumbNail,ItemDescription|Description,DPOCost|DPO Cost,RequestsQty|QTY Request,SubTotal|SubTotal"; 
				 
			$list["child-".$supreqno] = $data;
		 
			echo json_encode($list);
		}

		function getRequestListJson(){ 
			$status = $this->input->post("status");
			$list["requestlist"] = $this->GetRequestListFromAdmin($status);
			echo json_encode($list);
		}

		function setDeliveredRequest(){
			$status = $this->input->post("status");
			$supreqno = $this->input->post("supreqno");
			$this->param = $this->query_model->param;  
			$data["DeliveredStatus"] = 1;
			$this->param["dataToUpdate"] = $data;
			$this->param["table"] = "supplyrequest";
			$this->param["conditions"] = "SupplyRequestNo = '$supreqno'";
			$this->query_model->updateData($this->param); 
			$list["requestlist"] = $this->GetRequestListFromAdmin($status);
			echo json_encode($list);
		}


		
		
		function GetRequestStatusTotal(){ 
			$this->param = $this->param = $this->query_model->param; 
			$this->param["table"] = "vw_getrequeststatustotal";
			$this->param["fields"] = "*";  
			$data =  $this->query_model->getData($this->param); 
			return $data[0];
		}

		function GetMostOrderedItems(){
			$this->param = $this->param = $this->query_model->param; 
			$this->param["table"] = "vw_getmostordereditems";
			$this->param["fields"] = "*";  
			$data =  $this->query_model->getData($this->param); 
			$total = 0;
			foreach($data as $row){
				$total+= $row->Total;
			}
			foreach($data as $row){
				$row->Percentage = round(($row->Total / $total) * 100, 2);
			}
			return $data;

		}

		function GetMostCustomer(){
			$this->param = $this->param = $this->query_model->param; 
			$this->param["table"] = "vw_getmostcustomer";
			$this->param["fields"] = "*";  
			$data =  $this->query_model->getData($this->param); 
			$total = 0;
			foreach($data as $row){
				$total+= $row->Total;
			}
			foreach($data as $row){
				$row->Percentage = round(($row->Total / $total) * 100, 2);
			}
			return $data; 
		}

		function GetTotalCustomer(){
			$this->param = $this->param = $this->query_model->param; 
			$this->param["table"] = "customer";
			$this->param["fields"] = "*";  
			$data =  $this->query_model->getData($this->param); 
			 
			return count($data); 
		}

	//ITEMS
	 	function insertNewItemWithVariants(){

	 		$variant = $this->input->post("data");
	 		$itemname = trim($this->input->post("itemname"));
	 		$uom = $this->input->post("UOM");
	 		$family = $this->input->post("family");
	 		$category = $this->input->post("category");
	 		$subcategory = $this->input->post("subcategory");
	 		$supplierno = $this->session->userdata("supplierno");
	 		$variant = json_decode($variant);
	 		 
	 		// Insert to Items
			$this->param = $this->query_model->param; 
			$data["Name"] = $itemname;
			$data["UOM"] = $uom;
			$data["Level1No"] = $family;
			$data["Level2No"] = $category;
			$data["Level3No"] = $subcategory;
			$data["SRemoved"] = 0;
			$data["Removed"] = 0;
			$data["Owned"] = 1;
			$data["SupplierNo"] = $supplierno;
			$this->param["transactionname"] = "New items inserted:" + $itemname;
			$this->param["dataToInsert"] = $data;
			$this->param["table"] = "item";
			$this->query_model->insertData($this->param); 


			$dataitems = array();
			$this->param = $this->param = $this->query_model->param; 
			$this->param["table"] = "item";
			$this->param["fields"] = "*";  
			$this->param["conditions"] = "Name = '$itemname'";
			$dataitems =  $this->query_model->getData($this->param); 
			$dataitems =  $dataitems[0];


			foreach ($variant as $v) {
				 // Insert to Items Variant
				$this->param = $this->query_model->param;
				$datavariant = array(); 
				$datavariant["ItemNo"] = $dataitems->ItemNo;
				$datavariant["SRP"] = $v->SRP;
				$datavariant["DPOCost"] = $v->DPOCost; 
				$datavariant["ImageFile"] = $v->FileName; 
				$datavariant["VariantName"] = $v->VariantsName; 
				$datavariant["VariantNameJSON"] = json_encode($v->VariantsNameJSON); 
				$datavariant["SupplierNo"] = $supplierno;
				$this->param["transactionname"] = "New items inserted:" + $itemname;
				$this->param["dataToInsert"] = $datavariant;
				$this->param["table"] = "itemvariant";
				$this->query_model->insertData($this->param); 
			}	

			echo true;
	 	}

	 	function checkItemNameExistsBySupplier(){
			$supplierno = $this->session->userdata("supplierno");
			$itemname = trim($this->input->post("iname"));
	 		$this->param = $this->param = $this->query_model->param; 
			$this->param["table"] = "item"; 
			$this->param["fields"] = "*";
 		    $this->param["conditions"] = "UPPER(Name) = UPPER('$itemname') and SupplierNo = '$supplierno' ";
			$data = $this->query_model->getData($this->param);
			echo (($data) ? 1 : 0);
	 	}

	 	function GetVariantsByItemNo(){
			$role = $this->session->userdata("role");
			$itemno = $this->input->post("ino");
			$this->param = $this->param = $this->query_model->param; 
			$this->param["table"] = "itemvariant";
			$action = "";
			if($role=="supplier")
				$action = ", CONCAT('<button class=\"btn btn-action pull-right btn-editvariants\" data-toggle=\"modal\" data-target=\"#editvariant\" onclick=\"editVariant(''child-',ItemNo ,''',this);\"><span class=\"glyphicon glyphicon-cog\"></span> Edit</button>') Action";
			else
				$action = ", CONCAT('<button class=\"btn btn-action pull-right btn-editvariants\" data-toggle=\"modal\" data-target=\"#editvariantadmin\" onclick=\"editVariantAdmin(''child-',ItemNo ,''',this);\"><span class=\"glyphicon glyphicon-cog\"></span> Edit</button>') Action";
			

			$this->param["fields"] = "*" . $action; 
 		    $this->param["conditions"] = "ItemNo = '$itemno'";
			$data["list"] =  $this->query_model->getData($this->param);
			$data["fields"] = "VariantNo|No,ThumbNail|ThumbNail,VariantName|Variant name,Price|Unit Price,SRP|Suggested Retail Price (SRP)"; 
				 
			$list["child-".$itemno] = $data;
			$list["isAction"] = ($role=="supplier") ? true : false;
			$list["role"] = $role;
			echo json_encode($list);
		}

		function removeOrRecoverItem(){
			$itemno = $this->input->post("itemno");  
			$status = $this->input->post("status");  
			$role = $this->session->userdata("role");
 
			$this->param = $this->query_model->param; 
			if($role == "supplier") 
				$data["SRemoved"] = $status;
			else
				$data["Removed"] = $status;

			$this->param["dataToUpdate"] = $data;
			$this->param["table"] = "item";
			$this->param["conditions"] = "ItemNo = '$itemno'";
			$result = $this->query_model->updateData($this->param); 
			echo true;
		}

		function UpdateVariant(){
			$vno = $this->input->post("vno");
			$param = $this->input->post("data");
			$param = json_decode($param);

			$this->param = $this->query_model->param; 
			$this->param["dataToUpdate"] = $param;
			$this->param["table"] = "itemvariant";
			$this->param["conditions"] = "VariantNo = '$vno'";
			$result = $this->query_model->updateData($this->param); 
			echo true;
		} 

		function GetUOM(){
			$this->param = $this->param = $this->query_model->param; 
			$this->param["table"] = "tbluom";
			$this->param["fields"] = "*";  
			$this->param["order"] = "Description";  
			$data =  $this->query_model->getData($this->param);
			return $data;
		}

		function addUOM(){
			$this->param = $this->query_model->param; 
		 	$data = $this->input->post("data");
		 	$data = json_decode($data);
			$this->param["transactionname"] = "New UOM";
			$this->param["dataToInsert"] = $data;
			$this->param["table"] = "tbluom";
			$this->query_model->insertData($this->param); 
			echo true;
		}
		
	//

		function uploadImage()
		{        
		    $config['upload_path'] = './images/variant-folder/';
			$config['allowed_types'] = 'gif|jpg|png';
			 
			$new_name = "FILE_" . date("Ymdhis");
			$config['file_name'] = $new_name;

			$this->load->library('upload', $config);

			$response = array();
			$response["responseitem"] = "";
			$response["errormessage"] = "";

			if ( ! $this->upload->do_upload())
			{
				$error = array('error' => $this->upload->display_errors()); 
				$response["errormessage"] = $error; 
			}
			else
			{
				$data = $this->upload->data();
				$filename = $data["file_name"];	
				$result = array('upload_data' => $data);
				$param = $this->input->get("param");
				 
				if($param != "{}"){
					$param = json_decode($param);
					$this->param = $this->query_model->param; 
					$edit["ImageFile"] = $filename;
					$this->param["dataToUpdate"] = $edit;
					$this->param["table"] = $param->table;
					$this->param["conditions"] = "$param->col = '$param->id'";
					$this->query_model->updateData($this->param); 
				}
				// $this->load->library('Ftpupload');
				// $this->ftpupload->upload($filename);
				$response["responseitem"] = $result; 

			}
			echo json_encode($response);
		} 



}
