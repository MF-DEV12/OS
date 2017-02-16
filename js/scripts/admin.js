var listObjTableBinded = new Object();
var newItemVariantList = new Array();
$(function(){

	callAjaxJson("main/initializeAllData", new Object(), bindingDatatoDataTable, ajaxError)
    bindingDataChart();

// PURCHASE ORDER
    // Purchase Order
        $("#btn-addrequest").click(function(){
            var elem = $(this)
            toggleMainDisplay(false,elem,"Create Request") 
            $("#polistsupplier").find("option:first-child").prop("selected",true)

        
            var listposupplier = new Object()

            var arrList = new Object();
            arrList.list = "";
            arrList.fields = "Remove| ,ItemQty|Quantity,Item|Item No.,ItemDescription|Description,Price|Price,Total|Total"
            listposupplier["posubmit"] = arrList;

            arrList = new Object();
            arrList.list  = "";
            arrList.fields = "Action| ,ItemNo|Item No.,Description|Description,Price|Price"
            listposupplier["pobysupplier"] = arrList;

            arrList = new Object();
            arrList.list  = "";
            arrList.fields = "ItemNo|Item No.,ItemDescription|Description,STOCKS|Stocks,LOWSTOCKS|Low,CRITICAL|Critical"
            listposupplier["lowstockbysupplier"] = arrList;

            bindingDatatoDataTable(listposupplier)

            $("table[data-table=pobysupplier]").closest("div.dataTables_wrapper").find("div.dataTables_filter").show();

        })

        $('table[data-table="purchaseorder"]').on('click', 'tr[role=row] td:first-child', function () { 
            var elem = $(this)
            var tr = elem.closest('tr');
            var table = listObjTableBinded["purchaseorder"]
            var data = table.rows(tr).data()
            data = data[0]
            elem.find('span').attr('class','glyphicon glyphicon-menu-down pull-right')
            var row = table.row( tr );
            var trExists = $("table[data-table=purchaseorder] tr.shown")
            trExists.find('td:first-child').find('span').attr('class','glyphicon glyphicon-menu-right pull-right')
            var rowExists = table.row( trExists );
    
            if ( row.child.isShown() ) {
                row.child.hide();
                elem.find('span').attr('class','glyphicon glyphicon-menu-right pull-right')
                tr.removeClass('shown');
            }
            else{
                var param = new Object();
                param.sno = data.SupplyRequestNo

                callAjaxJson("main/GetSelectedOrderDetailsByPO", param, 
                    function(response){
                        var div = $("<div/>") 
                            div.attr("class","childtable-wrap") 
                        if(response["child-" +  data.SupplyRequestNo].list.length){ 
                        
                            var childtable = $("<table/>")
                            div.append("<h5 class=\"dash-header sub\">Order Item(s):</h5>")
                            childtable
                                .attr("id","child-"+data.SupplyRequestNo)
                                .attr("class","display")
                                .addClass("childtable")
                                .data("table","child-"+data.SupplyRequestNo)

                            bindingDataViewingOrderItems(response,childtable)
                            div.append(childtable)
                        }
                        else{
                            div.append("<h5>No item(s) found.</h5>")

                        }

                        if ( rowExists.child.isShown() ) {
                             rowExists.child.hide();
                             trExists.removeClass('shown');
                        }  
                        row.child(div).show();
                        tr.addClass("shown")

                    }, 
                ajaxError)  
            } 
        })

        $("#btn-pocancel, #btn-poreset").click(function(){
            var elem = $(this) 
            var table = listObjTableBinded["posubmit"]
            if(table.data().length > 0){
                 bootbox.confirm("Disregard this request?", function(result){
                    if(result){
                     
                        var data = table.rows().data();
                        var requestlistno = new Array();
                        for(x in data){
                            if($.isNumeric(x))
                                requestlistno.push(data[x].RequestListNo);
                            else
                                break;
                        }
                        var param = new Object()
                        param.rlno = requestlistno.join(',')
                        callAjaxJson("main/deleteAllRequestPO", param, function(response){
                            if(response){ 
                                if(elem.attr("id") == "btn-pocancel"){
                                    toggleMainDisplay(true,elem,"") 
                                    
                                }
                                else{
                                    table.clear().draw();
                                    // $("table[data-table='posubmit']").empty()
                                }
                               
                            }

                        }, ajaxError) 
                    } 
                 })
            }
            else{
                toggleMainDisplay(true,elem,"") 
                elem.closest(".btn-group").hide();
                elem.closest(".btn-group").prev().show(); 
            } 
        })

        $("#btn-posubmit").click(function(){
            var isOkay = true
            //VALIDATE THE QUANTITY INPUT
            $("input.poquantity").each(function(e){
                var elem = $(this)
                if($.trim(elem.val()).length == 0 || parseInt(elem.val()) == 0 ){
                    isOkay = false;
                    return;
                } 

            })

            if(isOkay){
                var table = listObjTableBinded["posubmit"]
                var data = table.rows().data();
                var requestlistno = new Array();
                for(x in data){
                    if($.isNumeric(x))
                        requestlistno.push(data[x].RequestListNo);
                    else
                        break;
                }
                var param = new Object()
                param.rlno = requestlistno.join(',')
                param.sno =  $("#polistsupplier").find("option:selected").val()
                callAjaxJson("main/submitPo", param, function(response){
                    if(response){
                        bindingDatatoDataTable(response);
                        table.clear().draw();
                         $("#btn-pocancel").click();
                        bootbox.alert("Transaction completed.",function(){})
                    }

                }, ajaxError)
                    
            }
            else{
                bootbox.alert("Please input the Quantity first.", function(){})

            }

        })

        $("#polistsupplier").change(function(e){
            var elem = $(this)
            var param = new Object()
            param.sid = elem.find("option:selected").val()
            if(param.sid != ""){
                callAjaxJson("main/getSupplierOrder", param, bindingDatatoDataTable, ajaxError)
            }
        })

    //Receivings
        $("#btn-directreceive").click(function(e){
            var elem = $(this)
            toggleMainDisplay(false,elem,"Select PO List to Receive")
            var listreceive = new Object()

            callAjaxJson("main/GetOrderToReceive", new Object(), bindingDatatoDataTable, ajaxError)
            
  
            arrList = new Object();
            arrList.list  = "";
            arrList.fields = "ItemNo|Item No.,ItemDescription|Description,Receive|Receive,Requested|Requested"
            listreceive["poreceivesubmit"] = arrList;
            
            bindingDatatoDataTable(listreceive)

        })

        $("#btn-receivecancel").click(function(e){
            var elem = $(this)
            toggleMainDisplay(true,elem,"")
        })



        $('table[data-table=porequest]').on( 'click', 'tr', function () {
            var elem = $(this)
            var table = listObjTableBinded["porequest"]
            
            var param = new Object();
            var data = table.rows(elem).data();
            param.sno = data[0].SupplyRequestNo; 
            callAjaxJson("main/GetSelectedOrderDetails", param, bindingDatatoDataTable, ajaxError)

            $("table[data-table='porequest'] tr.selected").removeClass("selected")
            elem.closest("tr").addClass("selected")


        })

        $("#btn-receivesubmit").click(function(e){
             var isOkay = true
             var isValid = true
            //VALIDATE THE RECEIVED INPUT\
            $("input.poreceived").closest("tr").find("p.label-error").remove();
            $("input.poreceived").each(function(e){
                var elem = $(this)
                if($.trim(elem.val()).length == 0 || parseInt(elem.val()) == 0 ){
                    elem.after("<p class=\"label-error\">Please input for the Received.</p>")
                    isOkay = false; 
                    return;
                }  
                var tr = elem.closest("tr")
                var porequest = parseInt(tr.find("td:last-child").text(),10)

                if(porequest < parseInt(elem.val(),10)){
                    elem.after("<p class=\"label-error\">Received must not be greater than the Requested.</p>")
                    isOkay = false; 
                    return;
                }

            })

            if(isOkay){
                var tr =  $("table[data-table='porequest'] tr.selected")
                var table = listObjTableBinded["porequest"];
                var tableSubmit = listObjTableBinded["poreceivesubmit"];
                var data = table.rows(tr).data()
                var param = new Object() 
                param.sno =  data[0].SupplyRequestNo; 
                callAjaxJson("main/submitPOReceived", param, function(response){
                    if(response){
                        bindingDatatoDataTable(response);
                        tableSubmit.clear().draw();
                         $("#btn-receivecancel").click();
                        bootbox.alert("Transaction completed.",function(){
                             updateNotification("receivings")
                        })
                    }

                }, ajaxError)
                    
            }
            
        })

    //Suppliers
        $("#btn-addsupplier").click(function(e){
            var elem = $(this)
            toggleMainDisplay(false,elem,"New")

            elem.closest(".content-list").find(".group-1").show()
            elem.closest(".content-list").find(".group-2").hide()
            $(".form-table").find("input").val("")


        })

        $("#btn-suppliercancel").click(function(e){
            var elem = $(this)
            toggleMainDisplay(true,elem,"")  

        })

        $("#btn-suppliersubmit").click(function(e){

            if(!validateData()){ return; }  
            if(!validateEmail()){return;}
            if(!validatePassword()){return;}

            var elem = $(this)
            var param = new Object();
            var supplier = new Object();
            var account = new Object();


            supplier.SupplierName = $("#txt-suppliername").val();
            supplier.ContactNo = $("#txt-contact").val();
            supplier.Address = $("#txt-address").val();
            supplier.Email = $("#txt-email").val();

            account.Username = $("#txt-username").val();
            account.Password = $("#txt-password").val();

            param.supplier = JSON.stringify(supplier);
            param.account = JSON.stringify(account);

            callAjaxJson("main/addSupplier", param, function(response){
                if(response.errormessage !== undefined){
                    $("#txt-confirmpassword").after("<p class='label label-danger label-error'>"+ response.errormessage +"</p>")

                }
                else{
                    toggleMainDisplay(true,elem,"") 
                    bindingDatatoDataTable(response);
                } 
            }, ajaxError)  
        })

        $("#btn-supplierback").click(function(e){
            var elem = $(this)
            $(".header-wrap").find("subheader").text("") 
            elem.closest(".content-list").find(".content-child").hide();
            elem.closest(".content-list").find(".main-table").closest(".dataTables_wrapper").show();
            elem.closest(".btn-group").hide();
            $("#btn-addsupplier").show()
        })


    //ORDERS
        $("select#polistorderstatus").change(function(){
            var elem = $(this)
            var param = new Object()
            param.status = elem.val();
            callAjaxJson("main/getOrdersJson", param, bindingDatatoDataTable, ajaxError)
        })

        $('table[data-table="allorders"]')
        .on('click', 'tr[role=row] td:first-child', function () { 
            var elem = $(this)
            var tr = elem.closest('tr');
            var tableelem = tr.closest("table.main-table")
            var table = listObjTableBinded[tableelem.attr("data-table")]
            var data = table.rows(tr).data()
            data = data[0]
            elem.find('span').attr('class','glyphicon glyphicon-menu-down pull-right')
            var row = table.row( tr );
            var trExists = tableelem.find("tr.shown")
            trExists.find('td:first-child').find('span').attr('class','glyphicon glyphicon-menu-right pull-right')
            var rowExists = table.row( trExists );
    
            if ( row.child.isShown() ) {
                row.child.hide();
                elem.find('span').attr('class','glyphicon glyphicon-menu-right pull-right')
                tr.removeClass('shown');
            }
            else{
                var param = new Object();
                param.orderno = data.OrderNo

                callAjaxJson("main/getOrderDetails", param, 
                    function(response){
                        var div = $("<div/>") 
                            div.attr("class","childtable-wrap") 
                        if(response["child-" +  data.OrderNo].list.length){ 
                        
                            var childtable = $("<table/>")
                            div.append("<h5 class=\"dash-header sub\">Order Item(s):</h5>")
                            childtable
                                .attr("id","child-"+data.OrderNo)
                                .attr("class","display")
                                .addClass("childtable")
                                .data("table","child-"+data.OrderNo)

                            bindingDatatoChildDataTable(response,childtable)
                            div.append(childtable)
                        }
                        else{
                            div.append("<h5>No item(s) found.</h5>")

                        }

                        if ( rowExists.child.isShown() ) {
                             rowExists.child.hide();
                             trExists.removeClass('shown');
                        }  
                        row.child(div).show();
                        tr.addClass("shown")

                    }, 
                ajaxError)  
            } 
        })

    //INVENTORY
        

        $(".dd-categories").on("click","dd",function(e){
            var elem = $(this)
            var dl = elem.closest("dl")
            dl.find("dd.selected").removeClass("selected")
            elem.addClass("selected")
            var param = new Object();
           
            if(dl.data("section") == "level1"){
                $("dl.list-categories").empty()
                $("dl.list-subcategories").empty()
                param.lvl1 = elem.data("id")
                callAjaxJson("main/getCategory", param, 
                    function(response){
                        var data = response
                        setupCategories($("dl.list-categories"),data) 
                    },  
                ajaxError)
            }
            else if(dl.data("section") == "level2"){
                $("dl.list-subcategories").empty()
                param.lvl1 = $("dl.list-family dd.selected").data("id")
                param.lvl2 = elem.data("id")
                callAjaxJson("main/getSubCategory", param, 
                    function(response){
                        var data = response
                        setupCategories($("dl.list-subcategories"),data) 
                    },  
                ajaxError)
            }
                

            

        })

        $("span.add").click(function(e){
            var elem = $(this)
            var ddparent = elem.closest("dd")
            var section = ddparent.find("h5")
            var dl = ddparent.find("dl.dd-categories")
            var lvl = dl.data("section").replace("level","");

            var param = new Object();
            param.lvl = lvl;

            if(lvl == "2"){
                param.Level1No = $("dl.categories-wrap > dd > dl.list-family > dd.selected").data("id");
                if(param.Level1No === undefined){
                    bootbox.alert("Please select family first to add.");
                    return
                }
            }
             if(lvl == "3"){
                param.Level1No = $("dl.categories-wrap > dd > dl.list-family > dd.selected").data("id");
                param.Level2No = $("dl.categories-wrap > dd > dl.list-categories > dd.selected").data("id");
                if(param.Level1No === undefined){
                    bootbox.alert("Please select family first to add.");
                    return
                }
                 if(param.Level2No === undefined){
                    bootbox.alert("Please select category first to add.");
                    return
                } 

            }

            var promptOptions = {
              title: "Enter a " + $.trim(section.text().replace("Add","")) + ":" ,
              value: "",
              buttons: {
                confirm: {
                  label: "Save",
                  className: "btn-prompt btn-action" 
                }
              },
              callback: function(result) {   
                  if (result) {       
                          param.name = result;
                           callAjaxJson("main/addCategory", param, 
                                function(response){
                                    var data = response
                                    if(!data.Error){
                                        setupCategories(dl ,data)  
                                    }
                                    else{ 
                                        bootbox.alert($.trim(section.text().replace("Add","")) +" -> \" "+ result +" \" already taken.");
                                    }
                                },  
                            ajaxError)                      
                  } else { 
                    $(".bootbox-input").focus()
                    return false;
                  }
                }
            };

            bootbox.prompt(promptOptions);
        })

        $(".dd-categories").on("click" ,"dd span a.edit", function(e){
            var elem = $(this)
            var dd = elem.closest("dd")
            var dl = dd.closest("dl")
            var currentvalue =  dd.find("span.data-edit").text()
            var ddparent  = dl.closest("dd")
            var section = ddparent.find("h5")
            var promptOptions = {
              title: "Enter a " + $.trim(section.text().replace("Add","")) + ":" ,
              value: currentvalue,
              buttons: {
                confirm: {
                  label: "Update", 
                  className: "btn-prompt btn-action"

                }
              },
              callback: function(result) {   
                  if (result) {      
                        var param = new Object();
                        param.id = dd.data("id");
                        param.name = result;
                        param.lvl = dl.data("section").replace("level","");
                        callAjaxJson("main/updateCategory", param, 
                            function(response){
                                if(response)
                                    dd.find("span.data-edit").text(result)

                            }, 
                        ajaxError)                              
                  } else { 
                     $(".bootbox-input").focus()
                     return false;

                  }
                }
            };

            bootbox.prompt(promptOptions);

        })

        $(".dd-categories").on("click" ,"dd span a.delete", function(e){
            var elem = $(this)
            var dd = elem.closest("dd")
            var dl = dd.closest("dl")
            var currentvalue =  elem.closest("dd").find("span.data-edit").text()
            var ddparent  = elem.closest("dd").closest("dl").closest("dd")
            var section = ddparent.find("h5")
            var note = "<br> Note:<br> ";
            note += "Removing this will remove all the categories under it.<br>";
            // note += "This Action cannot be undone.";
            bootbox.confirm("Delete selected " + $.trim(section.text().replace("Add","")) + " <b>\"" + currentvalue + " \"</b> ? <p style=\"font-size:10px;font-style: italic;\">"+ note +"</p>",function(result){
                if(result){
                    var param = new Object();
                    param.id = dd.data("id");
                    param.lvl = dl.data("section").replace("level","");
                    callAjaxJson("main/deleteCategory", param, 
                            function(response){
                                if(response)
                                    dd.remove();

                            }, 
                        ajaxError)  

                    
                }
            }) 

        })

         $('table[data-table="items"],table[data-table="removeditems"]').on('click', 'tr[role=row] td:first-child', function () { 
            var elem = $(this)
            var tr = elem.closest('tr');
            var table = listObjTableBinded[tr.closest("table").data("table")]
            var data = table.rows(tr).data()
            data = data[0]
            elem.find('span').attr('class','glyphicon glyphicon-menu-down pull-right')
            var row = table.row( tr );
            var trExists = $("table[data-table="+tr.closest("table").data("table")+"] tr.shown")
            trExists.find('td:first-child').find('span').attr('class','glyphicon glyphicon-menu-right pull-right')
            var rowExists = table.row( trExists );
    
            if ( row.child.isShown() ) {
                row.child.hide();
                elem.find('span').attr('class','glyphicon glyphicon-menu-right pull-right')
                tr.removeClass('shown');
            }
            else{
                var param = new Object();
                param.ino = data.ItemNo

                callAjaxJson("main/GetVariantsByItemNo", param, 
                    function(response){
                        var div = $("<div/>") 
                            div.attr("class","childtable-wrap") 
                        if(response["child-" +  data.ItemNo].list.length){ 
                        
                            var childtable = $("<table/>")
                            div.append("<h5 class=\"dash-header sub\">List of item variant(s):</h5>")
                            childtable
                                .attr("id","child-"+data.ItemNo)
                                .attr("class","display")
                                .addClass("childtable")
                                .data("table","child-"+data.ItemNo)

                            bindingDataViewingVariants(response,childtable)
                            div.append(childtable)
                        }
                        else{
                            div.append("<h5>No variants(s) found.</h5>")

                        }

                        if ( rowExists.child.isShown() ) {
                             rowExists.child.hide();
                             trExists.removeClass('shown');
                        }  
                        row.child(div).show();
                        tr.addClass("shown")

                    }, 
                ajaxError)  
            } 
        })
        $("button.btn-print").click(function(e){
            var elem = $(this)
            window.open(baseUrl + "main/" + elem.data("print"));
            //elem.closest("div.content-list").find("a.buttons-print").click();
        })

//SUPPLIER SIDE
        //REQUESTLIST
        $('table[data-table="requestlist"]').on('click', 'tr[role=row] td:first-child', function () { 
            var elem = $(this)
            var tr = elem.closest('tr');
            var table = listObjTableBinded["requestlist"]
            var data = table.rows(tr).data()
            data = data[0]
            elem.find('span').attr('class','glyphicon glyphicon-menu-down pull-right')
            var row = table.row( tr );
            var trExists = $("table[data-table=requestlist] tr.shown")
            trExists.find('td:first-child > span').attr('class','glyphicon glyphicon-menu-right pull-right')
            var rowExists = table.row( trExists );
    
            if ( row.child.isShown() ) {
                row.child.hide();
                elem.find('span').attr('class','glyphicon glyphicon-menu-right pull-right')
                tr.removeClass('shown');
            }
            else{
                var param = new Object();
                param.supreqno = data.SupplyRequestNo

                callAjaxJson("main/GetRequestItemBySupplyRequestNo", param, 
                    function(response){
                        var div = $("<div/>") 
                            div.attr("class","childtable-wrap") 
                        if(response["child-" +  data.SupplyRequestNo].list.length){ 
                        
                            var childtable = $("<table/>")
                            // div.append("<button class=\"btn btn-action pull-right btn-editvariants\" style=\"width:100px;\" onclick=\"editVariant('"+  data.ItemNo +"','"+ data.Name +"')\"><span class=\"glyphicon glyphicon-cog\"></span> Edit Variants</button>")
                            div.append("<h5 class=\"dash-header sub\">List of request item(s):</h5>")
                            childtable
                                .attr("id","child-"+data.SupplyRequestNo)
                                .attr("class","display")
                                .addClass("childtable")
                                .data("table","child-"+data.SupplyRequestNo) 
 
                            bindingDataViewingRequestItem(response,childtable)
                            div.append(childtable)
                        }
                        else{
                            div.append("<h5>No request items(s) found.</h5>")

                        }

                        if ( rowExists.child.isShown() ) {
                             rowExists.child.hide();
                             trExists.removeClass('shown');
                        }  
                        row.child(div).show();
                        tr.addClass("shown")

                    }, 
                ajaxError)  
            } 
        })

         $('table[data-table="pendingorders"]').on('click', 'tr[role=row] td:first-child', function () { 
            var elem = $(this)
            var tr = elem.closest('tr');
            var table = listObjTableBinded["pendingorders"]
            var data = table.rows(tr).data()
            data = data[0]
            elem.find('span').attr('class','glyphicon glyphicon-menu-down pull-right')
            var row = table.row( tr );
            var trExists = $("table[data-table=pendingorders] tr.shown")
            trExists.find('td:first-child > span').attr('class','glyphicon glyphicon-menu-right pull-right')
            var rowExists = table.row( trExists );
    
            if ( row.child.isShown() ) {
                row.child.hide();
                elem.find('span').attr('class','glyphicon glyphicon-menu-right pull-right')
                tr.removeClass('shown');
            }
            else{
                var param = new Object();
                param.supreqno = data.SupplyRequestNo

                callAjaxJson("main/GetPendingItemsBySupplyRequestNo", param, 
                    function(response){
                        var div = $("<div/>") 
                            div.attr("class","childtable-wrap") 
                        if(response["child-" +  data.SupplyRequestNo].list.length){ 
                        
                            var childtable = $("<table/>")
                            // div.append("<button class=\"btn btn-action pull-right btn-editvariants\" style=\"width:100px;\" onclick=\"editVariant('"+  data.ItemNo +"','"+ data.Name +"')\"><span class=\"glyphicon glyphicon-cog\"></span> Edit Variants</button>")
                            div.append("<h5 class=\"dash-header sub\">List of item(s):</h5>")
                            childtable
                                .attr("id","child-"+data.SupplyRequestNo)
                                .attr("class","display")
                                .addClass("childtable")
                                .data("table","child-"+data.SupplyRequestNo) 
 
                            bindingDataViewingPendingItems(response,childtable)
                            div.append(childtable)
                        }
                        else{
                            div.append("<h5>No request items(s) found.</h5>")

                        }

                        if ( rowExists.child.isShown() ) {
                             rowExists.child.hide();
                             trExists.removeClass('shown');
                        }  
                        row.child(div).show();
                        tr.addClass("shown")

                    }, 
                ajaxError)  
            } 
        })

        $("select#porequestlist").change(function(){
            var elem = $(this)
            var param = new Object()
            param.status = elem.val();
            callAjaxJson("main/getRequestListJson", param, bindingDatatoDataTable, ajaxError)
        })

        $("table[data-table=requestlist]").on("click", "tr td:last-child button.btn-deliver",function(){
            var elem = $(this)
            var tr = elem.closest("tr") 
            var table = listObjTableBinded["requestlist"]
            var data = table.rows(tr).data()


              callAjaxJson("main/validateApprovedQtyByPO", {"supreqno" : data[0].SupplyRequestNo}, 
                function(response){
                    if(response.result){
                            bootbox.confirm("Do you want to approve and deliver this request?", function(result){

                                if(result){
                                    var param = new Object()
                                    param.status = $("select#porequestlist option:selected").val()
                                    param.supreqno = data[0].SupplyRequestNo
                                        callAjaxJson("main/setDeliveredRequest", param, bindingDatatoDataTable, ajaxError)
                                } 
                            }) 
                             }
                    else{
                        bootbox.alert("Please check the items and make sure the Approved Qty has value.")
                    }

                }
                , ajaxError)
        })

        $("table[data-table=pendingorders]").on("click", "tr td:last-child button.btn-deliverpending",function(){
            var elem = $(this)
            var tr = elem.closest("tr")
            var table = listObjTableBinded["pendingorders"]
            var data = table.rows(tr).data()
 
            bootbox.confirm("Do you want to deliver this pending orders?", function(result){

                if(result){
                    var param = new Object()
                    param.status = $("select#porequestlist option:selected").val()
                    param.supreqno = data[0].SupplyRequestNo
                        callAjaxJson("main/setDeliveredPendingOrders", param, bindingDatatoDataTable, ajaxError)
                } 
            }) 

         
        })

        //ITEMS
        $('table[data-table="sup-items"],table[data-table="supremove-items"]').on('click', 'tr[role=row] td:first-child', function () { 
            var elem = $(this)
            var tr = elem.closest('tr');
            var table = listObjTableBinded[tr.closest("table").data("table")]
            var data = table.rows(tr).data()
            data = data[0]
            elem.find('span').attr('class','glyphicon glyphicon-menu-down pull-right')
            var row = table.row( tr );
            var trExists = $("table[data-table="+tr.closest("table").data("table")+"] tr.shown")
            trExists.find('td:first-child > span').attr('class','glyphicon glyphicon-menu-right pull-right')
            var rowExists = table.row( trExists );
    
            if ( row.child.isShown() ) {
                row.child.hide();
                elem.find('span').attr('class','glyphicon glyphicon-menu-right pull-right')
                tr.removeClass('shown');
            }
            else{
                var param = new Object();
                param.ino = data.ItemNo

                callAjaxJson("main/GetVariantsByItemNo", param, 
                    function(response){
                        var div = $("<div/>") 
                            div.attr("class","childtable-wrap") 
                        if(response["child-" +  data.ItemNo].list.length){ 
                        
                            var childtable = $("<table/>")
                            // div.append("<button class=\"btn btn-action pull-right btn-editvariants\" style=\"width:100px;\" onclick=\"editVariant('"+  data.ItemNo +"','"+ data.Name +"')\"><span class=\"glyphicon glyphicon-cog\"></span> Edit Variants</button>")
                            div.append("<h5 class=\"dash-header sub\">List of item variant(s):</h5>")
                            childtable
                                .attr("id","child-"+data.ItemNo)
                                .attr("class","display")
                                .addClass("childtable")
                                .data("table","child-"+data.ItemNo)

                            bindingDataViewingVariants(response,childtable)
                            div.append(childtable)
                        }
                        else{
                            div.append("<h5>No variants(s) found.</h5>")

                        }

                        if ( rowExists.child.isShown() ) {
                             rowExists.child.hide();
                             trExists.removeClass('shown');
                        }  
                        row.child(div).show();
                        tr.addClass("shown")

                    }, 
                ajaxError)  
            } 
        })

        $("button#btn-additems").click(function(e){
            $("div.sidebar ul.nav li[data-content=additems] a").click()
 
        })
        $("button#btn-backitems").click(function(e){
            $("div.sidebar ul.nav li[data-content=sup-items] a").click()
        })


        $("li[data-content='additems'] a").click(function(e){
 

            var param = new Object()
            param.isreq = 1;
            callAjaxJson("main/getAttribute", param, function(response){
                if(response){
                    $("#table-attribute tbody").children().remove()
                    var data = response
                    for(x in data){
                        var tr2 = $("<tr/>")
                        tr2.append("<td><input type=\"text\" class=\"form-control attribute-name\" value=\"" + data[x].AttributeName + "\"/></td>")
                        tr2.append("<td><input type=\"text\" name=\"option\" class=\"form-control tagsinput\" data-attribute=\""+ data[x].AttributeName + "\" data-role=\"tagsinput\" /></td>")
                        tr2.append("<td><a class=\"delete-attribute\"><span class=\"glyphicon glyphicon-remove\"></span></a></td>")
                        $("#table-attribute tbody").append(tr2)
                    }
                    $('input[data-role=tagsinput]').tagsinput();

                    

                    var arrList = new Object();
                    var list = new Object();
                    arrList.list  = "";
                    arrList.fields = "Image|Thumbnail,Attributes|Variant,SRP|Suggested Retail Price(SRP),DPOCost|DPO Cost(%),Price|Price,Action|";
                    list["listitemvariant"] = arrList;

                    bindingDatatoDataTable(list)
                    var table = listObjTableBinded["listitemvariant"]
                    table.draw()
                    $("li[data-view=item-info] a").click();

                }
                
            },ajaxError)


        })

        $("span#addattribute").click(function(){
             var promptOptions = {
              title: "Enter a new attribute name:",
              buttons: {
                confirm: {
                  label: "Save", 
                  className: "btn-prompt btn-action"
                }
              },
              callback: function(result) {                
                  if (result) {          
                     $("#table-attribute tbody p.empty").remove()
                    var tr2 = $("<tr/>")
                    tr2.append("<td><input type=\"text\" class=\"form-control attribute-name\" value=\"" + result + "\"/></td>")
                    tr2.append("<td><input type=\"text\" name=\"option\" class=\"form-control tagsinput\" data-attribute=\""+ result + "\" data-role=\"tagsinput\" /></td>")
                    tr2.append("<td><a class=\"delete-attribute\">&times;</a></td>")
                    $("#table-attribute tbody").append(tr2)   
                     $("#table-attribute tbody").find("tr:last-child").find("input[data-role=tagsinput]").tagsinput();                             
                    //  var param = new Object();
                    // param.vno = variantno;
                    // param.qty = result;
                    // callAjaxJson("main/physicalCount", param, 
                    //     function(response){

                    //          bindingDatatoDataTable(response);
                    //          bootbox.alert("Update Successfully");

                    //     }, 
                    // ajaxError)                              
                  } else { 
                     $(".bootbox-input").focus()
                     return false;
                  }
                }
            };

            bootbox.prompt(promptOptions); 
        })

        $("#table-attribute tbody").on("click", "td a.delete-attribute",function(e){
            var elem = $(this)
            var tr = elem.closest("tr")
            bootbox.confirm("Delete this attribute \" "+ tr.find("input.attribute-name").val() +"\"?",function(result){
                if(result){
                    tr.remove();
                    if(!$("#table-attribute tbody").children().length){
                        $("#table-attribute tbody").append("<p class=\"empty\">No Attrbutes and Options found. <br/> Click Add attribute to add.</p>") 
                    }

                }

            })
        })

        $("select#list-family").change(function(e){
            var elem = $(this)
            var param = new Object()
            param.lvl1 = elem.val();
            callAjaxJson("main/getCategory", param, 
                function(response){
                    $("select#list-category").empty();
                    $("select#list-subcategory").empty();
                    $("select#list-category").append("<option value=\"\" selected disabled>Select one</option>")
                    $("select#list-subcategory").append("<option value=\"\" selected disabled>Select one</option>")
                                                 

                    var data = response
                    for(x in data){
                        var option = $("<option/>")
                        option.text(data[x].Name)
                        option.attr("value",data[x].id)
                         $("select#list-category").append(option)
                    }

                }
                , ajaxError)
        })

        $("select#list-category").change(function(e){
            var elem = $(this)
            var param = new Object()
            param.lvl1 = $("select#list-family option:selected").val()
            param.lvl2 = elem.val();
            callAjaxJson("main/getSubCategory", param, 
                function(response){
                    $("select#list-subcategory").empty();
                    $("select#list-subcategory").append("<option value=\"\" selected disabled>Select one</option>")
                    var data = response
                    for(x in data){
                        var option = $("<option/>")
                        option.text(data[x].Name)
                        option.attr("value",data[x].id)
                         $("select#list-subcategory").append(option)
                    }

                }
                , ajaxError)
        })

        $("button#btn-itemvariantadd").click(function(e){
            var arrList = new Object();
            var list = new Object();
            var arrayData = new Array();

            if($.trim($("#txt-itemname").val()).length == 0){
                bootbox.alert("Please input the Item Name first");
                $("#txt-itemname").focus()
                return;
            }

            if($("table[data-table=listitemvariant] td span.label-error").length > 0){
                //bootbox.alert("Invalid DPO Cost and SRP on the variants."); 
                return;
            }


            var data = new Object();
            data.Image = ""
            data.Attributes = "<a class=\"attribute-setup-show\" data-toggle=\"modal\" data-backdrop=\"static\"  data-keyboard=\"false\" data-target=\"#attributesetup\"><span class=\"glyphicon glyphicon-cog\"></span> Add variants</a>";
            data.DPOCost = "<input class=\"variant-dpocost form-control\" type=\"number\" min=\"1\" max=\"100\" onblur=\"dpoPercent(this);\"/>";
            data.SRP = "<input type=\"text\" class=\"numeric variant-srp form-control\"/>";
            data.Price = "<span class=\"variant-price\">&#8369; <span>0.00</span></span>";
            data.Action = "<a onclick=\"deleteVariant(this);\"><span class=\"glyphicon glyphicon-remove\"></span></a>";
             
            arrayData.push(data)
            arrList.list  = arrayData; 
            arrList.fields = "Image|Thumbnail,Attributes|Variant,SRP|Suggested Retail Price(SRP),DPOCost|DPO Cost(%),Price|Price,Action|";

            var table = listObjTableBinded["listitemvariant"]
            table.row.add(data).draw()
            table.draw()
            $("table[data-table=listitemvariant] tr:last-child").find("input.numeric").maskMoney();
            // list["listitemvariant"] = arrList;

            // bindingDatatoDataTable(list)
        })
        



 
        var curtrvariant;
        $("table[data-table='listitemvariant']").on("click", "tbody tr td a.attribute-setup-show", function(e){
            var elem = $(this)
            var tr = elem.closest("tr")
            $("#table-attribute-setup").next("p.label-error").remove()
            var listAttributeJSON = tr.attr("data-variant")
            if(listAttributeJSON !== undefined)
                listAttributeJSON = JSON.parse(listAttributeJSON);
            curtrvariant = tr
            var table =  $("#table-attribute-setup")
            $("#table-attribute-setup tbody").empty()
            $("input.attribute-name").each(function(e){
                var attrname = $(this)
                var tr2 = $("<tr/>")
                tr2.append("<td width=\"29px\">"+ attrname.val() +"</td>")

                var optionlist = attrname.closest("tr").find("input.tagsinput").tagsinput('items') 

                var select = $("<select/>") 
                select.addClass("listoptions")
                select.addClass("form-control")

                select.append("<option value=\"\" selected disabled>Select one</option>")
                for(x in optionlist){
                    var option = $("<option/>")
                    option.text(optionlist[x])
                    option.attr("value",optionlist[x])
                     if(listAttributeJSON !== undefined){
                        if(optionlist[x] == listAttributeJSON[attrname.val()])
                            option.prop("selected",true)
                     }
                    
                    select.append(option)
                }
               
                var td = $('<td/>')
                td.append(select)
                tr2.append(td)
                $("#table-attribute-setup tbody").append(tr2)   

                // 

            })
            if(!tr.find("td:first-child img").length)
                $("div.image-holder").html("<span class=\"glyphicon glyphicon-picture upload-file\"></span>")
            else{
                var img = tr.find("td:first-child img").clone()
                img.attr("width","200px")
                $("div.image-holder").html(img)
            }
        })

        $("button#btn-saveattributesetup").click(function(e){
            var stringAttribute = "";
            var stringJson = new Object();

            if(!isOkayToSaveAttribute()){return}

            $("#table-attribute-setup tbody tr").each(function(a){
                var elem = $(this)
                stringJson[elem.find("td:first").text()] = elem.find("select.listoptions option:selected").text();
                stringAttribute += elem.find("td:first").text() + " = "
                stringAttribute += elem.find("select.listoptions option:selected").text() + "; <br>"

            })
            stringAttribute += "<a class=\"attribute-setup-show\" data-toggle=\"modal\" data-target=\"#attributesetup\"><span class=\"glyphicon glyphicon-cog\"></span> Edit variants</a>";
           

            var img = $("div.image-holder img").clone()


            img.attr("width","100px")
            curtrvariant.closest("tr").find("td:nth-child(1)").html(img)
            curtrvariant.closest("tr").find("td:nth-child(2)").html(stringAttribute)
            curtrvariant.closest("tr").attr("data-variant", JSON.stringify(stringJson))

            $("div#attributesetup").find("input[type=file]").val("")
    
            $("div#attributesetup").modal("hide");
        })

        $("button#btn-submititemvariant").click(function(e){
            var elem = $(this)
            if(elem.hasClass("disabled")){ return;}
            var param = new Object()
            param.itemname = $("input#txt-itemname").val()
            param.UOM = $("select#list-uom option:selected").val()
            param.family = $("select#list-family option:selected").val()
            param.category = $("select#list-category option:selected").val()
            param.subcategory = $("select#list-subcategory option:selected").val()
            param.data = JSON.stringify(newItemVariantList)

             callAjaxJson("main/insertNewItemWithVariants", param, 
                function(response){
                   if(response){
                        $("div.sidebar ul.nav li[data-content=sup-items] a").click()
                        bootbox.alert("New item has been created successfully.")
                   }

                }
                , ajaxError) 

        })

        $("button#btn-saveeditvariants").click(function(e){
            if(!isOkaytoUpdateVariants()){return;}
            var variant = new Object()
            var param = new Object()
            variant.DPOCost = toMoneyValue($("input#txt-editDpocost").val())
            variant.SRP = toMoneyValue($("input#txt-editSRP").val())

            param.vno = curVariantNoEdit;
            param.data = JSON.stringify(variant);

            callAjaxJson("main/UpdateVariant", param, 
                function(response){
                    if(response){
                        var modal =  $("#editvariant")
                        curTRVariantNoEdit.childNodes[3].innerHTML = modal.find("input#txt-editDpocost").val()
                        curTRVariantNoEdit.childNodes[4].innerHTML = modal.find("input#txt-editSRP").val()
                       
                        $("#editvariant").modal("hide")
                    }
                },
            ajaxError)
        })

        $("button#btn-saveeditvariantsadmin").click(function(e){
            if(!isOkaytoUpdateVariantsAdmin()){return;}
            var variant = new Object()
            var param = new Object()
            variant.Price = toMoneyValue($("input#txt-editPriceAdmin").val())
            variant.LowStock = toMoneyValue($("input#txt-editLowstockAdmin").val())
            variant.Critical = toMoneyValue($("input#txt-editCriticalAdmin").val())
            variant.Owned = 1

            param.vno = curVariantNoEditAdmin;
            param.data = JSON.stringify(variant);

            callAjaxJson("main/UpdateVariant", param, 
                function(response){
                    if(response){
                        var modal =  $("#editvariantadmin")
                        curTRVariantNoEditAdmin.childNodes[5].innerHTML = modal.find("input#txt-editPriceAdmin").val()
                        curTRVariantNoEditAdmin.childNodes[6].innerHTML = modal.find("input#txt-editLowstockAdmin").val()
                        curTRVariantNoEditAdmin.childNodes[7].innerHTML = modal.find("input#txt-editCriticalAdmin").val()
                        updateNotification("items");
                        $("#editvariantadmin").modal("hide")
                    }
                },
            ajaxError)
        })


        $("input#txt-itemname").keyup(function(e){
            var elem = $(this)
 
            var param = new Object()
            param.iname = elem.val(); 
            callAjaxJson("main/checkItemNameExistsBySupplier", param, 
                function(exist){
                    elem.closest("table.form-table").find("p.label-error").remove()
                    if(exist == 1){
                        $("div.step-holder > div.step-view[data-view=item-info]").find("table.form-table tbody").before("<p class=\"label-error\">Item name \" " + param.iname + "\" already exist.</p>")
                    }    
            },ajaxError,false) 
        })

        $("select.inputMaterial").change(function(e){
            var elem = $(this)
            if(elem.closest("table.form-table").find("p.label-error").text().indexOf("already exist") == -1)
                elem.closest("table.form-table").find("p.label-error").remove()
            
           
        })


        $("table[data-table=listitemvariant]").on("blur", "td input.variant-srp, td input.variant-dpocost",function(e){
            $("table[data-table=listitemvariant]").find("span.label-error").remove()
            var elem = $(this)
            var tr = elem.closest("tr")
            var dpo = tr.find("input.variant-dpocost")
            var srp = tr.find("input.variant-srp")
             if($.trim(dpo.val()).length > 0 && $.trim(srp.val()).length > 0){
                var dpoValue = (toMoneyValue(dpo.val()) > 100) ? 100 :  toMoneyValue(dpo.val())
                var srpValue = toMoneyValue(srp.val()) 
                var computePrice = srpValue * parseFloat((dpoValue/100),2)
                tr.find("span.variant-price span").text(toMoney(parseFloat(computePrice,2)))
                //if(parseFloat(dpoValue,10) >= parseFloat(srpValue,10)){
                //   srp.after("<span class=\"label-error\">DPO Cost must be lower than to SRP.</span>") 
                    
                //}  
            } 
            
        })

        $("#btn-submitShipOrder").click(function(e){
            var modal = $("#shipOrderModal")
            var orderno = modal.data("orderno")
            var deliverno = $("#listDeliverName option:selected").val();
            setStatusOrder(orderno,"Ship", deliverno); 
            modal.modal("hide")
        })  




})

