<link rel = "stylesheet" type = "text/css" href ="style.css">
<link rel = "stylesheet" type = "text/css" href ="background_color.css">
<style>
    a:hover {
        color: #f60;
        text-decoration: underline;
    }
</style>
<?php  
    
    include_once "database.php";
    include_once "functions.php";
    include_once "sectionStart.php";
?>



<div class = "introduction"> K's Cafe </div>

<h3><i>Welcome  User: <?php echo $_SESSION['username']; ?> <i></h3>


<div class = "logos">
    <u1> 
        <li><a href = "demote.php"> Demote</a></li>
        <li><a href = "fire.php"> Fire </a></li>
        <li><a href = "deregister.php"> de-register </a></li>
        <li><a href = "takeList.php"> Take-out List </a></li>
        <li><a href = "deliveryList.php"> Delivery List </a></li>
        <li><a href = "appList.php"> Appointment List </a></li>
        <li><a href = "adminComplaint.php"> Compliment/complain </a></li>
        <li><a href = "levelupUser.php"> Promote Users </a></li>  <!-- upgrade customer to VIP -->
        <li><a href = "logout.php"> log out </a></li>
    </u1>
</div>
    

