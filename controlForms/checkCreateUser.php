<?php 
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST"){

        if((isset($_POST['createUsername']))&&(!empty($_POST['createUsername']))&&
           (isset($_POST['createPassword']))&&(!empty($_POST['createPassword']))&&
           (isset($_POST['firstName']))&&(!empty($_POST['firstName']))&&
           (isset($_POST['lastName']))&&(!empty($_POST['lastName']))){
               
          $link =  mysqli_connect('localhost', 'root', '', 'ecommerce') or 
            die(mysqli_connect_errno()." : ".mysqli_connect_error());
            $createUsername=$_POST['createUsername'];
            $createPassword=$_POST['createPassword'];
            $firstName=$_POST['firstName'];
            $lastName=$_POST['lastName'];
            
            $query="select username from user where username='$createUsername'";
            $result=mysqli_query($link,$query);
            if(mysqli_num_rows($result)>0){
                echo"This Username Is Already Taken Try Another One Please!";
            }
            else{
            $query ="insert into user (first_name, last_name, username, password, created_at) ";
            $query.="values('$firstName', '$lastName', '$createUsername','$createPassword', NOW())";
            mysqli_query($link, $query);
    
            echo "You're Welcome $createUsername Now You Can Sign In!";
            }   
          
        }
      
    }
?>