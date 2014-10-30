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

if ($pathPage == "404.php") {
    
    echo $buffer;
} 

else {
    $ajax=false;
    if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        // Traitement pour une requête AJAX
        $ajax = TRUE;
    }
    if (! $ajax) {
        require_once '../layout/header.php';
        require_once '../layout/tab.php';
     }   
        echo $buffer;
    if (! $ajax) {
        require_once '../layout/footer.php';
    }
}
 




