<!-- Start Footer -->
<footer class="container-fluid bg-dark text-center p-2"style="margin: 0; padding: 0;">
     <small class="text-white">Copyright &copy; 2022 || Designed By Aleena,Ifra,Vandana,Zoobia || <a href="#" data-toggle="modal" data-target="#AdminLogin"> Admin Login</a></small>
</footer> 
<!-- End Footer -->

<!--IFRA'S PART-->

<!--START STUDENT REGISTRATION MODEL IFRA-->
  <!-- Modal -->
    <div class="modal fade" id="stuRegModalCenter" tabindex="-1" aria-labelledby="stuRegModalCenterLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title" id="stuRegModalCenterLabel">Student Registration</h1>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <!--Start student registration form-->
          <?php include('studentRegistration.php'); ?>
          <!--End student registration form-->
        </div>
        <div class="modal-footer">
          <span id="successMsg"></span>
          <button type="button" class="btn btn-primary" onclick="addstu()" id="signup">Sign Up</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
    </div>
<!--END STUDENT REGISTRATION MODAL IFRA-->

<!--START STUDENT LOGIN MODAL IFRA-->
 <!-- Modal -->
    <div class="modal fade" id="Login" tabindex="-1" aria-labelledby="LoginLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title" id="LoginLabel">Student LogIn</h1>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <!--Start student login form-->
          <form id="stuLoginForm">
            <div class="form-group">
              <i class="fas fa-envelope"></i><label for="stuLogemail" class="pl-2 font-weight-bold">Email</label>
              <input type="email" class="form-control" placeholder="Email" name="stuLogemail" id="stuLogemail">
              <small class="form-text">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
              <i class="fas fa-key"></i><label for="stuLogpass" class="pl-2 font-weight-bold">Password</label>
              <input type="password" class="form-control" placeholder="Password" name="stuLogpass" id="stuLogpass">
            </div>
          </form>
          </div>
            <!--End student login form-->
          <div class="modal-footer">
            <small id="statusLogMsg"></small>
            <button type="button" class="btn btn-primary" id="stuLoginBtn" onclick="checkStuLogin()">LogIn</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
      </div>
<!--END STUDENT LOGIN MODAL IFRA-->

<!--START ADMIN LOGIN-->
 <!-- Modal -->
 <div class="modal fade" id="AdminLogin" tabindex="-1" aria-labelledby="AdminLoginLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title" id="AdminLoginLabel">Admin LogIn</h1>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <!--Start Admin registration form-->
          <form id="adminLoginForm">
            <div class="form-group">
              <i class="fas fa-envelope"></i><label for="adminLogemail" class="pl-2 font-weight-bold">Email</label>
              <input type="email" class="form-control" placeholder="Email" name="adminLogemail" id="adminLogemail">
              <small class="form-text">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
              <i class="fas fa-key"></i><label for="adminLogpass" class="pl-2 font-weight-bold">Password</label>
              <input type="password" class="form-control" placeholder="Password" name="adminLogpass" id="adminLogpass">
            </div>
          </form>
          </div>
            <!--End Admin registration form-->
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="adminLoginBtn">LogIn</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
      </div>
<!--END ADMIN LOGIN -->

    <!-- jQuery and bootstrap js -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- fontawesom js -->
    <script src="js/all.min.js"></script>
    <!--Student Testimonal OWL slider js-->
    <!--Student Ajax call javascript-->
    <script type="text/javascript" src="js/ajaxrequest.js"></script>

</body>
</html>