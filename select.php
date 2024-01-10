<?php
require "db.php";
session_start();
?>
<?php  
 if(isset($_POST["lesson_id"]))  
 {  
      $output = '';  
    
      $query = "SELECT c.student_id AS student,c.course_id AS courseId,c.payment_done AS paymentDone ,l.lesson_id as lessonId, l.lesson_name AS lessonName,l.lesson_course as lessonCourse,l.lesson_video as lessonVideo from  course_enrollments c ,lessons l WHERE c.course_id=l.lesson_course AND c.payment_done=1 AND c.student_id=$_SESSION[userId] and l.lesson_id='".$_POST["lesson_id"]."'";  
      $result = mysqli_query($con, $query);  
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
           <iframe style=border:1px #999 solid;" width="100%" height="400" src= '.$row["lessonVideo"].'
           frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>          
                ';  
      }  
      $output .= "</table></div>";  
      echo $output;  
 }  
 ?>
