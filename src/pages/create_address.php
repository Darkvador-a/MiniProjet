<?php
require_once '../base/address.php';
// Check for empty fields

if (isset($_POST['form']) == "importForm" && ! empty($_POST)) {
    $row = 1;
    if (($handle = fopen($_POST["importData"], "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            var_dump($data);        
        }
        fclose($handle);
    }
} elseif (empty($_POST['title']) || empty($_POST['description']) || empty($_POST['address']) || empty($_POST['link'])) {
    echo "No arguments Provided!";
    return false;
} else {
    $address = creat($_POST);
}

return true;