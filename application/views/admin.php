 <div class="content-group show" data-group="purchaseorder">
                <?php $this->load->view("dashboard");?> 
                <div class="content-list" data-content="purchaseorder">
                    <!-- <h5 class="dash-header"><span class="glyphicon glyphicon-stats"></span> Purchase Orders <subheader></subheader></h5>  -->
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
                            <table class="display" data-table="posubmit" ></table>
                         </div>

                    </div>
                </div>

                <div class="content-list" data-content="receivings">
                    <button id="btn-directreceive" class="btn main-button btn-action btn-action-right"><span class="glyphicon glyphicon-arrow-right"></span> Direct Receive</button>
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
                    <!-- <button id="" class="btn btn-action btn-action-right"><span class="glyphicon glyphicon-send"></span> Send Notification</button> -->
                    <table class="display main-table" data-table="backorders"> </table>
                </div>

                <div class="content-list" data-content="suppliers">
                    <button id="btn-addsupplier" class="btn btn-action main-button btn-action-right"><span class="glyphicon glyphicon-plus"></span> New Supplier</button>
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
                                            <div class="group">      
                                              <input class="inputMaterial" type="text" name="SupplierName" id="txt-suppliername">
                                              <span class="highlight"></span>
                                              <span class="bar"></span>
                                              <label class="formlabel">Supplier name:</label>
                                            </div>

                                            <!-- <label for="txt-suppliername">Supplier name:</label>
                                            <input type="text" name="SupplierName" id="txt-suppliername" class="form-control"> -->
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="group">      
                                              <input class="inputMaterial" type="text"  name="Address" id="txt-address">
                                              <span class="highlight"></span>
                                              <span class="bar"></span>
                                              <label class="formlabel">Address:</label>
                                            </div>

                                            <!-- <label for="txt-address">Address:</label>
                                            <input type="text" name="Address" id="txt-address" class="form-control"> -->
                                        </td> 
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="group">      
                                              <input class="inputMaterial" type="text" name="ContactNo" id="txt-contact" >
                                              <span class="highlight"></span>
                                              <span class="bar"></span>
                                              <label class="formlabel">Contact:</label>
                                            </div>
                                            <!-- <label for="txt-contact">Contact:</label>
                                            <input type="text" name="ContactNo" id="txt-contact" class="form-control"> -->
                                        </td>  
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="group">      
                                              <input class="inputMaterial" type="text" name="Email" id="txt-email">
                                              <span class="highlight"></span>
                                              <span class="bar"></span>
                                              <label class="formlabel">Email Address:</label>
                                            </div>
                                            <!-- <label for="txt-email">Email Address:</label>
                                            <input type="text" name="Email" id="txt-email" class="form-control"> -->
                                        </td>  
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="group">      
                                              <input class="inputMaterial" type="text" name="Username" id="txt-username">
                                              <span class="highlight"></span>
                                              <span class="bar"></span>
                                              <label class="formlabel">Username:</label>
                                            </div><!-- 
                                            <label for="txt-username">Username:</label>
                                            <input type="text" name="Username" id="txt-username" class="form-control"> -->
                                        </td>  
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="group">      
                                              <input class="inputMaterial" type="password" name="Password" id="txt-password" >
                                              <span class="highlight"></span>
                                              <span class="bar"></span>
                                              <label class="formlabel">Password:</label>
                                            </div><!-- 
                                            <label for="txt-Password">Password:</label>
                                            <input type="password" name="Password" id="txt-password" class="form-control"> -->
                                        </td>  
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="group">      
                                              <input class="inputMaterial" type="password" id="txt-confirmpassword">
                                              <span class="highlight"></span>
                                              <span class="bar"></span>
                                              <label class="formlabel">Confirm Password:</label>
                                            </div>
                                            <!-- <label for="txt-confirmpassword">Confirm Password:</label>
                                            <input type="password" id="txt-confirmpassword" class="form-control"> -->
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
 
                <div class="content-list" data-content="inventory">
                    <!-- <button id="" class="btn btn-action btn-action-right"><span class="glyphicon glyphicon-plus"></span> Physical Count</button> -->
                    <table class="display main-table" data-table="inventory"> </table>
                </div>

                <div class="content-list" data-content="items">
                    <!-- <button id="direct-receive" class="btn btn-action main-button btn-action-right"><span class="glyphicon glyphicon-arrow-plus"></span> Add Item</button> -->
                    <div class="btn-group btn-child-group btn-group-mode btn-action-right">
                        <button id="btn-itemscancel" class="btn btn-default"><span class="glyphicon glyphicon-ban-circle"></span> Cancel</button>
                        <button id="btn-submititemvariant" class="btn btn-action"><span class="glyphicon glyphicon-ok-circle"></span> Submit</button>
                    </div>
                    <table class="display main-table" data-table="items"> </table>
                    <div class="content-child">
                         <div>
                            <div class="col-lg-4">  
                                    <label>Multiple items?</label> 
                                    <div class="checkbox"> 
                                      <label><input type="checkbox"  id="chkIsMultiple" value="">Create Attributes and Options</label>
                                    </div> 
                                    <table width="100%" id="table-attribute" class="display" style="margin-top:40px;"> 
                                        <thead> 
                                            <tr>
                                                <td>Attribute</td>
                                                <td>Options</td>
                                                <td></td>
                                            </tr> 
                                        </thead>
                                        <tbody>
                                           
                                        </tbody>
                                        
                                    </table> 
                                    <span id="addattribute"><span class="glyphicon glyphicon-plus"></span> Add more attribute</span>
                                    <button class="btn btn-action" id="btn-itemvariantgenerate">Generate Item with Variant</button>

                            </div>

                            <div class="col-lg-8 varianttable-wrap"> 
                                <table class="display main-table" data-table="listitemvariant" ></table> 
                            </div> 
                          
                    </div>

                    </div>
                </div>

                <div class="content-list" data-content="lowstocks">
                    <table class="display main-table" data-table="lowstocks"> </table>
                </div>
                <div class="content-list" data-content="categories">
                    <!-- <button id="btn-addfamily" class="btn btn-action main-button btn-action-right"><span class="glyphicon glyphicon-plus"></span> Add Family</button>  -->
                    <!-- <table class="display main-table" data-table="categories"></table> -->
                    <div class="col-md-12" align="center"> 
                        <dl class="categories-wrap">
                            <dd>
                                 <h5 class="dash-header sub2">Family <span class="pull-right add"><span class="glyphicon glyphicon-plus"></span> Add</span></h5>
                                 <dl class="list-family dd-categories" data-section="level1">
                                    <?php foreach($listfamily as $row){ ?>
                                        <dd data-id="<?=$row->id;?>">
                                          <div class="row">
                                            <div class="col-sm-5" align="center">
                                              <div class="image-holder">
                                               <?php $image = base_url('images/variant-folder/' . $row->ImageFile);?>

                                                <img src="<?=$image;?>" onerror="this.src='<?=base_url('images/noimage.gif');?>';"/>
                                              </div>
                                              <button class="btn btn-action upload">Upload image</button> 
                                              <input type="file" data-col="Level1No" data-id="<?=$row->id;?>" data-table="Level1" class="file-upload" style="display: none;">
                                            </div> 
                                            <div class="col-sm-7"> 
                                              <span class="data-edit" ><?=$row->Name;?></span>
                                              <span class="action pull-right"><a class="edit">Edit</a> | <a class="delete">Delete</a></span>
                                            </div> 
                                          </div> 
                                        </dd>
                                    <?php } ?> 
                                 </dl>
                            </dd>
                            <dd>
                                 <h5 class="dash-header sub2">Category <span class="pull-right add"><span class="glyphicon glyphicon-plus"></span> Add</span></h5>
                                 <dl class="list-categories dd-categories" data-section="level2">
                                     
                                 </dl>
                            </dd>
                            <dd>
                                 <h5 class="dash-header sub2">Sub-Category <span class="pull-right add"><span class="glyphicon glyphicon-plus"></span> Add</span></h5>
                                 <dl class="list-subcategories dd-categories" data-section="level3">
                                      
                                 </dl>
                            </dd>

                        </dl>
                    </div>
                       
                </div>
                <div class="content-list" data-content="removeditems"> 
                    <table class="display main-table" data-table="removeditems"> </table> 
                </div>
        
                <div class="content-list" data-content="allorders">

                     <div class="orderstatus-wrap">
                         <label>Order Status:</label>
                         <select id="polistorderstatus" class="form-control">
                                <option value="" selected>All</option>
                                <option value="New">New</option>
                                <option value="Process">Process</option>
                                <option value="Ship">Shipped</option>
                                <option value="Cancel">Cancelled</option> 
                         </select>
                     </div>  
                    <table class="display main-table" data-table="allorders"> </table>
                </div>
 
</div>


