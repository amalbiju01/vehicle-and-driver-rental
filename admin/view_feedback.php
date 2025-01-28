

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<?php
session_start();
include '../connection/dbconnection.php';
include 'admin_header.php';
?>
<br>
<br>
<br>
<br>
<br>
<br>
<?php
$query = "SELECT *
FROM `feedback`
JOIN `user_registration` ON `feedback`.`uid` = `user_registration`.`id`

";
$result = mysqli_query($con, $query);
// echo $query;
if (!$result) {
    // Query execution failed, handle the error
    die("Error executing the query: " . mysqli_error($con));
}
?>
<div class="container">
    <h2>Feedback from Users</h2>
    <table class="table text-danger">
        <!--  -->
        <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                // echo "<td>" . $row['fid'] . "</td>";
                echo "<td>" . $row['first_name'] . "<br>";
                // echo "<td>" . $row['email'] . "</td>";
                // echo "<td>";
                // Convert the rating to stars
                $rating = $row['rating'];
                for ($i = 1; $i <= 5; $i++) {
                    if ($i <= $rating) {
                        echo '<i style ="color:yellow"class="bi bi-star-fill"></i>';
                    } else {
                        echo '<i class="bi bi-star"></i>';
                    }
                }
                // echo "</td>";
                echo "<h2>" . $row['text'] . "</h2>";
                echo'<a href="deletefeed.php?id='.$row['fid'].'">Delete</a>';
                echo "</tr>";
                // echo "<hr>";
             
  

            }
            ?>
        </tbody>
    </table>
</div>
        



<?php

include 'admin_footer.php'

?>