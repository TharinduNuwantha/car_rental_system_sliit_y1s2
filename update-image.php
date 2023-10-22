<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION["email"])) {
  // Redirect to the login page or any other appropriate action
  header("Location: login.php");
  exit;
}

// Set up the database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "landsales";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Process the form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Check if the file upload was successful
  if (isset($_FILES["newImage"]) && $_FILES["newImage"]["error"] === UPLOAD_ERR_OK) {
    // Retrieve the new image data
    $newImageData = file_get_contents($_FILES["newImage"]["tmp_name"]);

    // Update the image data in the database for the corresponding user
    $email = $_SESSION["email"];
    $stmt = $conn->prepare("UPDATE users_img SET image = ? WHERE email = ?");
    $stmt->bind_param("ss", $newImageData, $email);

    // Execute the statement
    if ($stmt->execute()) {
     header("Location: profile.php");
    } else {
      echo "Error updating image.";
    }

    // Close the statement
    $stmt->close();
  }
}

// Close the database connection
$conn->close();
?>
