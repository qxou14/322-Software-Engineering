<?php  
    
    include('header.html');
    include_once "database.php";
    include_once "functions.php";
    include_once "sectionStart.php";
    
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel = "stylesheet" type = "text/css" href ="style.css">
</head>
<body>

<div class ="loginPlace">
    <form action = "index.php" method = "POST">
        <label>Username:</label>
        <input type = "text" name = "username">
        <br>
        <label>Password:</label>
        <input type = "password" , name = "password">
        <br>
        <input type = "submit">
        <a href="reg.php"> <b>New User<b> </a>
    </form>
</div>
<?php
    $Username = isset($_POST["username"]) ?$_POST["username"] : "";
    $Password = isset($_POST["password"]) ?$_POST["password"] : "";
    $exsited = accountExist($conn,$Username,$Password); //whether there is account or no
   

    
    if($exsited === true)
    {
        $_SESSION['username'] = $Username;
       header("location: ../SESERVER/afterlogin.php");
        
    }
    else
    {
        echo "you enter the wrong information!";
    }
   
?>

</body>
</html>
