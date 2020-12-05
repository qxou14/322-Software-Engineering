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
    <span><a href = "zDinein.php">Dine in </a></span>
    <span><a href = "customerComplaint.php">Complain</a></span>
    <span><a href = "deposit.php"> Deposit</a></span>
    <span><a href = "cancelAccount.php"> Cancellation</a></span>
    <span><a href = "Recommended.php"> Recommended</a></span>
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


<section class="menu"><h2 class="menu_title">Our Menu</h2>
    <div class="menu_section Chef_1_Dishes"><h3>Popular Dishes</h3>
                    <?php
                        $visited = 0;
                        $query = "SELECT * FROM menudish WHERE cheif_id = '1' AND SPECIAL = '0' ORDER BY id ASC";
                        $result = mysqli_query($conn,$query);
                       if(mysqli_num_rows($result)>0){
                            while($row = mysqli_fetch_array($result)){

                            
                    ?>
                    <div class="menu_item Yoshinoya_beef_bowl">
                    <h4 class="text-info"><?php echo $row["dishname"]; ?></h4>
                    <span class="price"><?php echo $row["price"]; ?> 
                    <form action = 'vipmenu.php' method = "Post">
                    <input type = "hidden" name = "dishid" value = <?php echo $row["id"]; ?>>
                    <input type = "hidden" name = "dishname" value = <?php echo $row["dishname"]; ?>>
                    <input type = "hidden" name = "price" value = <?php echo $row["price"]; ?>>
                        <input type = "hidden" name = "chefid" value = <?php echo $row["cheif_id"]; ?>>
                        <input type = "number" name = "quantity" min = 1 value = 1 > 
                        <button type ="submit" name = "submit" value = <?php echo 'Buy'.$row["dishname"] ?>> Add to Cart </button> 
                    </form>
                    
                    </span>
                    <p class="description"><?php echo $row["dishdesc"]; ?></p>

                    <?php
                        if(isset($_POST['submit']))
                        {
                            
                            if(isset($_POST['chefid']))
                            {
                                $chefid = $_POST['chefid'];
                            }
                            if(isset($_POST['dishid']))
                            {
                                $dishid = $_POST['dishid'];
                            }
                            if(isset($_POST['price']))
                            {
                                $foodprice = $_POST['price'];
                            }
                            if(isset($_POST['quantity']))
                            {
                                $quantity = $_POST['quantity'];
                            }
                            if(isset($_POST['dishname']))
                            {
                                $dishname = $_POST['dishname'];
                            }
                            if($visited == 0)
                                    {
                                        $visited = 1;
                                        $price = $quantity * $foodprice * 0.9;
                                        $sql = "INSERT INTO ordering (username,dish_name,quantity,price,chef_id,dish_id) VALUES ('$username','$dishname',$quantity,$price,'$chefid',$dishid);" ;
                                        mysqli_query($conn,$sql);
                                    }
                            
                                
                            
                        }
                        
                        
                    ?>
                    <hr>
                </div>
                <?php
                        }}
                        ?>
                
                    
                <div class="menu_section Chef_2_Dishes"><h3>Cultural Dishes</h3>
                <?php
                        $query = "SELECT * FROM menudish WHERE cheif_id = '2' AND SPECIAL ='0' ORDER BY id ASC ";
                        $result = mysqli_query($conn,$query);
                       if(mysqli_num_rows($result)>0){
                            while($row = mysqli_fetch_array($result)){

                            
                    ?>
                   <div class="menu_item Yoshinoya_beef_bowl">
                        <h4 class="text-info"><?php echo $row["dishname"]; ?></h4>
                        <span class="price"><?php echo $row["price"]; ?> 
                        <form action = 'vipmenu.php' method = "Post">
                        <input type = "hidden" name = "dishid" value = <?php echo $row["id"]; ?>>
                        <input type = "hidden" name = "dishname" value = <?php echo $row["dishname"]; ?>>
                        <input type = "hidden" name = "price" value = <?php echo $row["price"]; ?>>
                            <input type = "hidden" name = "chefid" value = <?php echo $row["cheif_id"]; ?>>
                            <input type = "number" name = "quantity" min = 1 value = 1 > 
                            <button type ="submit" name = "submit" value = <?php echo 'Buy'.$row["dishname"] ?>> Add to Cart </button> 
                        </form>
                        
                        </span>
                        <p class="description"><?php echo $row["dishdesc"]; ?></p>

                        <?php
                            if(isset($_POST['submit']))
                            {
                                
                                if(isset($_POST['chefid']))
                                {
                                    $chefid = $_POST['chefid'];
                                }
                                if(isset($_POST['dishid']))
                                {
                                    $dishid = $_POST['dishid'];
                                }
                                if(isset($_POST['price']))
                                {
                                    $foodprice = $_POST['price'];
                                }
                                if(isset($_POST['quantity']))
                                {
                                    $quantity = $_POST['quantity'];
                                }
                                if(isset($_POST['dishname']))
                                {
                                    $dishname = $_POST['dishname'];
                                }
                                if($visited == 0)
                                        {
                                            $visited = 1;
                                            $price = $quantity * $foodprice * 0.9;
                                            $sql = "INSERT INTO ordering (username,dish_name,quantity,price,chef_id,dish_id) VALUES ('$username','$dishname',$quantity,$price,'$chefid',$dishid);" ;
                                            mysqli_query($conn,$sql);
                                        }
                                
                                    
                                
                            }
                            
                            
                        ?>
                        <hr>
                    </div>
                    <?php
                            }}
                            ?>
                </div>
                <div class="menu_section Chef_2_Dishes"><h3>VIP Dishes</h3>
                <?php
                        $query = "SELECT * FROM menudish WHERE SPECIAL ='1' ORDER BY id ASC ";
                        $result = mysqli_query($conn,$query);
                       if(mysqli_num_rows($result)>0){
                            while($row = mysqli_fetch_array($result)){

                            
                    ?>
                    <div class="menu_item Yoshinoya_beef_bowl">
                        <h4 class="text-info"><?php echo $row["dishname"]; ?></h4>
                        <span class="price"><?php echo $row["price"]; ?> 
                        <form action = 'vipmenu.php' method = "Post">
                        <input type = "hidden" name = "dishid" value = <?php echo $row["id"]; ?>>
                        <input type = "hidden" name = "dishname" value = <?php echo $row["dishname"]; ?>>
                        <input type = "hidden" name = "price" value = <?php echo $row["price"]; ?>>
                            <input type = "hidden" name = "chefid" value = <?php echo $row["cheif_id"]; ?>>
                            <input type = "number" name = "quantity" min = 1 value = 1 > 
                            <button type ="submit" name = "submit" value = <?php echo 'Buy'.$row["dishname"] ?>> Add to Cart </button> 
                        </form>
                        
                        </span>
                        <p class="description"><?php echo $row["dishdesc"]; ?></p>

                        <?php
                            if(isset($_POST['submit']))
                            {
                                
                                if(isset($_POST['chefid']))
                                {
                                    $chefid = $_POST['chefid'];
                                }
                                if(isset($_POST['dishid']))
                                {
                                    $dishid = $_POST['dishid'];
                                }
                                if(isset($_POST['price']))
                                {
                                    $foodprice = $_POST['price'];
                                }
                                if(isset($_POST['quantity']))
                                {
                                    $quantity = $_POST['quantity'];
                                }
                                if(isset($_POST['dishname']))
                                {
                                    $dishname = $_POST['dishname'];
                                }
                                if($visited == 0)
                                        {
                                            $visited = 1;
                                            $price = $quantity * $foodprice * 0.9;
                                            $sql = "INSERT INTO ordering (username,dish_name,quantity,price,chef_id,dish_id) VALUES ('$username','$dishname',$quantity,$price,'$chefid',$dishid);" ;
                                            mysqli_query($conn,$sql);
                                        }
                                
                                    
                                
                            }
                            
                            
                        ?>
                        <hr>
                    </div>
                    <?php
                            }}
                            ?>
                </div></section>


        <table>
            <caption>Ordered</caption>
                <tr=>  
                    <th>dish_name</th>
                    <th>quantity</th>
                    <th>VIP Dicsount price</th>
                    <th>Remove Order</th>
                
                <tr> 
                <?php
                    
                    
                    $result = $conn -> query("SELECT orders,dish_name,quantity,price FROM Ordering where username = '$username'");
                    $i = 0;
                   
                    if ($result -> num_rows >0)
                    {
                        {
                            while($row = $result -> fetch_assoc())
                            {
                                echo "<tr valign='middle'>";
                                echo "<td>".$row['dish_name']."</td>";
                                echo "<td>".$row['quantity']."</td>";
                                echo "<td>".$row['price']."</td>";
                                echo "<td>
                                        <a href = 'vipdelete.php?choice=".$row['orders']."'>Cancel Order
                                    </td>";
                                echo "</tr>";         
                            }
                        }
                    
                        $i++;
                    }
                    
                 
                ?>
    </table>

    <?php
 
                    $result = $conn -> query("SELECT price FROM Ordering where username = '$username'");
                    $i = 0;
                    $cost = 0;
                   
                    if ($result -> num_rows >0)
                    {
                        {
                            while($row = $result -> fetch_assoc())
                            {
                                
                                $cost += $row['price'];
                        
                            }
                        }
                    
                        $i++;
                    }
                    echo "Total cost is $cost";

                    if(isset($_POST['buy']))
                    {
                        if($balance >= $cost)
                        {
                            
                            $_SESSION["money"] = $balance - $cost;
                         
                            header("location: ../SESERVER/pickmethod.php");
                            ob_end_flush();
                           
                        }
                        else 
                        {   
                            header("location: ../SESERVER/deposit.php");
                            ob_end_flush();
                            
                            
                        }
                       
                     
                    }
                    

                ?>

    <form action = 'vipmenu.php' method = 'POST'  >
                <button type = 'submit' name = 'buy' >Purchased now!</button>
    </form>





</body>
</html>