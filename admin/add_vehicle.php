<?php
session_start();
include '../connection/dbconnection.php';

include 'admin_header.php'

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
        <h1>Add Book</h1>
    </center>
    <div style="margin:40px 400px; ">
        <form action="" method="post" enctype="multipart/form-data">
            <input type="text" placeholder="Vehicle name" name="bname" class="form-control one">
            <input type="text" placeholder="Brand" name="Brand" class="form-control one">
           
            <input type="text" placeholder="Registraton Number" min="1" name="regnum" class="form-control one">
            <input type="number" placeholder="Rent/Day" min="1" name="price" class="form-control one">
            <input type="file" placeholder="" name="file" class="form-control one">
            <textarea name="desc" id="" cols="30" rows="3" class="form-control one" placeholder="Description"></textarea>
            <button type="submit" name="reg" class="btn" style="padding:10px 15px;">Add
            </button>
        </form>
    </div>
</body>

</html>





<?php
include '../connection/dbconnection.php ';

if (isset($_REQUEST['reg'])) {

    $Bname = $_REQUEST['bname'];
    $Brand = $_REQUEST['Brand'];
    $regnum = $_REQUEST['regnum'];
    $Desc = $_REQUEST['desc'];
    $Price = $_REQUEST['price'];

    $filename = $_FILES["file"]["name"];
    $tempname = $_FILES["file"]["tmp_name"];
    $folder = "image/" . $filename;

    if (move_uploaded_file($tempname, '../images/' . $filename)) {
        $qryCheck = "select count(*) as cnt from vehicle where regnum='$regnum'";

        $qryOut = mysqli_query($con, $qryCheck);

        $fetchData = mysqli_fetch_array($qryOut);

        if ($fetchData['cnt'] > 0) {
            echo "<script>alert('Already exist ');
                 window.location = 'AddBook.php';
                </script>";
        } else {

            $qryReg = "INSERT INTO `vehicle`(`bname`,`brand`,`img`,`description`,`regnum`,`price`)VALUES('$Bname','$Brand','$filename','$Desc','$regnum','$Price')";


            // $qryLog = "INSERT INTO login(`reg_id`, `email`, `password`, `type`,`status`) VALUES((select max(s_id) from shop), '$Email', '$Password', 'SHOP','pending')";
            // mysqli_query($con, $qryReg);


            echo $qryReg;

            if ($con->query($qryReg)) {
                echo "<script>alert('Registration Success');
                window.location = 'add_vehicle.php';</script>";
                echo $qryReg;
            } else {
                echo "<>alert('Registration Failed');
                window.location = 'add_vehicle.php';
                </script>";
                echo $qryReg;
            }
        }
    }
}
?>

<?php

include 'admin_footer.php'

?>