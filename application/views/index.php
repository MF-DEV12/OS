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


    <?php if($role=="admin") {?>
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
                    <!-- <button id="" class="btn btn-action btn-action-right"><span class="glyphicon glyphicon-send"></span> Send Notification</button> -->
                    <table class="display main-table" data-table="backorders"> </table>
                </div>
                <div class="content-list" data-content="suppliers">
                    <h5 class="dash-header"><span class="glyphicon glyphicon-stats"></span> Suppliers <subheader></subheader></h5> 
                    <button id="btn-addsupplier" class="btn btn-action btn-action-right"><span class="glyphicon glyphicon-plus"></span> New Supplier</button>
                    <div class="btn-group btn-child-group btn-group-mode btn-action-right">
                        <button id="btn-suppliercancel" class="btn btn-default"><span class="glyphicon glyphicon-ban-circle"></span> Cancel</button>
                        <button id="btn-suppliersubmit" class="btn btn-action"><span class="glyphicon glyphicon-ok-circle"></span> Submit</button>
                    </div>
                    <div class="btn-group btn-child-group btn-group-mode btn-action-right" style="z-index: 9;">
                        <button id="btn-supplierback" class="btn btn-default"><span class="glyphicon glyphicon-menu-left"></span> Back</button> 
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
                                            <input type="password" name="Password" id="txt-password" class="form-control">
                                        </td>  
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="txt-confirmpassword">Confirm Password:</label>
                                            <input type="password" id="txt-confirmpassword" class="form-control">
                                        </td> 
                                        
                                    </tr> 
                                </table>
                             </div>
     
                         </div> 
                          <div class="group-2">
                             <div class="col-lg-12"> 
                                <div>
                                    <h3 id="label-suppliername"></h3> 
                                    <table width="100%" id="table-suppliersinfo">
                                        <tr>
                                            <td>Address:</td>
                                            <td id="label-address"></td>
                                        </tr>
                                         <tr>
                                            <td>Contact #:</td>
                                            <td id="label-contact"></td>
                                        </tr>
                                         <tr>
                                            <td>Email Address:</td>
                                            <td id="label-email"></td>
                                        </tr>
                                    </table> 
                                </div>
                                <div class="padding"></div>
                                <table class="display main-table" data-table="listsupplybysupplier" ></table> 
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
                <div class="content-list" data-content="categories">
                    <h5 class="dash-header"><span class="glyphicon glyphicon-stats"></span> Categories</h5> 
                    <button id="" class="btn btn-action btn-action-right"><span class="glyphicon glyphicon-plus"></span> Add Categorie</button>
                    <table class="display main-table" data-table="categories"> </table>
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
    <?php } ?>


    <?php if($role=="supplier") {?>
        <div class="content-holder">
           
             <div class="content-group show" data-group="request">
                 <div class="content-list show" data-content="dashboard">
                    <h5 class="dash-header"><span class="glyphicon glyphicon-stats"></span> Dashboard</h5> 
                     <div class="col-md-12" align="center">
                        <dl id="list-status">
                            <dd> 
                                <h5> <span class="glyphicon glyphicon-asterisk"></span> Total Revenue</h5>
                                <h2>&#8369; 1,000</h2>
                            </dd> 
                            <dd> 
                                <h5><span class="glyphicon glyphicon-shopping-cart"></span> Total Orders</h5>
                                <h2><?=$requeststatus->All;?></h2>
                            </dd>
                             <dd> 
                                <h5><span class="glyphicon glyphicon-shopping-cart"></span> Total New Orders</h5>
                                <h2><?=$requeststatus->New;?></h2>
                            </dd> 
                            <dd> 
                                <h5><span class="glyphicon glyphicon-user"></span> Total Customers</h5>
                                <h2><?=$requeststatus->Shipped;?></h2>
                            </dd>
                        </dl>
                    </div>
                    <div class="col-md-9">
                            <h5 class="dash-header sub"><span class="glyphicon glyphicon-stats"></span> Items Sales</h5> 
                        <div id="dashboard-chart">
                            
                        </div> 
                    </div>
                    <div class="col-md-3 list-ordereditems">
                        <h5 class="dash-header sub"><span class="glyphicon glyphicon-th-large"></span> Most Ordered Items</h5> 
                        <dl>
                            <?php foreach($mostordereditems as $row) {?>
                                <dd>
                                    <?=$row->Name;?> <span class="pull-right"><?=$row->Total;?></span>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="<?=$row->Percentage;?>"
                                                aria-valuemin="0" aria-valuemax="100" style="width:<?=$row->Percentage;?>%">
                                                    <span class="sr-only"><?=$row->Percentage;?>% Complete</span>
                                        </div>
                                    </div>
                                </dd>
                            <?php } ?> 
                        </dl>
                    </div>
                    <div style="margin-top: 10px;">
                        <div class="col-md-3 list-ordereditems">
                            <h5 class="dash-header sub"><span class="glyphicon glyphicon-user"></span> Most Customer's Order</h5> 
                            <dl>
                                <dd>
                                        Nail
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="70"
                                                    aria-valuemin="0" aria-valuemax="100" style="width:70%">
                                                        <span class="sr-only">70% Complete</span>
                                            </div>
                                        </div>
                                </dd>
                                <dd>Hammer<div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="70"
                                                    aria-valuemin="0" aria-valuemax="100" style="width:70%">
                                                        <span class="sr-only">70% Complete</span>
                                            </div>
                                        </div></dd>
                                <dd>Wood<div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="70"
                                                    aria-valuemin="0" aria-valuemax="100" style="width:70%">
                                                        <span class="sr-only">70% Complete</span>
                                            </div>
                                        </div></dd>
                                <dd>Plywood<div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="70"
                                                    aria-valuemin="0" aria-valuemax="100" style="width:70%">
                                                        <span class="sr-only">70% Complete</span>
                                            </div>
                                        </div></dd>
                                <dd>Cement<div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="70"
                                                    aria-valuemin="0" aria-valuemax="100" style="width:70%">
                                                        <span class="sr-only">70% Complete</span>
                                            </div>
                                        </div></dd>
                            </ol>
                        </div>
                        <div class="col-md-9" style="padding: 0px;padding-left: 14px;">
                            <h5 class="dash-header sub"><span class="glyphicon glyphicon-calendar"></span> Recent Logs</h5> 
                        </div>

                    </div>
                    
                    <!-- <div class="col-md-12">
                        <h5 class="dash-header sub"><span class="glyphicon glyphicon-stats"></span> Request List</h5> 

                        <table class="display main-table" data-table="request"> </table>  
                    </div>
                    -->
                  <!--   <div class="dashboard-status">
                        <div class="col-md-3">1</div>
                        <div class="col-md-3">2</div>
                        <div class="col-md-3">3</div> 
                    </div> -->
                 </div>
                 <div class="content-list" data-content="sup-neworders">
                    <h5 class="dash-header"><span class="glyphicon glyphicon-stats"></span> New Orders <subheader></subheader></h5> 
                     <div class="row">
                        <div class="col-md-9">
                            <table class="display main-table" data-table="request"> </table> 
                        </div>
                         
                         
                     </div> 
                 </div>
             </div>
        </div>
    <?php } ?>

    

    </main>          
    <script type="text/javascript" src='<?=base_url("js/jquery/jquery-1.11.3.js")?>'></script>
    <script type="text/javascript" src='<?=base_url("js/jquery/jquery-ui.js")?>'></script> 
    <script type="text/javascript" src='<?=base_url("js/datatables/jquery.dataTables.min.js")?>'></script> 
    <script type="text/javascript" src='<?=base_url("js/bootstrap/bootstrap.min.js")?>'></script>
    <script type="text/javascript" src='<?=base_url("js/bootbox.min.js")?>'></script>
    <script type="text/javascript" src='<?=base_url("js/utility/ajaxCall.js")?>'></script>
    <script type="text/javascript" src='<?=base_url("js/highcharts.js")?>'></script>
    <script src="<?=base_url('js/navside/main.js');?>"></script>   
    <script src="<?=base_url('js/scripts/admin.js');?>"></script>   
     
</body>
    
</html>         