<?php require_once('inc/connection.php');  ?>
<?php 
// Check if the user is logged in
// if (!isset($_SESSION['email'])) {
//     // Redirect to the login page or any other appropriate action
//     header("Location: login.php");
//     exit;
// }
    session_start();

    if (isset($_SESSION["email"]) && isset($_SESSION['uname'])) {
        $user_Email = $_SESSION["email"];
        $user_namw = $_SESSION["uname"];
    }
    if (isset($_SESSION["seller_ID"])){
        $sellerID = $_SESSION["seller_ID"];
    }
    

?>
<?php 
// $userID = 1;


if (isset($_GET['vehicleID'])) {
    // Retrieve the 'vehicleID' from the URL
    $vehicleID = $_GET['vehicleID'];

    $query = "UPDATE selerhub SET Status = 'Active'  WHERE VehicleID = '{$vehicleID}'";
    $result_set = mysqli_query($connection,$query);
    if($result_set){
        header('Location:approwSeller.php?Active=true');
    }else{
        header('Location:approwSeller.php?Active=false');
    }
}

?>