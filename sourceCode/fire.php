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
                <h3 class="text">Fire Chef</h3>
                <input type= "text" name="usernamec" placeholder = "Username of Chef">
                <br>
                <button class="sub-butt" type = "submit" name = "submit">Fire Chef!</button>
                <br>   
    </form>
    <table class="employee">
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
            <h3 class="text">Fire Delivery guy</h3>
            <input type= "text" name="usernamed" placeholder = "Username of Deliveryguy">
            <br>
            <button class="sub-butt" type = "submit" name = "submit">Fire Delivery Guy!</button>
            <br>             
    </form>

    </div>