<?php  
    
    include('header.html');
    include_once "database.php";
    include_once "functions.php";
    include_once "sectionStart.php";


    $delivery1 = "delivery1";
    $delivery1pass = "delivery1password123";

    $delivery2 = "delivery2";
    $delivery2pass = "delivery2password123";

    
?>
<link rel = "stylesheet" type = "text/css" href ="style.css">


<form action = "deliveryLogin.php" method = "POST">
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

        if(($delivery1 == $enterU && $delivery1pass == $enterP) || ($delivery2 == $enterU && $delivery2pass == $enterP))
        {
            $_SESSION['username'] = $enterU;

            if($delivery1 == $enterU)
            {
                $_SESSION['id'] = 1;
            }

            elseif($delivery2 == $enterU)
            {
                $_SESSION['id'] = 2;
            }
            header("location: ../SESERVER/deliveryAcc.php");
        }
        else{
            echo "Please re-enter your info";
        }
        
    }
?>