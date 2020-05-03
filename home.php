<?php 

require('database.php'); 


session_start();


if(!isset($_SESSION['username'])) {
  $_SESSION['message'] = 'Please login to view your dashboard.';
  header('Location: index.php');
} else {
  $name = $_SESSION['name'];
  $username = $_SESSION['username'];
  $admin_id = $_SESSION['admin_id'];
                  
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
      <div class="row mainWrapper">
        <!-- <div class="col-md-3 menuBar justify-content-center">
          <br><br>
          <div class="row justify-content-center p-2">

            <h3>City Flex</h3>
          </div>
          <br><br><br><br><br><br>
          <div class="col-md-12 menu justify-content-center">
            <a href=""><div class="row menuItem mb-3 justify-content-center align-items-center"><h5>Manage Members</h5></div></a>
            <a href=""><div class="row menuItem mb-3 justify-content-center align-items-center"><h5>Add Member</h5></div></a>
            <br><br><br><br><br><br><br><br>
            <a href=""><div class="row menuItem justify-content-center align-items-center"><h5>Logout</h5></div></a>
          </div>
        </div> -->
        <div class="col-md-12 dashboardBody">
          <div class="row mt-2 topBar p-2">
            <div class="col-md-12">
              <div class="row align-items-center justify-content-center mb-3">
                <h4 class="">City Flex: Dashboard (<?php echo $name; ?>)</h4>
                
              </div>
              
              <div class="row align-items-center justify-content-center">
                <a href="members.php" class="menuItem text-center">Manage Members</a>
                <a href="add_member.php" class="menuItem text-center">Add Member</a>
                <a href="logout.php" class="menuItem text-center">Logout</a>
              </div>
            </div>
          </div>
          <div class="row p-3 justify-content-center mt-5">

              <div class="col-md-3 shadow card1">
                <div class="col-md-12 my-auto">
                  <h2 class="text-center mt-4 text-white">My Members</h2>

                  <?php 
                  
                    $query = "SELECT COUNT(*) FROM members WHERE admin_id = $admin_id";
                    $result = mysqli_query($conn, $query);
                    $count = mysqli_fetch_assoc($result);
                    $number = $count['COUNT(*)'];
                  
                  ?>

                  <h1 class="text-center text-white memberCount"><?php echo $number; ?></h1>
                </div>
              </div>
              <div class="col-md-3 shadow card2">
              <div class="col-md-12 my-auto">
                  <h2 class="text-center mt-4 text-white">My Info</h2>
                  <h5 class="text-center mt-3 text-white">Name: <?php echo $name; ?></h5>
                  <h5 class="text-center mt-3 text-white">Username: <?php echo $username; ?></h5>
                </div>
              </div>
              <!-- <div class="col-md-4 shadow card3">
                <div class="col-md-12"></div>
              </div> -->

          </div>
          <div class="row justify-content-center mt-5">
            <h4 class="text-center">Members</h4>
          </div>
          <div class="row justify-content-center mt-2">

            <div class="col-md-10 p-2">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Address</th>
                  </tr>
                </thead>
                <tbody>


                <?php
                

                    $memberBtnText = "View Details of All Members";
                    $memBtnLink = "members.php";

                    $query = "SELECT * FROM members WHERE admin_id = ".$admin_id." LIMIT 4";
                    $result = mysqli_query($conn, $query);

                    if(mysqli_num_rows($result) > 0) {
                      while($row = mysqli_fetch_assoc($result)) {

                        
                            echo '<tr>'.
                            '<td>'.ucwords($row['name']).'</td>'.
                            '<td>'.$row['email'].'</td>'.
                            '<td>'.$row['phone'].'</td>'.
                            '<td>'.$row['address'].'</td>'.
                          '</tr>';
                      }
                    } else {
                      $memberBtnText = "Add Member";
                      $memBtnLink = "add_member.php";
                      echo '<tr>'.
                            '<td>Name</td>'.
                            '<td>Email</td>'.
                            '<td>Phone</td>'.
                            '<td>Address</td>'.
                          '</tr>';
                    }
                ?>
                  


                </tbody>
              </table>
              <a href="<?php echo $memBtnLink; ?>" class="btn-danger btn-lg btn-block text-center"><?php echo $memberBtnText; ?></a>
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
