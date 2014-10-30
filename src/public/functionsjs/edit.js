//Decalartion des vairables
var oldTitle = null;
var oldAddress = null;
var oldDescription = null;;
var oldLink=null;
var editButtonNb = $('.edit-button').length;


/**
 * Editer un element
 * @param id
 */
function edit(id){
	//Calcule le nombre de bouton d'edition
	 var editButtonNb = $('.edit-button').length;
	 for (i = 1; i != editButtonNb + 1; i++) {
	   $('#editbox-' + i).hide();
	 }
	 // Et on affiche les commandes d'edition
	 $('#editbox-commands-' + id).show();


oldTitle = $('#title-' + id).html();
oldAddress = $('#address-' + id).html();
oldDescription = $('#description-' + id).html();
oldLink= $('#link-' + id).html();


  // Puis on affiche les champs de texte
  $('#title-' + id).html('').html('<input type="text" id="new-title-' + id + '" size="20" value="' + oldTitle + '" />');
  $('#link-' + id).html('').html('<input type="text" id="new-link-' + id + '" size="20" value="' + oldLink + '" />');
  $('#address-' + id).html('').html('<input type="text" id="new-address-' + id + '" size="40" value="' + oldAddress + '" />');
  $('#description-' + id).html('').html('<textarea id="new-description-' + id + '" cols="20" rows="8">' + oldDescription + '</textarea>');
 
		
 }

 function Valide(id){
 	  // On commence par envoyer un message de chargement en haut et en bas du tableau (dans le cas d'un tableau long)
  $('.ajax-response').html('<img src="/img/loading.gif" alt="Loading" /> Enregistrement des modifications en cours...');

  // On recupere ensuite le contenu des champs
  var title = $('#new-title-' + id).val();
  console.log(title);
  if (title.length == 0) {
    $('.ajax-response').html('').html('<div class="error">Le titre ne peut être vide !</div>');
    return false;
  }
  var address = $('#new-address-' + id).val();
  if (address.length == 0 ) {
    $('.ajax-response').html('').html('<div class="error">l\'Adresse ne peut être nul !</div>');
    return false;
  }
  var link = $('#new-link-' + id).val();
  if (link.length == 0) {
    $('.ajax-response').html('').html('<div class="error">l\'URL ne peut etre vide  !</div>');
    return false;
  }
  var description = $('#new-description-' + id).val();
  if (description.length == 0) {
    $('.ajax-response').html('').html('<div class="error">La description ne peut être vide !</div>');
    return false;
  }
  $.ajax({
    url: 'edit.php',
    type: 'POST',
    data: {
      id : id,
      title : title,
      address : address,
      link : link,
      description : description
    },
    success: function(retour) {   
        // Si ce n'est pas le cas, on affiche les nouvelles informations
        $('.ajax-response').html('').html(retour);
        $('#title-' + id).html('').html(title);
        $('#address-' + id).html('').html(address);
        $('#link-' + id).html('').html(link);
        $('#description-' + id).html('').html(description);    
        $('#editbox-commands-' + id).hide();

        // Et on affiche les boutons d'edition
        for (i = 1; i != editButtonNb + 1; i++) {
            $('#editbox-' + i).show();
              
      }
    },
    error: function(obj, str, except) {
      $('.ajax-response').html('').html('<div class="error">Echec de la requête...</div>');    
      alert(str);
    }
  });
 }
 function Cancel(id){
  
 	// On supprimer les champs et on affiche les anciennes valeurs
  $('#title-' + id).html('').html(oldTitle);
  $('#address-' + id).html('').html(oldAddress);
  $('#link-' + id).html('').html(oldLink);
  $('#description-' + id).html('').html(oldDescription);
  // Enfin, on cache les boutons de confirmation ou d'annulation et ou affiche le bouton d'edition
  $('#editbox-commands-' + id).hide();
  var editButtonNb = $('.edit-button').length;
  for (i = 1; i != editButtonNb + 1; i++) {
    $('#editbox-' + i).show();
  }


 }