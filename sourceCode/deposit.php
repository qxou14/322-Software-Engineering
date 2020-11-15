
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
            header("location: ../SESERVER/afterlogin.php");
        }
        else
        {
            echo " Please enter a valid number";
        }
    }



?>