<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/indexcss.css">
  <!-- Fontawesome CDN Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
  <title>Service Nepal.</title>
  <?php include('includes/server.php');?>
</head>
<body>
<nav>
  <div class="navbar">
    <div class="logo"><a href="#">Service Nepal.</a></div>
    <ul class="menu">
        <li><a href="#home">Home</a></li>
        <li><a href="#about">About Us</a></li>
        <li><a href="#skills">Pricings</a></li>
        <li><a href="#services">Services</a></li>
        <li><a href="#contact">Contact</a></li>
        <?php
          if(!isset($_SESSION['mname'])){
            ?>
            <li><a href="" onclick="alert('Please Log In to view your bookings.'); return false;">My Bookings</a></li>
            <?php
          }
          if(isset($_SESSION['mname'])){
            ?>
            <li><a href="members.php">My Bookings</a></li>
            <li><a><i class="far fa-user"></i>&nbsp;<?php echo $_SESSION['mname']; ?></a></li>
            <li><a href="index.php?logout=1"><i class="fas fa-sign-out-alt"></i></a></li>
            <?php
          }
        ?>
        
        <div class="cancel-btn">
          <i class="fas fa-times"></i>
        </div>
    </ul>
    <div class="media-icons">
      <a href="https://www.facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a>
      <a href="https://twitter.com" target="_blank"><i class="fab fa-twitter"></i></a>
      <a href="https://www.instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
    </div>
  </div>
  <div class="menu-btn">
    <i class="fas fa-bars"></i>
  </div>
</nav>

<!-- Home Section Start -->
<section class="home" id="home">
  <div class="home-content">
    <div class="text">
      <div class="text-one">WE KNOW</div>
      <div class="text-two">HOW TO SATISFY YOUR</div>
      <div class="text-three">AUTO NEEDS</div>
      <div class="text-four">Vehicle servicing made easier than ever with online booking and payment.</div>
    </div>
    <div class="button">
      <?php
        if(isset($_SESSION['mname'])){
          ?>
          <a href="booking.php"><button style="margin: 5px">Make a Booking</button></a>
          <?php
        }
        if(!isset($_SESSION['mname']) AND !isset($_SESSION['ename'])){
          ?>
              <a href="login.php"><button style="margin: 5px">Login / Register</button></a>
              <?php
        }
        if(isset($_SESSION['ename'])){
          echo 'Logged in as Employee';
        }
      ?>
    </div>
  </div>
</section>

<!-- About Section Start -->
<section class="about" id="about">
  <div class="content">
    <div class="title"><span>About Us</span></div>
    <div class="about-details">
      <div class="left">
        <img src="img/index_about.jpg">
      </div>
      <div class="right">
        <div class="topic">Servicing your vehicle since 2019</div>
        <p>Service Nepal offers complete auto care for your vehicle. Whether it’s time for your next factory recommended maintenance visit, a routine oil change, new tires, or repair services on your brakes, muffler and exhaust, suspension, air conditioner, or any other mechanical or electrical component of your car, Service Nepal is in your neighborhood and ready to serve you. We have tailored our services around what our community needs. Service Nepal is an excellent choice for 2 Wheelers, 4 Wheelers, Diesel Trucks, as well as all Domestic Vehicles. We believe in giving you the very best service for auto repair that you can find. That’s why we seek out and hire the very best auto repair technicians. We look for technicians that have strong experience with the brands of vehicles we service. We hire those with ASE Certified and Master Technician certifications that shows they keep current on their training. Experience and expertise translate into the job done right the first time and done quicker. By hiring the right people, we are able to provide one of the best auto services possible. Having your car serviced at the correct intervals using the correct items as recommended by the manufacturer can save you money in the long run. An engine that hasn't been serviced regularly will use more fuel than one that is well-maintained, which means more trips to the pumps. Cheap tyres that are worn are worse in the wet and have a greater braking distance than quality tyres with good tread, which means you're not as safe as you could be. And brakes are the only thing that slow you down, so why would you risk not having them maintained properly?</p>
        <div class="button icon"> 
          <a href="https://www.google.com/maps/place/Nepal+College+of+Information+Technology/@27.6713817,85.3365496,17z/data=!3m1!4b1!4m5!3m4!1s0x39eb19e8af4a5fe3:0x963d00cdf478c6b6!8m2!3d27.6713817!4d85.3387383" target="_blank"><button><i class="fas fa-map-marker-alt"></i>&nbsp;Get Directions</button></a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Pricing Section Start -->
<section class="skills" id="skills">
  <div class="content">
    <div class="title"><span>Pricings</span></div>
    <div class="skills-details">
      <div class="text">
        <div class="topic">We speak your car's language</div>
        <p>Broken things deserve to be repaired. The spider is a repairer. If you bash into the web of a spider, she doesn't get mad. She weaves and repairs it.</p>
        <div class="experience">
          <div class="num">2</div>
          <div class="exp">Years Of <br> Service</div>
        </div>
      </div>
      <div class="boxes">
        <div class="box">
          <div class="topic">Basic Servicing</div>
          <div class="per">Rs.1000</div>
        </div>
        <div class="box">
          <div class="topic">Full Servicing</div>
          <div class="per">Rs.3000</div>
        </div>
        <div class="box">
          <div class="topic">Half Wash</div>
          <div class="per">Rs.500</div>
        </div>
        <div class="box">
          <div class="topic">Full Wash</div>
          <div class="per">Rs.1000</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- My Services Section Start -->
<section class="services" id="services">
  <div class="content">
    <div class="title"><span>Our Services</span></div>
    <div class="boxes">
      <div class="box">
        <div class="icon">
          <i class="fas fa-wrench"></i>
        </div>
        <div class="topic">Basic Servicing</div>
        <p></p>
      </div>
      <div class="box">
        <div class="icon">
          <i class="fas fa-tools"></i>
        </div>
        <div class="topic">Full Servicing</div>
        <p></p>
      </div>
      <div class="box">
        <div class="icon">
          <i class="fas fa-hands-wash"></i>
        </div>
        <div class="topic">Half Wash</div>
        <p> </p>
      </div>
      <div class="box">
        <div class="icon">
          <i class="fas fa-bath"></i>
        </div>
        <div class="topic">Full Wash</div>
        <p></p>
      </div>
      <div class="box">
        <div class="icon">
          <i class="fas fa-car-side"></i>
        </div>
        <div class="topic">Rental</div>
        <p> </p>
      </div>
      <div class="box">
        <div class="icon">
          <i class="fas fa-store"></i>
        </div>
        <div class="topic">Buy and Sell</div>
        <p></p>
      </div>
    </div>
  </div>
</section>

<!-- Contact Me section Start -->
<section class="contact" id="contact">
  <div class="content">
    <div class="title"><span>Contact Us</span></div>
    <div class="text">
      <div class="topic">Have Any Queries?</div>
      <p>Email us at: servicenepal@gmail.com</p>
      <P>Contact No. +977 9843777722</P>
      <p>Lalitpur, Nepal</p>
      <div class="button">
        <a href="https://mail.google.com" target="_blank"><button>Send Email</button></a>
      </div>
    </div>
  </div>
</section>

<!-- Move to up button -->
<div class="scroll-button">
  <a href="#home"><i class="fas fa-arrow-up"></i></a>
</div>
<!-- Footer Section Start -->
<footer>
  <div class="text">
    <span>Created By <a href="#">BARB CREATIONS</a> | &#169; 2021 All Rights Reserved</span>
  </div>
</footer>
<script src="js/ajitjs.js"></script>
</body>
</html>