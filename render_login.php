<?php
session_start();

require_once 'vendor/autoload.php';
$loader = new Twig_Loader_Filesystem('templates');
$twig = new Twig_Environment($loader);

$error = 0;
if (isset($_SESSION['user'])) {
    
    echo $twig->render('login.html');
} else{    
    echo $twig->render('login.html', ['error' => $error] );
}