
<nav>
            
            <div class="nav">
            <div class="left-links">
                <ul>
                    <li class="active"><a href="index.php">Home</a></li>
                    <li><a href="aboutUs.php">About</a></li>
                    <li><a href="customer_care.html">Contact</a></li>
                    <li><a href="faq.php">FAQs</a></li>
                    <li><a href="displayOffer.php">Offers</a></li>
                </ul> <!--left-links-->  
            </div>

            <div class="logo">
                <p>CarHireHub.com</p>
            </div><!-- logo -->

            <div class="top-nav-right-buttons">
                <?php
                    if (isset($_SESSION["email"])){
                        echo "<a href='profile.php'> Hi ".$_SESSION["uname"]."</a>";
                        echo "<button class='register'><a href='logout.php'>LOGOUT</a></button>";
                        if(isset($_SESSION["seller_ID"])){
                            echo "<button class='register'><a href='sellerDachBord.php'>Seller Hub</a></button>";
                            
                        }

                    }else{
                        echo "<a href='login.php'>SIGN IN</a>";
                        echo "<button class='register'><a href='register.php'>REGISTER</a></button>";
                    }
                
                ?>

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
                    <li class=""><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">FAQs</a></li>                    
                    <li><a href="#">SIGN IN</a></li>                    
                    <button class="register"><a href="#">REGISTER</a></button>                  
            </ul>
        </div>
    </div>

    <!-- mobile nav END -->