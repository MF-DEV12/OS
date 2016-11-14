var listObjTableBinded = new Object();
$(function(){

	callAjaxJson("main/initializeAllData", new Object(), bindingDatatoDataTable, ajaxError)


    // PURCHASE ORDER
        $("#btn-addrequest").click(function(){
            var elem = $(this)
            elem.closest(".content-list").find("subheader").text("- Create Request")
            elem.closest(".content-list").find(".dataTables_wrapper").hide();
            elem.closest(".content-list").find(".content-child").show();
        })

        $("#polistsupplier").change(function(e){
            var elem = $(this)
            var param = new Object()
            param.sid = elem.find("option:selected").val()
            if(param.sid!=""){
                callAjaxJson("main/getSupplierOrder", param, bindingDatatoDataTable, ajaxError)
            }
        })


})

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
                     "bSort" : false,
                     "iDisplayLength": (table.is(".main-table")) ? 10 : 5, 
                     "bLengthChange": false,
                     "autoWidth": false,
                     "columnDefs": [
                        { "width": "10px", "targets": 0},
                      ],
                     "aaData" : data,
                     "aoColumns" : fields.Columns, 
                }); 
   
    listObjTableBinded[table.data("table")] = dttable
    

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