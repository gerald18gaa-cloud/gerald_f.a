<?php

session_start();

include("db.php");

$message = "";

if(isset($_SESSION['username']))
{
    header("Location: userinfo.php");
}

if(isset($_POST['login']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users
            WHERE username='$username'
            AND password='$password'";

    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result) > 0)
    {
        $_SESSION['username'] = $username;

        header("Location: userinfo.php");
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

<form method="POST">

    Username:<br>
    <input type="text" name="username">
    <br><br>

    Password:<br>
    <input type="password" name="password">
    <br><br>

    <input type="submit" name="login" value="Login">

</form>

</body>
</html>