<?php 
    session_start();
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
    

?>
<?php
require_once('inc/connection.php');
    

// $userID = 1;
// $sellerID = 1;

$offer_code = '';
$offer_title = '';
$offer_content = '';
$offerType = '';
$currentDate = '';

/* ------------------- display old data *********************/
if (isset($_GET['offer_ID'])) {
    // Retrieve the 'vehicleID' from the URL
    $offer_ID = $_GET['offer_ID'];
}


$query = "SELECT * FROM offers WHERE offer_ID = '{$offer_ID}' LIMIT 1";
$result_set = mysqli_query($connection,$query);
if($result_set){
    if(mysqli_num_rows($result_set) == 1){
        $result = mysqli_fetch_assoc($result_set);

        $offer_code =$result['offer_code'];
        $offer_title =$result['Offer_title'];
        $offer_content =$result['Offer_content'];
        $offerType =$result['Offer_type'];
        $currentDate =$result['currentDate'];
    }
}

/* ------------------- display old data *********************/



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

        $query = "UPDATE offers SET Offer_title='{$offer_title}',Offer_content = '{$offer_content}',Offer_type='{$offerType}',offer_code='{$offer_code}' WHERE offer_ID = '{$offer_ID}'";

        $result_set = mysqli_query($connection, $query);

        if ($result_set) {
            header('Location: admin.php?EDT_Offer=true');
            exit;
        } else {
            $errors[] = 'Failed to add a new Offer Post';
        }
    }
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

        <!-- mobile nav END -->
        
       
       <br><br><br>



       <!-- ------------ offer form ---------------------------- -->
       <div class="offers">
        <div class="offer-form">
            <form action="adminEdit.php?offer_ID=<?php echo $offer_ID ?>" method="post">

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
                    <input type="text" name="offer_code" id="offer-id" <?php echo 'value="' . $offer_code . '"'; ?>>
                </span>
                <span>
                    <p>Offer Title</p>
                </span>
                <span>
                    <input type="text" name="offer_title" id="offer-title" placeholder="title" <?php echo 'value="' . $offer_title . '"'; ?>>
                </span>
                <span>
                    <p>Offer Type</p>
                    <select name="offerType" id="offerType" <?php echo 'value="' . $offerType . '"'; ?>>
                        <option value="Discounts and Promotions">Discounts and Promotions</option>
                        <option value="Trade-In Deals">Trade-In Deals</option>
                        <option value="Package Deals">Package Deals</option>
                    </select>
                </span>
                <span>
                    <p>Offer Content</p>
                </span>
                <span>
                <textarea name="offer_content" id="offer-content"><?php echo htmlspecialchars($offer_content); ?></textarea>

                </span>
                <span>
                    <button type="submit" name="post">POST</button>
                </span>

            </form>
        </div>
       </div>
       <!-- ------------ offer form ---------------------------- -->
<br><br>


  
<?php include('footer.php'); ?>
<!-- footer Start end-->
<script src="js/script.js"></script>    
<script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
<script src="js/Jqury/jquery.counterup.min.js"></script>
<script>

</script>
</body>
</html>