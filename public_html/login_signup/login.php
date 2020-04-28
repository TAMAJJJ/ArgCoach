<?php

   require "db_setup.php";
   $sql = "USE xhu18_1;";
   if ($conn->query($sql) === TRUE) {
      echo "using Database xhu19_1";
   } else {
      echo "Error using  database: " . $conn->error;
   }

   session_start();

   //length of email and password and check exist

   $username = $_POST['username'];
   $password = $_POST['password'];

   //check if email exists
   $select_username = "SELECT * FROM USERS WHERE Username = '$username';";
   $select_username_result = $conn->query($select_username);
   $username_count = mysqli_num_rows($select_username_result);
   echo "username count";
   echo $username_count;

   //check if user exists
   $select_user = "SELECT * FROM USERS WHERE Username = '$username' AND Pass_word = $password;";
   $select_user_result = $conn->query($select_user);
   $user_count = mysqli_num_rows($select_user_result);

   if($username_count == 0) {
      echo '<script>alert("User name does not exist")</script>';
      header("Refresh:0; url=login.html");
   }else if($user_count != 1){
      echo '<script>alert("Your Login Name or Password is invalid")</script>';
      header("Refresh:0; url=login.html");
   }else{
      //find UserID from email
      $get_username_row = "SELECT * FROM USERS WHERE Username = '$username';";
      $username_row = $conn->query($get_username_row);
      $row = $username_row->fetch_assoc();
      $UserID = $row["UserID"];

      $_SESSION['UserID'] = $UserID;

      //check if User or Admin
      $row = mysqli_fetch_array($select_user_result,MYSQLI_ASSOC);
      $role = $row['Usertype'];
      echo $role;

      //echo $role;
      echo (strcmp(trim($role),'User'));
      if(trim($role) == 'user'){
         header('Location: ../debaterhomepage.html');
     }else if(trim($role) == 'coach'){
         header('Location: ../coach_main.php');
      }
   }

   // echo"<table border = '1'>";
   // echo"<tr><td>UserID</td><td>Name</td><td>Phone</td><td>Email</td><td>Subscriber</td><td>Password</td></tr>\n";
   // while($row = mysqli_fetch_assoc($result)){
   //     echo"<tr><td>{$row['UserID']}</td><td>{$row['Name']}</td><td>{$row['Phone']}</td><td>{$row['Email']}</td><td>{$row['Subscriber']}</td><td>{$row['Password']}</td></tr>\n";
   // }
   // echo"</table>";

?>
