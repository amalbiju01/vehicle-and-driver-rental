<?php
session_start();
include '../connection/dbconnection.php';
include 'user_header.php';
$id = $_REQUEST['id'];
$uid= $_SESSION['lid'];

$query = "SELECT * FROM `driver` WHERE `id`='$id'";
$result = mysqli_query($con, $query);
?>

<div class="container">
    <br>
    <br>
    <br>
    <div class="row">
    <?php
    while ($row = mysqli_fetch_array($result)) {
        $id = $row['id'];
    ?>
        <div class="col-md-3">
            <div class="card mb-3">
                <img class="card-img-top" src="../images/<?php echo $row['image']; ?>" alt="Card image cap" style="width:300px;height:200px">
               
                <div class="card-body">
                    <h1 style="color:#eb5234;"><?php echo $row['dname']; ?></h1>
                    <h3 style="color:#eb5234;"><?php echo $row['phone']; ?></h3>
                    <!-- <h2 style="color:#eb5234;">Rs   <?php echo $row['charge']; ?></h2> -->
                    <p><?php echo $row['address']; ?></p>
                </div>
            </div>
        </div>
   

    <div class="col-5">
        <form method="post" id="bookingForm">
            <p>Start Date</p>
            <input type="date" class="form-control" id="startDate" name="startDate"><br>
            <p>End Date</p>
            <input type="date" class="form-control" id="endDate" name="endDate"><br>
            <input type="hidden" name="rate" id="totalCostInput" value="">
            <input type="submit" class="btn btn-primary" name="book">
        </form>
    </div>
    <div class="col-4">
        <br>
        <br>
        <br>
        
    <h2 class="text-warning">Number of Days: <span id="numOfDays">0</span></h2>
            <h2 class="text-warning">Cost Per Day: Rs <span id="costPerDay"><?php echo $row['charge']; ?></span></h2>
            <h1 class="text-danger">Total Cost: Rs <span id="totalCost">0</span> <span>/-</span></h1><br>
    </div>
</div>
</div>
<?php
    }
    ?>
<script>
    const startDateInput = document.getElementById("startDate");
    const endDateInput = document.getElementById("endDate");
    const numOfDays = document.getElementById("numOfDays");
    const costPerDay = document.getElementById("costPerDay");
    const totalCost = document.getElementById("totalCost");

    startDateInput.addEventListener("change", calculateCost);
    endDateInput.addEventListener("change", calculateCost);

    function calculateCost() {
        const startDate = new Date(startDateInput.value);
        const endDate = new Date(endDateInput.value);
        const today = new Date(); // Get today's date

        // Check if start date is in the future
        if (startDate < today) {
            alert("Please select a future date as the start date.");
            startDateInput.value = ""; // Clear the input field
            return;
        }

        // Check if end date is the same as the start date
        if (startDate.toDateString() === endDate.toDateString()) {
            alert("End date cannot be the same as the start date.");
            endDateInput.value = ""; // Clear the input field
            return;
        }

        const diffTime = Math.abs(endDate - startDate);
        const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
        const costPerDayValue = parseFloat(costPerDay.textContent);

        numOfDays.textContent = diffDays;
        totalCost.textContent = (diffDays * costPerDayValue).toFixed(2);
        document.getElementById("totalCostInput").value = (diffDays * costPerDayValue).toFixed(2);
    }

    // Initial calculation
    calculateCost();
</script>

<?php
if (isset($_REQUEST['book'])) {
        
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    $rate = $_POST['rate'];
    // $email = $_POST['Email'];
    // $Password = $_POST['Password'];
    // $address = $_POST['address'];

    $qry = "SELECT * FROM `bookingdriver` WHERE `s_date` = '$startDate' AND e_date='$endDate'AND `id`='$id'";
	// echo $qry;
	$result = mysqli_query($con, $qry);
	if ($result->num_rows > 0) {
		$data = $result->fetch_assoc();
        echo "<script>alert('Already added');</script>";}
        else{
    $sql = "INSERT INTO `bookingdriver` (`s_date`, `e_date`,`id`,`rate`,`uid`)
    VALUES ('$startDate', '$endDate', '$id','$rate','$uid')";
        mysqli_query($con, $sql);
    //    echo $sql;


        echo "<script>alert('Booked Successfully');</script>";
        // echo "<script>window.location='./user_view_driver.php'</script>";

}
}
        ?>
<?php
include 'user_footer.php';
?>
