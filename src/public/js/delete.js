
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
	  console.log(id);
	  for(var i =0; i<tabMarker.size;i++){
		  if(tabMarker[i]==id){
			  console.log(tabMarker[i]);
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

