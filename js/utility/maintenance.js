 var tableList;
 var selectedData;
 var currentController = $("#ctrl").val()
 var columns = $("#collist").val()
 $(function(){

    $(window).load(function (){ 
        callAjaxJson(currentController + "listData", new Object(), getData ,ajaxError) 
    }) 

    // SAVE FUNCTION
    $( ".list-table tbody" ).on( "click", "tr .btn-save", function() {
        var elem = $(this)
        onEdit(false,elem)

    })
 

    // DELETE FUNCTION      
    $( ".list-table tbody" ).on( "click", "tr .btn-delete", function() {
       
    })

   
})
 
// EDIT | DELETE EVENTS
    function onRowEdit(e){ 
        selectedData = tableList.row(e.closest("tr")).data(); 
        showIDElement(true)
        for(fld in selectedData){
            $("#fld-"+fld).val(selectedData[fld])
        }

        $("#save-modal")
            .attr("mode","edit")
            .modal('show');     
     }

    function onRowDelete(e){ 

        bootbox.confirm("Are you sure you want to delete it?", function(result){
            if(result){ 
                tableList
                    .row( e.closest("tr") )
                    .remove()
                    .draw();
            }

        }) 
    }

// MODAL EVENTS
    function onModalClose(){
        $(".form-wrap table").find("input").val("") 
        showIDElement(false)
    }


// CONTROLLER RESPONSE AND OTHER FUNCTIONS

    function getData(response){
       var jsondata = colJsonConvert(columns);
      
        tableList = $('.list-table').DataTable({
            "autoWidth": false,
             "columnDefs": [
                { "width": "20%", "targets": 0},
                { "visible": false, "targets": 1},
              ],
             "aaData" : response,
             "aoColumns" : jsondata.Columns, 
            "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                jQuery('td:eq(0)', nRow).html('<span data-mode="display"><a href="#" class="btn-edit" onclick=\"onRowEdit(this);\">Edit</a>  |  <a href="#" class="btn-delete" onclick=\"onRowDelete(this);\">Delete</a> </span>');
                var listColumns = jsondata.Columns;
                for(c in listColumns){
                    if(c>1)
                        jQuery('td:eq('+ (c-1) +')', nRow).attr("data-label", listColumns[c].title) 
                }
            }
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

    function showIDElement(toggle){
        if(toggle){
            $("input[data-label=ID]").show()
            $("label[for=fld-ID]").show()
        }
        else{
            $("input[data-label=ID]").hide()
            $("label[for=fld-ID]").hide()
        }

        $("input[data-label=ID]").prop("disabled", toggle)

    }   