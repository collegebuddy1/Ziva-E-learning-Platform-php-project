<?php 
  include("dbConnection.php");
  include("functions.php");

  session_start();
?>
<?php

 ?>  
<!DOCTYPE html>
<html lang="en">
<head>
   
    <title>Ziva</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
    <style>
      #sidenav li{
    font-size: 1.2rem;
    font-weight: 500;
    color: var(--text-gray);
    display: inline-block;
}

     #sidenav{
    background-color: #243475;
         
    color: #fff !important;
}
#sidenav:hover {
    background-color: #243475; 
    border: solid #243475 1px;
    color: #fff !important;
    /* border-radius: 10px;  */
}

    </style>
  

    
    
</head>
<body>

<div class="container-fluid mt-5 my-5">
    <div class="row  mt-5">
            
<div class="col-lg-2  ">
    <div class="main-container d-flex">
        <div class="sidebar sideNav" id="sidenav">
            <div class="header-box pb-4 px-3 py-4">
                <h1 class="fs-4 text-center"><span class="text-white"><a href="lesson.php?pId=myProfile" class="active text-decoration-none"  aria-current="page">
                  Dasboard</a></span></h1>
                <button class="btn d-md-none d-block close-btn px-1 py-0 text-white"><i class="fa-solid fa-bars-staggered"></i></button>
            </div>
            <ul class="list-unstyled px-3 py-4">
            <li>
                <a class="nav-link  default" aria-current="page" href="index.php" class="text-decoration-none"
                >Home</a>
                </li>
            <li>
                <a class="nav-link  default" aria-current="page" href="lesson.php?pId=myprofile" class="text-decoration-none"
                >My Profile</a>
                </li>
             
                <li class="dropdown">
                    <a class=" text-decoration-none dropdown-toggle nav-link" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                     My Courses</a>
                     <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">     
                        <?php 
                            $q = "SELECT s.course_name AS courseName,s.course_id as courseId from courses s,course_enrollments c WHERE c.course_id = s.course_id AND c.payment_done= 1 AND c.student_id=$_SESSION[userId]";
                            $res = mysqli_query($conn, $q);  
                            while( $data =  mysqli_fetch_array($res)){
                                $cId = $data["courseId"];
                                $name = $data["courseName"];
                                echo <<<data
                               
                                 <li><a href="lesson.php?cId=$cId" class="dropdown-item pl-4 p-2">$name</a></li>
                                data;
                            ?>
                            <?php  }  ?>
                    </ul>
                    
                </li>
                
                
                <li><a href="logout.php" class="text-decoration-none nav-link" aria-current="page">Logout</a></li>
        
            </ul>

        </div>
    </div>
</div>
<div class="col-lg-10 col-md-12 px-5 col-sm-4">
<?php 
   
 
   if (isset($_GET["cId"])){
   
       $lId = $_GET["cId"];
   
       $query = "SELECT * FROM lessons where lesson_course =  $lId ";  
       $query_1 = "select course_name from courses where course_id=$lId";
       $result_1 = mysqli_query($conn, $query_1);
       $row_1 = mysqli_fetch_array($result_1);
       $result = mysqli_query($conn, $query);  ?>
      <div class="container">
                                   <h1 class="display-3 text-center pb-5 px-1">Lessons</h1>
                                   <!-- <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p> -->
                               </div>
                               <div class="container">
                                   <h1 class="display-3 text-center pb-5 px-1"><?=  $row_1["course_name"] ?></h1>
                                   <!-- <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p> -->
                               </div>
   
   <div class="table-responsive">  
   <table class="table  table-hover table-striped">
       <thead>
       <tr>
         <th scope="col">#</th>
         <th scope="col">Lesson Name</th>
         <th scope="col">video Link</th>
        
       </tr>
     </thead>
     <?php
       $i=1;
       while($row = mysqli_fetch_array($result))  
       {  
       ?>
       
     <tbody>
       <tr>
         <th scope="row"><?= $i++ ?></th>
         <td><?php echo $row["lesson_name"]; ?></td>  
         <td><input type="button" name="view" value="view" id="<?php echo $row["lesson_id"]; ?>" class="main-btn btn-info btn-xs view_data" /></td> 
      
       </tr>
     
   
       
       <?php  
       }  
       ?>  
         </tbody>
   </table>  
   </div>
   <!-- <button type="button" class="btn btn-primary view_data" data-bs-toggle="modal" data-bs-target="#exampleModal" >
   Launch demo modal
   </button> -->
   
   <!-- Modal -->
   
   <div class="modal fade" id="dataModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog 	modal-lg">
   <div class="modal-content">
   <div class="modal-header">
   <h5 class="modal-title" id="exampleModalLabel">
   <?php  
   while($row = mysqli_fetch_array($result))  
       {  
       ?>  
        
            <h4 class="modal-title"><?php echo $row["lesson_name"]; ?></h4>   
       
       <?php  
       } 
       ?>
   </h5>
   <button type="button" class="main-btn btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
   </div>
   <div class="modal-body" id="lesson_detail">  
   </div>
   <div class="modal-footer">
   <button type="button" class="main-btn btn-secondary" data-bs-dismiss="modal">Close</button>
   
   </div>
   </div>
   </div>
   </div>
   
   <script>  
   $(document).ready(function(){  
   $('.view_data').click(function(){  
   var lesson_id = $(this).attr("id");  
   $.ajax({  
   url:"select.php",  
   method:"post",  
   data:{lesson_id:lesson_id},  
   success:function(data){  
   $('#lesson_detail').html(data);  
   $('#dataModal').modal("show");  
   }  
   });  
   });  
   });  
   </script>
   <?php } 
