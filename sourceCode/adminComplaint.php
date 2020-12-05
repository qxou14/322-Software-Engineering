<?php 
    include "sectionStart.php";
    include "database.php"; 
    include "functions.php";
?>
<a href="adminUser.php"> <b>return<b> </a>
<link rel = "stylesheet" type = "text/css" href ="style.css">

<table border="0" cellpadding="0" cellspacing="0">
            <tr bgcolor="#f87820">
                <td class=tabhead><img src="img/blank.gif" alt="" width="400" height="6"><br><b>Person Who complains/compliments</b></td>
                <td class=tabhead><img src="img/blank.gif" alt="" width="400" height="6"><br><b>Complained/Complimented person</b></td>
                <td class=tabhead><img src="img/blank.gif" alt="" width="400" height="6"><br><b>Compliant/Compliment</b></td>
                <td class=tabhead><img src="img/blank.gif" alt="" width="400" height="6"><br><b>Dispute</b></td>
                <td><img src="img/blank.gif" alt="" width="10" height="25"></td>
            </tr>

<?php
    
      $sql2 = "SELECT PWCC, CCP, ComplaintOrCompliment, Dispute FROM complaint ; ";
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

  <form action = "adminComplaint.php" method = "POST">
        <label>remove the row:</label>
        <br>
        <tr><td>Username of person who complained/complimented:</td><td> <input type="text"  name="UP" placeholder="Username of person who complained "></td></tr>
        <tr><td>Username of complained/complimented person:</td><td> <input type="text"  name="UC" ></td></tr>
        <button type = "submit" name = "submit">Done!</button>
</form>

<?php 
     
 
     if(isset($_POST['UP'])&&isset($_POST['UC']))
     {
    
      
         $A =$_POST['UP'];
         $B=$_POST['UC'];
      
         if(isset($A) && isset($B))
         {
 
             $sql4 = "DELETE FROM complaint  WHERE PWCC='$A' AND CCP='$B' ";
             mysqli_query($conn,$sql4);
 
             
         }
         else
         {
             echo " Please enter a valid username";
         }
       
     }
     ?>


<form action = "adminComplaint.php" method = "POST">
        <label>give a warning to a customer:</label>
        <br>
        <tr><td>Username of customer :</td><td> <input type="text"  name="WC" placeholder="Username of customer "></td></tr>
        
        <button type = "submit" name = "submit">Done!</button>
</form>

<?php 
     
 
     if(isset($_POST['WC']))
     {
    
      
         $C =$_POST['WC'];
         
      
         if(isset($C) )
         {
 
             $sql5 = "UPDATE info SET warning = warning+1 WHERE username = '$C'";
             mysqli_query($conn,$sql5);
 
             
         }
         else
         {
             echo " Please enter a valid username";
         }
       
     }
     ?>

<form action = "adminComplaint.php" method = "POST">
        <label>Compliment Chef:</label>
        <br>
        <tr><td> name of chef :</td><td> <input type="text"  name="Ccompliment" placeholder="Username of Chef "></td></tr>
        
        <button type = "submit" name = "submit">Done!</button>
</form>
<?php 
     
 
     if(isset($_POST['Ccompliment']))
     {
    
      
         $C =$_POST['Ccompliment'];
         
      
         if(isset($C) )
         {
 
             $sql5 = "UPDATE cheif SET compliment = compliment +1 WHERE name = '$C'";
             mysqli_query($conn,$sql5);
             $sql5 = "UPDATE cheif SET situation = compliment - complain WHERE name = '$C'";
             mysqli_query($conn,$sql5);
             
         }
         else
         {
             echo " Please enter a valid username";
         }
       
     }
     ?>
<form action = "adminComplaint.php" method = "POST">
        <label>Complain Chef:</label>
        <br>
        <tr><td> name of chef :</td><td> <input type="text"  name="Ccomplain" placeholder="Username of Chef "></td></tr>
        
        <button type = "submit" name = "submit">Done!</button>
</form>
<?php 
     
 
     if(isset($_POST['Ccomplain']))
     {
    
      
         $C =$_POST['Ccomplain'];
         
      
         if(isset($C) )
         {
 
             $sql5 = "UPDATE cheif SET complain = complain +1 WHERE name = '$C'";
             mysqli_query($conn,$sql5);
             $sql5 = "UPDATE cheif SET situation = compliment - complain WHERE name = '$C'";
             mysqli_query($conn,$sql5);
 
             
         }
         else
         {
             echo " Please enter a valid username";
         }
       
     }
     ?>
<form action = "adminComplaint.php" method = "POST">
        <label>Compliment Deliveryguy:</label>
        <br>
        <tr><td> name of Delivery Guy :</td><td> <input type="text"  name="Dcompliment" placeholder="Username of DeliveryGuy "></td></tr>
        
        <button type = "submit" name = "submit">Done!</button>
</form>
<?php 
     
 
     if(isset($_POST['Dcompliment']))
     {
    
      
         $C =$_POST['Dcompliment'];
         
      
         if(isset($C) )
         {
 
             $sql5 = "UPDATE deliverymen SET compliment = compliment +1 WHERE name = '$C'";
             mysqli_query($conn,$sql5);
             $sql5 = "UPDATE deliverymen SET situation = compliment - complain WHERE name = '$C'";
             mysqli_query($conn,$sql5);
             
         }
         else
         {
             echo " Please enter a valid username";
         }
       
     }
     ?>
<form action = "adminComplaint.php" method = "POST">
        <label>Complain Deliveryguy:</label>
        <br>
        <tr><td> name of Delivery Guy :</td><td> <input type="text"  name="Dcomplain" placeholder="Username of DeliveryGuy "></td></tr>
        
        <button type = "submit" name = "submit">Done!</button>
</form>
<?php 
     
 
     if(isset($_POST['Dcomplain']))
     {
    
      
         $C =$_POST['Dcomplain'];
         
      
         if(isset($C) )
         {
 
             $sql5 = "UPDATE deliverymen SET complain = complain +1 WHERE name = '$C'";
             mysqli_query($conn,$sql5);
             $sql5 = "UPDATE deliverymen SET situation = compliment - complain WHERE name = '$C'";
             mysqli_query($conn,$sql5);
             
         }
         else
         {
             echo " Please enter a valid username";
         }
       
     }
     ?>



<table border="0" cellpadding="0" cellspacing="0">
            <tr bgcolor="#f87820">
                <td class=tabhead><img src="img/blank.gif" alt="" width="400" height="6"><br><b>List of taboo words</b></td>
                <td><img src="img/blank.gif" alt="" width="10" height="25"></td>
            </tr>

<?php
    
     $length=count($TabooWords);
     for($x=0;$x<$length;$x++) {
         echo "<tr valign='middle'>";
         echo "<td>".$TabooWords[$x]."</td>";
         echo "</td>";
         echo "</tr>";
      
     }
    
  
?>
  </table>

  
