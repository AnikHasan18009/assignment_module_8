<?php
session_start();
echo "<h1>Welcome, ".$_SESSION["fname"]."!</h1>";
exit();
?>