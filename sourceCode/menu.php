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
    <span><a href="afterlogin.php"> Order </a></span>
    <span><a href = "zDinein.php">Dine in </a></span>
    <span><a href = "customerComplaint.php">Complain</a></span>
    <span><a href = "deposit.php"> Deposit</a></span>
    <span><a href = "cancelAccount.php"> Cancellation</a></span>
    <span><a href = "logout.php"> Log out</a></span>
</div>
</head>
<body>



<section class="menu"><h2 class="menu_title">Our Menu</h2>
    <div class="menu_section Chef_1_Dishes"><h3>Popular Dishes</h3>
                    <?php
                        $visited = 0;
                        $query = "SELECT * FROM popdish ORDER BY id ASC";
                        $result = mysqli_query($conn,$query);
                       if(mysqli_num_rows($result)>0){
                            while($row = mysqli_fetch_array($result)){

                            
                    ?>
                    <div class="menu_item Yoshinoya_beef_bowl">
                        <h4 class="text-info"><?php echo $row["dishname"]; ?></h4>
                        <span class="price"><?php echo $row["price"]; ?> 
                        <form action = 'menu.php' method = "Post">
                            <input type = "number" name = "quantity" min = 1 value = 1 > 
                            <button type ="submit" name = "submit" value = <?php echo 'Buy'.$row["dishname"] ?>> Add to Cart </button> 
                        </form>

                        <?php
                            if(isset($_POST['submit']))
                            {
                                $choose = $_POST['submit'];
                                $meun = ltrim($choose, "Buy");
                                if(isset($_POST['quantity']))
                                {
                                    $quantity = $_POST['quantity'];
                                }
                               
                                switch($choose)
                                {
                                    case "BuyYoshinoya":
                                        if($visited == 0)
                                        {
                                            $visited = 1;
                                            $price = $quantity * $beefPrice;
                                            $sql = "INSERT INTO ordering (username,dish_name,quantity,price) VALUES ('$username','$meun',$quantity,$price);" ;
                                            mysqli_query($conn,$sql);
                                        }
                                        
                                        break;
                                    case "BuyNigirizushi":
                                        if($visited == 0)
                                        {
                                            $visited = 1;
                                            $price = $quantity * $NigirizushiPrice;
                                            $sql = "INSERT INTO ordering (username,dish_name,quantity,price) VALUES ('$username','$meun',$quantity,$price);" ;
                                         mysqli_query($conn,$sql);

                                        }
                                        
                                       
                                        break;
                                    case "BuyTamagoyaki":
                                        if($visited == 0)
                                        {
                                            $visited = 1;
                                            $price = $quantity * $TamagoyakiPrice;
                                            $sql = "INSERT INTO ordering (username,dish_name,quantity,price) VALUES ('$username','$meun',$quantity,$price);" ;
                                            mysqli_query($conn,$sql);
                                        }
                                        
                                        
                                        break;
                                }
                                header("location: ../SESERVER/menu.php");
                               
                                    
                            }
                        
                        ?>
                                           
                       
                        </span>
                        <p class="description"><?php echo $row["dishdesc"]; ?></p>
                        
                        <hr>
                    </div>
                    <?php
                            }}
                            ?>
                
                    
                <div class="menu_section Chef_2_Dishes"><h3>Cultural Dishes</h3>
                <?php
                        $query = "SELECT * FROM cultdish ORDER BY id ASC";
                        $result = mysqli_query($conn,$query);
                       if(mysqli_num_rows($result)>0){
                            while($row = mysqli_fetch_array($result)){

                            
                    ?>
                    <div class="menu_item Yoshinoya_beef_bowl">
                        <h4 class="text-info"><?php echo $row["dishname"]; ?></h4>
                        <span class="price"><?php echo $row["price"]; ?> 
                        <form action = 'menu.php' method = "Post">
                            <input type = "number" name = "quantity" min = 1 value = 1 > 
                            <button type ="submit" name = "submit" value = <?php echo 'Buy'.$row["dishname"] ?>> Add to Cart </button> 
                        </form>
                        
                        </span>
                        <p class="description"><?php echo $row["dishdesc"]; ?></p>

                        <?php
                            if(isset($_POST['submit']))
                            {
                                $choose = $_POST['submit'];
                                $meun = ltrim($choose, "Buy");
                                if(isset($_POST['quantity']))
                                {
                                    $quantity = $_POST['quantity'];
                                }
                               
                                switch($choose)
                                {
                                    case "BuyUnadon":
                                        if($visited == 0)
                                        {
                                            $visited = 1;
                                            $price = $quantity * $UnadonPrice;
                                            $sql = "INSERT INTO ordering (username,dish_name,quantity,price) VALUES ('$username','$meun',$quantity,$price);" ;
                                            mysqli_query($conn,$sql);
                                        }
                                        
                                        break;
                                    case "BuyAburiZushi":
                                        if($visited == 0)
                                        {
                                            $visited = 1;
                                            $price = $quantity * $AburiZushiPrice;
                                            $sql = "INSERT INTO ordering (username,dish_name,quantity,price) VALUES ('$username','$meun',$quantity,$price);" ;
                                            mysqli_query($conn,$sql);

                                        }
                                        
                                       
                                        break;
                                    case "BuyJapaneseDumpling":
                                        
                                        if($visited == 0)
                                        {
                                            $visited = 1;
                                            $price = $quantity * $JapaneseDumpling;
                                            $sql = "INSERT INTO ordering (username,dish_name,quantity,price) VALUES ('$username','$meun',$quantity,$price);" ;
                                            mysqli_query($conn,$sql);
                                        }
                                        
                                        
                                        break;

                                    
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
                    <th>price</th>
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
                                        <a href = 'delete.php?choice=".$row['orders']."'>Cancel Order
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

    <form action = 'menu.php' method = 'POST'  >
                <button type = 'submit' name = 'buy' >Purchased now!</button>
    </form>





</body>
</html>