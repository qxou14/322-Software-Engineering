<?php
    ob_start();
    include "sectionStart.php"; 
    include "database.php"; 
    $username = $_SESSION['username'];
    
    
?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel = "stylesheet" type = "text/css" href ="style.css">
<link rel = "stylesheet" type = "text/css" href ="reset2.css">
<link rel = "stylesheet" type = "text/css" href ="Ratetoggle.css">
<link rel = "stylesheet" type = "text/css" href ="background_color.css">


</head>
<body>
<div class="box">
<div class = "introduction"> K's Cafe </div>
<div class = "look">
    <span><a href="afterlogin.php"> Order </a></span>
    <span><a href = "zDinein.php">Dine in </a></span>
    <span><a href = "customerComplaint.php">Complain</a></span>
    <span><a href = "deposit.php"> Deposit</a></span>
    <span><a href = "cancelAccount.php"> Cancellation</a></span>
    <span><a href = "Recommended.php"> Recommended</a></span>
    <span><a href = "Ratetoggle.php"> Rate Us</a></span>
    <span><a href = "logout.php"> Log out</a></span>
</div>
<h3><i>Welcome User: <?php echo $_SESSION['username']; ?> <i></h3>

<?php 
    $username = $_SESSION['username'];
    
    $sql = "SELECT warning FROM info  WHERE username = '$username' ";
    $result = $conn->query($sql);
    $row = $result ->fetch_assoc();
    echo "<h3><i> Warnings: {$row['warning']} </i></h3>";

    $sql = "SELECT saving FROM info  WHERE username = '$username' ";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $balance = $row['saving'];
    echo "<h3><i> Money left: {$row['saving']} </i></h3>";

?>
<div class="rate">
<a href = "Ratedish.php"> Rate our Dish</a>
</div>
<div class="rate">
<a href = "Ratedelivery.php"> Rate Our Delivery Guys</a>
</div>
</div>

</body>
</html>

