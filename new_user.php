<?php
session_start();

require_once 'vendor/autoload.php';
$loader = new Twig_Loader_Filesystem('templates');
$twig = new Twig_Environment($loader);
//read from the formulary (login.html)
//user / password
$newuser = $_POST["new_user"];
$newpasswd = $_POST["new_passwd"];
// connect to mySQL
$servername = "localhost";
$username = "root";
$password = "";
$db = "web";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);
// Check connection
/*
if (!$conn) {
    die("Connection failed: ". mysqli_connect_error());
}
else{
echo "Connected succesfully"."<br>";}
*/
//select from user where
echo $newpasswd;
$hash = password_hash($newpasswd, PASSWORD_DEFAULT);
$query = "INSERT INTO usuarios (user, pass) VALUES ('$newuser', '$hash');";

$result = mysqli_query($conn, $query);
echo $twig->render("new_user.html");

