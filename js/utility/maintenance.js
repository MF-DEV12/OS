 var tableList;
 var olddata;
 $(function(){

    $(window).load(function (){

        tableList = $('.list-table').DataTable({
            "autoWidth": false,
        	 "columnDefs": [
			    { "width": "20%", "targets": 0},
			    { "visible": false, "targets": 1},
			  ] 
        }); 

    }) 

       // SAVE FUNCTION
    $( ".list-table tbody" ).on( "click", "tr .btn-save", function() {
        var elem = $(this)
        onEdit(false,elem)

    })

    // EDIT FUNCTION
    $( ".list-table tbody" ).on( "click", "tr .btn-edit", function() {
        var elem = $(this)
        onEdit(true,elem)
        olddata = tableList.row(elem.closest("tr")).data(); 
    })


    // CANCEL FUNCTION
    $( ".list-table tbody" ).on( "click", "tr .btn-cancel", function() {
        var elem = $(this)
        onEdit(false,elem)
        tableList.row( elem.closest("tr") ) .data( olddata ).draw();
        })   


    // DELETE FUNCTION      
    $( ".list-table tbody" ).on( "click", "tr .btn-delete", function() {
        var elem = $(this)

        bootbox.confirm("Are you sure you want to delete it?", function(result){
            if(result){ 
                tableList
                    .row( elem.closest("tr") )
                    .remove()
                    .draw();
            }

        }) 
    })

   
})

 
   
 




// ROW EDIT EVENTS
 function onEdit(isEdit,elem){
    var table = $('.list-table')
    var tr = elem.closest("tr")
    var td =  tr.find("td:not(:first-child)")

 	if(isEdit){ 
        if(table.find("tr.on-edit").length > 0) {
            table.find("tr.on-edit").find("td:eq(1)").focus();
            return;
        }
    	elem.closest("td").find("span[data-mode=edit]").show()
    	elem.closest("span").hide() 
        tr.addClass("on-edit")
        td
        .on("blur", onEditBlur)
        .on("focus", onEditFocus)

        
 	}
 	else{
        if(tr.find("span.enter-here").length){
            tr.find("span.enter-here").closest("td")
                .addClass("required") 
            return;
        }

 		elem.closest("td").find("span[data-mode=display]").show()
        tr.find("td:not(:first-child)").attr("placeholder", null) 
    	elem.closest("span").hide() 
        tr.removeClass("on-edit")
        tr.find("td").removeClass("required")

 	}

    td.prop("contenteditable", isEdit) 

    
 }

 function onEditBlur(e){
    var elem = jQuery(this)
    if(jQuery.trim(elem.text()).length == 0 )
        elem.html("<span class=\"enter-here\"> Enter to type here </span>") 
    
 }

 function onEditFocus(e){
    var elem = jQuery(this)
    elem.find("span.enter-here").remove();
 }