jQuery(function(){


	jQuery("#loginform").submit(function(e){
		return false
	})

	jQuery("#loginform").submit(function(e){
		var param = new Object();
		param.username = jQuery("#USERNAME").val()
		param.password = jQuery("#PASSWORD").val()
		callAjaxJson("Login/validateUser",param,successLogin,ajaxError)
	})


})

function successLogin(response){
	var result = response["result"];
	if(result=="ok")
		location.href = baseUrl + "admin/dashboard";
	else {
		jQuery("#PASSWORD").val("");
		bootbox.alert("Invalid username or password.", function(){});
	}
	
}