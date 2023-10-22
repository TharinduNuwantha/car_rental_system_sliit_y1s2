<?php 
    session_start();
    require_once('inc/connection.php');

    if (!isset($_SESSION['admin_user_name'])) {
        // Redirect to the login page or any other appropriate action
        header("Location: adminLoggin.php");
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

    $panding_AD_con = 0;
    $query = "SELECT * FROM selerhub WHERE Status = 'Pending'";
    $result_set = mysqli_query($connection,$query);
    if($result_set){
        $panding_AD_con = mysqli_num_rows($result_set);
    }

    $user_count = 0;
    $query = "SELECT * FROM users";
    $result_set = mysqli_query($connection,$query);
    if($result_set){
        $user_count = mysqli_num_rows($result_set);
    }

    $seller_count = 0;
    $query = "SELECT * FROM seller";
    $result_set = mysqli_query($connection,$query);
    if($result_set){
        $seller_count = mysqli_num_rows($result_set);
    }

    $vehicle_count = 0;
    $query = "SELECT * FROM selerhub";
    $result_set = mysqli_query($connection,$query);
    if($result_set){
        $vehicle_count = mysqli_num_rows($result_set);
    }


    

?>
<?php



// $userID = 1;
// $sellerID = 1;


$offer_code = '';
$offer_title = '';
$offer_content = '';
$offerType = '';

if (isset($_POST['post'])) {
    $errors = array();
    $req_fields = array(
        'offer_code',
        'offer_title',
        'offer_content',
        'offerType'
    );

    foreach ($req_fields as $field) {
        if (empty(trim($_POST[$field]))) {
            $errors[] = $field . ' is required.';
        }
    }

    if (empty($errors)) {
        $offer_code = mysqli_real_escape_string($connection, $_POST['offer_code']);
        $offer_title = mysqli_real_escape_string($connection, $_POST['offer_title']);
        $offer_content = mysqli_real_escape_string($connection, $_POST['offer_content']);
        $offerType = mysqli_real_escape_string($connection, $_POST['offerType']);
        $currentDate = date("Y-m-d");

        $query = "INSERT INTO offers (Offer_title, Offer_content, Offer_type, offer_code,currentDate) VALUES ('$offer_title', '$offer_content', '$offerType', '$offer_code','{$currentDate}')";

        $result_set = mysqli_query($connection, $query);

        if ($result_set) {
            header('Location: admin.php?addOffer=true');
            exit;
        } else {
            $errors[] = 'Failed to add a new Offer Post';
        }
    }
}

// --------------------- display offer box --------------------

$query = "SELECT * FROM offers ORDER BY currentDate DESC";
$result_set = mysqli_query($connection,$query);
if($result_set){
    if(mysqli_num_rows($result_set) > 0){
        $box = '';
        while ($row = mysqli_fetch_assoc($result_set)){
            $box .= "<div class='offer-box'>";
            $box .= "<div class='title'>{$row['Offer_title']}</div>";
            $box .= "<div class='date'>{$row['currentDate']}</div>";
            $box .= "<div class='of-content'>{$row['Offer_content']}</div>";
            $box .= "<div class='buttons'>";
            $box .= "<a href=\"adminEdit.php?offer_ID={$row['offer_ID']}\"><button>EDITE</button></a>";
            $box .= "<a href='deleteoffer.php?offer_ID={$row['offer_ID']}'><button class='del'>DELETE</button></a>";
            $box .= "</div></div>";
        }   
    }
}else{
    echo "SQL query error";
}
?>

<!DOCTYPE html> 
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CarHireHub.com</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/admin.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>
<body>


        <!-- top navigation bar start -->

        <?php include('headder.php'); ?>
        
       
       <br><br><br>

       <!-- --------------- Admon Top Pannel Start --------------------- -->
      <div class="top-pannel-main"> 
       <div class="top-pannel">
        


            <a href="approwSeller.php"> <div class="pannel-box">
                <div class="number-row"><div class="nm"><p><?php echo $panding_AD_con; ?></p></div></div>
                <div class="img-row">
                    <img src="img/main/nweAdd.png" alt="">
                </div>
                <span>
                    <p>pending Ads for approval</p>
                </span>
            </div></a>

            <div class="pannel-box">
                <div class="number-row"><div class="nm nm1"><p><?php echo $user_count; ?></p></div></div>
                <div class="img-row">
                    <img src="img/main/adminUser (1).png" alt="">
                </div>
                <span>
                    <p>Registered Users</p>
                </span>
            </div>


            <div class="pannel-box">
                <div class="number-row"><div class="nm nm1"><p><?php echo $seller_count; ?></p></div></div>
                <div class="img-row">
                    <img src="img/main/adminSeller.png" alt="">
                </div>
                <span>
                    <p>registered Sellers</p>
                </span>
            </div>

            <div class="pannel-box">
                <div class="number-row"><div class="nm nm1"><p><?php echo $vehicle_count; ?></p></div></div>
                <div class="img-row">
                    <img src="img/main/adminCar.png" alt="">
                </div>
                <span>
                    <p>registered Vehicals</p>
                </span>
            </div>
       </div>
       </div> 
       <!-- --------------- Admon Top Pannel END --------------------- -->

       <!-- ------------ offer form ---------------------------- -->
       <div class="offers">
        <div class="offer-form">
            <form action="admin.php" method="post">

                <span>
                    <div class="form-name"><p>Create Offer</p></div>
                    
                </span>
                <span>
                <?php
                    if(!empty($errors)){
                        echo '<div class="errors">';
                        echo '<p>There ware error(s) on your form</p><ul>';
                        foreach ($errors as  $error) {
                            echo '<li> --> '.$error.'</li>';
                        }
                        echo '<ul></div>';
                    }
                ?>
                </span>
                <span>
                    <p>Offer Code</p>
                </span>
                <span>
                    <input type="text" name="offer_code" id="offer-id">
                </span>
                <span>
                    <p>Offer Title</p>
                </span>
                <span>
                    <input type="text" name="offer_title" id="offer-title" placeholder="title">
                </span>
                <span>
                    <p>Offer Type</p>
                    <select name="offerType" id="offerType">
                        <option value="Discounts and Promotions">Discounts and Promotions</option>
                        <option value="Trade-In Deals">Trade-In Deals</option>
                        <option value="Package Deals">Package Deals</option>
                    </select>
                </span>
                <span>
                    <p>Offer Content</p>
                </span>
                <span>
                    <textarea name="offer_content" id="offer-content" ></textarea>
                </span>
                <span>
                    <button type="submit" name="post">POST</button>
                </span>

            </form>
        </div>
       </div>
       <!-- ------------ offer form ---------------------------- -->
<br><br>
       <!-- ---------------------------posted offer- --------------->
       <div class="ps-offer-main">
         <div class="ps-offer">
                <?php echo $box; ?>

         </div>
       </div>
       <!-- ---------------------------posted offer- --------------->

  
       <?php include('footer.php'); ?>
<!-- footer Start end-->
<script src="js/script.js"></script>    
<script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
<script src="js/Jqury/jquery.counterup.min.js"></script>
<script>

</script>
</body>
</html>