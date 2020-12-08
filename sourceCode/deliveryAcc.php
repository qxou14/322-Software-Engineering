<link rel = "stylesheet" type = "text/css" href ="style.css">
<link rel = "stylesheet" type = "text/css" href ="demote.css">
<link rel = "stylesheet" type = "text/css" href ="background_color.css">
<style>
    a:hover {
        color: #f60;
        text-decoration: underline;
    }
    body{
    height: 2000px;
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

    $id = $_SESSION['id'];
    $username = $_SESSION['username'];

?>



<div class = "introduction"> K's Cafe </div>

<h3><i>Welcome  User: <?php echo $username ?> <i></h3>



<div class="table">
    <table class="employee">
    <caption>Delivery List</caption>
            <tr=>
                <th>Food</th> 
                <th>quantity</th>
                <th>price</th>
                <th>Customer Name</th>
                <th>Customer Username</th>
                <th>Customer Address</th>
                <th>Customer Phone</th>
                <th>Order Time</th>
                <th>Delivered?</th>
                
            
            <tr>  

        <?php
        
        
        if(isset($_POST['username']) && isset($_POST['customername']))
        {
            $customerName = $_POST['customername'];
            $customerUserName = $_POST['username'];
          
            $sql = "UPDATE deliveryOrder  SET deliveryStatus = 'yes' WHERE delivery_id = $id and name = '$customerName' and username = '$customerUserName'";
            mysqli_query($conn,$sql);
            header("location: ../SESERVER/deliveryAcc.php");
        }
            
            $result = $conn -> query("SELECT foodName,quantity,price,name,username,addr,phone,additionTime,deliveryStatus FROM deliveryOrder 
                                            where deliveryName = '$username' and delivery_id = $id");
                $i = 0;
              
                if ($result -> num_rows >0)
                {
                    {
                        while($row = $result -> fetch_assoc())
                        {
                            echo "<tr valign='middle'>";

                            echo "<td>".$row['foodName']."</td>";
                            echo "<td>".$row['quantity']."</td>";
                            echo "<td>".$row['price']."</td>";
                            echo "<td>".$row['name']."</td>";
                            echo "<td>".$row['username']."</td>";
                            echo "<td>".$row['addr']."</td>";
                            echo "<td>".$row['phone']."</td>";
                            echo "<td>".$row['additionTime']."</td>";
                            echo "<td>".$row['deliveryStatus']."</td>";
                            echo "</tr>";         
                        }
                    }
                
                    $i++;
                } 
                        
                ?>

</table>

<form action = "deliveryAcc.php" method ="POST"> 
                <h3 class="text">
                    Customer Username
                </h3>
               <input type = "text" name = username>
                <br>
                <h3>
                    Customer Name
                </h3>
                <input type ="text" name = customername>
                <br>
                <button class="sub-butt" type = "submit" name = "submit" >Already Delivered to this User </button>


</form>



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
  <form action = "deliveryAcc.php" method = "POST">
        <h2>
            Complain/Compliment a customer
        </h2>
        <h3>
            Username of the Customer
        </h3>
        <input type = "text" name = "complainedPerson" placeholder = "Username">
        <h3>
            Your Username
        </h3>
        <input type="text"  name="complainant" placeholder="Input your username">
        <br>
        <br>
        <textarea name="complaint" placeholder="Write your complaint/compliment"></textarea>   
        <br>
        <button class="sub-butt" type = "submit" name = "submit">Done!</button>
</form>

<?php 
     

    $username = $_SESSION['username'];

    if(isset($_POST['complainedPerson'])) 
    {
    
        $a =$_POST['complainedPerson'];
        $b =$_POST['complainant'];
        $c =$_POST['complaint'];
        if(isset($b )&& isset($c))
        {


            $sqla = "INSERT INTO complaint (PWCC, CCP, ComplaintOrCompliment,Dispute ) VALUES('$b','$a','$c',NULL) ";
            mysqli_query($conn,$sqla);

           
            
        }
        else
        {
            echo " Please enter a valid username";
        }
    
    }


?>


<h1>To Dispute a complaint</h1>

<form action = "deliveryAcc.php" method = "POST">
    <h3>
        write down your reason if you dispute the complaint
    </h3>
        <textarea name="dispute" placeholder="Write down your argument"></textarea> 
        <br>
        <h3>Your Username</h3>
        <input type="text"  name="BCP" placeholder="Username">
        <h3>Username of customer who complained you</h3>
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
            echo " Please enter a valid argument";
        }
      
    }
    ?>
</div>

<div class = "logos">
    <u1>
        <li><a href = "logout.php"> log out </a></li>
    </u1>
</div>

    