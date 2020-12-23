<?php
session_start();
include './db/db_connection.php';
if(isset($_POST['submit']))
{

    $email=htmlentities(mysqli_real_escape_string($conn,$_POST['email']));
    $password=htmlentities(mysqli_real_escape_string($conn,$_POST['password']));


    $select_user="select * from users where email='$email' AND password='$password'";
    $query=mysqli_query($conn,$select_user);
    $check_user=mysqli_num_rows($query);
    if($check_user==1)
    {
        $row=mysqli_fetch_assoc($query);
        if($row['type']==2){
            $_SESSION['user']=$row;
            echo "<script>window.open('./index.php','_self')</script>";
        }elseif($row['type']==1){
            $_SESSION['user']=$row;
            echo "<script>window.open('./admin/index.php','_self')</script>";
        }
       
    }
    else
    {
        echo "<script>alert('Neteisingi duomenys')</script>";
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
      <input type="email" id="login" class="fadeIn second" name="email" placeholder="el.paštas">
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="slaptažodis">
      <input type="submit" name="submit" class="fadeIn fourth" value="Prisijungti">
    </form>

  </div>
</div>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<!------ Include the above in your HEAD tag ---------->
</body>
</html>