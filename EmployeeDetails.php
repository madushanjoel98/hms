<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="./bootstrap-5.1.3-dist/css/bootstrap.css" rel="styleeshet">
    <link href="./Style.css" rel="stylesheet">
    <title>Arogya Health car Hospital</title>
    <style>
        .container{
            width: 850px;
            background-color: white;
        }
    </style>
  </head>
  <body>
      <?php 
if (isset($_GET["err"])){
   $action=$_GET["err"];
  if($action==1){
         echo "<script>alert('adding the new employee is failed,please check the inputs and try again')</script>";
   }
    
}
if (isset($_GET["msg"])){
   $action=$_GET["msg"];
  if($action==1){
         echo "<script>alert('Added new employee Successfully ')</script>";
   }
    
}
?>
    <h1 class="Emp-Image">
        <Center>
            <img src="./user-add-icon.png" class="Login-Image" width="150px" height="150px"><br>
        </Center>
    </h1>
    <!--Search Form-->
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <div class="card mt-5">
                        <div class="card-header text-center">
                            <h4>Search Employee Details</h4>
                        </div>
                        <div class="card-body">
                           <form style="display: flex;" action="" method="GET">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input style="width:250px ;" type="text" class="form-control" name="Emp_Id" value="<?php if(isset($_GET['Emp_Id'])){echo $_GET['Emp_Id'];} ?>">
                                    </div>
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </div>
                           </form>
                           <div class="row">
                                <div class="col-md-12">
                                    <hr>
                                    <?php
                                        $con = mysqli_connect("localhost","root","124","arogyahelthcare_database");

                                        if(isset($_GET['Emp_Id']))
                                        {
                                            $Emp_Id = $_GET['Emp_Id'];

                                            $query = "SELECT * FROM employee_db WHERE Nic='$Emp_Id'";
                                            $query_run = mysqli_query($con,$query);

                                            if(mysqli_num_rows($query_run) > 0)
                                            {
                                                foreach($query_run as $row)
                                                {
                                                    ?>        
                                                    <form action="" method="POST">                                             
                                                        <div class="form-group mb-3">
                                                            <input type="text" class="form-control" value="<?= $row['Name']; ?>" name="Name" placeholder="Name With Initial">
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <input type="text" class="form-control" value="<?= $row['Address']; ?>"  name="Address" placeholder="Address">
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <input type="text" class="form-control" style="width: 350px;" value="<?= $row['Mobile_No']; ?>"  name="Mobile_No" placeholder="Contact Details">
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <input type="text" class="form-control" style="width: 350px;" value="<?= $row['Nic']; ?>"  name="Nic" placeholder="Nic Number" readonly>
                                                        </div>
                                                        <div class="form-group mb-3" style="display: flex;">
                                                            <input type="text" class="form-control" style="width: 200px;" value="<?= $row['In_Time']; ?>" placeholder="Shift In Time" readonly>
                                                            <input  style="width: 200px;" type="time" class="form-control" placeholder="Enter Your User name"  name="In_Time">

                                                        </div>
                                                        <div class="form-group mb-3" style="display: flex;">
                                                            <input type="text" class="form-control" style="width: 200px;" value="<?= $row['Out_Time']; ?>"  placeholder="Shift Out Time" readonly>
                                                            <input  style="width: 200px;" type="time" class="form-control" placeholder="Enter Your User name"  name="Out_Time">

                                                        </div>
                                                        <div class="form-group mb-3" style="display: flex;">
                                                            <input type="text" class="form-control" style="width: 200px;" value="<?= $row['Department']; ?>" placeholder="Department" readonly>
                                                            <select class="form-select"  name="Department" id="autoSizingSelect">
                                                                <option selected>Select Your Department</option>
                                                                <option value="Administrator">Administrator</option>
                                                                <option value="Staff">Staff</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <input type="text" class="form-control" value="<?= $row['User_Name']; ?>"  name="User_Name" placeholder="User Name">
                                                        </div>
                                                        <div class="form-group mb-3" style="display: flex;">
                                                            <input style="background-color: gary; color:white;" type="Text" class="form-control" value="<?= $row['password']; ?>" readonly>
                                                            <input type="Text" class="form-control"   name="password" placeholder="Enter New Password">
                                                        </div>
                                                        <div class="form-group mb-3" >
                                                            <center>
                                                             <button type="submit" style="width: 150px;" class="btn btn-success" name="Update">Edite</button>
                                                             <!--Employee Details Edite-->
                                                            <?php
                                                                $con = mysqli_connect("localhost","root","","arogyahelthcare_database");

                                                                if(isset($_POST['Update']))
                                                                {

                                                                    $Nic = $_POST['Nic'];

                                                                    $Name = $_POST['Name'];
                                                                    $Address = $_POST['Address'];
                                                                    $Mobile_No = $_POST['Mobile_No'];
                                                                    $In_Time = $_POST['In_Time'];
                                                                    $Out_Time = $_POST['Out_Time'];
                                                                    $Department = $_POST['Department'];
                                                                    $User_Name = $_POST['User_Name'];
                                                                    $password = $_POST['password'];

                                                                    $query = "UPDATE employee_db SET Name='$Name',Address='$Address',Mobile_No='$Mobile_No',In_Time='$In_Time',Out_Time='$Out_Time',Department='$Department',User_Name='$User_Name',password='$password' WHERE Nic='$Nic'";
                                                                    $query_run=mysqli_query($con,$query);
                                                                    
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
                                                             

                                                             <button type="submit" style="width: 150px;" class="btn btn-danger" name="Remove">Remove</button>
                                                             <!--Remove Employee-->
                                                             <?php
                                                                $con = mysqli_connect("localhost","root","1234","arogyahelthcare_database");

                                                                if(isset($_POST['Remove']))
                                                                {
                                                                    $Nic = $_POST['Nic'];

                                                                    $query =" DELETE FROM employee_db WHERE Nic='$Nic'";
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
    <br>
    <hr>
    <!---Creat New Employe-->
    <center>

    <form class="Emp-Creat-employe" action="" method="POST">
        <center>
            <b>
                <label class="form-label" style="color: DarkBlue; font-size: 30px; background-color: darkgray; width: 350px;  padding: 5px;">Creat New Employee</label>
            </b>
        </center>
        <div class="mb-3">
            <label class="form-label">Name With Initital:</label>
            <input type="text" class="form-control" placeholder="Enter Your User name" name="Name" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Address:</label>
            <input type="text" class="form-control" placeholder="Enter Your User Address" name="Address">
        </div>
        <div class="mb-3">
            <label class="form-label">Mobile No:</label>
            <input type="text" class="form-control" placeholder="Contact Details" name="Mobile_No" required>
        </div>
        <div class="mb-3">
            <label class="form-label">NIC NO:</label>
            <input type="text" class="form-control" placeholder="Nic No" name="Nic" required>
        </div>
            <div class="mb-3">
            <label class="form-label">Shitf In Time</label>
            <input  style="width: 200px;" type="time" class="form-control" name="In_Time">
        </div>
        <div class="mb-3">
            <label class="form-label">Shift Out Time</label>
            <input style="width: 200px;" type="time" class="form-control" name="Out_Time">
        </div>        <div class="mb-3">
            <label class="form-label">Department:</label>
            <select class="form-select" name="Department" id="autoSizingSelect">
                <option selected>Select Your Department</option>
                <option value="Administrator">Administrator</option>
                <option value="Staff">Staff</option>
            </select>
    </div>

        <div class="mb-3">
            <label class="form-label">User Name:</label>
            <input type="text" class="form-control" placeholder="Email / User Name" name="User_Name">
        </div>
        <div class="mb-3">
            <label class="form-label">Password:</label>
            <input type="text" class="form-control" placeholder="8 Digits Password" name="password">
        </div>
        <Center>
            <button style="width: 300px;" class="btn btn-primary" name="Save"  type="submit">Submite</button>
            <?php
                $con = mysqli_connect("localhost","root","","arogyahelthcare_database");

                if(isset($_POST['Save']))
                {
                    $Name = $_POST['Name'];
                    $Address = $_POST['Address'];
                    $Mobile_No = $_POST['Mobile_No'];
                    $Nic = $_POST['Nic'];
                    $In_Time = $_POST['In_Time'];
                    $Out_Time = $_POST['Out_Time'];
                    $Department = $_POST['Department'];
                    $User_Name = $_POST['User_Name'];
                    $password = $_POST['password'];

                    $query = "INSERT INTO employee_db (Name,Address,Mobile_No,Nic,In_Time,Out_Time,Department,User_Name,password) VALUES ('$Name','$Address','$Mobile_No','$Nic','$In_Time','$Out_Time','$Department','$User_Name','$password')";
                    $query_run = mysqli_query($con,$query);
                    
                    if($query_run)
                    {
                        echo '<script>alert ("New User Creat Success") </script>'; 
                    }
                    else
                    {
                        echo '<script>alert ("New User Creat Fail") </script>'; 
                    }
                }

            ?>
        </Center>
    </form
    <center>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>