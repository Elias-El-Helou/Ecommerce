<?php
 $link =  mysqli_connect('localhost', 'root', '') or 
          die(mysqli_connect_errno()." : ".mysqli_connect_error());
          mysqli_query($link, "create database ecommerce") 
            or die(" Error creation DB");
          mysqli_select_db($link, 'ecommerce')or die("Error DB selection");

      $query  = " create table user(user_id int not null auto_increment primary key, ";
	    $query .= " first_name varchar(20) not null, last_name varchar(20) not null, "; 
	    $query .= " username varchar(20) not null, password varchar(20) not null,";
      $query .= " created_at date not null)";
        mysqli_query($link, $query);

      $query  = " create table admin(id int not null auto_increment primary key, ";
	    $query .= " first_name varchar(15) not null, last_name varchar(15) not null, "; 
	    $query .= " username varchar(8) not null, password varchar(8) not null)";
        mysqli_query($link, $query);

      $query  = " create table user_address(address_id int not null auto_increment primary key, ";
	    $query .= " user_id int not null references user(id),city varchar(20) not null, "; 
	    $query .= " postalCode varchar(8) not null, village varchar(15) not null, street varchar(15),  ";
      $query .= " building varchar(15), mobile varchar(15) not null)";
        mysqli_query($link, $query);

      $query  = " create table user_payment(payment_id int not null auto_increment primary key, user_id int not null references user(id),";
	    $query .= " order_date date not null, card_type varchar(20) not null, holder_name varchar(20) not null,"; 
	    $query .= " card_number varchar(20) not null, expiry_date date not null,final_cost int not null, number_of_products int not null)";
         mysqli_query($link, $query);

      $query  = " create table category(id int not null auto_increment primary key, ";
      $query .= " name varchar(15) not null)";
         mysqli_query($link, $query);

      $query  = " create table product(product_id int not null auto_increment primary key, ";
	    $query .= " category varchar(15) not null references category(name), type varchar(15), "; 
	    $query .= " brand varchar(15) not null, name varchar(15), price int not null, description varchar(1000),";
      $query .= " weight varchar(10) not null, shipping int, image varchar(40))";
         mysqli_query($link, $query);

      $query  = " create table cart(cart_id int not null auto_increment primary key, ";
      $query .= " user_id int not null references user(user_id), total_price int not null,"; 
      $query .= " brand varchar(15) not null, name varchar(15),  image varchar(40))";
         mysqli_query($link, $query);

      $query ="create table payment (id int(11) not null auto_increment primary key, item_number varchar(255) not null,";
      $query.=" item_name varchar(255) not null, payment_status varchar(255) NOT NULL, payment_amount double(10,2) not null,";
      $query.=" payment_currency varchar(255) not null,txn_id varchar(255) NOT NULL, ";
      $query.=" create_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP);";
      
     //Adding to admin table 
	      mysqli_query ($link, "insert into admin (first_name,last_name,username,password)
                              values('Elias', 'Helou', 'admin1', 'admin1')");
	      mysqli_query ($link, "insert into admin (first_name,last_name,username,password) 
                              values('Helou', 'Elias', 'admin2', 'admin2')");
     
     //Adding to user table
         mysqli_query ($link, "insert into user (first_name,last_name,username,password,created_at)
                               values('Elias', 'Helou', 'user1', 'user1', '2019-10-10')");
	       mysqli_query ($link, "insert into user (first_name,last_name,username,password,created_at) 
                               values('Helou', 'Elias', 'user2', 'user2', '2019-10-10')");

     //Adding to category table
      mysqli_query ($link, "insert into category(name) values('Laptops')");
      mysqli_query ($link, "insert into category(name) values('Clothing')");
      mysqli_query ($link, "insert into category(name) values('SmartPhones')");
      mysqli_query ($link, "insert into category(name) values('Cameras')");
      mysqli_query ($link, "insert into category(name) values('Shoes')");
      mysqli_query ($link, "insert into category(name) values('Watches')");

     //Adding to product table
      mysqli_query ($link, "insert into product (category,type,brand,name,price,description,weight, shipping, image) 
      values('Laptops', 'Gaming','HP', 'Pavilion15', 900, 'CPU: core i5/ GPU:GTX 1650/ Generation: 10th/
       Memory:128GB SSD & 1TB HDD/ O.S: Windows 10 / Color:Black' , '4000g', 50, 'image0.jpg' )");
      mysqli_query ($link, "insert into product (category,type,brand,name,price,description,weight, shipping, image) 
      values('Laptops', 'Business','Apple', 'MacBook Air', 1100, 'CPU: core i5/
      GPU: GTX 1050/ Generation: 10th/ Memory:128GB SSD & 1TB HDD/ Color:Silver' , '2000g',70,'laptop.jpg' )");
      mysqli_query ($link, "insert into product (category,type,brand,name,price,description,weight, shipping, image) 
      values('Clothing', 'T-shirt','Polo', null, 900, 
      'Size:X-large / Color:White' , '100g', 50,'polo1.jpg' )");
      mysqli_query ($link, "insert into product (category,type,brand,name,price,description,weight, shipping, image) 
      values('Clothing', 'Shirt','HandMade', null, 900, 
      'Size:X-large / Color:White' , '100g', 50,'clothing.jpg')");
      mysqli_query ($link, "insert into product (category,type,brand,name,price,description,weight, shipping, image) 
      values('SmartPhones', null ,'Apple', 'iPhone XS', 900, 
      'Color:Black / Storage:128GB/ Screen Size: 10 inches/ Camera: 20 Mega Pixels' , '300g', 40,'image3.jpg' )");
      mysqli_query ($link, "insert into product (category,type,brand,name,price,description,weight, shipping, image) 
      values('SmartPhones', null ,'Huawei', 'P40', 1000, 
      'Color:Blue / Storage:256GB/ Screen Size: 12 inches/ Camera: 40 Mega Pixels' , '350g', 40,'smartPhone.jpg' )");
      mysqli_query ($link, "insert into product (category,type,brand,name,price,description,weight, shipping, image) 
      values('Cameras', null ,'Canon', 'Canon20', 900, 
      'Color:Black / Storage:128GB/ Specification: 80 Mega Pixels' , '1000g', 40,'image2.jpg' )");
      mysqli_query ($link, "insert into product (category,type,brand,name,price,description,weight, shipping, image) 
      values('Cameras', null ,'Sony', 'XS', 900, 
      'Color:White / Storage:128GB/ Specification: 80 Mega Pixels' , '1000g', 40,'camera.jpg' )");
      mysqli_query ($link, "insert into product (category,type,brand,name,price,description,weight, shipping, image) 
      values('Shoes', 'Sport' ,'Nike', 'Air Force', 200, 
      'Color:Black&White / Size: 43 (Euro Size)' , '300g', 40,'shoes.jpg' )");
      mysqli_query ($link, "insert into product (category,type,brand,name,price,description,weight, shipping, image) 
      values('Shoes', 'Classic' ,'Clarks', null, 200, 
      'Color:Brown / Size: 45 (Euro Size)' , '300g', 40,'clarks.jpg' )");
      mysqli_query ($link, "insert into product (category,type,brand,name,price,description,weight, shipping, image)
        values('Watches', 'Business' ,'Rovina', 'Serie 5', 400, 
      'Color:White' , '200g', 60,'image6.jpg' )");
      mysqli_query ($link, "insert into product (category,type,brand,name,price,description,weight, shipping, image)
        values('Watches', 'Business' ,'Rolex', 'S', 1400, 
      'Color:Black' , '300g', 60, 'watch.jpg' )");

      //Adding to user_payment table
      mysqli_query($link,"insert into user_payment(user_id,order_date,card_number,expiry_date,final_cost,number_of_products) values ('1','2020-09-09','1111111','2021-10-09','200','3')");
      mysqli_query($link,"insert into user_payment(user_id,order_date,card_number,expiry_date,final_cost,number_of_products) values ('1','2020-10-09','1111111','2021-10-09','200','3')");
      mysqli_query($link,"insert into user_payment(user_id,order_date,card_number,expiry_date,final_cost,number_of_products) values ('1','2020-11-09','1111111','2021-10-09','200','3')");
      mysqli_query($link,"insert into user_payment(user_id,order_date,card_number,expiry_date,final_cost,number_of_products) values ('1','2020-12-09','1111111','2021-10-09','200','3')");

     echo "db created";
	   mysqli_close($link);	

     ?>