// PURCHASE ORDER
    // Purchase order
    function addtoPo(itemno, variantno){
        var param = new Object();
        param.ino = itemno;
        param.vno = variantno; 
        param.sno = $("#polistsupplier").find("option:selected").val();
        callAjaxJson("main/addToPO", param, bindingDatatoDataTable, ajaxError)

    }
    function removePO(requestlistno, elem){
        var tr = elem.closest("tr")
        var param = new Object();
        param.rlno = requestlistno;
        callAjaxJson("main/deletePO", param, 
            function(response){
                if(response){
                   var posubmittable = listObjTableBinded["posubmit"] 
                   posubmittable.row(tr).remove().draw();
                }

            }
        , ajaxError)

    }

    function updatePOQty(requestlistno,elem){
        elem  = $(elem)
        var tr = elem.closest("tr");

        var table = listObjTableBinded["posubmit"]
        var data = table.rows(tr).data()
        data = data[0]
        var param = new Object();
        param.rlno = requestlistno;
        param.qty = elem.val();
        param.total = parseFloat(elem.val(),2) * parseFloat(toMoneyValue(data.Price), 2)
        callAjaxJson("main/updatePOQty", param,  
            function(response){
                if(response){
                   data.Total = toMoney(param.total); 
                   table.draw()
                   tr.find("td:last-child").text(data.Total)
                   bindingPOTotalAfterUpdate()

                }

            }
        , ajaxError) 
    }
    function bindingPOTotalAfterUpdate(){
        var table = $("table[data-table=posubmit]")
        var total = 0.00
        table.find("tbody").find("td:last-child").each(function(e){
            var elem = $(this)
            total += parseFloat(toMoneyValue(elem.text()),10)
        })
        
        $("totalpo").text(toMoney(total))
        
     }

    // Receivings
     function updatePOReceived(requestlistno,elem){

        if(!validateReceived(elem)){return;}
        var param = new Object();
        param.rlno = requestlistno;
        param.rec = elem.value;
        callAjaxJson("main/updatePOReceived", param, 
            function(response){
                if(response){
                   
                }

            }
        , ajaxError) 
    }

    function validateReceived(elem){
        var tr = elem.closest("tr")
       
        elem = $(elem)
        tr = $(tr)
        tr.find("p.label-error").remove()
        var table = listObjTableBinded["poreceivesubmit"]
        var data = table.rows(tr).data();
        var porequest =  parseInt(data[0].Approved,10) //parseInt(tr.find("td:last-child").text(),10)
        var poreceived =  parseInt(elem.val(),10)


        if(porequest < poreceived){
                     
            elem.after("<p class=\"label-error\">Received must not be greater than the Approved.</p>")
            return false
        }
        return true;

       
    }

    function insertAfter(referenceNode, newNode) {
        referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
    }

    //Suppliers
     function validateData(){
        $(".form-table").find("p.label-error").remove()
        var isOkay = true
        $(".form-table").find("input").each(function(e){
            var elem = $(this)
            if($.trim(elem.val()).length == 0){
                isOkay = false;
            }

        })
        if(!isOkay)
            $(".form-table tr:first-child").before("<p class='label-error'>Please input all required field(*).</p>")

       
        return isOkay;
     }
     function validatePassword(){

        if($.trim($("#txt-password").val()).length < 8 && $.trim($("#txt-confirmpassword").val()).length < 8 ){
           $(".form-table tr:first-child").before("<p class='label-error'>Password must be atleast 8 characters.</p>")
            return false;
        }

        if($("#txt-password").val() != $("#txt-confirmpassword").val()){
            $(".form-table tr:first-child").before("<p class='label-error'>Password does not match the confirm password.</p>")
           return false;
        }
        return true;
     }
     function validateEmail() {
        var email = $("#txt-email").val()
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        
        if(!re.test(email)){
             $(".form-table tr:first-child").before("<p class='label-error'>Email is not valid.</p>")
             return false;
        }

        return true;
     }
     function viewSupplyItems(sno,elem){
        var row = elem.closest("tr")
        var table = listObjTableBinded["suppliers"]
        var data = table.rows(row).data();
        data = data[0]
        var param = new Object();
        param.sno = sno;
        callAjaxJson("main/GetSupplyItemsBySupplier", param, function(response){
            var elem = $("table[data-table=suppliers]");
            $(".header-wrap").find("subheader").text(" - Information") 
            elem.closest(".content-list").find(".content-child").show();
            elem.closest(".content-list").find(".main-table").closest(".dataTables_wrapper").hide();
            //elem.hide();
            $("#btn-addsupplier").hide()
            $("#btn-supplierback").closest("div.btn-group").show()
            //toggleMainDisplay(false,elem,"Supplier information") 
            elem.closest(".content-list").find(".group-1").hide()
            elem.closest(".content-list").find(".group-2").show() 
            $("#label-suppliername").text(data.SupplierName)
            $("#label-address").text(data.Address)
            $("#label-contact").text(data.ContactNo)
            $("#label-email").text(data.Email)
            bindingDatatoDataTable(response);


        }, ajaxError)
     }
