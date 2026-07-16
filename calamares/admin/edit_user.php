<?php

session_start();

// allow access to admin accounts only
if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit();
}

include("../includes/db.php");

$id = $_GET['id'];

// get the selected user's information
$result = mysqli_query(
    $conn,
    "SELECT * FROM users WHERE id='$id'"
);

// store user information for display in the form
$user = mysqli_fetch_assoc($result);

$message = "";

// update user role
if (isset($_POST['update'])) {

    // get selected role from the form
    $role = $_POST['role'];

    // save changes to the database
    mysqli_query(
        $conn,
        "UPDATE users
        SET role='$role'
        WHERE id='$id'"
    );

    $message = "User Updated Successfully";
}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Edit User</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light d-flex flex-column min-vh-100">

    <?php include("../includes/navbar.php"); ?>

    <div class="container mt-5 flex-grow-1">

        <h1 class="mb-4">
            Edit User
        </h1>

        <?php

        // display success message after updating a user
        if ($message != "") {
            echo "<div class='alert alert-success'>$message</div>";
        }
        ?>

        <div class="card shadow">

            <div class="card-body">

                <form method="POST">

                    <label class="form-label">
                        Name
                    </label>

                    <input type="text"
                           class="form-control mb-3"
                           value="<?php echo $user['fullname']; ?>"
                           disabled>

                    <label class="form-label">
                        Role
                    </label>

                    <select name="role" class="form-select mb-3">

                        <option value="buyer" <?php if ($user['role'] == 'buyer') echo 'selected'; ?>>
                            Buyer
                        </option>

                        <option value="admin" <?php if ($user['role'] == 'admin') echo 'selected'; ?>>
                            Admin
                        </option>

                    </select>

                    <button type="submit"
                            name="update"
                            class="btn btn-primary">
                        Update User
                    </button>

                    <a href="users.php" class="btn btn-secondary">
                        Back
                    </a>

                </form>

            </div>

        </div>

    </div>

    <?php include("../includes/footer.php"); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>