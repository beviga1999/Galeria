<?php

session_start();

$user = $_POST["user"];
$passwd = $_POST["pass"];
// connect to mySQL
$servername = "localhost";
$username = "root";
$password = "";
$database = "web";
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Connection failed: ". mysqli_connect_error());
}
else{
echo "Connected succesfully"."<br>";}

//select from user where
$query = "SELECT pass FROM usuarios WHERE user = '$user'";
$result = mysqli_query($conn, $query);
//var_dump($result);
$row = mysqli_fetch_array($result, MYSQLI_NUM);
$hash = $row[0];
if (password_verify($passwd, $hash)){
   
    $_SESSION['usuario'] = $user;
    $_SESSION['error'] = 0;

    header("Location: ../index.html");

} else {

    $_SESSION['error'] = 1;
    echo header('Location: '.'../prueba.php');

}
?>