// INVENTORY 
    function physicalCount(variantno, ItemDescription){
        var promptOptions = {
          title: "Please enter the stock count for this item: <br/> <br/>" + ItemDescription ,
          inputType: 'number',
          buttons: { 
            confirm: {
              label: "Update", 
              className: "btn-prompt btn-action"
            }
          },
          callback: function(result) {                
              if (result) {                                             
                 var param = new Object();
                param.vno = variantno;
                param.qty = result;
                callAjaxJson("main/physicalCount", param, 
                    function(response){

                         bindingDatatoDataTable(response);
                         bootbox.alert("Update Successfully");
                         updateNotification("lowstocks");

                    }, 
                ajaxError)                              
              } else { 
                 $(".bootbox-input").focus()
                 return false;
              }
            }
        };

        bootbox.prompt(promptOptions); 
    }

    function setupCategories(dl,data){
        dl.empty();
        for(x in data){
            var dd = $("<dd/>");

            if(!dl.is(".list-family")){
                dd.append("<span class=\"data-edit\" >"+ data[x].Name +"</span>")
                // dd.append("<span class=\"glyphicon glyphicon-menu-right pull-right selector\"></span>")
                dd.append("<span class=\"action pull-right\"><a class=\"edit\">Edit</a> | <a class=\"delete\">Delete</a></span>")
                dd.data("id",data[x].id) 
                dl.append(dd);
            }
            else{
                var divrow = $("<div/>");
                var div7 = $("<div/>");
                var div5 = $("<div/>");

                divrow.addClass("row")
                div5.addClass("col-sm-5")
                div5.attr("align","center")
                div7.addClass("col-sm-7")


                div5.append("<div class=\"image-holder\"><img src=\"" + baseUrl + "images/"+ ((data[x].ImageFile != null) ? "variant-folder/" + data[x].ImageFile : "noimage.gif" ) +"\" onerror=\"this.src='"+ baseUrl  +"/images/noimage.gif';\"/></div>")
                div5.append("<button class=\"btn btn-action upload\">Upload image</button> <input type=\"file\" data-col=\"Level1No\" data-id=\""+ data[x].id +"\" data-table=\"Level1\" class=\"file-upload\" style=\"display: none;\">")


                div7.append("<span class=\"data-edit\" >"+ data[x].Name +"</span>")
                div7.append("<span class=\"action pull-right\"><a class=\"edit\">Edit</a> | <a class=\"delete\">Delete</a></span>")
                dd.data("id",data[x].id) 
                divrow.append(div5)
                divrow.append(div7)
                dd.append(divrow)
                 dl.append(dd);
            }
           
        }
        if(!data.length){
            dl.append("<p class=\"empty\">No record(s) found</p>");

        } 
    }

    function removeOrRecoverItem(itemno, itemname,elem, status){
        var tr = elem.closest("tr")
        var table = listObjTableBinded[tr.closest("table").getAttribute("data-table")]
        var strAlert = (status == 1) ? "Delete selected item" : "Recover selected item";
        bootbox.confirm( strAlert + " \"" + itemname + "\" ?",function(result){
            if(result){
                var param = new Object()
                param.itemno = itemno
                param.status = status
                callAjaxJson("main/removeOrRecoverItem",param,
                    function(response){
                        if(response){ 
                            table.row(tr).remove().draw() 
                        }


                    },ajaxError)
            }

        })
    }

    function addItemVariant(itemNo,elem){
        var tr = elem.closest("tr")
        var tableelem = tr.closest(".content-list").find(".main-table")
        // console.log(tableelem.length)
        var table = listObjTableBinded[tableelem.attr("data-table")]
        var data = table.rows(tr).data()
        data = data[0]

        $(".header-wrap").find("subheader").text(" - Add Item Variant for Item: " + data.Name) 
        tableelem.closest(".content-list").find(".content-child").show();
        tableelem.closest(".content-list").find(".main-table").closest(".dataTables_wrapper").hide(); 
        tableelem.closest(".content-list").find("div.btn-group").show()

       

        var param = new Object()
        param.isreq = 1;
        callAjaxJson("main/getAttribute", param, function(response){
            if(response){
                $("#table-attribute tbody").children().remove()
                var data = response
                for(x in data){
                    var tr2 = $("<tr/>")
                    tr2.append("<td>" + data[x].AttributeName + "</td>")
                    tr2.append("<td><input type=\"text\" name=\"option\" class=\"form-control tagsinput\" data-attribute=\""+ data[x].AttributeName + "\" data-role=\"tagsinput\" placeholder=\"Type here and Press Enter\"/></td>")
                    tr2.append("<td><a>&times;</a></td>")
                    
                    $("#table-attribute tbody").append(tr2)
                }
                $('input[data-role=tagsinput]').tagsinput();

                $(".header-wrap").find("subheader").text(" - Add Item Variant for Item: " + data.Name) 
                tableelem.closest(".content-list").find(".content-child").show();
                tableelem.closest(".content-list").find(".main-table").closest(".dataTables_wrapper").hide(); 
                tableelem.closest(".content-list").find("div.btn-group").show()

                var arrList = new Object();
                var list = new Object();
                arrList.list  = "";
                arrList.fields = "Image|Thumbnail,Attributes|Variant,DPOCost|DPO Cost,SRP|Suggested Retail Price(SRP),Action|";
                list["listitemvariant"] = arrList;

                bindingDatatoDataTable(list)

            }
            
        },ajaxError)

    }
    function bindDataItemVariantForReview(){ 
        var data = new Array();
        $("table[data-table=listitemvariant] tbody tr").each(function(e){

            var tr = $(this)
            var row = new Object()
            row.FileName = tr.find("img").data("image")
            row.Image = "<img src=\""+ baseUrl +"images/variant-folder/" + row.FileName + "\" width=\"100px\"/>"
            row.VariantsName = jsontoString(tr.data("variant"))     
            row.VariantsNameJSON = tr.data("variant") 
            row.DPOCost =  toMoneyValue(tr.find("input.variant-dpocost").val())        
            row.DPOCostStr =  tr.find("input.variant-dpocost").val()      
            row.SRP = toMoneyValue(tr.find("input.variant-srp").val())       
            row.SRPStr = tr.find("input.variant-srp").val()      
            row.Price = toMoneyValue(tr.find("span.variant-price span").text())
            data.push(row) 

        })
        var arrList = new Object();
        var list = new Object();
        newItemVariantList = data    
        arrList.list  = data; 
        arrList.fields = "Image|Thumbnail,VariantsName|Item Variant,SRPStr|Suggessted Retail Price (SRP),DPOCostStr|DPO Cost(%),Price|Price"

        list["listitemvariantreview"] = arrList;
        bindingDatatoDataTable(list)
        $("table[data-table='listitemvariantreview']").closest("div.dataTables_wrapper").find("div.dataTables_filter").hide() 
    }

    function jsontoString(data){
        var list = "" 
        for(x in data){
            list += x + " = " + data[x] + "<br/>"
        }
        return list;
    }

    function isOkayToSaveAttribute(){
        var isOkay = true
        $("#table-attribute-setup").next("p.label-error").remove()
        $("#table-attribute-setup tbody tr").each(function(a){
            var elem = $(this)
            if(elem.find("select.listoptions option:selected").val() == "")
                isOkay = false; 
        })

        if(!isOkay){
            $("#table-attribute-setup").after("<p class=\"label-error\">Please select the attribute for the variant</p>") 
            return isOkay 
        }


        if(!$("div.image-holder img").length){
            $("#table-attribute-setup").after("<p class=\"label-error\">You must upload an image for this variant.</p>") 
            isOkay = false
        }

        return isOkay 
    }


    var curVariantNoEdit;
    var curTRVariantNoEdit;
    function editVariant(childtable,elem){
        
        var tr = elem.closest("tr")


        var modal = $("#editvariant")
        curVariantNoEdit = tr.childNodes[0].innerHTML
        curTRVariantNoEdit = tr
  
        modal.find("div.image-variant").html(tr.childNodes[1].innerHTML)
        modal.find("p#lbl-variant").html(tr.childNodes[2].innerHTML)
        modal.find("input#txt-editDpocost").val(tr.childNodes[3].innerHTML)
        modal.find("input#txt-editSRP").val(tr.childNodes[4].innerHTML)
    }

    var curVariantNoEditAdmin;
    var curTRVariantNoEditAdmin;
    function editVariantAdmin(childtable,elem){
        
        var tr = elem.closest("tr")


        var modal = $("div#editvariantadmin")
        curVariantNoEditAdmin = tr.childNodes[0].innerHTML
        curTRVariantNoEditAdmin = tr
  
        modal.find("div.image-variant").html(tr.childNodes[1].innerHTML)
        modal.find("p#lbl-variant").html(tr.childNodes[2].innerHTML)
        modal.find("p#lbl-srp span").html(tr.childNodes[4].innerHTML)
        modal.find("input#txt-editPriceAdmin").val(tr.childNodes[5].innerHTML) 
        modal.find("input#txt-editLowstockAdmin").val(tr.childNodes[6].innerHTML) 
        modal.find("input#txt-editCriticalAdmin").val(tr.childNodes[7].innerHTML) 
    }

    function deleteVariant(elem){
        var tr = elem.closest("tr")
        bootbox.confirm("Delete selected variant?", function(result){
            if(result){
                var table = listObjTableBinded["listitemvariant"]
                table.row(tr).remove().draw()
                tr.remove()
            }
        })
    }



    function isOkaytoUpdateVariants(){
        $("div#editvariant").find("p.label-error").text("")
        var isOkay = true;
        if($.trim($("input#txt-editDpocost")).length == 0 || $("input#txt-editDpocost").val() == "0"){
            isOkay = false
        }
        if($.trim($("input#txt-editSRP")).length == 0 || $("input#txt-editSRP").val() == "0"){
            isOkay = false
        }

        if(!isOkay){ 
            $("div#editvariant").find("p.label-error").text("Please input all fields.")
            return isOkay   
        }

        if(parseFloat(toMoneyValue($("input#txt-editDpocost").val()),10) >= parseFloat(toMoneyValue($("input#txt-editSRP").val()),10)){
            $("div#editvariant").find("p.label-error").text("Suggested Retail Price(SRP) must be greater than DPO Cost.")
            isOkay = false
        }



        return isOkay;
    }
    function isOkaytoUpdateVariantsAdmin(){
        $("div#editvariantadmin").find("p.label-error").text("")
        var isOkay = true;
        if($.trim($("input#txt-editPriceAdmin")).length == 0 || $("input#txt-editPriceAdmin").val() == "0"){
            isOkay = false
        }
        if($.trim($("input#txt-editLowstockAdmin")).length == 0 || $("input#txt-editLowstockAdmin").val() == "0"){
            isOkay = false
        }
        if($.trim($("input#txt-editCriticalAdmin")).length == 0 || $("input#txt-editCriticalAdmin").val() == "0"){
            isOkay = false
        }
        if(!isOkay){
            $("div#editvariantadmin").find("p.label-error").text("Please input all required field(s).")
            return isOkay;
        }

        var currentSRPStr = $("p#lbl-srp span").text();
        var currentSRP = toMoneyValue(currentSRPStr);
        var inputPrice = toMoneyValue($("input#txt-editPriceAdmin").val());

        // if(parseFloat(currentSRP,10) > parseInt(inputPrice,10)){
        //     $("div#editvariantadmin").find("p.label-error").text("The Unit price must be greater than the SRP -> " + currentSRPStr + " "); 
        //     isOkay = false
        //     return isOkay;
        // }

        if(parseInt($("input#txt-editCriticalAdmin").val(),10) > parseInt($("input#txt-editLowstockAdmin").val(),10)){
            $("div#editvariantadmin").find("p.label-error").text("Low Stock Level must be greater than the Critical.");
            isOkay = false
        }
 
        return isOkay;
    }

    function saveUOM(){
        if(!isOkaytoAddUOM()){return;}

        var param = new Object()
        param.UOMCode = $("input#txt-uomcode").val()
        param.Description = $("input#txt-uomdesc").val()

        callAjaxJson("main/addUOM", {data:JSON.stringify(param)},
                function(response){
                    if(response){
                        $("div#addUOM").modal("hide");
                        $("div#addUOM input.inputMaterial").val("")
                        var option = $("<option/>")
                        option
                            .attr("value", param.UOMCode)
                            .text(param.Description + " ("+  param.UOMCode +")")
                        $("select#list-uom").append(option)
                        sortOptionlist($("select#list-uom"),"text","asc")
                    }
                }
            ,ajaxError)

    }

    function isOkaytoAddUOM()
    {
        var isOkay = true;
        $("div#addUOM").find("p.label-error").remove();
        $("div#addUOM input.inputMaterial").each(function(e){
            var elem = $(this)
            if($.trim(elem.val()).length == 0)
                isOkay = false
        })
        if(!isOkay)
            $("input#txt-uomdesc").closest("div.group").after("<p class=\"label-error\">Please input all fields.</p>")
        return isOkay
    }





