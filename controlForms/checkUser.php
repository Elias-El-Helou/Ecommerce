<?php 
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST"){

      if(isset($_POST['userLogin'])){
     
        if((isset($_POST['userUsername']))&&(!empty($_POST['userUsername']))&&
           (isset($_POST['userPassword']))&&(!empty($_POST['userPassword']))){
          $link =  mysqli_connect('localhost', 'root', '', 'ecommerce') or 
            die(mysqli_connect_errno()." : ".mysqli_connect_error());
            $userUsername=$_POST['userUsername'];
            $userPassword=$_POST['userPassword'];
            
            $query ="select user_id, username, password from user ";
            $query.="where username='" .$userUsername. "' and password='" .$userPassword. "'";
      
            $result=mysqli_query($link, $query);
        
            if(mysqli_num_rows($result)>0){
                $row=mysqli_fetch_assoc($result);
                $_SESSION['userId']=$row['user_id'];
                $_SESSION['userLoggedIn']="1";
                $_SESSION['userUsername']= $userUsername;
                $_SESSION['userPassword']= $userPassword;
                echo("Success");
              }

            else{
              echo("Error In Username Or Password!");
            }
          
        }
      }
    }
?>