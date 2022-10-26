<!doctype html>

<!--Auto generated id-->
<?php
    $con = mysqli_connect("localhost","root","","arogyahelthcare_database");

    $query = "SELECT Ref_No FROM service_detailsdb order by Ref_No desc";
    $result = mysqli_query($con,$query);
    $row = mysqli_fetch_array($result);
    $lastid = $row['Ref_No'];

    if(empty($lastid))
    {
        $number = "Ref-0000001";
    }
    else
    {
        $idd = str_replace("Ref-","",$lastid);
        $id = str_pad($idd + 1, 7 , 0, STR_PAD_LEFT);
        $number = 'Ref-'.$id; 
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
            <img  src="./payment Icon.png" class="ward-ico" width="150px" height="150px">
        </center>
    </h1>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <div class="card mt-5">
                        <div class="card-header text-center">
                            <h4>Search Details</h4>
                        </div>
                        <div class="card-body">
                            <form action="" method="GET">
                                <div class="row">
                                        <div class="col-md-6">
                                            <input style="width: 250px;"  type="text" class="form-control" name="service_name" value="<?php if(isset($_GET['service_name'])){echo $_GET['service_name'];} ?>">
                                        </div>
                                        <div class="col-md-4">
                                            <button type="submit" class="btn btn-primary">Search</button><br>
                                        </div>
                                </div>
                                <br>
                                <center>
                                    <button style="width: 300px;" type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#mymodal">Creat New New Service Details</button>
                                </center>       
                            </form>
                            <div class="row">
                                <div class="col-md-12">
                                    <hr>
                                    <?php
                                        $con = mysqli_connect("localhost","root","","arogyahelthcare_database");

                                        if(isset($_GET['service_name']))
                                        {
                                            $service_name = $_GET['service_name'];

                                            $query ="SELECT * FROM service_detailsdb WHERE service_name = '$service_name'";
                                            $query_run = mysqli_query($con,$query);

                                            if(mysqli_num_rows($query_run) > 0)
                                            {
                                                foreach($query_run as $row)
                                                {
                                                    ?>
                                                        <form action="" method="POST">
                                                            <div class="form-group mb-3">
                                                                <label class="form-label">Ref No:</label>
                                                                <input style="width:250px ;" type="text" class="form-control" value="<?= $row['Ref_No'];?>" name="Ref_No" >
                                                            </div>
                                                            <div class="form-group mb-3">
                                                                <label class="form-label">service name:</label>
                                                                <input style="width:250px ;" type="text" class="form-control" value="<?= $row['Service_name'];?>" name="Service_name" >
                                                            </div>

                                                            <div class="form-group mb-3" style="width:250px ;">
                                                                <label class="form-label">Service Type:</label>                                                          
                                                                <input type="text" style="display: flex;" class="form-control" value="<?= $row['Service_Type'];?>" placeholder="" name="Service_Type">
                                                            </div>

                                                            <div class="form-group mb-3" style="width:250px ;">
                                                                <label class="form-label">Amount:</label><br>
                                                                <input type="text" style="display: flex;" class="form-control" value="<?= $row['Amount'];?>" name="Amount">
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
                            <h4 class="modale title">Creat New Service</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                                <form action="" method="POST">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Ref No:</label>
                                        <input style="width:250px ;" type="text" class="form-control"   name="Ref_No" value="<?php echo $number; ?>" readonly>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="form-label">Service Name:</label>
                                        <input style="width:250px ;" type="text" class="form-control"  name="Service_name" placeholder="Enter The name">
                                    </div>

                                    <div class="form-group mb-3" style="width:250px ;">
                                        <label class="form-label">Service Type:</label>                                                          
                                        <input type="text" style="display: flex;" class="form-control" name="Service_Type" placeholder="Enter Service Type">
                                    </div>

                                    <div class="form-group mb-3" style="width:250px ;">
                                        <label class="form-label">Amount:</label><br>
                                        <input type="text" style="display: flex;" name="Amount" class="form-control" name="Amount">
                                    </div>

                            <center>
                                <button style="width: 250px;" type="submit" class="btn btn-primary" name="Save">Insert</button>
                                <?php
                                    $con = mysqli_connect("localhost","root","","arogyahelthcare_database");

                                    if(isset($_POST['Save']))
                                    {
                                        $Ref_No = $_POST['Ref_No'];
                                        $Service_name = $_POST['Service_name'];
                                        $Service_Type = $_POST['Service_Type'];
                                        $Amount = $_POST['Amount'];

                                        $query = "INSERT INTO service_detailsdb (Ref_No,Service_name,Service_Type,Amount) VALUES('$Ref_No','$Service_name','$Service_Type','$Amount')";
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
                $Ref_No =$_POST['Ref_No'];

                $Service_name = $_POST['Service_name'];
                $Service_Type = $_POST['Service_Type'];
                $Amount = $_POST['Amount'];

                $query = "UPDATE service_detailsdb SET Ref_No='$Ref_No', Service_name='$Service_name', Service_Type='$Service_Type',Amount='$Amount' WHERE Ref_No='$Ref_No'";
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
                $Ref_No = $_POST['Ref_No'];

                $query = "DELETE FROM service_detailsdb WHERE Ref_No = '$Ref_No'";
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