<?php 

require('database.php');
session_start();

$message = "";

if(isset($_SESSION['username'])){
  header("Location: home.php");
} else {

}

if(isset($_POST['submit'])){

  

  $username = safeInput($_POST['username']);
  $password = mysqli_real_escape_string($_POST['password']);
  

  $query = "SELECT * FROM admin WHERE username='$username'";

  $result = mysqli_query($conn, $query);

  if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {

      if(password_verify($password, $row['password'])) {
        $_SESSION['username'] = $row['username'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['admin_id'] = $row['id'];

        header('Location: home.php');
      } 
    } 
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
            <p class="text-center text-danger" id="form-message">
              <?php echo $message; ?>
            </p>
            <form class="" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" id="login_form" onsubmit="return validateLogin()">
              <input type="text" id="username" name="username" class="form-control formField mt-5" placeholder="Username">
              <br>
              <input type="password" id="password" name="password" class="form-control formField mb-4" placeholder="Password">
              <input type="submit" name="submit" value="Login" class="btn-primary btn-lg btn-block mb-5" id="login_btn"></input>
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
<script type="text/javascript">
function validateLogin() {

var login_userName = document.getElementById('username');
var login_password = document.getElementById('password');
var formMsg = document.getElementById('form-message');


if (login_userName.value == '' || login_password.value == '') {




    if (login_userName.value == '' && login_password.value != '') {
        login_userName.classList.add('wrong-input');
        if (login_password.classList.contains('wrong-input')) {
            login_password.classList.remove('wrong-input');
        }
    } else if (login_password.value == '' && login_userName.value != '') {
        login_password.classList.add('wrong-input');

        var regex = /\W/g;
        if (regex.test(login_userName.value) == true) {
            login_userName.classList.add('wrong-input');
        } else if (login_userName.classList.contains('wrong-input')) {
            login_userName.classList.remove('wrong-input');
        }
    } else if (login_userName.value == '' || login_password.value == '') {
        login_userName.classList.add('wrong-input');
        login_password.classList.add('wrong-input');
    }

    return false;

} else {

    var regex = /\W/g;
    if (regex.test(login_userName.value) == true) {
        login_userName.classList.add('wrong-input');
        return false;
    } else {
        return true;
    }


}
}

</script>
</body>
</html>

<?php

mysqli_close($conn);

?>
