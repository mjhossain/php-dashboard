<?php

require('dbDetails.php');

$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

// check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
  echo "Connected successfull";
}


 ?>
