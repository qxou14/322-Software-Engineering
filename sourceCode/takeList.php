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
                        echo "<td>".$row['phoneNumber']."</td>";
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

            <h3 class="text">
            Clean list
            </h3>
            <button class="sub-butt" type ="submit" name = "clean"> Clear </button>

</form>
        </div>
