<?php 

$servername = "localhost";
$database = "pwd_2441919016";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password, $database);

if(!$conn){
    die("Koneksi gagal: ". mysqli_connect_error());
};


?>