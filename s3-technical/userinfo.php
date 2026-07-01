<?php

session_start();

include("db.php");

if(!isset($_SESSION['username']))
{
    header("Location: login.php");
}

$username = $_SESSION['username'];

$sql = "SELECT * FROM users WHERE username='$username'";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);

$message = "";

if(isset($_POST['reset']))
{
    if($_POST['current'] == $row['password'])
    {
        if($_POST['new'] == $_POST['renew'])
        {
            $newpassword = $_POST['new'];

            $update = "UPDATE users
                       SET password='$newpassword'
                       WHERE username='$username'";

            mysqli_query($conn, $update);

            $message = "Password Successfully Updated";
        }
        else
        {
            $message = "New password and Re-Enter new password should be the same.";
        }
    }
    else
    {
        $message = "Current password is not the same with the old password";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>User Information</title>
</head>
<body>

<h2>User Information Form</h2>

<a href="logout.php">Log-out</a>

<br><br>

<?php
echo "Welcome " . $row['fname'] . " " . $row['mname'] . " " . $row['lname'];
?>

<br><br>

Birthday:
<?php echo $row['birthday']; ?>

<br><br>

Email:
<?php echo $row['email']; ?>

<br><br>

Contact:
<?php echo $row['contact']; ?>

<hr>

<h3>RESET PASSWORD</h3>

<?php
echo $message;
?>

<br><br>

<form method="POST">

    Enter Current Password:<br>
    <input type="password" name="current">
    <br><br>

    Enter New Password:<br>
    <input type="password" name="new">
    <br><br>

    Re-Enter New Password:<br>
    <input type="password" name="renew

    <input type="submit" name="reset" value="Reset Password">

</form>

</body>
</html>