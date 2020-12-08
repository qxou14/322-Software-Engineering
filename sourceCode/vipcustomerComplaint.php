<?php 
    include "sectionStart.php";
    include "database.php"; 
    include "functions.php";
?>

<link rel = "stylesheet" type = "text/css" href ="style.css">
<link rel = "stylesheet" type = "text/css" href ="reset2.css">
<link rel = "stylesheet" type = "text/css" href ="customerComplaint.css">
<style>
    button{
    border-radius: 10px;
    background-image: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
}
</style>

<div class="box">
<div class="return">
    <a href="vipafterlogin.php">Click to return to the previous page </a>
</div>

<div class="complain">
<form action = "vipcustomerComplaint.php" method = "POST">
        <h1>To Complain/Compliment a person</h1>
        <h3>Your username:</h3>
        <input class="user-name" type="text"  name="complainant" placeholder="Input your username">
        <h3>The person you want to Complain/Compliment:</h3>
        <input class="user-name" type = "text" name = "complainedPerson" placeholder = "Username of complained/complimented person">
        <h3>Write your Complain/Compliment</h3>
        <textarea class="user-input" name="complaint" placeholder="Write your complaint/compliment"></textarea>   
        <div class="sub-butt">
        <button type = "submit" name = "submit">Submit!</button>
        </div>
</form>

<?php

  $username = $_SESSION['username'];
  $counter=0;
  


$number=count($TabooWords);
 
if(isset($_POST['complaint'])) {
  for ($x=0; $x<$number;$x++){
      if (preg_match("/$TabooWords[$x]/",$_POST['complaint'])){
            $counter++;
            $_POST['complaint']=str_replace("$TabooWords[$x]","***",$_POST['complaint']);
            $sqlt = "UPDATE info SET warning = warning+1 WHERE username = '$username'";
            mysqli_query($conn,$sqlt);

      }
  }
  
  if ($counter>=3){
    $_POST['complaint']=NULL;
  }
 
}

?>



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

            $sqlb = "SELECT level FROM info WHERE username ='$username'";
            $result = $conn->query($sqlb);
            $row = $result->fetch_assoc();
            $userType = $row['level'];

            if($userType == 0)
            {
                header("location: ../SESERVER/afterlogin.php");
            }
            else
            {
                header("location: ../SESERVER/vipafterlogin.php");
            }

            
        }
        else
        {
            echo " Please enter a valid username";
        }
    
    }


?>
<div class="complain">
<table class="complain-table" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td class=tabhead><img src="img/blank.gif" alt="" width="400" height="6"><br><b>Person Who complains/compliments</b></td>
                <td class=tabhead><img src="img/blank.gif" alt="" width="400" height="6"><br><b>Complained/Complimented person</b></td>
                <td class=tabhead><img src="img/blank.gif" alt="" width="400" height="6"><br><b>Compliant/Compliment</b></td>
                <td class=tabhead><img src="img/blank.gif" alt="" width="400" height="6"><br><b>Dispute</b></td>
            </tr>
</div>

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

<div class="dispute">
<h1>Dispute </h1>

<form action = "vipcustomerComplaint.php" method = "POST">
        <h3>Your username:</h3>
        <input class="user-name" type="text"  name="BCP" placeholder="Input your username">
        <h3>Username of person who complained you:</h3>
        <input class="user-name" type="text"  name="CP" placeholder="Username of person who complained you">
        <h3>Reason to dispute the complaint</h3>
        <textarea class="user-input" name="dispute" placeholder="Write down your argument"></textarea> 
        <div class="sub-butt">
        <button type = "submit" name = "submit">Done!</button>
        </div>
</div>



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

            $sql5 = "SELECT level FROM info WHERE username ='$username'";
            $result = $conn->query($sql5);
            $row = $result->fetch_assoc();
            $userType = $row['level'];

            if($userType == 0)
            {
                header("location: ../SESERVER/afterlogin.php");
            }
            else
            {
                header("location: ../SESERVER/vipafterlogin.php");
            }

            
        }
        else
        {
            echo " Please enter a valid argument";
        }
      
    }
    ?>
    </div>