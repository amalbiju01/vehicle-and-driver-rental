<?php
session_start();
include '../connection/dbconnection.php';
include 'user_header.php';
$id = $_GET['id'];





$que = "Delete from booking  WHERE `bid`='$id'";
$result = mysqli_query($con, $que);
echo "<script>window.location='./user/view_booking.php'</script>";
?>