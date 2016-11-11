$(function(){

	callAjaxJson("main/PurchaseOrderData", new Object(), setupPO, ajaxError)


})

function setupPO(response){
	var data = response
	for(x in data){
		console.log(data);

		var table = jQuery("table[data-table='"+ x +"']")
		var list = data[x].list
		var fields = colJsonConvert(data[x].fields)

		setupDataTable(table, list, fields);
		console.log(x);
	}

}


function setupDataTable(table, data, fields){

	table.DataTable({
		 "bSort" : false,
         "autoWidth": false,
         "columnDefs": [
            { "width": "20%", "targets": 0},
          ],
         "aaData" : data,
         "aoColumns" : fields.Columns, 
    }); 
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