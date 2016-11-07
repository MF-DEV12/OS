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
        
    	elem.closest("td").find("span[data-mode=edit]").show()
    	elem.closest("span").hide() 
        tr.addClass("on-edit")
        

        
 	}
 	else{
     

 		elem.closest("td").find("span[data-mode=display]").show()
    	elem.closest("span").hide() 
        tr.removeClass("on-edit")
        tr.find("td").removeClass("required")
        
 	}

 

    
 }

 function onEditBlur(e){
    var elem = $(this)
    if($.trim(elem.text()).length == 0 )
        elem.html("<span class=\"enter-here\"> Enter to type here </span>") 
    
 }

 function onEditFocus(e){
    var elem = $(this)
    elem.find("span.enter-here").remove();
      
   
 }

  