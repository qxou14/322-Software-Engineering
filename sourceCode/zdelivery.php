
<?php
    
    include "sectionStart.php"; 
    include "database.php"; 
    $username = $_SESSION['username'];
    
    
?>
<link rel = "stylesheet" type = "text/css" href ="style.css">
<link rel = "stylesheet" type = "text/css" href ="zTakeout.css">
<link rel = "stylesheet" type = "text/css" href ="background_color.css">
<style>
    
    a:hover {
    color: #f60;
    text-decoration: underline;
    }
    p{
        margin-top: 0px;
        text-align: center;
    }
</style>

</head>
<body>
<div class = "introduction"> K's Cafe </div>
<div class = "look">
    <span><a href="afterlogin.php"> Order </a></span>
    <span><a href = "">Complain</a></span>
    <span><a href = "deposit.php"> Deposit</a></span>
    <span><a href = "cancelAccount.php"> Cancellation</a></span>
    <span><a href = "logout.php"> Log out</a></span>
</div>
<span><a href = "pickmethod.php" style = "color:blue"> Go back </a><span>
<h3><i>Welcome User: <?php echo $_SESSION['username']; ?> <i></h3>


<p> Pick a delivery man! </p>


<table class="table">

        <caption> List of Deliverymen</caption>
                <tr=> 
                    <th>name</th>  
                    <th>rating</th>
                <tr>

        
            <?php
                $remain = $_SESSION["money"];


                if(isset($_POST['delivery1']))
                {

                    $sql = "UPDATE info SET saving =$remain WHERE username = '$username'";
                    mysqli_query($conn,$sql);

                    $id = $_POST['delivery1'];
                    $search = $conn -> query("SELECT delivery_id,name FROM deliveryMen WHERE delivery_id = $id");
                    $row = $search->fetch_assoc();
                    $deliveryid = $row['delivery_id'];
                    $deliveryName = $row['name'];

                    $find =  $conn -> query("SELECT FullName,addr,phoneNumber FROM info WHERE username = '$username'");
                    $row1 = $find->fetch_assoc();
                    $customerName = $row1['FullName'];
                    $cPhone = $row1['phoneNumber'];
                    $addr = $row1['addr'];
                   

                   
                    
                    $sql = "INSERT INTO deliverySelected(delivery_id,delivery_name,username,customerName,addr,phone) 
                            VALUES ($deliveryid, '$deliveryName' , '$username', '$customerName','$addr', '$cPhone')" ;
                    mysqli_query($conn,$sql);
                
  
                    $sql1 = "INSERT INTO deliveryOrder(delivery_id, deliveryName,foodName,quantity,price,name,username,addr,phone)
                            SELECT d.delivery_id, d.delivery_name,o.dish_name,o.quantity,o.price,d.customerName,d.username,d.addr,d.phone
                            FROM ordering o, deliverySelected d
                            WHERE o.username = d.username";
                    mysqli_query($conn,$sql1);
                    
                    $sqlD1 = "DELETE FROM deliverySelected WHERE username = '$username'";
                    mysqli_query($conn,$sqlD1);
                    $dataordering = $conn -> query("SELECT dish_id,quantity FROM ordering ");
                    $i = 0;
                   
                    if ($dataordering -> num_rows >0)
                    {
                        {
                            while($row = $dataordering -> fetch_assoc())
                            {
                                $rdishid = $row["dish_id"];
                                $rquantity = $row["quantity"];
                                $updatemenudish = "UPDATE menudish SET dishtotalorder = dishtotalorder + '$rquantity' WHERE id = '$rdishid' ";         
                                mysqli_query($conn,$updatemenudish);
                                $updateuser = "UPDATE $username SET nooforder = nooforder + '$rquantity' WHERE dishid = '$rdishid' ";
                                mysqli_query($conn,$updateuser);
                            }
                        }
                    
                        $i++;
                    }
                    

                    $sqlD = "DELETE FROM ordering WHERE username = '$username'";
                    mysqli_query($conn,$sqlD);
                    
                header('Refresh:5; url=http://localhost/SESERVER/afterlogin.php');
                echo "Sucess!  You have selected $deliveryName as your deliver. The page will be reloaded to meun page after 5 seconds";

                }
                elseif(isset($_POST['delivery2']))
                {
                    $sql = "UPDATE info SET saving =$remain WHERE username = '$username'";
                    mysqli_query($conn,$sql);

                    $id = $_POST['delivery2'];
                    $search = $conn -> query("SELECT delivery_id,name FROM deliveryMen WHERE delivery_id = $id");
                    $row = $search->fetch_assoc();
                    $deliveryid = $row['delivery_id'];
                    $deliveryName = $row['name'];

                    $find =  $conn -> query("SELECT FullName,addr,phoneNumber FROM info WHERE username = '$username'");
                    $row1 = $find->fetch_assoc();
                    $customerName = $row1['FullName'];
                    $cPhone = $row1['phoneNumber'];
                    $addr = $row1['addr'];
                   

                   
                    
                    $sql = "INSERT INTO deliverySelected(delivery_id,delivery_name,username,customerName,addr,phone) 
                            VALUES ($deliveryid, '$deliveryName' , '$username', '$customerName','$addr', '$cPhone')" ;
                    mysqli_query($conn,$sql);
                
  
                    $sql1 = "INSERT INTO deliveryOrder(delivery_id, deliveryName,foodName,quantity,price,name,username,addr,phone)
                            SELECT d.delivery_id, d.delivery_name,o.dish_name,o.quantity,o.price,d.customerName,d.username,d.addr,d.phone
                            FROM ordering o, deliverySelected d
                            WHERE o.username = d.username";
                    mysqli_query($conn,$sql1);
                    
                    $sqlD1 = "DELETE FROM deliverySelected WHERE username = '$username'";
                    mysqli_query($conn,$sqlD1);
                    $dataordering = $conn -> query("SELECT dish_id,quantity FROM ordering ");
                    $i = 0;
                   
                    if ($dataordering -> num_rows >0)
                    {
                        {
                            while($row = $dataordering -> fetch_assoc())
                            {
                                $rdishid = $row["dish_id"];
                                $rquantity = $row["quantity"];
                                $updatemenudish = "UPDATE menudish SET dishtotalorder = dishtotalorder + '$rquantity' WHERE id = '$rdishid' ";         
                                mysqli_query($conn,$updatemenudish);
                                $updateuser = "UPDATE $username SET nooforder = nooforder + '$rquantity' WHERE dishid = '$rdishid' ";
                                mysqli_query($conn,$updateuser);
                            }
                        }
                    
                        $i++;
                    }



                    $sqlD = "DELETE FROM ordering WHERE username = '$username'";
                    mysqli_query($conn,$sqlD);

                    header('Refresh:5; url=http://localhost/SESERVER/afterlogin.php');
                    echo "Sucess!  You have selected $deliveryName as your deliver. The page will be reloaded to meun page after 5 seconds";
    
                }

         
            
            $result = $conn -> query("SELECT name,rating FROM deliverymen");
            $i = 0;
          
        
            if ($result -> num_rows >0)
            {
                {
                    while($row = $result -> fetch_assoc())
                    {
                        echo "<tr valign='middle'>";
                        echo "<td>".$row['name']."</td>";
                        echo "<td>".$row['rating']."</td>";
                        echo "</tr>";         
                    }
                }
            
                $i++;
            }   

            
            ?>
