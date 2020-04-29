<?php require('database.php'); ?>
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
        <div class="col-md-2 menuBar">
          <br><br>
          <div class="row justify-content-center p-2">

            <h3>City Flex</h3>
          </div>
          <br><br>
          <div class="col-md-12 menu"></div>
        </div>
        <div class="col-md-10 dashboardBody">
          <div class="row mt-2 topBar p-2">
            <div class="col-md-6">
              <h4 class="align-center">Dashboard: Members Area</h4>
            </div>
          </div>
      <div class="row mt-5 tableBox">
        <div class="col-md-7">
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Phone</th>
              <th scope="col">Address</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
          <?php
                    $query = "SELECT * FROM userTest";
                    $result = mysqli_query($conn, $query);

                    if(mysqli_num_rows($result) > 0) {
                      while($row = mysqli_fetch_assoc($result)) {

                        
                            echo '<tr>'.
                            '<th scope="row">'.$row['id'].'</th>'.
                            '<td>'.ucwords($row['name']).'</td>'.
                            '<td>'.$row['email'].'</td>'.
                            '<td>'.$row['phone'].'</td>'.
                            '<td>'.$row['address'].'</td>'.
                            '<td><a href=""><i class="fas fa-1x fa-edit"></i></a> <a href="" class="delBtn"><i class="fas fa-1x fa-trash-alt"></i></a></td>'.
                          '</tr>';
                      }
                    } else {
                      echo '<tr>'.
                            '<th scope="row">1</th>'.
                            '<td>Name</td>'.
                            '<td>Email</td>'.
                            '<td>Phone</td>'.
                            '<td>Address</td>'.
                          '</tr>';
                    }
                ?>
          </tbody>
        </table>
        </div>
        <div class="col-md-5">
          
          <h3 class="text-center mt-5">Add New Member</h3>
        <form class="" action="members.php" method="post">
            <input type="text" id="name" name="name" class="form-control formField mt-5 mb-4" placeholder="Full Name">
            <br>
            <input type="text" id="email" name="email" class="form-control formField mb-4" placeholder="Email">
            <br>
            <input type="text" id="phone" name="phone" class="form-control formField mb-4" placeholder="Phone">
            <br>
            <input type="text" id="address" name="address" class="form-control formField mb-4" placeholder="Address">
           
            <button type="button" name="submit" class="btn-warning btn-lg btn-block mb-5">Add Member</button>
          </form>
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
