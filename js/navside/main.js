jQuery(document).ready(function($){
 

	$("div.sidebar ul.nav a").click(function(e){
		var elem = $(this)

		var ul = elem.closest("ul");
		var li = elem.closest("li");
		if(li.is(".current")){return;}
		// if($("div.sidebar ul.nav").find("li.current").data("content") == "additems"){
		// 	var isDisregard = true;
		// 	bootbox.confirm("Disregard new items?",function(result){
		// 		if(!result)
		// 			isDisregard = false;
		// 	})
		// 	if(!isDisregard)
		// 		return;
		// }
		if(li.data("content") === undefined){return;}
		$("div.sidebar ul.nav").find("li.current").removeClass("current")
		$("div.sidebar ul.nav").find("a.active").removeClass("active")
		li.addClass("current")
		elem.addClass("active")

		$("div.content .content-group.show .content-list.show").removeClass("show");
		$("div.content").find(".content-list[data-content='"+ li.data("content") +"']").addClass("show") 
		var table = $("table[data-table='" + li.data("content") + "']")
		table.attr("style",null)
		$("span.content-header span").text(li.data("header"))
		$("span.content-header subheader").text("")

		var dttable = listObjTableBinded[li.data("content")]
		if(dttable){
			var param = new Object();
			param.table = li.data("content");
        	callAjaxJson("main/getLatestData", param, bindingDatatoDataTable, ajaxError)

		}  
        if(li.data("content")=="dashboard")        
        	callAjaxJson("main/getAuditLogsJson", new Object(), bindingDatatoDataTable, ajaxError)
        if(li.data("content") == "additems"){
        	$("div.content").find(".content-list[data-content='"+ li.data("content") +"'] .form-table .inputMaterial").val("")
        	$("div.content").find(".content-list[data-content='"+ li.data("content") +"'] .form-table .label-error").remove()
        	if(!$("button#btn-submititemvariant").is(".disabled"))
        		$("button#btn-submititemvariant").addClass("disabled")
        }

        document.title = 'Lampano Hardware - '  + li.data("header");

        // RESET PAGE 
        var currentList = $("div.content .content-group.show .content-list.show")
        currentList.find(".main-button").show();
        currentList.find(".btn-child-group").hide(); 
        currentList.find(".dataTables_wrapper").show();
        currentList.find(".content-child").hide(); 
	 	//$('.content').removeClass('isOpen');
	 
	})


	$('span.button').on('click', function() {
		$('.content').toggleClass('isOpen');
	});
 	
 
	$(".stepNav li a").click(function(e){
		var elem = $(this)
		$("#btn-submititemvariant").addClass("disabled")
		if(elem.closest("li").is(".selected")){return;}

 
		if($(".stepNav li.selected").data("view") == "item-info"){
			if($("div.step-holder > div.step-view.show").find("p.label-error").length){return;}
			if(!validateItemVariant(elem.closest("li").data("view"))){return;} 

		} 
  
		
		if($(".stepNav li.selected").data("view") == "item-variants") 
			if(!validateAttribute(elem.closest("li").data("view"))){return;}


		$(".step-holder > div.show").removeClass("show");
		$(".stepNav li.selected").removeClass("selected");
		elem.closest("li").addClass("selected");
		$(".step-view[data-view="+ elem.closest("li").data("view") +"]").addClass("show")
		
		if(elem.closest("li").data("view") == "item-variants"){
			var table = listObjTableBinded["listitemvariant"];
			table.draw()
			$("table[data-table='listitemvariant']").closest("div.dataTables_wrapper").find("div.dataTables_filter").hide() 
		}
		if(elem.closest("li").data("view") == "item-review"){
		

			$("#btn-submititemvariant").removeClass("disabled")

			var listposupplier = new Object()	

            var arrList = new Object();
            arrList.list = "";
            arrList.fields = "Image|Thumbnail,VariantsName|Item Variant,DPOCost|DPO Cost,SRP|Suggessted Retail Price (SRP)"
            listposupplier["listitemvariantreview"] = arrList; 
            $("input#lbl-itemname").val($("#txt-itemname").val())
            $("input#lbl-uom").val($("select#list-uom option:selected").val())
            var category = ""
            category += $("#list-family option:selected").text() + " > "
            category += $("#list-category option:selected").text() + " > "
            category += $("#list-subcategory option:selected").text()

            $("input#lbl-category").val(category)
            bindingDatatoDataTable(listposupplier)

			var table = listObjTableBinded["listitemvariantreview"];
			table.draw()
			$("table[data-table='listitemvariantreview']").closest("div.dataTables_wrapper").find("div.dataTables_filter").hide() 
			bindDataItemVariantForReview()
		}

	})


 
	 
	$("dl.notify-list").on("click","dd a.notify", function(e){
		var elem = $(this)
		$("div.sidebar ul.nav li[data-content="+elem.data("content")+"] a").click();
		// if(elem.data("content") == "receivings"){
		// 	setTimeout(function(e){
		// 		toggleMainDisplay(false,$("button#btn-directreceive"),"Select PO List to Receive")

		// 	}, 1000)
			
		// 	//$("button#btn-directreceive").click();
		// }

	})


});
 
