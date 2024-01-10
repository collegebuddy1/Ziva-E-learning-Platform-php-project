<!--Start Including Header-->
<?php 
  include("dbConnection.php");


?>

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
    <style>
      #sidenav li{
    font-size: 1.2rem;
    font-weight: 500;
    color: var(--text-gray);
    display: inline-block;
}

     #sidenav{
    /* background-color: #243475; */
           border: solid  white 1px;
    color: #fff !important;
}
#sidenav:hover {
    /* background-color: #243475;  */
    /* border: solid #243475 1px; */
    color: #fff !important;
    /* border-radius: 10px;  */
}

    </style>
  
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


        <!-- ALEENA ADDED -->
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
      
         <form method="post" action="course.php" class="rounded nav-link">
                <input type="text" name="search" placeholder="Search..." id="search_holder" required>
                <input type="submit" name="save" value="Search" id="search">
              </form>
              <form method="get" action="">
         
        <!-- <li class="nav-item custom-nav-item"><a href="#" class="nav-link">Feedback</a></li>
        <li class="nav-item custom-nav-item"><a href="#" class="nav-link">Contact</a></li> -->
      </ul>
    </div>
  </nav>
<!-- END NAVIGATION -->


    </header>
   





<!--Start course page Banner-->
<div class="bg-dark" style="padding-top:90px">
    <div class="row">
        <img src="./image/courses.png" alt="courses" class="img-fluid" style="object-fit:cover; box-shadow:1-px; height:400px;"/>
    </div>
</div>
<!--End course page Banner-->

<!-- Start All Course -->

<div class="conntainer-fluid mt-5 my-5">
<h1 class="text-center">All Course</h1>
    <div class="row  mt-5">
            
<div class="col-lg-2  ">
    <div class="main-conntainer d-flex">
        <div class="sidebar" id="sidenav">
            <div class="header-box pb-4 px-3 py-4">
                <h1 class="fs-4 text-center"><span class="text-white"><a href="course.php" class="active text-decoration-none"  aria-current="page">Categories</a></span></h1>
                <button class="btn d-md-none d-block close-btn px-1 py-0 text-white"><i class="fa-solid fa-bars-staggered"></i></button>
            </div>
            <ul class="list-unstyled px-3 py-4">
            <?php
                                       $category_query = "SELECT * FROM categories";
                                       $run_query = mysqli_query($conn,$category_query) or die(mysqli_error($conn));
                                       if(mysqli_num_rows($run_query) > 0){
                                        while($row = mysqli_fetch_array($run_query)){
                                            $cid = $row["categories_id"];
                                            $cat_name = $row["categories_name"];
                            
                                            ?>
                                        <li class="nav-item">
                                            <a class="nav-link active" aria-current="page" href="course.php?id=<?php echo $cid;?>" id="get-category"><?= $cat_name ?></a>
                                        </li>
                                   <?php }
                                   } ?>
            </ul>

        </div>
    </div>
</div>
<div class="col-lg-10 col-md-12 px-5 col-sm-4">
                    <?php    
                            if((isset($_GET['id'])) || (isset($_POST['search'] ))){
                                if(isset($_GET["id"])){
                                    
                                $id = $_GET["id"];   
                                $sql = "SELECT * FROM  courses where course_category = $id";
                                }
                                else{
                                        if(!empty($_POST['search']))
                                        {
                                            $search = $_POST['search'];
                                            $sql ="select * from courses where course_name like '%$search%' ";
                                        }
                                
                                }                   
                                                        
                                $run_query = mysqli_query($conn,$sql);
                                if($run_query){
                                    if(mysqli_num_rows($run_query)>0){
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
                                <div class="card  shadow" style="width: 17.5rem;float:left;margin-top:20px;margin-left:70px;border-color:white;border-width:5px;">

                                <div class="card-block">
                                    <img style="height:220px;width:100%;" src= $pro_image  alt="Card image cap">
                                    <div>
                                    <h4 class="card-title" style="overflow: hidden; text-overflow: ellipsis; 
                                    white-space: nowrap;"> $pro_title <span style="color:#5aff28;float:right" ></span></h4>
                                    <h5 class="card-subtitle mb-2 text-muted"></h5>
                                    <p class="card-text" style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap;"">
                                        $pro_desc
                                    </p>
                                </div>
                                </div>
                                </a>
                                <div class="card-footer text-muted">
                                    Rs $pro_price.00/-
                                    <a href="course_details.php?id= $pro_id">More Details</a>
                                    </div>
                                </div>
                                data;
                        }
                    }
                
                    else{
                        echo <<<data
                            <h1 class="text-center" style="margin-top:200px; color:#374785;">No Course Available for now </h1>
                        data;
                    }
                    }
                    }
                            else{
                              
                                     
                            $sql = "SELECT * FROM  courses";
                                                    
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
                            <div class="card  shadow" style="width: 17.5rem;float:left;margin-top:20px;margin-left:70px;border-color:white;border-width:5px;">

                            <div class="card-block">
                                <img style="height:220px;width:100%;" src= $pro_image  alt="Card image cap">
                                  <div>
                                  <h4 class="card-title text-center" style="overflow: hidden; text-overflow: ellipsis; 
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

                        }
                    ?>      
                </div>  
        
    </div>
</div>
 <!-- End All Course Row -->

<!-- End All Course -->
<?php
    include("./mainInclude/footer.php")
?>

 <!--Start Including Footer and Login Signup and Admin login Functionalities-->

   <!-- Bootstrap 5 JS CDN Links -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
    
    <!-- Swiper JS -->
    <!-- <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script> -->
</body>
</html>
<!--End Including Footer-->