<?php 
    session_start();

    // Check if the user is not logged in
    if (isset($_SESSION["email"]) && isset($_SESSION['uname'])) {
        $user_Email = $_SESSION["email"];
        $user_namw = $_SESSION["uname"];
    }
    if (isset($_SESSION["seller_ID"])){
        $sellerID = $_SESSION["seller_ID"];
    }
    

?>
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

if (isset($_GET['id'])) {
    $messageId = $_GET['id'];

    // Perform the delete operation based on $messageId (ensure you sanitize the input)
    $sql = "DELETE FROM customer_message WHERE id = $messageId";

    if ($conn->query($sql) === TRUE) {
        // Deleted successfully
        echo '<script>alert("Message deleted successfully !.");</script>';
        header("Location: view_messages.php"); // Redirect back to messages table
        exit();
    } else {
        // Deletion failed
        echo "Error deleting message: " . $conn->error;
    }
} else {
    echo "Invalid message ID.";
}

// Close the database connection
$conn->close();
?>
