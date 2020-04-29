<?php require('database.php'); ?>
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

    <div class="container-fluid">
      <div class="row mainWrapper">
        <div class="col-md-3 menuBar">
          <br><br>
          <div class="row justify-content-center p-2">

            <h3>City Flex</h3>
          </div>
          <br><br>
          <div class="col-md-12 menu"></div>
        </div>
        <div class="col-md-9 dashboardBody">
          <div class="row mt-2 topBar p-2">
            <div class="col-md-3">
              <h4 class="align-center">Dashboard</h4>
            </div>
          </div>
          <div class="row p-3">

              <div class="col-md-3 shadow card1">
                <div class="col-md-12"></div>
              </div>
              <div class="col-md-3 shadow card2">
                <div class="col-md-12"></div>
              </div>
              <div class="col-md-4 shadow card3">
                <div class="col-md-12"></div>
              </div>

          </div>
          <div class="row justify-content-center mt-5">
            <h4 class="text-center">Members</h4>
          </div>
          <div class="row justify-content-center mt-2">

            <div class="col-md-10 p-2">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Address</th>
                  </tr>
                </thead>
                <tbody>


                <?php
                    $query = "SELECT * FROM userTest LIMIT 4";
                    $result = mysqli_query($conn, $query);

                    if(mysqli_num_rows($result) > 0) {
                      while($row = mysqli_fetch_assoc($result)) {

                        
                            echo '<tr>'.
                            '<th scope=\"row\">'.$row['id'].'</th>'.
                            '<td>'.ucwords($row['name']).'</td>'.
                            '<td>'.$row['email'].'</td>'.
                            '<td>'.$row['phone'].'</td>'.
                            '<td>'.$row['address'].'</td>'.
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
              <a href="members.php" class="btn-danger btn-lg btn-block text-center">Manage Members</a>
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
