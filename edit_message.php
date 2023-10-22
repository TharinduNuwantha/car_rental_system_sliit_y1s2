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

    // Query to retrieve the message by ID
    $sql = "SELECT * FROM customer_message WHERE id = $messageId";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        // Retrieve the message details
        $messageContent = $row['message'];
        
        // Handle form submission for updating the message
        if (isset($_POST['update_message'])) {
            // Get the new message content from the form
            $newMessageContent = $_POST['new_message_content'];

            // Update the message in the database
            $updateSql = "UPDATE customer_message SET message = '$newMessageContent' WHERE id = $messageId";
            if ($conn->query($updateSql) === TRUE) {
                echo "Message updated successfully.";
                echo '<script>window.location.href="view_messages.php";</script>';
            } else {
                echo "Error updating message: " . $conn->error;
            }
        }
    } else {
        echo "Message not found.";
    }
} else {
    echo "Invalid message ID.";
}

// Close the database connection
$conn->close();
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CarHireHub.com</title>
    <link rel="stylesheet" href="assets/css/header_footer.css">
    <link rel="stylesheet" href="css/user.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <title>Edit Message</title>
    <style >
    .centered-box {
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    text-align: center;
    width:600px;
    margin-left: 350px;
    height: 400px;
    margin-top: 100px;
}

.centered-box h2 {
    font-size: 24px;
    margin-bottom: 20px;
}

.centered-box form label {
    display: block;
    margin-top: 10px;
    font-weight: bold;
}

.centered-box form textarea {
    width: 80%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.centered-box form input[type="submit"] {
    background-color: #007BFF;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 20px;
    background-color: #333333;
}
.centered-box form{
    margin-top: 50px;
}

.centered-box form input[type="submit"]:hover {
    background-color: black;
}

    </style>
   
</head>
<body style="background-color: #8A8975">
            <nav>
            
                <div class="nav">
                <div class="left-links">
                    <ul>
                        <li class="active"><a href="#">Home</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">FAQs</a></li>
                    </ul> <!--left-links-->  
                </div>

                <div class="logo">
                    <p>CarHireHub.com</p>
                </div><!-- logo -->

                <div class="top-nav-right-buttons">
                    <a href="#">SIGN IN</a>
                    <button class="register"><a href="userLoggin.php">REGISTER</a></button>
                </div>
                <img src="img/main/bars-50.png" alt="bars" class="bars" id="bars" width="37px" height="37px" >
            </div> 
            
        </nav>

        <!-- top navigation bar End -->

        <!-- mobile nav Start-->

        <div class="mobile-nav" id="mobileNav">
            <div class="mb-nav-box">
                <p class="mobile-nav-logo">CarHireHub.com</p>
                <ul>
                        <li class=""><a href="index.php">Home</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">FAQs</a></li>                    
                        <li><a href="#">SIGN IN</a></li>                    
                        <button class="register"><a href="#">REGISTER</a></button>                  
                </ul>
            </div>
        </div>


       <div class="centered-box" style="margin-top: 100px;">
        <h2>Edit Your Message Here ....</h2>
        <form method="post">
        <label for="new_message_content">New Message Content</label>
        <textarea id="new_message_content" name="new_message_content" rows="4" cols="50"><?php echo $messageContent; ?></textarea>
        <br>
        <input type="submit" name="update_message" value="Update Message">
    </form>
    </div>
           

   

    
    <!-- footer -->
  <footer>
            <div class="footer-content">
                <div class="ft-col-1">
                    <h1>CarHireHub</h1>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. At maiores autem ad reprehenderit magni praesentium similique delectus odit architecto asperiores quisquam, cum iure, consectetur laboriosam recusandae fuga ducimus aliquam quae!</p>
        
                </div>
                <div class="ft-col-2">
                    <p class="title">Luxury Vehicals</p>
                    <ul>
                        <li><a href="#">Toyota Premio</a></li>
                        <li><a href="#">Toyota TRJ 120 Prado</a></li>
                        <li><a href="#">Toyota Avanza 2017</a></li>
                        <li><a href="#">Toyota Avanza 2017</a></li>
                        <li><a href="#">Toyota Hilux Cab</a></li>
                        <li><a href="#">Toyota TRJ 150 Prado</a></li>
                        <li><a href="#">More</a></li>
                    </ul>
                </div>
                <div class="ft-col-3">
                    <p class="title">Mini cars</p>
                    <ul>
                        <li><a href="#">Nissan March</a></li>
                        <li><a href="#">Suzuki japan Alto</a></li>
                    </ul>
                    <p class="title">Vans</p>
                    <ul>
                        <li><a href="#">Suzuki Every Buddy van Auto</a></li>
                    </ul>
                </div>
                <div class="ft-col-4">
                    <p class="title">Standard Vehicle</p>
                    <ul>
                        <li><a href="#">Suzuki Swift</a></li>
                        <li><a href="#">Toyota Vitz</a></li>
                        <li><a href="#">Toyota Avanza</a></li>
                        <li><a href="#">Toyota Allion</a></li>
                        <li><a href="#">Toyota Premio</a></li>
                    </ul>
                </div>
                <div class="ft-col-5">
                    <p class="title">Contact US</p>
                    <ul>
                        <li><strong>Address: </strong>56,Kadawatha Roade, Malabe, Sathara Mawatha</li>
                        <li><strong>TEL: </strong>011 568616</li>
                        <li><strong>Mobile: </strong>0715893934 / 0775893934</li>
                        <li><strong>Email: </strong><a href="#">info@carhurehub.com</a></li>
                    </ul>
                </div>
            </div>
        </footer>
        <div class="forter-bar">
            <p>copyright &copy 2023 carhurehub.com</p>
        </div> 
        <!-- footer Start end-->
        <script src="js/script.js"></script>    
        <script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
        <script src="js/Jqury/jquery.counterup.min.js"></script>
        <script>
              jQuery(document).ready(function($){
                $('.counter').counterUp({
                delay: 10,
                time: 1000
        });
              });  
        </script>
        </body>
        </html>