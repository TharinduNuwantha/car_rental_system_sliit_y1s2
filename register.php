<?php
// Define variables and initialize with empty values
$username = $nic = $phoneNumber = $email = $dob = $password = $confirmPassword = "";
$usernameErr = $nicErr = $phoneNumberErr = $emailErr = $dobErr = $passwordErr = $confirmPasswordErr = "";
$registrationSuccess = false;

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and validate form data
    if (empty($_POST["uname"])) {
        $usernameErr = "Username is required";
    } else {
        $username = $_POST["uname"];
    }

    if (empty($_POST["nic"])) {
        $nicErr = "National Identity Number is required";
    } else {
        $nic = $_POST["nic"];
    }

    if (empty($_POST["pnumber"])) {
        $phoneNumberErr = "Phone Number is required";
    } else {
        $phoneNumber = $_POST["pnumber"];
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = $_POST["email"];
    }

    if (empty($_POST["Dob"])) {
        $dobErr = "Date of Birth is required";
    } else {
        $dob = $_POST["Dob"];

        // Convert the date of birth to a timestamp
        $dobTimestamp = strtotime($dob);

        // Get the current timestamp
        $currentTimestamp = time();

        // Calculate the minimum and maximum timestamps based on the age range
        $minTimestamp = strtotime('-85 years', $currentTimestamp);
        $maxTimestamp = strtotime('-15 years', $currentTimestamp);

        // Check if the date of birth is within the allowed range
        if ($dobTimestamp < $minTimestamp || $dobTimestamp > $maxTimestamp) {
            $dobErr = "Date of Birth should be between 15 and 85 years";
        }
    }

  if (empty($_POST["password"])) {
    $passwordErr = "Password is required";
  } else {
    $password = $_POST["password"];

    // Validate password length
    if (strlen($password) < 6) {
        $passwordErr = "Password should be at least 6 characters long";
    }

    // Validate password for at least 2 numbers
    $numCount = preg_match_all("/[0-9]/", $password);
    if ($numCount < 2) {
        $passwordErr = "Password should contain at least 2 numbers";
    }
}


    if (empty($_POST["cpassword"])) {
        $confirmPasswordErr = "Confirm Password is required";
    } else {
        $confirmPassword = $_POST["cpassword"];
    }

    // Check if the password and confirm password match
    if ($password !== $confirmPassword) {
        $confirmPasswordErr = "Password and Confirm Password do not match";
    }

    // Validate the phone number
    if (!preg_match("/^[0-9]{10}$/", $phoneNumber)) {
        $phoneNumberErr = "Phone Number should be a 10-digit number";
    }

    // Validate the NIC
    if (!preg_match("/^[0-9]{12}$/", $nic)) {
        $nicErr = "NIC should be a 12-digit number";
    }

    // If all input fields are valid, proceed with registration
    if (empty($usernameErr) && empty($nicErr) && empty($phoneNumberErr) && empty($emailErr) && empty($dobErr) && empty($passwordErr) && empty($confirmPasswordErr)) {
        // Connect to the database and perform the registration process
        $servername = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $database = "car_haire_hub";

        // Create a new connection
        $conn = new mysqli($servername, $dbUsername, $dbPassword, $database);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Check if the email already exists in the table
        $stmt = $conn->prepare("SELECT email FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $emailErr = "Email already exists";
        }

        // Check if the NIC already exists in the table
        $stmt = $conn->prepare("SELECT nic FROM users WHERE nic = ?");
        $stmt->bind_param("s", $nic);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $nicErr = "NIC already exists";
        }

        // Check if the username already exists in the table
        $stmt = $conn->prepare("SELECT username FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $usernameErr = "Username already exists";
        }

        // If there are no errors, proceed with inserting the user data
        if (empty($emailErr) && empty($nicErr) && empty($usernameErr)) {
            // Prepare and execute the SQL statement to insert the user data into the table
            $stmt = $conn->prepare("INSERT INTO users (username, nic, phone_number, email, dob, password) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssss", $username, $nic, $phoneNumber, $email, $dob, $password);

            if ($stmt->execute()) {
                $registrationSuccess = true;
            }
        }

        // Close the prepared statements
        $stmt->close();

        // Close the database connection
        $conn->close();
    }
}
?>



<!DOCTYPE html>
<html>
<head>
  <title>Registration Page</title>
  <link rel="stylesheet" type="text/css" href="assets/css/registry.css">
  <link rel="stylesheet" type="text/css" href="css/index.php">
  <style>
        .error {
            color: black;
            margin-bottom: 10px;
        }
  </style>
</head>
<body style="background-image: url(assets/img/loginbg.jpg);">

  <div class="container" style=" width: 700px">

    <h2>Registration Form</h2>
    <?php if ($registrationSuccess) : ?>
      <p><center>Registration successful!</center></p>
     <center> <a href="login.php"><button style="background-color: green;color: white;height: 50px;width:100px " >Login now</button></a></center>
    <?php else : ?>
      <form id="registrationForm" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" id="username" name="uname" required>
          <span class="error"><?php echo $usernameErr; ?></span>
        </div>

        <div class="form-group">
          <label for="nic">National Identity Number</label>
          <input type="text" id="nic" name="nic" required>
          <span class="error"><?php echo $nicErr; ?></span>
        </div>

        <div class="form-group">
          <label for="phoneNumber">Phone Number</label>
          <input type="text" id="phoneNumber" name="pnumber" required>
          <span class="error"><?php echo $phoneNumberErr; ?></span>
        </div>

        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" id="email" name="email" required>
          <span class="error"><?php echo $emailErr; ?></span>
        </div>

        <div class="form-group">
          <label for="dob">Date of Birth</label>
          <input type="date" id="dob" name="Dob" required>
          <span class="error"><?php echo $dobErr; ?></span>
        </div>

        <div class="form-group">
          <label for="password">Password:</label>
          <input type="password" id="password" name="password" required>
          <span class="error"><?php echo $passwordErr; ?></span>
        </div>

        <div class="form-group">
          <label for="confirmPassword">Confirm Password:</label>
          <input type="password" id="confirmPassword" name="cpassword" required>
          <span class="error"><?php echo $confirmPasswordErr; ?></span>
        </div>

        <div class="form-group">
        <center><button type="submit" name="register">Register Me</button></center>
        </div>
      </form>
    <?php endif; ?>
    <h5>Do you have a account ? </h5>
     <div class="form-group">
       <center>  <a href="loginpage.php"> <button type="submit" name="loginn">Login now</button></a></center>
        </div>     
         </form>
  </div>
</body>
</html>
