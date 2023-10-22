<?php
// Database connection parameters
$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "car_haire_hub";

// Create a new connection
$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Insert data into the database (example table name: 'feedback')
    $sql = "INSERT INTO customer_message (firstname, lastname, email, message) VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $firstname, $lastname, $email, $message);

    if ($stmt->execute()) {
        // Data inserted successfully
        echo '<script>alert("Message added successfully !.");</script>';
       echo '<script>window.location.href="view_messages.php";</script>';


        // Redirect to a success page
    } else {
        // Insertion failed
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
