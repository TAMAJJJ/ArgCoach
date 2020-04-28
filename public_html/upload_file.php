<?php

require_once('db_setup.php');
$sql ="USE xhu18_1;";
if ($conn->query($sql) === TRUE) {
   // echo "using Database tbiswas2_company";
} else {
   echo "Error using  database: " . $conn->error;
}

 session_start();


 $target_dir = "/Audios/";
 $target_file = $target_dir . "4.png";

 echo $_FILES["fileToUpload"]["name"];
 echo $target_file;

move_uploaded_file($_FILES["fileToUpload"]["name"], $target_file);

echo '<script>alert("Debate Uploaded!")</script>';
header("Refresh:0; url=../debaterhomepage.html");    
?>
