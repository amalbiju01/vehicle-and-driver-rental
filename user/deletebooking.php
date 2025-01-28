<?php
session_start();
include '../connection/dbconnection.php';
include 'user_header.php';
$id = $_GET['id'];





$que = "Delete from bookingdriver  WHERE `bookid`='$id'";
$result = mysqli_query($con, $que);
echo "<script>window.location='./view_bookingdriver.php'</script>";
?>