//ORDERS
     function processOrder(orderNo){
        bootbox.confirm("Do you want to process this order number? <br/><b>#" + orderNo + "</b>", function(result){
            if(result)
                 setStatusOrder(orderNo,"Process"); 
        }) 
     }
     function cancelOrder(orderNo){
        bootbox.confirm("Do you want to cancel this order number? <br/><b>#" + orderNo + "</b>", function(result){
            if(result)
                 setStatusOrder(orderNo,"Cancel"); 
        })
     }
     function shipOrder(orderNo){
        var modal = $("#shipOrderModal") 
        $("#listDeliverName").val("")
        modal.data("orderno", orderNo)
        // modal.modal("show")
        // bootbox.confirm("Do you want to ship this order number? <br/><b>#" + orderNo + "</b>", function(result){
        //     if(result)
        //          setStatusOrder(orderNo,"Ship"); 
        // }) 
     }
    

     function setStatusOrder(orderNo,status,deliverno=0){
        var param = new Object()
        param.ono = orderNo;
        param.deliverno = deliverno
        param.curstatus = ($("#polistorderstatus option:selected").length) ? $("#polistorderstatus option:selected").val() : "";

        if(status == "Process" || status == "Cancel"){
              param.curstatus = "New"  
        }
        if(status == "Ship"){
              param.curstatus = "Process"  
        }

        param.newstatus = status;
        callAjaxJson("main/setStatusOrder", param, function(response){
            //if(status == "Process" || status == "Cancel")
                   // $("li[data-content='sup-neworders']").find("span.badge").text(response["sup-neworders"].list.length)
            bindingDatatoDataTable(response)
        }, ajaxError)

     }

     function DeliverPendingOrder(rlno){
        param.newstatus = status;
        callAjaxJson("main/setStatusOrder", param, function(response){
            //if(status == "Process" || status == "Cancel")
                   // $("li[data-content='sup-neworders']").find("span.badge").text(response["sup-neworders"].list.length)
            bindingDatatoDataTable(response)
        }, ajaxError)

     }


