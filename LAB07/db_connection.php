<?php
$servername = "localhost";   
$username = "poparina";
$password = "CEys4XwH";
$database = "poparina";

$connection = mysqli_connect($servername, $username, $password, $database);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
?>