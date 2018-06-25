
<?php
session_start();
$errorMsg = "";

$validUser = isset($_SESSION['login']) && $_SESSION["login"];

$username = $_REQUEST['username'] ?? '';
$password = $_REQUEST['password'] ?? '';

if(isset($_POST["sub"])) {
    $validUser = $username == "admin" && $password == "password";
    if(!$validUser) $errorMsg = "Invalid username or password.";
    else $_SESSION["login"] = true;
}

if($validUser) {
    header("Location: admin_page.php");
    die();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <title>Login</title>
</head>
<body>
<form name="input" action="" method="post">
    <label for="username">Username:</label><input type="text" value="<?= $username ?>" id="username" name="username" />
    <label for="password">Password:</label><input type="password" value="" id="password" name="password" />
    <div class="error"><?= $errorMsg ?></div>
    <input type="submit" value="Home" name="sub" />
</form>
</body>
</html>