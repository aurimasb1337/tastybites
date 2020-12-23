<?php

session_start();
include '../db/db_connection.php';
if(!isset($_SESSION['user'])){
    echo"<script>window.location='../index.php';</script>";
}elseif($_SESSION['user']['type']!=1){
    echo "<script>alert('Your are not allowed to access admin')</script>";
    echo"<script>window.location='../index.php';</script>";
}

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tasty</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

    <?php
   
   include"./include/sidebar.php";
   
   ?>

     
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                            <?php
                
                include"./include/header.php";
                
                ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Rezervacijos</h1>
                       
                    </div>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Rezervacijos</h6>
                        </div>
                    <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Vardas</th>
                                            <th>Restoranas</th>
                                            <th>Laikas</th>
                                            <th>Svečiai</th>
                                            <th>Redaguoti</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        
                                        $get="select * from reservations";
                                        $run2=mysqli_query($conn,$get);
                                       
                                        while($row=mysqli_fetch_assoc($run2)){
                                            $id=$row['id'];
                                            $hotel_id=$row['RESTAURANTS_id'];

                                            $get_user="select * from users_has_reservations where RESERVATIONS_id='$id'";
                                            $run=mysqli_query($conn,$get_user);
                                            $data=mysqli_fetch_assoc($run);
                                            $user_id=$data['USERS_id'];

                                            $user="select * from users where id='$user_id'";
                                            $run=mysqli_query($conn,$user);
                                            $data=mysqli_fetch_assoc($run);

                                            $get_restaurant="select * from restaurants where id='$hotel_id'";
                                            $run=mysqli_query($conn,$get_restaurant);
                                            $restaurant=mysqli_fetch_assoc($run);


                                        

                                            ?>
                                            <tr>
                                             <td><?=$data['name']?></td>
                                             <td><?=$restaurant['name']?></td>
                                             <td><?=$row['date']?></td>
                                             <td><?=$row['guests']?></td>
                                             <td><a href="delete_order.php?id=<?=$id?>" class="btn btn-danger">Ištrinti</a></td?





                                            </tr>
                                            
                                            
                                            <?php
                                        }
                                        
                                        ?>
                                    </tbody>
                          
                                </table>
                            </div>
                        </div>
</div>


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Tastybites &copy; 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>



   <?php
   
   include"./include/footer.php";
   
   ?>
  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script>
    $('#dataTable').DataTable();
    </script>
</body>

</html>