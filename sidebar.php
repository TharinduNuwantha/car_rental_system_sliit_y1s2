<?php
function displaySidebar($username) {
    echo '<div class="sidebar" style="background-color: grey;">';
    echo '<form method="post">';
    include 'displayimg.php';
    echo '</form>';
    echo '<form action="insertimg.php" method="post" enctype="multipart/form-data">';
    echo '<div class="form-group">';
    echo '<center><label for="image">' . $username . '</label></center>';
    echo '<div class="form-group">';
    echo '<button type="submit" name="submit">Upload Image</button>';
    echo '</div>';
    echo '<input type="file" id="image" name="image" style="width: 180px ; background-color: green;">';
    echo '</div>';
    echo '</form>';
    echo '<a class="active" href="index.php">Home</a>';
    echo '<a href="logout.php">Logout</a>';
    echo '</div>';
}

// Call the function to display the sidebar
displaySidebar($username);
?>
