<link rel = "stylesheet" type = "text/css" href ="style.css">
<link rel = "stylesheet" type = "text/css" href ="demote.css">
<link rel = "stylesheet" type = "text/css" href ="background_color.css">
<style>
    a:hover {
        color: #f60;
        text-decoration: underline;
    }
</style>
<?php  
    
    include_once "database.php";
    include_once "functions.php";
    include_once "sectionStart.php";
?>

<div class="return">
    <a href="adminUser.php">Click to return to the previous page </a>
</div>
<div class = "introduction"> K's Cafe </div>
<span><h3><i>Welcome  User: <?php echo $_SESSION['username']; ?> <i></h3><span>


<div class="table">
    <table class="employee">
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
        <h3 class="text">
            Upgrade Username
        </h3>
                <input type= "text" name="username20" placeholder = "Username of user">
                <br>
                <button class="sub-butt" type = "submit" name = "submit">Upgrade to VIP!</button>
                <br>             
    </form>
    <table class="employee">
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
            <h3 class="text">
            Upgrade Chef
            </h3>
                <input type= "text" name="usernamec" placeholder = "Username of Chef">
                <br>
                <button class="sub-butt" type = "submit" name = "submit">Promote Chef!</button>
                <br>             
    </form>
    <table class="employee">
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
                    <h3 class="text">
                    Upgrade Delivery
                    </h3>
                <input type= "text" name="usernamed" placeholder = "Username of Deliveryguy">
                <br>
                <button class="sub-butt" type = "submit" name = "submit">Promote Delivery Guy!</button>
                <br>             
    </form>

    </div>