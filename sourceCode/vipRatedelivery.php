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
<link rel = "stylesheet" type = "text/css" href ="background_color.css">
<link rel = "stylesheet" type = "text/css" href ="menustyle.css">
<style>
    
    a:hover {
    color: #f60;
    text-decoration: underline;
  }
</style>

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

<section class="menu"><h2 class="menu_title">Rate our Delivery Guys</h2>
                    <?php
                        $visited = 0;
                        $query = "SELECT * FROM deliverymen ORDER BY delivery_id ASC";
                        $result = mysqli_query($conn,$query);
                       if(mysqli_num_rows($result)>0){
                            while($row = mysqli_fetch_array($result)){

                            
                    ?>
                    <div class="menu_item Yoshinoya_beef_bowl">
                        
                        <form action = 'vipRatedelivery.php' method = "Post">
                        <h4 class="text-info"><?php echo $row["name"]; ?>         
                        <input type = "number" name = "Ratingdel" min = 1 max = 10 value = 10 > 
                        <button type ="submit" name = "submit" > Rate </button> </h4> 
                        <input type = "hidden" name = "id" value = <?php echo $row["delivery_id"]; ?>>
                                
                        </form>
                        </span>
                        <?php
                            if(isset($_POST['submit']))
                            {
                               
                                if(isset($_POST['id']))
                                {
                                    $delid = $_POST['id'];
                                }
                               
                                if(isset($_POST['Ratingdel']))
                                {
                                    $rating = $_POST['Ratingdel'];
                                }
                                if($visited == 0){
                                $visited = 1;
                                $updatealldish1 = "UPDATE deliverymen SET noofrating = noofrating + 1 WHERE delivery_id = '$delid' ";
                                mysqli_query($conn,$updatealldish1);
                                $updatealldish2 = "UPDATE deliverymen SET rating = ((rating * (noofrating - 1) + '$rating')/noofrating) WHERE delivery_id = '$delid' ";
                                mysqli_query($conn,$updatealldish2);
                                }
                            }
                        ?>
                        
                        </div>
                        <?php }}?>
                        </div>
                        </section>
       
</body>
</html>
