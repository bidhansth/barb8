<?php
//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

// Starting the session, necessary for using session variables
session_start();

// Declaring and hoisting the variables
$phone = "";
$email = "";
$errors = array();
$_SESSION['success'] = "";
// DBMS connection code -> hostname, username, password, database name
$db = mysqli_connect('localhost', 'root', '', 'barbdb');
// Registration code
if (isset($_POST['register'])) {
	// Receiving the values entered and storing in the variables. Data sanitization is done to prevent SQL injections
	$mname = mysqli_real_escape_string($db, $_POST['mname']);
	$phone = mysqli_real_escape_string($db, $_POST['phone']);
	$email = mysqli_real_escape_string($db, $_POST['email']);
	$password_1 = mysqli_real_escape_string($db, $_POST['password']);
	$password_2 = mysqli_real_escape_string($db, $_POST['confirmpassword']);
	// Ensuring that the user has not left any input field blank
	// error messages will be displayed for every blank input
	if (empty($mname)) { array_push($errors, "Name is required"); }
	if (empty($phone)) { array_push($errors, "Phone number is required"); }
	if (empty($email)) { array_push($errors, "Email is required"); }
	if (empty($password_1)) { array_push($errors, "Password is required"); }
	if ($password_1 != $password_2) {
		array_push($errors, "The two passwords do not match");
		// Checking if the passwords match
	}
	// If the form is error free, then register the user
	if (count($errors) == 0) {
		// Password encryption to increase data security
		$password = md5($password_1);
		// Inserting data into table
		$query = "INSERT INTO members (mname, email, phone, password) VALUES('$mname', '$email', '$phone', '$password')";
		mysqli_query($db, $query);
		// Storing username of the logged in user,
		// in the session variable
		$_SESSION['mname'] = $mname;
		$_SESSION['phone'] = $phone;
		$_SESSION['email'] = $email;
		// Welcome message
		$_SESSION['success'] = "You have logged in";
		// Page on which the user will be
		// redirected after logging in
		header('location: members.php');
	}
}
// User login
if (isset($_POST['login'])) {
	// Data sanitization to prevent SQL injection
	$phone = mysqli_real_escape_string($db, $_POST['phone']);
	$password = mysqli_real_escape_string($db, $_POST['password']);
	// Error message if the input field is left blank
	if (empty($phone)) {
		array_push($errors, "Phone number is required");
	}
	if (empty($password)) {
		array_push($errors, "Password is required");
	}
	// Checking for the errors
	if (count($errors) == 0) {
		// Password matching
		$password = md5($password);
		$query = "SELECT * FROM members WHERE phone='$phone' AND password='$password'";
		$results = mysqli_query($db, $query);
		// $results = 1 means that one user with the entered username exists
		if (mysqli_num_rows($results) == 1) {
			$row = mysqli_fetch_array($results);
			$mname=$row['mname'];
			$email=$row['email'];
			// Storing username in session variable
			$_SESSION['mname'] = $mname;
			$_SESSION['phone'] = $phone;
			$_SESSION['email'] = $email;
			// Welcome message
			$_SESSION['success'] = "You have logged in!";
			// Page on which the user is sent to after logging in
			header('location: members.php');
		}
		else {
			// If the username and password doesn't match
			array_push($errors, "Username or password incorrect");
		}
	}
}
// logout code
if (isset($_GET['logout'])){
    unset($_SESSION['mname']);
    unset($_SESSION['phone']);
    unset($_SESSION['email']);
    session_destroy();
    header("location: index.php");
}

