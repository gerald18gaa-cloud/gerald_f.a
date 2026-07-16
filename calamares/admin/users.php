<?php

session_start();

// allow access to admin accounts only
if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit();
}

include("../includes/db.php");

?>

<!DOCTYPE html>
<html>

<head>

    <title>User Management</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light d-flex flex-column min-vh-100">

    <?php include("../includes/navbar.php"); ?>

    <div class="container mt-5 flex-grow-1">

        <h1 class="mb-4">
            User Management
        </h1>

        <div class="mb-3">
            <a href="dashboard.php" class="btn btn-secondary">
                Back to Dashboard
            </a>
            <a href="add_user.php" class="btn btn-primary">
                Add User
            </a>
        </div>

        <table class="table table-bordered table-striped">

            <thead>
                <tr class="table-dark">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>

                <?php

                // get all registered users
                $result = mysqli_query($conn, "SELECT * FROM users");

                // display users one by one
                while ($row = mysqli_fetch_assoc($result)) {

                ?>

                    <!-- display user information -->
                    <tr>

                        <td><?php echo $row['id']; ?></td>

                        <td><?php echo $row['fullname']; ?></td>

                        <td><?php echo $row['email']; ?></td>

                        <td>
                            <span class="badge <?php echo ($row['role'] == 'admin') ? 'bg-danger' : 'bg-primary'; ?>">
                                <?php echo ucfirst($row['role']); ?>
                            </span>
                        </td>

                        <td>
                            <?php echo ucfirst($row['status']); ?>
                        </td>

                        <td>

                            <a href="edit_user.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <?php if ($row['id'] != 1) { ?>

                                <a href="delete_user.php?id=<?php echo $row['id']; ?>"
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('Are you sure you want to delete this user?');">
                                    Delete
                                </a>

                            <?php } ?>

                        </td>

                    </tr>

                <?php

                }

                ?>

            </tbody>

        </table>

    </div>

    <?php include("../includes/footer.php"); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>