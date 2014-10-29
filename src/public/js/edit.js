function edit(id){
	console.log(id);
	 var editButtonNb = $('.edit-button').length;
	 console.log(editButtonNb);
	 for (i = 1; i != editButtonNb + 1; i++) {
	   $('#editbox-button-' + i).hide();
	   console.log($('#editbox-button-' + i));
	 }
	 // Et on affiche les commandes d'edition
	 $('#editbox-commands-' + id).show();
		
 }