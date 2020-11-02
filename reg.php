<?php  
    include_once 'database.php'; 
?>
<br>
<hr>


<form action = "reg.php" method = "POST">
    Username:<input type= "text" name="username">
    <br>
    Fullname:<input type= "text" name="fullname">
    <br>
    Password:<input type= "password"  name="password">
    <br>
    Comfirmed Password:<input type= "password"  name="cpassword">
    <br>
    Email:<input type= "text" name="email">
    <br>
    Address: <input type="text" name="address">
    <br>
    Phone: <input type= "text" name="phone">
    <br>
    <input type= "submit">
    <br>
    
</form>


<?php

    $Username = isset($_POST["username"]) ?$_POST["username"] : "";
    $Fullname = isset($_POST["fullname"]) ?$_POST["fullname"] : "";
    $Password = isset($_POST["password"]) ?$_POST["password"] : "";
    $check_P = isset($_POST["cpassword"]) ?$_POST["cpassword"] : "";
    $Email = isset($_POST["email"]) ?$_POST["email"] : "";
    $Addr = isset($_POST["address"]) ?$_POST["address"] : "";
    $Phone = isset($_POST["phone"]) ?$_POST["phone"] : "";


if($Password == $check_P)
{
    $sqlStatement = "INSERT INTO info (username,FullName,pwd,email,addr,phoneNumber) VALUES ('$Username','$Fullname','$Password','$Email','$Addr','$Phone');" ;
    mysqli_query($conn,$sqlStatement);
}
else{
    echo "Please re-enter your password";
}




?>



