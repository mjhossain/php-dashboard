<?php


require('functions.php');

$dbHost = "HOSTNAME_HERE";
$dbName = "DATABASE_NAME_HERE";
$dbUser = "DATABASE_USERNAME_HERE";
$dbPass = "DATABSE_PASSWORD_HERE";

$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

// check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


 ?>