function bindingDatatoDataTable(response){
	var data = response
	for(x in data){
		// console.log(data);

		var table = jQuery("table[data-table='"+ x +"']")
        var dataelem = data[x]
		var list = data[x].list
		var fields = colJsonConvert(data[x].fields)
        if(dataelem !== undefined)
            setupDataTable(table, dataelem);
		// setupDataTable(table, list, fields);
		// console.log(x);
	}

}

function getDataFromDatatable(data){
    var listData = new Array()
   
    for(x in data){
        var rowData = new Array()
        if(!$.isNumeric(x)){ break; }
        rowData = data[x]
        listData.push(rowData)
    }
    return listData;
}

function bindingDatatoChildDataTable(response,table){
    var data = response
 
    for(x in data){ 
      
        var list = data[x].list
        var tbody = jQuery("<tbody/>")  
        var thead = jQuery("<thead/>")  
        var tfoot = jQuery("<tfoot/>")  
        var tr = jQuery("<tr/>")   
        addHeader(tr,"Item Number")
        addHeader(tr,"Description")
        addHeader(tr,"Quantity")
        addHeader(tr,"Price")
        addHeader(tr,"Total")
        thead.append(tr)

        var total = 0;
        for(row in list){
            var tr = jQuery("<tr/>")   
            addCellData(tr,list[row].ItemNumber)
            addCellData(tr,list[row].ItemDescription)
            addCellData(tr,list[row].Quantity)
            addCellData(tr,toMoney(list[row].Price))
            addCellData(tr,toMoney(list[row].Total))
            tbody.append(tr)
            total += parseFloat(list[row].Total,2);
        }  
        table.append(thead)
        table.append(tbody)
        var tr = jQuery("<tr/>")   
        tr.append("<td colspan=\"4\" align=\"right\">Total</td><td align=\"right\" style=\"font-weight:bold;\">"+ toMoney(total) +"</td>")
        tfoot.append(tr)
        table.append(tfoot) 
    } 
}



