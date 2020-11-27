<?php  
    
    include('header.html');
    include_once "database.php";
    include_once "functions.php";
    include_once "sectionStart.php";
    $cheif1 = "cheif1";
    $cheif1password = "cheif1password123";

    $cheif2 = "cheif2";
    $cheif2password = "cheif2password123";
    
?>
<link rel = "stylesheet" type = "text/css" href ="style.css">


<form action = "cheifloginPlace.php" method = "POST">
        <label>Username:</label>
        <input type = "text" name = "username">
        <br>
        <label>Password:</label>
        <input type = "password" , name = "password">
        <br>
        <input type = "submit">
</form>

<?php 
    if(isset($_POST["username"]) && isset($_POST["password"]))
    {

        $enterU = $_POST["username"];
        $enterP = $_POST["password"];

        if(($cheif1 == $enterU && $cheif1password == $enterP) || ($cheif2 == $enterU && $cheif2password == $enterP))
        {
            $_SESSION['username'] = $enterU;
            header("location: ../SESERVER/cheifmeun.php");
        }
        else{
            echo "Please re-enter your info";
        }
        
    }
?>