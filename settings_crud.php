<?php

    //  include("server.php");
     include("functions.php");
     require("dbConnection.php");
    session_start();

    if(isset($_POST['get_user_info']))
        {
            $q="SELECT * FROM students WHERE stu_id=?";
            $values=[$_SESSION["userId"]];
            $res=select($q,$values,"i");
            $data=mysqli_fetch_assoc($res);
            $json_data=json_encode($data);
            echo $json_data;
        }

    if (isset($_POST['upd_user_profile'])) {
    
    
            // Data sanitization to prevent SQL injection
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $email= mysqli_real_escape_string($conn, $_POST['email']);
            $password= mysqli_real_escape_string($conn, $_POST['password']);
        
            $query = "UPDATE students SET stu_email=?, stu_email=?,stu_pass=? WHERE stu_id=?";
            $values=[$username,$email, $password,$_SESSION['userId']];
            $res = update($query,$values,"sssi");
            echo $res;
            
        }


        if(isset($_POST['room_book_info']))
        {
            $q="SELECT * FROM room_book WHERE user_id=? and status=? ";
            $values=[$_SESSION['userId'],1];
            $res=select($q,$values,"ii");
            $data=mysqli_fetch_assoc($res);
            $json_data=json_encode($data);
            echo $json_data;
        }


        if(isset($_POST['get_status']))
        {
            $res=select("SELECT rb.f_name as fname ,rb.l_name as lname,rb.no_of_rooms as noOfRooms,rb.check_in as checkin,rb.check_out as checkout,r.name as roomName,p.total_amount as totalamount FROM room_book rb,payment p,room r  WHERE rb.status=? and rb.user_id=? and rb.booking_id = p.book_id and rb.room_id = r.id",[1,$_SESSION['userId']],'ii');
            $i=1;
            $data="";

            while($row=mysqli_fetch_assoc($res)){
                if($row){
                    
                    $data.="
                    <tr class='align-middle'>
                    <td> $i</td>
                    <td> $row[fname]</td>
                    <td> $row[lname]</td>
                    <td> $row[roomName]</td>
                    <td> $row[noOfRooms]</td>
            
                    <td> $row[checkin]</td>
                    <td> $row[checkout]</td>
                    <td> $row[totalamount]</td>
        
                    </tr>";
                    $i++;
                }
                else{
                    echo'i';
                }
                //print_r($row);
                
            
            
            }
            echo $data;
        }
        

?>