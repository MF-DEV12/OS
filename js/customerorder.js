 $(function () {
      $('.tree li:has(ul)').addClass('parent_li').find(' > span').attr('title', 'Collapse this branch');


      $('.tree li.parent_li > span').on('click', function (e) {
          var children = $(this).parent('li.parent_li').find(' > ul > li');
          if (children.is(":visible")) {
              children.hide('fast');
              $(this).attr('title', 'Expand this branch').find(' > i').addClass('fa-plus-square').removeClass('fa-minus-square');
          } else {
              children.show('fast');
              $(this).attr('title', 'Collapse this branch').find(' > i').addClass('fa-minus-square').removeClass('fa-plus-square');
          }

          e.stopPropagation();
      });

      
      $('.tree li > span').on('click', function(e){
         var elem = $(this)
         var param = new Object(); 
         param.id = JSON.stringify(elem.data("id")) 
         bindBreadCrumb($("ol.breadcrumb"), elem.data("name")) 
         $(".tree span.active").removeClass("active")
         elem.addClass("active")
         // $('.tree li > span:not(.active)').closest("li").find("ul").children().hide()
         // elem.closest("li").find("ul").children().show()

         callAjaxJson("items/getItems", param, getItemsResponse, ajaxError)
       });
   
      
      $("button.cart").click(function(e){
          location.href= baseUrl + "/Items/cart";
      })

      $("dl#list-variation dd").hover(
        function(){
          var elem = $(this)
          var viewimage = elem.find("img").attr("src"); 

          $("img#item-image").attr("src", viewimage)

        },function(){
          var selectedimage = $("dl#list-variation dd.active").find("img").attr("src");  
          $("img#item-image").attr("src", selectedimage)


        } )

      $("dl#list-variation dd").click(function(e){
          var elem = $(this)
          $("dl#list-variation dd.active").removeClass("active");
          elem.addClass("active");
          $("span.item-price").text(toMoney(elem.data("price")))
          $("button.btn-addtocart").attr("onclick", "orderItem('"+   elem.data("item")  + "-"+  elem.data("variant") +"');")
      })

      $("span.btn-itemsearch").click(function(e){
        var elem = $(this)
        if($.trim(elem.prev("input").val()).length > 0 )
          location.href = baseUrl + "items?name=" + elem.prev("input").val()
      })
     
  });

function categorymenuClick(elem){

     elem = $(elem)
     var param = new Object(); 
     param.id = JSON.stringify(elem.data("id")) 
     bindBreadCrumb($("ol.breadcrumb"), elem.data("name")) 
     $(".tree span.active").removeClass("active")
     elem.addClass("active")
     callAjaxJson("Items/getItems", param, getItemsResponse, ajaxError)
}

function getItemsResponse(response){
    var data = response
    $("div.list-items").empty();  

    $("div.list-items").append("<div class=\"preloader2\"> <i class=\"fa fa-circle-o-notch fa-spin\"></i></div>")
    setTimeout(function(e){
          $("div.list-items").empty();  
          if(data.length){
            for(x in data){
                var item = ""
                item += "   <div class=\"col-xs-12 col-sm-6 col-md-4 col-lg-3 item\" title=\"Click to view\">"
                item += "      <div class=\"row\">"
                item += "        <div class=\"col-sm-12  item-holder\"  onclick=\"viewItems('"+ data[x].ItemNumber +"');\">"
                item += "          <img width=\"200px\" height=\"200px\" src=\"images/variant-folder/"+ data[x].ImageFile +"\" alt=\"\" onerror=\"this.src='"+ baseUrl  +"/images/noimage.gif';\"/>"
               
                item += "          <h4>"+ data[x].Name +"</h4>"
                item += "          <b>&#8369; "+ toMoney(data[x].Price) +"</b>"
                item += "        </div>"
                item += "        <div class=\"col-sm-12\">"
                item += "          <button class=\"btn btn-action btn-buy\" onclick=\"orderItem('"+ data[x].ItemNumber +"');\"  data-toggle=\"modal\" data-backdrop=\"static\"  data-keyboard=\"false\" data-target=\"#confirmcart\" style=\"width:100%;\">Buy</button> "
                item += "        </div> "
                item += "      </div>"
                item += "   </div>"
                $("div.list-items").append(item);  
            }
          }else{
            $("div.list-items").append("<p class=\"empty\">No item(s) found.</p>"); 
          } 
    },500) 

}

function bindBreadCrumb(ol, data){
    ol.empty();
    for(x = 0; x < data.length; x++){
      ol.append("<li class=\"breadcrumb-item "+ ((x == (data.length-1)) ? "active" : "") + "\">"+data[x]+"</li>");
    }

}

function orderItem(item){
    var param = new Object();
    param.id = item;
    callAjaxJson("Items/orderToCart", param, orderToCart, ajaxError) 
}

function orderToCart(response){
    var data = response;

    var modal = $("div#confirmcart")
    var item = data.item[0]
    $("span.countCart").text(data.carttotal)
    modal.find("carttotal").text(data.carttotal)
    modal.find(".cart-img").attr("src", baseUrl + "images/variant-folder/" + item.ImageFile)
    modal.find("name").text(item.Name)
    modal.find("category").text(item.Category)
    modal.find("price").text(toMoney(item.Price))
    modal.find("subtotal").text(toMoney(data.itemstotal))
    modal.find("total").text(toMoney(data.itemstotal))
}

function incDecQty(elem, qty){
    elem = $(elem)
    var tr = elem.closest("tr")
    var parentElem = elem.closest("div.btn-group")
    var qtyElem = parentElem.find(".qty")
    
    var newqty = parseInt(qtyElem.text(),10) + qty

    if(newqty == 0){return;}
    var param = new Object();
    param.id = parentElem.data("item")
    param.qty = newqty
    callAjaxJson("Items/updateItemQtyonCart", param,
        function(response){
            if(response){
              qtyElem.text(newqty)
              tr.find("span.cart-total").text( toMoney(parseFloat(toMoneyValue(tr.find("span.cart-price").text()),2) * parseFloat(newqty,2)) )

              var total = 0;
              $("table#table-cart").find("span.cart-total").each(function(e){
                  var row = $(this)
                  total += parseFloat(toMoneyValue(row.text()),2)
              })
              $("dl#order-summary").find("span.subtotal").html("&#8369; " + toMoney(total))
              $("dl#order-summary").find("span.total").html("<b>&#8369; " + toMoney(total) + "</b>")

            } 

        },
    ajaxError)  

}

function viewItems(item){
   location.href = baseUrl + "items/view?id="+item
}

function removeCart(elem, item){
    bootbox.re
    elem = $(elem)
    var tr = elem.closest("tr")
    var param = new Object()
    param.id = item;
    callAjaxJson("Items/removeCart", param, 
        function(response){
           var data = response
            if(data){
              $("span.countCart").text(data.carttotal)
              $("carttotal").text(data.carttotal)
              $("span.subtotal").html("&#8369; " + toMoney(data.itemstotal))
              $("span.total").html("<b>&#8369; " + toMoney(data.itemstotal) + "</b>")
              tr.remove()
            }
            
        }
      , ajaxError) 

}
 