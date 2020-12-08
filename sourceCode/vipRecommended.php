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
<link rel = "stylesheet" type = "text/css" href ="menustyle.css">
<link rel = "stylesheet" type = "text/css" href ="Recommended.css">

<div class = "introduction"> K's Cafe </div>
<div class = "look">
<span><a href="vipafterlogin.php"> Order </a></span>
    <span><a href = "vipzDinein.php">Dine in </a></span>
    <span><a href = "vipcustomerComplaint.php">Complain</a></span>
    <span><a href = "vipdeposit.php"> Deposit</a></span>
    <span><a href = "vipcancelAccount.php"> Cancellation</a></span>
    <span><a href = "vipRecommended.php"> Recommended</a></span>
    <span><a href = "vipRatetoggle.php"> Rating</a></span>
    <span><a href = "logout.php"> Log out</a></span>
</div>
</head>
<body>
<h3 class="User-infor"><i>Welcome VIP User: <?php echo $_SESSION['username']; ?> <i></h3>

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


<section class="menu"><h2 class="menu_title">Recommended Dishes</h2>
                    <?php 
                    $check = "SELECT SUM(nooforder) AS total FROM $username";
                    $val = mysqli_query($conn,$check);
                    $points = mysqli_fetch_assoc($val);
                    if($points["total"] == 0){
                    ?>
    <div class="menu_section Chef_1_Dishes"><h3>Top Rated Dishes</h3>
                    <?php

                        $visited = 0;
                        $query = "SELECT * FROM menudish WHERE SPECIAL = '0' ORDER BY dishrating DESC LIMIT 3";
                        $result = mysqli_query($conn,$query);
                       if(mysqli_num_rows($result)>0){
                            while($row = mysqli_fetch_array($result)){

                            
                    ?><div class="card">
                    <img src=<?php echo $row["dishimage"];?> style="width:50%">
                    <h1><?php echo $row["dishname"];?></h1>
                    <p><?php echo $row["dishdesc"];?></p>
                  </div>
                    <hr>
                    </div>
                       <?php }}?>
                       <div class="menu_section Chef_1_Dishes"><h3>Most Popular Dishes</h3>
                    <?php
                        $visited = 0;
                        $query = "SELECT * FROM menudish WHERE SPECIAL = '0'ORDER BY dishtotalorder DESC LIMIT 3";
                        $result = mysqli_query($conn,$query);
                       if(mysqli_num_rows($result)>0){
                            while($row = mysqli_fetch_array($result)){

                            
                    ?><div class="card">
                    <img src=<?php echo $row["dishimage"];?> style="width:50%">
                    <h1><?php echo $row["dishname"];?></h1>
                    <p><?php echo $row["dishdesc"];?></p>
                  </div>
                    <hr>
                    </div>
                       <?php }}}
                       else{
                       ?>
                        <div class="menu_section Chef_1_Dishes"><h3>Your Top Dishes</h3>
                    <?php

                        $visited = 0;
                        $query = "SELECT * FROM $username ORDER BY nooforder DESC LIMIT 3";
                        $result = mysqli_query($conn,$query);
                       if(mysqli_num_rows($result)>0){
                            while($row = mysqli_fetch_array($result)){

                            
                    ?><div class="card">
                    <img src=<?php echo $row["dishimage"];?> style="width:50%">
                    <h1><?php echo $row["dishname"];?></h1>
                    <p><?php echo $row["dishdesc"];?></p>
                  </div>
                    <hr>
                    </div>
                       <?php }}?>
                            <?php }?>
                        </body>
</html>