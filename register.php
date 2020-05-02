
<?php

require('database.php');

session_start();

if(isset($_SESSION['username'])) {
  header('Location: home.php');
} else {

}

if(isset($_POST['submit'])) {
  $name = safeInput($_POST['fullname']);
  $username = safeInput($_POST['username']);
  $password = safeInput($_POST['password']);

  $query = "INSERT INTO admin(name, username, password) VALUES ('".$name."','".$username."','".$password."')";

  if (mysqli_query($conn, $query)) {
    session_unset();
    header("Location: index.php");
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
  }

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>City Flex</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/master.css">
  </head>
  <body>
    <div class="mx-auto registerBG">
      <div class="row align-items-center bodyWrapper">
        <div class="shadow col-md-4 offset-md-2 p-5 registerBox">
          <h3 class="text-center">Join City Flex</h3>
          <form onsubmit="return validateRegistration()" class="" action="register.php" method="post">
            <input type="text" id="fullname" name="fullname" class="form-control formField mt-5" placeholder="Full name">
            <br>
            <input type="text" id="username" name="username" class="form-control formField" placeholder="Username">
            <br>
            <input type="password" id="password" name="password" class="form-control formField" placeholder="Password">
            <br>
            <input type="password" id="re-password" name="re-password" class="form-control formField mb-4" placeholder="Re-enter password">
            <input type="submit" name="submit" value="Register" class="btn-primary btn-lg btn-block mb-4"/>
          </form>
          <p class="text-center">Already have an account?</p>
          <hr>
          <a href="index.php" name="register" class="btn-warning btn-lg btn-block text-center">Login</a>
        </div>
      </div>
    </div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="script.js"></script>
</body>
</html>
