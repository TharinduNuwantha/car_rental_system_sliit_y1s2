<?php 
    session_start();
    // Check if the user is logged in

    // Check if the user is logged in
if (!isset($_SESSION['email'])) {
    // Redirect to the login page or any other appropriate action
    header("Location: login.php");
    exit;
}

    // Check if the user is not logged in
    if (isset($_SESSION["email"]) && isset($_SESSION['uname'])) {
        $user_Email = $_SESSION["email"];
        $user_namw = $_SESSION["uname"];
    }
    if (isset($_SESSION["seller_ID"])){
        $sellerID = $_SESSION["seller_ID"];
    }
    $userID = $_SESSION["id"];

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

    <title>Customer Care Page</title>
   
</head>
<body style="background-color: #8A8975">
  <?php include('headder.php'); ?>


   

<div style="width: 700px; height: 400px ; background-color:transparent ;margin-top: 200px ; margin-left: 300px">

    <center><div class="title_main" style="margin-bottom: 50px;"> <h1><b> Messages </b></h1></div></center>

  <center><?php include('get_messages.php'); ?></center>
</div>

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