<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="./Style.css" rel="stylesheet">
    <link href="./Table.css" rel="stylesheet">

    <title>Arogya Health car Hospital</title>
    <style>
      body{
        padding: 10px;
      }
    </style>
  </head>
  <body>
    <div class="container">
        <div class="col-md-12">
            <div class="card mt-4">
                <div class="card-header">
                    <h4>Search Daily Employee Working Plane</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-7">
                          <form action="" method="GET">
                            <div class="input-group mb-3" style="padding-left: 45px;">
                              <input  type="text"  class="form-control" name="Nic" value="<?php if(isset($_GET['Nic'])){echo $_GET['Nic'];} ?>" placeholder="Search">
                              <button class="btn btn-primary" type="submit" name="search">Search</button>
                            </div>
                          </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
      <div class="card mt-4">
        <div class="card-body">
          <table class="table table-bordered">
            <thead style="background-color: darkblue; color:white;">
              <tr>
                <th>Name</th>
                <th>ID No</th>
                <th>IN Time</th>
                <th>Out Time</th>
              </tr>
            </thead>
            <tbody>
              <?php
                  $con = mysqli_connect("localhost","root","","arogyahelthcare_database");

                  if(isset($_GET['Nic']))
                  {
                    $Filtervalues = $_GET['Nic'];
                    $query = "SELECT * FROM employee_db WHERE CONCAT (Name,Nic) LIKE '%$Filtervalues%'";
                    $query_run = mysqli_query($con,$query);

                    if(mysqli_num_rows($query_run) > 0)
                    {
                      foreach($query_run as $items)
                      {
                        ?>
                          <tr>
                            <td><?= $items['Name']; ?></td>
                            <td><?= $items['Nic']; ?></td>
                            <td><?= $items['In_Time']; ?></td>
                            <td><?= $items['Out_Time']; ?></td>
                          </tr>
                        <?php
                      }
                    }
                    else
                    {
                      ?>
                        <tr>
                          <td colspan="4">No record Found</td>
                        </tr>
                      <?php
                    }
                  }
              ?>
              <tr>
                <tb></tb>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>