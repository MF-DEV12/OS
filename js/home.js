$(function(){
	

 function initialize() {
     var mapCanvas = document.getElementById('googleMap');
     var myLatlng = new google.maps.LatLng(14.698064,121.032589);
      var mapOptions = {
        center: myLatlng,
        zoom: 15,
        mapTypeId: google.maps.MapTypeId.ROADMAP

      } 
   	   map = new google.maps.Map(mapCanvas, mapOptions)


      var marker = new google.maps.Marker({
	    position: myLatlng,
	    title:"J.M.R. Furniture"
	  });

     

      marker.setMap(map);
    }
	
})