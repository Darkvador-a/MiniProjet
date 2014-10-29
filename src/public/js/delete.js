
function Delete (id){
	console.log("id: "+id);
	
	$.ajax ({
		 url: "../delete.php",
		 type: 'GET',
		 data: {id:id},		
	})
	.done(function(data) {
	  alert("success");
	   
	    table.api().ajax.reload();
	  })
	.fail (function(){
		console.log("fail");
	})
	.always(function(){
		console.log("always");
	});	
}

