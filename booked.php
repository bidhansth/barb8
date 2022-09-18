<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <title>Service Nepal.</title>
  <script src="https://kit.fontawesome.com/57c187a429.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/barbcss.css">
  <?php include('includes/server.php');?>
  <?php include('includes/errors.php');?>
</head>
<body>
  <?php include('includes/navbar.php');?>
  <div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-sm-6">
            <p><h4>Booking made succesfully!</h4><br>
            Your Booking Details:<br></p>
            <table class="table table-striped table-bordered table-sm" style="width:90%;">
                <?php
                    $phone=$_SESSION['phone'];
                    $sql = "SELECT * FROM bookings WHERE phone='$phone' ORDER BY bid desc limit 1";
                    $result = $db->query($sql);
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        echo "<tr><th>Booking ID</th><td>" . $row["bid"]. "</td></tr><tr><th>Name</th><td>" . $row["mname"]. "</td></tr><tr><th>Phone</th><td>" . $row["phone"]. "</td></tr><tr><th>Email</th><td>" . $row["email"] . "</td></tr><tr><th>Servicing Date</th><td>" . $row["sdate"] . "</td></tr><tr><th>Drop-off Time</th><td>" . $row["dtime"] . "</td></tr><tr><th>Vehicle Model</th><td>" . $row["vehicle"] . "</td></tr><tr><th>Vehicle Number</th><td>" . $row["vehiclenum"] . "</td></tr><tr><th>Services Required</th><td>" . $row["services"] . "</td></tr><tr><th>Additional Comments</th><td>" . $row["comments"] . "</td></tr>";
                    } else {
                        echo "0 results";
                    }
                ?>
            </table>
        </div>
    </div>
  </div>
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="js/bootstrap.bundle.min.js"></script>  
</body>
</html>