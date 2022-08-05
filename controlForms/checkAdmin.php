<?php 
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST"){

      if(isset($_POST['adminLogin'])){
     
        if((isset($_POST['adminUsername']))&&(!empty($_POST['adminUsername']))&&
           (isset($_POST['adminPassword']))&&(!empty($_POST['adminPassword']))){
          $link =  mysqli_connect('localhost', 'root', '', 'ecommerce') or 
            die(mysqli_connect_errno()." : ".mysqli_connect_error());
            $adminUsername=$_POST['adminUsername'];
            $adminPassword=$_POST['adminPassword'];
            
            $query ="select username, password from admin ";
            $query.="where username='" .$adminUsername. "' and password='" .$adminPassword. "'";
      
            $result=mysqli_query($link, $query);
        
            if(mysqli_num_rows($result)>0){
                $_SESSION['adminLoggedIn']="1";
                $_SESSION['adminUsername']= $adminUsername;
                $_SESSION['adminPassword']= $adminPassword;
                echo("Success");
                
              }

            else{
              echo("Error In Username Or Password!");
            }
          
        }
      }
    }
?>