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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CarHireHub.com</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>
<body>


        <!-- top navigation bar start -->
        <?php include('headder.php'); ?>
        
       
       <br><br><br>


    <div class="banner">
        <div class="banner-hedding">
            <h1>Find Your Ideal Car From  500+ Cars</h1>
        </div>

        <div class="banner-search">

            <div class="search-box-cover">
                <div class="srach-box-top">
                    <p class="active">Pick up My Vehicle</p>
                    <p>Deliver My Vehicle</p>
                </div>
                <div class="search-box">
                    <input type="text" placeholder="enter district,Street,ect..">
                </div>
            </div>

            <div class="banner-date">
                <input type="date">
            </div>

            <div class="banner-button">
                <button>Search</button>
            </div>
        </div>

        <div class="text-banner">
            <h2>Sri Lanka's biggest online car rental service</h2>
            <p>Welcome to our Sri Lankan car rental service! Explore the beauty of Sri Lanka with ease and convenience. Rent a car for your adventures with us.</p>
            <div class="txt-bner-buttons">
                <button>Book Your Car</button>
                <button>Fiend Out More</button>
            </div>
        </div><!--text-banner-->
    </div>

    <div class="container">    
        <div class="body-content">
            <!-- <div class="search-box">
                <input type="text" placeholder="Check Your Vehical">
            </div><br> -->
<!-- ------------------ Featured Vehical ------------------ -->

            <div class="home-items">
                <span class="Heading">Featured Vehical</span>
                <div class="home-item-list">


                <div class="row">
                        <div class="left">
                            <img src="img/main/car2.png" alt="" width="200px">
                            <p>Experience travel in style and comfort with our luxury airport transfer service. Our fleet of high-end vehicles and professional drivers ensure a seamless journey to and from the airport. Whether you're a business traveler or a tourist, enjoy a stress-free and luxurious ride, complete with personalized service.</p>
                        </div>

                        <div class="right">
                            <div class="nums">
                                <p>Rs 4500</p>
                                <p>Qty 1</p>
                            </div>
                            <div class="buttns">
                                <a href="addpayment.php"><button>Order Now</button></a>
                                <a href="addpayment.php"><button>Remind Now</button></a>
                                <a href="addpayment.php"><button>Add to cart</button></a>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="left">
                            <img src="img/items/car1.jpg" alt="" width="200px">
                            <p>Need a quick and budget-friendly ride around the city? Our affordable city taxi service has you covered. With a wide range of vehicles, we offer reliable transportation at competitive rates. Whether it's a short commute, a shopping trip, or a night out, our taxis are at your service, making city travel hassle-free.</p>
                        </div>

                        <div class="right">
                            <div class="nums">
                                <p>Rs 4500</p>
                                <p>Qty 1</p>
                            </div>
                            <div class="buttns">
                                <a href="addpayment.php"><button>Order Now</button></a>
                                <a href="addpayment.php"><button>Remind Now</button></a>
                                <a href="addpayment.php"><button>Add to cart</button></a>
                            </div>
                        </div>
                    </div>

                    
                </div>
            </div>
        </div>   <!-- body-content -->

        <!-- ------------Featured Vehical End ------------------ -->

        <!-- ------------- Featured Vehical supper bar start ------  -->
        <!-- 
        <div class="fv-container">
            <div class="fv-grid">
                <div class="item imgbox"><img src="img/items/car1.jpg" alt="" width="200px"></div>
                <div class="item imgDis"><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt sapiente soluta incidunt accusamus obcaecati officiis harum sequi. Fugiat explicabo illo sunt voluptatem, nostrum adipisci minima blanditiis dicta, dolorum omnis aspernatur.</p></div>
                <div class="item imgPrice">
                    <div class="num">
                        <p class="price">Rs6555</p><p>Qty 1</p>
                    </div>
                    <div class="buttons">
                            <button>Order Now</button>
                            <button>Remind Now</button>
                            <button>Add to cart</button>
                    </div>
                </div>

            </div>
        </div> -->
        <!-- ------------- Featured Vehical supper bar END ------  -->

    <!-- ------------ Second bar start ------------- -->
    <div class="secon-bar">
        <div class="bar">
            <button class="main-buttons">View more</button>
            <span>
                <p>Welcome to our Sri Lankan car rental service! Explore the beauty of Sri Lanka with ease and convenience. Rent a car for your adventures with us.</p>
                
            </span>
        </div>
    </div><!--secon-bar-->
    <!-- ------------ Second bar End ------------- -->

    <div class="profiels">
        
        <div class="profile-cover">
            <div class="profile-one inside-profile">
                <img src="img/main/user-png-33856.png" alt="">
                <span><h2><strong><p class="counter">700+</p></strong> Visitors</h2></span>
            </div>
            <div class="profile-two inside-profile">
                <img src="img/main/—Pngtree—group icon design vector_5000651.png" alt="">
                <span><h2><strong><p class="counter">700+</p></strong> Verified Sellers</h2></span>
            </div>
            <div class="profile-three inside-profile">
                <img src="img/main/pngwing.com (6).png" alt="">
                <span><h2><strong> 700+</strong> Vehicle islandewind</h2></span>
            </div>
            <div class="profile-fore inside-profile">
                <img src="img/main/Lovepik_com-401498818-car-icon-free-vector-illustration-material.png" alt="">

                <span><h2>Best Condition Vehicles</h2></span>
            </div>
        </div>
    </div>

       
    </div> <!--container -->

    <!-- footer Start -->
    <?php include('footer.php'); ?>

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