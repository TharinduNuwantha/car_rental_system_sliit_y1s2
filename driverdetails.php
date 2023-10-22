<?php 
require_once('inc/connection.php');
$userid = 1;
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="./styles/styles.css">
  <!-- <link rel="stylesheet" type="text/css" href="./styles/admindash.css"> -->
  <link rel="stylesheet" type="text/css" href="./styles/driver.css">
  
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <a href="addpayment.php">Add Payment</a>
        <a href="viewpayments.php">View payments</a>
        <a href="driverdetails.php">View Drivers</a>
    </div>
    <div>
    <h1 style="text-align: center;">Driver Details</h1>
    <table class="dashboardform">
        <thead>
            <tr>
                <th>Title</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone No</th>
                <th>Date of Birth</th>
                <th>Country</th>
                <th>Address</th>
                <th>NIC</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM driverdetails WHERE user_ID = '$userid'";
            $result = mysqli_query($connection, $sql);

            if (!empty($result)) {
                while ($row = mysqli_fetch_array($result)) {
                    $id = $row['did'];
                    ?>
                    <tr>
                        <td><?php echo $row['title'] ?></td>
                        <td><?php echo $row['fname'] ?></td>
                        <td><?php echo $row['lname'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td><?php echo $row['phone'] ?></td>
                        <td><?php echo $row['bday'] ?></td>
                        <td><?php echo $row['country'] ?></td>
                        <td><?php echo $row['address'] ?></td>
                        <td><?php echo $row['nic'] ?></td>
                        <td>
                            <div class="smallbtncontainer">
                                <a href="updatedriverdetails.php?id=<?php echo $id ?>" class="smallbtn">Update</a>
                                <a href="deletedata.php?id=<?php echo $id ?>" class="smallbtn">Delete</a>
                            </div>
                        </td>
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