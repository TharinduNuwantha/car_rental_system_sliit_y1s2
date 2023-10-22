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

// Update user details
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the form data
    $email = $_SESSION['email'];
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

    // Set up the database connection
    $servername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "landsales";

    $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
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

    // Close the database connection
    $conn->close();
}

?>

