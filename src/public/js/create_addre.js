//Déclaration des variables
var title;
var description;
var link;
var address;
/**
 * DisplayTable
 * @returns
 */
function displayTable(){
	table = $("#table_id").DataTable();
	return table;
}
/**
 * Requete Ajax pour ajout d'une nouvelle adresse
 * @returns
 */
function ajaxCreateAddress(data){
	$.ajax({
		url: "../create_address.php",
		type: "POST",
		data: data,
		dataType:"json",
		cache: false,
		success: function(data) {
			 var editButtonNb = $('.edit-button').length +1;
			// Message de success
			$('#success').html("<div class='alert alert-success'>");
			$('#success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
			.append("</button>");
			$('#success > .alert-success')
			.append("<strong>L'ajout de la nouvelle adresse est faite!!. </strong>");
			$('#success > .alert-success')
			.append('</div>');
			//Ajout de l'element à la table	      
	         var id= data["0"]["id"];
	         var title="<td id='title-"+editButtonNb+"'>" +data["0"]["title"] + "</td>";
	         var button="<p id='editbox-button-"+id+"'>"+
                        "<span id='editbox-"+editButtonNb+"'>"+
                        "<button class='btn btn-danger delete' onclick='Delete("+id+")'>Supprimer</button>"+
						"<button class='btn btn-success edit-button' onclick='edit("+id+")'>Editer</button>"+
						 "</span></p>"+
					     "<p id='editbox-commands-"+id+"' style='display: none;'>"+
                        "<button class='btn btn-success' id='edit-book-validate-$id' onclick='Valide("+id+")'>Valide</button> ou"+
                        "<button class='btn btn-primary'  id='edit-book-cancel-$id' onclick='Cancel("+id+")' >Cancle</button></p>";
			 table.row.add([
			               title,
			               data["0"]["description"],
			               data["0"]["address"],
			               data["0"]["url"],
			               button
			               ]).draw();
  	       ajoutMarkup(data);
			 
		},
		error: function() {
			// Fail message
			$('#success').html("<div class='alert alert-danger'>");
			$('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
			.append("</button>");
			$('#success > .alert-danger').append("<strong>Sorry, Erreur!");
			$('#success > .alert-danger').append('</div>');
			//clear all fields
			$('#createForm').trigger("reset");
		},
	});
}
	
function ajoutMarkup(data){
	console.log(map);
	
    var myGeocoder = new google.maps.Geocoder();
    var GeocoderOptions = {
  		  'address' :data['0']['address'],
  	      'region' : 'FR'
	    };
    myGeocoder.geocode(GeocoderOptions, function( results , status ){
        var myAddress = data['0']['address'];
        var myTitle = data['0']['title'];
        var myMarker=data['0']['id'];          
        tabMarker.push(myMarker);
      	  if( status == google.maps.GeocoderStatus.OK ) {        
      	           	   
      	    // On créé donc un nouveau marker sur l'adresse géocodée
      	   myMarker = new google.maps.Marker({
      	      position: results[0].geometry.location,
      	      map: map,
      	      title: myTitle
      	    });
        	    
     	       //Info Bulle
            	  var contentString = '<div id="content" style="color:#000;">'+
                '<div id="siteNotice">'+
                '</div>'+
                '<h1 id="firstHeading" class="firstHeading">'+myTitle+'</h1>'+
                '<div id="bodyContent">'+
                '<p>'+data['0']['description']+'</p>'+
                '<a href="http://'+data['0']['url']+'">Lien</a>'
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
	
}

/**
 * Tester la validation du formulaire
 */
$(function() {
	$(".form-control").jqBootstrapValidation({
		preventSubmit: true,
		submitError: function($form, event, errors) {
			// additional error messages or events
		},
		submitSuccess: function(form, event) {
			event.preventDefault(); // prevent default submit behaviour
			// get values from FORM
			var title = $("input#create-title").val();
			var description = $("textarea#create-description").val();
			var address = $("input#create-address").val();
			var link = $("input#create-link").val();
			var data  =  {
					title:title, 
					description:description ,
					address:address, 
					link:link
			};
			ajaxCreateAddress(data);
		},
		filter: function() {
			return $(this).is(":visible");
		}
	});

	$("a[data-toggle=\"tab\"]").click(function(e) {
		e.preventDefault();
		$(this).tab("show");
	});
	
	/*When clicking on Full hide fail/success boxes */
	$('#name').focus(function() {
		$('#success').html('');
	});
});