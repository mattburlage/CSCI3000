<?php
session_start();

$message = "";

if(isset($_POST['submit'])) {
    if(trim($_POST['name']) == 'user' && trim($_POST['pass']) == 'pass') {
        $_SESSION['name'] = trim($_POST['name']);
    } else {
        $_SESSION = array();
        session_destroy();
        $message = 'Invalid credentials.';
    }
}

if(isset($_SESSION['name'])) {
    header("Location: inner.php");
    exit();
}

?>
<html>
<head>
    <title>Login</title>
</head>
<body>
<form method="post">
    <p><? echo $message ?></p>
    <p>Login below:</p>
    <label>Username:
        <input type="text" name="name">
    </label>
    <br>
    <label>Password:
        <input type="password" name="pass">
    </label>
    <br>
    <button type="submit" name="submit">Login</button>
    <br>
    <br>
    Use <u>user</u> and <u>pass</u>.
</form>
</body>
</html>