function bindingDataViewingOrderItems(response,table){
    var data = response
 
    for(x in data){ 
        var list = data[x].list
        var tbody = jQuery("<tbody/>")  
        var thead = jQuery("<thead/>")  
        var tr = jQuery("<tr/>")   
        addHeader(tr,"Item No") 
        addHeader(tr,"Thumbnail")
        addHeader(tr,"Description")  
        addHeader(tr,"DPO Cost")
        addHeader(tr,"Qty Requested")
        addHeader(tr,"Subtotal")

        thead.append(tr)
 
        for(row in list){
            var tr = jQuery("<tr/>")   
            addCellData(tr,list[row].ItemNo)
            addCellData(tr,"<img src=\""+ baseUrl +  "images/variant-folder/" + list[row].ImageFile +"\" alt=\"\" width=\"100px\" onerror=\"this.src='"+ baseUrl + "images/noimage.gif';\"/>") 
            addCellData(tr,list[row].ItemDescription)  
            addCellData(tr,toMoney(list[row].DPOCost))

            addCellData(tr,list[row].RequestsQty)
            addCellData(tr,toMoney(list[row].SubTotal))

            tbody.append(tr)
        }  
        table.append(thead)
        table.append(tbody)
       
    } 
}

 

 

function bindingDataViewingVariants(response,table){
    var data = response
     for(x in data){  
        var list = data[x].list
        if(list){
            var tbody = jQuery("<tbody/>")  
            var thead = jQuery("<thead/>")  
            var tr = jQuery("<tr/>")   
            addHeader(tr,"No") 
            addHeader(tr,"Image")
            addHeader(tr,"Variant")

            if(data.role=="admin"){ 
                addHeader(tr,"DPO Cost")
                addHeader(tr,"SRP") 
                addHeader(tr,"Price")
                addHeader(tr,"Low Stock Level")
                addHeader(tr,"Critical Level")
            }
            else{
                addHeader(tr,"DPO Cost") 
                addHeader(tr,"SRP")  
            }
 
            
            // if(data.isAction) 
            addHeader(tr,"Action")
            thead.append(tr)
     
            for(row in list){
                var tr = jQuery("<tr/>")   
                addCellData(tr,list[row].VariantNo)
                addCellData(tr,"<img src=\""+ baseUrl +  "images/variant-folder/" + list[row].ImageFile +"\" alt=\"\" width=\"100px\" onerror=\"this.src='"+ baseUrl + "images/noimage.gif';\"/>") 
                addCellData(tr,list[row].VariantName) 

                if(data.role=="admin"){ 
                    addCellData(tr,toMoney(list[row].DPOCost)) 
                    addCellData(tr,toMoney(list[row].SRP)) 
                    addCellData(tr,toMoney(list[row].Price))  
                    addCellData(tr,list[row].LowStock)  
                    addCellData(tr,list[row].Critical)  
                }
                else{
                    addCellData(tr,toMoney(list[row].DPOCost)) 
                    addCellData(tr,toMoney(list[row].SRP)) 
                }

  
                addCellData(tr,list[row].Action)
                tbody.append(tr)
            }  
            table.append(thead)
            table.append(tbody)
        }
      
       
    } 
}

