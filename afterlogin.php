<?php 
    include "sectionStart.php";
    include "database.php";
    require"menu.php";

?>


<h3><i>Welcome User: <?php echo $_SESSION['username']; ?> <i></h3>

<?php 
    $username = $_SESSION['username'];
    $sql = "SELECT saving FROM info  WHERE username = '$username' ";

    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    echo "<h3><i> Money left: {$row['saving']} </i></h3>";

    $sql = "SELECT warning FROM info  WHERE username = '$username' ";
    $result = $conn->query($sql);
    $row = $result ->fetch_assoc();
    echo "<h3><i> Warnings: {$row['warning']} </i></h3>";

?>

