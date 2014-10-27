<?php 

/** Connexion ***/

function connexion () {


    $dsn = 'mysql:dbname=mini_projet;hoste=localhost';
    $user = 'mini_projet';
    $password = '0000';
    
    try {
        $dbh = new PDO($dsn, $user, $password);
    } catch (PDOException $e) {
        echo 'Connexion échouée : ' . $e->getMessage();
    }
    return $dbh;


}