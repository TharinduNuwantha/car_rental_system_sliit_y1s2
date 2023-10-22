<?php

include "inc/connection.php";

$title = $_POST['title'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$birthday = $_POST['birthday'];
$country = $_POST['country'];
$address = $_POST['address'];
$nic = $_POST['nic'];

$payment = $_POST['payment'];
$cardNo = $_POST['cardNo'];
$cvc = $_POST['cvc'];
$expiry = $_POST['expiry'];
$VehicleID = $_POST['VehicleID'];
$userid = $_POST['userid'];
$seller_ID = $_POST['seller_ID'];
$price = $_POST['price'];


$sql = "INSERT INTO driverdetails (user_ID, VehicleID, title, fname, lname, email, phone, bday, country, address, nic)
 VALUES ('$userid', '$VehicleID', '$title', '$firstName', '$lastName', '$email', '$phone', '$birthday', '$country', '$address', '$nic')";

$sql2 = "INSERT INTO payments (seller_ID, UserID, Amount, method, cardno, cvc, mmyy)
 VALUES ('$seller_ID', '$userid', '$price', '$payment', '$cardNo', '$cvc', '$expiry')";

if (mysqli_query($connection, $sql) && mysqli_query($connection, $sql2)) {
    header("Location: driverdetails.php");
    exit();
} else {
    echo "Error: " . mysqli_error($connection);
}   

mysqli_close($connection);


?>