<?php require_once('inc/connection.php');
$userid = 1;
?>
<?php 
    session_start();
    // Check if the user is logged in

    // Check if the user is logged in
if (!isset($_SESSION['email'])) {
    // Redirect to the login page or any other appropriate action
    header("Location: login.php");
    exit;
}

    // Check if the user is not logged in
    if (isset($_SESSION["email"]) && isset($_SESSION['uname'])) {
        $user_Email = $_SESSION["email"];
        $user_namw = $_SESSION["uname"];
    }
    if (isset($_SESSION["seller_ID"])){
        $sellerID = $_SESSION["seller_ID"];
    }
    $userID = $_SESSION["id"];

?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="./styles/driver.css">
  <link rel="stylesheet" type="text/css" href="styles/styles.css">
  <!-- <link rel="stylesheet" type="text/css" href="styles/viewpayments.css"> -->
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <a href="addpayment.php">Add Payment</a>
        <a href="viewpayments.php">View payments</a>
        <a href="driverdetails.php">View Drivers</a>
    </div>
    <div>
      <br>
    <h1 style="text-align: center;">Payment Details</h1>
    <table class="dashboardform">
        <thead>
            <tr>
                <th>Payment ID</th>
                <th>Seller ID</th>
                <th>User ID</th>
                <th>Amount</th>
                <th>Payment Method</th>
                <th>Card No</th>
                <th>DD/MM</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM payments WHERE UserID = '$userid'";
            $result = mysqli_query($connection, $sql);

            if (!empty($result)) {
                while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                        <td><?php echo $row['payment_ID'] ?></td>
                        <td><?php echo $row['seller_ID'] ?></td>
                        <td><?php echo $row['UserID'] ?></td>
                        <td><?php echo $row['Amount'] ?></td>
                        <td><?php echo $row['method'] ?></td>
                        <td><?php echo $row['cardno'] ?></td>
                        <td><?php echo $row['mmyy'] ?></td>
                    </tr>
                    <?php
                }
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>
