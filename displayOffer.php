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
<?php
require_once('inc/connection.php');


// $userID = 1;
// $sellerID = 1;


// --------------------- display offer box --------------------

$query = "SELECT * FROM offers ORDER BY currentDate DESC";
$result_set = mysqli_query($connection,$query);
if($result_set){
    if(mysqli_num_rows($result_set) > 0){
        $box = '';
        while ($row = mysqli_fetch_assoc($result_set)){

            $box .= "<div class='offerBox'>";
            $box .= "<div class='heading'><p>Announcement</p><img src='img/main/anows.png' alt='anows' width='40px'></div>";
            $box .= "<div class='title'>{$row['Offer_title']}</div>";
            $box .= "<div class='notice'>{$row['Offer_content']}</div>";
            $box .= "<div class='date'><p>{$row['currentDate']}</p><p>by Admin</p></div>";
            $box .= "</div>";
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
    <link rel="stylesheet" href="css/displayOffer.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>
<body>


<?php include('headder.php'); ?>
        
       
       <br><br><br>

       <!-- --------------- Admon Top Pannel Start --------------------- -->
      <div class="offerPannel">
        <div class="offerBoard">
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