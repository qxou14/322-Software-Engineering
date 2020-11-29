<?php 
    include "sectionStart.php";
    include "database.php";

   $id = $_GET['choice'];
   $sql = "DELETE FROM ordering WHERE orders = $id";
   mysqli_query($conn,$sql);

  
   header("location: ../SESERVER/menu.php");

?>