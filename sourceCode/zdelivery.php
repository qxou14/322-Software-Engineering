
<?php
    
    include "sectionStart.php"; 
    include "database.php"; 
    $username = $_SESSION['username'];
    
    
?>
<link rel = "stylesheet" type = "text/css" href ="style.css">

<div class = "introduction"> The Online Restaurant </div>
<div class = "look">
    <span><a href="afterlogin.php"> Order </a></span>
    <span><a href = "">Complain</a></span>
    <span><a href = "deposit.php"> Deposit</a></span>
    <span><a href = "cancelAccount.php"> Cancellation</a></span>
    <span><a href = "logout.php"> Log out</a></span>
</div>
</head>
<body>
<span><a href = "pickmethod.php" style = "color:blue"> Go back </a><span>
<h3><i>Welcome User: <?php echo $_SESSION['username']; ?> <i></h3>

<?php  echo"Delivered!" ?>