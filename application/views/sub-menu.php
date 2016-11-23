 <div>
    <nav class="sub-menu">

    <!-- SUB-MENU -->
     <?php if($role=="admin") {?>
          <ul class="purchaseorder selected-sub-menu">
                <li class="current" data-content="purchaseorder"><a href="#">Purchase Order</a></li>
                <li data-content="receivings"><a href="#">Receivings</a></li>
                <li data-content="backorders"><a href="#">Back Orders</a></li>
                <li data-content="suppliers"><a href="#">Suppliers</a></li>
          </ul>
          <ul class="inventory">
                <li class="current" data-content="inventory"><a href="#">Inventory</a></li>
                <li data-content="items"><a href="#">Items</a></li>
                <li data-content="lowstocks"><a href="#">Low Stocks</a></li>
                <li><a href="#">Categories</a></li>
                <li><a href="#">Removed</a></li>
          </ul>
          <ul class="orders">
                <li class="current" data-content="allorders"><a href="#">All</a></li>
                <li data-content="neworders"><a href="#">New</a></li>
                <li data-content="processorders"><a href="#">Processing</a></li>
                <li data-content="shippedorders"><a href="#">Shipped</a></li>
                <li data-content="cancelledorders"><a href="#">Cancelled</a></li>
          </ul>
           <ul class="reports">
                <li class="current"><a href="#">Sales</a></li>
                <li><a href="#">Fast/Slow Moving</a></li>
                <li><a href="#">Customers</a></li>
          </ul>
      <?php } ?>


      <?php if($role=="supplier") {?>
          <ul class="request selected-sub-menu">
                <li class="current" data-content="dashboard"><a href="#">Dashboard</a></li>
                <!-- <li data-content="request"><a href="#">Request List</a></li> -->
                <li data-content="sup-neworders"><a href="#">New <span class="badge"><?=$requeststatus->New;?></span></a></li>
                <li data-content="sup-processorders"><a href="#">Processing</a></li>
                <li data-content="sup-shippedorders"><a href="#">Incomplete</a></li>
                <li data-content="sup-shippedorders"><a href="#">Shipped</a></li>
                <li data-content="sup-cancelledorders"><a href="#">Cancelled</a></li>
          </ul>
           <ul class="items">
                <li class="current" data-content="sup-items"><a href="#">Items</a></li>
                <li data-content="additems"><a href="#">Add Items</a></li>
                <li data-content="sup-removed"><a href="#">Removed</a></li>
          </ul>
        
      <?php } ?>

    </nav>
</div>