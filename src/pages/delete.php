<?php
require_once '../base/address.php';

if(isset($_GET) && !empty($_GET)){
    
     $result =delete($_GET['id']);
     if($result){
        return true;
        
         
     }else return false;
    
}