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
<?php require_once('inc/connection.php');  ?>
<?php 
$userID = 1;


if (isset($_GET['offer_ID'])) {
    // Retrieve the 'vehicleID' from the URL
    $offer_ID = $_GET['offer_ID'];

    $query = "DELETE FROM offers WHERE offer_ID  = '{$offer_ID}'";
    $result_set = mysqli_query($connection,$query);
    if($result_set){
        header('Location:admin.php?Delete=true');
    }else{
        header('Location:admin.php?Delete=false');
    }
}

?>