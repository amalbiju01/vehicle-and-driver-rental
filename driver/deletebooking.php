<?php
session_start();
include '../connection/dbconnection.php';
// include 'user_header.php';

// $uid= $_SESSION['lid'];


?>

<?php
$id = $_GET['id'];
$que = "delete from bookingdriver  WHERE `bookid`='$id'";
$result = mysqli_query($con, $que);
echo $que;

    echo "<script type = \"text/javascript\">
					alert(\"Deleted\");
					window.location = (\"view_bookingdriver.php\")
				</script>";


        ?>
<?php
// include 'user_footer.php';
?>
