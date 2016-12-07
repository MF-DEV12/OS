 <div class="content-group show" data-group="request">
        <?php $this->load->view("dashboard");?>
        
        <div class="content-list" data-content="requestlist">
            <div class="col-md-12">
                  <div class="orderstatus-wrap">
                     <label>Order Status:</label>
                     <select id="porequestlist" class="form-control">
                            <option value="" selected>All</option>
                            <option value="0">New Request</option>
                            <option value="1">Delivered</option> 
                     </select>
                  </div>  
                <table class="display main-table" data-table="requestlist"> </table> 
            </div> 
        </div> 

        <div class="content-list" data-content="backorders">
            <!-- <button id="" class="btn btn-action btn-action-right"><span class="glyphicon glyphicon-send"></span> Send Notification</button> -->
            <table class="display main-table" data-table="backorders"> </table>
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
        <!--  <div class="content-list" data-content="sup-neworders">
            <div class="col-md-12">
                <table class="display main-table" data-table="sup-neworders"> </table> 
            </div> 
         </div>
         <div class="content-list" data-content="sup-processorders">
            <div class="col-md-12">
                <table class="display main-table" data-table="sup-processorders"> </table> 
            </div> 
         </div>
         <div class="content-list" data-content="sup-incompleteorders">
            <div class="col-md-12">
                <table class="display main-table" data-table="sup-incompleteorders"> </table> 
            </div> 
         </div>
         <div class="content-list" data-content="sup-shippedorders">
            <div class="col-md-12">
                <table class="display main-table" data-table="sup-shippedorders"> </table> 
            </div> 
         </div>

         <div class="content-list" data-content="sup-cancelledorders">
            <div class="col-md-12">
                <table class="display main-table" data-table="sup-cancelledorders"> </table> 
            </div> 
         </div> -->

          <div class="content-list" data-content="sup-items">
            <div class="col-md-12">
                <button class="btn main-button btn-action btn-action-right" id="btn-additems"><span class="glyphicon glyphicon-plus"></span> Add Items</button>
             	  
                <table class="display main-table" data-table="sup-items"> </table> 
 
            </div>
          </div>

          <div class="content-list" data-content="additems">
              <div class="col-md-12" style="font-size: 14px;">
                  <div class="btn-group main-button btn-group-mode btn-action-right">
                    <button id="btn-backitems" class="btn btn-default"><span class="glyphicon glyphicon-ban-circle"></span> Cancel</button>
                    <button id="btn-submititemvariant" class="btn btn-action"><span class="glyphicon glyphicon-ok-circle"></span> Save items with variant</button>
                  </div> 
                  <div class="group-1" style="padding-top:10px;">
                    <ul class="stepNav threeWide">
                      <li class="selected" data-view="item-info"><a href="#" title="">Information</a></li>
                      <li data-view="item-variants"><a href="#" title="" >Variants</a></li>
                      <li data-view="item-review"><a href="#" title="">Review</a></li>
                    </ul>
                    <div class="step-holder">
                      <div class="step-view col-md-12 show" data-view="item-info" align="center">
                          <table class="display form-table" width="500px" style="margin-top: 20px;">
                                  <tr>
                                      <td>
                                          <div class="group">      
                                            <input class="inputMaterial" type="text" id="txt-itemname">
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label class="formlabel">Item name:</label>
                                          </div> 
                                      </td>
                                  </tr>
                                  <tr>
                                      <td>
                                          <div class="group">   
                                            <select class="inputMaterial" id="list-uom">  
                                               <option value="" selected disabled="">Select one</option>
                                               <?php foreach($listuom as $row){ ?>
                                                  <option value="<?=$row->UOMCode;?>"><?=$row->Description . " (". $row->UOMCode .")";?></option>
                                               <?php }?>
                                            </select><span class="pull-right"><a style="cursor:pointer;color:#009688!important;" data-toggle="modal" data-target="#addUOM"><span class="glyphicon glyphicon-plus"></span> Add UOM</a></span>     
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label class="formlabel">Unit of measure (UOM):</label>
                                          </div> 
                                      </td>
                                  </tr>
                                 
                                  <tr>
                                      <td>
                                          <div class="group">
                                            <select class="inputMaterial" id="list-family">  
                                               <option value="" selected disabled="">Select one</option>
                                               <?php foreach($listfamily as $row){ ?>
                                                  <option value="<?=$row->id;?>"><?=$row->Name;?></option>
                                               <?php }?>
                                            </select>  
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label class="formlabel">Family:</label>
                                          </div>
                                      </td> 
                                  </tr>
                                  <tr>
                                      <td>
                                          <div class="group">
                                            <select class="inputMaterial" id="list-category"> 
                                               <option value="" selected disabled="">Select one</option> 
                                            </select>       
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label class="formlabel">Category:</label>
                                          </div>
                                      </td>  
                                  </tr>
                                  <tr>
                                      <td>
                                          <div class="group"> 
                                            <select class="inputMaterial" id="list-subcategory">  
                                               <option value="" selected disabled="">Select one</option>
                                            </select>      
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label class="formlabel">Subcategory:</label>
                                          </div>
                                      </td>  
                                  </tr>
                                   
                          </table>
                        
                      </div>
                      <div class="step-view col-md-12" data-view="item-variants">
                        <div class="col-md-5" style="background: white;    border: 1px solid #ddd;">
                          <div class="variant-wrap">
                             <!-- <label>Multiple items?</label> 
                              <div class="checkbox"> 
                                <label><input type="checkbox"  id="chkIsMultiple" value="">Create Attributes and Options</label>
                              </div>  -->
                              <div>
                              <span>Create Attribute and Options for the variant:</span>
                                 <table width="100%" id="table-attribute" class="display table-custom" > 
                                    <thead> 
                                        <tr>
                                            <td width="200px">Attribute</td>
                                            <td>Options</td>
                                            <td></td>
                                        </tr> 
                                    </thead>
                                    <tbody>
                                       
                                    </tbody>
                                    <tfoot>
                                      <tr>
                                          <td colspan="3">
                                              <span id="addattribute" class="pull-right"><span class="glyphicon glyphicon-plus"></span> Add more attribute</span>

                                          </td>
                                      </tr>
                                    </tfoot>
                                    
                                </table> 
                              </div> 
                              <!-- <button class="btn btn-action" id="btn-itemvariantgenerate">Generate Item with Variant</button>  -->
                            </div>
                        </div>
                        <div class="col-lg-7">
                           <button id="btn-itemvariantadd" class="btn btn-default pull-left" style="margin-bottom: 10px;"><span class="glyphicon glyphicon-plus"></span> Add items</button>

                          <table class="display main-table" data-table="listitemvariant" ></table> 
                        </div> 
                      </div>
                      <div class="step-view col-md-12" data-view="item-review">
                          <div class="col-md-12 item-review-wrap">
                            <div class="group"> 
                              <input type="text" class="inputMaterial display" id="lbl-itemname" readonly/>    
                              <span class="highlight"></span>
                              <span class="bar"></span>
                              <label class="formlabel display">Item Name:</label>
                            </div>
                             <div class="group"> 
                              <input type="text" class="inputMaterial display" id="lbl-uom" readonly/>    
                              <span class="highlight"></span>
                              <span class="bar"></span>
                              <label class="formlabel display">Unit of Measure (UOM):</label>
                            </div>
                             <div class="group"> 
                              <input type="text" class="inputMaterial display" id="lbl-category" readonly/>    
                              <span class="highlight"></span>
                              <span class="bar"></span>
                              <label class="formlabel display">Category:</label>
                            </div>
                          </div>
                         

                          <table class="display main-table" data-table="listitemvariantreview" ></table> 

                      </div>
                    </div>



                  </div>
    
              </div> 
               
          </div> 

          <div class="content-list" data-content="supremove-items">
            <div class="col-md-12"> 
                <table class="display main-table" data-table="supremove-items"> </table> 
 
            </div>
          </div>
         </div>
