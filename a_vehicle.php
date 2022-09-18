<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Item</title>
  <link rel="stylesheet" type="text/css" href="css/barbcss.css">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/57c187a429.js" crossorigin="anonymous"></script>
  <?php include('includes/server.php'); ?>
  <?php include('includes/errors.php'); ?>
</head>
<body>
	<?php include('includes/adminnavbar.php');?>
	<div class="container-fluid">
		<div class="row justify-content-center" style="margin-top: 20px;">
			<div class="col-sm-3">
				<div class="header">
					<h2>Add Vehicle</h2>
				</div>
				<form method="POST">
					<div class="input-group">
						<label>Vehicle Make</label>
						<input type="text" name="vmake">
					</div>
					<div class="input-group">
						<label>Vehicle Model</label>
						<input type="text" name="vmodel">
					</div>
					<div class="input-group">
						<button type="submit" class="barbbutton" name="addvehicle">Add Vehicle</button>
					</div>
				</form>
			</div>
			<div class="col-sm-2">
				&nbsp;
			</div>
			<div class="col-sm-3">
				<div class="header">
					<h2>Delete Vehicle</h2>
				</div>
				<table class="table table-striped table-bordered table-sm">
        <?php
          $sql = "SELECT * FROM vehicles ORDER BY vmake";
          $result = $db->query($sql);

          if ($result->num_rows > 0) {
              echo "<tr><th>Make</th><th>Model</th><th>Actions</th></tr>";
              // output data of each row
              while($row = $result->fetch_assoc()) {
                  echo "<tr><td>" . $row["vmake"]. "</td><td>" . $row["vmodel"]. "</td><td><a href=\"a_vehicle.php?delvmake=" . $row['vmake'] . "&delvmodel=" .$row['vmodel'] . "\">Delete</a></td></tr>";
              }
          } else {
              echo "0 results";
          }
        ?>
      </table>
			</div>
		</div>
	</div>
</body>
</html>
