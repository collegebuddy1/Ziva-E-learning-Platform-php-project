<!--Start Including header-->
<?php 
include('./dbConnection.php');
include('./mainInclude/header.php');
// include('head.php');
?>
<!--End Including header-->

<!-- START VID BG -->
<div class="container-fluid remove-vid-margin">
      <div class="vid-parent">
        <video playinline autoplay muted loop>
          <source src="video/banvid.mp4">
        </video>
        <div class=vid-overlay></div>
        <div class=vid-content>
          <h1 class="my-content"  style="font-size: 4em; text-align: center; position: relative; top: -50px; left: -50px;">Welcome to ZIVA</h1>
          <small class="my-content" style="font-size: 1.5em; text-align: center;position: relative; top: -50px; left: -50px;">Learn and Grow</small><br>
          <?php
              if(!isset($_SESSION['is_login'])){
                echo '<a href="#" class="btn btn-warning mt-3" style=" position: relative; top: -50px; left: -50px"
                data-toggle="modal" data-target="#stuRegModalCenter">Get Started</a>';
                } else {
                echo '<a href="#" class="btn btn-primary mt-3" style=" position: relative; top: -50px; left: -50px">My Profile</a>';
              echo  $_SESSION['userId'] ;
              echo $_SESSION['userName'];}
           ?>
        </div>
      </div>
    </div>
    <!-- END VID BG -->

    <!-- START TEXT BANNER -->
    <div class="container-fluid bg-warning txt-banner " style = "height: 45px; width: 100%; margin: 0 auto;  text-align: center;">
      <div class="row-bottom-banner p-1">
        <div class="col-sm d-inline text-black">
          <a><i class="fas fa-book-open mr-3"></i> 100+ Online Courses</a>
        </div>
        <div class="col-sm d-inline text-black">
          <a><i class="fas fa-users mr-3"></i> Expert Instructors</a>
        </div>
        <div class="col-sm d-inline text-black">
          <a><i class="fas fa-keyboard mr-3"></i> Lifetime Access</a>
        </div>
        <div class="col-sm d-inline text-black">
          <a><i class="fas fa-rupee-sign mr-3"></i> Money Back Gurantee </a>
        </div>
      </div>
    </div>
    <!-- END TEXT BANNER -->

    <!-- Start Most Popular Course -->
    <div class="container mt-5">
       <h1 class="text-center">Popular Course</h1>
    <!-- Start Most Popular Course 1st Card Deck --> 
    <div class="row p-3">
    
         
     
      <?php
            $sql = "SELECT * FROM courses LIMIT 3"; $result = $conn->query($sql);
            $run_query = mysqli_query($conn,$sql);
            while($row=mysqli_fetch_array($run_query)){
                    $pro_id    = $row['course_id'];
                    $pro_title=$row['course_name'];
                    $pro_cat   = $row['course_category'];
                    $pro_desc=$row['description'];
                    $pro_title = $row['course_name'];
                    $pro_price = $row['price'];
                    $pro_image = $row['images']; 
                                

            echo <<<data
              
            <a href="course_details.php?id= $pro_id" class="text-decoration-none ">
            <div class="card shadow-lg" style="width: 18rem;margin-top:20px;margin-left:60px; margin: 30px;">

            <div class="card-block">
                <img style="height:250px;width:100%;" src= $pro_image  alt="Card image cap">
                  <div>
                  <h4 class="card-title" style="overflow: hidden; text-overflow: ellipsis; 
                  white-space: nowrap;"> $pro_title <span style="color:#5aff28;float:right" ></span></h4>
                  <!-- <h5 class="card-subtitle mb-2 text-muted"></h5> -->
                  <p class="card-text" style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap;"">
                  $pro_desc
                </p>
                  <!-- <a href="" class="card-link">Link</a> -->
                  <!-- <a href="" class="card-link">Developer Profile</a> -->
                  </a>
             <div class="card-footer text-muted">
                  Rs $pro_price.00/-
                  <a class="btn btn-primary text-white font-weight-bolder float-right" 
                  href="course_details.php?id= $pro_id">Enroll</a>  
                  </div>
              </div>
           
            </div>
            </div>

            data;
            }
        ?>
                    
  
        </div>
    <!-- End Most Popular Course 1st Card Deck --> 
      <!-- Start Most Popular Course 2nd Card Deck --> 
        
      <!--  End  Most Popular Course 2nd  Card Deck --> 
        <div class="text-center m-2">
          <a class="btn btn-warning btn-sm" href="courses.php">View All</a>
        </div>
    </div>
<!--End Most popular course-->

<!-- Start Contact us -->

<!-- End Contact us -->
<div id="indexaboutus">
<?php include('aboutus.php')?>
</div>
<!-- Social media -->
    <div class="container-fluid bg-warning"> <!-- Start Social Follow -->
      <div class="row text-center p-1">
        <div class="col-sm">
          <a style="color: black;" class="social-hover" href="#"><i class="fab fa-facebook-f"></i> Facebook</a>
        </div>
        <div class="col-sm">
          <a style="color: black;" class="social-hover" href="#"><i class="fab fa-twitter"></i> Twitter</a>
        </div>
        <div class="col-sm">
          <a style="color: black;" class="social-hover" href="#"><i class="fab fa-whatsapp"></i> WhatsApp</a>
        </div>
        <div class="col-sm">
          <a style="color: black;" class="social-hover" href="#"><i class="fab fa-instagram"></i> Instagram</a>
        </div>
      </div>
    </div>


    <!-- Start About Section -->
    <div class="container-fluid" style="background-color: #E9ECE, margin: 0; padding: 0;"> 
    <div class="container-fluid pt-4" style="background-color: #E9ECEF"> 
      <div class="row text-center">
        <div class="col-sm">
          <h5>About Us</h5>
          <p>ZIVA provides universal access to the world's best education, partnering with top universities and organizations to offer courses online.</p>
        </div>
        <div class="col-sm">
          <h5>Category</h5>
          <a class="text-dark" href="#">Web Development</a><br /> 
          <a class="text-dark" href="#">Artificial Intelligence</a><br />
          <a class="text-dark" href="#">Mobile App Development</a><br />
          <a class="text-dark" href="#">Data Analysis</a><br />
          <a class="text-dark" href="#">           </a><br />
     
        </div>
          <div class="col-sm">
            <h5>Contact Us</h5>
            <p>www.ZIVA.com <br>Developed by students of NED university of Engineering and Technology</p>
          </div>
        </div>
      </div>

<!--Including footer and Login Signup and Admin login Functionalities-->
<div id="indexfooter">
<?php
include('./mainInclude/footer.php');
?>
</div>
<!--Including Footer END-->
