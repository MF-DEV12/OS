<!DOCTYPE html>
<html>
<head>
    <!-- Include meta tag to ensure proper rendering and touch zooming -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

      
    <title>Lampano Hardware</title>

    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Century%20Gothic">
    <link rel="stylesheet" type="text/css" href="<?=base_url('css/bootstrap/bootstrap.min.css');?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url('css/datatables/jquery.dataTables.css');?>">
    <link rel="stylesheet" href="<?=base_url('css/navside/nav.css');?>"> <!-- Resource style -->
    <link rel="stylesheet" href="<?=base_url('css/rsTable.css');?>"> <!-- Resource style -->
    <link rel="stylesheet" href="<?=base_url('css/style.css');?>"> <!-- Resource style -->

    <link href="<?=base_url('js/bootstrap-datepicker/css/bootstrap-datetimepicker.css');?>" rel="stylesheet" type="text/css" />
</head>
<body>
    
    <?php $this->load->view("header");?>

    <main class="cd-main-content">

    <?php $this->load->view("sub-menu");?>
  
    <div class="content-holder">
        <div class="content-group show" data-group="purchaseorder">
            <div class="content-list show" data-content="purchaseorder">
                <h5 class="dash-header"><span class="glyphicon glyphicon-stats"></span> Purchase Orders</h5> 
                <button id="add-request-po" class="btn btn-action"><span class="glyphicon glyphicon-plus"></span> Create Request</button>
                <table class="display" data-table="purchaseorder"> </table>
            </div>
            <div class="content-list" data-content="receivings">
                <h5 class="dash-header"><span class="glyphicon glyphicon-stats"></span> Receivings</h5> 
                <button id="direct-receive" class="btn btn-action"><span class="glyphicon glyphicon-arrow-right"></span> Direct Receive</button>
                <table class="display" data-table="receivings"> </table>
            </div>
            <div class="content-list" data-content="backorders">
                <h5 class="dash-header"><span class="glyphicon glyphicon-stats"></span> Back Order</h5> 
                <button id="add-request-po" class="btn btn-action"><span class="glyphicon glyphicon-send"></span> Send Notification</button>
                <table class="display" data-table="backorders"> </table>
            </div>
            <div class="content-list" data-content="suppliers">
                <h5 class="dash-header"><span class="glyphicon glyphicon-stats"></span> Suppliers</h5> 
                <button id="add-request-po" class="btn btn-action"><span class="glyphicon glyphicon-plus"></span> New Supplier</button>
                <table class="display" data-table="suppliers"> </table>
            </div>
        </div>
        <div class="content-group" data-group="inventory">
            <div class="content-list show" data-content="inventory">
                <h5 class="dash-header"><span class="glyphicon glyphicon-stats"></span> Inventory</h5> 
                <button id="add-request-po" class="btn btn-action"><span class="glyphicon glyphicon-plus"></span> Physical Count</button>
                <table class="display list-table" data-table="inventory"> </table>
            </div>
            <div class="content-list" data-content="items">
                <h5 class="dash-header"><span class="glyphicon glyphicon-stats"></span> Items</h5> 
                <button id="direct-receive" class="btn btn-action"><span class="glyphicon glyphicon-arrow-plus"></span> Add Item</button>
                <table class="display" data-table="items"> </table>
            </div>
            <div class="content-list" data-content="lowstocks">
                <h5 class="dash-header"><span class="glyphicon glyphicon-stats"></span> Low Stocks</h5> 
                <table class="display" data-table="lowstocks"> </table>
            </div>
             <!--<div class="content-list" data-content="backorders">
                <h5 class="dash-header"><span class="glyphicon glyphicon-stats"></span> Back Order</h5> 
                <button id="add-request-po" class="btn btn-action"><span class="glyphicon glyphicon-send"></span> Send Notification</button>
                <table class="display" data-table="backorders"> </table>
            </div>
            <div class="content-list" data-content="suppliers">
                <h5 class="dash-header"><span class="glyphicon glyphicon-stats"></span> Suppliers</h5> 
                <button id="add-request-po" class="btn btn-action"><span class="glyphicon glyphicon-plus"></span> New Supplier</button>
                <table class="display" data-table="suppliers"> </table>
            </div> -->
        </div>
       <!--  <div class="content-list" data-content="backorders">
            <table class="display" data-table="backorders"></table>
        </div> -->



    </div>
      
            

    </main>          
    <script type="text/javascript" src='<?=base_url("js/jquery/jquery-1.11.3.js")?>'></script>
    <script type="text/javascript" src='<?=base_url("js/jquery/jquery-ui.js")?>'></script> 
    <script type="text/javascript" src='<?=base_url("js/datatables/jquery.dataTables.min.js")?>'></script> 
    <script type="text/javascript" src='<?=base_url("js/bootstrap/bootstrap.min.js")?>'></script>
    <script type="text/javascript" src='<?=base_url("js/utility/ajaxCall.js")?>'></script>
    <script src="https://code.highcharts.com/highcharts.js"></script> 
    <script src="<?=base_url('js/navside/main.js');?>"></script>   
    <script src="<?=base_url('js/scripts/admin.js');?>"></script>   
     
</body>
    
</html>         