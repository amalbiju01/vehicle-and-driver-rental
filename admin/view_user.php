<?php
session_start();
include '../connection/dbconnection.php';

include 'admin_header.php'

?>

<br>
<br>
<h1 class="text-warning mt-5">User Details</h1>
<table class="table table-dark mt-5">
    <thead>
        <tr>

            <th>First Name</th>

            <th>Phone Number</th>
            <th>Email</th>
            <th>Address</th>
            <!-- <th>Pin</th> -->
        </tr>
    </thead>
    <tbody>
        <?php
        $qry = "SELECT * FROM `login`JOIN `user_registration` ON `login`.`reg_id`=`user_registration`.`id`WHERE `l_status` = 'approved'";

        $result = mysqli_query($con, $qry);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $id = $row['id'];

                echo "<tr>";

                echo "<td>" . $row["first_name"] . "</td>";
                echo "<td>" . $row["phone_number"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";

                echo "<td>" . $row["address"] . "</td>";
                echo "<td><a class='btn btn-outline-danger' href='./delete_user.php?id={$id}&status=rejected'>Remove</a></td>";

                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No data available</td></tr>";
        }
        ?>
    </tbody>
</table>



<?php

include 'admin_footer.php'

?>