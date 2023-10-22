<?php 
    session_start();
    // Check if the user is logged in
if (!isset($_SESSION['email'])) {
    // Redirect to the login page or any other appropriate action
    header("Location: login.php");
    exit;
}

   
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
    // $sellerID = 1;
    $errors = array();
    $query = "SELECT * FROM selerhub WHERE SellerID = '{$sellerID}'";
    $table = '';
    $result_set = mysqli_query($connection,$query);
    if(mysqli_num_rows($result_set) > 0){
        while ($row = mysqli_fetch_assoc($result_set)){
            $table .= "<tr>";
            $table .= "<td>{$row['VehicleID']}</td>";
            $table .= "<td>{$row['BrandName']}</td>";
            $table .= "<td><a href=\"editVehicle.php?vehicleID={$row['VehicleID']}\"><button class=\"rdt\">Edit</button></a></td>";
            $table .= "<td><a href=\"deleteVehicle.php?vehicleID={$row['VehicleID']}\"><button class=\"dell\">Delete</button></a></td>";
            $table .= "</tr>";
        } 
    }else{
        $errors[] = 'Data showing error';
    }


 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CarHireHub.com</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/sellerDachBord.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css" integrity="sha512-HXXR0l2yMwHDrDyxJbrMD9eLvPe3z3qL3PPeozNTsiHJEENxx8DH2CxmV05iwG0dwoz5n4gQZQyYLUNt1Wdgfg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .user-loggin-container .userlogging-from form span p{
            font-size: 15px;
        }
    </style>

</head>
<body>


        <!-- top navigation bar start -->
        <?php include('headder.php'); ?>
        
       <!-------- user table -------------  -->
       <br><br><br>

    <div class="cover-container">
        <div class="table">

            <div class="newUpBtn">
                <a href="uploardVehicle.php"><button>Add Vehicals</button></a>
            </div>
            <table>
                <tr>
                    <th>Vehicle ID</th>
                    <th>vehicle Name</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>

                <?php echo $table; ?>
            </table>
        </div>
    </div>

       <!-------- user login form end -------------  -->

    <!-- footer Start -->
   
    <?php include('footer.php'); ?>

    <!-- footer Start end-->
    <script src="js/script.js"></script>    
    <script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
    <script src="js/Jqury/jquery.counterup.min.js"></script>
    <script>
    
    </script>
    </body>
    </html>