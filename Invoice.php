<!doctype html>

<!--Auto generated Invoice number-->
<?php
    $con = mysqli_connect("localhost","root","","arogyahelthcare_database");

    $query = "SELECT Invoice_Number FROM paymentsdb order by Invoice_Number desc";
    $result = mysqli_query($con,$query);
    $row = mysqli_fetch_array($result);
    $lastid = $row['Invoice_Number'];

    if(empty($lastid))
    {
        $number = "Recepit-0000001";
    }
    else
    {
        $idd = str_replace("Recepit-","",$lastid);
        $id = str_pad($idd + 1, 7 , 0, STR_PAD_LEFT);
        $number = 'Recepit-'.$id; 
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
      body{
        padding-bottom: 25px;
      }
        .container{
            width: 850px;
            background-color: white;
        }
        .search-pay{
          border: 2px solid black;
          padding: 15px;
          width: 450px;
        }.form-group{
          text-align: left;
        }
    </style>
  </head>
  <body>
  <center>
    <img  src="./payment Icon.png" class="ward-ico" width="150px" height="150px">
  </center>
  <!--Search Pation Details-->
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-7">
        <div class="card mt-5">
          <div class="card-header text-center">
            <h4>Invoice Details</h4>
          </div>
          <div class="card-body" style="background-color:lightsteelblue; border: 2px solid white;">
            <form action="" method="GET">
              <div class="row">
                <div class="col-md-6">
                  <input style="border: 2px solid black;  border-radius: 10px;" type="text" name="Nic" id="" class="form-control" value="<?php if(isset($_GET['Nic'])){echo $_GET['Nic'];} ?>" placeholder="Enter Pation Nic Number">
                </div><br><br>
              </div>
            </form>
            <div class="row">
              <div class="col-md-12">
                <hr>
                <?php
                  $con = mysqli_connect("localhost","root","","arogyahelthcare_database");

                  if(isset($_GET['Nic']))
                  {
                    $Nic = $_GET['Nic'];

                    $query = "SELECT * FROM ward WHERE Nic='$Nic'";
                    $query_run =  mysqli_query($con,$query);

                    if(mysqli_num_rows($query_run)>0)
                    {
                      foreach($query_run as $row)
                      {
                        ?>
                          <form action="" method="post">
                            <div class="form-group mb-3">
                              <label for="">Invoice No</label>
                              <input type="text" style="width: 250px;" class="form-control" id=""  value="<?php echo $number; ?>"  name="Invoice_Number">
                            </div>
                            <div class="form-group mb-3">
                              <label for="">Name With Initial</label>
                              <input type="text" name="Name" class="form-control" value="<?= $row['Name']; ?>" id="">
                            </div>
                            <div class="form-group mb-3">
                              <label class="" for="">Id Number</label>
                              <input type="text" style="width: 250px;" class="form-control" name="ID_No" value="<?= $row['Nic']; ?>" id="">
                            </div>
                            <div class="form-group mb-3">
                              <label for="">Ward Number</label>
                              <input type="text" style="width: 250px;" class="form-control" name="Ward_No" id="" value="<?= $row['Ward_Theater_No']; ?>" >
                            </div>
                            <div class="form-group mb-3">
                              <label for="">No Days</label>
                              <input type="text" style="width: 250px;" class="form-control" name="Days" id="" value="<?= $row['days'];?>">
                            </div>
                            </div>
                            <div class="form-group mb-3">
                              <label for="">Total Bill Amount</label>
                              <input type="text" class="form-control" name="Total" id="" >
                            </div>
                            <hr>
                            <center>
                              <button style="width:350px ;" type="submit" class="btn btn-primary" name="Save">Submite</button><br>
                              <!--Insert data-->
                              <?php
                                $con = mysqli_connect("localhost","root","","arogyahelthcare_database");

                                if(isset($_POST['Save']))
                                  {
                                    $Invoice_Number = $_POST['Invoice_Number'];
                                    $Name = $_POST['Name'];
                                    $ID_No = $_POST['ID_No'];
                                    $Ward_No=$_POST['Ward_No'];
                                    $Days =$_POST['Days'];
                                    $Total =$_POST['Total'];

                                    $query = "INSERT INTO paymentsdb (Invoice_Number,Name,ID_No,Ward_No,Days,Total) VALUES('$Invoice_Number','$Name','$ID_No','$Ward_No','$Days','$Total')";
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
                        <?php
                      }
                    }
                    else
                    {
                      echo"No Recorde Found";
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
  <center>
      <!--Search Form-->
          <form class="search-pay" action="" method="GET">
      <!--search-->
            <center>
                <div class="col-md-6" style="display: flex;">
                  <?php
                      $con = mysqli_connect("localhost","root","1234","arogyahelthcare_database");
                      $s=mysqli_query($con,"select * from service_detailsdb");
                  ?>
                  <select style="width: 450px;" class="form-select"  name="Service_Type" value="<?php if(isset($_GET['Service_Type'])){echo $_GET['Service_Type'];} ?>">                                               
                      <?php
                        while($r = mysqli_fetch_array($s))
                          {
                              ?>
                                <option><?php echo $r['Service_Type']; ?></option>
                              <?php
                          }
                      ?>
                  </select>
                  <button type="submit" class="btn btn-primary">Search</button><br>
                </div>
                <hr>
                <?php
                  $con = mysqli_connect("localhost","root","","arogyahelthcare_database");

                  if(isset($_GET['Service_Type']))
                  {
                      $Service_Type = $_GET['Service_Type'];

                      $query ="SELECT * FROM service_detailsdb WHERE Service_Type = '$Service_Type'";
                      $query_run = mysqli_query($con,$query);

                      if(mysqli_num_rows($query_run) > 0)
                      {
                        foreach($query_run as $row)
                        {
                          ?>
                          <center>
                            <form class="service-2" action="" method="POST">
                              <div class="form-group mb-3">
                                <label style="text-align: left;" for="">Refernce No</label>
                                <input type="text" style="width: 250px;" class="form-control" id="" value="<?= $row['Ref_No']; ?>" name="Ref_No" readonly>
                              </div>
                              <div class="form-group mb-3">
                                <label for="">Service Name</label>
                                <input type="text" style="width: 250px;" class="form-control" id=""  value="<?= $row['Service_name']; ?>"  name="Service_name" readonly>
                              </div>
                              <div class="form-group mb-3">
                                <label for="">Amount</label>
                                <input type="text" style="width: 250px;" class="form-control" id="" value="<?= $row['Amount']; ?>" name="Amount">
                              </div>
                            </form>
                            </center>
                          <?php
                        }
                      }
                      else
                      {
                        echo"No Record Found";
                      }

                  }
                ?>
            </center>
          </form>
  </center>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>  </body>

</html>