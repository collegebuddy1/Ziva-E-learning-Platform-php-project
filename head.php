<?php 
//include('registeration.php');
// include('server.php');
// include_once("essentials.php");
// include_once("functions.php");


?>

    
    <?php 
    // include_once('links.php') ;
    ?>
   
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <!-- Navbar section -->
    <header class="header_wrapper">
        <nav class="navbar navbar-expand-sm navbar-dark pl-5 fixed-top bg-dark " >
            <div class="container">
                <a class="navbar-brand" href="index.php">
                    <h2 style=" font-weight: bold;">ZIVA</h2>
                    
                </a>
                <span class="navbar-text"> The E-Learning Platform</span>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-stream navbar-toggler-icon"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                  <ul class="navbar-nav custom-nav pl-5">
                    <li class="nav-item custom-nav-item"><a href="index.php" class="nav-link">Home</a></li>
                    <li class="nav-item custom-nav-item"><a href="course.php" class="nav-link">Courses</a></li>
                  
                    <?php  
                        
                        if(isset($_SESSION['is_login'])){   
                          echo '   
                          <li class="nav-item custom-nav-item"><a href="#" class="nav-link">Contact</a></li>
                          <div class="dropdown">
                          <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                          <i class="fa fa-user fa-fw"></i>'?>
                          <?php
                          // echo $_SESSION["userName"];
                          echo'
                          
                          </a>
                          <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                              <li><a class="dropdown-item" href="lessons.php?pId=myprofile"><i class="fa fa-user fa-fw"></i> Profile</a></li>
                              <li><a class="dropdown-item" href=#><i class=fas fa-info  fa-fw></i> Lessons</a></li>
                              <li><a class="dropdown-item" href="logout.php"><i class=fas fa-power-off fa-fw></i> Log Out</a></li>
                          </ul>
                      </div> ';}

                          else{
                            echo '
                         
                        <li class="nav-item custom-nav-item"><a  href="index.php" class="nav-link" data-toggle="modal" data-target="#Login">Login</a></li>
                        <li class="nav-item custom-nav-item"><a href="#" class="nav-link" data-toggle="modal" data-target="#stuRegModalCenter">Sign-up</a></li>
                            ';
                            
                          }
                        ?>       
                       
                    </ul>
                </div>
            </div>
        </nav>

          <!-- Modal -->
          <!-- <div class="modal fade" id="loginmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title d-flex align-items-center" id="staticBackdropLabel">
                  <i class="fa fa-user fa-fw"></i>USER LOGIN</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form method="post" id="login-form">
                      <div class="mb-3">
                            <label  class="form-label">Email address</label>
                            <input type="email" name="email" required class="form-control" > 
                      </div>
                      <div class="mb-3">
                            <label  class="form-label">Password</label>
                            <input type="password" name="password" required class="form-control" > 
                      </div>
                      <div class="d-flex align-items-center justify-content-between">
                          <button type="submit" class="main-btn" name="login" href="index.php">Login</button>
                      </div>
                  </form>
                </div>
              </div>
            </div>
          </div> -->



          <!-- <div class="modal fade" id="signupmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title d-flex align-items-center" id="staticBackdropLabel">
                  <i class="fa fa-user fa-fw"></i> USER SIGNUP</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form method="post" id="reg_form">
                      <div class="mb-3">
                            <label  class="form-label">User Name</label>
                            <small id="statusMsg1"></small>
                            <input type="text" id="stuname" name="username" required class="form-control" > 
                      </div>
                      <div class="mb-3">
                            <label  class="form-label">Email address</label>
                            <small id="statusMsg2"></small>
                            <input type="email" name="stuemail" id="stuemail" required class="form-control" > 
                      </div>
                      <div class="mb-3">
                            <label  class="form-label">Password</label>
                            <small id="statusMsg3"></small>
                            <input type="password" id="stupass" name="stupass" required class="form-control" > 
                      </div>
                    
                      <div class="d-flex align-items-center justify-content-between">
                          <button type="button" class="main-btn" onclick="addstu()" id="signup">Register</button>
                         
                      </div>
                  </form>
                </div>
              </div>
            </div>
          </div> -->

    </header>
    <!-- Navbar section exit -->

