<?php

session_start();

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    // Redirect to the login page or any other appropriate action
    header("Location: login.php");
    exit;
}

// Define variables and initialize with empty values
$username = $Nic = $phoneNumber = $email = $dob = "";
$usernameErr = $NicErr = $phoneNumberErr = $emailErr = $dobErr = "";

// Set up the database connection
$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "car_haire_hub";

$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the user data from the database
$email = $_SESSION['email'];
$sql = "SELECT * FROM users WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // User found, retrieve the data
    $row = $result->fetch_assoc();
    $username = $row['username'];
    $Nic = $row['nic'];
    $phoneNumber = $row['phone_number'];
    $dob = $row['dob'];
} else {
    echo "User not found.";
    exit;
}

// Update user details
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the form data
    $username = $_POST['uname'];
    $Nic = $_POST['Nic'];
    $phoneNumber = $_POST['pnumber'];
    $dob = $_POST['dob'];

    // Validate phone number length
    if (strlen($phoneNumber) !== 10) {
        $phoneNumberErr = "Phone number should be exactly 10 digits.";
    }

    // Calculate the date range for allowed date of birth
    $currentDate = date('Y-m-d');
    $minDate = date('Y-m-d', strtotime('-80 years', strtotime($currentDate)));
    $maxDate = date('Y-m-d', strtotime('-15 years', strtotime($currentDate)));

    // Validate date of birth range
    if ($dob < $minDate || $dob > $maxDate) {
        $dobErr = "Date of birth should be between 15 and 80 years.";
    }

    // Check if the username already exists
    $checkUsernameQuery = "SELECT * FROM users WHERE username = '$username' AND email != '$email'";
    $checkUsernameResult = $conn->query($checkUsernameQuery);
    if ($checkUsernameResult->num_rows > 0) {
        $usernameErr = "Username already exists. Please choose a different username.";
    }

    // Prepare and execute the SQL update query if there are no errors
    if (empty($usernameErr) && empty($phoneNumberErr) && empty($dobErr)) {
        $sql = "UPDATE users SET username = '$username', nic = '$Nic', phone_number = '$phoneNumber', dob = '$dob' WHERE email = '$email'";

        if ($conn->query($sql) === TRUE) {
            // Redirect to the profile page or any other appropriate action
            header("Location: profile.php");
            exit;
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }
}

// Close the database connection
$conn->close();

?>


<!DOCTYPE html>
<html>
<head>
  <title>Edit profile</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="assets/css/profile.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<?php include('headder.php'); ?><br><br><br>
<div class="sidebar" style="background-color: grey;">
    <?php include 'displayimg.php'; ?>
  <form action="update-image.php" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <center><label for="image"><?php echo $username; ?></label></center>
          <div class="form-group">
        <button type="submit" name="submit">Change my Photo</button>
      </div>
        <input type="file" id="image" name="newImage" style="width: 180px ; background-color: green;" >
      </div>
    </form>
  <a class="active" href="index.php">Home</a>
  <a href="logout.php">Logout</a>
</div>

<div class="content" style="background-image: url(assets/img/loginbg.jpg);">
  <div class="container">
    <h2><u>Welcome <?php echo $username; ?> !</u></h2>
    <h3>Update your details here </h3>
 <form id="updateForm" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" id="username" name="uname" value="<?php echo $username; ?>" required>
        <span class="error"><?php echo $usernameErr; ?></span>
    </div>

    <div class="form-group">
        <label for="nic">National Identity Number</label>
        <input type="text" id="nic" name="Nic" value="<?php echo $Nic; ?>" readonly>
        <span class="error"><?php echo $NicErr; ?></span>
    </div>

    <div class="form-group">
        <label for="phoneNumber">Phone Number</label>
        <input type="text" id="phoneNumber" name="pnumber" value="<?php echo $phoneNumber; ?>" required>
        <span class="error"><?php echo $phoneNumberErr; ?></span>
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="<?php echo $email; ?>" readonly>
        <span class="error"><?php echo $emailErr; ?></span>
    </div>

    <div class="form-group">
        <label for="dob">Date of Birth</label>
        <input type="date" id="dob" name="dob" value="<?php echo $dob; ?>" required>
        <span class="error"><?php echo $dobErr; ?></span>
    </div>

    <div class="form-group">
        <button type="submit" name="update">Update Details</button>
    </div>
</form>

  <div class="form-group">
      <form action="redirect.php" method="post">
       <button type="submit" name="back">Back</button>
      </form>

      </div>
  </div>
</div>

</body>
</html>
