$(function(){

	$("button.upload").click(function(e){
		var elem = $(this)
		var input = elem.next("input.file-upload").click()
	})

	$('input.file-upload').change(function(e){
		var image = baseUrl + "images/loading2.gif"
		var elem = $(this)

		elem.closest("div").find("div.image-holder").html("<img src=\""+ image +"\" alt=\"\" width=\"200px\"/>")  


		var param = new Object();
		if(elem.data("id")){
			param.id = elem.data("id")
			param.table = elem.data("table")
			param.col = elem.data("col")
		} 
	    var file_data = $(this).prop('files');  

	    for(i=0;i<file_data.length;i++){
	    	var form_data = new FormData();                  
	    	form_data.append('userfile', file_data[i]); 
	    	callAjaxUpload(
				'main/uploadImage' + ((param) ? "?param=" + JSON.stringify(param) : ""),
				 form_data,
				 function(response){
					file = response['upload_data'];
					setTimeout(function(e){
						var image = baseUrl + "images/variant-folder/"  +  file.file_name;
						elem.closest("div").find("div.image-holder").html("<img src=\""+ image +"\" alt=\"\" data-image=\""+ file.file_name +"\" width=\"200px\"/>")
					},1500)
				 },
				 ajaxError
			)
		    	 
	    }
	})

	$("input.numeric").maskMoney();

 

})
 

 
	function toMoney(str){
		if(str=="" || !str)
			return "0.00";
		return parseFloat(str,10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString();
	}

 	function sortOptionlist(options){
	    options.closest("select").find("option:contains('Select one')").remove()
	    options =  options.closest("select").find("option")

 		var arr = options.map(function(_, o) {
	        return {
	            t: $(o).text()
	            v: o.value
	        };
	    }).get();
	    arr.sort(function(o1, o2) {
	        return o1.t.toUpperCase() > o2.t.toUpperCase(), ? 1 : o1.t.toUpperCase(), < o2.t.toUpperCase(), ? -1 : 0;
	    });
	    options.each(function(i, o) {
	        o.value = arr[i].v;
	        $(o).text(arr[i].t);
	    });
	    options.closest("select").prepend("<option value=\"\" disabled selected>Select one</option>")
 	}