
<?php
    
    include "sectionStart.php"; 
    include "database.php"; 
    $username = $_SESSION['username'];
    
    
?>
<link rel = "stylesheet" type = "text/css" href ="style.css">
<link rel = "stylesheet" type = "text/css" href ="background_color.css">
<style>
    
    a:hover {
    color: #f60;
    text-decoration: underline;
  }
</style>


</head>
<body>
<div class = "introduction"> K's Cafe </div>
<div class = "look">
    <span><a href="afterlogin.php"> Order </a></span>
    <span><a href = "zDinein.php">Dine in </a></span>
    <span><a href = "">Complain</a></span>
    <span><a href = "deposit.php"> Deposit</a></span>
    <span><a href = "cancelAccount.php"> Cancellation</a></span>
    <span><a href = "logout.php"> Log out</a></span>
</div>
<h3><i>Welcome User: <?php echo $_SESSION['username']; ?> <i></h3>

<?php 
    $username = $_SESSION['username'];
    
    $sql = "SELECT warning FROM info  WHERE username = '$username' ";
    $result = $conn->query($sql);
    $row = $result ->fetch_assoc();
    echo "<h3><i> Warnings: {$row['warning']} </i></h3>";

    $sql = "SELECT saving FROM info  WHERE username = '$username' ";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $balance = $row['saving'];
    echo "<h3><i> Money left: {$row['saving']} </i></h3>";

?>


<h1 style ="text-align:center"> Choose your option: </h1>

<form action = "pickmethod.php" method = "POST"> 

<button type ="submit" name = "submit" value = "Take" class ="buttons"> Take out </button> 
<button type ="submit" name = "submit" value = "Deliver" class ="buttons"> Delivery </button>  

</form>

<?php 

    if(isset($_POST['submit']))
    {
        $choose = $_POST['submit'];
        /*$sqlD = "DELETE FROM ordering WHERE username = '$username'";
         mysqli_query($conn,$sqlD);  */

        switch($choose)
        {
         
            case "Take":
                header("location: ../SESERVER/zTakeout.php");
            break;

            case "Deliver":
                header("location: ../SESERVER/zdelivery.php");
            break;

        }
    }


?>