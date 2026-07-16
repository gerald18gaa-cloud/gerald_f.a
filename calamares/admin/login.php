<?php

session_start();

include("../includes/db.php");
$message = "";

if (isset($_POST['login'])) {

    // get admin login credentials
    $email = $_POST['email'];
    $password = $_POST['password'];

    // check if admin account exists
    $result = mysqli_query(
        $conn,
        "SELECT * FROM users
        WHERE email='$email'
        AND password='$password'
        AND role='admin'"
    );

    // proceed if admin account is found
    if (mysqli_num_rows($result) > 0) {

        // save admin session information
        $_SESSION['admin'] = $email;

        header("Location: dashboard.php");
        exit();
    } else {
        // display error if login fails
        $message = "Invalid Admin Login";
    }
}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Admin Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

    <div class="container mt-5">

        <div class="row justify-content-center">

            <div class="col-md-5">

                <div class="card shadow">

                    <div class="card-body">

                        <h2 class="text-center mb-4">
                            Admin Login
                        </h2>

                        <?php
                        
                        // display login error message
                        if ($message != "") {
                            echo "<div class='alert alert-danger'>$message</div>";
                        }
                        ?>

                        <form method="POST">

                            <input type="email"
                                name="email"
                                class="form-control mb-3"
                                placeholder="Email"
                                required>

                            <input type="password"
                                name="password"
                                class="form-control mb-3"
                                placeholder="Password"
                                required>

                            <button type="submit"
                                name="login"
                                class="btn btn-primary w-100">
                                Login
                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</body>

</html>