<?php

session_start();
include '../db/db_connection.php';
if(!isset($_SESSION['user'])){
    echo"<script>window.location='../index.php';</script>";
}elseif($_SESSION['user']['type']!=1){
    echo "<script>alert('Your are not allowed to access admin')</script>";
    echo"<script>window.location='../index.php';</script>";
}


$id=$_GET['id'];

$delete="delete from users_has_reservations where RESERVATIONS_id='$id'";
$run=mysqli_query($conn,$delete);

$delete="delete from reservations where id='$id'";
$run=mysqli_query($conn,$delete);


echo "<script>alert('Reservation Deleted')</script>";
echo"<script>window.location='./orders.php';</script>";


?>