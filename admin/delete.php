<?php
session_start();
include '../connection/dbconnection.php';
// include 'user_header.php';
$id = $_REQUEST['id'];
// $uid= $_SESSION['lid'];

$query = "delete  FROM `vehicle` WHERE `bid`='$id'";
$result = mysqli_query($con, $query);


    echo "<script type = \"text/javascript\">
					alert(\"Deleted\");
					window.location = (\"view_vehicle.php\")
				</script>";


        ?>
<?php
// include 'user_footer.php';
?>
