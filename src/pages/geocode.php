<?php
require_once '../base/address.php';
$addressAll=readAll();
foreach ($addressAll as $val){
    
    $address=$val['address'];
    $title=$val['title'];
    $description=$val['description'];
    $link=$val['url'];
    $geocoder = "http://maps.googleapis.com/maps/api/geocode/json?address=%s&sensor=false";
    $myMarker=$title;
    
    
// Pour cette exemple, je vais considérer que ma chaîne n'est pas
// en UTF8, le géocoder ne fonctionnant qu'avec du texte en UTF8
$url_address = utf8_encode($address);
 
// Penser a encoder votre adresse
$url_address = urlencode($url_address);
 
// On prépare notre requête
$query = sprintf($geocoder,$url_address);
 
// On interroge le serveur
$results = file_get_contents($query);
//var_dump($results);
// On affiche le résultat
//var_dump(json_decode($results));


}