</table>


<table class="table">

<caption>History</caption>
        <tr=>
            <th>Deliveryman's name</th> 
            <th>dish_name</th>
            <th>quantity</th>
            <th>price</th>
            <th>Order Time</th>
            <th>Delivered?</th>
            
        
        <tr>  

    <?php   $result = $conn -> query("SELECT deliveryName,foodName,quantity,price,additionTime,deliveryStatus FROM deliveryOrder where username = '$username'");
            $i = 0;
           
           
            if ($result -> num_rows >0)
            {
                {
                    while($row = $result -> fetch_assoc())
                    {
                        echo "<tr valign='middle'>";

                        echo "<td>".$row['deliveryName']."</td>";
                        echo "<td>".$row['foodName']."</td>";
                        echo "<td>".$row['quantity']."</td>";
                        echo "<td>".$row['price']."</td>";
                        echo "<td>".$row['additionTime']."</td>";
                        echo "<td>".$row['deliveryStatus']."</td>";
                        echo "</tr>";         
                    }
                }
            
                $i++;
            } 
            
            $search = $conn -> query("SELECT FullName,phoneNumber FROM info where username = '$username'");
            $row = $search->fetch_assoc();
            $name = $row['FullName'];
            $phone = $row['phoneNumber'];

            echo "<p>YOUR NAME: $name</p>";
            echo "<br>";
            echo "<p>YOUR PHONE: $phone</p>";
            
            ?>




</table>





<form action = "zdelivery.php" method = "POST"> 
            <div class="d1">
                <button type ="submit" name = "delivery1" value = 1> Pick first deliveryman </button>
            </div>
            <div class="d2">
                <button type ="submit" name = "delivery2" value = 2> Pick second deliveryman </button>
            </div>

</form>



