<?php
require('db_conn.php');

// Check if the user is logged in
if (!isset($_SESSION["email"])) {
    // Redirect to the login page or any other appropriate action
    header("Location: login.php");
    exit;
}

$email = $_SESSION["email"];


// Fetch the image data from the database based on the logged-in user's email
$sql = "SELECT image FROM users_img WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Retrieve the image data from the result
    $row = $result->fetch_assoc();
    $imageData = $row['image'];

    // Generate the Base64 encoded image source
    $imageSrc = 'data:image/jpeg;base64,' . base64_encode($imageData);
} else {
    // Set a default image source if no image found
    $imageSrc = 'path_to_default_avatar.png';
}

// Close the database connection
$conn->close();
?>
<center><img src="<?php echo $imageSrc;?>"  class="rounded-square-avatar" style="  border-radius: 10px;
    border: 2px solid #000;
    width: 150px;
    height: 150px;
    object-fit: cover;"></center>