<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<?php
session_start();
include '../connection/dbconnection.php';
include 'admin_header.php';
$query = "SELECT *
FROM bookingdriver
INNER JOIN driver ON bookingdriver.id = driver.id
INNER JOIN user_registration ON bookingdriver.uid = user_registration.id 
";
$result = mysqli_query($con, $query);
// echo $query;
if (!$result) {
    // Query execution failed, handle the error
    die("Error executing the query: " . mysqli_error($con));
}
?>

<div class="container">
    <br>
    <br>
    <br>
    <div class="row">
    <?php
    while ($row = mysqli_fetch_array($result)) {
        $id = $row[0];
    ?>
        <div class="col-md-3">
            <div class="card mb-3">
                <img class="card-img-top" src="../images/<?php echo $row['image']; ?>" alt="Card image cap" style="width:300px;height:200px">
               
                <div class="card-body">
                    <h1 style="color:#eb5234;"><?php echo $row['dname']; ?></h1>
                    <h3 style="color:#eb5234;"><?php echo $row['phone']; ?></h3>
                    <h2 style="color:#eb5234;">Rs   <?php echo $row['rate']; ?></h2>
                    <p><?php echo $row['first_name']; ?></p>
                  
                    <a class="btn btn-outline-danger" href="./deletebooking.php?id=<?php echo $id; ?>">Delete</a>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
    </div>
</div>


