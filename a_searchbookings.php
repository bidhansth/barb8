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
    <div class="row justify-content-center" style="margin: 15px;">
      <h3 align="center" style="margin-bottom: 40px;">Search Bookings</h3>
      <div class="col-sm-3">
        <form action="a_searchedbookings.php" method="post">
          Enter date to search:
          <input type="date" name="searchdate">
          <input type="submit" class="barbbutton" name="searchbookings">
        </form>
      </div>
    </div>
  </div>

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>