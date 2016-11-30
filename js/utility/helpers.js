$(function(){

	$("button.upload").click(function(e){
		var elem = $(this)
		var input = elem.next("input.file-upload").click()
	})

	$('input.file-upload').change(function(e){
		var image = baseUrl + "images/loading2.gif"
		$("div.image-holder").html("<img src=\""+ image +"\" alt=\"\" width=\"200px\"/>")  

		param = new Array();
	    var file_data = $(this).prop('files');  

	    for(i=0;i<file_data.length;i++){
	    	var form_data = new FormData();                  
	    	form_data.append('userfile', file_data[i]);
	    	uploadImage(form_data);
	    }
	})

	$("input.numeric").maskMoney();

})





	function uploadImage(form_data){
		callAjaxUpload(
			'main/uploadImage',
			 form_data,
			 SuccessUpload,
			 ajaxError
		)
	}

	function SuccessUpload(data){
		file = data['upload_data'];
		setTimeout(function(e){
			var image = baseUrl + "images/variant-folder/"  +  file.file_name;
			$("div.image-holder").html("<img src=\""+ image +"\" alt=\"\" data-image=\""+ file.file_name +"\" width=\"200px\"/>")
		},1500)
		  

		// if(file!=null){
		// 	paramImages.push(file.orig_name);
		// }
		// $('body').attr('style',null);
		 
	}