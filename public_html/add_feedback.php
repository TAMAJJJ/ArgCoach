<?php

    require_once('db_setup.php');
    $sql ="USE xhu18_1;";
    if ($conn->query($sql) === TRUE) {
       // echo "using Database tbiswas2_company";
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



      $sql = "UPDATE SPEECHES SET JudgeID = '$JudgeID', feedback = '$feedback', score = '$overall', relevancy = '$relevancy', pitch = '$pitch', fluency = '$fluency' WHERE SpeechID = '$speechID';";
      $result = $conn->query($sql);

      if ($result === TRUE) {
          echo '<script>alert("Grade Submitted!")</script>';
          header("Refresh:0; url=http://betaweb.csug.rochester.edu/~xhu18/coach_main.php"); 
      } else {
         echo "Error using  database: " . $conn->error;
      }


?>
