
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "logininfo";

// Create connection
$conn = mysqli_connect($servername,$username,$password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  echo "User Database Connected";
  ?>
 //this is the commit request 
