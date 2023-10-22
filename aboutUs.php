<?php 
    session_start();
    // Check if the user is logged in
if (!isset($_SESSION['email'])) {
    // Redirect to the login page or any other appropriate action
    header("Location: login.php");
    exit;
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CarHireHub.com</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 100px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            text-align: center;
        }
        h1 {
            color: #333;
        }
        .container p {
            color: #666;
            font-size: 18px;
        }
    </style>
</head>
<body>


        <!-- top navigation bar start -->

        <?php include('headder.php'); ?>
        
       
       <br><br><br>


       <div class="container">
        <h1>About Our Car Rental Service</h1>
        <p>Welcome to our car rental service in Sri Lanka. We are dedicated to providing you with the best car rental experience, whether you're a local resident or a tourist visiting our beautiful island.</p>
        <p>Our mission is to offer top-quality vehicles at competitive prices, ensuring your convenience and satisfaction. We have a wide range of cars to choose from, including compact cars, SUVs, and luxury vehicles.</p>
        <p>Our team is committed to making your journey smooth and enjoyable. We provide excellent customer service and flexible rental options to meet your needs, be it for a short trip or an extended stay.</p>
        <p>Thank you for choosing our car rental service. We look forward to serving you and making your travel experience in Sri Lanka unforgettable.</p>
    </div>

    <!-- footer Start -->
   
    <?php include('footer.php'); ?>

</body>
</html>