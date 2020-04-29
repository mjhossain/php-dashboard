<?php 

require('database.php');

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM userTest WHERE id =". $id;
    if(mysqli_query($conn, $query)){
        $message = "Deletion Success!";
        header("Location: members.php");
    } else {
        $message = "Deletion Failed!";
        header("Location: members.php");
    }
}


mysqli_close($conn);

?>