  <div class='sidebar'>
    <div class='title'>
      <img class="company-logo" src="<?=base_url('images/logo.png');?>" alt=""/> 
    </div>
    <ul class='nav accordion' id="nav">
      <li data-content="dashboard">
        <a class='active'>Dashboard</a>
      </li>

      <?php if($role == "admin"){?>
              <li data-menu="supplier">
                <a data-toggle="collapse" data-target="#supplierorder" data-parent="#nav">Order to Supplier</a>
                <ul id="supplierorder" class="collapse sub-menu">
                    <li  data-content="purchaseorder" data-header="Purchase Orders"><a href="#">Purchase Order</a></li>
                    <li data-content="receivings" data-header="Receiving Orders"><a href="#">Receiving Orders</a></li>
                    <li data-content="backorders" data-header="Back Orders"><a href="#">Back Orders</a></li>
                    <li data-content="suppliers" data-header="Suppliers"><a href="#">Suppliers</a></li>
                </ul>
              </li>
              
              <li data-menu="inventory">
                <a data-toggle="collapse" data-target="#inventory" data-parent="#nav">Inventory</a>
                <ul id="inventory" class="collapse sub-menu">
                    <li data-content="inventory" data-header="Inventory"><a href="#">Inventory</a></li>
                    <li data-content="items" data-header="Items"><a href="#">Items</a></li>
                    <li data-content="lowstocks" data-header="Low Stocks"><a href="#">Low Stocks</a></li>
                    <li data-content="categories" data-header="Categories"><a href="#">Categories</a></li>
                    <li data-content="removeditems" data-header="Removed Items"><a href="#">Removed Items</a></li>
                </ul>
              </li>
              <li data-content="allorders" data-header="Customer's Order">
                <a>Customer's Order</a>
              </li>
              <!-- <li data-content="forums">
                <a>Forums</a>
              </li>  
              <li data-content="settings">
                <a>Settings</a>
              </li> -->
      <?php }?>
      <?php if($role == "supplier"){?>
          <li>
            <a data-toggle="collapse" data-target="#sup-orders" data-parent="#nav">Request List</a>
            <ul id="sup-orders" class="collapse sub-menu">
                <li data-content="requestlist" data-header="Request List"><a href="#">Request List</a></li>
                <li data-content="allorders" data-header="Customer's Order">
                  <a>Customer's Order</a>
                </li>
                <!-- <li data-content="sup-neworders" data-header="New Order"><a href="#">New 
                <?php if($requeststatus->New > 0){?>
                <span class="badge"><?=$requeststatus->New;?></span>
                <?php }?>
                </a></li>
                <li data-content="sup-processorders" data-header="Processing Orders"><a href="#">Processing</a></li>
                <li data-content="sup-incompleteorders" data-header="Incomplete Orders"><a href="#">Incomplete</a></li>
                <li data-content="sup-shippedorders" data-header="Shipped Orders"><a href="#">Shipped</a></li>
                <li data-content="sup-cancelledorders" data-header="Cancelled Orders"><a href="#">Cancelled</a></li>-->
            </ul>
          </li>

          <li>
            <a data-toggle="collapse" data-target="#sup-items" data-parent="#nav">Item master</a>
            <ul id="sup-items" class="collapse sub-menu">
                <li data-content="sup-items" data-header="Items"><a href="#">List of Items</a></li>
                <li data-content="additems"><a href="#" data-header="Add Items">Add Items</a></li>
                <li data-content="supremove-items" data-header="Removed items"><a href="#">Removed Items</a></li>
            </ul>
          </li>
      <?php }?>

      
      
    </ul>
  </div>