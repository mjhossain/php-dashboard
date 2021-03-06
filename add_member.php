<?php 

require('database.php'); 
session_start();

$message_form = "";

if(!isset($_SESSION['username'])) {
  $_SESSION['message'] = 'Please login to view your dashboard.';
  header('Location: index.php');
} else {
  if(isset($_POST['submit'])) {
    
    $name = safeInput($_POST['name']);
    $email = safeInput($_POST['email']);
    $phone = safeInput($_POST['phone']);
    $address = safeInput($_POST['address']);
    $state = safeInput($_POST['state']);
    $zip = safeInput($_POST['zip']);
    $admin_id = safeInput($_SESSION['admin_id']);


    $nameValidation = testName($name);
    $emailValidation = testEmail($email);
    $phoneValidation = testPhone($phone);
    $addressValidation = testAddress($address);
    $stateValidation = testState($state);
    $zipValidation = testZip($zip);

    if($nameValidation == false || $emailValidation == false || $phoneValidation == false || $addressValidation == false || $stateValidation == false || $zipValidation == false) {
      $message_form = "Invalid Inputs";
    } else {
      $query = "INSERT INTO members(name, email, phone, address, state, zip, admin_id) VALUES('$name', '$email', '$phone', '$address', '$state', $zip, $admin_id)";
      if(mysqli_query($conn, $query)) {
        $message_form = "Member added";
        $name = "";
        $email = "";
        $phone = "";
        $address = "";
        $state = "";
        $zip = "";
      } else {
        echo mysqli_error($conn);
        $message_form = "Member addition failed!";
      }
    }

    /*

    
    */
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
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
  </head>
  <body>

  <div class="container-fluid">
      <div class="row  mainWrapper">
        <div class="col-lg-12 col-md-12 dashboardBody">
        <div class="row mt-2 topBar p-2">
            <div class="col-md-12">
              <div class="row align-items-center justify-content-center mb-3">
                <h4 class="">City Flex: Add Member</h4>
                
              </div>
              
              <div class="row align-items-center justify-content-center">
                <a href="home.php" class="menuItem text-center">Dashboard</a>
                <a href="members.php" class="menuItem text-center">Manage Members</a>
                <a href="logout.php" class="menuItem text-center">Logout</a>
              </div>
            </div>
          </div>
          <div class="row justify-content-center align-items-center">
            <div class="col-lg-4 col-md-8 col-sm-12 add-member-card shadow mt-5 p-4">
              <h4 class="text-center text-white">Member Add Form</h4>
              <p class="text-center text-dark"><?php echo $message_form ?></p>
              <form onsubmit="return checkMemberAddForm();" class="" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

                <input type="text" id="name" name="name" class="form-control mt-3 mb-4 form-control-lg" placeholder="Full Name" value="<?php echo isset($name) ? $name : ""; ?>">
                
                <input type="text" id="email" name="email" class="form-control mb-4 form-control-lg" placeholder="Email" value="<?php echo isset($email) ? $email : ""; ?>">
                
                <input type="text" id="phone" name="phone" class="form-control mb-4 form-control-lg" placeholder="Phone" value="<?php echo isset($phone) ? $phone : ""; ?>">
                
                <input type="text" id="address" name="address" class="form-control mb-4 form-control-lg" placeholder="Address" value="<?php echo isset($address) ? $address : ""; ?>">

                <div class="row">
                    <div class="col-lg-4">
                      <input type="text" id="state" name="state" class="form-control mb-4 form-control-lg" placeholder="State" value="<?php echo isset($state) ? $state : ""; ?>">
                    </div>

                    <div class="col-lg-8">
                    <input type="text" id="zip" name="zip" class="form-control mb-4 form-control-lg" placeholder="Zip Code" value="<?php echo isset($zip) ? $zip : ""; ?>">
                    </div>
                </div> 

                <br>
                <input type="submit" name="submit" value="Add Member" class="btn-lg btn-block btn-danger mb-5">

              </form>
            </div>    
          </div>
      </div>
    </div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script type="text/javascript">


  function checkMemberAddForm() {

    var invalid = 0;

    var name = document.getElementById('name');
    var email = document.getElementById('email');
    var phone = document.getElementById('phone');
    var state = document.getElementById('state');
    var zip = document.getElementById('zip');
    var address = document.getElementById('address');



    // Testing name

    if (!(name.value.match(/^[A-Za-z\s]+$/)) || name == "") {
        invalid++;
        name.classList.add("wrong-input");
    } else {
        if (name.classList.contains("wrong-input")) {
            name.classList.remove("wrong-input");
        }
    }


    // Testing Email

    var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    if (!(email.value.match(emailPattern)) || email.value == "") {
        invalid++;
        email.classList.add("wrong-input");
    } else {
        if (email.classList.contains("wrong-input")) {
            email.classList.remove("wrong-input");
        }
    }


    // Testing Phone Number

    if (!(phone.value.match(/^\d+$/)) || phone.value == "") {
        invalid++;
        phone.classList.add("wrong-input");
    } else {
        if (phone.classList.contains("wrong-input")) {
            phone.classList.remove("wrong-input");
        }
    }


    // Testing Address

    if (!(address.value.match(/[a-zA-Z0-9]/g)) || address.value == "") {
        invalid++;
        address.classList.add("wrong-input");
    } else {
        if (address.classList.contains("wrong-input")) {
            address.classList.remove("wrong-input");
        }
    }


    // Testing State

    if (!(state.value.match(/[A-Z]/g)) || state.value == "" || state.value.length != 2) {
        invalid++;
        state.classList.add("wrong-input");
    } else {
        if (state.classList.contains("wrong-input")) {
            state.classList.remove("wrong-input");
        }
    }


    // Testing Zip Code

    if (!(zip.value.match(/^\d+$/)) || zip.value == "" || zip.value.length != 5) {
        invalid++;
        zip.classList.add("wrong-input");
    } else {
        if (zip.classList.contains("wrong-input")) {
            zip.classList.remove("wrong-input");
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
