<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/barbcss.css" rel="stylesheet">
  <title>View Bookings</title>
  <script src="https://kit.fontawesome.com/57c187a429.js" crossorigin="anonymous"></script>
  <?php include('includes/server.php');?>
  <?php include('includes/errors.php');?>
</head>
<body>
  <?php include('includes/adminnavbar.php'); ?>
  <div class="container-fluid">
    <div class="row" style="margin: 15px;">
      <h3 align="center" style="margin-bottom: 40px;">Today's Bookings</h3>
      <table class="table table-striped table-bordered">
        <?php
          $todaydate=date("Y-m-d");
          $sql = "SELECT * FROM bookings WHERE sdate='$todaydate'";
          $result = $db->query($sql);

          if ($result->num_rows > 0) {
              echo "<tr><th>Booking ID</th><th>Name</th><th>Phone</th><th>Email</th><th>Servicing Date</th><th>Drop-off Time</th><th>Vehicle</th><th>Vehicle Number</th><th>Services Required</th><th>Comments</th><th>Status</th><th colspan=3>Actions</th></tr>";
              // output data of each row
              while($row = $result->fetch_assoc()) {
                  echo "<tr><td>" . $row["bid"]. "</td><td>" . $row["mname"]. "</td><td>" . $row["phone"]. "</td><td>" . $row["email"] . "</td><td>" . $row["sdate"] . "</td><td>" . $row["dtime"] . "</td><td>" . $row["vehicle"] . "</td><td>" . $row["vehiclenum"] . "</td><td>" . $row["services"] . "</td><td>" . $row["comments"] . "</td><td>" . $row["status"] . "</td><td><a href=\"a_bookingstoday.php?servicestatus=" . $row['bid'] . "\">Start</a></td><td><a href=\"a_bookingstoday.php?servicecompleted=" . $row['bid'] . "\">Complete</a></td><td><a href=\"a_bookingstoday.php?servicecancelled=" . $row['bid'] . "\">Cancel</a></td></tr>";
              }
          } else {
              echo "0 results";
          }
        ?>
      </table>
    </div>
  </div>
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>