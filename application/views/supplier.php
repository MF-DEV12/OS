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

                        <div class="col-lg-8"> 
                            <table class="display main-table" data-table="listitemvariant" ></table> 
                        </div> 
                      
                    </div>

                </div>
            </div>

            <div class="content-list" data-content="additems">
                <div class="col-md-12">
                    <div class="btn-group main-button btn-group-mode btn-action-right">
                        <button id="btn-itemscancel" class="btn btn-default"><span class="glyphicon glyphicon-ban-circle"></span> Cancel</button>
                        <button id="btn-itemsadd" class="btn btn-action"><span class="glyphicon glyphicon-ok-circle"></span> Submit</button>
                    </div>
                    <div class="row group-1">

                        <div class="col-lg-12"> 
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
                                              <select class="inputMaterial" id="txt-family">  
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
                                              <select class="inputMaterial" id="txt-category">  
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
                                              <select class="inputMaterial" id="txt-subcategory">  
                                              </select>      
                                              <span class="highlight"></span>
                                              <span class="bar"></span>
                                              <label class="formlabel">Subcategory:</label>
                                            </div>
                                        </td>  
                                    </tr>
                                     
                                </table>
                        </div>
                    </div>
      
                </div> 
                 
            </div> 
         </div>
</div>