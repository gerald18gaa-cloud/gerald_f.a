<?php

session_start();

include("includes/db.php");
$message = "";

if (isset($_POST['login']))
{
    // get login details from the form
    $email = $_POST['email'];
    $password = $_POST['password'];

    // check if account exists and is already verified
    $result = mysqli_query(
        $conn,
        "SELECT * FROM users
        WHERE email='$email'
        AND password='$password'
        AND status='verified'"
    );

    // check if the user exists in the database
    if (mysqli_num_rows($result) > 0)
    {
        // save information in the session after successful login
        $user = mysqli_fetch_assoc($result);
        $_SESSION['email'] = $user['email'];
        $_SESSION['role'] = $user['role'];

        // redirect admin to dashboard
        if ($user['role'] == 'admin')
        {
            $_SESSION['admin'] = $user['email'];
            header("Location: admin/dashboard.php");
            exit();
        }
        else
        {
            // redirect buyer to store page
            header("Location: store.php");
            exit();
        }
    }
    else
    {
        // display error if login fails
        $message = "Invalid Email or Password";
    }
}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="d-flex flex-column min-vh-100">

    <?php include("includes/navbar.php"); ?>

    <div class="container flex-grow-1 d-flex align-items-center justify-content-center py-5">

        <div class="col-md-5">

            <div class="card shadow">

                <div class="card-body">

                    <h2 class="text-center mb-4">
                        Login
                    </h2>

                    <?php 
                    
                    // display login error message
                    if($message != "") { ?>

                    <div class="alert alert-danger">

                        <?php echo $message; ?>

                    </div>

                    <?php } ?>

                    <form method="POST">

                        <label class="form-label">
                            Email Address
                        </label>

                        <input
                            type="email"
                            name="email"
                            class="form-control mb-3"
                            required>

                        <label class="form-label">
                            Password
                        </label>

                        <input
                            type="password"
                            name="password"
                            class="form-control mb-3"
                            required>

                        <button
                            type="submit"
                            name="login"
                            class="btn btn-primary w-100">

                            Login

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

    <?php include("includes/footer.php"); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>