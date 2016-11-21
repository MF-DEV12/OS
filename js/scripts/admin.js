var listObjTableBinded = new Object();
$(function(){

	callAjaxJson("main/initializeAllData", new Object(), bindingDatatoDataTable, ajaxError)


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
            toggleMainDisplay(false,elem,"PO List to Receive")
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
            $("#txt-confirmpassword").after("<p class='label label-danger label-error'>Please input all required field(*).</p>")

       
        return isOkay;
     }
     function validatePassword(){

        if($.trim($("#txt-password").val()).length < 8 && $.trim($("#txt-confirmpassword").val()).length < 8 ){
            $("#txt-confirmpassword").after("<p class='label label-danger label-error'>Password must be atleast 8 characters.</p>")
            return false;
        }

        if($("#txt-password").val() != $("#txt-confirmpassword").val()){
            $("#txt-confirmpassword").after("<p class='label label-danger label-error'>Password entered not matched.</p>")
           return false;
        }
        return true;
     }


function bindingDatatoDataTable(response){
	var data = response
	for(x in data){
		console.log(data);

		var table = jQuery("table[data-table='"+ x +"']")
		var list = data[x].list
		var fields = colJsonConvert(data[x].fields)

		setupDataTable(table, list, fields);
		// console.log(x);
	}

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
                     "aoColumns" : fields.Columns,  
                      scrollY:        (table.is(".main-table")) ? '60vh' :'30vh',
                      scrollCollapse: false,
                      paging:         false,
                      
                }); 
     
    listObjTableBinded[table.data("table")] = dttable
    

}



 function toggleMainDisplay(isShow, elem, header){
    if(isShow){
        elem.closest(".content-list").find("subheader").text("") 
        elem.closest(".content-list").find(".content-child").hide();
        elem.closest(".content-list").find(".main-table").closest(".dataTables_wrapper").show();
        elem.closest(".btn-group").hide();
        elem.closest(".btn-group").prev().show(); 

    }
    else{
        elem.closest(".content-list").find("subheader").text(" - " + header) 
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
            arrlist.push(obj);
        }

        jsonData.Columns = arrlist
        return jsonData;
    }