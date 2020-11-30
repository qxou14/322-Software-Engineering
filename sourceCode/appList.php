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

        <caption> Appointments</caption>
                <tr=> 
                    <th>Session</th>  
                    <th>Day</th>
                    <th>Starting Time(pm)</th>
                    <th>Full Name</th>
                    <th>Phone</th>
                <tr>

        
            <?php
            
            $result = $conn -> query("SELECT session_num,day,startTime,FullName,phoneNumber FROM ready");
            $i = 0;
          
        
            if ($result -> num_rows >0)
            {
                {
                    while($row = $result -> fetch_assoc())
                    {
                        echo "<tr valign='middle'>";
                        echo "<td>".$row['session_num']."</td>";
                        echo "<td>".$row['day']."</td>";
                        echo "<td>".$row['startTime']."</td>";
                        echo "<td>".$row['FullName']."</td>";
                        echo "<td>".$row['phoneNumber']."</td>";
                        echo "</tr>";         
                    }
                }
            
                $i++;
            }   

            

            
            
            ?>



</table>