<?php 
    include "sectionStart.php";
    include "database.php"; 
    include "functions.php";
?>

<link rel = "stylesheet" type = "text/css" href ="style.css">
<link rel = "stylesheet" type = "text/css" href ="adminComplaint.css">
<link rel = "stylesheet" type = "text/css" href ="background_color.css">
<style>
    a:hover {
        color: #f60;
        text-decoration: underline;
    }
    body{
    height: 1800px;
    width: 100%;
    background-image: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
    background-size: contain;
}
</style>


<div class="return">
    <a href="adminUser.php">Click to return to the previous page </a>
</div>
<div class = "introduction"> K's Cafe </div>


<div class="table">

<table class="table" border="0" cellpadding="0" cellspacing="0">
        <caption>Complains List</caption>
            <tr >
                <td class=tabhead><img src="img/blank.gif" alt="" width="400" height="6"><br><b>Person Who complains/compliments</b></td>
                <td class=tabhead><img src="img/blank.gif" alt="" width="400" height="6"><br><b>Complained/Complimented person</b></td>
                <td class=tabhead><img src="img/blank.gif" alt="" width="400" height="6"><br><b>Compliant/Compliment</b></td>
                <td class=tabhead><img src="img/blank.gif" alt="" width="400" height="6"><br><b>Dispute</b></td>
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
  </div>

  <form action = "adminComplaint.php" method = "POST">
      <h3 class="header3">
          To dispute a complain
      </h3>
      <h4 class="header4">
        Username of person who gave the complain/compliment
      </h4>
      <div class="user-input">
        <input type="text"  name="UP" placeholder="Username">
      </div>
      <h4 class="header4">
        Username of person who received complain/compliment
      </h4>
      <div class="user-input">
        <input type="text"  name="UC" placeholder="Username">
      </div>
      <div class="sub-butt">
        <button type = "submit" name = "submit">Done!</button>
      </div>
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
        <h3 class="header3">
            give a warning to a customer
        </h3>
        <h4 class="header4">
        Username of customer
        </h4>
        <div class="user-input">
        <input type="text"  name="WC" placeholder="Username">
        </div>
        <div class="sub-butt">
        <button type = "submit" name = "submit">Done!</button>
        </div>
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
            <h3 class="header3">
            Compliment Chef
            </h3>
            <h4 class="header4">
            name of chef
            </h4>
            <div class="user-input">
            <input type="text"  name="Ccompliment" placeholder="Username of Chef ">
            </div>
            <div class="sub-butt">
            <button type = "submit" name = "submit">Done!</button>
            </div>


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
        <h3 class="header3">
        Complain Chef   
        </h3>
        <h4 class="header4">
         Username of the chef
        </h4>
        <div class="user-input">
        <input type="text"  name="Ccomplain" placeholder="Username of Chef ">
        </div>
        <div class="sub-butt">
        <button type = "submit" name = "submit">Done!</button>
        </div>

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
        <h3 class="header3">
            Compliment Deliveryguy
        </h3>
        <h4 class="header4">
            Username of the Delivery Guy
        </h4>
        <div class="user-input">
        <input type="text"  name="Dcompliment" placeholder="Username of the DeliveryGuy ">
        </div>
        <div class="sub-butt">
        <button type = "submit" name = "submit">Done!</button>
        </div>
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
        <h3 class="header3">
            Complain Deliveryguy
        </h3>
        <h4 class="header4">
            Username of the Delivery Guy
        </h4>
        <div class="user-input">
        <input type="text"  name="Dcomplain" placeholder="Username of DeliveryGuy ">
        </div>
        <div class="sub-butt">
        <button type = "submit" name = "submit">Done!</button>
        </div>
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


<div class="table">


<table class="table"  border="0" cellpadding="0" cellspacing="0">
            <tr >
                <td class=tabhead><img src="img/blank.gif" alt="" width="400" height="6"><br><b>List of taboo words</b></td>
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
  </div>

  
