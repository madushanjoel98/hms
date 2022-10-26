<!doctype html>
    <!--Auto Generated Ward Number-->
<?php
    $con = mysqli_connect("localhost","root","","arogyahelthcare_database");

    $query = "SELECT Ward_Theater_No from ward order by Ward_Theater_No desc";
    $result = mysqli_query($con,$query);
    $row = mysqli_fetch_array($result);
    $lastid = $row['Ward_Theater_No'];

        if(empty($lastid))
    {
        $number = "Ward-00001";
    }
        else
    {
        $idd = str_replace("Ward-","",$lastid);
        $id = str_pad($idd + 1, 5, 0, STR_PAD_LEFT);
        $number = 'Ward-'.$id;
    }
?>


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
                                            <select class="form-select"  name="WardNo" value="<?php if(isset($_GET['WardNo'])){echo $_GET['WardNo'];} ?>">                                               
                                                <?php
                                                  while($r = mysqli_fetch_array($s))
                                                    {
                                                        ?>
                                                            <option><?php echo $r['Ward_Theater_No']; ?></option>
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
                                <center>
                                    <button style="width: 300px;" type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#mymodal">Creat New Ward</button>
                                </center>       
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
                                                                <input style="width:250px ;" type="text" class="form-control" value="<?= $row['Ward_Theater_No'];?>" name="Ward_Theater_No" readonly>
                                                            </div>
                                                            <div class="form-group mb-3" style="width:250px ;">
                                                            <label class="form-label">Ward or Operation :</label>                                                          
                                                                <input type="text" style="display: flex;" class="form-control" value="<?= $row['Type'];?>" readonly>
                                                                <select class="form-select" name="Type">
                                                                    <option selected disabled>Select Ward or Theater Type</option>
                                                                    <option value="Operation Theater">Operation Theater</option>
                                                                    <option value="Nomal Ward">Nomal Ward</option>
                                                                    <option value="Special Ward">Special Ward</option>
                                                                </select>
                                                            </div>

                                                            <div class="form-group mb-3" style="width:250px ;">
                                                                <label class="form-label">Gender Type:</label>                                                          
                                                                <input type="text" style="display: flex;" class="form-control" value="<?= $row['Gender_Type'];?>" readonly>
                                                                <select class="form-select" name="Gender_Type">
                                                                    <option selected disabled>-- Gender Type --</option>
                                                                    <option value="Male Room">Male Room</option>
                                                                    <option value="Female Room">Female Room</option>
                                                                </select>
                                                            </div>

                                                            <div class="form-group mb-3" style="width:250px ;">
                                                                    <label class="form-label">Status</label><br>
                                                                    <input type="text" style="display: flex;" class="form-control" value="<?= $row['Status'];?>" readonly>
                                                                    <select class="form-select"  name="Status"  id="autoSizingSelect">
                                                                        <option selected disabled>-- Status Type --</option>
                                                                        <option value="Available">Available</option>
                                                                        <option value="Received">Reserved</option>
                                                                    </select>
                                                            </div>
                                                            <div class="form-group mb-3">
                                                                <center>
                                                                    <button type="submit" style="width: 150px;" class="btn btn-warning" name="Update">Update</button>
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
        <!--Modale New Ward Create-->
            <div class="modal" id="mymodal">
                <div class="modal-dialog ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modale title">Creat New Ward & Operation Theater</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form action="<?php echo($_SERVER["PHP_SELF"]) ?>" method="POST">
                            <div class="form-group mb-3">
                                <label class="form-label">Ward or Operation Theater No:</label>
                                <input type="text" class="form-control"  name="Ward_Theater_No" id="Ward_Theater_No" value="<?php echo $number; ?>" readonly>
                            </div>
                            <div class="form-group mb-3" >
                                <label class="form-label">Ward or Operation :</label>                                                          
                                <select class="form-select" name="Type">
                                    <option selected disabled>Select Ward or Theater Type</option>
                                    <option value="Operation Theater">Operation Theater</option>
                                    <option value="Nomal Ward">Nomal Ward</option>
                                    <option value="Special Ward">Special Ward</option>
                                </select>
                            </div>
                            <div class="form-group mb-3" >
                                <label class="form-label">Gender Type:</label>                                                          
                                <select class="form-select" name="Gender_Type">
                                    <option selected disabled>-- Gender Type --</option>
                                    <option value="Male Room">Male Room</option>
                                    <option value="Female Room">Female Room</option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label">Status</label><br>
                                <select class="form-select"  name="Status"  id="autoSizingSelect">
                                    <option selected disabled>-- Status Type --</option>
                                    <option value="Available">Available</option>
                                    <option value="Received">Reserved</option>
                                </select>
                            </div>
                            <center>
                                <button style="width: 250px;" type="submit" class="btn btn-primary" name="Save">Insert</button>
                                <?php
                                    $con = mysqli_connect("localhost","root","","arogyahelthcare_database");

                                    if(isset($_POST['Save']))
                                    {
                                        $Ward_Theater_No = $_POST['Ward_Theater_No'];
                                        $Type = $_POST['Type'];
                                        $Gender_Type = $_POST['Gender_Type'];
                                        $Status = $_POST['Status'];

                                        $query = "INSERT INTO ward (Ward_Theater_No,Type,Gender_Type,Status) VALUES('$Ward_Theater_No','$Type','$Gender_Type','$Status')";
                                        $query_run = mysqli_query($con,$query);

                                        if($query_run)
                                        {
                                            echo '<script>alert ("Details Insert Success") </script>'; 
                                        }
                                        else
                                        {
                                            echo '<script>alert ("Details Insert Fail") </script>'; 
                                        }
                                    }

                                ?>
                            </center>
                        </form>

                        </div>
                    </div>
                </div>
            </div>

            <!--Update Date-->
            <?php
               $con = mysqli_connect("localhost","root","","arogyahelthcare_database");
               if(isset($_POST['Update']))
               {
                $Ward_Theater_No = $_POST['Ward_Theater_No'];
                $Type = $_POST['Type'];
                $Gender_Type = $_POST['Gender_Type'];
                $Status = $_POST['Status'];

                $query = "UPDATE ward SET Ward_Theater_No='$Ward_Theater_No',Type='$Type', Gender_Type='$Gender_Type',Status='$Status' WHERE Ward_Theater_No='$Ward_Theater_No'";
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
            <!--Delet Data-->
            <?php
               $con = mysqli_connect("localhost","root","","arogyahelthcare_database");
               if(isset($_POST['Remove']))
               {
                $Ward_Theater_No = $_POST['Ward_Theater_No'];

                $query = "DELETE FROM ward WHERE Ward_Theater_No = '$Ward_Theater_No'";
                $query_run = mysqli_query($con,$query);
                
                if($query_run)
                {
                    echo '<script>alert ("Details Delete Success") </script>'; 
                }
                else
                {
                    echo '<script>alert ("Details Delete Fail") </script>'; 

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