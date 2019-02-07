<?php

session_start();

require_once 'vendor/autoload.php';
$loader = new Twig_Loader_Filesystem('Templates');
$twig = new Twig_Environment($loader);

$user = $_POST["user"];
$passwd = $_POST["pass"];

// connect to mySQL
$servername = "localhost";
$username = "root";
$password = "";
$database = "web";
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection

//select from user where
$query = "SELECT pass FROM usuarios WHERE user = '$user'";
$result = mysqli_query($conn, $query);
//var_dump($result);
$row = mysqli_fetch_array($result, MYSQLI_NUM);
//$hash = $row[0];
if ($row && password_verify($passwd, $row[0])){
   
    $_SESSION['usuario'] = $user;
    

    //header("Location: ../index.html");

    //echo $twig->render('login.html', ['error' => $error ] );

    echo $twig->render('index.html');

} else {

    
    //header('Location: '.'../prueba.php');

    echo $twig->render('login.html', ['error' => 1] );

   //echo $twig->render('login.html');
}
?>