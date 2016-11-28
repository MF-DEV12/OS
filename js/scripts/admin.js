var listObjTableBinded = new Object();
$(function(){

	callAjaxJson("main/initializeAllData", new Object(), bindingDatatoDataTable, ajaxError)
    dashboardChart();

    // PURCHASE ORDER
        // Purchase Order
        $("#btn-addrequest").click(function(){
            var elem = $(this)
            toggleMainDisplay(false,elem,"Create Request") 
            $("#polistsupplier").find("option:first-child").prop("selected",true)

        
            var listposupplier = new Object()

            var arrList = new Object();
            arrList.list = "";
            arrList.fields = "Remove| ,ItemQty|Quantity,Item|Item No.,ItemDescription|Description,DPOCost|DPO Cost,Total|Total"
            listposupplier["posubmit"] = arrList;

            arrList = new Object();
            arrList.list  = "";
            arrList.fields = "Action| ,ItemNo|Item No.,Description|Description,DPOCost|DPO Cost"
            listposupplier["pobysupplier"] = arrList;

            arrList = new Object();
            arrList.list  = "";
            arrList.fields = "ItemNo|Item No.,ItemDescription|Description,STOCKS|Stocks,LOWSTOCKS|Low,CRITICAL|Critical"
            listposupplier["lowstockbysupplier"] = arrList;

            bindingDatatoDataTable(listposupplier)

        })

        $('table[data-table="purchaseorder"]').on('click', 'td:first-child', function () { 
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
            //VALIDATE THE RECEIVED INPUT
            $("input.poreceived").each(function(e){
                var elem = $(this)
                if($.trim(elem.val()).length == 0 || parseInt(elem.val()) == 0 ){
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
                        bootbox.alert("Transaction completed.",function(){})
                    }

                }, ajaxError)
                    
            }
            else{
                bootbox.alert("Please input the Received first.", function(){})

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

        $('table[data-table="allorders"],table[data-table="sup-neworders "],table[data-table="sup-processorders"],table[data-table="sup-incompleteorders"],table[data-table="sup-shippedorders"],table[data-table="sup-cancelledorders"]')
        .on('click', 'td:first-child', function () { 
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

//SUPPLIER SIDE
        //ITEMS
        $("#btn-additems").click(function(){
            $("li[data-content='additems'] a").click()



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
                        tr2.append("<td><a class=\"delete-attribute\">&times;</a></td>")
                        
                        $("#table-attribute tbody").append(tr2)
                    }
                    $('input[data-role=tagsinput]').tagsinput();

                    

                    var arrList = new Object();
                    var list = new Object();
                    arrList.list  = "";
                    arrList.fields = "ItemName|Item Name,Attributes|Variant,Price|Price,LowStocks|Low Stocks Level,Crtical|Critical Level";
                    list["listitemvariant"] = arrList;

                    bindingDatatoDataTable(list)
                    var table = listObjTableBinded["listitemvariant"]
                    table.draw()

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

            var data = new Object();
            data.ItemName = $("#txt-itemname").val();
            data.Attributes = "<a class=\"attribute-setup-show\" data-toggle=\"modal\" data-target=\"#attributesetup\"><span class=\"glyphicon glyphicon-cog\"></span> Setup variants...</a>";
            data.Price = "<input type=\"text\" value=\"0\" class=\"numeric variant-price form-control\"/>";
            data.LowStocks = "<input type=\"text\" value=\"0\" class=\"numeric variant-lowstocks form-control\"/>";
            data.Crtical = "<input type=\"text\" value=\"0\" class=\"numeric variant-critical form-control\"/>";
            arrayData.push(data)
            arrList.list  = arrayData;
            arrList.fields = "ItemName|Item Name,Attributes|Variant,Price|Price,LowStocks|Low Stocks Level,Crtical|Critical Level";
            var table = listObjTableBinded["listitemvariant"]
            table.row.add(data).draw()
            // list["listitemvariant"] = arrList;

            // bindingDatatoDataTable(list)
        })

 
        var curtrvariant;
        $("table[data-table='listitemvariant']").on("click", "tbody tr td a.attribute-setup-show", function(e){
            var elem = $(this)
            var tr = elem.closest("tr")
            curtrvariant = tr
            var table =  $("#table-attribute-setup")
            $("#table-attribute-setup tbody").empty()
            $("input.attribute-name").each(function(e){
                var attrname = $(this)
                var tr2 = $("<tr/>")
                tr2.append("<td width=\"10px\">"+ attrname.val() +"</td>")

                var optionlist = attrname.closest("tr").find("input.tagsinput").tagsinput('items') 

                var select = $("<select/>") 
                select.addClass("listoptions")
                select.addClass("form-control")

                select.append("<option value=\"\" selected disabled>Select one</option>")
                for(x in optionlist){
                    var option = $("<option/>")
                    option.text(optionlist[x])
                    option.attr("value",optionlist[x])
                    select.append(option)
                }
               
                var td = $('<td/>')
                td.append(select)
                tr2.append(td)
                $("#table-attribute-setup tbody").append(tr2)   

            })
        })

        $("button#btn-saveattributesetup").click(function(e){
            var stringAttribute = ""
            $("#table-attribute-setup tbody tr").each(function(a){
                var elem = $(this)
                stringAttribute += elem.find("td:first").text() + ":"
                stringAttribute += elem.find("select.listoptions option:selected").text() + "; <br>"
            })

            curtrvariant.closest("tr").find("td:nth-child(2)").html(stringAttribute)
            $("div#attributesetup").modal("hide");
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
        var param = new Object();
        param.rlno = requestlistno;
        param.qty = elem.value;
        callAjaxJson("main/updatePOQty", param, 
            function(response){
                if(response){
                   
                }

            }
        , ajaxError) 
    }

    // Receivings
     function updatePOReceived(requestlistno,elem){
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
    function physicalCount(variantno){
        var promptOptions = {
          title: "Please enter the stock count for " + variantno + ":",
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
            dd.append("<span class=\"data-edit\" >"+ data[x].Name +"</span>")
            // dd.append("<span class=\"glyphicon glyphicon-menu-right pull-right selector\"></span>")
            dd.append("<span class=\"action pull-right\"><a class=\"edit\">Edit</a> | <a class=\"delete\">Delete</a></span>")
            dd.data("id",data[x].id) 
            dl.append(dd);
        }
        if(!data.length){
            dl.append("<p class=\"empty\">No record(s) found</p>");

        }
    }

    function addItemVariant(itemNo,elem){
        var tr = elem.closest("tr")
        var tableelem = tr.closest(".content-list").find(".main-table")
        console.log(tableelem.length)
        var table = listObjTableBinded[tableelem.attr("data-table")]
        var data = table.rows(tr).data()
        data = data[0]

        $(".header-wrap").find("subheader").text(" - Add Item Variant for Item: " + data.Name) 
        tableelem.closest(".content-list").find(".content-child").show();
        tableelem.closest(".content-list").find(".main-table").closest(".dataTables_wrapper").hide(); 
        tableelem.closest(".content-list").find("div.btn-group").show()

        var arrList = new Object();
        var list = new Object();
        arrList.list  = "";
        arrList.fields = "ItemName|Item Name with Variant,Price|Price,LowStocks|Low Stocks Level,Crtical|Critical Level";
        list["listitemvariant"] = arrList;

        bindingDatatoDataTable(list)

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
                arrList.fields = "ItemName|Item Name with Variant,Price|Price,LowStocks|Low Stocks Level,Crtical|Critical Level";
                list["listitemvariant"] = arrList;

                bindingDatatoDataTable(list)

            }
            
        },ajaxError)

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
        bootbox.confirm("Do you want to ship this order number? <br/><b>#" + orderNo + "</b>", function(result){
            if(result)
                 setStatusOrder(orderNo,"Ship"); 
        }) 
     }
    

     function setStatusOrder(orderNo,status){
        var param = new Object()
        param.ono = orderNo;

        param.curstatus = ($("#polistorderstatus option:selected").length) ? $("#polistorderstatus option:selected").val() : "";

        if(status == "Process" || status == "Cancel"){
              param.curstatus = "New"  
        }
        if(status == "Ship"){
              param.curstatus = "Process"  
        }

        param.newstatus = status;
        callAjaxJson("main/setStatusOrder", param, function(response){
            if(status == "Process" || status == "Cancel")
                    $("li[data-content='sup-neworders']").find("span.badge").text(response["sup-neworders"].list.length)
            bindingDatatoDataTable(response)
        }, ajaxError)

     }


function bindingDatatoDataTable(response){
	var data = response
	for(x in data){
		// console.log(data);

		var table = jQuery("table[data-table='"+ x +"']")
		var list = data[x].list
		var fields = colJsonConvert(data[x].fields)

		setupDataTable(table, list, fields);
		// console.log(x);
	}

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
            addCellData(tr,list[row].Price)
            addCellData(tr,list[row].Total)
            tbody.append(tr)
            total += parseFloat(list[row].Total,2);
        }  
        table.append(thead)
        table.append(tbody)
        var tr = jQuery("<tr/>")   
        tr.append("<td colspan=\"4\" align=\"right\">Total</td><td align=\"right\" style=\"font-weight:bold;\">"+ total +"</td>")
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
        addHeader(tr,"No")
        addHeader(tr,"Item Number")
        addHeader(tr,"Variant Number")
        addHeader(tr,"Description")
        addHeader(tr,"Request Qty")
        thead.append(tr)
 
        for(row in list){
            var tr = jQuery("<tr/>")   
            addCellData(tr,list[row].RequestListNo)
            addCellData(tr,list[row].ItemNo)
            addCellData(tr,list[row].VariantNo)
            addCellData(tr,list[row].ItemDescription)
            addCellData(tr,list[row].Requested)
            tbody.append(tr)
        }  
        table.append(thead)
        table.append(tbody)
       
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
 



function setupDataTable(table, data, fields){
    var dttable;
    if ($.fn.DataTable.isDataTable( table )) {
        dttable = listObjTableBinded[table.data("table")] 
        dttable.destroy();
        table.empty()
    }
    

    dttable = table.DataTable({  
                     "aaData" : data,
                     "bSort" : false,
                     "aoColumns" : fields.Columns,  
                      scrollY:        (table.is(".main-table") || table.data("table") == "posubmit") ? '60vh' : ((table.data("table") == "auditlogs") ? "20vh" : "30vh"),
                      scrollCollapse: false,
                      paging:         false,
                      
                }); 
     
    listObjTableBinded[table.data("table")] = dttable
    dttable.draw();
    
    

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
       
            arrlist.push(obj);
        }

        jsonData.Columns = arrlist
        return jsonData;
    }

 function dashboardChart(){
      Highcharts.chart('dashboard-chart', {
        chart: {
            type: 'area'
        },
        title: {
            text: ''
        },
         
        xAxis: {
            allowDecimals: false,
            labels: {
                formatter: function () {
                    return this.value; // clean, unformatted number for year
                }
            }
        },
        yAxis: {
            title: {
                text: 'Total'
            },
            labels: {
                formatter: function () {
                    return this.value / 1000 + 'k';
                }
            }
        },
        tooltip: {
            pointFormat: '{series.name} produced <b>{point.y:,.0f}</b><br/>warheads in {point.x}'
        },
        plotOptions: {
            area: {
                pointStart: 1940,
                marker: {
                    enabled: false,
                    symbol: 'circle',
                    radius: 2,
                    states: {
                        hover: {
                            enabled: true
                        }
                    }
                }
            }
        },
        series: [{
            name: 'USA',
            data: [null, null, null, null, null, 6, 11, 32, 110, 235, 369, 640,
                1005, 1436, 2063, 3057, 4618, 6444, 9822, 15468, 20434, 24126,
                27387, 29459, 31056, 31982, 32040, 31233, 29224, 27342, 26662,
                26956, 27912, 28999, 28965, 27826, 25579, 25722, 24826, 24605,
                24304, 23464, 23708, 24099, 24357, 24237, 24401, 24344, 23586,
                22380, 21004, 17287, 14747, 13076, 12555, 12144, 11009, 10950,
                10871, 10824, 10577, 10527, 10475, 10421, 10358, 10295, 10104]
        }, {
            name: 'USSR/Russia',
            data: [null, null, null, null, null, null, null, null, null, null,
                5, 25, 50, 120, 150, 200, 426, 660, 869, 1060, 1605, 2471, 3322,
                4238, 5221, 6129, 7089, 8339, 9399, 10538, 11643, 13092, 14478,
                15915, 17385, 19055, 21205, 23044, 25393, 27935, 30062, 32049,
                33952, 35804, 37431, 39197, 45000, 43000, 41000, 39000, 37000,
                35000, 33000, 31000, 29000, 27000, 25000, 24000, 23000, 22000,
                21000, 20000, 19000, 18000, 18000, 17000, 16000]
        }]
    });
 }