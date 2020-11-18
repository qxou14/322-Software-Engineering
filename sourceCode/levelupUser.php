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
            <caption>Egliable VIP</caption>
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
                Upgrade Username:<input type= "text" name="username20">
                <br>
                <button type = "submit" name = "submit">Upgrade to VIP!</button>
                <br>             
    </form>

    </div>