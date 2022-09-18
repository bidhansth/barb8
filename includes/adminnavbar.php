<nav class="navbar navbar-expand-lg navbar-dark" style="background:#047a94">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Service Nepal.</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarDropdown" style="margin-left: 140px;">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item hvr-underline">
          <a class="nav-link active" href="admin.php">Home</a>
        </li>
        <li class="nav-item dropdown">
          <?php 
            if(!isset($_SESSION['ename']) AND !isset($_SESSION['mname'])){
              ?>
              <a class="nav-link active hvr-underline" onclick="document.getElementById('id01').style.display='block'" style="cursor: pointer;">LOG IN</a>
              <?php 
              }
          ?>
          <?php 
            if(isset($_SESSION['ename'])){
              ?>
              <a class="nav-link active dropdown-toggle hvr-underline" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="far fa-user"></i>&nbsp;<?php echo $_SESSION['ename']; ?></a>
              <ul class="dropdown-menu" style="left: 30px;" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item" href="admin.php?logout=1" style="color: red;font-weight:600;">LOG OUT</a></li>
              </ul>
              <?php
              }
          ?>
        </li>
      </ul>
    </div>
  </div>
</nav>