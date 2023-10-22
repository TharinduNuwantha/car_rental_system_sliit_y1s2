<?php
session_start();

// Check if the user is not logged in
if (!isset($_SESSION["email"])) {
    // Redirect to the login page or any other appropriate action
    header("Location: login.php");
    exit;
}

// Get the user details from the session or database
$email = $_SESSION["email"];

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "car_haire_hub";

// Create a new connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and execute the SQL statement to fetch user details based on the email
$stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();

// Fetch the result
$result = $stmt->get_result();

// Check if the user exists
if ($result->num_rows == 1) {
    // User exists, fetch the details
    $row = $result->fetch_assoc();
    $username = $row["username"];
    $nic = $row["nic"];
    $phoneNumber = $row["phone_number"];
    $dateOfBirth = $row["dob"];
    $email = $row["email"];
} else {
    // User not found, handle accordingly
    // Redirect, display an error message, or take any other appropriate action
    header("Location: error.php");
    exit;
}

// Close the prepared statement
$stmt->close();

// Close the database connection
$conn->close();
?>
