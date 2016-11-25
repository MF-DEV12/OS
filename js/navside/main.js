jQuery(document).ready(function($){
	//move nav element position according to window width
	// moveNavigation();
	// $(window).on('resize', function(){
	// 	(!window.requestAnimationFrame) ? setTimeout(moveNavigation, 300) : window.requestAnimationFrame(moveNavigation);
	// });

	// //mobile version - open/close navigation
	// $('.cd-nav-trigger').on('click', function(event){
	// 	event.preventDefault();
	// 	if($('header').hasClass('nav-is-visible')) $('.moves-out').removeClass('moves-out');
		
	// 	$('header').toggleClass('nav-is-visible');
	// 	$('.cd-main-nav').toggleClass('nav-is-visible');
	// 	$('.cd-main-content').toggleClass('nav-is-visible');
	// });

	// //mobile version - go back to main navigation
	// $('.go-back').on('click', function(event){
	// 	event.preventDefault();
	// 	$('.cd-main-nav').removeClass('moves-out');
	// });

	// //open sub-navigation
	// $('.cd-subnav-trigger').on('click', function(event){
	// 	event.preventDefault();
	// 	$('.cd-main-nav').toggleClass('moves-out');
	// });

	// $('.cd-main-nav a').click(function(e){
	// 	var elem = $(this)
	// 	$('.cd-main-nav li').removeClass("active")
	// 	elem.closest("li").addClass("active")
	// 	if(elem.attr("href").indexOf("#") >= 0){

	// 		var a = elem.attr("href").replace("#","")
	// 		// SUB MENU
	// 		$("nav.sub-menu").find("ul.selected-sub-menu").removeClass("selected-sub-menu")
	// 		$("nav.sub-menu").find("ul."+a).addClass("selected-sub-menu")

	// 		// CONTENT GROUP
	// 		$("div.content-holder .content-group.show").removeClass("show");
	// 		$("div.content-holder .content-group[data-group='"+ a +"']").addClass("show");
	// 		$("nav.sub-menu").find("ul."+a).find("li.current a").click()
			 

	// 		$(".cd-nav-trigger").click();
	// 	}
	// })

	$("div.sidebar ul.nav a").click(function(e){
		var elem = $(this)
		var ul = elem.closest("ul");
		var li = elem.closest("li");
		if(li.data("content") === undefined){return;}
		ul.find("li.current").removeClass("current")
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

        // RESET PAGE 
        var currentList = $("div.content .content-group.show .content-list.show")
        currentList.find(".main-button").show();
        currentList.find(".btn-group").hide(); 
        currentList.find(".dataTables_wrapper").show();
        currentList.find(".content-child").hide();




	 	//$('.content').removeClass('isOpen');
	 
	})


	$('span.button').on('click', function() {
		$('.content').toggleClass('isOpen');
	});
 


	// function moveNavigation(){
	// 	var navigation = $('.cd-main-nav-wrapper');
 //  		var screenSize = checkWindowWidth();
 //        if ( screenSize ) {
 //        	//desktop screen - insert navigation inside header element
	// 		navigation.detach();
	// 		navigation.insertBefore('.cd-nav-trigger');
	// 	} else {
	// 		//mobile screen - insert navigation after .cd-main-content element
	// 		navigation.detach();
	// 		navigation.insertAfter('.cd-main-content');
	// 	}
	// }

	// function checkWindowWidth() {
	// 	var mq = window.getComputedStyle(document.querySelector('header'), '::before').getPropertyValue('content').replace(/"/g, '').replace(/'/g, "");
	// 	return ( mq == 'mobile' ) ? false : true;
	// }

	 


});