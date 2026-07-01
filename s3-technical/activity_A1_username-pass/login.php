<?php

session_start();

$user = "admin";
$pass = "12345";

$message = "";

if(isset($_SESSION['username']))
{
    header("Location: home.php");
}

if(isset($_POST['submit']))
{
    if($_POST['username'] == $user &&
       $_POST['password'] == $pass)
    {
        $_SESSION['username'] = $_POST['username'];

        header("Location: home.php");
    }
    else
    {
        $message = "Invalid Username or Password";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<h2>Login Form</h2>

<?php
echo $message;
?>

<br><br>

<form method="POST">

    Username:<br>
    <input type="text" name="username">
    <br><br>

    Password:<br>
    <input type="password" name="password">
    <br><br>

    <input type="submit" name="submit" value="Login">

</form>

</body>
</html>