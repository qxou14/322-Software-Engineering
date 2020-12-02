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
        <?php 
            if($_SESSION['username'] == "cheif1")
            {
                echo '<li><a href = "cheif1.php">Edit Meun</a></li>';
            }
            else if ($_SESSION['username'] == "cheif2")
            {
                echo '<li><a href = "cheif2.php">Edit Meun</a></li>';
            } 
        
        ?> 
        
        <li><a href = "logout.php"> log out </a></li>
    </u1>
</div>
    
