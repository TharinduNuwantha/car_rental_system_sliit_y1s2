<?php require_once('inc/connection.php');  ?>
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
    // $userID = 1;
    // $sellerID = 1;
    $errors = array();
    $query = "SELECT sh.SellerID, sh.VehicleID, u.username, sh.BrandName, sh.Status FROM selerhub sh JOIN seller s ON sh.SellerID = s.seller_ID JOIN users u ON s.user_ID = u.id WHERE sh.Status = 'Pending'";
    $table = '';
    $result_set = mysqli_query($connection,$query);
    if(mysqli_num_rows($result_set) > 0){
        while ($row = mysqli_fetch_assoc($result_set)){
            $table .= "<tr>";
            $table .= "<td>{$row['SellerID']}</td>";
            $table .= "<td>{$row['username']}</td>";
            $table .= "<td>{$row['BrandName']}</td>";
            $table .= "<td><a href=\"approwSellerPermisn.php?vehicleID={$row['VehicleID']}\"><button class=\"dell\">Approve</button></a></td>";
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
            <table>
                <tr>
                    <th>Seller ID</th>
                    <th>Seller Name</th>
                    <th>Brand Name</th>
                    <th>Approw</th>
                  
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
        // Function to validate image files
        function validateImage(input) {
            var fileInput = document.getElementById(input.id);
            var file = fileInput.files[0];
            
            if (!file) {
                alert('Please select an image file.');
                return;
            }

            // Check for file type
            if (!file.type.startsWith('image/')) {
                alert('Please select an image file (e.g., JPEG, PNG, GIF).');
                fileInput.value = ''; // Reset the input field
                return;
            }

            // You can perform further actions with the valid image file here.
        }

        // Add event listeners to the file input elements
        document.getElementById('inc_f').addEventListener('change', function() {
            validateImage(this);
        });

        document.getElementById('inc_b').addEventListener('change', function() {
            validateImage(this);
        });


        //---------- year picker --------------------------
        const startYear = 1900;
    const endYear = new Date().getFullYear();
    const yearPicker = document.getElementById("year_picker");

    for (let year = endYear; year >= startYear; year--) {
        const option = document.createElement("option");
        option.text = year;
        option.value = year;
        yearPicker.appendChild(option); 
    }
    </script>
    </body>
    </html>