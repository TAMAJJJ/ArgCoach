<?php

    require "db_setup.php";
    $sql = "USE xhu18_1;";
    if ($conn->query($sql) === TRUE) {
       echo "using Database xhu18_1";
    } else {
       echo "Error using  database: " . $conn->error;
    }


    session_start();


    $name = $_POST['name'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    //find out how many users in the USER database
    $sql = "SELECT * FROM USERS ORDER BY UserID DESC LIMIT 1;";

    $new_UserID = 1;

    $user_num = $conn->query($sql);
    if ($user_num->num_rows > 0){
        $row = $user_num->fetch_assoc();
        $new_UserID = $row["UserID"] + 1;
    }

    //add new user
    $insert_user = "INSERT INTO USERS VALUES($new_UserID, '$name', '$password','$role');";
    $result_insert_user = $conn->query($insert_user);
    if ($result_insert_user === TRUE) {
        echo "works";
    } else {
        echo "Error using  database: " . $conn->error;
    }

    $_SESSION['UserID'] = $new_UserID;

    if(trim($role) == 'user'){
       header('Location: ../debaterhomepage.html');
   }else if(trim($role) == 'coach'){
       header('Location: ../reviewerhomepage.html');
    }

    // header('Location: ../front-end/main.php');
    //
?>
