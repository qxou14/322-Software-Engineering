<?php
  
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "populardishes";
   
   // Create connection
   $conn = mysqli_connect($servername,$username,$password,$dbname);
   
   // Check connection
   if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
     }
     
     
     
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel = "stylesheet" type = "text/css" href ="style.css">
<link rel = "stylesheet" type = "text/css" href ="menustyle.css">

<div class = "introduction"> The Online Restaurant </div>
<div class = "look">
    <span><a href="afterlogin.php"> Order </a></span>
    <span><a href = "">Complain</a></span>
    <span><a href = "deposit.php"> Deposit</a></span>
    <span><a href = "cancelAccount.php"> Cancellation</a></span>
    <span><a href = "logout.php"> Log out</a></span>
</div>>

</head>
<body>
<section class="menu"><h2 class="menu_title">Our Menu</h2>
                    <div class="menu_section Chef_1_Dishes"><h3>Popular Dishes</h3>
                    <?php
                        $query = "SELECT * FROM popdish ORDER BY id ASC";
                        $result = mysqli_query($conn,$query);
                       if(mysqli_num_rows($result)>0){
                            while($row = mysqli_fetch_array($result)){

                            
                    ?>
                    <div class="menu_item Yoshinoya_beef_bowl">
                        <h4 class="text-info"><?php echo $row["dishname"]; ?></h4>
                        <span class="price"><?php echo $row["price"]; ?> 
                        <input type = "text" name = "quantity" class = "form-control" value ="1">
                        <input type ="hidden" name ="hidden_name" value="<?php echo $row["dishname"]; ?>">
                        <input type ="hidden" name ="hidden_name" value="<?php echo $row["price"]; ?>">
                        <input type="submit" name="add" style = "margin-top:5px;" clas="btn btn-success" value="Add to order">
                        </span>
                        <p class="description"><?php echo $row["dishdesc"]; ?></p>
                        
                        <hr>
                    </div>
                    <?php
                            }}
                            ?>
                
                    
                <div class="menu_section Chef_2_Dishes"><h3>Cultural Dishes</h3>
                <?php
                        $query = "SELECT * FROM cultdish ORDER BY id ASC";
                        $result = mysqli_query($conn,$query);
                       if(mysqli_num_rows($result)>0){
                            while($row = mysqli_fetch_array($result)){

                            
                    ?>
                    <div class="menu_item Yoshinoya_beef_bowl">
                        <h4 class="text-info"><?php echo $row["dishname"]; ?></h4>
                        <span class="price"><?php echo $row["price"]; ?> 
                        <input type = "text" name = "quantity" class = "form-control" value ="1">
                        <input type ="hidden" name ="hidden_name" value="<?php echo $row["dishname"]; ?>">
                        <input type ="hidden" name ="hidden_name" value="<?php echo $row["price"]; ?>">
                        <input type="submit" name="add" style = "margin-top:5px;" clas="btn btn-success" value="Add to order">
                        </span>
                        <p class="description"><?php echo $row["dishdesc"]; ?></p>
                        
                        <hr>
                    </div>
                    <?php
                            }}
                            ?>
                </div></section>




</body>
</html>


