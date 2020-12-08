<?php  
    
    include_once "database.php";
    include_once "functions.php";
    include_once "sectionStart.php";
?>
<link rel = "stylesheet" type = "text/css" href ="style.css">
<link rel = "stylesheet" type = "text/css" href ="reset2.css">
<link rel = "stylesheet" type = "text/css" href ="cancelAccount.css">

<div class="box">
<div class = "introduction"> K's Cafe </div>
<div class = "look">
    <span><a href="vipafterlogin.php"> Order </a></span>
    <span><a href = "vipcustomerComplaint.php">Complain</a></span>
    <span><a href = "vipdeposit.php"> Deposit</a></span>
    <span><a href = "vipcancelAccount.php"> Cancellation</a></span>
    <span><a href = "logout.php"> Log out</a></span>
</div>

<h3><i>Welcome VIP User: <?php echo $_SESSION['username']; ?> <i></h3>

<div class="cancel">
<form action = "cancelAccount.php" method = "POST">
    <h3>If you want to shut down your account type "yes"</h3>
        <input class="user-input" type = "text" name = "agree">
        <br>
        <input class="button" type = "submit">
    </form>
</div>


<?php  

    if(isset($_POST['agree']))
    {
        $yes = strtolower($_POST['agree']);

        if($yes === "yes")
        {
            expire($conn,$_SESSION['username']);
            session_destroy();
            header('Refresh:5; url=http://localhost/SESERVER/index.php');
            echo "Your account has been shut down, the session will end after 5 seconds ";
        }
        else
        {
            echo "you need to enter yes in order to shut down your account";
        }

    }

?>

</div>