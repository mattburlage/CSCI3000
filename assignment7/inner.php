<?php
session_start();

if(!isset($_SESSION['name'])) {
    header("Location: index.php");
    exit();
}


?>
<html lang="en">
<head>
    <title>Profile</title>
</head>
<body>
Logged in as <? echo $_SESSION['name'];?>
<br><br>
<a href="logout.php">Logout</a>
</body>
</html>