//booking code
if (isset($_POST['booking'])) {
	$mname=$_POST['mname'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	$sdate=$_POST['sdate'];
	$vehicleo=$_POST['vehicle'];
	$vehicleother=$_POST['vehicleother'];
	$vehicle=$vehicleo . $vehicleother;
	$vehiclenum=$_POST['vehiclenum'];
	$dtime=$_POST['dtime'];
	$sreq=$_POST['sreq'];
	$services=implode(",",$sreq);
	$comments=$_POST['comments'];

	$checkunique=mysqli_query($db,"SELECT * FROM bookings where sdate='$sdate' AND dtime='$dtime'");
    if(mysqli_num_rows($checkunique)>0){
		$timeslot="Time Slot taken. Please book at a different time";
    }
    else{
	$inss="INSERT INTO bookings(mname,phone,email,sdate,dtime,vehicle,vehiclenum,services,comments) VALUES('$mname','$phone','$email','$sdate','$dtime','$vehicle','$vehiclenum','$services','$comments')";
		mysqli_query($db,$inss);
		header("Location:booked.php"); 
	}
}

//admin panel code
if (isset($_GET['servicecompleted'])) {
	$compbid=$_GET['servicecompleted'];
   	$retval=mysqli_query($db,"SELECT * FROM bookings WHERE bid=$compbid");   
   	$row=mysqli_fetch_array($retval, MYSQLI_ASSOC);
    $compmname=$row['mname'];
    $compemail=$row['email'];
	mysqli_query($db,"INSERT INTO archive SELECT * from bookings where bid=$compbid");
	mysqli_query($db,"DELETE FROM bookings WHERE bid=$compbid;");
	include('mailer.php');
}

if (isset($_GET['servicecancelled'])) {
	$canbid=$_GET['servicecancelled'];
	mysqli_query($db,"INSERT INTO cancellations SELECT * from bookings where bid=$canbid");
	mysqli_query($db,"DELETE FROM bookings WHERE bid=$canbid");
}

if (isset($_GET['servicestatus'])) {
	$statusbid=$_GET['servicestatus'];
	mysqli_query($db,"UPDATE bookings SET status='Active' WHERE bid=$statusbid");
}

if (isset($_GET['deletereview'])) {
	$delrid=$_GET['deletereview'];
	mysqli_query($db,"DELETE FROM reviews WHERE rid=$delrid");
}

//add vehicle
if(isset($_POST['addvehicle'])) {
	$vmake=$_POST['vmake'];
	$vmodel=$_POST['vmodel'];
	if ((empty($_POST["vmake"]))||(empty($_POST["vmodel"]))){
		echo "empty";
	}
	else{
		$inss="INSERT INTO vehicles(vmake,vmodel) VALUES('$vmake','$vmodel')";
		mysqli_query($db,$inss);
		echo "Vehicle added succesfully";
	}
}
//delete vehicle
if(isset($_GET['delvmake'])) {
	$vmake=$_GET['delvmake'];
	$vmodel=$_GET['delvmodel'];
	$inss="DELETE FROM vehicles WHERE vmake='$vmake' AND vmodel='$vmodel'";
	mysqli_query($db,$inss);
}

//add employee
if(isset($_POST['addemployee'])) {
	$ename=$_POST['ename'];
	$ephone=$_POST['ephone'];
	$epassword=$_POST['epassword'];
	if ((empty($_POST["ename"]))||(empty($_POST["ephone"]))||(empty($_POST["epassword"]))){
		echo "empty";
	}
	else{
		$inss="INSERT INTO employees(ename,ephone,epassword) VALUES('$ename','$ephone','$epassword')";
		mysqli_query($db,$inss);
		echo "Employee added succesfully";
	}
}
//delete employee
if(isset($_GET['delemp'])) {
	$deleid=$_GET['delemp'];
	$inss="DELETE FROM employees WHERE eid=$deleid";
	mysqli_query($db,$inss);
}

//user cancel code
if(isset($_GET['usercancel'])){
	$ucbid=$_GET['usercancel'];
	$phone=$_SESSION['phone'];
	mysqli_query($db,"DELETE FROM bookings WHERE bid='$ucbid' AND phone='$phone'");
}

// Employee login
if(isset($_POST['employeelogin'])) {
	// Data sanitization to prevent SQL injection
	$ephone = mysqli_real_escape_string($db, $_POST['ephone']);
	$epassword = mysqli_real_escape_string($db, $_POST['epassword']);
	// Error message if the input field is left blank
	if (empty($ephone)) {
		array_push($errors, "Phone number is required");
	}
	if (empty($epassword)) {
		array_push($errors, "Password is required");
	}
	// Checking for the errors
	if (count($errors) == 0) {
		// Password matching
		$query = "SELECT * FROM employees WHERE ephone='$ephone' AND epassword='$epassword'";
		$results = mysqli_query($db, $query);
		// $results = 1 means that one user with the entered username exists
		if (mysqli_num_rows($results) == 1) {
			$row = mysqli_fetch_array($results);
			$ename=$row['ename'];
			// Storing username in session variable
			$_SESSION['ename'] = $ename;
			$_SESSION['ephone'] = $ephone;
			// Welcome message
			$_SESSION['success'] = "You have logged in!";
			// Page on which the user is sent to after logging in
		}
		else {
			// If the username and password doesn't match
			array_push($errors, "Phone number or password incorrect");
		}
	}
}

//review code
if (isset($_POST['review'])) {
	$mname=$_POST['mname'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$rcontent=$_POST['rcontent'];

	$revins="INSERT INTO reviews(mname,email,phone,rcontent,rdate) VALUES('$mname','$email','$phone','$rcontent',now())";
		mysqli_query($db,$revins);
		header("Location:reviewpublished.php"); 
}


?>