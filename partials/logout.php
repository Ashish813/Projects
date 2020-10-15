<?php  


session_start();

echo "<h2>Wait!Some time... </h2>";
session_destroy();
header("location: ../index.php");

?>