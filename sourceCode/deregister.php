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
            <caption>List:warning>=3</caption>
                <tr=> 
                    <th>username</th>  
                    <th>FullName</th>
                    <th>Warning</th>
                
                <tr> 
                <?php
                 if(isset($_POST['username']))
                 {
                     deleteS($conn,$_POST['username']);

                 }
                    
                    $result = $conn -> query("SELECT username,FullName,warning FROM info where warning >= 3 and level < 1");
                    $i = 0;
                    if ($result -> num_rows >0)
                    {
                        {
                            while($row = $result -> fetch_assoc())
                            {
                                echo "<tr valign='middle'>";
                                echo "<td>".$row['username']."</td>";
                                echo "<td>".$row['FullName']."</td>";
                                echo "<td>".$row['warning']."</td>";
                                echo "</tr>";         
                            }
                        }
                    
                        $i++;
                    }

                   

                    
                ?>
    </table>


    <form action = "deregister.php" method = "POST">
        <h3 class="text">
            De-register Username
        </h3>
                <input type= "text" name="username" placeholder="Username">
                <br>
                <button class="sub-butt" type = "submit" name = "submit">De-register!</button>
                <br>             
    </form>
</div>




<div class="table">
    <table class="employee">
            <caption>VIP warning >=2</caption>
                <tr=> 
                    <th>username</th>  
                    <th>FullName</th>
                    <th>Warning</th>
                
                <tr> 
                <?php

                    if(isset($_POST['username1']))
                    {
                        vipgone($conn,$_POST['username1']);

                    }
                
                    $result = $conn -> query("SELECT username,FullName,warning FROM info where warning >= 2 and level > 0");
                    $i = 0;
                    if ($result -> num_rows >0)
                    {
                        {
                            while($row = $result -> fetch_assoc())
                            {
                                echo "<tr valign='middle'>";
                                echo "<td>".$row['username']."</td>";
                                echo "<td>".$row['FullName']."</td>";
                                echo "<td>".$row['warning']."</td>";
                                echo "</tr>";         
                            }
                        }
                    
                        $i++;
                    }

                   

                    
                ?>
    </table>


    <form action = "deregister.php" method = "POST">
        <h3 class="text">
            Demote to regular
        </h3>
                <input type= "text" name="username1" placeholder="Username">
                <br>
                <button class="sub-butt" type = "submit" name = "submit">Demote!</button>
                <br>             
    </form>
</div>



<div class="table">
    <table class="employee">
            <caption>People who wants to quit</caption>
                <tr=> 
                    <th>username</th>  
                    <th>FullName</th>
                    <th>saving</th>
                    <th>Warning</th>
                
                <tr> 
                <?php

                    if(isset($_POST['username21']))
                    {
                        deleteS($conn,$_POST['username21']);

                    }
                
                    $result = $conn -> query("SELECT username,FullName,saving,warning FROM info where expire = 1");
                    $i = 0;
                    if ($result -> num_rows >0)
                    {
                        {
                            while($row = $result -> fetch_assoc())
                            {
                                echo "<tr valign='middle'>";
                                echo "<td>".$row['username']."</td>";
                                echo "<td>".$row['FullName']."</td>";
                                echo "<td>".$row['saving']."</td>";
                                echo "<td>".$row['warning']."</td>";
                                echo "</tr>";         
                            }
                        }
                    
                        $i++;
                    }

                   

                    
                ?>
    </table>


    <form action = "deregister.php" method = "POST">
        <h3 class="text">
                    Remove
        </h3>
                <input type= "text" name="username21" placeholder="Username">
                <br>
                <button class="sub-butt" type = "submit" name = "submit">Remove Username!</button>
                <br>             
    </form>
</div>