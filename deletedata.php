<?php require_once('inc/connection.php');
$userid = 1;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Driver Details</title>
  <link rel="stylesheet" type="text/css" href="./styles/styles.css">
  <link rel="stylesheet" type="text/css" href="./styles/admindash.css">
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <a href="addpayment.php">Add Payment</a>
        <a href="viewpayments.php">View payments</a>
        <a href="driverdetails.php">View Drivers</a>
    </div>
<br>

<div>
    <h1 style="text-align: center;">Delete Data</h1><br>
    <div class="confirm_msg">
        <div class="msgcontainer">
                <center>
            <p class="deletemsg">Are You Sure to Permanently Delete this Recoard?</p></center><br>
            <div class="btncontainer">
                <center>
                    <?php
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        echo '<a href="deletedata.php?state=1&id=' . $id . '" class="smallbtn">Yes</a>';
                    }
                    ?>
                    <a href="driverdetails.php" class="smallbtn">No</a>
                </center>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($_GET['state']) && isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql1 = "SELECT * FROM driverdetails WHERE did = $id";
    $result = mysqli_query($connection, $sql1);
    $result = mysqli_fetch_assoc($result);
    $sql = "DELETE FROM driverdetails WHERE did = $id";
    if (mysqli_query($connection, $sql)) {
        header("Location: driverdetails.php?error=Details has been deleted");
    } else {
        header("Location: driverdetails.php?error=Details cannot be deleted due to an error");
    }
}
?>

</body>
</html>
