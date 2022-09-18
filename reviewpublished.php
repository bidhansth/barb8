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
            <p><h4>Review published succesfully!</h4><br>
            Your Review:<br></p>
            <p>
                <?php
                    $phone=$_SESSION['phone'];
                    $sql = "SELECT * FROM reviews WHERE phone='$phone' ORDER BY rid desc limit 1";
                    $result = $db->query($sql);
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        echo $row["rcontent"];
                    } else {
                        echo "0 results";
                    }
                ?>
            </p>
        </div>
    </div>
  </div>
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="js/bootstrap.bundle.min.js"></script>  
</body>
</html>