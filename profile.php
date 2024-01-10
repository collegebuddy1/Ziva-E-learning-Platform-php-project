<?php
    include_once("server.php");
    include_once("functions.php");
    require("config.php");
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <?php require('links.php');?>
    <style>
        div.user_info{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            width: 600px;
        }
    </style>


</head>

<body>
    <header class="header_wrapper">
            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <a class="navbar-brand" href="home.php">
                    <h2 style="color:#caa169; text-decoration: overline; font-weight: bold;">BVZ Luxurious Inn</h2>
                    </a>
                </div>
            </nav>
    </header>
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
                              <input type="password" name=passowrd id="password_inp" class="form-control shadow-none" required></input>
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

         console.log(this.responseText);
          
         general_data=console.log(this.responseText);
         general_data = JSON.parse(this.responseText);
        

          
         console.log(this.responseText);
        username.innerText = general_data.stu_name;
        email.innerText = general_data.stu_email;
        password.innerText = general_data.password;
       
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



        <!-- Bootstrap 5 JS CDN Links -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
        
        <!-- Swiper JS -->
        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
</body>
</html>


