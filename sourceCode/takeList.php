<link rel = "stylesheet" type = "text/css" href ="style.css">
<?php  
    
    include_once "database.php";
    include_once "functions.php";
    include_once "sectionStart.php";
?>
<span><a href = "adminUser.php"> Go back </a><span>
<div class = "introduction"> The Online Restaurant </div>

<span><h3><i>Welcome  User: <?php echo $_SESSION['username']; ?> <i></h3><span>

<table>

        <caption>Take out List</caption>
                <tr=> 
                    <th>username</th>  
                    <th>FullName</th>
                    <th>phoneNumber</th>
                    <th>dish_name</th>
                    <th>quantity</th>
                    <th>price</th>
                <tr>

        
            <?php

            if(isset($_POST['clean']))
            {
                $sqlD = "DELETE FROM takeout WHERE number > -1";
                mysqli_query($conn,$sqlD);
            }
            
            $result = $conn -> query("SELECT username,FullName,phoneNumber,dish_name,quantity,price FROM takeout");
            $i = 0;
          
        
            if ($result -> num_rows >0)
            {
                {
                    while($row = $result -> fetch_assoc())
                    {
                        echo "<tr valign='middle'>";
                        echo "<td>".$row['username']."</td>";
                        echo "<td>".$row['FullName']."</td>";
                        echo "<td>".$row['dish_name']."</td>";
                        echo "<td>".$row['quantity']."</td>";
                        echo "<td>".$row['price']."</td>";
                        echo "</tr>";         
                    }
                }
            
                $i++;
            }   

            

            
            
            ?>
</table>

<form action = "takeList.php" method ="POST">  


            Clean list:<button type ="submit" name = "clean"> Clear </button>

</form>