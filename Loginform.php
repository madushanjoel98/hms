<!doctype html>
<html lang="en">
    <?php 
if (isset($_GET["err"])){
   $action=$_GET["err"];
   if($action==1){
         echo "<script>alert('invalid login please check the email or password')</script>";
   }
   
  
}
   
?>
  
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="./bootstrap-5.1.3-dist/css/bootstrap.css" rel="stylesheet">
    <link href="./Style.css" rel="stylesheet">
    <title>Arogya Health car Hospital</title>
  </head>
  <body>
    <h1>

    </h1>
    <br>
    <center>
        <form class="Loginform" action="" method="POST">
            <center>
                <img src="./usericon.png" class="Login-Image" width="150px" height="150px"><br>
                <label style="font-size: 35px; color: darkblue;" class="form-label">Arogya Health car Hospital</label><br>
                <label style="font-style: 30px; color: black;" class="form-label">Please Sign in Continue</label>
            </center>
            <div class="mb-3">
                <label class="form-label">User Name</label>
                <input type="text" class="form-control" placeholder="Enter Your User name" name="User_Name">
              </div>
              <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" placeholder="Enter Your Password" name="password">
              </div>
              <div class="mb-3">
                <label class="form-label">Department</label>
                <select class="form-select" id="autoSizingSelect" name="Department">
                    <option selected>Select Your Department</option>
                    <option value="Administrator">Administrator</option>
                    <option value="Staff">Staff</option>
                </select>
              </div>
              <div class="Login-btn">
                <button style="width: 300px;" class="btn btn-primary" name="signin" id="signin" type="submit">Sign In</button>
              </div>
        </form>
    
            
    
    </center>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
  <?php
    $con = mysqli_connect("localhost","root","1234","arogyahelthcare_database");

    if(isset($_POST['signin']))
    {
      $User_Name = $_POST['User_Name'];
      $password = $_POST['password'];
      $Department = $_POST['Department'];

      $query = "select * from employee_db where User_Name='$User_Name' and password='$password' and Department='$Department'";
      $result = mysqli_query($con,$query);
      while($row = mysqli_fetch_array($result))
      {
        if($row['User_Name']==$User_Name && $row['password']==$password && $row['Department'] =='Administrator')
        {
          header("Location:AdminDashboard.html");
        }elseif ($row['User_Name']==$User_Name && $row['password']==$password && $row['Department'] =='Staff')
        {
          header("Location: Staff DashBoard.html");
        }
      }
    }
  ?>
</html>