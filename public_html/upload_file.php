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

 // echo $_FILES["fileToUpload"]["name"];
 // echo $target_file;

move_uploaded_file($_FILES["fileToUpload"]["name"], $target_file);

session_start();

$sql = "SELECT * FROM SPEECHES ORDER BY SpeechID DESC LIMIT 1;";

$new_speechID = 1;

$user_num = $conn->query($sql);
if ($user_num->num_rows > 0){
    $row = $user_num->fetch_assoc();
    $new_speechID = $row["SpeechID"] + 1;
}


$DebaterID = $_SESSION['UserID'];
$topic = $_POST['topic'];
$audioFile = $_POST['audioFile'];
$transcript = $_POST['transcript'];

echo $new_speechID;

$sql = "INSERT INTO SPEECHES values ($new_speechID,$DebaterID,'$topic',0,'',0,0,0,0,'$transcript');";


#$sql = "SELECT * FROM Students where Username like 'amai2';";
$result = $conn->query($sql);

if ($result === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


echo '<script>alert("Debate Uploaded!")</script>';
header("Refresh:0; url=http://betaweb.csug.rochester.edu/~xhu18/debaterhomepage.html");
?>
