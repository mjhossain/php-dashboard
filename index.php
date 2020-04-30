<?php 

require('database.php');
session_start();

$message = "";

if(isset($_SESSION['username'])){
  header("Location: home.php");
} else {

}

if(isset($_POST['submit'])){

  

  $username = $_POST['username'];
  $password = $_POST['password'];
  $query = 'SELECT * FROM admin WHERE username="'.$username.'" AND password="'.$password.'" LIMIT 1';

  $result = mysqli_query($conn, $query);

  if(mysqli_num_rows($result) == 1) {
    while($row = mysqli_fetch_assoc($result)) {

      // echo $row['name'];

      $_SESSION['username'] = $row['username'];
      $_SESSION['name'] = $row['name'];
      $_SESSION['user_id'] = $row['id'];
    }
    header('Location: home.php');
  } else {
    $message = "Wrong username or password!";
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
    <div class="mx-auto mainBG">
      <div class="row justify-content-center align-items-center bodyWrapper">
        <div class="shadow col-sm-8 col-lg-4 offset-lg-5 p-5 loginBox">
         
            <h3 class="text-center">City Flex: Admin Dashboard</h3>
            <p class="text-center text-danger">
              <?php echo $message; ?>
            </p>
            <form class="" action="index.php" method="post" id="login_form">
              <input type="text" id="username" name="username" class="form-control formField mt-5" placeholder="Username">
              <br>
              <input type="password" id="password" name="password" class="form-control formField mb-4" placeholder="Password">
              <input type="submit" name="submit" value="Login" class="btn-primary btn-lg btn-block mb-5"></input>
            </form>
            <p class="text-center">Don't have an account?</p>
            <hr>
            <a href="register.php" class="btn-warning btn-lg btn-block text-center">Register</a>
         
        </div>
      </div>
    </div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>

<?php

mysqli_close($conn);

?>