<?php
session_start();
include 'db/db_connection.php';
if (!isset($_SESSION['user'])) {
    echo"<script>window.location='login.php';</script>";
}
?>

<?php

if(isset($_POST['order_btn'])){
    $food_id=$_POST['food_id'];
    $restaurant_id=$_POST['restaurant_id'];
    $date=$_POST['date'];
    $guests=$_POST['guests'];

    $check="select * from restaurants where id='$restaurant_id'";
    $check_run=mysqli_query($conn,$check);
    $row=mysqli_fetch_assoc($check_run);
    $capacity=(int)$row['maxCapacity'];

    
    $check="select * from reservations where RESTAURANTS_id='$restaurant_id' and date='$date'";
    $check_run=mysqli_query($conn,$check);
    $total_guests=0;
    while($row=mysqli_fetch_assoc($check_run)){
      $total_guests=$total_guests+(int)$row['guests'];
    }
    

    if($capacity<$total_guests+$guests){
        echo"<script>alert('Nebėra laisvų vietų.')</script>";
        echo"<script>window.location='index.php'</script>";
    }else{
        $insert="insert into reservations (date,guests,RESTAURANTS_id,FOOD_id)values('$date','$guests','$restaurant_id','$food_id')";
        $run=mysqli_query($conn,$insert);
        if($run){
            $last_id = mysqli_insert_id($conn);
            $user_id=$_SESSION['user']['id'];
            $insert2="insert into users_has_reservations (USERS_id,RESERVATIONS_id,RESERVATIONS_RESTAURANTS_id)values('$user_id','$last_id','$restaurant_id')";
            $run2=mysqli_query($conn,$insert2);
            if($run2){
               echo"<script>alert('Rezervacija atlikta')</script>";
               echo"<script>window.location='index.php'</script>";
            }else{
                echo"<script>alert('Error')</script>";
                echo"<script>window.location='index.php'</script>";
            }
        }else{
            echo"<script>alert('Error')</script>";
            echo"<script>window.location='index.php'</script>";
        }
    }

   
}




?>





<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">



   
    <title>Tastybites`</title>
</head>

<body>
   <?php
   include"./header.php"
   ?>
    <div class="container">
        <div class="row">

            <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "tastybites2";

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname,3306);
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                ?>

                <div class="col-sm-12 mt-4">
                <form method="POST">
                   <input type="hidden" name="restaurant_id" value="<?=$_GET['restaurant_id']?>">
                   <input type="hidden" name="food_id" value="<?=$_GET['food_id']?>">
                     <div class="form-group">
                        <label>Data</label>
                        <input type="date" class="form-control" name="date">
                    </div>

                    <div class="form-group">
                        <label>Svečiai</label>
                        <input type="number" min="1" class="form-control" name="guests">
                    </div>
                   
                    <button type="submit" name="order_btn" class="btn btn-primary">Pateikti</button>
                
                
                </form>
                
                </div>



        </div>
    </div>



    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js">
    </script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.devbridge-autocomplete/1.4.11/jquery.autocomplete.js"
        integrity="sha512-JwPA+oZ5uRgh1AATPhLKeByWbXcsRnMMSBpvhuAGQp+CWISl/fHecOshbRcPPgKWau9Wy1H5LhiwAa4QFiQKYw=="
        crossorigin="anonymous"></script>

    <script>




    </script>

</body>

</html>