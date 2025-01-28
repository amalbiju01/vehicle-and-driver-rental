<?php
session_start();
include '../connection/dbconnection.php';
include 'user_header.php';
$id = $_REQUEST['id'];
$bid = $_REQUEST['bid'];
$uid= $_SESSION['lid'];

$query = "SELECT * FROM `vehicle` WHERE `bid`='$id'";
$result = mysqli_query($con, $query);
?>

<?php
$query = "UPDATE vehicle  SET `status`='pending' WHERE `bid`='$id'";
$result = mysqli_query($con, $query);
$que = "delete from booking  where `bookid`='$bid'";
$result = mysqli_query($con, $que);
echo $query;
if ($result === TRUE) {
    echo "<script type = \"text/javascript\">
					alert(\"Status Updated\");
					window.location = (\"view_booking.php\")
				</script>";
}

        ?>
<?php
include 'user_footer.php';
?>
