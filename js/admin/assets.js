var jsvar = new Object();
var projectid;
var pcID;
var contributorName;
var mode = "";
var curCtrl = "";
  

$(function(){

	$(window).load(function (){ 
		jsvar = $("#js-vars").data("var")
		curCtrl = jsvar.currentController
 

	})

	$(".btn-assets").click(function (e){
		var elem = $(this)
		var list = elem.data("item");
		projectid = list.ID;
		$("project").text(list.PROJECT)

	})


 

	$(".btn-addassets").click(function (e){
		var elem = $(this)
		if(!isOkayToSave($("#assets-form"))) return; 
		bootbox.confirm("Do you want add this assets?", function (result){
			if(result){
				param.PROJECTID = projectid;
				callAjaxJson(curCtrl + "insertAssetToProject",
							 param,
							 function (response){
							 	if(response.result == "ok")
							 		location.href = baseUrl + curCtrl
							 	else
							 		bootbox.alert("The assets have been already saved.",function(){})
							 	$("body").attr("style",null)
							 },
							 ajaxError)
			}
		})
		
	})

	 


	
	
})

 