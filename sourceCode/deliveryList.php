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
    <caption>List</caption>
            <tr=>
                <th>Deliveryman ID</th>
                <th>Deliveryman Name</th>  
                <th>Food</th> 
                <th>quantity</th>
                <th>price</th>
                <th>Customer Name</th>
                <th>Customer Username</th>
                <th>Customer Address</th>
                <th>Customer Phone</th>
                <th>Order Time</th>
                <th>Delivered?</th>
                
            
            <tr>  

        <?php
        
        
        if(isset($_POST['submit']))
        {
            
            $sql = "DELETE FROM deliveryOrder WHERE deliveryStatus <> 'no'";
            mysqli_query($conn,$sql);
            header("location: ../SESERVER/deliveryList.php");
        }
            
            $result = $conn -> query("SELECT delivery_id, deliveryName,foodName,quantity,price,name,username,addr,phone,additionTime,deliveryStatus 
                                    FROM deliveryOrder");
                $i = 0;
              
                if ($result -> num_rows >0)
                {
                    {
                        while($row = $result -> fetch_assoc())
                        {
                            echo "<tr valign='middle'>";
                            echo "<td>".$row['delivery_id']."</td>";
                            echo "<td>".$row['deliveryName']."</td>";
                            echo "<td>".$row['foodName']."</td>";
                            echo "<td>".$row['quantity']."</td>";
                            echo "<td>".$row['price']."</td>";
                            echo "<td>".$row['name']."</td>";
                            echo "<td>".$row['username']."</td>";
                            echo "<td>".$row['addr']."</td>";
                            echo "<td>".$row['phone']."</td>";
                            echo "<td>".$row['additionTime']."</td>";
                            echo "<td>".$row['deliveryStatus']."</td>";
                            echo "</tr>";         
                        }
                    }
                
                    $i++;
                } 
                        
                ?>

</table>

<form action ="deliveryList.php" method = "POST"> 

                <button class="sub-butt" type = "submit" name = "submit">Delete users who got their dishes</button>


</form>
</div>
