<?php

if(isset($_POST['submit']))
{
    if(isset($_POST['remember']))
    {
        setcookie("username", $_POST['username'], time() + 3600);
        setcookie("password", $_POST['password'], time() + 3600);
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>
</head>
<body>

<h2>Login Form</h2>

<form method="POST">

    Username:<br>
    <input type="text" name="username"
    value="<?php if(isset($_COOKIE['username'])) echo $_COOKIE['username']; ?>">
    <br><br>

    Password:<br>
    <input type="password" name="password"
    value="<?php if(isset($_COOKIE['password'])) echo $_COOKIE['password']; ?>">
    <br><br>

    <input type="checkbox" name="remember">
    Remember Me

    <br><br>

    <input type="submit" name="submit" value="Submit">

</form>

</body>
</html>