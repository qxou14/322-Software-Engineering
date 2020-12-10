

<?php
    
    include "sectionStart.php"; 
    include "database.php"; 
    $username = $_SESSION['username'];
    
    
?>
<link rel = "stylesheet" type = "text/css" href ="style.css">
<link rel = "stylesheet" type = "text/css" href ="reset2.css">
<link rel = "stylesheet" type = "text/css" href ="zDinein.css">
<div class="box">
<div class = "introduction"> K's Cafe </div>
<div class = "look">
    <span><a href="afterlogin.php"> Order </a></span>
    <span><a href = "zDinein.php">Dine in </a></span>
    <span><a href = "customerComplaint.php">Complain</a></span>
    <span><a href = "deposit.php"> Deposit</a></span>
    <span><a href = "cancelAccount.php"> Cancellation</a></span>
    <span><a href = "logout.php"> Log out</a></span>
</div>
</head>
<body>


<h3 class="username"><i>Welcome User: <?php echo $_SESSION['username']; ?> <i></h3>

<h2 style = "text-align:center"> Pick your time!</h2>
<br>


<div class = "tables-list">
    <table>
            <caption class="avaliable-time">Avaliable Time</caption>
                <tr=> 
                    <th>Session</th>  
                    <th>Day</th>
                    <th>Starting Time(pm)</th>
                    <th>Avaliable Seats</th>
                
                <tr> 
                    
                <?php
                    
               
                    if(isset($_POST['session']))
                    {
                        
                        $time = $_POST['session'];

                       
      
                        $search = $conn -> query("SELECT FullName,phoneNumber FROM info WHERE username = '$username'");
                        $row = $search->fetch_assoc();
                        $name = $row['FullName'];
                        $phone = $row['phoneNumber'];
                        
                        


                        $search1 = $conn -> query("SELECT day,startingTime FROM appointment WHERE session_num = $time");
                        $row1 = $search1->fetch_assoc();
                        $day = $row1['day'];
                        $timeRange = $row1['startingTime'];

                       

                        
                        
                       
                        $sql1 = "UPDATE appointment SET numberOfSeats = numberOfSeats-1 WHERE session_num =$time ";
                        mysqli_query($conn,$sql1);

                       $insert = "INSERT INTO ready(session_num,day,startTime,FullName,phoneNumber) VALUES($time,'$day',$timeRange,'$name','$phone')";
                       mysqli_query($conn,$insert);
                       header("location: ../SESERVER/zDinein.php");

                      
                        
                        
                    }
                   
                   
                    
                    $result = $conn -> query("SELECT session_num,day,startingTime,numberOfSeats FROM appointment where numberOfSeats > 0 ");
                    $i = 0;
                
                    if ($result -> num_rows >0)
                    {
                        {
                            while($row = $result -> fetch_assoc())
                            {
                                echo "<tr valign='middle'>";
                                echo "<td>".$row['session_num']."</td>";
                                echo "<td>".$row['day']."</td>";
                                echo "<td>".$row['startingTime']."</td>";
                                echo "<td>".$row['numberOfSeats']."</td>";
                                echo "</tr>";         
                            }
                        }
                    
                        $i++;
                    }   
                ?>

                
                <form action = "zDinein.php" method = "POST"> 

                        <h3>Pick a session: </h3>
                        <input type ="number"  name = 'session' value = 1 min = 1 max = 20>
                        <button class="pick-button" type = "submit" name = "submit">Make an appointment</button>
                </form>
    </table>
 </div>


 <div class = "tables"> 
     <table class="t2">
        <caption>Your appointment</caption>
                <tr=> 
                    <th>Session</th>  
                    <th>Day</th>
                    <th>Starting Time(pm)</th>
                    
                <tr>
                    
                <?php
                     
                
                if(isset($_POST['session1']))
                {
                    $time = $_POST['session1'];
                    $temp = $conn -> query("SELECT session_num FROM ready WHERE session_num = $time");
                  
                    if($temp -> num_rows > 0)
                    {
                       

                        $sql1 = "UPDATE appointment SET numberOfSeats = numberOfSeats+1 WHERE session_num =$time ";
                          mysqli_query($conn,$sql1);
                       
                       $delete = "DELETE FROM ready WHERE session_num = $time";
                       mysqli_query($conn,$delete);
                       header("location: ../SESERVER/zDinein.php");

                    }


                   


                }

                    $search = $conn -> query("SELECT FullName,phoneNumber FROM info WHERE username = '$username'");
                    $row = $search->fetch_assoc();
                    $name = $row['FullName'];
                    $phone = $row['phoneNumber'];
                
                    $result = $conn -> query("SELECT session_num,day,startTime FROM ready WHERE phoneNumber ='$phone' AND FullName ='$name'");
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
                                echo "</tr>";         
                            }
                        }
                    
                        $i++;
                    }   
                
                
                
                
                ?>
                </table>
                <form action = "zDinein.php" method = "POST"> 

                Cancel your appointment session: <input type ="number"  name = 'session1' value = 1 min = 1 max = 20>
                        <button type = "submit" name = "submit1">Cancel</button>
                </form>
                    





 </div>
 </div>