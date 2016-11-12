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
                <li class="current"><a href="#">Inventory</a></li>
                <li><a href="#">Items</a></li>
                <li><a href="#">Low Stocks</a></li>
                <li><a href="#">Categories</a></li>
                <li><a href="#">Removed</a></li>
          </ul>
          <ul class="orders">
                <li class="current"><a href="#">All</a></li>
                <li><a href="#">New</a></li>
                <li><a href="#">Processing</a></li>
                <li><a href="#">Shipped</a></li>
                <li><a href="#">Cancelled</a></li>
          </ul>
           <ul class="reports">
                <li class="current"><a href="#">Sales</a></li>
                <li><a href="#">Fast/Slow Moving</a></li>
                <li><a href="#">Customers</a></li>
          </ul>
      <?php } ?>


      <?php if($role=="supplier") {?>

        
      <?php } ?>

    </nav>
</div>