<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Employee</title>
  <link rel="stylesheet" href="css/barbcss.css">
  <script src="https://kit.fontawesome.com/57c187a429.js" crossorigin="anonymous"></script>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <?php include('includes/server.php'); ?>
  <?php include('includes/errors.php'); ?>
</head>
<body>
	<?php include('includes/adminnavbar.php');?>
	<div class="container-fluid">
		<div class="row justify-content-center" style="margin-top: 20px;">
			<div class="col-sm-3">
				<div class="header">
					<h2>Add	Employee</h2>
				</div>
				<form method="POST">
					<div class="input-group">
						<label>Employee Name</label>
						<input type="text" name="ename">
					</div>
					<div class="input-group">
						<label>Employee Phone Number</label>
						<input type="text" name="ephone">
					</div>
					<div class="input-group">
						<label>Employee Password</label>
						<input type="password" name="epassword">
					</div>
					<div class="input-group">
						<button type="submit" class="barbbutton" name="addemployee">Add Employee</button>
					</div>
				</form>
			</div>
			<div class="col-sm-2">
				&nbsp;
			</div>
			<div class="col-sm-3">
				<div class="header">
					<h2>Delete	Employee</h2>
				</div>
				<table class="table table-striped table-bordered">
        <?php
          $sql = "SELECT * FROM employees";
          $result = $db->query($sql);

          if ($result->num_rows > 0) {
              echo "<tr><th>Name</th><th>Phone</th><th>Actions</th></tr>";
              // output data of each row
              while($row = $result->fetch_assoc()) {
                  echo "<tr><td>" . $row["ename"]. "</td><td>" . $row["ephone"]. "</td><td><a href=\"a_employee.php?delemp=" . $row['eid'] . "\">Delete</a></td></tr>";
              }
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
