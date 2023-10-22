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
// $userID = 1;

if (isset($_GET['vehicleID'])) {
    // Retrieve the 'vehicleID' from the URL
    $vehicle_ID = $_GET['vehicleID'];

    $query = "DELETE FROM selerhub WHERE VehicleID = '{$vehicle_ID}'";
    $result_set = mysqli_query($connection,$query);
    if($result_set){
        header('Location:sellerDachBord.php?Delete=true');
    }else{
        header('Location:sellerDachBord.php?Delete=false');
    }
}

?>