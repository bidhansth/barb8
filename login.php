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
    .col-sm-3{
      margin-left: 100px;
      margin-right: 100px;
    }
    .row{
      margin-top: 15px;
    }
    .form-control {
      padding: 0;
      margin-bottom: 5px;
      padding-bottom: 15px;
      position: relative;
      border: 0;
    }
    .form-control.success input {
      border-color: #2ecc71;
    }
    .form-control.error input {
      border-color: #e74c3c;
    }
    .form-control i {
      visibility: hidden;
      position: absolute;
      top: 50px;
      right: 15px;
    }
    .form-control.success i.fa-check-circle {
      color: #2ecc71;
      visibility: visible;
    }
    .form-control.error i.fa-exclamation-circle {
      color: #e74c3c;
      visibility: visible;
    }
    .form-control small {
      color: #e74c3c;
      position: absolute;
      bottom: 0;
      left: 0;
      visibility: hidden;
    }
    .form-control.error small {
      visibility: visible;
    }
  </style>
</head>
<body>
  <?php include('includes/navbar.php');?>

  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-sm-3">
        <h5>&nbsp;</h5>
        <h3>Log In</h3><br>
        <form method="post">
          <label for="phone"><b>Phone Number</b></label>
          <input type="text" placeholder="Enter Phone Number" name="phone" required>
          <br><br>
          <label for="password"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="password" required>
          <br><br>
          <button type="submit" name="login" class="barbbutton">Login</button>
        </form>      
      </div>
      <div class="col-sm-3">
        <h5>Not a member yet?</h5>
        <h3>Register</h3><br>
        <form method="post" id="form" class="form">
          <div class="form-control">
            <label for="mname"><b>Name</b></label>
            <input type="text" placeholder="Enter Name" name="mname" maxlength="50" id="mname">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error message</small>
          </div>
          <div class="form-control">
            <label for="email"><b>Email</b></label>
            <input type="email" placeholder="Enter Email address" name="email" id="email" maxlength="50">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error message</small>
          </div>
          <div class="form-control">
            <label for="phone"><b>Phone</b></label>
            <input type="text" placeholder="Enter Phone Number" name="phone" id="phone" maxlength="10">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error message</small>
          </div>
          <div class="form-control">
            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" id="password" maxlength="50">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error message</small>
          </div>
          <div class="form-control">
            <label for="confirmpassword"><b>Confirm Password</b></label>
            <input type="password" placeholder="Enter Password Again" name="confirmpassword" id="password2" maxlength="50">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error message</small>
          </div>
          <button type="submit" name="register" class="barbbutton">Register</button>
        </form>
      </div>
    </div>
  </div>

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript">
    const form = document.getElementById('form');
    const username = document.getElementById('mname');
    const phone = document.getElementById('phone');
    const email = document.getElementById('email');
    const password = document.getElementById('password');
    const password2 = document.getElementById('password2');

    form.addEventListener('submit', e => {
      e.preventDefault();
      checkInputs();
    });

    function checkInputs() {
      // trim to remove the whitespaces
      const usernameValue = username.value.trim();
      const phoneValue = phone.value.trim();
      const emailValue = email.value.trim();
      const passwordValue = password.value.trim();
      const password2Value = password2.value.trim();
      
      if(usernameValue === '') {
        setErrorFor(username, 'Name cannot be blank');
      } else if (!isUsername(usernameValue)) {
        setErrorFor(username, 'Not a valid name');
      } else {
        setSuccessFor(username);
      }

      if(phoneValue === '') {
        setErrorFor(phone, 'Phone cannot be blank');
      } else if (!isPhone(phoneValue)) {
        setErrorFor(phone, 'Not a valid phone');
      } else {
        setSuccessFor(phone);
      }
      
      if(emailValue === '') {
        setErrorFor(email, 'Email cannot be blank');
      } else if (!isEmail(emailValue)) {
        setErrorFor(email, 'Not a valid email');
      } else {
        setSuccessFor(email);
      }
      
      if(passwordValue === '') {
        setErrorFor(password, 'Password cannot be blank');
      } else {
        setSuccessFor(password);
      }

      if(password2Value === '') {
        setErrorFor(password2, 'Confirm Password cannot be blank');
      } else if(passwordValue !== password2Value) {
        setErrorFor(password2, 'Passwords does not match');
      } else{
        setSuccessFor(password2);
      }
    }
    function setErrorFor(input, message) {
      const formControl = input.parentElement;
      const small = formControl.querySelector('small');
      formControl.className = 'form-control error';
      small.innerText = message;
    }
    function setSuccessFor(input) {
      const formControl = input.parentElement;
      formControl.className = 'form-control success';
    }  
    function isEmail(email) {
      return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
    }
    function isUsername(username) {
      return /^[a-zA-Z\s]*$/.test(username);
    }
    function isPhone(phone) {
      return /^[0-9]{10}$/.test(phone);
    }
  </script>
</body>
</html>