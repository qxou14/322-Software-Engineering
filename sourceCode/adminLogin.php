<?php  
    
    include('header.html');
    include_once "database.php";
    include_once "functions.php";
    include_once "sectionStart.php";
    $username = "Admin";
    $password = "Adminpassword123";
    
?>
<link rel = "stylesheet" type = "text/css" href ="style.css">


<form action = "adminLogin.php" method = "POST">
        <label>Admin Username:</label>
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

        if($username == $enterU && $password == $enterP)
        {
            $_SESSION['username'] = $username;
            header("location: ../SESERVER/adminUser.php");
        }
        else{
            echo "Please re-enter your info";
        }
        

    }




?>