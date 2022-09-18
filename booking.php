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
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="js/vehiclesearchjs.js"></script>
</head>
<body>
  <?php include('includes/navbar.php');?>

  <div class="container">
    <h2>Make a Booking</h2><br>
    <form method="post">
      <div class="row" style="display: none;">
        <div class="col-sm-4">
          <label for="mname"><b>Name</b></label>
          <input type="text" name="mname" value="<?php echo $_SESSION['mname'] ?>" required>
          <br>
          <label for="phone"><b>Phone</b></label>
          <input type="text" placeholder="Enter Phone Number" name="phone" value="<?php echo $_SESSION['phone'] ?>" required>
        </div>
        <div class="col-sm-4">
          <label for="email"><b>Email</b></label>
          <input type="email" placeholder="Enter Email Address" name="email" value="<?php echo $_SESSION['email'] ?>" required>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-4 search-box">
          <label for="sdate"><b>Servicing Date</b></label>
          <input type="date" name="sdate" min="<?php echo date("Y-m-d"); ?>" value="<?php if(isset($_POST['sdate'])) echo $_POST['sdate'] ?>" required>
          <p>&nbsp;</p>
          <label for="vehicle"><b>Vehicle</b></label>
          <input type="text" autocomplete="off" placeholder="Search vehicles..." style="margin-bottom: 2px;" name="vehicle" value="<?php if(isset($_POST['vehicle'])) echo $_POST['vehicle'] ?>" >
          <div class="result"></div>
          <br>
          <label for="vehiclenum"><b>Vehicle Number</b></label>
          <input type="text" name="vehiclenum" placeholder="eg: Ba 69 Pa 4020" value="<?php if(isset($_POST['vehiclenum'])) echo $_POST['vehiclenum'] ?>" required>
          <br>
        </div>
        <div class="col-sm-4">
          <label for="dtime"><b>Drop-off Time</b></label>
          <select name="dtime" id="dtime">
            <option value="9 AM">9 AM</option>
            <option value="10 AM">10 AM</option>
            <option value="11 AM">11 AM</option>
            <option value="12 PM">12 PM</option>
            <option value="1 PM">1 PM</option>
            <option value="2 PM">2 PM</option>
            <option value="3 PM">3 PM</option>
            <option value="4 PM">4 PM</option>
            <option value="5 PM">5 PM</option>
            <option value="6 PM">6 PM</option>
          </select>
          <p class="text-danger"><?php if(isset($timeslot)) echo $timeslot; ?>&nbsp;</p>
          <label for="vehicleother"><b>Vehicle (Other)</b></label>
          <input type="text" placeholder="Enter vehicle here if not available on the list" name="vehicleother" value="<?php if(isset($_POST['vehicleother'])) echo $_POST['vehicleother'] ?>" >
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-sm-4">
          <b>Services Required</b><br>
          <input type="checkbox" name="sreq[]" value="Full Servicing"> Full Servicing<br>
          <input type="checkbox" name="sreq[]" value="Basic Servicing"> Basic Servicing<br>
          <input type="checkbox" name="sreq[]" value="Front Brake"> Front Brake<br>
          <input type="checkbox" name="sreq[]" value="Rear Brake"> Rear Brake<br>
          <input type="checkbox" name="sreq[]" value="Full Wash"> Full Wash<br>
          <input type="checkbox" name="sreq[]" value="Half Wash"> Half Wash<br>
        </div>
        <div class="col-sm-4">
          <label for="comments"><b>Comments</b></label>
          <textarea name="comments" placeholder="Enter any additional comments/requests"></textarea>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-sm-4">
          <button class="barbbutton" type="submit" name="booking">Confirm Booking</button>
        </div>
      </div>
    </form>
  </div>

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>