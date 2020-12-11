<?php  
    include_once "database.php";
    include_once "functions.php";
    include_once "sectionStart.php";  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome To K's Cafe</title>
    <link rel="stylesheet" type = "text/css" href="reset.css">
    <link rel="stylesheet" type = "text/css" href="right_login.css">
    <link rel="stylesheet" type = "text/css" href="iconfont.css">
    <link rel="stylesheet" type = "text/css" href="left_login.css">
</head>
<body>

<div class ="box">
    <div class="wrapper-left">
            <h1 class="Store-name">K's Cafe</h1>
            
            <div class="user-login">
                <h3>User Login</h3>
            </div>

        <form action = "index.php" method = "POST">
            <div class="username">
                <span class="iconfont">&#xe617;</span>
                <input type="text" name = "username" placeholder="Username">
            </div>
            <div class="password">
                <span class="iconfont">&#xe6a8;</span>
                <input type="password" name = "password" placeholder="Password">
            </div>
            <div class="sign-up">
                <h4 class="user">New User? <a href="reg.php">Sign Up</a></h4>
                <h4 class="chief">Chef login <a href="cheifloginPlace.php">Here</a></h4>
                <h4 class="deliveryman">Deliveryman login <a href="deliveryLogin.php">Here</a></h4>
                <h4 class="manager">Manager login <a href="adminLogin.php">Here</a></h4>
            </div>
            <div class="login-icon">
                <input type="submit" value="Login">
            </div>
        </form>
    </div>
    
    <div class="wrapper-right">
        <div class="store-name">
        </div>
            <div class="about-us">
                <a href="AboutUs.html" target="_blank">About Us</a>
                <a href="Contact.html" target="_blank">Contact Us</a>
                <a href = "visitorRecommended.php" target= "_black">Visit Us </a>
            </div>
            <div class="recepit">
                
            </div>
            <div class="category">
                <div class="cate-1">
                    
                </div>
                <div class="cate-2">
    
                </div>
                <div class="cate-3">
    
                </div>
                <div class="cate-4">
    
                </div>
            </div>
    </div>
</div>
<?php
    $Username = isset($_POST["username"]) ?$_POST["username"] : "";
    $Password = isset($_POST["password"]) ?$_POST["password"] : "";
    $exsited = accountExist($conn,$Username,$Password); //whether there is account or no
   

    if($Username == "" && $Password == "")
    {
        echo "";
    }
    else if($exsited === true)
    {
        $_SESSION['username'] = $Username;
        $sql = "SELECT level FROM info  WHERE username = '$Username' ";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $userType = $row['level'];

        if($userType == 0)
        {
            header("location: ../SESERVER/afterlogin.php");
        }

        else{
            header("location: ../SESERVER/vipafterlogin.php");

        }
       
        
    }
    else
    {
        echo "you enter the wrong information!";
    }
   
?>

</body>
</html>

