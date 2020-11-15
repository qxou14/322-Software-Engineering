<?php 
    include "sectionStart.php";
    include "database.php";

    

?>

<link rel = "stylesheet" type = "text/css" href ="style.css">

<div class = "introduction"> The Online Restaurant </div>
<div class = "look">
    <span><a href="index.php"> Home </a></span>
    <span><a href = "AboutUs.html">About Us</a></span>
    <span><a href = "Contact.html">Contact</a></span>
    <span><a href = "deposit.php"> Deposit</a></span>
    <span><a href = "logout.php"> Log out</a></span>
</div>


<h3><i>Username: <?php echo $_SESSION['username']; ?> <i></h3>

<?php 
    $username = $_SESSION['username'];
    $sql = "SELECT saving FROM info  WHERE username = '$username' ";

    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    echo "<h3><i> Money left: {$row['saving']} </i></h3>";

    $sql = "SELECT warning FROM info  WHERE username = '$username' ";
    $result = $conn->query($sql);
    $row = $result ->fetch_assoc();
    echo "<h3><i> Warnings: {$row['warning']} </i></h3>";

?>

