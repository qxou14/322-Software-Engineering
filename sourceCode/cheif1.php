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

    <h1>Customer complaint/compliment </h1>
    
    <table border="0" cellpadding="0" cellspacing="0">
                <tr bgcolor="#f87820">
                    <td class=tabhead><img src="img/blank.gif" alt="" width="400" height="6"><br><b>Person Who complains/compliments</b></td>
                    <td class=tabhead><img src="img/blank.gif" alt="" width="400" height="6"><br><b>Complained/Complimented person</b></td>
                    <td class=tabhead><img src="img/blank.gif" alt="" width="400" height="6"><br><b>Compliant/Compliment</b></td>
                    <td class=tabhead><img src="img/blank.gif" alt="" width="400" height="6"><br><b>Dispute</b></td>
                    <td><img src="img/blank.gif" alt="" width="10" height="25"></td>
                </tr>
    
    <?php
         $username = $_SESSION['username'];
          $sql2 = "SELECT PWCC, CCP, ComplaintOrCompliment, Dispute FROM complaint WHERE CCP='$username'; ";
          $sql3=mysqli_query($conn,$sql2);
          $resultCheck=mysqli_num_rows($sql3);
          if($resultCheck>0){
         while ($row = mysqli_fetch_array($sql3)) {
             echo "<tr valign='middle'>";
             echo "<td>".$row['PWCC']."</td>";
             echo "<td>".$row['CCP']."</td>";
             echo "<td>".$row['ComplaintOrCompliment']."</td>";
             echo "<td>".$row['Dispute']."</td>";
    
             echo "</td>";
             echo "</tr>";
          
         }
        }
    
    ?>
      </table>
    
      <form action = "cheif1.php" method = "POST">
            <label>write down your response to the complaint/compliment:</label>
            <textarea name="dispute" placeholder="Write down your response"></textarea> 
            <br>
            <tr><td>Your username:</td><td> <input type="text"  name="BCP" placeholder="Input your username"></td></tr>
            <tr><td>Username of customer who complained you:</td><td> <input type="text"  name="CP" placeholder="Username of person who complained you"></td></tr>
            <button type = "submit" name = "submit">Done!</button>
    </form>

    <?php 
     

     $username = $_SESSION['username'];
 
     if(isset($_POST['dispute']))
     {
    
      
         $d =$_POST['dispute'];
         $e=$_POST['BCP'];
         $f=$_POST['CP'];
         if(isset($e) && isset($f))
         {
 
             $sql4 = "UPDATE complaint SET Dispute ='$d' WHERE PWCC='$f' AND CCP='$e' ";
             mysqli_query($conn,$sql4);
 
             
         }
         else
         {
             echo " Please enter a valid response";
         }
       
     }
     ?>