var domain = window.location.pathname;
domain = domain.split("/");
var baseUrl = location.protocol + '//' + location.host + "/" + domain[1] + "/"


function callAjaxJson(controller,parampost, successFunct, errorFunct){
 
	$.ajax({
				url: baseUrl + controller,
				data: parampost,
				dataType: 'json',
				type:'post',
				beforeSend:function(data){
					$('body').css('cursor','progress');
				},
				success: successFunct,
				error: errorFunct,
				complete: function(){
					$("body").attr("style", null)
				} 
	})

}

function callAjax(controller,parampost, successFunct, errorFunct,async){
 
	$.ajax({
				url: baseUrl + controller,
				data: parampost, 
				type:'post', 
				async:async,
				success: successFunct,
				error: errorFunct 
	})

}

function ajaxError(response, error) { 
    console.log("Request Error:" + error);
    $('body').css('cursor',null);
}


function callAjaxUpload(controller,parampost, successFunct, errorFunct){
 
	$.ajax({
				url: baseUrl + controller,
				data: parampost, 
				cache:false,
				dataType:'json',
				processData:false,
				contentType:false,
				type:'post',
				success: successFunct,
				error: errorFunct 
	})

}