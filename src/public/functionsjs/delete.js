
function Delete (id){
	console.log("id: "+id);
	
	$.ajax ({
		 url: "../delete.php",
		 type: 'GET',
		 data: {id:id},		
	})
	.done(function(data) {
	  alert("success");
	  table.row('#tr-'+id).remove().draw( false );
	  console.log(tabMarker);
	  for (var i = 0; i < tabMarker.length; i++) {
   			 console.log(tabMarker[i].id);
   			 if(tabMarker[i].id== id){
   			 	
   			  tabMarker[i].setMap(null);
   			}
  		}
	  
	  
	  })
	.fail (function(){
		console.log("fail");
	})
	.always(function(){
		console.log("always");
	});	
}

