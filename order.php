<?php
session_start();
include 'db/db_connection.php';
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
    <div class="row  d-flex justify-content-center">
    
  
        <?php
        $foods="select * from restaurants_has_food where RESTAURANTS_id=".$_GET['restaurant_id'];
        $run=mysqli_query($conn,$foods);
        while($row=mysqli_fetch_assoc($run)){
           $food="select * from food where id=".$row['FOOD_id'];
           $query=mysqli_query($conn,$food);
           $rowCount= mysqli_num_rows($query);
           if(mysqli_num_rows($query)>0){
               $data=mysqli_fetch_assoc($query);
        
              ?>
              
  
              <div class="col-sm-6 mt-4">
              <div class="card">
                    <img src="./img/<?=$data['img']?>" style="height:250px" class="img-fluid card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?=$data['name']?></h5>
                        <p class="card-text"><?=$data['description']?></p>
                        <p class="card-text">Kiekis:<?=$data['quantity']?></p>
                        <a href="checkout.php?restaurant_id=<?=$_GET['restaurant_id']?>&food_id=<?=$data['id']?>" class="btn btn-primary">Rezervacija</a>
                    </div>
                    </div>
              </div>
              
              
              
              
              
              <?php
           }
           else{
               echo  $rowCount;
              
                
           }
        }
        if (mysqli_num_rows($run) == 0) {
            echo '
            <div class="text-center" style="padding:50px">
            <h3> Restoranas neturi maisto. <h3>
            </div>
            ';
            exit;
        }
        
        ?>
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