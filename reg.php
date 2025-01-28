<?php
session_start();
include './connection/dbconnection.php';
include 'header.php'

?>

<form method="post">
<div class="contact_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="contact_taital">Sign up</h1>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="contact_section_2">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mail_section_1">
                            <input type="text" class="mail_text" placeholder="Name" name="Name">
                            <input type="text" class="mail_text" placeholder="Email" name="Email">
                            <input type="password" class="mail_text" placeholder="Password" name="Password">
                            <input type="text" class="mail_text" placeholder="Phone Number" pattern="[6789][0-9]{9}" name="PhoneNumber">
                            <textarea class="massage-bt" placeholder="Address" rows="5" id="comment" name="address"></textarea>
                            <div class="send_bt">
                           <input type="submit" class="btn btn-info " name="add" id="" value="Submit">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
    <?php
if (isset($_REQUEST['add'])) {
        
    $first_name = $_POST['Name'];
    $PhoneNumber = $_POST['PhoneNumber'];
    $email = $_POST['Email'];
    $Password = $_POST['Password'];
    $address = $_POST['address'];

    $qry = "SELECT * FROM `user_registration` WHERE `email` = '$email'";
	// echo $qry;
	$result = mysqli_query($con, $qry);
	if ($result->num_rows > 0) {
		$data = $result->fetch_assoc();
        echo "<script>alert('Already added');</script>";}
        else{
    $sql = "INSERT INTO `user_registration` (`first_name`, `phone_number`, `email`, `password`, `address`)
    VALUES ('$first_name', '$PhoneNumber', '$email', '$Password', '$address')";
        mysqli_query($con, $sql);
        $lqry = "insert into login(`reg_id`,`username`,`password`,`l_type`,`l_status`)values((select max(id) from user_registration),'$email','$Password','user','approved')";
        mysqli_query($con, $lqry);
        echo $lqry;
}
}
        ?>

<?php

include 'footer.php'

?>