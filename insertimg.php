<?php

session_start();

// Check if the user is logged in
if (!isset($_SESSION["email"])) {
    // Redirect to the login page or any other appropriate action
    header("Location: login.php");
    exit;
}

// Get the data from the session
$email = $_SESSION["email"];

// Set up the database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "car_haire_hub";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process the form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check if the file upload was successful
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] === UPLOAD_ERR_OK) {
        // Retrieve the image data
        $imageData = file_get_contents($_FILES["image"]["tmp_name"]);

        // Prepare the SQL statement to insert the image into the database
        $stmt = $conn->prepare("INSERT INTO users_img (email, image) VALUES (?, ?)");
        $stmt->bind_param("ss", $email, $imageData);

        // Execute the statement
        if ($stmt->execute()) {
            header("Location: profile.php");
        } else {
            echo "Error uploading image.";
        }

        // Close the statement
        $stmt->close();
    }
}

// Close the database connection
$conn->close();
?>
