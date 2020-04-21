<?php
$servername = "localhost";
$username = "xhu18";
$password = "=J5t#-=X";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully";

?>


