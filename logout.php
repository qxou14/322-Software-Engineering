<?php 

session_start();
session_unset();
session_destroy();

header("location: ../SESERVER/index.php");
exit();

?>