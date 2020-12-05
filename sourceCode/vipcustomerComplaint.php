<?php 
    include "sectionStart.php";
    include "database.php"; 
    include "functions.php";
?>

<a href="vipafterlogin.php"> <b>return<b> </a>
<link rel = "stylesheet" type = "text/css" href ="style.css">

<form action = "vipcustomerComplaint.php" method = "POST">
        <label>Complain/Compliment a person:</label>
        <input type = "text" name = "complainedPerson" placeholder = "Username of complained/complimented person">
        <br>
        <tr><td>Your username:</td><td> <input type="text"  name="complainant" placeholder="Input your username"></td></tr>
        <textarea name="complaint" placeholder="Write your complaint/compliment"></textarea>   
        <button type = "submit" name = "submit">Done!</button>
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

<h1>Dispute </h1>

<form action = "vipcustomerComplaint.php" method = "POST">
        <label>write down your reason if you dispute the complaint:</label>
        <textarea name="dispute" placeholder="Write down your argument"></textarea> 
        <br>
        <tr><td>Your username:</td><td> <input type="text"  name="BCP" placeholder="Input your username"></td></tr>
        <tr><td>Username of person who complained you:</td><td> <input type="text"  name="CP" placeholder="Username of person who complained you"></td></tr>
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