 var tableList;
 var selectedData;
 var newData;
 var currentController = $("#ctrl").val()
 var columns = $("#collist").val()
 var requiredfields = ($("#requiredfields").val()).split(",")
 var ismaintenance = ($("#mode").val() == "view" ) ? false : true;
 var mode = "add"
 $(function(){
    onInitialize();
    $(window).load(function (){ 
        callAjaxJson(currentController + "listData", new Object(), getData ,ajaxError) 
    }) 

    // SAVE FUNCTION
    $( "button.btn-save" ).click( function(e) {
        var param = new Object();
        var data = getNewData();
        if(!validateNewData(data)){return;}
        newData = data;
        param.data =  JSON.stringify(data);

        callAjaxJson(currentController + mode + "Data", param, responseSave ,ajaxError) 
        
 
    })
 
  
})
 
// EDIT | DELETE EVENTS
    function onRowEdit(e){ 
        selectedData = tableList.row(e.closest("tr")).data();
        console.log(selectedData) 
        showIDElement(true)
        for(fld in selectedData){
            $("#fld-"+fld).val(selectedData[fld])
        }
        $("mode").text("Update")
        mode = "edit" 
        $("#save-modal")
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
        $(".form-wrap").find("td").removeClass("required")
        $("p.message").hide()
        $("mode").text("New")
        mode = "add"
        showIDElement(false)
    }


// CONTROLLER RESPONSE AND OTHER FUNCTIONS

    function getData(response){
       var jsondata = colJsonConvert(columns);
      
        tableList = $('.list-table').DataTable({
            "autoWidth": false,
             "columnDefs": [
                { "width": "20%", "visible": ismaintenance, "targets": 0},
                { "visible": !ismaintenance, "targets": 1},
              ],
             "aaData" : response,
             "aoColumns" : jsondata.Columns, 
            "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                if(ismaintenance)
                    jQuery('td:eq(0)', nRow).html('<span data-mode="display"><a href="#" class="btn-edit" onclick=\"onRowEdit(this);\">Edit</a>  |  <a href="#" class="btn-delete" onclick=\"onRowDelete(this);\">Delete</a> </span>');
                var listColumns = jsondata.Columns;
                for(c in listColumns){
                    if(c>1)
                        jQuery('td:eq('+ (c-1) +')', nRow).attr("data-label", listColumns[c].title) 
                }
            }
        }); 
    }

    function responseSave(response){
        if(response){
            location.href = baseUrl + currentController;
        }
        else{
            $("p.message")
                .text(response)
                .show()
        }
    }
     
    function onInitialize(){
        if(ismaintenance){
            $(".btn-action-group").show() 
        }else{
            $(".btn-action-group").hide()

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

     

    function getNewData(){
        var param = new Object;
        $(".form-wrap").find("input[id^='fld-']:visible").each(function(e){
            var elem = $(this) 
            var fld = elem.attr("id").replace("fld-","");

            param[fld] = ($.trim(elem.val()).length > 0) ? elem.val() : null;
        })
        return param;
    }

    function validateNewData(param){
        var isOkay = true
        $(".form-wrap").find("td").removeClass("required")
        $("p.message").hide()
        for(i in param){
            if($.inArray(i,requiredfields) >= 0){
                if(param[i] === null){
                    $("input#fld-"+i).closest("td").addClass("required")
                    isOkay = false;
                    $("p.message").show()
                }
            }
        }
        return isOkay;
    }