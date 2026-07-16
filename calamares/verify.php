<?php

include("includes/db.php");

$message = "";

if (isset($_GET['email'])) {

    // get the email from the verification link
    $email = $_GET['email'];

    mysqli_query(
        $conn,
        "UPDATE users
        SET status='verified'
        WHERE email='$email'"
    );

    // success message
    $message = "Account Successfully Verified.";

} else {

    // show message if no email is received
    $message = "Invalid Verification Link.";
}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Verify Account</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="d-flex flex-column min-vh-100">

    <?php include("includes/navbar.php"); ?>

    <div class="container flex-grow-1 d-flex align-items-center justify-content-center mt-4">

        <div class="col-md-6">

            <div class="card shadow">

                <div class="card-body text-center">

                    <h2 class="mb-4">
                        Account Verification
                    </h2>

                    <div class="alert alert-success">
                        <?php echo $message; ?>
                    </div>

                    <a href="login.php" class="btn btn-primary">
                        Go To Login
                    </a>

                </div>

            </div>

        </div>

    </div>

    <?php include("includes/footer.php"); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>