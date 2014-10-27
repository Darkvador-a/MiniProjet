<?php  
if (empty($_GET)) {
    $pathPage = '../pages/accueil.php';
    $title = "Accueil";
} else {
    $pathPage = '../pages/' . $_GET['page'];
    $title = ucfirst($_GET['page']);
    if (! file_exists($pathPage)) {
        http_response_code(404); // le robot comprend qu'il y a une erreur
        $pathPage = '404.php';
    }
    $active = "?page=" . $_GET['page'];
}



ob_start();
require_once $pathPage;
$buffer = ob_get_clean();

    require_once '../layout/header.php';
    require_once '../layout/tab.php';
   


echo $buffer;


    require_once '../layout/footer.php';
  
   
 




