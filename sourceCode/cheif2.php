<link rel = "stylesheet" type = "text/css" href ="style.css">
<link rel = "stylesheet" type = "text/css" href ="demote.css">
<link rel = "stylesheet" type = "text/css" href ="background_color.css">
<style>
    a:hover {
        color: #f60;
        text-decoration: underline;
    }
    .row{
        width: 80px;
    }
    body{
    height: 1700px;
    }
    textarea{
    height: 200px;
    width: 400px;
    }
</style>
<?php  
    
    include_once "database.php";
    include_once "functions.php";
    include_once "sectionStart.php";
    $number_of_dishes = 6;
?>


<div class="return">
    <a href="cheifmeun.php">Click to return to the previous page </a>
</div>
<div class = "introduction"> K's Cafe </div>

<h3><i>Welcome  User: <?php echo $_SESSION['username']; ?> <i></h3>

<div class="table">
    <table class="employee">
        <caption>Your Menu</caption>
            <tr=> 
                <th>Dish Name</th>  
                <th>Describtion</th>
                <th>Price</th>
                <th>Average Rating</th> 
                <th>Total number of rating</th>    
            <tr> 
            <?php
                

                if(isset($_POST['Nname']) && isset($_POST['row']))
                {
                    $name = $_POST['Nname'];
                    $row = $_POST['row'];
                   
                    
                    $sqlStatement = "UPDATE menudish SET dishname = '$name' WHERE id = $row+$number_of_dishes" ;
                    $_POST['Nname'] = "";
                    $_POST['row']= "";
                    mysqli_query($conn,$sqlStatement);

                }

                if(isset($_POST['Ndesc']) && isset($_POST['row1']))
                {
                    $desc = $_POST['Ndesc'];
                    $row1 = $_POST['row1'];
                   
                    
                    $sqlStatement = "UPDATE menudish SET dishdesc = '$desc' WHERE id = $row1+$number_of_dishes" ;
                    $_POST['Ndesc'] = "";
                    $_POST['row1']= "";
                    mysqli_query($conn,$sqlStatement);
                    
                }

                if(isset($_POST['Nprice']) && isset($_POST['row2']))
                {
                    $price = $_POST['Nprice'];
                    $row2 = $_POST['row2'];
                   
                    
                    $sqlStatement = "UPDATE menudish SET price = '$price' WHERE id = $row2+$number_of_dishes" ;
                    $_POST['Nprice'] = "";
                    $_POST['row2']= "";
                    mysqli_query($conn,$sqlStatement);
                    
                }


            
                $result = $conn -> query("SELECT * FROM menudish WHERE cheif_id = '2' order by id ASC");
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
                            echo "<td>".$row['dishrating']."</td>";
                            echo "<td>".$row['dishnoofrating']."</td>";
                            echo "</td>";
                            echo "</tr>";      
                        }
                    }
                
                    $i++;
                }
            ?>
    </table>
    

    <form action = "cheif2.php" method = "Post">

                <h3 class="text">row</h3>
                <input class="row" type = "number" name = "row" min = 1 max = 6 placeholder = "1 to 6 ">
                <br>
                <h3 class="header3">New Name</h3>
                <input type = "text" name = "Nname">
                <br>
                <button class="sub-butt" type = "submit" name = "submit">Change New Name </button>
                <br>

    </form>


    <form action = "cheif2.php" method = "Post">

                <h3 class="text">row</h3>
                <input class="row" type = "number" name = "row1" min = 1 max = 6 placeholder = "1 to 6 ">
                <br>
                <h3>New Description</h3>
                <input type = "text" name = "Ndesc">
                <br>
                <button class="sub-butt" type = "submit" name = "submit">Change New Desc </button>
                <br>

    </form>

    <form action = "cheif2.php" method = "Post">

                <h3 class="text">row</h3>
                <input class="row" type = "number" name = "row2" min = 1 max = 6 placeholder = "1 to 6 ">
                <br>
                <h3>New Price</h3>
                <input type = "number" min = 0 step = 0.01 name = "Nprice">
                <br>
                <button class="sub-butt" type = "submit" name = "submit">Change New Price </button>
                <br>

    </form>


    <h2>Customer complaint/compliment </h2>
    <div class="table">
    <table class="employee" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td class=tabhead><img src="img/blank.gif" alt="" width="400" height="6"><br><b>Person Who complains/compliments</b></td>
                    <td class=tabhead><img src="img/blank.gif" alt="" width="400" height="6"><br><b>Complained/Complimented person</b></td>
                    <td class=tabhead><img src="img/blank.gif" alt="" width="400" height="6"><br><b>Compliant/Compliment</b></td>
                    <td class=tabhead><img src="img/blank.gif" alt="" width="400" height="6"><br><b>Dispute</b></td>
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
      </div>
    
      <form action = "cheif2.php" method = "POST">
            <h3>
            write down your response to the complaint/compliment
          </h3>
          <textarea name="dispute" placeholder="Write down your response"></textarea> 
          <h3>
            Your username
          </h3>
          <input type="text"  name="BCP" placeholder="Input your username">
          <h3>
            Username of customer who complained you
          </h3>
            <input type="text"  name="CP" placeholder="Username">
            <br>
            <button class="sub-butt" type = "submit" name = "submit">Done!</button>
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
         header("location: ../SESERVER/cheif2.php");
       
     }
     ?>

</div>