function validateItemVariant(dataview){
	$("div.step-holder").find("p.label-error").remove()
    var isOkay = true;
   	var isOkay2 = true
	if(dataview != "item-info"){
	   $("div.step-holder > div.step-view[data-view=item-info]").find("table.form-table .inputMaterial.required").each(function(e){
	   		var elem = $(this)
	   		if($.trim(elem.val()).length == 0)
	   			isOkay= false;
	   })		
	   if(!isOkay)
	   		$("div.step-holder > div.step-view[data-view=item-info]").find("table.form-table tbody").before("<p class=\"label-error\">Please input all this fields.</p>")

	   if(dataview == "item-review"){
			 // VALIDATE THE ITEM VARIANT
		  	var table = listObjTableBinded["listitemvariant"]
			if(table.data().length == 0){
				isOkay2= false;
				$(".stepNav li[data-view=item-variants] a").click();
			} 
		}
		if(!isOkay2)
			$("div.step-holder > div.step-view[data-view=item-variants]").find("table.table-custom").parent("div").before("<p class=\"label-error\">Please setup the variant for the item first.</p>") 
	    
	}

	 
	return (isOkay && isOkay2);
}

 

function validateAttribute(dataview){
	$("div.step-holder").find("p.label-error").remove()
	var isOkay = true
	if(dataview=="item-review"){
		if ($("#table-attribute tbody").children().length == 0){
		   	$("div.step-holder > div.step-view[data-view=item-variants]").find("table.table-custom").parent("div").before("<p class=\"label-error\">Please create the attribute for the variant.</p>")
			return false;
		}
		// VALIDATE THE ITEM ATTRIBUTE
		$("#table-attribute").find("td > input").each(function(e){
			var elem = $(this)
	   		if($.trim(elem.val()).length == 0)
	   			isOkay= false;
		})
		if(!isOkay)
		   	$("div.step-holder > div.step-view[data-view=item-variants]").find("table.table-custom").parent("div").before("<p class=\"label-error\">Please input all this fields.</p>")

		// VALIDATE THE ITEM VARIANT
		var table = listObjTableBinded["listitemvariant"]
		if(table.data().length == 0){
	   		$("div.step-holder > div.step-view[data-view=item-variants]").find("#btn-itemvariantadd").after("<p class=\"label-error\">Please create the variant for the item</p>")
			isOkay= false;
		}
		else{
			$("table[data-table=listitemvariant] input.numeric").each(function(e){
				var elem = $(this)
		   		if($.trim(elem.val()).length == 0 && elem.val() == "0")
		   			isOkay= false;
			})  

			$("table[data-table=listitemvariant] input.numeric").each(function(e){
				var elem = $(this)
		   		if($.trim(elem.val()).length == 0 && elem.val() == "0")
		   			isOkay= false;
			}) 

			$("a.attribute-setup-show").each(function(e){
				var elem = $(this)
		   		if(elem.text().indexOf("Add") > 0)
		   			isOkay= false;
			}) 
			if(!isOkay){
		   		$("div.step-holder > div.step-view[data-view=item-variants]").find("#btn-itemvariantadd").after("<p class=\"label-error\">Please complete the variant details below.</p>")
				return	 isOkay	;
			}


 			if($("table[data-table=listitemvariant] td span.label-error").length > 0){
                
		   		//$("div.step-holder > div.step-view[data-view=item-variants]").find("#btn-itemvariantadd").after("<p class=\"label-error\">Invalid DPO Cost and SRP on the variants.</p>")
                isOkay = false;
            }	
		}
		
	}
	

	return isOkay;
}