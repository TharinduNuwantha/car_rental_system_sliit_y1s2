<?php require_once('inc/connection.php');  
$vehicle_ID = 1;
$seller_ID = 1;
$userid = 1;
$price = 1000;
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="./styles/styles.css">
  <link rel="stylesheet" type="text/css" href="./styles/dashstyle.css">
  <link rel="stylesheet" type="text/css" href="./css/style.css">
</head>
<body>

    <!-- Navbar -->
    <div class="navbar">
        <a href="addpayment.php">Add Payment</a>
        <a href="viewpayments.php">View payments</a>
        <a href="driverdetails.php">View Drivers</a>
    </div>
    <br>
  <h1 style="text-align: center;">Driver Details Form</h1><br>
  <form  action="addpaymentini.php" method="post">
    <div class="form-row">
      <label for="title">Title:</label>
      <select id="title" name="title">
        <option value="Mr">Mr</option>
        <option value="Mrs">Mrs</option>
        <option value="Miss">Miss</option>
      </select>
    </div>
    <div class="form-row">
      <label for="firstName">First Name:</label>
      <input type="text" id="firstName" name="firstName">
    </div>
    <div class="form-row">
      <label for="lastName">Last Name:</label>
      <input type="text" id="lastName" name="lastName">
    </div>
    <div class="form-row">
      <label for="email">Email:</label>
      <input type="email" id="email" name="email">
    </div>
    <div class="form-row">
      <label for="phone">Phone Number:</label>
      <input type="tel" id="phone" name="phone">
    </div>
    <div class="form-row">
      <label for="birthday">Birthday:</label>
      <input type="date" id="birthday" name="birthday">
    </div>
    <div class="form-row">
      <label for="country">Country:</label>
      <input type="text" id="country" name="country">
    </div>
    <div class="form-row">
      <label for="address">Address:</label>
      <textarea id="address" name="address" rows="4"></textarea>
    </div>
    <div class="form-row">
      <label for="nic">NIC No:</label>
      <input type="text" id="nic" name="nic">
    </div>
    <div class="form-row">
      <label>Payment Method:</label>
      <div class="payment-method">
        <input type="radio" id="visa" name="payment" value="visa">
        <label for="visa">Visa</label>
        <input type="radio" id="mastercard" name="payment" value="mastercard">
        <label for="mastercard">Mastercard</label>
      </div>
    </div>
    <div class="form-row card-details">
      <label for="cardNo">Card Number:</label>
      <input type="text" id="cardNo" name="cardNo">
    </div>
    <div class="form-row card-details">
      <label for="cvc">CVC:</label>
      <input type="text" id="cvc" name="cvc">
      <label for="expiry">Expiration (MM/YY):</label>
      <input type="text" id="expiry" name="expiry">
      <input type="hidden" value="<?php echo $vehicle_ID?>" name="VehicleID">
      <input type="hidden" value="<?php echo $userid?>" name="userid">
      <input type="hidden" value="<?php echo $seller_ID?>" name="seller_ID">
      <input type="hidden" value="<?php echo $price?>" name="price">
    </div>
    <div class="form-buttons">
      <input type="submit" value="Submit">
      <input type="reset" value="Cancel">
    </div>
  </form>

</body>
</html>

