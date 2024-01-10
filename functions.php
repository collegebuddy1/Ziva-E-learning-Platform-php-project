<?php

    // database connection
    require("dbConnection.php");

  
    function select($query,$values,$datatype){
        $con = $GLOBALS['conn'];
        if($stmt = mysqli_prepare($con,$query)){
            mysqli_stmt_bind_param($stmt,$datatype,...$values);
            if(mysqli_stmt_execute($stmt)){
                $res = mysqli_stmt_get_result($stmt);
                mysqli_stmt_close($stmt);
                return $res;
            }
            else{
                mysqli_stmt_close($stmt);
                die("Query can not be executed -- select");
            }
        }
        else{
            die("Query can not be Prepared -- select");
        }

    }

  

    function update($query,$values,$datatype){
        $con = $GLOBALS['conn'];
        if($stmt = mysqli_prepare($con,$query)){
            mysqli_stmt_bind_param($stmt,$datatype,...$values);
            if(mysqli_stmt_execute($stmt)){
                $res = mysqli_stmt_affected_rows($stmt);
                mysqli_stmt_close($stmt);
                return $res;
            }
            else{
                mysqli_stmt_close($stmt);
                die("Query can not be executed -- update");
            }
        }
        else{
            die("Query can not be Prepared -- update");
        }

    }
    
    
  
    function insert($sql,$values,$datatypes)
    {
        $con=$GLOBALS['conn'];
        if($stmt=mysqli_prepare($con,$sql))
        {
            mysqli_stmt_bind_param($stmt,$datatypes,...$values);
            if(mysqli_stmt_execute($stmt)){
                $res=mysqli_stmt_affected_rows($stmt);
                mysqli_stmt_close($stmt);
                return $res;
            }
            else{
                mysqli_stmt_close($stmt);
                die("Query cannot be executed-insert");
            }
        }
        else{
            die("Query cannot be prepared-insert");

        }
    }
    function selectAll($table){
        $db=$GLOBALS['conn'];
        $res=mysqli_query($db,"SELECT * FROM $table");
        return $res;
    }
    function get_categories(){
        $con = $GLOBALS['conn'];
        $rows = [];
        $res=mysqli_query($con,"SELECT * FROM categories");
        while($opt=mysqli_fetch_assoc($res)){
            $rows[] = $opt;
           
        }
        return $rows;

        

    }
    function redirect($url){
        echo"<script>
            window.location.href='$url';
        </script>";
    }
    function filteration($data){
        foreach($data as $key=>$value){
            $data[$key]=trim($value);
            $data[$key]=stripcslashes($value);
            $data[$key]=htmlspecialchars($value);
            $data[$key]=strip_tags($value);
        }
        return $data;
    }


?>
