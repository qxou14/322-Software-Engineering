<link rel = "stylesheet" type = "text/css" href ="style.css">
<?php  
    
    include_once "database.php";
    include_once "functions.php";
    include_once "sectionStart.php";
?>



<div class = "introduction"> The Online Restaurant </div>

<h3><i>Welcome  User: <?php echo $_SESSION['username']; ?> <i></h3>


<div class = "logos">
    <u1> 
        <li><a href = ""> Demote</a></li>
        <li><a href = ""> Fire </a></li>
        <li><a href = ""> Compliment/complain </a></li>
        <li><a href = "deregister.php"> de-register </a></li>
        <li><a href = ""> Compliment/complain </a></li>
        <li><a href = "logout.php"> log out </a></li>
    </u1>
</div>
    

