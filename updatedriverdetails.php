<?php
require_once('inc/connection.php');
$id = $_GET['id'];
$sql = "SELECT * FROM driverdetails WHERE did = $id";
$result = mysqli_query($connection, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    if ($row) {
      $did = $row['did'];
      $user_ID = $row['user_ID'];
      $VehicleID = $row['VehicleID'];
      $title = $row['title'];
      $fname = $row['fname'];
      $lname = $row['lname'];
      $email = $row['email'];
      $phone = $row['phone'];
      $bday = $row['bday'];
      $country = $row['country'];
      $address = $row['address'];
      $nic = $row['nic'];
    } else {
    }
} else {
}
?>

<!DOCTYPE html>
<html>
<head>

  <link rel="stylesheet" type="text/css" href="./styles/styles.css">
  <link rel="stylesheet" type="text/css" href="./styles/dashstyle.css">
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <a href="addpayment.php">Add Payment</a>
        <a href="viewpayments.php">View payments</a>
        <a href="driverdetails.php">View Drivers</a>
    </div><br>
  <h1 style="text-align: center;">Driver Details Form</h1><br>
  <form  action="updatedriverini.php" method="post">
    <div class="form-row">
      <label for="title">Title:</label>
      <select id="title" name="title">
        <option value="Mr" required <?php if($title == 'Mr') echo 'checked'; ?>>Mr</option>
        <option value="Mrs" required <?php if($title == 'Mrs') echo 'checked'; ?>>Mrs</option>
        <option value="Miss" required <?php if($title == 'Miss') echo 'checked'; ?>>Miss</option>
      </select>
    </div>
    <div class="form-row">
      <label for="firstName">First Name:</label>
      <input type="text" id="firstName" name="firstName" required value="<?php echo $fname; ?>">
    </div>
    <div class="form-row">
      <label for="lastName">Last Name:</label>
      <input type="text" id="lastName" name="lastName" required value="<?php echo $lname; ?>">
    </div>
    <div class="form-row">
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required value="<?php echo $email; ?>">
    </div>
    <div class="form-row">
      <label for="phone">Phone Number:</label>
      <input type="tel" id="phone" name="phone" required value="<?php echo $phone; ?>">
    </div>
    <div class="form-row">
      <label for="birthday">Birthday:</label>
      <input type="date" id="birthday" name="birthday" required value="<?php echo $bday; ?>">
    </div>
    <div class="form-row">
      <label for="country">Country:</label>
      <input type="text" id="country" name="country" required value="<?php echo $country; ?>">
    </div>
    <div class="form-row">
      <label for="address">Address:</label>
      <textarea id="address" name="address" rows="4" required><?php echo $address; ?></textarea>
    </div>
    <div class="form-row">
      <label for="nic">NIC No:</label>
      <input type="text" id="nic" name="nic" required value="<?php echo $nic; ?>">
      <input type="hidden" value="<?php echo $id?>" name = 'id'>
    </div>
    </div>
    <div class="form-buttons">
      <input type="submit" value="Save">
    </div>
  </form>
</body>
</html>