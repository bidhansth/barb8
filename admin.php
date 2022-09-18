<!DOCTYPE html>
<html lang="en">
<head>
  <title>Service Nepal Admin Panel</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/barbcss.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/57c187a429.js" crossorigin="anonymous"></script>
  <?php include('includes/server.php'); ?>
  <?php include('includes/errors.php'); ?>
  <style>
	.col-sm-3 a:link, .col-sm-3 a:visited {
  		background-color: white;
  		color: black;
  		border: 2px solid #047a94;
  		padding: 10px 20px;
  		text-align: center;
  		text-decoration: none;
  		display: inline-block;
  		margin: 5px;
	}
	.col-sm-3 a:hover, .col-sm-3 a:active {
  		background-color: #047a94;
  		color: white;
	}
	.linkb{
		width: 100%;
  	font-size: 1.4em;
	}
	h2{
		color: white;
	}
	.hdr{
		background-color: #047a94;
		color: white;
		padding: 20px;
		font-weight: bold;
  	font-size: 1.6em;
  	width: 100%;
  	text-align: center;
  	margin: 5px;
	}
	.row{
		margin-top: 10px;
	}
</style>
</head>
<body>
	<?php include('includes/adminnavbar.php'); ?>
	<div class="container-fluid">
		<div class="row justify-content-center">
			<?php
				if(isset($_SESSION['ename'])){
					?>
					<div class="col-sm-3">
						<p class="hdr">Admin Panel</p>
						<a href="a_bookingstoday.php" class="linkb">View Today's Bookings</a><br>
						<a href="a_bookings.php" class="linkb">View All Bookings</a><br>
						<a href="a_searchbookings.php" class="linkb">Search Completed Bookings</a><br>
						<a href="a_cancellations.php" class="linkb">View Cancelled Bookings</a><br>
						<a href="a_vehicle.php" class="linkb">Add or Delete Vehicle</a><br>
						<a href="a_employee.php" class="linkb">Add or Delete Employee</a><br>
						<a href="a_reviews.php" class="linkb">Analyze Reviews</a><br>
					</div>
					<?php
				}
				if(!isset($_SESSION['ename']) AND !isset($_SESSION['mname'])){
					?>
					<div class="col-sm-3">
						<h3>Employee Log In</h3><br>
						<form method="post">
		          <label for="phone"><b>Phone Number</b></label>
		          <input type="text" placeholder="Enter Phone Number" name="ephone" required>
		          <br><br>
		          <label for="password"><b>Password</b></label>
		          <input type="password" placeholder="Enter Password" name="epassword" required>
		          <br><br>
		          <button type="submit" name="employeelogin" class="barbbutton">Login</button>
		        </form>
					</div>
					<?php
					}
					if(isset($_SESSION['mname'])){
						echo 'Logged in as customer.';
					}
					?>
		</div>
	</div>

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
