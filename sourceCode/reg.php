<?php  
    include_once 'database.php'; 
    include('header.html')
    
?>

<link rel = "stylesheet" type = "text/css" href ="style.css">

<br>
<hr>


<div class = "login_info">
    <form action = "reg.php" method = "POST">
        Username:<input type= "text" name="username" placeholder = "at least 4 characters">
        <br>
        Fullname:<input type= "text" name="fullname" placeholder = "Enter your Full name">
        <br>
        Password:<input type= "password"  name="password" placeholder = "At least 8 letters/numbers">
        <br>
        Comfirmed Password:<input type= "password"  name="cpassword" placeholder = " same as password">
        <br>
        Email:<input type= "email" name="email" placeholder="xxx@gmail.com">
        <br>
        Address: <input type="text" name="address" placeholder ="Wrong = delayed order">
        <br>
        Phone: <input type= "text" name="phone" placeholder = "ex:123456789">
        <br>
        <button type = "submit" name = "submit">Sign up </button>
        <br>
        
    </form>

<div>


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
    echo "Congrats ! You have been registered!";
    $sqlStatement = "INSERT INTO info (username,FullName,pwd,email,addr,phoneNumber,saving,warning) VALUES ('$Username','$Fullname','$Password','$Email','$Addr','$Phone',0,0);" ;
    mysqli_query($conn,$sqlStatement);
}
else if($Username == "")
{
    echo "Welcome!";
}
else if ($Password !=$check_P ){
    echo "Please re-enter your password";
}
else if(!$lenUser)
{
    echo "Please re-enter your username!";
}
else if(!$lenName)
{
    echo "Please enter your name!";
}
else if(!$lenPass)
{
    echo "Your password do not meet the requirement.";
}
else if(!$lenEmail)
{
    echo "Please enter a valid email";
}
else if(!$lenAddr)
{
    echo "Please enter your address";
}
else if (!$is_phone){
    echo "Please enter a valid phone";
}


?>

