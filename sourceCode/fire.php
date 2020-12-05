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
            <caption>Eligible Chefs</caption>
                <tr=> 
                    <th>Chef Name</th>  
                    <th>Demoted</th>
                    <th>Rating</th>
                
                <tr> 
                <?php
                 if(isset($_POST['usernamec']))
                 {
                    $C =$_POST['usernamec'];
         
      
                    if(isset($C) )
                    {
            
                        
                        $sql5 = "DELETE FROM cheif WHERE name = '$C'";
                        mysqli_query($conn,$sql5);
                        
                    }
                    else
                    {
                        echo " Please enter a valid username";
                    }
                 
                    

                 }
                    
                    $result = $conn -> query("SELECT name,demoted,rating FROM cheif where (demoted > 1) OR Rating < 5");
                    $i = 0;
                    if ($result -> num_rows >0)
                    {
                        {
                            while($row = $result -> fetch_assoc())
                            {
                                echo "<tr valign='middle'>";
                                echo "<td>".$row['name']."</td>";
                                echo "<td>".$row['demoted']."</td>";
                                echo "<td>".$row['rating']."</td>";
                                echo "</tr>";         
                            }
                        }
                    
                        $i++;
                    }   
                ?>
    </table>
    <form action = "fire.php" method = "POST">
                Fire Chef:<input type= "text" name="usernamec" placeholder = "Username of Chef">
                <br>
                <button type = "submit" name = "submit">Fire Chef!</button>
                <br>             
    </form>
    <table>
            <caption>Eligible Delivery</caption>
                <tr=> 
                    <th>Delivery Name</th>  
                    <th>Demoted</th>
                    <th>Rating</th>
                
                <tr> 
                <?php
                 if(isset($_POST['usernamed']))
                 {
                    $C =$_POST['usernamed'];
         
      
                    if(isset($C) )
                    {
            
                        $sql5 = "DELETE FROM deliverymen WHERE name = '$C'";
                        mysqli_query($conn,$sql5);
                        
                        
                    }
                    else
                    {
                        echo " Please enter a valid username";
                    }
                 
                    

                 }
                    
                 $result = $conn -> query("SELECT name,demoted,rating FROM deliverymen where (demoted > 1) OR rating < 5");
                 $i = 0;
                    if ($result -> num_rows >0)
                    {
                        {
                            while($row = $result -> fetch_assoc())
                            {
                                echo "<tr valign='middle'>";
                                echo "<td>".$row['name']."</td>";
                                echo "<td>".$row['demoted']."</td>";
                                echo "<td>".$row['rating']."</td>";
                                echo "</tr>";         
                            }
                        }
                    
                        $i++;
                    }   
                ?>
    </table>
    <form action = "fire.php" method = "POST">
                Fire Delivery guy<input type= "text" name="usernamed" placeholder = "Username of Deliveryguy">
                <br>
                <button type = "submit" name = "submit">Fire Delivery Guy!</button>
                <br>             
    </form>

    </div>