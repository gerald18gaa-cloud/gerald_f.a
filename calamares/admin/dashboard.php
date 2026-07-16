<?php

session_start();

// allow access to admin accounts only
if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit();
}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Admin Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light d-flex flex-column min-vh-100">

    <?php include("../includes/navbar.php"); ?>

    <div class="container mt-5 flex-grow-1">

        <div class="card shadow col-md-8 mx-auto">

            <div class="card-body">

                <h1 class="mb-3">
                    Admin Dashboard
                </h1>

                <p>
                    Welcome,
                    <strong><?php echo $_SESSION['admin']; ?></strong>
                </p>

                <div class="mb-3">
                    <a href="../index.php" class="btn btn-outline-primary btn-sm">
                        Back to Main Website
                    </a>
                </div>

                <hr>

                <!-- admin menu options -->
                <div class="list-group">

                    <a href="add_product.php" class="list-group-item list-group-item-action">
                        Add Product
                    </a>

                    <a href="view_products.php" class="list-group-item list-group-item-action">
                        Manage Products (Edit/Delete)
                    </a>

                    <a href="users.php" class="list-group-item list-group-item-action">
                        User Management
                    </a>

                    <a href="reports.php" class="list-group-item list-group-item-action">
                        Inventory Report
                    </a>

                    <a href="audit_logs.php" class="list-group-item list-group-item-action">
                        Audit Log Report
                    </a>

                    <a href="../logout.php" class="list-group-item list-group-item-action text-danger">
                        Logout
                    </a>

                </div>

            </div>

        </div>

    </div>

    <?php include("../includes/footer.php"); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>