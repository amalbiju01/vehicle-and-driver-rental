<?php
session_start();
include './connection/dbconnection.php ';
include 'header.php'

?>

<form method="post">
<div class="contact_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="contact_taital">Log in</h1>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="contact_section_2">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mail_section_1">
                            
                            <input type="text" class="mail_text" placeholder="Email" name="Email">
                            <input type="password" class="mail_text" placeholder="password" name="Password">
                        <pre>


                        </pre>
                            <div class="send_bt">
                           <input type="submit" class="btn btn-info " name="login" id="" value="Submit">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
<?php

    if (isset($_REQUEST['login'])) {
        $uname = $_REQUEST['Email'];
        $password = $_REQUEST['Password'];
        $qry = "SELECT * FROM login WHERE `username` = '$uname' AND `password` = '$password' and l_status='approved'";
        echo $qry;
        $result = mysqli_query($con, $qry);
        if ($result->num_rows > 0) {
            $data = $result->fetch_assoc();

            $uid = $data['reg_id'];
            $type = $data['l_type'];
            $status = $data['l_status'];

            $_SESSION['lid'] = $uid;
            $_SESSION['type'] = $type;

            if ($type == "admin") {
                echo "<script>alert('Log in Successful');</script>";
                echo "<script>window.location='./admin/admin_home.php'</script>";
            } elseif ($type  == "user") {
                echo "<script>alert('Log in Successful');</script>";
                echo "<script>window.location='./user/user_home.php'</script>";
            // } elseif ($type == "public") {
            //     echo "<script>alert('Log in Successful');</script>";
            //     echo "<script>window.location='./public/public_home.php'</script>";
            // }
            //  elseif ($type == "parent") {
            //     echo "<script>alert('Log in Successful');</script>";
            //     echo "<script>window.location='./parent/parent_home.php'</script>";
            // }
        }
        elseif ($type  == "driver") {
            echo "<script>alert('Log in Successful');</script>";
            echo "<script>window.location='./driver/driver_home.php'</script>";}
        else {
            echo "<script>alert('Invalid User ');</script>";
            echo "<script>window.location='login.php'</script>";
        }
    }}
    ?>

<?php

include 'footer.php'

?>