<?php
    session_start();

    if(!isset($_SESSION['userLoggedIn'])){
        header("Location: welcomeScreen.php");
    };
    if(isset($_POST['Laptops'])){
        $_SESSION['category']=$_POST['Laptops'];
        header("Location: products.php");
    }
    else if(isset($_POST['Clothing'])){
        $_SESSION['category']=$_POST['Clothing'];
        header("Location: products.php");
    }
    else if(isset($_POST['SmartPhones'])){
        $_SESSION['category']=$_POST['SmartPhones'];
        header("Location: products.php");
    }
    else if(isset($_POST['Cameras'])){
        $_SESSION['category']=$_POST['Cameras'];
        header("Location: products.php");
    }
    else if(isset($_POST['Shoes'])){
        $_SESSION['category']=$_POST['Shoes'];
        header("Location: products.php");
    }
    else if(isset($_POST['Watches'])){
        $_SESSION['category']=$_POST['Watches'];
        header("Location: products.php");
    }
?>
<html>
    <head>
       <link rel="stylesheet" type="text/css" href="js/css//bootstrap.css"/>
       <link rel="stylesheet" type="text/css" href="cssFiles/ChooseCategory.css"/>
       <title>
           Categories
       </title>
    </head>
    <body>
        <h2>CHOOSE YOUR CATEGORY</h2>
        <form action="chooseCategory.php" method="post">
            <input type="submit" name="Laptops" value="Laptops" id="laptops" >
            <input type="submit" name="Clothing" value="Clothing" id="clothing" >
            <input type="submit" name="SmartPhones" value="SmartPhones" id="smartPhones" >
            <input type="submit" name="Cameras" value="Cameras" id="cameras" >
            <input type="submit" name="Shoes" value="Shoes" id="shoes">
            <input type="submit" name="Watches" value="Watches" id="watches" >
        </form>
        <div id="footer">
            <a class="btn btn-danger" id="logout" href="userLogout.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
                <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
            </svg>
            Logout
            </a>
        </div>
    </body>
</html>