if(isset($_GET["pId"])){
    ?>

<div class="user_info text-center rounded bg-white shadow overflow-none">
<h3 >Profile</h3>
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-end mb-3">
                <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#user_info"> Edit
                </button>
            </div>
            <h6 class="card-subtitle mb-3 fw-bold">User Name</h6>
            <p class="card-text" id="username"></p>
            
            <h6 class="card-subtitle mb-3 fw-bold">Email</h6>
            <p class="card-text" id="email"></p>

            <h6 class="card-subtitle mb-3 fw-bold">Password</h6>
            <p class="card-text" id="password"></p>

        </div>
       </div>
</div>

 

      
    <!-- General Settings-->
    <div class="modal fade" id="user_info" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <form id="user_profile">
              <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title align-items-center">
                     <i class="bi bi-person-circle fs-3 me-2"></i>User Profile</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                   </div>
                    <div class="modal-body">
                      <div class="mb-3">
                          <label class="form-label fw-bold">User Name</label>
                           <input name=username id="username_inp" type="text" class="form-control shadow-none" required>
                      </div>
                      <div class="mb-3">
                          <label class="form-label fw-bold">Email</label>
                          <input type="email" name=email id="email_inp" class="form-control shadow-none" rows="6" required></input>
                      </div>
                      <div class="mb-3">
                          <label class="form-label fw-bold">Password</label>
                          <input type="password" name=password id="password_inp" class="form-control shadow-none" required></input>
                      </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="main-btn" name="cancel" onclick="username.value= general_data.username, email.value= general_data.email"
                         data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="main-btn" name="submit" >Update</button>
                    </div>
            </form>
          </div>
      </div>





<?php  ?>

<script>
let general_data; 
let user_profile=document.getElementById('user_profile');

function get_user_info(){


    let username = document.getElementById('username');
    let email = document.getElementById('email');
    let password = document.getElementById('password');
    
    let username_inp = document.getElementById('username_inp');
    let email_inp = document.getElementById('email_inp');
    let password_inp = document.getElementById('password_inp');

    let xhr = new XMLHttpRequest();
    xhr.open("POST","settings_crud.php",true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    
    xhr.onload = function(){

    //  console.log(this.responseText);
      
    //  general_data=console.log(this.responseText);
     general_data = JSON.parse(this.responseText);
    

      
    //  console.log(this.responseText);
    username.innerText = general_data.stu_name;
    email.innerText = general_data.stu_email;
    password.innerText = general_data.stu_pass;
   
    // console.log(this.responseText);

    username_inp.value = general_data.stu_name;
    email_inp.value = general_data.stu_email;
    password_inp.value = general_data.stu_pass;
    
  }
    xhr.send('get_user_info');
  }

user_profile.addEventListener('submit',function(e)
{
    e.preventDefault(); //for stoppig page to redirect
    upd_user_profile( username_inp.value, email_inp.value, password_inp.value);
}
  )

  function upd_user_profile(username_value,email_value,password_value){
      let xhr = new XMLHttpRequest();
      xhr.open("POST","settings_crud.php",true);
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    
      xhr.onload = function(){
        var myModal = document.getElementById('user_info')
        var modal = bootstrap.Modal.getInstance(myModal) // Returns a Bootstrap modal instance
        modal.hide();
       

        if(this.responseText == 1){
         alert("sucess","Changes saved!");
         get_user_info();
        }
        else{
         
          alert("error","No Changes saved!");
        }
     
    }
    xhr.send('username='+username_value+'&email='+email_value+'&password='+password_value+'&upd_user_profile');


  }


  window.onload = function(){
    get_user_info();
   
  }

</script>
<?php
}

?>



</div>





                     
</div>
</div>
</div>

   <!-- Bootstrap 5 JS CDN Links -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
    
    <!-- Swiper JS -->
    <!-- <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script> -->
</body>
</html>