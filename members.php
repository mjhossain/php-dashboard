
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
      <div class="row  mainWrapper">
        
        <div class="col-md-12 dashboardBody">
        <div class="row mt-2 topBar p-2">
            <div class="col-md-12">
              <div class="row align-items-center justify-content-center mb-3">
                <h4 class="">City Flex: Manage Members</h4>
                
              </div>
              
              <div class="row align-items-center justify-content-center">
                <a href="home.php" class="menuItem text-center">Dashboard</a>
                <a href="add_member.php" class="menuItem text-center">Add New Member</a>
                <a href="logout.php" class="menuItem text-center">Logout</a>
              </div>
            </div>
          </div>
      <div class="row mt-5 tableBox align-items-center">
        <div class="col-md-12 justify-content-center">
        <a href="add_member.php" class="btn-warning btn-lg btn-block mb-5 text-center">Add New Member</a>  
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Phone</th>
              <th scope="col">Address</th>
              <th scope="col">State</th>
              <th scope="col">Zip Code</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
          <?php
                    $query = "SELECT * FROM members WHERE admin_id =" . $admin_id ."";
                    $result = mysqli_query($conn, $query);

                    if(mysqli_num_rows($result) > 0) {
                      while($row = mysqli_fetch_assoc($result)) {

                        
                            echo '<tr>'.
                            '<td>'.ucwords($row['name']).'</td>'.
                            '<td>'.$row['email'].'</td>'.
                            '<td>'.$row['phone'].'</td>'.
                            '<td>'.$row['address'].'</td>'.
                            '<td>'.$row['state'].'</td>'.
                            '<td>'.$row['zip'].'</td>'.
                            '<td><a href="edit_member.php?id='.$row['id'].'" class="editBtn"><i class="fas fa-1x fa-edit"></i></a> <a href="delete.php?id='.$row['id'].'" class="delBtn"><i class="fas fa-1x fa-trash-alt"></i></a></td>'.
                          '</tr>';
                      }
                    } else {
                      echo '<tr>'.
                            '<td>Name</td>'.
                            '<td>Email</td>'.
                            '<td>Phone</td>'.
                            '<td>Address</td>'.
                            '<td>State</td>'.
                            '<td>Zip</td>'.
                          '</tr>';
                    }
                ?>
          </tbody>
        </table>
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
