<?php require_once('inc/connection.php');  ?>
<?php 
    session_start();
    // Check if the user is logged in


    // Check if the user is not logged in
    if (isset($_SESSION["email"]) && isset($_SESSION['uname'])) {
        $user_Email = $_SESSION["email"];
        $user_namw = $_SESSION["uname"];
    }
    if (isset($_SESSION["seller_ID"])){
        $sellerID = $_SESSION["seller_ID"];
    }
    
    if(isset($_POST['login'])){
        // Initialize the $errors array.
        $errors = array();
    
        // Check if the 'username' and 'password' keys are set in the $_POST array.
        if(isset($_POST['username']) && isset($_POST['password'])){
            $username = mysqli_real_escape_string($connection, $_POST['username']);
            $password = mysqli_real_escape_string($connection, $_POST['password']);
    
            // Your SQL query is incorrect; it should use mysqli_query instead of $result_set.
            $query = "SELECT * FROM admin LIMIT 1";
            $result_set = mysqli_query($connection, $query);
    
            if($result_set){
                $row = mysqli_fetch_assoc($result_set);
    
                if($username == $row['user_name'] && $password == $row['password']){
                    // Authentication successful, redirect to index.php.
                    header('Location: admin.php');
                    $_SESSION['admin_user_name'] = $row['user_name'];
                } else {
                    // Invalid username or password.
                    $errors[] = 'Username or password invalid';
                }
            } else {
                // Error in executing the query.
                $errors[] = 'Database query error';
            }
        } else {
            // If 'username' or 'password' is not set in $_POST.
            $errors[] = 'Username and password are required';
        }
    }
    
    // Check if there are any errors.
    if(!empty($errors)){
        // Handle and display errors, e.g., by looping through the $errors array.
        foreach($errors as $error){
            echo $error . '<br>';
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
        
        
       <!-------- user login form start -------------  -->
       <br><br><br>

     <div class="user-loggin-container">
        <div class="userlogging-from" >
            <form action="adminLoggin.php" method ="post">
                <div class="heading"><p>Admin Login</p></div>
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
                    <p>User Name</p>
                    <span>
                        <input type="text" placeholder="UserName" name="username"> 
                    </span>

                </span>

                <span>
                    <p>Password</p>
                    <span>
                        <input type="password" placeholder="password" name="password"> 
                    </span>

                </span>



                <span>
                    <p class="f-pass"><a href="#">Forgot Password</a></p>

                    
                </span>
                <div class="ulo-button">
                    <button type="login" name="login">Login</button>
                </div>    
                                
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
 
    </body>
    </html>