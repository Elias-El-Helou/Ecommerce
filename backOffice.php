<?php
    session_start();

    if(!isset($_SESSION['adminLoggedIn'])){
        header("Location: welcomeScreen.php");
    };
    $link =  mysqli_connect('localhost', 'root', '', 'ecommerce') or 
            die(mysqli_connect_errno()." : ".mysqli_connect_error());
?>
<html>
    <head>
        <script src="js/jquery-3.6.0.min.js"></script>
        <link rel="stylesheet" type="text/css" href="js/css//bootstrap.css"/>
        <link rel="stylesheet" type="text/css" href="cssFiles/backOffice.css"/>
        <script>
        </script>
    </head>
    <body>
    <div id="backgroundImg">
        <svg xmlns="http://www.w3.org/2000/svg" width="300" height="300" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
        <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
        <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
        </svg>
    </div>
    <div id="deleteProducts">
        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
        </svg>
       
            Delete A Product
    </div>

    <div id="addProduct">
        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-bag-plus-fill" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zM8.5 8a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V12a.5.5 0 0 0 1 0v-1.5H10a.5.5 0 0 0 0-1H8.5V8z"/>
        </svg>
       
            Add A Product
    </div>

    <div id="deleteUser">
        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-x-fill" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6.146-2.854a.5.5 0 0 1 .708 0L14 6.293l1.146-1.147a.5.5 0 0 1 .708.708L14.707 7l1.147 1.146a.5.5 0 0 1-.708.708L14 7.707l-1.146 1.147a.5.5 0 0 1-.708-.708L13.293 7l-1.147-1.146a.5.5 0 0 1 0-.708z"/>
        </svg>
       
            Remove A User
    </div>

    <div id="details">
        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-hourglass-split" viewBox="0 0 16 16">
            <path d="M2.5 15a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1h-11zm2-13v1c0 .537.12 1.045.337 1.5h6.326c.216-.455.337-.963.337-1.5V2h-7zm3 6.35c0 .701-.478 1.236-1.011 1.492A3.5 3.5 0 0 0 4.5 13s.866-1.299 3-1.48V8.35zm1 0v3.17c2.134.181 3 1.48 3 1.48a3.5 3.5 0 0 0-1.989-3.158C8.978 9.586 8.5 9.052 8.5 8.351z"/>
        </svg>
            View Orders 
    </div>

        <div id="footer">
            <a class="btn btn-danger" id="logout" href="adminLogout.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
                <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
            </svg>
            Logout
            </a>
            
        </div>

        <div id="deleteProduct">
                <nav class="navbar navbar-light bg-light justify-content-between">
                    <a class="navbar-brand">Search For The Product You Want To Delete</a>
                    <form action="backOffice.php" method="post">
                      <input id="searchInput" class="form-control" type="number" min="0" placeholder="Search By Id"
                             name="productId" id="productId" style="display:inline;">
                      <input class="btn btn-outline-success" value="Search" 
                             type="submit" name="searchProduct" id="searchProduct">
                    </form>   
                 </nav>
                 <span><b>Result:</b></span>
        <?php 
            
        if(isset($_POST["searchProduct"]) && isset($_POST["productId"]) && !empty($_POST["productId"])){
            $productId=$_POST["productId"];
            $result=mysqli_query($link,"select product_id, name, brand from product where product_id='" .$productId. "'");

            if(mysqli_num_rows($result)>0){
                $row=mysqli_fetch_assoc($result);
                $_SESSION['id']=$row["product_id"];
                $name=$row["name"];
                $brand=$row["brand"];
                echo"<div>
                        <span>Tap On The Delete Button To Delete The product $name Of Id $productId and Brand $brand Or Try Another Id</span>";
                echo' <form style="display:inline;" action="backOffice.php" method="post">
                         <input type="submit" name="deleteProduct" id="delete" class="btn btn-danger" value="Delete">
                      </form>
                     </div>';
              }

              else{
                echo"<div><span>The Product Of Id: $productId Doesn't Exist Try Another One!</span></div>";
              }
        }
        if(isset($_POST['deleteProduct'])){
                     mysqli_query($link,"DELETE FROM product WHERE product_id='" .$_SESSION['id']. "'");
                        }
        if(isset($_POST["searchProduct"]) && (!isset($_POST["productId"]) || empty($_POST["productId"])) ){
            echo"<div><span>You Have To Specify An Id</span></div>";
        }
        ?>
        </div>
            <br>
            <div id="productsDiv">
                <div>
                <form action="backOffice.php" method="post">
                 <table class="table table-bordered table-striped table-dark" id="productTable">
                     <caption>Add A Product</caption>
                        <tr><th>Category</th><th>Type</th><th>Brand</th>
                            <th>Name</th><th>Price $</th><th>Weight (grams)</th><th>Shipping $</th>
                        </tr>
                        <tr class="table-light">
                            <td >
                        <select id="category" class="form-select" name='categories'>
                            <?php
                                $categories = mysqli_query($link, "select name from category");
                                
                                    while ($row = mysqli_fetch_assoc($categories)) {
                                    echo "<option>" . $row['name'] . "</option>";
                                            }
                            ?>
                        </select>
                    </td>
                    <td>
                        <input type="text" placeholder="Type" name="type" id="type" class="form-control"> 
                    </td>
                    <td>
                        <input type="text" name="brand" placeholder="Brand" id="brand" class="form-control" required>
                    </td>
                    <td>
                        <input type="text" name="name" placeholder="Name" id="name" class="form-control">  
                    </td>
                    <td>
                        <input type="number" min="0" name="price" placeholder="Price" id="price" class="form-control" required>
                    </td>
                    <td>
                        <input type="number" min="1" name="weight" placeholder="Weight" id="weight" class="form-control" required>
                    </td>
                    <td>
                        <input type="number" min="0" name="shipping" id="shipping" placeholder="Shipping" class="form-control" required>
                    </td>
            </table>
            <div>
                <span id="descriptionSpan"><b>Description:</b></span>
                <textarea name="description" id="description" placeholder="Specifications, color, model..." class="form-control"></textarea><br>
                Tap On The Button To Add The Product:
                <input type="submit" class="btn btn-outline-success" name="submitProduct" id="submitProduct" value="Add Product">
            </div>
          </form>
          <?php
            
            if((isset($_POST['submitProduct']))&&(!empty($_POST['brand']))){
                $category=$_POST["categories"];
                $type=$_POST["type"];
                $name=$_POST["name"];
                $brand=$_POST["brand"];
                $description=$_POST["description"];
                $price=$_POST["price"];
                $weight=$_POST["weight"];
                $shipping=$_POST["shipping"];
                $update="insert into product (category, type, brand, name, price, description, weight, shipping) ";
                $update.="values ('$category', '$type', '$brand', '$name', '$price', '$description', '$weight g', '$shipping')";
                 mysqli_query($link,$update);
            }
                                            
          ?>
        </div>
        </div>

        <div id="deleteUsers">
                <nav id="userNav" class="navbar navbar-light bg-light justify-content-between">
                    <a class="navbar-brand">Search For The User You Want To Delete</a>
                    <form action="backOffice.php" method="post">
                      <input id="searchUserInput" class="form-control" type="number" min="0" placeholder="Search By Id"
                             name="userId" id="userId" style="display:inline;">
                      <input class="btn btn-outline-success" value="Search" 
                             type="submit" name="searchUser" id="searchUser">
                    </form>   
                 </nav>
                 <span><b>Result:</b></span>
        <?php 
            
        if(isset($_POST["searchUser"]) && isset($_POST["userId"]) && !empty($_POST["userId"])){
            $userId=$_POST["userId"];
            $result=mysqli_query($link,"select user_id, first_name, last_name,username from user where user_id='" .$userId. "'");

            if(mysqli_num_rows($result)>0){
                $row=mysqli_fetch_assoc($result);
                $_SESSION['userId']=$row["user_id"];
                $username=$row["username"];
                echo"<div>
                        <span>Tap On The Delete Button To Delete The User: $username Of Id $userId Or Try Another Id</span>";
                echo' <form style="display:inline;" action="backOffice.php" method="post">
                         <input type="submit" name="deleteUser" class="btn btn-danger" value="Delete">
                      </form>
                     </div>';
              }

              else{
                echo"<div><span>The User Of Id: $userId Doesn't Exist Try Another One!</span></div>";
              }
        }
        if(isset($_POST['deleteUser'])){
                     mysqli_query($link,"DELETE FROM user WHERE user_id ='" .$_SESSION['userId']. "'");
                        }
        if(isset($_POST["searchUser"]) && (!isset($_POST["userId"]) || empty($_POST["userId"])) ){
            echo"<div><span>You Have To Specify An Id</span></div>";
        }
        ?>
        </div>

        <div id="viewOrders">
                <nav id="orderNav" class="navbar navbar-light bg-light justify-content-between">
                    <a class="navbar-brand">Search For Any Order</a>
                    <form action="backOffice.php" method="post">
                      <input id="searchInputOrder" class="form-control" type="number" min="0" placeholder="Search By Id"
                             name="userOrderId" id="userOrderId" style="display:inline;">
                      <input class="btn btn-outline-success" value="Search" 
                             type="submit" name="searchOrder" id="searchOrder">
                    </form>   
                 </nav>
                 <span><b>Result:</b></span>
        <?php 
            
        if(isset($_POST["searchOrder"]) && isset($_POST["userOrderId"]) && !empty($_POST["userOrderId"])){
            $userOrderId=$_POST["userOrderId"];
            $res=mysqli_query($link,"select payment_id, user_id, order_date, final_cost, number_of_products from user_payment where user_id='" .$userOrderId. "'");
            
            if(mysqli_num_rows($res)>0){
             echo"<div>
                   <table class='table table-bordered table-striped table-dark' id='productTable'>
                      <caption>History Of Orders Of User Of Id:$userOrderId</caption>
                      <tr>
                        <th>Payment Id</th><th>Order Date</th>
                        <th>Number Of Bought Products</th><th>Final Cost $</th>
                      </tr>";
                while($line=mysqli_fetch_assoc($res)){
                $order_id=$line["payment_id"];
                $order_date=$line["order_date"];
                $final_cost=$line["final_cost"];
                $number_of_products=$line["number_of_products"];
                
                echo"<tr>
                        <td>$order_id</td><td>$order_date</td>
                        <td>$number_of_products</td><td>$final_cost</td>
                     </tr>";
                    }
                echo'</table></div>';
              }
        
              else{
                echo"<div><span>The User Of The Id:$userOrderId Doesn't Have Any Orders!</span></div>";
              }
            }
        if(isset($_POST["searchOrder"]) && (!isset($_POST["userOrderId"]) || empty($_POST["userOrderId"])) ){
            echo"<div><span>You Have To Specify An Id</span></div>";
        }
        ?>
        </div>
    </body> 
</html>