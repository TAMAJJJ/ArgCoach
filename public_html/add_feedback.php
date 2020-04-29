<?php

    require "db_setup.php";
    $sql ="USE xhu18_1;";
    if ($conn->query($sql) === TRUE) {
       //echo "using Database xhu18_1";
    } else {
       echo "Error using  database: " . $conn->error;
    }

     session_start();

     $JudgeID = $_SESSION['UserID'];
     $fluency = $_POST['fluency'];
     $pitch = $_POST['pitch'];
     $relevancy = $_POST['relevancy'];
     $overall = $_POST['overall'];
     $feedback = $_POST['feedback'];
     $speechID = $_POST['speechID'];


     echo $speechID;



      $sql = "UPDATE SPEECHES SET JudgeID= '$JudgeID', feedback = '$feedback', score = '$overall', relevancy = '$relevancy', pitch = '$pitch', fluency = '$fluency' WHERE SpeechID = '$speechID';";
      #$sql = "INSERT INTO SPEECHES values ('$speechID','','','$JudgeID','$feedback','$overall','$relevancy','$pitch','$fluency');";
      $result = $conn->query($sql);

      if ($result === TRUE) {
         //echo "Thanks For Grading!";
      } else {
         echo "Error using  database: " . $conn->error;
      }


?>
