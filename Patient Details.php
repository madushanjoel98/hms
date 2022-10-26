<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
        <?php 
if (isset($_GET["err"])){
   $action=$_GET["err"];
  if($action==1){
         echo "<script>alert('adding the new patient is failed,please check the inputs and try again')</script>";
   }
    
}
if (isset($_GET["msg"])){
   $action=$_GET["msg"];
  if($action==1){
         echo "<script>alert('Added new Patient Successfully ')</script>";
   }
    
}
?>
    <h1>
        <center>
            <img  src="./patient.png" class="ward-ico" width="150px" height="150px">
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
                                        <input style="width: 250px;"  type="text" class="form-control" name="nic" value="<?php if(isset($_GET['nic'])){echo $_GET['nic'];} ?>" placeholder="Enter The Nic Number">
                                    </div>
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-primary">Search</button><br>
                                    </div>
                            </div>
                            <br>
                            <center>
                                <button style="width: 300px;" type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#mymodal">Creat New Pation</button>
                            </center>       
                        </form>
                        <div class="row">
                            <div class="col-md-12">
                                <hr>
                                <?php
                                    $con = mysqli_connect("localhost","root","","arogyahelthcare_database");

                                    if(isset($_GET['nic']))
                                    {
                                        $nic = $_GET['nic'];

                                        $query ="SELECT * FROM patient_db WHERE Nic = '$nic'";
                                        $query_run = mysqli_query($con,$query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $row)
                                            {
                                                ?>
                                                    <form action="" method="POST">
                                                        <div class="form-group mb-3">
                                                            <label class="form-label">patient Ref No:</label>
                                                            <input style="width:250px ;" type="text" class="form-control" value="<?= $row['pation_ID'];?>" name="pation_ID" >
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label class="form-label">Name:</label>
                                                            <input type="text" class="form-control" value="<?= $row['Name'];?>" name="Name" >
                                                        </div>

                                                        <div class="form-group mb-3" >
                                                            <label class="form-label">Address:</label>                                                          
                                                            <input type="text" style="display: flex;" class="form-control" value="<?= $row['Address'];?>" placeholder="Enter Service Type" name="Address">
                                                        </div>

                                                        <div class="form-group mb-3">
                                                                <label class="form-label">Mobile:</label><br>
                                                                <input type="text" style="display: flex;" class="form-control" value="<?= $row['Mobile'];?>" name="Mobile">
                                                        </div>
                                                        <div class="form-group mb-3">
                                                                <label class="form-label">Nic No:</label><br>
                                                                <input type="text" style="display: flex;" class="form-control" value="<?= $row['Nic'];?>" name="Nic">
                                                        </div>
                                                        <div class="form-group mb-3">
                                                                <label class="form-label">Family Member:</label><br>
                                                                <input type="text" style="display: flex;" class="form-control" value="<?= $row['Other_Family_Member'];?>" name="Other_Family_Member">
                                                        </div>
                                                        <div class="form-group mb-3">
                                                                <label class="form-label">Contact Number:</label><br>
                                                                <input type="text" style="display: flex;" class="form-control" value="<?= $row['Contact_Details'];?>" name="Contact_Details">
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

    <!--Creat new Patient-->
<div class="modal" id="mymodal">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modale title">New Patient</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    <div class="form-group mb-3" style="width: 250px;">
                        <label class="form-label">patient refernce No:</label>
                        <input type="text" class="form-control"  name="pation_ID">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Name:</label>
                        <input  type="text" class="form-control"  name="Name" placeholder="Enter The name">
                    </div>

                    <div class="form-group mb-3" >
                        <label class="form-label">Address:</label>                                                          
                        <input type="text" style="display: flex;" class="form-control" name="Address" placeholder="Enter Current Address">
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label">Mobile No:</label><br>
                        <input style="width: 300px;" type="text" style="display: flex;" class="form-control" name="Mobile" placeholder="Enter Mobile Number">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Nic:</label><br>
                        <input style="width: 300px;" type="text" style="display: flex;"  class="form-control" name="Nic" placeholder="Enter Nic Number">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Family Member:</label><br>
                        <input type="text" style="display: flex;" name="Other_Family_Member" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Mobile No:</label><br>
                        <input style="width: 300px;"  type="text" style="display: flex;" class="form-control" name="Contact_Details">
                    </div>
                    <center>
                        <button style="width: 250px;" type="submit" class="btn btn-primary" name="Save">Insert</button>
                    </center>

                </form>
            </div>
        </div>
    </div>
</div>
<!--Insert The new pation-->
<?php
    $con = mysqli_connect("localhost","root","","arogyahelthcare_database");

    if(isset($_POST['Save']))
    {
        $pation_ID = $_POST['pation_ID'];
        $Name = $_POST['Name'];
        $Address = $_POST['Address'];
        $Mobile = $_POST['Mobile'];
        $Nic=$_POST['Nic'];
        $Other_Family_Member=$_POST['Other_Family_Member'];
        $Contact_Details=$_POST['Contact_Details'];

        $query = "INSERT INTO patient_db (pation_ID,Name,Address,Mobile,Nic,Other_Family_Member,Contact_Details) VALUES('$pation_ID','$Name','$Address','$Mobile','$Nic','$Other_Family_Member','$Contact_Details')";
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
<!--Update the Pation Details-->
<?php
    $con = mysqli_connect("localhost","root","","arogyahelthcare_database");
    if(isset($_POST['Update']))
    {

        $pation_ID = $_POST['pation_ID'];
        $Name = $_POST['Name'];
        $Address = $_POST['Address'];
        $Mobile = $_POST['Mobile'];
        $Nic = $_POST['Nic'];
        $Other_Family_Member=$_POST['Other_Family_Member'];
        $Contact_Details=$_POST['Contact_Details'];

    $query = "UPDATE patient_db SET pation_ID=$pation_ID, Name='$Name', Address='$Address',Mobile='$Mobile',Nic='$Nic',Other_Family_Member='$Other_Family_Member',Contact_Details='$Contact_Details' WHERE Nic='$Nic'";
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
                                    
<!--Delete the Employee Details-->
<?php
    $con = mysqli_connect("localhost","root","","arogyahelthcare_database");
    if(isset($_POST['Remove']))
    {
        $Nic = $_POST['Nic'];

    $query = "DELETE FROM patient_db WHERE Nic = '$Nic'";
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
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>