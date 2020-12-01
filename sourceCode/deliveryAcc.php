<link rel = "stylesheet" type = "text/css" href ="style.css">
<?php  
    
    include_once "database.php";
    include_once "functions.php";
    include_once "sectionStart.php";

    $id = $_SESSION['id'];
    $username = $_SESSION['username'];
?>



<div class = "introduction"> The Online Restaurant </div>

<h3><i>Welcome  User: <?php echo $username ?> <i></h3>




<table> 
    <caption>List</caption>
            <tr=>
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
        
        
        if(isset($_POST['username']) && isset($_POST['customername']))
        {
            $customerName = $_POST['customername'];
            $customerUserName = $_POST['username'];
          
            $sql = "UPDATE deliveryOrder  SET deliveryStatus = 'yes' WHERE delivery_id = $id and name = '$customerName' and username = '$customerUserName'";
            mysqli_query($conn,$sql);
            header("location: ../SESERVER/deliveryAcc.php");
        }
            
            $result = $conn -> query("SELECT foodName,quantity,price,name,username,addr,phone,additionTime,deliveryStatus FROM deliveryOrder 
                                            where deliveryName = '$username' and delivery_id = $id");
                $i = 0;
              
                if ($result -> num_rows >0)
                {
                    {
                        while($row = $result -> fetch_assoc())
                        {
                            echo "<tr valign='middle'>";

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

<form action = "deliveryAcc.php" method ="POST"> 

               Customer Username: <input type = "text" name = username>
                <br>
                Customer Name:<input type ="text" name = customername>
                <br>
                <button type = "submit" name = "submit" >Already Delivered to this User </button>


</form>


<div class = "logos">
    <u1>
        <li><a href = "logout.php"> log out </a></li>
    </u1>
</div>
    