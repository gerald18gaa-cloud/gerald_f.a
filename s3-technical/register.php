<?php

include("db.php");

$message = "";

if(isset($_POST['submit']))
{
    if($_POST['password'] == $_POST['confirm'])
    {
        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
        $lname = $_POST['lname'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $birthday = $_POST['birthday'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];

        $sql = "INSERT INTO users
        (fname,mname,lname,username,password,birthday,email,contact)
        VALUES
        ('$fname','$mname','$lname','$username','$password','$birthday','$email','$contact')";

        if(mysqli_query($conn,$sql))
        {
            $message = "Registration Successful";
        }
        else
        {
            $message = "Error: " . mysqli_error($conn);
        }
    }
    else
    {
        $message = "Password and Confirm Password are not the same.";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
</head>
<body>

<h2>My Personal Information</h2>

<?php
echo $message;
?>

<br><br>

<form method="POST">

    First Name:<br>
    <input type="text" name="fname"><br><br>

    Middle Name:<br>
    <input type="text" name="mname"><br><br>

    Last Name:<br>
    <input type="text" name="lname"><br><br>

    Username:<br>
    <input type="text" name="username"><br><br>

    Password:<br>
    <input type="password" name="password"><br><br>

    Confirm Password:<br>
    <input type="password" name="confirm"><br><br>

    Birthday:<br>
    <input type="text" name="birthday"><br><br>

    Email:<br>
    <input type="text" name="email"><br><br>

    Contact Number:<br>
    <input type="text" name="contact"><br><br>

    <input type="submit" name="submit" value="Submit">

</form>

</body>
</html>