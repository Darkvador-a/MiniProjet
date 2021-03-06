<?php
require_once '../base/address.php';
// Check for empty fields

if (isset($_POST) && isset($_POST["send"]) == "submit") {
    
    $valid_formats = array(
        "csv"
    );
    $path = "../upload/";
    if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
        $name = $_FILES['filebutton']['name']; // get the name and size of the file to be uploaded.
        $size = $_FILES['filebutton']['size'];
        
        if (strlen($name)) {
            
            $actual_image_name = $name;
            $tmp = $_FILES['filebutton']['tmp_name']; /* get the temperorary location of the file on the server */
            if (move_uploaded_file($tmp, $path . $actual_image_name)) {
                var_dump($path . $name);
                $filename = $path . $name;
                
                $handle = fopen($filename, 'r');
                while (! feof($handle)) {
                    $aim = (fgetcsv($handle, 1000, ";"));
                    var_dump($aim);
                    $data = array(
                        'title' => $aim[0],
                        'description' => $aim[1],
                        'address' => $aim[2],
                        'link' => $aim[3]
                    );
                    
                    var_dump($data);
                    import($data);
                    
                    // Write all the user records to the database
                }
                echo $name . " " . "Imported";
                fclose($handle);
            } else
                echo "failed";
        } 

        else
            echo "Please select file..!";
    }
} elseif (empty($_POST['title']) || empty($_POST['description']) || empty($_POST['address']) || empty($_POST['link'])) {
    return false;
    
} else {
    //Si c'est pas vide, ajout le nouveau element
    $idCreate = creat($_POST);
    if (!empty($idCreate)) {
        $address = findById($idCreate);
        $myJsonData= json_encode($address);
       echo $myJsonData;
    } else
        echo "echec !";
}
