<?php
    session_start();
    $link =  mysqli_connect('localhost', 'root', '', 'ecommerce') or 
        die(mysqli_connect_errno()." : ".mysqli_connect_error());
    if(!isset($_SESSION['userLoggedIn'])){
            header("Location: welcomeScreen.php");
        }
    if(isset($_POST["back"])) {
            header("Location:products.php");
        }
?>
<html>
    <head>
        <title>Your Cart</title>
        <link rel="stylesheet" type="text/css" href="js/css//bootstrap.css"/>
        <link rel="stylesheet" type="text/css" href="cssFiles/cart.css"/>
        <script src="js/jquery-3.6.0.min.js"></script>
        <script>

            $(document).ready(function(){
            $("#placeOrder").on("click",function(){

                var cardNumberRegEx = /^(?:5[1-5][0-9]{14})$/; //example:5412751234123456
                var mobileNumberRegEx= /^[0-9]{6}$/;// exactly 6 numeric digits
                var date=new Date();
                var currentDate=date.toISOString().substring(0, 10);//to match the date datatype in the database
                var postalCode=$("#postalCode").val();
                var building=$("#building").val();
                var city=$("#city").val();
                var village=$("#village").val();
                var street=$("#street").val();
                var holderName=$("#holderName").val();
                var cardNumber=$("#cardNumber").val().trim();
                var mobile=$("#mobile").val().trim();
                var cardType=$("#cardType").val();
                var expiryDate=$("#expiryDate").val();
                if (!(cardNumberRegEx.test(cardNumber))) {
                    $("#placeOrder").css("border","solid 2px rgb(255, 79, 47)");
                    $("#placeOrder").css("color","rgb(255, 79, 47)");
                    $("#cardWarner").html("Invalid Card Number!");
            
                    $("#dateWarner").html("");
                    $("#mobileWarner").html("");
                    
                    return false;
                }
                
                

                else if (!(mobileNumberRegEx.test(mobile))) {
                    $("#placeOrder").css("border","solid 2px rgb(255, 79, 47)");
                    $("#placeOrder").css("color","rgb(255, 79, 47)");
                    $("#mobileWarner").html("Invalid Phone Number!");

                    $("#dateWarner").html("");
                    $("#cardWarner").html("");
                    
                    return false;
                }

                else if (expiryDate < currentDate) {
                    $("#placeOrder").css("border","solid 2px rgb(255, 79, 47)");
                    $("#placeOrder").css("color","rgb(255, 79, 47)");
                    $("#dateWarner").html("Card Date Expired!");

                    $("#cardWarner").html("");
                    $("#mobileWarner").html("");
                    return false;
                }

                else if ( (!(street.trim())) || (!(city.trim())) || (!(village.trim())) || (!(mobile.trim()))
                     (!(postalCode.trim())) || (!(holderName.trim())) || (!(cardNumber.trim())) || (!(building.trim())) ) {
                //if one field contains only spaces
                    $("#placeOrder").css("border","solid 2px rgb(255, 79, 47)");
                    $("#placeOrder").css("color","rgb(255, 79, 47)");
                    $("#warner").html("All Fields Should Be Filled Out And Not Only Spaces!");
                        return false;
                }

             //else{
                
                // $.ajax({
                //     type: 'post',
                //     url: 'controlForms/check_cart.php',
                //     data: {
                //     postalCode:postalCode,
                //     city:city,
                //     village:village,
                //     street:street,
                //     holderName:holderName,
                //     cardNumber:cardNumber,
                //     mobile:mobile,
                //     cardType:cardType,
                //     expiryDate:expiryDate,
                //     building:building,
                //     },
                //     success: function (response) {
                //         if(response=="Success"){
                //             $("#warner").html(response);
                //         }
                //         else{
                //             $("#warner").html(response);
                //         }
                //     },
                //     dataType:"text"

                // });
                //}
                });
            });
        </script>
    </head>

    <body>
            <h1 id="d"></h1>
        <form method="post" action="cart.php">
            <button class="btn btn-primary" type="submit" name="back" >
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                </svg>
                Back To Shop
            </button>
        </form>
        <h2>Your Cart</h2>
        <div id="allProducts">
        
        <?php

            $result=mysqli_query($link,"select cart_id, total_price, brand, name, image from cart where user_id='".$_SESSION['userId']."'");
            $finalCost=0;
            if(mysqli_num_rows($result)>0){
                while($line=mysqli_fetch_assoc($result)){
                    $cartId=$line['cart_id'];
                   echo" <div class='eachProduct' style='display:inline;'>
                            <table>
                            <tr>
                             <td>
                                <img src='images/".$line['image']."' alt='No Image For This Product'
                                 height='300' width='350'>
                             </td>

                             <td>
                                <ul class='list-group'>
                                    <li class='list-group-item list-group-item-dark'>Brand: ".$line['brand']."</li>
                                    <li class='list-group-item list-group-item-dark'>Name: ".$line['name']."</li>
                                    <li class='list-group-item list-group-item-dark'>Price+Shipping: ".$line['total_price']." $</li>
                                </ul>
                              </td>
                              <td>
                               <form action='cart.php' method='post'>
                                <button name='product".$cartId."' type='submit' class='btn btn-danger'>
                                    Remove
                                    <svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
                                        <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>
                                        <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>
                                    </svg>
                                </button>
                                </form>
                              </td>
                            </tr>
                            <table>
                         </div>";
                         $finalCost+=$line['total_price'];
                         if(isset($_POST["product".$cartId])){
                             mysqli_query($link,"delete from cart where cart_id='$cartId'");
                             echo"<script>window.location.href ='cart.php';</script>";
                         }
                        $_SESSION['finalCost']=$finalCost;
                }
                ?>
            </div>
            <div id="verticalLine"></div>
            <h2 class="information">Address & Card Information</h2>
            <div id="information">
            <div id="conatiner">

              <form class="inline" action="cart.php" method="post">
               
                <p> 
                  <span>
                    <label for="postalCode">Postal Code</label>
                    <input type="number" min="0" name="postalCode" class="form-control" id="postalCode" placeholder="Postal Code" required>
                    <label class="warner"></label>
                  </span>
                  <span class="span">
                    <label for="city">City</label>
                    <input type="text" name="city" class="form-control" id="city" placeholder="City" required>
                    <label class="warner"></label>
                  </span>
                  <span class="span">  
                    <label for="village">Village</label>
                    <input type="text" id="village" name="village" class="form-control" id="village" placeholder="Village" required>
                    <label class="warner"></label>
                  </span>
                </p>
                <p>
                  <span>
                    <label for="street">Street</label>
                    <input type="text" name="street" class="form-control" id="street" placeholder="Street" required>
                    <label class="warner"></label>
                  </span>
                  <span class="span">
                    <label for="building">Building</label>
                    <input type="text" name="building" class="form-control" id="building" placeholder="Building" required>
                    <label class="warner"></label>
                  </span>
                  <span class="span">
                    <label for="cardType">Card Type</label>
                    <select class="form-select" type="text" name="cardType" id="cardType">
                        <option>Master Card</option>
                        <option>Visa Card</option>
                    </select>
                  </span>
                  
                </p>
                <p>
                    <span>
                        <label for="holderName">Holder Name(On Card)</label>
                        <input type="text" class="form-control" placeholder="Holder Name" name="holderName" id="holderName" required>
                        <label class="warner"></label>
                    </span>

                    <span class="span">
                        <label for="cardNumber">Card Number</label>
                        <input type="text" class="form-control" placeholder="16 digits" name="cardNumber" id="cardNumber" required>
                        <label id="cardWarner" class="warner"></label>
                    </span>
                        
                    <span class="span">
                        <label for="expiryDate">Expiry Date</label>
                        <input type="date" class="form-control" name="expiryDate" id="expiryDate" value="2022-01-01" required>
                        <label id="dateWarner" class="warner"></label>
                    </span>
                </p>
                <p>
                    <span class="span">
                    <div id="phone">
                        <label for="mobile">Mobile Number</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">+961</span>
                            </div>
                            <select class="form-select" name="code" id="code">
                                <option>03</option>
                                <option>70</option>
                                <option>71</option>
                                <option>76</option>
                                <option>78</option>
                                <option>79</option>
                                <option>81</option>
                            </select>
                            <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Mobile Number" required>
                            
                            <?php
                            
                            echo"<label id='cost'><b>Your Final Cost Is: $finalCost $</b></label>";

                            ?>
                          </div>
                        <label id="mobileWarner" class="warner"></label>
                    </div>
                  </span>
                   
                  <span>
                    <button id="placeOrder" class="btn btn-success" id="placeOrder" name="placeOrder" type="submit">
                        Place Order
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"/>
                            <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                        </svg>
                    </button>
                    <label id="warner"></label>  
                    
                  </span>
                 </p>
                </form>
             </div>
            </div>
        <?php
            }
            else{
                echo"<h1>Your Cart Is Empty Go Back And Add Items To Your Cart!</h1>";
            }
            if(isset($_POST['payPal'])){
                header("Location:payPaylForm.php");
            }

     if(isset($_POST['placeOrder'])){
        if( (isset($_POST['mobile']))&&(!empty($_POST['mobile']))&&
            (isset($_POST['building']))&&(!empty($_POST['building']))&&
            (isset($_POST['cardNumber']))&&(!empty($_POST['cardNumber']))&&
            (isset($_POST['holderName']))&&(!empty($_POST['holderName']))&&
            (isset($_POST['street']))&&(!empty($_POST['street']))&&
            (isset($_POST['village']))&&(!empty($_POST['village']))&&
            (isset($_POST['city']))&&(!empty($_POST['city']))&&
            (isset($_POST['postalCode']))&&(!empty($_POST['postalCode']))&&
            (isset($_POST['cardType']))&&(!empty($_POST['cardType']))&&
            (isset($_POST['expiryDate']))&&(!empty($_POST['expiryDate'])) ){

        $mobile=$_POST['code'] . $_POST['mobile'];
        $building=$_POST['building'];
        $cardNumber=$_POST['cardNumber'];
        $holderName=$_POST['holderName'];
        $street=$_POST['street'];
        $village=$_POST['village'];
        $city=$_POST['city'];
        $postalCode=$_POST['postalCode'];
        $cardType=$_POST['cardType'];
        $expiryDate=$_POST['expiryDate'];

        $result=mysqli_query($link,"select count(*) from cart where user_id='".$_SESSION['userId']."'");
        $line=mysqli_fetch_row($result);
        $numberOfProducts=$line[0];

        $query ="insert into user_payment (user_id, order_date, card_type, holder_name, card_number, ";
        $query.="expiry_date, final_cost, number_of_products) values ";
        $query.="('".$_SESSION['userId']."',curdate(),'$cardType','$holderName','$cardNumber', ";
        $query.="'$expiryDate','$finalCost','$numberOfProducts')";
  
        mysqli_query($link, $query);

        $query="insert into user_address (user_id, city, postalCode, village, street, building, mobile) values ";
        $query.="('".$_SESSION['userId']."','$city','$postalCode','$village','$street','$building','$mobile')";

        mysqli_query($link, $query);
        //echo"<script>alert (\"city: $city , postalCode: $postalCode , village: $village , street: $street , building: $building , mobile: $mobile \");'</script>";
   
        echo"<script>window.location.href ='products.php';</script>"; 
        mysqli_query($link,"delete from cart where user_id='".$_SESSION['userId']."'");
        }
     }
        ?>
        
        
    </body>
</html>