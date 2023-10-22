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

// Query to retrieve messages from the database
$sql = "SELECT * FROM customer_message";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table style='border-collapse: collapse; border: 2px solid black; width: 80%;'>";
    echo "<tr><th style='border: 2px solid black;'>ID</th><th style='border: 2px solid black;'>First Name</th><th style='border: 2px solid black;'>Last Name</th><th style='border: 2px solid black;'>Email</th><th style='border: 2px solid black;'>Message</th><th style='border: 2px solid black;'>Modify</th></tr>";
    
    while ($row = $result->fetch_assoc()) {
        $messageId = $row['id'];
        $firstName = $row["firstname"];
        $lastName = $row["lastname"];
        $userEmail = $row["email"];
        $messageContent = $row["message"];
        
        echo "<tr style='border: 2px solid black;'>";
        echo "<td style='border: 2px solid black;'>$messageId</td>";
        echo "<td style='border: 2px solid black;'>$firstName</td>";
        echo "<td style='border: 2px solid black;'>$lastName</td>";
        echo "<td style='border: 2px solid black;'>$userEmail</td>";
        echo "<td style='border: 2px solid black;'>$messageContent</td>";
        echo "<td style='border: 2px solid black;'><a href='edit_message.php?id=$messageId'>Edit</a></td>"; // Edit link
        echo "<td style='border: 2px solid black;'><a href='delete_message.php?id=$messageId'>Delete</a></td>"; // Delete link
        echo "</tr>";
    }
    
    echo "</table>";
    echo "</div>";
} else {
    echo "No messages found.";
}

// Close the database connection
$conn->close();
?>