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
    <h2>Write a Review</h2><br>
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
        <div class="col-sm-6">
          <label for="rcontent"><b>Your Review:</b></label>
          <textarea name="rcontent" placeholder="Write your review..."></textarea>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-sm-4">
          <button class="barbbutton" type="submit" name="review">Publish Review</button>
        </div>
      </div>
    </form>
  </div>

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>