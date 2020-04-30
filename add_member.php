<?php 

require('database.php'); 
session_start();

$message_form = "";

if(!isset($_SESSION['username'])) {
  $_SESSION['message'] = 'Please login to view your dashboard.';
  header('Location: index.php');
} else {
  if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $admin_id = $_SESSION['admin_id'];

    $query = "INSERT INTO users(name, email, phone, address, admin_id) VALUES('$name', '$email', '$phone', '$address', $admin_id)";
    if(mysqli_query($conn, $query)) {
      $message_form = "Member added";
    } else {
      echo mysqli_error($conn);
      $message_form = "Member addition failed!";
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
              <h4 class="text-center text-white">Member Add Form</h4>
              <p class="text-center text-dark"><?php echo $message_form ?></p>
              <form class="" action="add_member.php" method="post">

                <input type="text" id="name" name="name" class="form-control mt-3 mb-4 form-control-lg" placeholder="Full Name">
                
                <input type="text" id="email" name="email" class="form-control mb-4 form-control-lg" placeholder="Email">
                
                <input type="text" id="phone" name="phone" class="form-control mb-4 form-control-lg" placeholder="Phone">
                
                <input type="text" id="address" name="address" class="form-control mb-4 form-control-lg" placeholder="Address">
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
  </body>
</html>
