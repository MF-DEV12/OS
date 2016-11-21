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
                <h5 class="dash-header"><span class="glyphicon glyphicon-stats"></span> Purchase Orders <subheader></subheader></h5> 
                <button id="btn-addrequest" class="btn btn-action main-button btn-action-right"><span class="glyphicon glyphicon-plus"></span> Create Request</button>
                <div class="btn-group btn-child-group btn-group-mode btn-action-right">
                    <button id="btn-pocancel" class="btn btn-default"><span class="glyphicon glyphicon-ban-circle"></span> Cancel</button>
                    <button id="btn-poreset" class="btn btn-default"><span class="glyphicon glyphicon-refresh"></span> Reset</button>
                    <button id="btn-posubmit" class="btn btn-action"><span class="glyphicon glyphicon-ok-circle"></span> Submit</button>
                </div>
                <table class="display main-table" data-table="purchaseorder"> </table>
                <div class="content-child">

                    <div class="col-md-5 polistsupplier-wrap"> 
                        <div class="polistsupplier-holder">
                            <select id="polistsupplier" class="form-control">
                                <option value="" disabled selected>Select a Supplier</option>
                                <?php foreach($suppliers["list"] as $po){ ?>
                                    <option value="<?=$po->SupplierNo;?>"><?=$po->SupplierName;?></option>
                                <?php }?>
                            </select>
                        </div>
                       
                        <table class="display" data-table="pobysupplier"></table>
                        <table class="display" data-table="lowstockbysupplier"></table>
                     </div>

                     <div class="col-md-7 posubmit-wrap"> 
                        <table class="display main-table" data-table="posubmit" ></table>
                     </div>

                </div>
            </div>
            <div class="content-list" data-content="receivings">
                <h5 class="dash-header"><span class="glyphicon glyphicon-stats"></span> Receivings <subheader></subheader></h5> 
                <button id="btn-directreceive" class="btn btn-action btn-action-right"><span class="glyphicon glyphicon-arrow-right"></span> Direct Receive</button>
                <div class="btn-group btn-child-group btn-group-mode btn-action-right">
                    <button id="btn-receivecancel" class="btn btn-default"><span class="glyphicon glyphicon-ban-circle"></span> Cancel</button>
                    <button id="btn-receivesubmit" class="btn btn-action"><span class="glyphicon glyphicon-ok-circle"></span> Submit</button>
                </div>
                <table class="display main-table" data-table="receivings"> </table>
                
                <div class="content-child">
                    <div class="row">
                         <div class="col-md-6"> 
                            <table class="display main-table" data-table="porequest" ></table>
                           
                         </div>

                         <div class="col-md-6"> 
                            <table class="display main-table" data-table="poreceivesubmit" ></table>
                         </div>
                     </div> 
                </div>
            </div>
            <div class="content-list" data-content="backorders">
                <h5 class="dash-header"><span class="glyphicon glyphicon-stats"></span> Back Order</h5> 
                <button id="" class="btn btn-action btn-action-right"><span class="glyphicon glyphicon-send"></span> Send Notification</button>
                <table class="display main-table" data-table="backorders"> </table>
            </div>
            <div class="content-list" data-content="suppliers">
                <h5 class="dash-header"><span class="glyphicon glyphicon-stats"></span> Suppliers <subheader></subheader></h5> 
                <button id="btn-addsupplier" class="btn btn-action btn-action-right"><span class="glyphicon glyphicon-plus"></span> New Supplier</button>
                <div class="btn-group btn-child-group btn-group-mode btn-action-right">
                    <button id="btn-suppliercancel" class="btn btn-default"><span class="glyphicon glyphicon-ban-circle"></span> Cancel</button>
                    <button id="btn-suppliersubmit" class="btn btn-action"><span class="glyphicon glyphicon-ok-circle"></span> Submit</button>
                </div>
                <table class="display main-table" data-table="suppliers"> </table>

                <div class="content-child">
                    <div class="row group-1">
                         <div class="col-lg-12"> 
                            <table class="display form-table" width="500px">
                                <tr>
                                    <td>
                                        <label for="txt-suppliername">Supplier name:</label>
                                        <input type="text" name="SupplierName" id="txt-suppliername" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="txt-address">Address:</label>
                                        <input type="text" name="Address" id="txt-address" class="form-control">
                                    </td> 
                                </tr>
                                <tr>
                                    <td>
                                        <label for="txt-contact">Contact:</label>
                                        <input type="text" name="ContactNo" id="txt-contact" class="form-control">
                                    </td>  
                                </tr>
                                <tr>
                                    <td>
                                        <label for="txt-email">Email Address:</label>
                                        <input type="text" name="Email" id="txt-email" class="form-control">
                                    </td>  
                                </tr>
                                <tr>
                                    <td>
                                        <label for="txt-username">Username:</label>
                                        <input type="text" name="Username" id="txt-username" class="form-control">
                                    </td>  
                                </tr>
                                <tr>
                                    <td>
                                        <label for="txt-Password">Password:</label>
                                        <input type="text" name="Password" id="txt-password" class="form-control">
                                    </td>  
                                </tr>
                                <tr>
                                    <td>
                                        <label for="txt-confirmpassword">Confirm Password:</label>
                                        <input type="text" id="txt-confirmpassword" class="form-control">
                                    </td> 
                                    
                                </tr> 
                            </table>
                         </div>
 
                     </div> 
                      <div class="row group-2">
                         <div class="col-lg-12"> 
                            <table class="display main-table" data-table="listpobysupplier" ></table> 
                         </div>
 
                     </div> 
                </div>

            </div>
        </div>
        <div class="content-group" data-group="inventory">
            <div class="content-list show" data-content="inventory">
                <h5 class="dash-header"><span class="glyphicon glyphicon-stats"></span> Inventory</h5> 
                <button id="" class="btn btn-action btn-action-right"><span class="glyphicon glyphicon-plus"></span> Physical Count</button>
                <table class="display main-table" data-table="inventory"> </table>
            </div>
            <div class="content-list" data-content="items">
                <h5 class="dash-header"><span class="glyphicon glyphicon-stats"></span> Items</h5> 
                <button id="direct-receive" class="btn btn-action btn-action-right"><span class="glyphicon glyphicon-arrow-plus"></span> Add Item</button>
                <table class="display main-table" data-table="items"> </table>
            </div>
            <div class="content-list" data-content="lowstocks">
                <h5 class="dash-header"><span class="glyphicon glyphicon-stats"></span> Low Stocks</h5> 
                <table class="display main-table" data-table="lowstocks"> </table>
            </div>
             <!--<div class="content-list" data-content="backorders">
                <h5 class="dash-header"><span class="glyphicon glyphicon-stats"></span> Back Order</h5> 
                <button id="" class="btn btn-action"><span class="glyphicon glyphicon-send"></span> Send Notification</button>
                <table class="display" data-table="backorders"> </table>
            </div>
            <div class="content-list" data-content="suppliers">
                <h5 class="dash-header"><span class="glyphicon glyphicon-stats"></span> Suppliers</h5> 
                <button id="" class="btn btn-action"><span class="glyphicon glyphicon-plus"></span> New Supplier</button>
                <table class="display" data-table="suppliers"> </table>
            </div> -->
        </div>

        <div class="content-group" data-group="orders">
            <div class="content-list show" data-content="allorders">
                <h5 class="dash-header"><span class="glyphicon glyphicon-stats"></span> All Orders</h5> 
                <button id="" class="btn btn-action btn-action-right"><span class="glyphicon glyphicon-plus"></span> Physical Count</button>
                <table class="display main-table" data-table="allorders"> </table>
            </div>
            <div class="content-list" data-content="neworders">
                <h5 class="dash-header"><span class="glyphicon glyphicon-stats"></span> New Orders</h5> 
                <button id="direct-receive" class="btn btn-action btn-action-right"><span class="glyphicon glyphicon-arrow-plus"></span> Add Item</button>
                <table class="display main-table" data-table="neworders"> </table>
            </div>
            <div class="content-list" data-content="processorders">
                <h5 class="dash-header"><span class="glyphicon glyphicon-stats"></span> Processing Orders</h5> 
                <table class="display main-table" data-table="processorders"> </table>
            </div>
            <div class="content-list" data-content="shippedorders">
                <h5 class="dash-header"><span class="glyphicon glyphicon-stats"></span> Shipped Orders</h5> 
                <table class="display main-table" data-table="shippedorders"> </table>
            </div>
            <div class="content-list" data-content="cancelledorders">
                <h5 class="dash-header"><span class="glyphicon glyphicon-stats"></span> Cancelled Orders</h5> 
                <table class="display main-table" data-table="cancelledorders"> </table>
            </div>
             <!--<div class="content-list" data-content="backorders">
                <h5 class="dash-header"><span class="glyphicon glyphicon-stats"></span> Back Order</h5> 
                <button id="" class="btn btn-action"><span class="glyphicon glyphicon-send"></span> Send Notification</button>
                <table class="display" data-table="backorders"> </table>
            </div>
            <div class="content-list" data-content="suppliers">
                <h5 class="dash-header"><span class="glyphicon glyphicon-stats"></span> Suppliers</h5> 
                <button id="" class="btn btn-action"><span class="glyphicon glyphicon-plus"></span> New Supplier</button>
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
    <script type="text/javascript" src='<?=base_url("js/bootbox.min.js")?>'></script>
    <script type="text/javascript" src='<?=base_url("js/utility/ajaxCall.js")?>'></script>
    <!-- <script src="https://code.highcharts.com/highcharts.js"></script>  -->
    <script src="<?=base_url('js/navside/main.js');?>"></script>   
    <script src="<?=base_url('js/scripts/admin.js');?>"></script>   
     
</body>
    
</html>         