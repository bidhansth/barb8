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
  <style type="text/css">
  .footer {
    position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
    text-align: center;
  } 
  </style>
</head>
<body>
  <?php include('includes/navbar.php');?>

  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-sm-12">
        <p><h4>Hello <?php echo $_SESSION['mname']; ?></h4>
        Your Servicing History:</p>
        <table class="table table-striped table-bordered">
        <?php
          $phone=$_SESSION['phone'];
          $sql = "SELECT * FROM archive WHERE phone='$phone'";
          $result = $db->query($sql);

          if ($result->num_rows > 0) {
              echo "<tr><th>Booking ID</th><th>Name</th><th>Servicing Date</th><th>Drop-off Time</th><th>Vehicle</th><th>Vehicle Number</th><th>Services Required</th><th>Comments</th><th>Review</th></tr>";
              // output data of each row
              while($row = $result->fetch_assoc()) {
                  echo "<tr><td>" . $row["bid"]. "</td><td>" . $row["mname"]. "</td><td>" . $row["sdate"] . "</td><td>" . $row["dtime"] . "</td><td>" . $row["vehicle"] . "</td><td>" . $row["vehiclenum"] . "</td><td>" . $row["services"] . "</td><td>" . $row["comments"] . "</td><td><a href=\"review.php\">Write a Review</a></td></tr>";
              }
          } else {
              echo "0 results";
          }
        ?>
        </table>
        <p>Current Services Booked:</p>
        <table class="table table-striped table-bordered">
        <?php
          $phone=$_SESSION['phone'];
          $sql = "SELECT * FROM bookings WHERE phone='$phone'";
          $result = $db->query($sql);

          if ($result->num_rows > 0) {
              echo "<tr><th>Booking ID</th><th>Name</th><th>Servicing Date</th><th>Drop-off Time</th><th>Vehicle</th><th>Vehicle Number</th><th>Services Required</th><th>Comments</th><th>Status</th><th>Actions</th></tr>";
              // output data of each row
              while($row = $result->fetch_assoc()) {
                  echo "<tr><td>" . $row["bid"]. "</td><td>" . $row["mname"]. "</td><td>" . $row["sdate"] . "</td><td>" . $row["dtime"] . "</td><td>" . $row["vehicle"] . "</td><td>" . $row["vehiclenum"] . "</td><td>" . $row["services"] . "</td><td>" . $row["comments"] . "</td><td>" . $row["status"] .  "</td><td><a href=\"members.php?usercancel=" . $row['bid'] . "\">Cancel</a></td></tr>";
              }
          } else {
              echo "0 results";
          }
        ?>
        </table>
      </div>
    </div>

  <div class="footer">
    <div class="row justify-content-center align-items-end">
      <div class="col-sm-2">
        <a href="booking.php" class="btn barbbutton">Make A Booking</a>
      </div>
      <!--div class="col-sm-2">
        <a href="review.php" class="btn barbbutton">Write A Review</a>
      </div-->
    </div>
  </div>

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>