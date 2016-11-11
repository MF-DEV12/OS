jQuery(document).ready(function($){
	//move nav element position according to window width
	moveNavigation();
	$(window).on('resize', function(){
		(!window.requestAnimationFrame) ? setTimeout(moveNavigation, 300) : window.requestAnimationFrame(moveNavigation);
	});

	//mobile version - open/close navigation
	$('.cd-nav-trigger').on('click', function(event){
		event.preventDefault();
		if($('header').hasClass('nav-is-visible')) $('.moves-out').removeClass('moves-out');
		
		$('header').toggleClass('nav-is-visible');
		$('.cd-main-nav').toggleClass('nav-is-visible');
		$('.cd-main-content').toggleClass('nav-is-visible');
	});

	//mobile version - go back to main navigation
	$('.go-back').on('click', function(event){
		event.preventDefault();
		$('.cd-main-nav').removeClass('moves-out');
	});

	//open sub-navigation
	$('.cd-subnav-trigger').on('click', function(event){
		event.preventDefault();
		$('.cd-main-nav').toggleClass('moves-out');
	});

	$('.cd-main-nav a').click(function(e){
		var elem = $(this)
		$('.cd-main-nav li').removeClass("active")
		elem.closest("li").addClass("active")
		if(elem.attr("href").indexOf("#") >= 0){

			var a = elem.attr("href").replace("#","")
			$("nav.sub-menu").find("ul.selected-sub-menu").removeClass("selected-sub-menu")
			$("nav.sub-menu").find("ul."+a).addClass("selected-sub-menu")
			$(".cd-nav-trigger").click();
		}
	})

	$("nav.sub-menu a").click(function(e){
		var elem = $(this)
		var ul = elem.closest("ul");
		ul.find("li.current").removeClass("current")
		elem.closest("li").addClass("current")
	})




	function moveNavigation(){
		var navigation = $('.cd-main-nav-wrapper');
  		var screenSize = checkWindowWidth();
        if ( screenSize ) {
        	//desktop screen - insert navigation inside header element
			navigation.detach();
			navigation.insertBefore('.cd-nav-trigger');
		} else {
			//mobile screen - insert navigation after .cd-main-content element
			navigation.detach();
			navigation.insertAfter('.cd-main-content');
		}
	}

	function checkWindowWidth() {
		var mq = window.getComputedStyle(document.querySelector('header'), '::before').getPropertyValue('content').replace(/"/g, '').replace(/'/g, "");
		return ( mq == 'mobile' ) ? false : true;
	}

	 


});