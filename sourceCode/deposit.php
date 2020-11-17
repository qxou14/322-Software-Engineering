
<?php 
    include "sectionStart.php";
    include "database.php"; 
?>

<a href="afterlogin.php"> <b>return<b> </a>
<link rel = "stylesheet" type = "text/css" href ="style.css">

<form action = "deposit.php" method = "POST">
        <label>Money you want to deposit:</label>
        <input type = "text" name = "money">
        <br>
        <button type = "submit" name = "submit">Deposit!</button>
</form>


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