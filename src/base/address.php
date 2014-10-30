<?php
require_once '../functions/connexion.php';

/**
 *
 * @param unknown $data            
 * @return unknown
 */
function creat($data)
{
    $result = true;
    $connect = connexion();
    
    $sql = 'INSERT INTO `mini_projet`.`address` (`id`, `address`, `title`, `description`, `url`) 
			VALUES (NULL, :address, :title, :description, :link);';
    $sth = $connect->prepare($sql);
    $sth->execute(array(
        'address' => $data['address'],
        'title' => $data['title'],
        'description' => $data['description'],
        'link' => $data['link']
    ));
    if ($sth->errorCode() != '00000' && $sth->errorCode() !== NULL) {
        echo $sth->errorInfo()[2];
        $result = false;
    }
    
    return $connect->lastInsertId();
}

function import($data)
{
    $connect = connexion();
    $sql = 'INSERT INTO `mini_projet`.`address` (`id`, `address`, `title`, `description`, `url`) 
			VALUES (NULL, :address, :title, :description, :link);';
    $sth = $connect->prepare($sql);
    $sth->execute(array(
        'address' => $data['address'],
        'title' => $data['title'],
        'description' => $data['description'],
        'link' => $data['link']
    ));
}

/**
 *
 * @return multitype:
 */

function readAll()
{
    $connect = connexion(); 
    $sql = "SELECT * FROM address";
    $sth = $connect->prepare($sql);
    $sth->execute();
    $address = $sth->fetchAll(PDO::FETCH_ASSOC); // Retrieves a string array
    
    return $address;
}


/**
 *
 * @param unknown $id            
 * @return multitype:
 */
function findById($id)
{
    $connect = connexion();
    $sql = "SELECT * FROM address WHERE `address`.`id` =$id;";
    $sth = $connect->prepare($sql);
    $sth->execute();
    if ($sth->rowCount() > 1) {
        // ERREUR FATALE
    }
    $user = $sth->fetchAll(PDO::FETCH_ASSOC); // Retrieves a string array
    return $user;
}

/**
 *
 * @param unknown $id            
 * @return boolean
 */
function delete($id)
{
    $result = true;
    $connect = connexion();
    $sql = "DELETE FROM  `address` WHERE  `address`.`id` =$id;";
    $sth = $connect->prepare($sql);
    $sth->execute();
    if ($sth->errorCode() != '00000' && $sth->errorCode() !== NULL) {
        echo $sth->errorInfo()[2];
        $result = false;
    }
    
    return $result;
}

/**
 *
 * @param unknown $data            
 * @return boolean
 */
function update($data)
{
    
    $result = true;
    $connect = connexion();
    $sql = "UPDATE  `mini_projet`.`address` SET  `address` =  :address ,`title` =  :title, `description`=:description,
         `url` = :link WHERE `address`.`id`= :id ;";
    $sth = $connect->prepare($sql);
    $sth->execute(array(
        'id'=>$data['id'],
        'address' => $data['address'],
        'title' => $data['title'],
        'description' => $data['description'],
        'link' => $data['link']
    ));
    if ($sth->errorCode() != '00000' && $sth->errorCode() !== NULL) {
        echo $sth->errorInfo()[2];
        $result = false;
    }
    
    return $result;
}