<link rel = "stylesheet" type = "text/css" href ="style.css">
<?php  
    
    include_once "database.php";
    include_once "functions.php";
    include_once "sectionStart.php";
?>

<a href = "adminUser.php"> return </a>
<div class = "introduction"> The Online Restaurant </div>
<span><h3><i>Welcome  User: <?php echo $_SESSION['username']; ?> <i></h3><span>


<div>
    <table>
            <caption>Eligible VIP</caption>
                <tr=> 
                    <th>username</th>  
                    <th>TotalSpend</th>
                    <th>TotalOrder</th>
                
                <tr> 
                <?php
                 if(isset($_POST['username20']))
                 {
                    upgradeVip($conn,$_POST['username20']);

                 }
                    
                    $result = $conn -> query("SELECT username,FullName,Spend,TotalOrder FROM info where level = 0 AND (Spend >= 500 OR TotalOrder >=50)");
                    $i = 0;
                    if ($result -> num_rows >0)
                    {
                        {
                            while($row = $result -> fetch_assoc())
                            {
                                echo "<tr valign='middle'>";
                                echo "<td>".$row['username']."</td>";
                                echo "<td>".$row['Spend']."</td>";
                                echo "<td>".$row['TotalOrder']."</td>";
                                echo "</tr>";         
                            }
                        }
                    
                        $i++;
                    }   
                ?>
    </table>
    <form action = "levelupUser.php" method = "POST">
                Upgrade Username:<input type= "text" name="username20" placeholder = "Username of user">
                <br>
                <button type = "submit" name = "submit">Upgrade to VIP!</button>
                <br>             
    </form>
    <table>
            <caption>Eligible Chefs</caption>
                <tr=> 
                    <th>Chef Name</th>  
                    <th>Surplus Compliment</th>
                    <th>Rating</th>
                
                <tr> 
                <?php
                 if(isset($_POST['usernamec']))
                 {
                    $C =$_POST['usernamec'];
         
      
                    if(isset($C) )
                    {
            
                        
                        $sql5 = "UPDATE cheif SET salary = salary + 500,compliment = 0, complain = 0,situation = compliment - complain WHERE name = '$C'";
                        mysqli_query($conn,$sql5);
                        
                    }
                    else
                    {
                        echo " Please enter a valid username";
                    }
                 
                    

                 }
                    
                    $result = $conn -> query("SELECT name,situation,rating FROM cheif where (situation >=3) ");
                    $i = 0;
                    if ($result -> num_rows >0)
                    {
                        {
                            while($row = $result -> fetch_assoc())
                            {
                                echo "<tr valign='middle'>";
                                echo "<td>".$row['name']."</td>";
                                echo "<td>".$row['situation']."</td>";
                                echo "<td>".$row['rating']."</td>";
                                echo "</tr>";         
                            }
                        }
                    
                        $i++;
                    }   
                ?>
    </table>
    <form action = "levelupUser.php" method = "POST">
                Upgrade Chef:<input type= "text" name="usernamec" placeholder = "Username of Chef">
                <br>
                <button type = "submit" name = "submit">Promote Chef!</button>
                <br>             
    </form>
    <table>
            <caption>Eligible Delivery</caption>
                <tr=> 
                    <th>Delivery Name</th>  
                    <th>Surplus Compliment</th>
                    <th>Rating</th>
                
                <tr> 
                <?php
                 if(isset($_POST['usernamed']))
                 {
                    $C =$_POST['usernamed'];
         
      
                    if(isset($C) )
                    {
            
                        $sql5 = "UPDATE deliverymen SET salary = salary + 500,compliment = 0, complain = 0,situation = compliment - complain WHERE name = '$C'";
                        mysqli_query($conn,$sql5);
                        
                        
                    }
                    else
                    {
                        echo " Please enter a valid username";
                    }
                 
                    

                 }
                    
                 $result = $conn -> query("SELECT name,situation,rating FROM deliverymen where (situation >= 3) ");
                 $i = 0;
                    if ($result -> num_rows >0)
                    {
                        {
                            while($row = $result -> fetch_assoc())
                            {
                                echo "<tr valign='middle'>";
                                echo "<td>".$row['name']."</td>";
                                echo "<td>".$row['situation']."</td>";
                                echo "<td>".$row['rating']."</td>";
                                echo "</tr>";         
                            }
                        }
                    
                        $i++;
                    }   
                ?>
    </table>
    <form action = "levelupUser.php" method = "POST">
                Upgrade Delivery<input type= "text" name="usernamed" placeholder = "Username of Deliveryguy">
                <br>
                <button type = "submit" name = "submit">Promote Delivery Guy!</button>
                <br>             
    </form>

    </div>