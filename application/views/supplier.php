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
                        <div class="col-md-12">
                            <table class="display main-table" data-table="request"> </table> 
                        </div>
                         
                         
                     </div> 
                 </div>
             </div>