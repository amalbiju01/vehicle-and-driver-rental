<?php
session_start();
include './connection/dbconnection.php';

include 'header.php'

?>
<style>
    .one {
        margin-bottom: 20px;
        background-color: #eb5234;
        border: none;
        border-bottom: 1px solid white;
        border-left: 1px solid white;
        border-radius: 20px;

    }

    ::placeholder {
        color: white !important;
    }

    .one:focus {
        color: rgb(194, 234, 91);
        background-color: #525350f0;
        border: none;
        /* border-bottom: 1px solid white;
            border-left: 1px solid white; */
        border-radius: 20px;
    }

    .btn {
        font-size: 20px;
        color: white !important;

        box-shadow: 30px 40px 36px -9px rgba(0, 0, 0, 0.75);
        margin-bottom: 20px;
        background-color: #eb5234;
        border: none;
        border-bottom: 1px solid white;
        border-left: 1px solid white;
        border-radius: 20px;

    }

    .btn:hover {
        background-color: #eb3239;

    }
</style>
<html>

<body style="background-color:#eb5234;">
    <br>
    <br>
    <br>
    <center>
        <h1> Driver Registration </h1>
    </center>
    <div style="margin:40px 400px; ">
        <form action="" method="post" enctype="multipart/form-data">
            <input type="text" placeholder="Driver name" name="dname" class="form-control one">
            <input type="text" placeholder="Phone" pattern="[789][0-9]{9}" name="phone" class="form-control one">

            <input type="text" placeholder="Address" name="address" class="form-control one">
            <input type="text" placeholder="Experiance"  name="exp" class="form-control one">
            <input type="email" placeholder="Email" name="email" class="form-control one">
            <input type="file" placeholder="" name="file" class="form-control one">
            <input type="numbaer" placeholder="Charge" name="charge" class="form-control one">
            <input type="password" placeholder="password" name="password" class="form-control one">
           <button type="submit" name="reg" class="btn" style="padding:10px 15px;">Add
            </button>
        </form>
    </div>
</body>

</html>





<?php
include './connection/dbconnection.php ';

if (isset($_REQUEST['reg'])) {

    $dname = $_REQUEST['dname'];
    $phone = $_REQUEST['phone'];
    $address = $_REQUEST['address'];
    $exp = $_REQUEST['exp'];
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];

    $charge = $_REQUEST['charge'];
    $filename = $_FILES["file"]["name"];
    $tempname = $_FILES["file"]["tmp_name"];
    $folder = "image/" . $filename;

    if (move_uploaded_file($tempname, './images/' . $filename)) {
    
        $qryCheck = "select count(*) as cnt from driver where uname='$email'";

        $qryOut = mysqli_query($con, $qryCheck);

        $fetchData = mysqli_fetch_array($qryOut);

        if ($fetchData['cnt'] > 0) {
            echo "<script>alert('Already exist ');
                 window.location = 'AddBook.php';
                </script>";
        } else {

            $qryReg = "INSERT INTO `driver`(`dname`,`phone`,`address`,`exp`,`uname`,`image`,`charge`)VALUES('$dname','$phone','$address','$exp','$email','$filename','$charge')";

            $lqry = "insert into login(`reg_id`,`username`,`password`,`l_type`,`l_status`)values((select max(id) from driver),'$email','$password','driver','approved')";
            // $qryLog = "INSERT INTO login(`reg_id`, `email`, `password`, `type`,`status`) VALUES((select max(s_id) from shop), '$Email', '$Password', 'SHOP','pending')";
             mysqli_query($con, $lqry);


            echo $qryReg;

            if ($con->query($qryReg)) {
                echo "<script>alert('Registration Success');
                window.location = 'add_driver.php';</script>";
                echo $qryReg;
            } else {
                echo "<>alert('Registration Failed');
                window.location = 'add_driver.php';
                </script>";
                echo $qryReg;
            }
        }
    }
}
?>

<?php

include 'footer.php'

?>