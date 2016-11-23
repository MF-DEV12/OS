var listObjTableBinded = new Object();
$(function(){

	callAjaxJson("main/initializeAllData", new Object(), bindingDatatoDataTable, ajaxError)
    //dashboardChart();

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
            elem.closest(".content-list").find("subheader").text("") 
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

        $('table[data-table="allorders"]').on('click', 'td:first-child', function () { 
            var elem = $(this)
            var tr = elem.closest('tr');
            var table = listObjTableBinded["allorders"]
            var data = table.rows(tr).data()
            data = data[0]
            elem.find('span').attr('class','glyphicon glyphicon-menu-down')
            var row = table.row( tr );
            var trExists = $("table[data-table=allorders] tr.shown")
            trExists.find('td:first-child').find('span').attr('class','glyphicon glyphicon-menu-right')
            var rowExists = table.row( trExists );
    
            if ( row.child.isShown() ) {
                row.child.hide();
                elem.find('span').attr('class','glyphicon glyphicon-menu-right')
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
            $("#txt-confirmpassword").after("<p class='label-error'>Password must be atleast 8 characters.</p>")
            return false;
        }

        if($("#txt-password").val() != $("#txt-confirmpassword").val()){
            $("#txt-confirmpassword").after("<p class='label-error'>Password does not match the confirm password.</p>")
           return false;
        }
        return true;
     }
     function validateEmail() {
        var email = $("#txt-email").val()
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        
        if(!re.test(email)){
             $("#txt-email").after("<p class='label-error'>Email is not valid.</p>")
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
            elem.closest(".content-list").find("subheader").text(" - Information") 
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
        var tr = jQuery("<tr/>")   
        addHeader(tr,"Item Number")
        addHeader(tr,"Description")
        addHeader(tr,"Quantity")
        addHeader(tr,"Price")
        addHeader(tr,"Total")
        thead.append(tr)


        for(row in list){
            var tr = jQuery("<tr/>")   
            addCellData(tr,list[row].ItemNumber)
            addCellData(tr,list[row].ItemDescription)
            addCellData(tr,list[row].Quantity)
            addCellData(tr,list[row].Price)
            addCellData(tr,list[row].Total)
            tbody.append(tr)
        }  
        table.append(thead)
        table.append(tbody)
  
        // console.log(x);
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