 <div class="content-group show" data-group="request">
        <?php $this->load->view("dashboard");?>
        
        <div class="content-list" data-content="requestlist">
            <div class="col-md-12">
                <table class="display main-table" data-table="requestlist"> </table> 
            </div> 
         </div>
         <div class="content-list" data-content="sup-neworders">
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
         </div>

          <div class="content-list" data-content="sup-items">
            <div class="col-md-12">
                <button class="btn main-button btn-action btn-action-right" id="btn-additems"><span class="glyphicon glyphicon-plus"></span> Add Items</button>
             	  <div class="btn-group btn-child-group btn-group-mode btn-action-right">
                    <button id="btn-itemscancel" class="btn btn-default"><span class="glyphicon glyphicon-ban-circle"></span> Cancel</button>
                    <button id="btn-submititemvariant" class="btn btn-action"><span class="glyphicon glyphicon-ok-circle"></span> Submit</button>
                </div>
                <table class="display main-table" data-table="sup-items"> </table> 

                <div class="content-child">
                     <!-- <div>
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

                        </div> -->

                       <!--  <div class="col-lg-8"> 
                            <table class="display main-table" data-table="listitemvariant" ></table> 
                        </div>  -->
                      
                    </div>

                </div>
            </div>

            <div class="content-list" data-content="additems">
                <div class="col-md-12" style="font-size: 14px;">
                    <div class="btn-group main-button btn-group-mode btn-action-right">
                      <button id="btn-submititemvariant" class="btn btn-action"><span class="glyphicon glyphicon-ok-circle"></span> Save items</button>
                    </div> 
                    <div class="group-1">
                      <ul class="stepNav threeWide">
                        <li class="selected" data-view="item-info"><a href="#" title="">Information</a></li>
                        <li data-view="item-variants"><a href="#" title="" >Variants</a></li>
                        <li data-view="item-review"><a href="#" title="">Review</a></li>
                      </ul>
                      <div class="step-holder">
                        <div class="step-view col-md-12 show" data-view="item-info" align="center">
                            <table class="display form-table" width="500px">
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
                                   <table width="100%" id="table-attribute" class="display table-custom" style="margin-top:10px;"> 
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
                             <button id="btn-itemvariantadd" class="btn btn-default pull-right"><span class="glyphicon glyphicon-plus"></span> Add items</button>

                            <table class="display main-table" data-table="listitemvariant" ></table> 
                          </div> 
                        </div>
                        <div class="step-view col-md-12" data-view="item-review">
                            <table class="display main-table" data-table="listitemvariant-review" ></table> 

                        </div>
                      </div>

 

                    </div>
      
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
        <table width="100%" id="table-attribute-setup" class="display table-custom" style="margin-top:10px;"> 
            <thead> 
                <tr>
                    <td width="200px">Attribute</td>
                    <td>Options</td> 
                </tr> 
            </thead>
            <tbody>
               
            </tbody>
            
        </table> 
        <table>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-action" id="btn-saveattributesetup">Add</button>
      </div>
    </div>
  </div>
</div>