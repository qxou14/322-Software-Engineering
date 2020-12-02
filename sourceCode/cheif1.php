<link rel = "stylesheet" type = "text/css" href ="style.css">
<?php  
    
    include_once "database.php";
    include_once "functions.php";
    include_once "sectionStart.php";
?>


<div class = "introduction"> The Online Restaurant </div>

<h3><i>Welcome  User: <?php echo $_SESSION['username']; ?> <i></h3>
<a href="cheifmeun.php"> <b>return<b> </a>

<table>
        <caption>Popular Menu</caption>
            <tr=> 
                <th>Dish Name</th>  
                <th>Describtion</th>
                <th>Price</th>  
            <tr> 
            <?php
                

                if(isset($_POST['Nname']) && isset($_POST['row']))
                {
                    $name = $_POST['Nname'];
                    $row = $_POST['row'];
                   
                    
                    $sqlStatement = "UPDATE popdish SET dishname = '$name' WHERE id = $row" ;
                    $_POST['Nname'] = "";
                    $_POST['row']= "";
                    mysqli_query($conn,$sqlStatement);

                }

                if(isset($_POST['Ndesc']) && isset($_POST['row1']))
                {
                    $desc = $_POST['Ndesc'];
                    $row1 = $_POST['row1'];
                   
                    
                    $sqlStatement = "UPDATE popdish SET dishdesc = '$desc' WHERE id = $row1" ;
                    $_POST['Ndesc'] = "";
                    $_POST['row1']= "";
                    mysqli_query($conn,$sqlStatement);
                    
                }

                if(isset($_POST['Nprice']) && isset($_POST['row2']))
                {
                    $price = $_POST['Nprice'];
                    $row2 = $_POST['row2'];
                   
                    
                    $sqlStatement = "UPDATE popdish SET price = '$price' WHERE id = $row2" ;
                    $_POST['Nprice'] = "";
                    $_POST['row2']= "";
                    mysqli_query($conn,$sqlStatement);
                    
                }


            
                $result = $conn -> query("SELECT * FROM popdish ");
                $i = 0;
                if ($result -> num_rows >0)
                {
                    {
                        while($row = $result -> fetch_assoc())
                        {
                            echo "<tr valign='middle'>";
                            echo "<td>".$row['dishname']."</td>";
                            echo "<td>".$row['dishdesc']."</td>";
                            echo "<td>".$row['price']."</td>";
                            echo "</td>";
                            echo "</tr>";      
                        }
                    }
                
                    $i++;
                }
            ?>
    </table>

    <form action = "cheif1.php" method = "Post">

                <label>row</label>
                <input type = "number" name = "row" min = 1 max = 3 placeholder = "1 to 3 ">
                <br>
                <label>New Name:</label>
                <input type = "text" name = "Nname">
                <br>
                <button type = "submit" name = "submit">Change New Name </button>
                <br>

    </form>


    <form action = "cheif1.php" method = "Post">

                <label>row</label>
                <input type = "number" name = "row1" min = 1 max = 3 placeholder = "1 to 3 ">
                <br>
                <label>New Description:</label>
                <input type = "text" name = "Ndesc">
                <br>
                <button type = "submit" name = "submit">Change New Desc </button>
                <br>

    </form>

    <form action = "cheif1.php" method = "Post">

                <label>row</label>
                <input type = "number" name = "row2" min = 1 max = 3 placeholder = "1 to 3 ">
                <br>
                <label>New Price:</label>
                <input type = "number" min = 0 step = 0.01 name = "Nprice">
                <br>
                <button type = "submit" name = "submit">Change New Price </button>
                <br>

    </form>



