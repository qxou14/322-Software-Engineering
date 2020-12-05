<?php  
    
    include('header.html');
    include_once "database.php";
    include_once "functions.php";
    include_once "sectionStart.php";
    
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel = "stylesheet" type = "text/css" href ="style.css">
</head>
<body>
<section class="menu"><h2 class="menu_title">Recommended Dishes</h2>
              
    <div class="menu_section Chef_1_Dishes"><h3>Top Rated Dishes</h3>
                    <?php

                        $visited = 0;
                        $query = "SELECT * FROM menudish WHERE SPECIAL = '0' ORDER BY dishrating DESC LIMIT 3";
                        $result = mysqli_query($conn,$query);
                       if(mysqli_num_rows($result)>0){
                            while($row = mysqli_fetch_array($result)){

                            
                    ?><div class="card">
                    <img src=<?php echo $row["dishimage"];?> style="width:50%">
                    <h1><?php echo $row["dishname"];?></h1>
                    <p><?php echo $row["dishdesc"];?></p>
                  </div>
                    <hr>
                    </div>
                       <?php }}?>
                       <div class="menu_section Chef_1_Dishes"><h3>Most Popular Dishes</h3>
                    <?php
                        $visited = 0;
                        $query = "SELECT * FROM menudish WHERE SPECIAL = '0'ORDER BY dishtotalorder DESC LIMIT 3";
                        $result = mysqli_query($conn,$query);
                       if(mysqli_num_rows($result)>0){
                            while($row = mysqli_fetch_array($result)){

                            
                    ?><div class="card">
                    <img src=<?php echo $row["dishimage"];?> style="width:50%">
                    <h1><?php echo $row["dishname"];?></h1>
                    <p><?php echo $row["dishdesc"];?></p>
                  </div>
                    <hr>
                    </div>
                       <?php }}?>
</body>
</html>

