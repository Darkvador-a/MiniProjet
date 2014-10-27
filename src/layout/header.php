<?php 

if (! isset($afterBootstrap)) {
    $afterBootstrap = NULL;
}
echo '<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">

    <title>One page</title>

    <link href="assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/freelancer.css" rel="stylesheet">
      ' . $afterBootstrap . '
    <!-- Custom Fonts -->
    <link href="assets/fontawesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
</head>
<body id="page-top" class="index">
    
     <!-- Header -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <img class="img-responsive" src="img/profile.png" alt="">
                    <div class="intro-text">
                        <span class="name">Mini Projet</span>
                        <hr class="star-light">
                        <span class="skills">Address Into The World</span>
                    </div>
                </div>
            </div>
        </div>
    </header>';