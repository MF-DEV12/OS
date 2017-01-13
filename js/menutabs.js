 jQuery(document).ready(function($) {
     $(".multitab-widget-content-widget-id").hide();
     $("ul.multitab-widget-content-tabs-id li:first a").addClass("multitab-widget-current").show();
     $(".multitab-widget-content-widget-id:first").show();
     $("ul.multitab-widget-content-tabs-id li a").click(function() {
     	 // if()
         $("ul.multitab-widget-content-tabs-id li a").removeClass("multitab-widget-current a");
         $(this).addClass("multitab-widget-current");
         $(".multitab-widget-content-widget-id").hide();

         var position = $(this).closest("li").position();
         var elem = $(this)
         var li  = elem.closest("li")
         var ul  = li.closest("ul")
  		 var halfleft = ul.width / 2


  		 // if()


     //     $(".multitab-widget").animate({

     //     	scrollLeft: (position.left + (((ul.width / 2) > position.left) ? 150 : -200))
     //     }, 500);
     //      position = $(this).closest("li").position();
         // console.log(ul.width())
  		 console.log("new->" + position.left)
      
         var activeTab = $(this).attr("href");
         $(activeTab).fadeIn();
         return false;
     });
 });