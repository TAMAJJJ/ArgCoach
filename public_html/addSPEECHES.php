<!DOCTYPE html>
<html>
<head>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>

<?php
require_once('db_setup.php');
$sql ="USE xhu18_1;";
if ($conn->query($sql) === TRUE) {
   // echo "using Database tbiswas2_company";
} else {
   echo "Error using  database: " . $conn->error;
}
// Query:

session_start();

$sql = "SELECT * FROM SPEECHES ORDER BY SpeechID DESC LIMIT 1;";

$new_speechID = 1;

$user_num = $conn->query($sql);
if ($user_num->num_rows > 0){
    $row = $user_num->fetch_assoc();
    $new_SpeechID = $row["SpeechID"] + 1;
}


$DebaterID = $_SESSION['UserID'];
$topic = $_POST['topic'];
$audioFile = $_POST['audioFile'];
$transcript = $_POST['transcript'];
$JudgeID = $_POST['JudgeID'];
$feedback = $_POST['feedback'];
$score = $_POST['score'];
$relevancy = $_POST['relevancy'];
$pitch = $_POST['pitch'];
$fluency = $_POST['fluency'];

echo $DebaterID;

$sql = "INSERT INTO USERS values ($new_speechID,$DebaterID,'$topic','http://betaweb.csug.rochester.edu/~xhu18/Audios/'+'$audioFile'+'.mp3','$transcript',$JudgeID,'$feedback','$score','$relevancy','$pitch','$fluency');";


#$sql = "SELECT * FROM Students where Username like 'amai2';";
$result = $conn->query($sql);

if ($result === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
//$stmt = $conn->prepare("Select * from Students Where Username like ?");
//$stmt->bind_param("s", $username);
//$result = $stmt->execute();
//$result = $conn->query($sql);
?>

<?php
$conn->close();
?>

</body>
</html>
