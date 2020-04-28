<!DOCTYPE html>
<html>
<head>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<link rel="stylesheet" href="accounts.css">

</head>
<body>

    <nav class="navbar navbar-dark" style="background-color: black;">
        <a class="navbar-brand" href="../front-end/main.php">
            <img src="../pics/musical-note.png" width="30" height="30" class="d-inline-block align-top" alt="">
            ArgCoach
        </a>
        <ul class="nav justify-content-end">
            <li class="nav-item">
                <a class="nav-link active" href="coach_main.php" style="color:white;">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="coachAccount.php" style="color:white;">Account</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php" style="color:white;">Log Out</a>
            </li>

        </ul>
    </nav>

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

         $sql = "SELECT * FROM USER WHERE USERS.UserID = '$JudgeID';";
         $result = $conn->query($sql);

         while($row = mysqli_fetch_assoc($result)){
             $name = $row['Username'];
             // $phone = $row['Phone'];
             // $email= $row['Email'];
         }
    ?>

    <div class="container" style="width: 80%; margin:3% auto auto auto;">

        <div class="left">
            <div class="image">
                <img style="width:300%;" src="pic/employee.png" alt="avatar">
            </div>

            <h1> <?php echo $name; ?> </h1>
            <div class="informations">
                <p> <span> UserID: &ensp; &ensp;</span><?php echo $JudgeID; ?> </p>
                <!-- <p> <span> Phone Number:  <br>&ensp; &ensp;</span><?php echo $phone; ?> </p>
                <p> <span>Email Address:  <br>&ensp; &ensp;</span><?php echo $email; ?> </p> -->
            </div>
        </div>

        <div class="right">
            <?php
            $sql = "SELECT * FROM SPEECHES WHERE (JudgeID = '$JudgeID');";


            #$sql = "SELECT * FROM Students where Username like 'amai2';";
            $result = $conn->query($sql);

            if ($result == TRUE) {
                //echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            //$stmt = $conn->prepare("Select * from Students Where Username like ?");
            //$stmt->bind_param("s", $username);
            //$result = $stmt->execute();
            //$result = $conn->query($sql);

                echo"<table class='table' style='width:100%;'>";
                echo"<thead class='thead-dark'><tr><th>Topic</th><th>Speech</th><th>JudgeID</th><th>Overall</th><th>Relevancy</th><th>Pitch</th><th>Fluency</th><th>Feedback</th><th>&ensp; &ensp;</th></tr></thead>\n";
                echo"<tbody>";

                while($row = mysqli_fetch_assoc($result)){
                    $speechID = $row['SpeechID'];
                    $audio_source = "http://betaweb.csug.rochester.edu/~xhu18/Audios/{$speechID}.mp3";
                    echo"<tr><th scope='row'>{$row['topic']}</th><td><audio controls style='height:30px;'><source src='{$audio_source}' type='audio/mpeg'>Your browser does not support the audio element.</audio></td><td>{$row['JudgeID']}</td><td>{$row['score']}</td><td>{$row['relevancy']}</td><td>{$row['pitch']}</td><td>{$row['fluency']}</td><td>{$row['feedback']}</td><td><a href='delete_speech.php?DebaterID=$DebaterID'>Delete</a></td></tr>\n";
                }
                echo"</tbody>";
                echo"</table>";


            ?>
        </div>
        </div>


<?php
$conn->close();
?>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
