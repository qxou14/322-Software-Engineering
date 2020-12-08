
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
<?php 
    $username = $_SESSION['username'];
    
    $sql = "SELECT warning FROM info  WHERE username = '$username' ";
    $result = $conn->query($sql);
    $row = $result ->fetch_assoc();
    echo "<h3><i> Warnings: {$row['warning']} </i></h3>";

    $sql = "SELECT saving FROM info  WHERE username = '$username' ";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $balance = $row['saving'];
    echo "<h3><i> Money left: {$row['saving']} </i></h3>";

?>

<h1 style = "text-align:center"> Take Out Check </h1>
<br>

<?php 

   
        $remain = $_SESSION["money"];



        if(isset($_POST['agree']))
        {
            $char = $_POST['agree'];
            $char = strtolower($char);
            if($char == "yes")
            {
                $sql = "UPDATE info SET saving =$remain WHERE username = '$username'";
                mysqli_query($conn,$sql);


                
                $sqlC ="INSERT INTO takeout(username,FullName,phoneNumber,dish_name,quantity,price) 
                SELECT i.username,i.FullName, i.phoneNumber, o.dish_name,o.quantity,o.price
                FROM info i, ordering o
                WHERE i.username = o.username";
                mysqli_query($conn,$sqlC);

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

                header('Refresh:10; url=http://localhost/SESERVER/afterlogin.php');
                echo "<p style = 'text-align:center' >Sucess! The page will reload to the meun page after 10 seconds.</p>";
                echo "<br>";
                echo " <p style = 'text-align:center'>Please go to our restaurant at <b>107 E Broadway New York NY 10038
                Chinatown, Lower West Side </b> in order to take your food. </p>";

               

            }
            else
            {
                echo "<h3 style = 'text-align:center'> You need to enter yes in order to take out! <h3>";
            }

           
        }
?>

        <div class="table">
        <table class="table">

        <caption>History</caption>
                <tr=>
                      
                    <th>dish_name</th>
                    <th>quantity</th>
                    <th>price</th>
                    
                
                <tr>  
        
            <?php   $result = $conn -> query("SELECT dish_name,quantity,price FROM takeout where username = '$username'");
                    $i = 0;
                   
                    if ($result -> num_rows >0)
                    {
                        {
                            while($row = $result -> fetch_assoc())
                            {
                                echo "<tr valign='middle'>";
        
                                echo "<td>".$row['dish_name']."</td>";
                                echo "<td>".$row['quantity']."</td>";
                                echo "<td>".$row['price']."</td>";
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
                    echo "<p>YOUR PHONE: $phone</p>";
                    
                    ?>
        
        
        
        
        </table>
        </div>

    <form action = "zTakeout.php" method ="Post">

        <h2 style = "text-align:center">
        Take out ?(type yes): <input type ="text" name = "agree">
                            <input type = "submit" name = "submit">
    </h2>
    </form>

</body>
</html>






