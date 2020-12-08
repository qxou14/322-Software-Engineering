


<link rel = "stylesheet" type = "text/css" href ="style.css">
<?php  
    
    include_once "database.php";
    include_once "functions.php";
    include_once "sectionStart.php";
    $username = $_SESSION["username"];

    $sql1 = "SELECT level FROM info WHERE username ='$username'";
    $result = $conn->query($sql1);
    $row = $result->fetch_assoc();
    $userType = $row['level'];

    if($userType == 0)
    {?>
        <div class = "introduction"> The Online Restaurant </div>

<div class = "look">
    <span><a href="afterlogin.php"> Order </a></span>
    <span><a href = "customerComplaint.php">Complain</a></span>
    <span><a href = "deposit.php"> Deposit</a></span>
    <span><a href = "cancelAccount.php"> Cancellation</a></span>
    <span><a href = "logout.php"> Log out</a></span>
</div>

<h3><i>Welcome  User: <?php echo $_SESSION['username']; ?> <i></h3>
    <?php }

    else
    {?>
       <div class = "introduction"> The Online Restaurant </div>

<div class = "look">
    <span><a href="vipafterlogin.php"> Order </a></span>
    <span><a href = "vipcustomerComplaint.php">Complain</a></span>
    <span><a href = "deposit.php"> Deposit</a></span>
    <span><a href = "cancelAccount.php"> Cancellation</a></span>
    <span><a href = "logout.php"> Log out</a></span>
</div>

<h3><i>Welcome  VIP User: <?php echo $_SESSION['username']; ?> <i></h3>
    <?php
    }

?>



<form action = "cancelAccount.php" method = "POST">
    <label>If you want to shut down your account type "yes":</label>
        <input type = "text" name = "agree">
        <br>
        <input type = "submit">
    </form>

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

    }?>

