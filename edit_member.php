<?php 

require('database.php'); 
session_start();

$message_form = "";


if(!isset($_SESSION['username'])) {
  $_SESSION['message'] = 'Please login to view your dashboard.';
  header('Location: index.php');
} else {

  if(isset($_GET['id'])) {
    $mem_id = $_GET['id'];
    $query = "SELECT * FROM members WHERE id = $mem_id";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 1) {
      while($row = mysqli_fetch_assoc($result)) {
        $mem_name = $row['name'];
        $mem_email = $row['email'];
        $mem_phone = $row['phone'];
        $mem_address = $row['address'];
        $mem_state = $row['state'];
        $mem_zip = $row['zip'];
      }
    } else {
      $message_form = "Member not found!";
    }
  } elseif(isset($_POST['submit'])) {

    
    
    $mem_id = safeInput($_POST['member_id']);
    $mem_name = safeInput($_POST['name']);
    $mem_email = safeInput($_POST['email']);
    $mem_phone = safeInput($_POST['phone']);
    $mem_address = safeInput($_POST['address']);
    $mem_state = safeInput($_POST['state']);
    $mem_zip = safeInput($_POST['zip']);

    $nameValidation = testName($mem_name);
    $emailValidation = testEmail($mem_email);
    $phoneValidation = testPhone($mem_phone);
    $addressValidation = testAddress($mem_address);
    $stateValidation = testState($mem_state);
    $zipValidation = testZip($mem_zip);

    if($nameValidation == false || $emailValidation == false || $phoneValidation == false || $addressValidation == false || $stateValidation == false || $zipValidation == false) {
      $message_form = "Invalid Inputs";
    } else {
      $query = "UPDATE members SET id = $mem_id, name = '$mem_name', email = '$mem_email',". 
             "phone = '$mem_phone', address = '$mem_address', state = '$mem_state', zip = '$mem_zip' WHERE id = $mem_id";

      if(mysqli_query($conn, $query)) {
        header("Location: members.php");
      } else {
        echo mysqli_error($conn);
        $message_form = "Member update failed!";
      }
    }

    /*
    
    */
    
  } else {
    header("Location: members.php");
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
          <div class="row mt-2 topBar p-2 justify-content-center">
            <div class="col-lg-12 col-md-12 align-items-center">
            <div class="row align-items-center justify-content-center">
                <a href="members.php" class="btn btn-primary text-center dashboard-btn">Manage Members</a>
                <!-- <h4 class="">Add Member</h4> -->
                <h4 class="offset-lg-7 offset-md-5"><?php echo $_SESSION['name']; ?></h4>
                &nbsp;&nbsp;&nbsp;
                <a href="logout.php" class="align-center text-danger"><i class="fas fa-2x fa-power-off"></i></a>
              </div>
              <div class="row">
                <p>
                  <?php 

                    if (isset($message)) {
                      echo $message;
                    } else {
                      echo "";
                    }

                    ?>
                </p>
              </div>
            </div>
          </div>
          <div class="row justify-content-center align-items-center">
            <div class="col-lg-4 col-md-8 col-sm-12 add-member-card shadow mt-5 p-4">
              <h4 class="text-center text-white">Member Update Form</h4>
              <p class="text-center text-dark"><?php echo $message_form; ?></p>
              <form onsubmit="return checkMemberEditForm();" class="" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

                <input type="hidden" id="member_id" name="member_id" value="<?php echo $mem_id; ?>">

                <input type="text" id="name" name="name" class="form-control mt-3 mb-4 form-control-lg" placeholder="Full Name" value="<?php echo $mem_name; ?>">
                
                <input type="text" id="email" name="email" class="form-control mb-4 form-control-lg" placeholder="Email" value="<?php echo $mem_email; ?>">
                
                <input type="text" id="phone" name="phone" class="form-control mb-4 form-control-lg" placeholder="Phone" value="<?php echo $mem_phone; ?>">
                
                <input type="text" id="address" name="address" class="form-control mb-4 form-control-lg" placeholder="Address" value="<?php echo $mem_address; ?>">
                <input type="text" id="state" name="state" class="form-control mb-4 form-control-lg" placeholder="State" value="<?php echo $mem_state; ?>">
                <input type="text" id="zip" name="zip" class="form-control mb-4 form-control-lg" placeholder="Zip" value="<?php echo $mem_zip; ?>">
                <br>
                <input type="submit" name="submit" value="Edit Member Info" class="btn-lg btn-block btn-primary m1-5">
                <a href="delete.php?id=<?php echo $mem_id; ?>" class="btn-lg btn-block btn-danger mb-3 text-center">Delete Member</a>

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
    
    
    
    function checkMemberEditForm() {

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
