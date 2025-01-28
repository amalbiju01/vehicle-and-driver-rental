<?php
session_start();
include '../connection/dbconnection.php';
// include 'user_header.php';
$id = $_REQUEST['id'];
// $uid= $_SESSION['lid'];

$query = "update   `driver` set status='accepted' WHERE `id`='$id'";
$result = mysqli_query($con, $query);


    echo "<script type = \"text/javascript\">
					alert(\"Accepted\");
					window.location = (\"view_driver.php\")
				</script>";


        ?>
<?php
// include 'user_footer.php';
?>
