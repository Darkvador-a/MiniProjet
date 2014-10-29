<?php 
require_once 'geocode.php';
?>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
<script>
        var map;
        function initialize() {
        	// Une variable pour contenir notre future marker
        	myMarker = null;
         
        	// Des coordonnées de départ
        	var myLatlng = new google.maps.LatLng(-34.397, 150.644);
         
          var mapOptions = {
            zoom: 8,
            center: new google.maps.LatLng(-34.397, 150.644)
          };
          /**  Création de la carte **/
          map = new google.maps.Map(document.getElementById('map-canvas'),
              mapOptions);   
              
      <?php $addressAll=readAll();?>
      <?php foreach ($addressAll as $val){?> 
      var myGeocoder = new google.maps.Geocoder();
      var GeocoderOptions = {
    		  'address' :"<?=$val['address']; ?>",
    	      'region' : 'FR'
  	    };
      myGeocoder.geocode(GeocoderOptions, function( results , status ){
          var myAddress = "<?=$val['address']; ?>";
          var myTitle = "<?= $val['title']; ?>";
          var myMarker=myTitle;          
        
        	
            	console.log(myTitle);
     
        	  if( status == google.maps.GeocoderStatus.OK ) {        
        	           	   
        	    // On créé donc un nouveau marker sur l'adresse géocodée
        	   myMarker = new google.maps.Marker({
        	      position: results[0].geometry.location,
        	      map: map,
        	      title: myTitle
        	    });
          	    console.log(myMarker);
       	       //Info Bulle
              	  var contentString = '<div id="content" style="color:#000;">'+
                  '<div id="siteNotice">'+
                  '</div>'+
                  '<h1 id="firstHeading" class="firstHeading">'+myTitle+'</h1>'+
                  '<div id="bodyContent">'+
                  '<p>'+'<?=$val['description']; ?>'+'</p>'+
                  '<a href="http://'+"<?=$val['url']; ?>"+'">Lien</a>'
                  '</div>'+
                  '</div>';

                  var infowindow = new google.maps.InfoWindow({
                  content: contentString
                  });
               
        	     map.setCenter(results[0].geometry.location);

                google.maps.event.addListener(myMarker, 'click', function() {
                    console.log(myMarker);
                infowindow.open(map,myMarker);
                });
        	  } 
        	});	    
       	 <?php }?> 
         }
       
      
         google.maps.event.addDomListener(window, 'load', initialize);

</script>

<!-- Google api Section -->
<section class="success" id="googleApi">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<h2>google api</h2>
				<hr class="star-light">
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 ">
				<div id="map-canvas"></div>
			</div>
		</div>
	</div>

</section>

<style>
html,body,#map-canvas {
	height: 450px;
	widht: 100%
}
</style>

