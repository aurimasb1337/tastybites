<?php
session_start();
include './db/db_connection.php';
if(isset($_POST['submit']))
{
    $name=htmlentities(mysqli_real_escape_string($conn,$_POST['name']));
    $email=htmlentities(mysqli_real_escape_string($conn,$_POST['email']));
    $password=htmlentities(mysqli_real_escape_string($conn,$_POST['password']));


    $select_user="select * from users where email='$email'";
    $query=mysqli_query($conn,$select_user);
    $check_user=mysqli_num_rows($query);
    if($check_user==1)
    {
        echo "<script>alert('Email Already Exist')</script>";
       
       
    }
    else
    {
       $insert="insert into users(name,email,password,type)values('$name','$email','$password',2)";
       $run=mysqli_query($conn,$insert);
       if($run){
        echo "<script>alert('Successfully Registered')</script>";
       
        echo "<script>window.open('./index.php','_self')</script>";
  
       } else{
        echo "<script>alert('Error')</script>";
       
       }
          
    }


}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="./css/style2.css" rel="stylesheet">
</head>
<body>


<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="https://cdn4.iconfinder.com/data/icons/small-n-flat/24/user-alt-512.png" class="img-fluid" style="height:70px;width:50px" id="icon" alt="User Icon" />
    </div>

    <!-- Login Form -->
    <form method="POST">
       <input type="text" id="login" class="fadeIn second" name="name" placeholder="Name">
      <input type="email" id="login" class="fadeIn second" name="email" placeholder="Email">
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="password">
      <input type="submit" name="submit" class="fadeIn fourth" value="Register">
    </form>

  </div>
</div>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<!------ Include the above in your HEAD tag ---------->
</body>
</html>