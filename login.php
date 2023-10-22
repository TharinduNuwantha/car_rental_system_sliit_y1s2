

<?php 

session_start(); 

include "db_conn.php";

if (isset($_POST['email']) && isset($_POST['password'])) {

    function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }

    $email = validate($_POST['email']);

    $pass = validate($_POST['password']);

    if (empty($email)) {

        header("Location: loginpage.php?error=User Name is required");

        exit();

    }else if(empty($pass)){

        header("Location: loginpage.php?error=Password is required");

        exit();

    }else{

        $sql = "SELECT * FROM users WHERE email='$email' AND password='$pass'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);

            if ($row['email'] === $email && $row['password'] === $pass) {

                echo "Logged in!";

                $_SESSION['email'] = $row['email'];

                $_SESSION['uname'] = $row['username'];

                $_SESSION['id'] = $row['id'];
                $id = $row['id'];

                $sql = "SELECT seller_ID  FROM seller WHERE user_ID = '{$id}' LIMIT 1";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) === 1) {
                    $row = mysqli_fetch_assoc($result);
                    $_SESSION['seller_ID'] = $id;
                }

                header("Location: profile.php");

                exit();

            }else{

                header("Location: loginpage.php?error=Incorect User name or password");

                exit();

            }

        }else{

            header("Location: loginpage.php?error=Incorect User name or password");

            exit();

        }

    }

}else{

    header("Location: loginpage.php");

    exit();

}