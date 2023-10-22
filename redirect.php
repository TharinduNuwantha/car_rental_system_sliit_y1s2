
 <?php

 if (isset($_POST['edit'])) {
     
     header("Location: editprofile.php");
     exit;
  } 

  if (isset($_POST['back'])) {
     
     header("Location: profile.php");
     exit;
  } 


?> 
