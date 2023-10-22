<?php 
    session_start();
    // Check if the user is logged in

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
    $userID = $_SESSION["id"];

?>
<?php require_once('inc/connection.php'); 


// Check if the user is not logged in
if (!isset($_SESSION["email"]) ) {
    // Redirect to the login page or any other appropriate action
    header("Location: login.php");
    exit;
}else{
    $sellerEmail = $_SESSION["email"];
    if (isset($_SESSION["id"])){
        $userID = $_SESSION["id"];
    }
}

?>

<?php 
    // $userID = 1;

    //main variables
    $bank_name = '';
    $acc_hol_name ='';
    $acc_number = '';
    $inc_f ='';
    $inc_b = '';

    // user click submit button
    if(isset($_POST['login'])){


        $bank_name = $_POST['bank_name'];
        $acc_hol_name = $_POST['acc_hol_name'];
        $acc_number = $_POST['acc_number'];


        //errors array
        $errors = array();
        //required fields
        $req_fealds = array('bank_name','acc_hol_name','acc_number');  


        //cheacking empty fields
        foreach ($req_fealds  as $feld) {
            if(empty(trim($_POST[$feld]))){
                $errors[] = $feld.' is required.!';
            }            
        }

                //cheacking empty images
                $req_fealds = array('inc_f','inc_b');
                foreach ($req_fealds  as $feld) {
                    if(empty($_FILES[$feld]['name'])){
                        $errors[] = $feld.' is required.!';
                    }            
                }



            // there are no errors in the form
            if(empty($errors)){

                $bank_name = mysqli_real_escape_string($connection,$_POST['bank_name']);
                $acc_hol_name = mysqli_real_escape_string($connection,$_POST['acc_hol_name']);
                $acc_number = mysqli_real_escape_string($connection,$_POST['acc_number']);
                
                $file_name_inc_f = $_FILES['inc_f']['name'];
                $file_type_inc_f = $_FILES['inc_f']['type'];
                $file_size_inc_f = $_FILES['inc_f']['size'];
                $tmp_name_inc_f  = $_FILES['inc_f']['tmp_name'];
                
                $file_name_inc_b = $_FILES['inc_b']['name'];
                $file_type_inc_b = $_FILES['inc_b']['type'];
                $file_size_inc_b = $_FILES['inc_b']['size'];
                $tmp_name_inc_b  = $_FILES['inc_b']['tmp_name'];
                
                $upload_to = 'img/items/';
                
                $inc_f_full_file = $upload_to .rand(10,5000).$file_name_inc_f;
                $inc_b_full_file = $upload_to .rand(10,5000). $file_name_inc_b;
                
                move_uploaded_file($tmp_name_inc_f, $inc_f_full_file);
                move_uploaded_file($tmp_name_inc_b, $inc_b_full_file);
                

                $query = "INSERT INTO seller(user_ID,bank_name,account_holder_name,NIC_front_IMG,NIC_back_img) VALUES ('{$userID}','{$bank_name}','{$acc_hol_name}','{$inc_f_full_file}','{$inc_b_full_file}')";

                $result_set = mysqli_query($connection,$query);
                if($result_set){
                    // query working.
                    $query = "SELECT seller_ID FROM seller WHERE user_ID = '{$userID}' LIMIT 1";
                    $result_set = mysqli_query($connection,$query);
                    if($result_set){
                        if(mysqli_num_rows($result_set) > 0){
                            $row = mysqli_fetch_assoc($result_set);
                            $_SESSION["seller_ID"] = $row['seller_ID'];
                        }
                    }
                    header('Location:index.php?register=true');
                }else{
                    $errors[] = 'Feald to add    new seller';
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
    <link rel="stylesheet" href="css/user.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css" integrity="sha512-HXXR0l2yMwHDrDyxJbrMD9eLvPe3z3qL3PPeozNTsiHJEENxx8DH2CxmV05iwG0dwoz5n4gQZQyYLUNt1Wdgfg==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>
<body>


        <!-- top navigation bar start -->

        <?php include('headder.php'); ?>

        <!-- mobile nav END -->

        
        
       <!-------- user login form start -------------  -->
       <br><br><br>

     <div class="user-loggin-container">
        <div class="userlogging-from">
            <form action="sellerreg.php"  method = "POST" enctype="multipart/form-data">
                <div class="heading"><p>Become a Seller</p></div>
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
 

                <span>
                    <p>Email</p>
                    <span>
                        <!-- <img src="img/main/icons8-user-96.png" width="30px" alt=""> -->
                        <input type="email"  <?php echo "placeholder='".$sellerEmail."'" ?>  readonly> 
                    </span>

                </span>

                <span>
                    <p>Bank Name</p>
                    <span>
                        <!-- <img src="img/main/icons8-user-96.png" width="30px" alt=""> -->
 
                        <select name="bank_name" class="bank_name">
                            <option value="Bank of Ceylon">Bank of Ceylon</option>
                            <option value="People's Bank">People's Bank</option>
                            <option value="National Development Bank">National Development Bank</option>
                            <option value="Hatton National Bank">Hatton National Bank</option>
                            <option value="Commercial Bank">Commercial Bank</option>
                            <option value="Sampath Bank">Sampath Bank</option>
                            <option value="Nations Trust Bank">Nations Trust Bank</option>
                            <option value="Seylan Bank">Seylan Bank</option>
                        </select>
                    </span>

                </span>

                <span>
                    <p>Account Holder Name </p>
                    <span>
                        <!-- <img src="img/main/icons8-user-96.png" width="30px" alt=""> -->
                        <input type="text" placeholder="Account holder name " name="acc_hol_name" <?php echo 'value="'. $acc_hol_name.'"'?>> 
                    </span>

                </span>

                <span>
                    <p>Account Number </p>
                    <span>
                        <!-- <img src="img/main/icons8-user-96.png" width="30px" alt=""> -->
                        <input type="text" placeholder="Account Number" name="acc_number" <?php echo 'value="'. $acc_number.'"'?>> 
                    </span>

                </span>


                <span>
                    <p>Upload the front and back side images of your NIC</p>
                     <span>
                        <!-- <img src="img/main/icons8-lock-96.png" width="30px" alt=""> -->
                        <div class="fileUp">
                            Front side: 
                            <input type="file" name="inc_f" id="inc_f" accept="image/*">
                            Back side:
                            <input type="file" name="inc_b" id="inc_b" accept="image/*">
                        </div>
                         
                    </span>
                </span>

                <span>
                    <p class="f-pass"><a href="login.php">Forgot Password</a></p>

                    
                </span>
                <div class="ulo-button">
                    <button name="login" type="submit">Login</button>
                </div>    
                    <span class="min-disc">or sign up using</span>
                    <span class="shoshel-icons">
                        <i class="ri-facebook-circle-fill"></i>
                        <i class="ri-google-fill"></i>
                        <i class="ri-twitter-x-fill"></i>
                    </span><br><br>
                    <span class="btn-sginUp">
                        <button class="btn-sginUp"><a href="index.php" style="text-decoration: none;color: darkgoldenrod;">Sign up</a></button>
                    </span>

            </form>
        </div>
     </div>

       <!-------- user login form start -------------  -->

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
    </script>
    </body>
    </html>