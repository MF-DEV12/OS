<div class="content-list show" data-content="dashboard">
                     <div class="col-md-12" align="center">
                        <dl id="list-status">
                            <dd> 
                                <h5>&#8369; Total Revenue</h5>
                                <h2>&#8369; <?=$totalrevenue;?></h2>
                            </dd> 
                            <dd> 
                                <h5><span class="glyphicon glyphicon-shopping-cart"></span> Total Orders</h5>
                                <h2><?=$requeststatus->All;?></h2>
                            </dd>
                            <dd> 
                                <h5><span class="glyphicon glyphicon-asterisk"></span> Total New Orders</h5>
                                <h2><?=$requeststatus->New;?></h2>
                            </dd>
                            <dd> 
                                <h5><span class="glyphicon glyphicon-send"></span> Total Shipped Orders</h5>
                                <h2><?=$requeststatus->Shipped;?></h2>
                            </dd>  
                            <dd> 
                                <h5><span class="glyphicon glyphicon-user"></span> Total Customers</h5>
                                <h2><?=$totalcustomer;?></h2>
                            </dd>
                        </dl>
                    </div>
                    <div class="col-md-9">
                            <h5 class="dash-header sub"><span class="glyphicon glyphicon-stats"></span> Monitoring Sales and Customers Stats</h5> 
                        <div id="dashboard-chart">
                            
                        </div> 
                    </div>
                    <div class="col-md-3 list-ordereditems">
                        <h5 class="dash-header sub"><span class="glyphicon glyphicon-th-large"></span> Most Ordered Items</h5> 
                        <dl>

                            <?php if($mostordereditems) {?>
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
                            <?php } else { ?>
                                    <p class="empty">No ordered item(s) found.</p> 
                            <?php } ?> 
                        </dl>
                    </div>
                    <div style="top: 28px;position: relative;">
                        <div class="col-md-9 auditlogs" style="font-size: 12px;">
                            <h5 class="dash-header sub"><span class="glyphicon glyphicon-calendar"></span> Recent Logs</h5> 
                            <table class="display" data-table="auditlogs"> </table>  
                        </div>
                        <div class="col-md-3 list-ordereditems" style="height:317px;">
                            <h5 class="dash-header sub"><span class="glyphicon glyphicon-user"></span> Most Customer's Order</h5> 
                            <dl>
                                <?php if($mostcustomer) {?>
                                <?php foreach($mostcustomer as $row) {?>
                                    <dd>
                                        <?=$row->CustomerName;?> <span class="pull-right"><?=$row->Total;?></span>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="<?=$row->Percentage;?>"
                                                    aria-valuemin="0" aria-valuemax="100" style="width:<?=$row->Percentage;?>%">
                                                        <span class="sr-only"><?=$row->Percentage;?>% Complete</span>
                                            </div>
                                        </div>
                                    </dd>
                                <?php } ?> 
                                <?php } else { ?>
                                        <p class="empty">No customer(s) found.</p> 
                                <?php } ?> 
                            </ol>
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