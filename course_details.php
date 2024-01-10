<?php
require "functions.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- <script src="js/jquery2.js"></script> -->
		<!-- <script src="main.js"></script> -->
        <link rel="stylesheet" href="css/all.min.css">
    <!-- Google Font for ZIVA on home page -->
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">
     <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
     <link rel="stylesheet" href="css/custom.css">
     <style>.alert {
  padding: 20px;
  background-color: #f44336; /* Red */
  color: white;
  margin-bottom: 15px;
}

/* The close button */
.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

/* When moving the mouse over the close button */
.closebtn:hover {
  color: black;
}
     </style>
</head>
<body>
 <?php    
        if(!isset($_GET['id'])){
            redirect("index.php");
        }
        $course = filteration($_GET);
        $res = select("SELECT * FROM `courses` WHERE course_id=?",[$course["id"]],"i");

        if(mysqli_num_rows($res)==0){
            redirect("index.php");
        }

        $data = mysqli_fetch_assoc($res);
        $result = select("SELECT * FROM `lessons` WHERE lesson_course=?",[$course["id"]],"i");
        if(mysqli_num_rows($result)==0){  
        }
        // $data_res= mysqli_fetch_assoc($result);

?>
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
   

<br/>
<br/>

    <div class="container my-5">
            <div class="row">
                <div class="col-12 my-5 px-2 me-5">
                   
                    
                    <div style="font-size: 14px;">
                        
                        <div class="jumbotron jumbotron-fluid"  style="background-color: #e3f2fd;">
                            <div class="container">
                                <h1 class="display-4 text-center" style="color: rgb(55, 71, 133); font-weight:200px;"><?php echo $data["course_name"]?></h1>
                                <!-- <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p> -->
                            </div>
                        </div>
                        <h1 class="fw-bold text-center"></h1>
                    </div>
                </div>
                    <div class="col-lg-8 col-md-12 px-4">
                        <div class="card mb-4 border-0 shadow-sm rounded-3">
                            <div class="card-header bg-transparent" style="text-align:center; font-weight: 800; font-size: 30px;">
                                    Description</div>
                                <div class="card-body me-5">
                                    <div><p><?= $data["description"]?></p></div>
                                 
                                 
                                      
                                </div>
                                  <div class="card-header bg-transparent" style="text-align:center; font-weight: 800; font-size: 30px;">
                                    Goals</div>
                                <div class="card-body me-5">
                                    <li><?php echo $data["goal"]?></li>
                                   
                                      
                                </div>
                        </div>
                        <div class="card mb-4 border-0 shadow-sm rounded-3">
                            <div class="card-header bg-transparent" style="text-align:center; font-weight: 800; font-size: 30px;">
                                    Circulam</div>
                                <div class="card-body">
                                    <ul>
                                        <?php
                                      while($data_res= mysqli_fetch_assoc($result)){
                                        ?>
                                        <?php
                                        echo <<<data
                                                <li><a href="#">$data_res[lesson_name]</a></li>
                                            data;
                                            ?>
                                        <?php
                                        }
                                        ?>
                                         
                                    </ul>
                                </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-12 px-4">
                        <div class="card border-0 mb-3 float-lg-right shadow" style="max-width: 30rem;">
                            <div class="card-header bg-transparent border-2 shadow mb-3 mt-md-2" style="text-align:center; font-weight: 800; font-size: 30px;">
                            <?= $data["course_name"] ?></div>
                            <img style="height:250px;width:100%;" src= <?= $data["images"] ?>  alt= <?= $data["course_name"] ?>>
                          
                            <div class="card-body">
                                <h5 class="card-title">This Course Includes</h5>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item" style="font-weight: 300; font-size: 20px;">Life Time Access</li>
                                    </ul>
                               
                            </div>
                            <h3 class="mb-3 bold">Rs. <?= $data["price"] ?></h3>
                            <div class="card-footer text-muted align-middle">
                                <!-- <?php
                                    // $product_query = "SELECT * FROM courses";
                                    // $run_query = mysqli_query($con,$product_query);
                                    // if(mysqli_num_rows($run_query) > 0){
                                    //     while($row = mysqli_fetch_array($run_query)){
                                    //         echo "
                                    //             <a href='register.php?id=$row[course_id]' class='main-btn mb-2 btn-sm'>Enroll Now</a>
                                    //         ";
                                    //         }
                                    //     }
                                ?> -->
                                
                                </div>
                                
                                <?php
                                if(!isset($_SESSION['is_login'])){
                                    ?>
                                  <button onclick='show()' class='main-btn mb-2 btn-sm' style='background-color:bisque'>Enroll Now</button>
                                 
                             
                                <?php
                                ;}
                                else{
                                ?>
                                     <a href='paymentstatus.php?id=<?= $data["course_id"] ?>' class='main-btn mb-2 btn-sm' style='background-color:bisque'>Enroll Now</a>
                                 <?php   
                                }
                                ?>
                                <div class="alert" id="alertbx"  style="display:none;">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
  Log In To buy Course
</div>
     <script>
        function show() {
   document.getElementById('alertbx').style.display = "block";
}
     </script>
                     
                     </div>
                    </div>         
            </div>         
        </div>
        <?php
    include("./mainInclude/footer.php")
?>
    <!-- Bootstrap 5 JS CDN Links -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
    
    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

</body>
</html>