
<?php

require('database.php');

session_start();

$register_message = "";

if(isset($_SESSION['username'])) {
  header('Location: home.php');
} else {

}

if(isset($_POST['submit'])) {

  
  $name = safeInput($_POST['fullname']);
  $username = safeInput($_POST['username']);
  $password = $_POST['password'];

  $nameValidation = testName($name);
  $usernameValidation = testUsername($username);
  $passwordValidation = testPassword($password);

  if($nameValidation == false || $usernameValidation == false || $passwordValidation == false) {
    $register_message = "Wrong username or password or name, please make sure to enter correct data!";
  } else {
    $hashedPassword = hashPassword($password);
    $query = "INSERT INTO admin(name, username, password) VALUES ('".$name."','".$username."','".$hashedPassword."')";

    if (mysqli_query($conn, $query)) {
      session_unset();
      header("Location: index.php");
      } else {
          echo "Error: " . $query . "<br>" . mysqli_error($conn);
      }
      
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
          <small><?php echo $register_message; ?></small>
          <form onsubmit="return checkForm();" class="" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" id="register-form">
            <input type="text" id="fullname" name="fullname" class="form-control formField mt-5" placeholder="Full name" value="<?php echo isset($name) ? $name : ""; ?>">
            <br>
            <input type="text" id="username" name="username" class="form-control formField" placeholder="Username" value="<?php echo isset($username) ? $username : ""; ?>">
            <small id="usernameHelper" class="form-text hidden">Your username must be at least 8 characters long and can only contain letters, numbers and underscores.</small>
            <br>
            <input type="password" id="password" name="password" class="form-control formField" placeholder="Password" value="<?php echo isset($password) ? $password : ""; ?>">
            <small id="pwdHelper" class="form-text hidden">
            Your password must be 8-20 characters long, contain at least 1 upper & lowercase letter, 1 symbol and 1 number.</small>
            <br>
            <input type="password" id="repassword" name="repassword" class="form-control formField mb-4" placeholder="Re-enter password">
            <small id="rePwdHelper" class="form-text hidden">Passwords must match.</small>
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
<!-- <script src="script.js"></script> -->
<!-- <script src="test.js"></script> -->

<script type="text/javascript">

function checkForm() {

var invalid = 0;

var name = document.getElementById('fullname');
var username = document.getElementById('username');
var password = document.getElementById('password');
var repassword = document.getElementById('repassword');


// Helper Texts
var pwdHelper = document.getElementById('pwdHelper');
var rePwdHelper = document.getElementById('rePwdHelper');
var usernameHelper = document.getElementById('usernameHelper');



// Testing name

if (!(name.value.match(/^[A-Za-z\s]+$/)) || name == "") {
    invalid++;
    name.classList.add("wrong-input");
} else {
    if (name.classList.contains("wrong-input")) {
        name.classList.remove("wrong-input");
    }
}


// Testing username

if ((username.value.match(/\W/)) || username.value == "" || username.value.length < 8) {
    console.log(username.value);
    invalid++;
    username.classList.add("wrong-input");
    usernameHelper.classList.remove("hidden");
} else {
    if (username.classList.contains("wrong-input")) {
        username.classList.remove("wrong-input");
        usernameHelper.classList.add("hidden");
    }
}


// Testing Password
var strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.{8,})");
if (!(password.value.match(strongRegex)) || password.value == "" || password.value.length < 8) {
    invalid++;
    password.classList.add("wrong-input");
    pwdHelper.classList.remove('hidden');

} else {
    if (password.classList.contains("wrong-input")) {
        password.classList.remove("wrong-input");
        pwdHelper.classList.add('hidden');
    }
}

if (repassword.value != password.value) {
    invalid++;
    repassword.classList.add("wrong-input");
    rePwdHelper.classList.remove("hidden");
} else {
    if (repassword.classList.contains("wrong-input")) {
        repassword.classList.remove("wrong-input");
        rePwdHelper.classList.add("hidden");
    }
}


if (invalid == 0) {
    return true;
} else {
    return false;
}

}

</script>


</body>
</html>
