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

		callAjaxJson(curCtrl + "getContributors",
					 new Object(),
					 function (data){
					 	$('#CONTRIBUTORS').tokenfield({
						  autocomplete: {
						    source: data,
						    delay: 100
						  },
						  showAutocompleteOnFocus: true
						})
						$("body").attr("style",null)
					 },
					 ajaxError)

	})

	$(".btn-view").click(function (e){
		var elem = $(this)
		projectid = elem.closest(".btn-group").data("item");
		projectid = projectid.ID;
	})

	$(".btn-payment").click(function (e){
		var elem = $(this)
		var listItem = elem.data("item") 
		pcID =  listItem.ID
		contributorName =  listItem.NAME
	})

	$(".btn-history").click(function (e){
		var elem = $(this)
		var listItem = elem.data("item")
		$("contributors").text(listItem.NAME)
		param.PROJECTCONTRIBID = listItem.ID
		callAjaxJson(curCtrl + "getPaymentHistory",
					 param,
					 getPaymentHistory,
					 ajaxError)
		 
	})

	 

	$(".btn-addcontrib").click(function (e){
		var elem = $(this)
		if(!isOkayToSave($("#contributors-form"))) return; 
		bootbox.confirm("Do you want add this contributors?", function (result){
			if(result){
				param.PROJECTID = projectid;
				callAjaxJson(curCtrl + "insertContributorsToProject",
							 param,
							 function (response){
							 	if(response.result == "ok")
							 		location.href = baseUrl + curCtrl
							 	else
							 		bootbox.alert("The contributors have been already saved.",function(){})
							 	$("body").attr("style",null)
							 },
							 ajaxError)
			}
		})
		
	})

	$(".btn-addpayment").click(function (e){
		var elem = $(this)
		if(!isOkayToSave($("#payment-form"))) return; 
		bootbox.confirm("Do you want submit this payment from " + contributorName +"?", function (result){
			if(result){
				param.PROJECTCONTRIBID = pcID;
				callAjaxJson(curCtrl + "insertContributorsPayment",
							 param,
							 function (response){
							 	if(response.result == "ok")
							 		location.href = baseUrl + curCtrl
							 	else if (response.result == "1062")
							 		bootbox.alert("This payment have been already submit.",function(){})
							 	$("body").attr("style",null)
							 },
							 ajaxError)
			}
		})
		
	})


	
	
})


function getPaymentHistory(response){
	var data = response;
	$("#list-history").contents().remove();

	if(data.length){
		for(x in data){
			var a = $("<a/>");
			var item = ""
			item += "<button class=\"btn btn2 btn-link remove-history pull-right\" data-id=\""+ data[x].ID +"\">Remove</button>"
			item += "<h4 class=\"list-group-item-heading\">Amount Paid: <br/> &#x20B1 " + data[x].AMOUNTPAY + "</h4>"
			item += "<p class=\"list-group-item-heading datelabel\">Date of Payment: "+ data[x].DATEPAYMENT + "</p>"
			
			a
				.addClass("list-group-item") 
				.append(item);
			$("#list-history").append(a)
		}
		$(".remove-history").on("click", removeHistoryEvt)
	}
	else{ 
		$("#list-history").append("<p class=\"label label-default\">No Payment history.</p>");
	}
	$("body").attr("style", null)
}

function removeHistoryEvt(e){
	var elem = $(this)
		param = new Object()
		param.ID = elem.data("id")
		bootbox.confirm("Do you want to delete this payment?", function(result){
			if(result){
				callAjaxJson(curCtrl + "removePayment",
					param,
					function (response){
						if (response.result == "ok") {
							elem.closest("a.list-group-item").remove();
							if(!$("#list-history").contents().length){
								$("#list-history").append("<p class=\"label label-default\">No Payment history.</p>");
							}
							$("#result-history").fadeIn()
							$("#result-history").fadeOut(8000)
						}
					},
					ajaxError)

			}
		})
}