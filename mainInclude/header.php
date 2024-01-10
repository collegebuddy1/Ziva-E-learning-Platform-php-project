<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
      <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src = "https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!--Ifra css and js bootstrap 5 link !!-->
    <!-- CSS only -->
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">-->
    <!-- JavaScript Bundle with Popper -->
    <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>-->
    <!--Ifra css and js bootstrap 5 link end !!-->
    <!-- fontawesome css -->
    <link rel="stylesheet" href="css/all.min.css">
    <!-- Google Font for ZIVA on home page -->
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">
     <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
  

    <title>ZIVA</title>
</head>
<body>
    <!-- START NAVIGATION -->
    <header class="header_wrapper">
    <nav class="navbar navbar-expand-lg fixed-top pl-5">
  <a class="navbar-brand" href="index.php">ZIVA</a>
  <span class="navbar-text"> The E-Learning Platform</span>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" 
     aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav custom-nav pl-5">
      <li class="nav-item custom-nav-item"><a href="index.php" class="nav-link">Home</a></li>
      <li class="nav-item custom-nav-item"><a href="course.php" class="nav-link">Courses</a></li>
      <li class="nav-item custom-nav-item"><a href="index.php#indexaboutus" class="nav-link">About Us</a></li>
      <li class="nav-item custom-nav-item"><a href="index.php#indexfooter" class="nav-link">Contact Us</a></li>


      
        <?php  
            session_start();
            if(isset($_SESSION['is_login'])){
              echo'             
              <li class="nav-item custom-nav-item"><a href="lesson.php?pId=myProfile" class="nav-link">My Profile</a></li>
              <li class="nav-item custom-nav-item"><a href="logout.php" class="nav-link">Logout</a></li>'?>
              <?php
            }
            else{
              echo'
              <li class="nav-item custom-nav-item"><a href="#" class="nav-link" data-toggle="modal" data-target="#Login">Login</a></li>
              <li class="nav-item custom-nav-item"><a href="#" class="nav-link" data-toggle="modal" data-target="#stuRegModalCenter">Sign-up</a></li>
              ';
              }
        ?>
        <!-- <li class="nav-item custom-nav-item"><a href="#" class="nav-link">Feedback</a></li>
        <li class="nav-item custom-nav-item"><a href="#" class="nav-link">Contact</a></li> -->
      </ul>
    </div>
  </nav>
<!-- END NAVIGATION -->


    </header>
   
