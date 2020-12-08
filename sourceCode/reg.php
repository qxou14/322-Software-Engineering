<?php  
    include_once 'database.php'; 
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="login_header.css">
    <link rel="stylesheet" href="reg.css">
    <style>
        .message{
            text-align: center;
            font-size: 20px;
            color: #EFF0F1;
        }
        body{
            height: 100%;
            width: 100%;
            background-image: linear-gradient(to right, #434343 0%, black 100%);
        }
    </style>
</head>
<body>
    <div id="box">
        <div class="store-name">
            <h2>K's Cafe</h2>
        </div>
        <div class="user">
            <a class="a1" href="index.php">Home</a>
            <a class="a2" href="AboutUs.html">About us</a>
            <a class="a4" href="Contact.html">Contact us</a>
        </div>
        <div class="sign-up">
            <form action = "reg.php" method = "POST">
                <h3>Username:</h3>
                <input type= "text" name="username" placeholder = "at least 4 characters">
                <h3>Fullname:</h3>
                <input type= "text" name="fullname" placeholder = "Enter your Full name">
                <h3>Password:</h3>
                <input type= "password"  name="password" placeholder = "At least 8 letters/numbers">
                <h3>Comfirmed Password:</h3>
                <input type= "password"  name="cpassword" placeholder = "Input your password again">
                <h3>Email:</h3>
                <input type= "email" name="email" placeholder="xxx@gmail.com">
                <h3>Address:</h3>
                <input type="text" name="address" placeholder ="The place we deliver your order">
                <h3>PhoneNumber:</h3>
                <input type= "text" name="phone" placeholder = "ex:123456789">
                <div class="submit-button">
                    <button type = "submit" name = "submit">Sign up </button>
                </div>
            </form>
        </div>
    


<?php

    $Username = isset($_POST["username"]) ?$_POST["username"] : "";
    $Fullname = isset($_POST["fullname"]) ?$_POST["fullname"] : "";
    $Password = isset($_POST["password"]) ?$_POST["password"] : "";
    $check_P = isset($_POST["cpassword"]) ?$_POST["cpassword"] : "";
    $Email = isset($_POST["email"]) ?$_POST["email"] : "";
    $Addr = isset($_POST["address"]) ?$_POST["address"] : "";
    $Phone = isset($_POST["phone"]) ?$_POST["phone"] : "";


    $lenUser = strlen($Username)>=4 ? true:false;
    $lenName = strlen($Fullname)>=1 ? true:false;
    $lenPass = strlen($Password)>=8? true : false;
    $lenEmail = strlen($Email) >=4 &&strpos($Email,"@") ? true:false;
    $lenAddr = strlen($Addr) >1 ? true:false;
    $is_phone = is_numeric($Phone) && strlen($Phone) ==10 ? true:false;



if($Password == $check_P && $lenUser && $lenName && $lenPass && $lenEmail && $lenAddr && $is_phone)
{
    echo '<div class="message">Congrats! You have been registered!</div>';
    $sqlStatement = "INSERT INTO info (username,FullName,pwd,email,addr,phoneNumber,saving,warning,level) VALUES ('$Username','$Fullname','$Password','$Email','$Addr','$Phone',0,0,0);" ;
    $maketable = "CREATE TABLE $Username (username VARCHAR(20) DEFAULT '$Username' ,dishid INT,dishname VARCHAR(155),dishdesc VARCHAR(155),nooforder INT DEFAULT 0,totalorder INT DEFAULT 0,rating int DEFAULT 0,dishimage varchar(255),SPECIAL int);";
    mysqli_query($conn,$maketable);
    mysqli_query($conn,$sqlStatement);
    $adddish =  "INSERT INTO $Username (dishid,dishname,dishdesc,totalorder,rating,dishimage,SPECIAL) SELECT id,dishname,dishdesc,dishtotalorder,dishrating,dishimage,SPECIAL FROM menudish;";
    mysqli_query($conn,$adddish);
}
else if($Username == "")
{
    echo '<div class="message">Welcome!</div>';
}
else if ($Password !=$check_P ){
    echo '<div class="message">Please re-enter your password</div>';
}
else if(!$lenUser)
{
    echo '<div class="message">Please re-enter your username</div>';
}
else if(!$lenName)
{
    echo '<div class="message">Please enter your name</div>';
}
else if(!$lenPass)
{
    echo '<div class="message">Your password do not meet the requirement</div>';
}
else if(!$lenEmail)
{
    
    echo '<div class="message">Please enter a valid email</div>';
}
else if(!$lenAddr)
{
    echo '<div class="message">Please enter your address</div>';
}
else if (!$is_phone){
    echo '<div class="message">Please enter a valid phone</div>';
}

?>
</div>
</body>
</html>