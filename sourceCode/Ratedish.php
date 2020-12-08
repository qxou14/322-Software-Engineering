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
<link rel = "stylesheet" type = "text/css" href ="background_color.css">
<style>
    
    a:hover {
    color: #f60;
    text-decoration: underline;
  }
  body{
    height: 100%;
    width: 100%;
    background-image: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
    background-size: cover;
}
</style>

</head>
<body>
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


<section class="menu"><h2 class="menu_title">Rate our Menu</h2>
    <div class="menu_section Chef_1_Dishes"><h3>All Food Items</h3>
    <p class="description">Rate the Dish out of 10</p>
                    <?php
                        $visited = 0;
                        $query = "SELECT * FROM menudish WHERE SPECIAL = '0' ORDER BY id ASC";
                        $result = mysqli_query($conn,$query);
                       if(mysqli_num_rows($result)>0){
                            while($row = mysqli_fetch_array($result)){

                            
                    ?>
                    <div class="menu_item Yoshinoya_beef_bowl">
                        
                        <form action = 'Ratedish.php' method = "Post">
                        <h4 class="text-info"><?php echo $row["dishname"]; ?>         
                        <input type = "number" name = "Rating" min = 1 max = 10 value = 10 > 
                        <button type ="submit" name = "submit" > Rate </button> </h4> 
                        <input type = "hidden" name = "id" value = <?php echo $row["id"]; ?>>
                        <input type = "hidden" name = "chefid" Value = <?php echo $row["cheif_id"]?>>
                                
                        </form>
                        </span>
                        <?php
                            if(isset($_POST['submit']))
                            {
                               
                                if(isset($_POST['id']))
                                {
                                    $dishid = $_POST['id'];
                                }
                                if(isset($_POST['chefid']))
                                {
                                    $chefid = $_POST['chefid'];
                                }
                               
                                if(isset($_POST['Rating']))
                                {
                                    $rating = $_POST['Rating'];
                                }
                                if($visited == 0){
                                $visited = 1;
                                $updatealldish1 = "UPDATE menudish SET dishnoofrating = dishnoofrating + 1 WHERE id = '$dishid' ";
                                mysqli_query($conn,$updatealldish1);
                                $updatealldish2 = "UPDATE menudish SET dishrating = ((dishrating * (dishnoofrating - 1) + '$rating')/dishnoofrating) WHERE id = '$dishid' ";
                                mysqli_query($conn,$updatealldish2);
                                $check = "SELECT AVG(dishrating) AS average FROM menudish WHERE cheif_id = '$chefid'";
                                $val = mysqli_query($conn,$check);
                                $points = mysqli_fetch_assoc($val);
                                $rate = $points["average"];
                                $updaterating = "UPDATE cheif SET rating = $rate WHERE cheif_id = $chefid";
                                mysqli_query($conn,$updaterating);
                                }
                            }
                        ?>
                        
                        </div>
                        <?php }}?>
                        </div>
                        </section>


                        
                                         
                        </body>
</html>