function bindingDataViewingRequestItem(response,table){
    var data = response
     for(x in data){  
        var list = data[x].list
        if(list){
            var tbody = jQuery("<tbody/>")  
            var thead = jQuery("<thead/>")  
            var tr = jQuery("<tr/>")   
            addHeader(tr,"Item No") 
            addHeader(tr,"Thumbnail")
            addHeader(tr,"Description")  
            addHeader(tr,"Price")
            addHeader(tr,"Qty Requested")
            addHeader(tr,"Qty Approved")
            addHeader(tr,"Subtotal")
 
            thead.append(tr)
     
            for(row in list){
                var tr = jQuery("<tr/>")   
                addCellData(tr,list[row].ItemNo)
                addCellData(tr,"<img src=\""+ baseUrl +  "images/variant-folder/" + list[row].ImageFile +"\" alt=\"\" width=\"100px\" onerror=\"this.src='"+ baseUrl + "images/noimage.gif';\"/>") 
                addCellData(tr,list[row].ItemDescription)  
                addCellData(tr,list[row].Price)

                addCellData(tr,list[row].RequestsQty)
                addCellData(tr,list[row].Approved)
                addCellData(tr,list[row].SubTotal)
 
                tbody.append(tr)
            }  
            table.append(thead)
            table.append(tbody)
        }
      
       
    } 
}

