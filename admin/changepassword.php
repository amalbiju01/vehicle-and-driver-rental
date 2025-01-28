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
            <input type="text" placeholder="Oldpassword" name="opass" class="form-control one">
            <input type="password" placeholder="New Password" name="npass" id=npass class="form-control one">
            <input type="password" placeholder="Re enter Password" onblur="passmatch()" name="rpass" id="rpass" class="form-control one">
            <b id="ms"></b>
            <script>
                function passmatch()
                {
                    msg="";
                    var npass=document.getElementById("npass").value;
                    var rpass=document.getElementById("rpass").value;
                    if(npass===rpass)
                        msg="";
                    else
                        msg="password not match";
                    document.getElementById("ms").innerHTML=msg;

                }
            </script>   
            <button type="submit" name="reg" class="btn" style="padding:10px 15px;">Add
            </button>
        </form>
    </div>
</body>

</html>





<?php
include '../connection/dbconnection.php ';

if (isset($_REQUEST['reg'])) {

    $opass = $_REQUEST['opass'];
    $npass = $_REQUEST['npass'];
    
            $qryReg = "update login set password='$npass' where username='admin' and password='$opass'";
mysqli_query($con,$qryReg);

            // $qryLog = "INSERT INTO login(`reg_id`, `email`, `password`, `type`,`status`) VALUES((select max(s_id) from shop), '$Email', '$Password', 'SHOP','pending')";
            // mysqli_query($con, $qryReg);


          
}
?>

<?php

include 'admin_footer.php'

?>