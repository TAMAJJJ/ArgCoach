<?php

    require_once('db_setup.php');
    $sql ="USE xhu18_1;";
    if ($conn->query($sql) === TRUE) {
       // echo "using Database tbiswas2_company";
    } else {
       echo "Error using  database: " . $conn->error;
    }
   session_start();
   unset($_SESSION["UserID"]);

   $conn->close();
   echo '<script>alert("You have successfully logged out!")</script>';
   header("Refresh:0; url=/~xhu18/login_signup/login.html");

?>
