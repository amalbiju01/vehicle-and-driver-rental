<?php
session_start();
include '../connection/dbconnection.php';
// include 'user_header.php';
$id = $_REQUEST['id'];
// $uid= $_SESSION['lid'];
$uname=$_GET["uname"];
$query = "delete  FROM `login` WHERE `username`='$uname'";
$result = mysqli_query($con, $query);
$query = "delete  FROM `driver` WHERE `id`='$id'";
$result = mysqli_query($con, $query);


    echo "<script type = \"text/javascript\">
					alert(\"Deleted\");
					window.location = (\"view_driver.php\")
				</script>";


        ?>
<?php
// include 'user_footer.php';
?>
