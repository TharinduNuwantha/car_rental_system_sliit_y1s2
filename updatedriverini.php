<?php

include "inc/connection.php";

$message= "The prescription has";

$title = $_POST['title'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$birthday = $_POST['birthday'];
$country = $_POST['country'];
$address = $_POST['address'];
$nic = $_POST['nic'];
$id = $_POST['id'];

    $sql = "SELECT * FROM driverdetails WHERE did= '$id'";

    if (mysqli_query($conn,$sql)){
        $sqlupdate ="UPDATE driverdetails
                    SET title = '$title', fname = '$firstName', lname = '$lastName', email = '$email', phone = '$phone', bday = '$birthday', country = '$country', address = '$address', nic = '$nic'  
                    WHERE did= '$id';";

        if(mysqli_query($conn,$sqlupdate)){
            $message = $message . " Successfully Updated !";
            header("Location: driverdetails.php?error=$message");
        }else{
            $message = $message . " Not Updated !";
            header("Location: updatedriverdetails.php?error=$message&id= $id");
        }
    }else{

    }
    ?>