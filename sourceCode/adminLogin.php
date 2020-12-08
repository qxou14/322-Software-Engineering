<?php  
    
    include_once "database.php";
    include_once "functions.php";
    include_once "sectionStart.php";
    $username = "Admin";
    $password = "Adminpassword123";
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="manager_login.css">
    <link rel="stylesheet" href="iconfont.css">
</head>
<body>
    <div class="box">
        <div class="wrapper">
            <h1 class="Store-name">K's Cafe</h1>
            
            <div class="Manager-login">
                <h3>Manager Login</h3>
            </div>
            <form action = "adminLogin.php" method = "POST">
            <div class="username">
                <span class="iconfont">&#xe617;</span>
                <input type="text" name = "username" placeholder="Username">
            </div>
            <div class="password">
                <span class="iconfont">&#xe6a8;</span>
                <input type="password" name = "password" placeholder="Password">
            </div>
            <div class="login-icon">
                <input type="submit" value="Login">
            </div>
            </form>
        </div>
    </div>


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

</body>
</html>