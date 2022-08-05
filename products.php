<?php
    session_start();
    $link =  mysqli_connect('localhost', 'root', '', 'ecommerce') or 
    die(mysqli_connect_errno()." : ".mysqli_connect_error());

    if(!isset($_SESSION['userLoggedIn'])){
        header("Location: welcomeScreen.php");
    };
    if(isset($_POST["back"])) {
        header("Location:chooseCategory.php");
    }

?>
<html>
    <head>
        <title>Shop Here!</title>
        <link rel="stylesheet" type="text/css" href="js/css//bootstrap.css"/>
        <link rel="stylesheet" type="text/css" href="cssFiles/Products.css"/>
        <script src="js/jquery-3.6.0.min.js"></script>
    </head>
    <body>
            <nav class="navbar navbar-dark bg-dark">
            
              <form  class="d-inline-flex" method="post" action="products.php">
                    <button class="btn btn-primary" type="submit" name="back" >
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                        </svg>
                        Categories
                    </button>
                  
                  <div class="sort">
                    <label>
                        Sort By Price  
                        
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="30" fill="currentColor" class="bi bi-currency-dollar" viewBox="0 0 16 16">
                        <path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z"/>
                        </svg>
                        &ensp; &ensp;  

                    </label>  
                        <button class="btn btn-primary" type="submit" name="lowToHigh" >
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-bar-up" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 10a.5.5 0 0 0 .5-.5V3.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 3.707V9.5a.5.5 0 0 0 .5.5zm-7 2.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13a.5.5 0 0 1-.5-.5z"/>
                        </svg>
                        Low To High
                    </button>
                  
                    &ensp; &ensp; 
                      
                    <button class="btn btn-primary" type="submit" name="highToLow" >
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-bar-down" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1 3.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13a.5.5 0 0 1-.5-.5zM8 6a.5.5 0 0 1 .5.5v5.793l2.146-2.147a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 0 1 .708-.708L7.5 12.293V6.5A.5.5 0 0 1 8 6z"/>
                        </svg>
                        High To Low
                    </button>

                    &ensp; &ensp; &ensp; &ensp;
                      
                    

                  </div>  
                </form>
                <button id="cart" class="btn btn-success" onclick="window.location.href='cart.php';" >
                        Cart
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="25" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                    <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                    </svg>
                        
                </button>
                <form id="searchForm" class="d-inline-flex" method="post" action="products.php">
                    
                    <input id="productBrand" name="productBrand" class="form-control" type="search" placeholder="Search By Brand">
                    &ensp; &ensp; 
                    <button class="btn btn-outline-primary" type="submit" name="seacrhProduct">
                         Search
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                    </button>
                </form>
            </nav>
            <br>
            <hr>
            <div id="allProducts">
            <?php
                $query="select type, brand, name, price, description, weight, shipping, image from product ";
                $query.="where category='".$_SESSION['category']."'";
               
                if(isset($_POST['lowToHigh'])){
                    $query="select type, brand, name, price, description, weight, shipping, image from product ";
                    $query.="where category='".$_SESSION['category']."' order by price" ;
                }               
                
                else if(isset($_POST['highToLow'])){
                    $query="select type, brand, name, price, description, weight, shipping, image from product ";
                    $query.="where category='".$_SESSION['category']."' order by price desc" ;
                }

                else if(isset($_POST['seacrhProduct'])){
                    $brand=strtolower($_POST['productBrand']);
                    $firstTwoLetters=substr($brand,0,2); //first two letters of a brand
                    $query="select type, brand, name, price, description, weight, shipping, image from product ";
                    $query.="where category='".$_SESSION['category']."' and brand like '$firstTwoLetters%'" ;
                }
                
                $result=mysqli_query($link,$query);
                $i=0;
                if(mysqli_num_rows($result)>0){
                while($line=mysqli_fetch_assoc($result)){
                    echo"<div class='eachProduct' style='display:inline;'>
                            <table>
                            <tr>
                             <td>
                                <img src='images/".$line['image']."' alt='No Image For This Product'
                                 height='300' width='350'>
                             </td>

                             <td>
                                <ul class='list-group'>
                                    <li class='list-group-item list-group-item-dark'>Type: ".$line['type']."</li>
                                    <li class='list-group-item list-group-item-dark'>Brand: ".$line['brand']."</li>
                                    <li class='list-group-item list-group-item-dark'>Name: ".$line['name']."</li>
                                    <li class='list-group-item list-group-item-dark'>Price: ".$line['price']." $</li>
                                    <li class='list-group-item list-group-item-dark'>Description: ".$line['description']."</li>
                                    <li class='list-group-item list-group-item-dark'>Weight: ".$line['weight']."</li>
                                    <li class='list-group-item list-group-item-dark'>Shipping: ".$line['shipping']." $</li>
                                </ul>
                              </td>
                            </tr>
                            <table>
                            <form action='products.php' method='post'>
                            <button type='submit' name='addToCart".$i."' class='btn btn-success'>
                                Add To Cart
                                <svg xmlns='http://www.w3.org/2000/svg' width='20' height='25' fill='currentColor' class='bi bi-cart-plus' viewBox='0 0 16 16'>
                                <path d='M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z'/>
                                <path d='M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z'/>
                                </svg>
                            </button>
                            </form>
                        </div>
                        <br> <br> <br>";
                        if(isset($_POST["addToCart".$i])){

                            $_SESSION['totalPrice']=$line['price']+$line['shipping'];
                            $_SESSION['brand']=$line['brand'];
                            $_SESSION['name']=$line['name'];
                            $_SESSION['image']=$line['image'];
                            $cartQuery="insert into cart(user_id,total_price,brand,name,image) ";
                            $cartQuery.="values('".$_SESSION['userId']."', '".$_SESSION['totalPrice']."', ";
                            $cartQuery.="'".$_SESSION['brand']."','".$_SESSION['name']."', '".$_SESSION['image']."')";
                            mysqli_query($link,$cartQuery);
                            
                        }
                        $i++;

                }
            }
            else{
                echo"<h1>No Products Found!</h1>";
            }
            
            ?>
            </div>
    </body>
</html>
