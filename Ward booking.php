<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="./bootstrap-5.1.3-dist/css/bootstrap.css" rel="stylesheet">
    <link href="./Style.css" rel="stylesheet">
    <link href="./Modal.css" rel="stylesheet">

    <title>Arogya Health car Hospital</title>
    <style>
        .container{
            width: 750px;
        }
    </style>
  </head>
  <body>
    <h1>
        <center>
            <img  src="./ward icon.jpg" class="ward-ico" width="150px" height="150px">
        </center>
    </h1>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <div class="card mt-5">
                        <div class="card-header text-center">
                            <h4>Search ward and room details</h4>
                        </div>
                        <div class="card-body">
                            <form action="" method="GET">
                                <div class="row">
                                        <div class="col-md-6">
                                            <?php
                                                $con = mysqli_connect("localhost","root","","arogyahelthcare_database");
                                                $s=mysqli_query($con,"select * from ward");
                                            ?>
                                            <select name="WardNo" class="form-select" value="<?php if(isset($_GET['WardNo'])){echo $_GET['WardNo'];} ?>">                                               
                                                <?php
                                                  while($r = mysqli_fetch_array($s))
                                                    {
                                                        ?>
                                                            <option> <?php echo $r['Ward_Theater_No']; ?></option>
                                                        <?php
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <button type="submit" class="btn btn-primary">Search</button><br>
                                        </div>
                                </div>
                                <br>
                            </form>
                            <div class="row">
                                <div class="col-md-12">
                                    <hr>
                                    <?php
                                        $con = mysqli_connect("localhost","root","","arogyahelthcare_database");

                                        if(isset($_GET['WardNo']))
                                        {
                                            $WardNo = $_GET['WardNo'];

                                            $query ="SELECT * FROM ward WHERE Ward_Theater_No = '$WardNo'";
                                            $query_run = mysqli_query($con,$query);

                                            if(mysqli_num_rows($query_run) > 0)
                                            {
                                                foreach($query_run as $row)
                                                {
                                                    ?>
                                                        <form action="" method="POST">
                                                            <div class="form-group mb-3">
                                                                <label class="form-label">Ward & Theator No:</label>
                                                                <input style="width:250px ;" type="text" class="form-control" value="<?= $row['Ward_Theater_No'];?>" name="Ward_Theater_No" placeholder="Enter Ward No">
                                                            </div>

                                                            <div class="form-group mb-3" style="width:250px ;">
                                                                <label class="form-label">Gender Type:</label>                                                          
                                                                <input type="text" style="display: flex;" class="form-control" value="<?= $row['Gender_Type'];?>"  placeholder="Enter Ward No" readonly>
                                                            </div>

                                                            <div class="form-group mb-3" style="width:250px ;">
                                                                    <label class="form-label">Status</label><br>
                                                                    <input type="text" style="display: flex;" class="form-control" value="<?= $row['Status'];?>" placeholder="Enter Ward No" readonly>
                                                                    <select class="form-select"  name="Status"  id="autoSizingSelect">
                                                                        <option selected disabled>-- Status Type --</option>
                                                                        <option value="Available">Available</option>
                                                                        <option value="Received">Reserved</option>
                                                                    </select>
                                                            </div>
                                                            <div class="form-group mb-3" style="width:250px ;">
                                                                <label class="form-label">Booking date:</label>   
                                                                <input type="text" style="display: flex;" class="form-control" value="<?= $row['Booking_Date'];?>" readonly>                                                     
                                                                <input type="datetime-local" style="display: flex;"  name="Booking_Date" class="form-control">
                                                            </div>
                                                            <div class="form-group mb-3" style="width:250px ;">
                                                                <label class="form-label">End Date:</label>   
                                                                <input type="text" style="display: flex;" class="form-control" value="<?= $row['CloseDate'];?>" readonly>                                                                                                                                                                   
                                                                <input type="datetime-local" style="display: flex;" class="form-control"  name="CloseDate">
                                                            </div>
                                                            <div class="form-group mb-3" style="width:250px ;">
                                                                <label class="form-label">Number of days:</label> 
                                                                <input type="number" style="display: flex;"  class="form-control" value="<?= $row['days'];?>" name="days">
                                                            </div>
                                                            <div class="form-group mb-3" style="width:250px ;">
                                                                <label class="form-label">Pation name:</label>                                                          
                                                                <input type="text" style="display: flex;" class="form-control" name="Name" value="<?= $row['Name'];?>" placeholder="Enter Name">
                                                            </div>
                                                            <div class="form-group mb-3" style="width:250px ;">
                                                                <label class="form-label">ID Number:</label>                                                          
                                                                <input type="text" style="display: flex;" class="form-control" name="Nic" value="<?= $row['Nic'];?>" placeholder="Enter Nic Number">
                                                            </div>

                                                            <div class="form-group mb-3">
                                                                <center>
                                                                    <button type="submit" style="width: 150px;" class="btn btn-warning" name="submite">Booking</button>
                                                                    <button type="submit" style="width: 150px;" class="btn btn-danger" name="Remove">Remove</button>

                                                                </center>
                                                            </div>
                                                        </form>
                                                    <?php
                                                }
                                            }
                                            else
                                            {
                                                echo"No Record Found";
                                            }
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

            <!--Update Date-->
            <?php
               $con = mysqli_connect("localhost","root","","arogyahelthcare_database");
               if(isset($_POST['submite']))
               {
                $Ward_Theater_No = $_POST['Ward_Theater_No'];
                $Status = $_POST['Status'];
                $Booking_Date = $_POST['Booking_Date'];
                $CloseDate = $_POST['CloseDate'];
                $days  = $_POST['days'];
                $Name = $_POST['Name'];
                $Nic = $_POST['Nic'];

                $query = "UPDATE ward SET Ward_Theater_No='$Ward_Theater_No',Status='$Status', Booking_Date='$Booking_Date', CloseDate='$CloseDate', days='$days', Name='$Name',Nic='$Nic' WHERE Ward_Theater_No='$Ward_Theater_No'";
                $query_run = mysqli_query($con,$query);

                if($query_run)
                {
                    echo '<script>alert ("Details Updated Success") </script>';
                }
                else
                {
                    echo '<script>alert ("Details Updated Sail") </script>';
                }
               }
                
            ?>




    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>  </body>
</html>