function bindingDataViewingPendingItems(response,table){
    var data = response
     for(x in data){  
        var list = data[x].list
        if(list){
            var tbody = jQuery("<tbody/>")  
            var thead = jQuery("<thead/>")  
            var tr = jQuery("<tr/>")   
            addHeader(tr,"Item No") 
            addHeader(tr,"Thumbnail")
            addHeader(tr,"Description")  
            addHeader(tr,"Price")
            addHeader(tr,"Qty Approved")
            addHeader(tr,"Qty Received")
            addHeader(tr,"Subtotal")
 
            thead.append(tr)
     
            for(row in list){
                var tr = jQuery("<tr/>")   
                addCellData(tr,list[row].ItemNo)
                addCellData(tr,"<img src=\""+ baseUrl +  "images/variant-folder/" + list[row].ImageFile +"\" alt=\"\" width=\"100px\" onerror=\"this.src='"+ baseUrl + "images/noimage.gif';\"/>") 
                addCellData(tr,list[row].ItemDescription)  
                addCellData(tr,list[row].Price)

                addCellData(tr,list[row].Approved)
                addCellData(tr,list[row].Received)
                addCellData(tr,list[row].SubTotal)
 
                tbody.append(tr)
            }  
            table.append(thead)
            table.append(tbody)
        }
      
       
    } 
}

function addHeader(tr,value){
    var th = jQuery("<th/>")  
    th.text(value)
    tr.append(th)
}
function addCellData(tr,value){
    var td = jQuery("<td/>")  
    td.html(value)
    tr.append(td)
}
 



function setupDataTable(table, data){
    var dttable;
    if ($.fn.DataTable.isDataTable( table )) {
        dttable = listObjTableBinded[table.data("table")] 
        dttable.destroy();
        table.empty()
    }
    
    var rowgroup = (table.data("table") == "categories") ? [0,1] : null;

    var fields = colJsonConvert(data.fields),
 
    dttable = table.DataTable({  
                     "aaData" : data.list,
                     "bSort" : (table.is(".main-table") ? (table.data("table") != "listitemvariant") : false),
                     "aoColumns" : fields.Columns,  
                      scrollY:        (table.is(".main-table") || table.data("table") == "posubmit") ? '60vh' : ((table.data("table") == "auditlogs") ? "20vh" : "30vh"),
                      scrollCollapse: false,
                      paging:         false,
                      rowsGroup: rowgroup, 
                       
                      
                }); 


     
    listObjTableBinded[table.data("table")] = dttable
    dttable.draw(); 
    updateNotification(table.data("table"))
    bindingPOTotal(table, data)

    if( table.data("table") == "pobysupplier" ){
        table.closest("div.dataTables_wrapper").find("div.dataTables_filter").show();
    }
  
}
 function bindingPOTotal(table,data){
    if(table.data("table") == "posubmit")
        $("totalpo").text(toMoney(data.totalpo))
    
 }



 function updateNotification(table){
    var includeTable = ["requestlist", "receivings", "lowstocks", "backorders","items"]

    if(includeTable.indexOf(table) < 0) {return;}

    if($("p.role").text() == "admin"){
        reBindNotication("getNotificationAdminUpdate")
    }
    else if($("p.role").text() == "supplier"){
        reBindNotication("getNotificationSupplierUpdate")
    }


 }
 function reBindNotication(ctrl){
    
    callAjaxJson("main/" + ctrl,new Object(),
        function(response){
            $("dl.notify-list").children().remove();
            var data = response
            for(x in data){
                var dd = $("<dd/>")
                var a = $("<a/>")
                a
                    .addClass("notify")
                    .data("content", data[x].link)
                    .append("<b>"+ data[x].total +"</b> " + data[x].notify)
                dd.append(a)
                $("dl.notify-list").append(dd)

            } 
            if(data.length == 0){
                $("dl.notify-list").append("<p class=\"empty\">No notifications.</p>")
            }

            $("span.notification-count").text(((data.length > 0) ? data.length : ""))
            
        })
 }



 function toggleMainDisplay(isShow, elem, header){
    if(isShow){
        $("div.header-wrap").find("subheader").text("") 
        elem.closest(".content-list").find(".content-child").hide();
        elem.closest(".content-list").find(".main-table").closest(".dataTables_wrapper").show();
        elem.closest(".btn-group").hide();
        elem.closest(".btn-group").prev().show(); 

    }
    else{
        $("div.header-wrap").find("subheader").text(" - " + header) 
        elem.closest(".content-list").find(".content-child").show();
        elem.closest(".content-list").find(".main-table").closest(".dataTables_wrapper").hide();
        elem.hide();
        elem.next().show();

    }

 }

 var listColumnsArray = ["DPOCost","Total","Price"]
 function colJsonConvert(elem){
        var list = elem.split(",")
        var jsonData = new Object();
        var arrlist = [];

        for(x in list){
            var str = list[x].split("|")
            var obj = new Object();
            obj.mDataProp = str[0]
            obj.title = str[1]
            if(str[1]=="Action"){obj.width="120px";} 
            if(str[0]=="ViewItems"){obj.width="80px";} 
            if(listColumnsArray.indexOf(str[0]) > 0 )
                obj.sType = "numeric"
       
            arrlist.push(obj);
        }

        jsonData.Columns = arrlist
        return jsonData;
    }

function print(elem){
    elem = $(elem)
    window.open(baseUrl + "main/" + elem.data("print"));
}


 // function dashboardChart(){
 //      Highcharts.chart('dashboard-chart', {
 //        chart: {
 //            type: 'area'
 //        },
 //        title: {
 //            text: ''
 //        },
         
 //        xAxis: {
 //            allowDecimals: false,
 //            labels: {
 //                formatter: function () {
 //                    return this.value; // clean, unformatted number for year
 //                }
 //            }
 //        },
 //        yAxis: {
 //            title: {
 //                text: 'Total'
 //            },
 //            labels: {
 //                formatter: function () {
 //                    return this.value / 1000 + 'k';
 //                }
 //            }
 //        },
 //        tooltip: {
 //            pointFormat: '{series.name} produced <b>{point.y:,.0f}</b><br/>warheads in {point.x}'
 //        },
 //        plotOptions: {
 //            area: {
 //                pointStart: 1940,
 //                marker: {
 //                    enabled: false,
 //                    symbol: 'circle',
 //                    radius: 2,
 //                    states: {
 //                        hover: {
 //                            enabled: true
 //                        }
 //                    }
 //                }
 //            }
 //        },
 //        series: [{
 //            name: 'USA',
 //            data: [null, null, null, null, null, 6, 11, 32, 110, 235, 369, 640,
 //                1005, 1436, 2063, 3057, 4618, 6444, 9822, 15468, 20434, 24126,
 //                27387, 29459, 31056, 31982, 32040, 31233, 29224, 27342, 26662,
 //                26956, 27912, 28999, 28965, 27826, 25579, 25722, 24826, 24605,
 //                24304, 23464, 23708, 24099, 24357, 24237, 24401, 24344, 23586,
 //                22380, 21004, 17287, 14747, 13076, 12555, 12144, 11009, 10950,
 //                10871, 10824, 10577, 10527, 10475, 10421, 10358, 10295, 10104]
 //        }, {
 //            name: 'USSR/Russia',
 //            data: [null, null, null, null, null, null, null, null, null, null,
 //                5, 25, 50, 120, 150, 200, 426, 660, 869, 1060, 1605, 2471, 3322,
 //                4238, 5221, 6129, 7089, 8339, 9399, 10538, 11643, 13092, 14478,
 //                15915, 17385, 19055, 21205, 23044, 25393, 27935, 30062, 32049,
 //                33952, 35804, 37431, 39197, 45000, 43000, 41000, 39000, 37000,
 //                35000, 33000, 31000, 29000, 27000, 25000, 24000, 23000, 22000,
 //                21000, 20000, 19000, 18000, 18000, 17000, 16000]
 //        }]
 //    });
 // }



function bindingDataChart(){
    callAjaxJson('main/getDataForChart',
                  new Object(),
                  generateChart,
                  function(data,error){});
}

function generateChart(data){
  if(data){
    $('#dashboard-chart').highcharts({
        chart: {
            type: 'area'
        },
        title: {
            text: ' ',
            x: -20 //center
        }, 
        xAxis: {
            categories: data['showMonth']
        },
        yAxis: {
            title: {
                text: 'Total'
            } 
        },
        tooltip: {
            valueSuffix: ''
        },
        
        series: [{
            name: 'Total Sales',
            data: data['Sales'],
            color: '#DD2756'
        },
        {
            name: 'Total Customers',
            data: data['Customers'],
            color: '#D8900D'
        }
        ]
    });
     jQuery('svg').find('text:contains("Highcharts.com")').remove();
  } 

}

function dpoPercent(elem){
    elem = $(elem)
    var dpo = parseFloat(toMoneyValue(elem.val()),2)

    if(dpo > 100){
        elem.val("100.00")
    } 
}


function updateApprovedQty(requestlistno, requestqty, elem){
     elem = $(elem)
     if(!validateApprovedQty(elem,requestqty)){  return; } 
     var param = new Object();
     param.rlno = requestlistno
     param.qty = elem.val();
     callAjaxJson("main/UpdateApprovedQty", param, 
      function(response){
          if(response){
            
        
          }
      }, 
    ajaxError)  

}

function validateApprovedQty(elem,requestqty){
    elem.closest("td").find("p.error").remove();
    if($.trim(elem.val()).length == 0){
        elem.after("<p class=\"error\">Input the Approved Qty.</p>")
        return false;
    } 

    if(parseInt(elem.val(),10)  > requestqty){
        elem.after("<p class=\"error\">Approved qty must not be greater than the Request Qty.</p>")
        elem.select();
        return false;
    } 

    return true;


}

