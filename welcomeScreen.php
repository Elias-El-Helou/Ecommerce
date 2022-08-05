<?php 
  session_start();
  $link =  mysqli_connect('localhost', 'root', '', 'ecommerce') or 
  die(mysqli_connect_errno()." : ".mysqli_connect_error());

  if(isset($_SESSION['adminLoggedIn'])){
    header("Location: backOffice.php");
  }
  if(isset($_SESSION['userLoggedIn'])){
    header("Location: chooseCategory.php");
  }
 ?>
 
<!DOCTYPE html>
<html >
  <head>
       <script src="js/jquery-3.6.0.min.js"></script>
       <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
       <link rel="stylesheet" type="text/css" href="js/css//bootstrap.css"/>
       <link rel="stylesheet" type="text/css" href="cssFiles/WelcomeScreen.css"/>

        <script type="text/javascript">
              
              var photos = new Array('image0.jpg','image1.jpg','image2.jpg',
                                    'image3.jpg','image4.jpg','image5.jpg','image6.jpg' );
              var i = 0;
              function slideShow(){
                if(i>6) i=0;
                $("#screen").attr("src","images/"+photos[i]).fadeIn(300);
                $("#screen").attr("src","images/"+photos[i]).fadeOut(2700);
                i++;
              }
                
              $(document).ready(function(){

                  $("#adminSubmit").on("click",function(){
                      
                      var adminUsername=$("#adminUsername").val();
                      var adminPassword=$("#adminPassword").val();
                      if ( (!(adminUsername.trim())) || (!(adminPassword.trim())) ) {
                        //if one field contains only spaces
                        $("#adminWarning").css("color","tomato");
                        $("#adminWarning").html("Username and Password cannot contain only spaces!");
                        
                      }
                    else{
                      
                      $.ajax({
                          type: 'post',
                          url: 'controlForms/checkAdmin.php',
                          data: {
                            adminLogin:1,
                            adminUsername:adminUsername,
                            adminPassword:adminPassword,
                          },
                          success: function (response) {

                              $("#adminWarning").css("color","tomato");
                              $('#adminWarning').html(response);
                              if(response=="Success"){
                                window.location="backOffice.php";
                              }
                          },
                          dataType:"text"

                        });
                      }
                    });

                    $("#userSubmit").on("click",function(){
                      
                      var userUsername=$("#userUsername").val();
                      var userPassword=$("#userPassword").val();
                      if ( (!(userUsername.trim())) || (!(userPassword.trim())) ) {
                        //if one field contains only spaces
                        $("#userWarning").css("color","tomato");
                        $("#userWarning").html("Username and Password cannot contain only spaces!");
                        
                      }
                    else{
                      
                      $.ajax({
                          type: 'post',
                          url: 'controlForms/checkUser.php',
                          data: {
                            userLogin:1,
                            userUsername:userUsername,
                            userPassword:userPassword,
                          },
                          success: function (response) {

                              $("#userWarning").css("color","tomato");
                              $('#userWarning').html(response);
                              if(response=="Success"){
                                window.location="chooseCategory.php";
                              }
                          },
                          dataType:"text"

                        });
                      }
                    });

                    $("#submitCreateUser").on("click",function(){
                      
                      var firstName=$("#firstName").val();
                      var lastName=$("#lastName").val();
                      var createUsername=$("#createUsername").val();
                      var createPassword=$("#createPassword").val();
                      var confirmPassword=$("#confirmPassword").val();
                      if ( (!(createUsername.trim())) || (!(createPassword.trim())) ||
                           (!(firstName.trim())) || (!(lastName.trim())) ) {
                        //if one field contains only spaces
                        $("#createWarning").css("color","tomato");
                        $("#createWarning").html("All Fields Should Be Filled (Not Only Spaces!)");
                        return false;
                      }
                      else if(createPassword != confirmPassword){
                        $("#createWarning").css("color","tomato");
                        $("#createWarning").html("Your Confirmation Doesn't Match With Your Password!");
                        return false;
                      }
                      else{
                      
                       $.ajax({
                          type: 'post',
                          url: 'controlForms/checkCreateUser.php',
                          data: {
                            firstName:firstName,
                            lastName:lastName,
                            createUsername:createUsername,
                            createPassword:createPassword
                          },
                          success: function (response) {

                              $("#createWarning").css("color","black");
                              $('#createWarning').html(response);
                              
                          },
                          dataType:"text"
                          
                        });
                      }
                    });
      
                  function logoAnimation(){
                      $(".logo").animate({
                      top: '670px',
                      left: '10px',
                      height: '-=242px',
                      width: '-=333px',
                      opacity:'0.9'
                    },2000);

                   }

                  setTimeout(logoAnimation,500);
                  setInterval ('slideShow();', 3000);

                  $("#open").click(function(){
                  $(".adminSignIn").slideDown("1");
                  });

                  $("#close").click(function(){
                  $(".adminSignIn").slideUp("1");});
                  
                  $("#showDiv").click(function(){
                  $("#createUser").slideDown("1");
                  });

                  $("#closeCreate").click(function(){
                  $("#createUser").slideUp("1");});
              });
              
	      </script>
        
        <title> Welcome Screen</title>
  </head>
  <body>
       <h1 class="welc">Happy Shopping!</h1>   
      