</div>




 
<!-- Modal -->
<!-- Attributes/Options setup -->
<div class="modal fade" id="attributesetup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="font-size: 20px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Create new Variants</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-5 image-variant-wrap" align="center">
            <div class="image-holder">
              <span class="glyphicon glyphicon-picture upload-file"></span> 
            </div>
            <button class="btn btn-action upload">Upload image</button> 
            <input type="file" class="file-upload" style="display: none;"  accept="image/x-png,image/gif,image/jpeg" >
          </div> 

          <div class="col-md-7">
            <table width="100%" id="table-attribute-setup" class="display table-custom" style="margin-top:10px;"> 
                <thead> 
                    <tr>
                        <td width="200px">Attribute</td>
                        <td>Options</td> 
                    </tr> 
                </thead>
                <tbody style="height:225px;">
                   
                </tbody>
                
            </table> 

          </div>

        </div>
         
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-action" id="btn-saveattributesetup">Save</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="editvariant" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="font-size: 20px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Variants</h4>
      </div>
      <div class="modal-body">
          <div class="row">
            <div class="col-md-4 image-variant">
              
            </div> 

             <div class="col-md-8">
                <label for="lbl-variant">Variant name:</label>
                <p id="lbl-variant" style="padding-bottom:25px;"></p>
                <div class="group">
                 <input class="inputMaterial numeric" type="text" id="txt-editDpocost">
                  <span class="highlight"></span>
                  <span class="bar"></span>
                  <label class="formlabel">DPO Cost:</label>
                </div> 

                <div class="group">      
                  <input class="inputMaterial numeric" type="text" id="txt-editSRP">
                  <span class="highlight"></span>
                  <span class="bar"></span>
                  <label class="formlabel">Suggested Retail Price (SRP):</label>
                </div> 
                <p class="label-error"></p>
            </div> 
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-action" id="btn-saveeditvariants">Save</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="addUOM" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add UOM</h4>
      </div>
      <div class="modal-body">
          <div class="uom-wrap">
            <div class="group">
              <input class="inputMaterial" type="text" id="txt-uomcode"/>
              <span class="highlight"></span>
              <span class="bar"></span>
              <label class="formlabel">UOM Code:</label>
            </div> 

            <div class="group">      
              <input class="inputMaterial" type="text" id="txt-uomdesc"/>
              <span class="highlight"></span>
              <span class="bar"></span>
              <label class="formlabel">Description:</label>
            </div> 
          </div> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-action" onclick="saveUOM();" id="btn-saveuom">Save</button>
      </div>
    </div>
  </div>
</div>

 

 
