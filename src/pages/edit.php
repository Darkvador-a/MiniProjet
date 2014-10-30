<?php 
require_once '../base/address.php';

if (isset($_POST) && !empty($_POST)) {
  // Verifications
  if (strlen($_POST['title']) == 0) {
    echo '<div class="error">Le titre ne peut être vide !</div>';
    exit();
  }
  elseif (strlen($_POST['link']) == 0 ) {
    echo '<div class="error">L\'URL ne peut être nul !</div>';
    exit();
  }
  elseif (strlen($_POST['address']) == 0) {
    echo '<div class="error">Vous devez entrer l\' address !</div>';
    exit();
  }
  elseif (strlen($_POST['description']) == 0) {
    echo '<div class="error">Vous devez entrer une description !</div>';
    exit();
  }
  else {
    // Si tout est bon, on continue
    $isUpdate = update($_POST);
    if ($isUpdate) {
      echo '<div class="accept">L\'address de ' . $_POST['title'] . ' a été modifié avec succès !';
      exit();
    }
    else {
      echo '<div class="error">Une erreur est survenue lors de la requête</div>';
      exit();
    }
  }
}
else {
  echo '<div class="error">Vous n\'avez envoyé aucune donnée. Repassez quand vous en aurez !</div>';
  exit();
}