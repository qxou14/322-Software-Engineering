<?php
    ob_start();
    include "sectionStart.php"; 
    include "database.php"; 
    include "price.php";
    $username = $_SESSION['username'];
    
    
?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel = "stylesheet" type = "text/css" href ="style.css">
<link rel = "stylesheet" type = "text/css" href ="menustyle.css">

<div class = "introduction"> The Online Restaurant </div>
<div class = "look">
<span><a href="vipafterlogin.php"> Order </a></span>
    <span><a href = "vipzDinein.php">Dine in </a></span>
    <span><a href = "vipcustomerComplaint.php">Complain</a></span>
    <span><a href = "deposit.php"> Deposit</a></span>
    <span><a href = "cancelAccount.php"> Cancellation</a></span>
    <span><a href = "vipRecommended.php"> Recommended</a></span>
    <span><a href = "vipRatetoggle.php"> Rating</a></span>
    <span><a href = "logout.php"> Log out</a></span>

</div>
</head>
<body>
<h3><i>Welcome VIP User: <?php echo $_SESSION['username']; ?> <i></h3>

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
<a href = "vipRatedish.php"> Rate our Dish</a>
<a href = "vipRatedelivery.php"> Rate Our Delivery Guys</a>

</body>
</html>