<?php
session_start();
include '../connection/dbconnection.php';
// include 'user_header.php';
$id = $_GET['id'];
// $uid= $_SESSION['lid'];

$query = "delete  FROM `feedback` WHERE `fid`='$id'";
$result = mysqli_query($con, $query);


    echo "<script type = \"text/javascript\">
					alert(\"Deleted\");
					window.location = (\"view_feedback.php\")
				</script>";


        ?>
<?php
// include 'user_footer.php';
?>