<!-- 
      <div class="backRight">
        <p>ome To EcomLebanon<img src="images/shoplogo.jpg" width="40" height="35"/></p>
      </div> -->

      <div class="frontLeft"><img id="screen" src="images/image0.jpg" width="450" height="430"/> </div>

      <div class="about" ><span>About Us</span>
                         <p class="text">EcomLebanon has started in 2017 as a small 
                            shop for electronics in Lebanon.
                            We had 4 employees and we were growing so fast.
                            Now we have 200 employees working for our online business.
                            We went from electronics to almost all kinds of products.
                            We deliver all over Lebanon.
                            We have two payment options, cash on delivery or via credit or debit card.
                            If any problem happened with your order or with any product you can contact us
                            by email <b><i>ecomlebanon@gmail.com</i></b> to report your problem and our team
                            is here to help every customer and solve the problem.
                            Have Fun Shopping!
                        </p>     
      </div>

      <form  action="controlForms/checkUser.php" id="form1">
          <div>
                <input type="text" class="form-control" id="userUsername" style="margin-top:2px;"
                      name="userUsername" placeholder="Username"  required>
                <input type="password" class="form-control" id="userPassword" 
                      name="userPassword" placeholder="Password" style="margin-top:5px;" required>
              </div>
              <div>
                <input type="button" class="btn btn-success" id="userSubmit"
                      value="Sign in" name="userSubmit" style="margin-top:5px;">
                <label id="userWarning">
                    Sign in if you have an existing account to load your cart.
                </label>
                <label id="new">
                    If you don't have an account <a style="font-size:13px;" href='#' id="showDiv">Create one</a>
                </label>
              </div>
            </form>

            <form action="controlForms/checkCreateUser.php" id="createUser">
              <label> Remember Your New Username And Password And Become Our Customer!</label>

              <input style="margin-top:5px;" type="text" class="form-control" name="firstName" id="firstName" placeholder="First Name" required>

              <input style="margin-top:5px;" type="text" class="form-control" name="lastName" id="lastName" placeholder="Last Name" required>
              
              <div style="margin-top:5px;" class="input-group">
                
                  <div class="input-group-text">@</div>
                
                <input type="text" class="form-control" name="createUsername" id="createUsername" placeholder="Username" required>
              </div>
              <input style="margin-top:5px;" type="password" class="form-control" name="createPassword" id="createPassword" placeholder="Password" required>
              <input style="margin-top:5px;" type="password" class="form-control" name="confirmPassword" id="confirmPassword" placeholder="Confirm Password" required>
              <div style="margin-top:5px;">
                <input name="submitCreateUser" id="submitCreateUser" type="button" class="btn btn-success" value="Create Account">
                <button style="display:inline;" type="button" id="closeCreate" class="btn btn-danger">Close</button>
                <label id="createWarning"></label>
              </div>
            </form>

      <div>
        <img class="logo" src="images/logo.jpg" width="400" height="300"/>
      </div>

      <button type="button" class="btn btn-primary" id="open">Admins' BackOffice</button>

      <div class="adminSignIn" style="display:none;">
      
        <form action="controlForms/checkAdmin.php" method="post" id="form2">      
          <div>
            <input type="text" class="form-control" id="adminUsername" style="margin-top:2px;" 
                   name="adminUsername" placeholder="Username" required>
          </div>
          <div>
            <input type="password" class="form-control" id="adminPassword" 
                   name="adminPassword" placeholder="Password" style="margin-top:5px;" required>
          </div>
          <div>
            <input type="button" class="btn btn-success" style="margin-top:5px;"
                   name="adminSubmit" value="Sign in" id="adminSubmit"><br>
            <label id="adminWarning">
                Please fill out both fields
            </label>
            <br>
            <button type="button" id="close" class="btn btn-danger">Close Window X</button>
          </div>
        </form>

      </div>
      
  </body>
</html>


  