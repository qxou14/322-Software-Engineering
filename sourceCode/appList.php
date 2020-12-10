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
<h4 class="message"> Mangers, please remember to clean the appointment list every week</h4>


<div class="table">
    <table class="employee">

        <caption> Appointments</caption>
                <tr=> 
                    <th>Session</th>  
                    <th>Day</th>
                    <th>Starting Time(pm)</th>
                    <th>Full Name</th>
                    <th>Phone</th>
                <tr>

        
            <?php

            if(isset($_POST['clean']))
            {
                $sqlD = "DELETE FROM ready WHERE session_num > -1";
                mysqli_query($conn,$sqlD);

                $sqlS = "UPDATE appointment SET numberOfSeats = 2";
                mysqli_query($conn,$sqlS);
                
            }
            
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

<form action = "appList.php" method ="POST">  

            <h3 class="text">
                To Clean list
            </h3>
            <button class="sub-butt" type ="submit" name = "clean"> Clear </button>

</form>
</div>