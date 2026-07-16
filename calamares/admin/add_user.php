<?php

session_start();

// allow access to admin accounts only
if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit();
}

include("../includes/db.php");
$message = "";

// add new user
if (isset($_POST['save'])) {

    // get user information from the form
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // save user information
    mysqli_query(
        $conn,
        "INSERT INTO users (fullname, email, password, role, status)
        VALUES ('$fullname', '$email', '$password', '$role', 'verified')"
    );

    $message = "User Added Successfully.";
}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Add User</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light d-flex flex-column min-vh-100">

    <?php include("../includes/navbar.php"); ?>

    <div class="container mt-5 flex-grow-1">

        <div class="row justify-content-center">

            <div class="col-md-8">

                <div class="card shadow-sm border-0">

                    <div class="card-body p-4">

                        <h2 class="mb-4 text-center">
                            Add New User
                        </h2>

                        <?php

                        // display success message after adding a user
                        if ($message != "") {
                            echo "<div class='alert alert-success'>$message</div>";
                        }
                        ?>

                        <form method="POST">

                            <div class="mb-3">
                                <label class="form-label">Full Name</label>
                                <input type="text" name="fullname" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email Address</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Role</label>
                                <select name="role" class="form-select">
                                    <option value="buyer">Buyer</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>

                            <div class="d-grid gap-2 d-md-block">
                                <button type="submit" name="save" class="btn btn-success px-4">
                                    Save User
                                </button>

                                <a href="users.php" class="btn btn-secondary px-4">
                                    Back
                                </a>
                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <?php include("../includes/footer.php"); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>