<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <style>
      * {
      box-sizing: border-box;
      }
      body {
      font-family: Roboto, Helvetica, sans-serif;
      }
      /* Fix the button on the left side of the page */
      .open-btn {
      display: flex;
      justify-content: left;
      }
      /* Style and fix the button on the page */
      .open-button {
      background-color: green;
      color: white;
      padding: 2% 5%;
      margin-left: 5%;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      opacity: 0.8;
      }
      /* Position the Popup form */
      .payment-popup {
      position: relative;
      text-align: center;
      width: 100%;
      }
      /* Hide the Popup form */
      .form-popup {
      display: none;
      position: fixed;
      left: 45%;
      top:5%;
      transform: translate(-45%,5%);
      /* border: 2px solid #666; */
      z-index: 9;
      }
      /* Styles for the form container */
      .form-container {
      width: 100%;
      padding: 20px;
      background-color: #fff;
      box-shadow: 4px 4px 4px 5px lightgrey;
      }
      /* Full-width for input fields */
      .form-container input[type=text], .form-container input[type=password] {
      width: 100%;
      padding: 10px;
      margin: 5px 0 22px 0;
      border: none;
      background: #eee;
      }
      /* When the inputs get focus, do something */
      .form-container input[type=text]:focus, .form-container input[type=password]:focus {
      background-color: #ddd;
      outline: none;
      }
      /* Style submit/login button */
      .form-container .btn {
      background-color: #8ebf42;
      color: #fff;
      padding: 12px 20px;
      border: none;
      cursor: pointer;
      width: 100%;
      margin-bottom:10px;
      opacity: 0.8;
      }
      /* Style cancel button */
      .form-container .cancel {
      background-color: #cc0000;
      }
      /* Hover effects for buttons */
      .form-container .btn:hover, .open-button:hover {
      opacity: 1;
      }
    </style>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
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

        <div class="payment-popup">
         <div class="form-popup" id="popupForm">
           <form action="add_feedback.php" class="form-container" style="text-align:left;">
             <h2>Your Feedback</h2>

             <label for="fluency"><strong>SpeechID</strong></label>
             <input type="number" id="fluency" name="fluency" required>
             <br>


             <label for="fluency"><strong>Fluency</strong></label>
             <input type="number" id="fluency" name="fluency" required max="100">


             <label for="pitch"><strong>Pitch</strong></label>
             <input type="number" id="pitch" name="pitch" required max="100">


             <label for="relevancy"><strong>Relevancy</strong></label>
             <input type="number" id="relevancy" name="relevancy" required max="100">
             <br>

             <label for="overall"><strong>Overall Grade</strong></label>
             <input type="number" id="overall" name="overall" required max="100">
             <br>

             <textarea name="feedback" rows="8" cols="80"></textarea>
             <br>

             <button type="submit" class="btn">Submit</button>
             <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
           </form>
         </div>
       </div>

        <div class="container" style="width:80%;">
            <h2 style="margin:3% 0;">Need Grading Speeches...</h2>

            <button style="float:right; margin:2% 0;" class= 'btn btn-dark' type='button' name='button' onclick='openForm()'>Grade</button>

            <?php
                require_once('db_setup.php');
                $sql ="USE xhu18_1;";
                if ($conn->query($sql) === TRUE) {
                   // echo "using Database tbiswas2_company";
                } else {
                   echo "Error using  database: " . $conn->error;
                }

                 $sql = "SELECT * FROM SPEECHES WHERE JudgeID = 0;";
                 $result = $conn->query($sql);

                 if ($result == TRUE) {
                    // echo "using Database tbiswas2_company";
                 } else {
                    echo "Error using  database: " . $conn->error;
                 }


                 echo"<table class='table' style='width:100%;'>";
                 echo"<thead class='thead-dark'><tr><th>SpeechID</th><th>Topic</th><th>Speech</th></tr></thead>\n";
                 echo"<tbody>";

                 while($row = mysqli_fetch_assoc($result)){
                     $speechID = $row['SpeechID'];
                     $audio_source = "http://betaweb.csug.rochester.edu/~xhu18/Audios/{$speechID}.mp3";
                     echo"<tr><th scope='row'>{$row['SpeechID']}</th><td>{$row['topic']}</td><td><audio controls style='width:400px;height:30px;'><source src='{$audio_source}' type='audio/mpeg'>Your browser does not support the audio element.</audio></td></tr>\n";
                 }
                 echo"</tbody>";
                 echo"</table>";

            ?>
        </div>



        <script>
          function openForm() {
            document.getElementById("popupForm").style.display="block";
          }

          function closeForm() {
            document.getElementById("popupForm").style.display="none";
          }
        </script>



        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        </body>
</html>
