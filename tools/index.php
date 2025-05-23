<?php
session_start();
$authenticated = false;
if (isset($_SESSION["email"])) {
    $authenticated = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    
    <link rel="stylesheet" href="welcome-page.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        html, body {
            height: 100%;
            margin: 0;
        }
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(-45deg, #08110E, #3F6656 );
        }
        .main-tab {
            width: 80%;
            height: 500px;
            background: #3F6656;
            position: relative;
            border-radius: 40px;
            border: 1px solid #57977C;
            box-sizing: border-box;
            padding: 20px;
        }

       .gradient-tab1, .gradient-tab2 {
           position: absolute;
           top: 0;
           bottom: 0;
           width: 50%; 
           box-sizing: border-box;
           overflow: hidden;
}

        .gradient-tab1 {
           left: 0;
           border-top-left-radius: 50px;
           border-bottom-left-radius: 50px;
    
}

        .gradient-tab2 {
           right: 0;
           border-top-right-radius: 50px;
           border-bottom-right-radius: 50px;
   
}

.gradient1l, .gradient2l, .gradient3l, .gradient4l, .gradient5l,
.gradient6l, .gradient7l, .gradient8l, .gradient9l, .gradient10l,
.gradient1r, .gradient2r, .gradient3r, .gradient4r, .gradient5r,
.gradient6r, .gradient7r, .gradient8r, .gradient9r, .gradient10r {
    width: 10%; 
    height: 100%;
    position: absolute;
    top: 0;
    
}

        .resident-profiling-text {
            position: absolute;
            top: 20%;
            left: 51%;
            transform: translateX(-50%);
            color: #ffffff;
            font-size: 50px;
            font-weight: 850;
            font-family: 'Inter', sans-serif;
            text-align: center;
            z-index: 10;
        }
        .explain-text {
            position: absolute;
            top: 33%;
            left: 51%;
            transform: translateX(-50%);
            color: #ffffff;
            font-size: 20px;
            font-weight: 500;
            font-family: 'Inter', sans-serif;
            text-align: center;
            z-index: 10;
        }
        .logIn-button {
            position: absolute;
            top: 40%;
            left: 50%;
            transform: translate(-50%);
            width: 12.5%;
            height: 8.75%;
            background-color: #ffffff;
            color: #012516;
            font-family: 'Inter', sans-serif;
            font-size: 1.5vw;
            font-weight: 600;
            border: none;
            border-radius: 15px;
            cursor: pointer;
            z-index: 11;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }
        .logIn-button:hover {
            background-color: rgb(15, 224, 123);
        }

        .register-button {
            position: absolute;
            top: 55%;
            left: 50%;
            transform: translate(-50%);
            width: 12.5%;
            height: 8.75%;
            background-color: #ffffff;
            color: #012516;
            font-family: 'Inter', sans-serif;
            font-size: 1.5vw;
            font-weight: 600;
            border: none;
            border-radius: 15px;
            cursor: pointer;
            z-index: 11;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }
        .register-button:hover {
            background-color: rgb(15, 224, 123);
        }

        .toclong-logo {
            position: absolute;
            top: 0;
            left: 0;
            width: 100px;
            height: 100px;
            object-fit: contain;
            z-index: 12;
            margin: 15px;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-body-tertiary border-bottom shadow-sm fixed-top">
  <div class="container">
    <a class="navbar-brand" href="./index.php">
        <img src="./images/toclong.png" width="30" height="30" class="d-inline-block align-top" alt=""> BARANGAY TOCLONG</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link text-dark" href="./index.php">Home</a>
        </li>
      </ul>

      <?php if ($authenticated): ?>
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-dark" href="#" role="button" data-bs-toggle="dropdown">
                Admin
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="./profile.php">Profile</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="./logout.php">Logout</a></li>
              </ul>
          </li>
        </ul>
      <?php endif; ?>
    </div>
  </div>
</nav>

<!-- Main Content -->
<div class="main-tab">
    <div class="resident-profiling-text">RESIDENT PROFILING</div>
    <div class="explain-text">Web Based Resident Profiling for Barangay Toclong, Cavite</div>

    <?php if (!$authenticated): ?>
        <a href="./register.php" class="register-button btn btn-primary">Register</a>
        <a href="./login.php" class="logIn-button btn btn-primary">Login</a>
    <?php endif; ?>

    <div><img src="images/toclong.png" alt="toclong logo" class="toclong-logo"></div>

    <div class="gradient-tab1">
        <?php for ($i = 0; $i < 10; $i++): ?>
            <div class="gradient<?= ($i + 1) ?>r" style="background: linear-gradient(180deg, #57977C 0%, #012516 <?= ($i + 1) * 10 ?>%); left: <?= $i * 10 ?>%;"></div>
        <?php endfor; ?>
    </div>

    <div class="gradient-tab2">
        <?php for ($i = 0; $i < 10; $i++): ?>
            <div class="gradient<?= ($i + 1) ?>l" style="background: linear-gradient(180deg, #012516 <?= 100 - $i * 10 ?>%, #57977C 100%); left: <?= $i * 10 ?>%;<?= $i == 9 ? ' border-radius: 0px 50px 50px 0px;' : '' ?>"></div>
        <?php endfor; ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
