
<?php 
    include "sectionStart.php";
    include "database.php"; 
?>

<link rel = "stylesheet" type = "text/css" href ="reset.css">
<link rel = "stylesheet" type = "text/css" href ="deposit.css">

<div class="box">
<div class="return">
    <a href="afterlogin.php">Click to return to the previous page </a>
</div>

<div class="deposit">
<form action = "deposit.php" method = "POST">
    <h3>Enter your Credit Card:</h3>
    <input type = "text" name = "tmp" placeholder="Card number:">
    <h3>Money you want to deposit:</h3>
    <input type = "text" name = "money" placeholder="Enter the amount">
    <div class="sub-butt">
    <button type = "submit" name = "submit">Deposit!</button>
    </div>
</form>
</div>
</div>

<?php 

    $username = $_SESSION['username'];

    if(isset($_POST['money']))
    {
        $a = $_POST['money'];
        if(is_numeric($a))
        {

            $sql = "UPDATE info SET saving = saving+'$a' WHERE username = '$username'";
            mysqli_query($conn,$sql);

            $sql1 = "SELECT level FROM info WHERE username ='$username'";
            $result = $conn->query($sql1);
            $row = $result->fetch_assoc();
            $userType = $row['level'];

            if($userType == 0)
            {
                header("location: ../SESERVER/afterlogin.php");
            }
            else
            {
                header("location: ../SESERVER/vipafterlogin.php");
            }

            
        }
        else
        {
            echo " Please enter a valid number";
        }
    }



?>