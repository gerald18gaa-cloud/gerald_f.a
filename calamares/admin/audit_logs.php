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

    <title>Audit Log Report</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light d-flex flex-column min-vh-100">

    <?php include("../includes/navbar.php"); ?>

    <div class="container mt-5 flex-grow-1">

        <h1 class="mb-4">
            Audit Log Report
        </h1>

        <a href="dashboard.php" class="btn btn-secondary mb-3">
            Back to Dashboard
        </a>

        <table class="table table-bordered table-striped">

            <thead>
                <tr class="table-dark">
                    <th>User</th>
                    <th>Activity</th>
                    <th>Date</th>
                </tr>
            </thead>

            <tbody>

                <?php

                // get all audit logs from newest to oldest
                $result = mysqli_query(
                    $conn,
                    "SELECT * FROM audit_logs
                    ORDER BY id DESC"
                );

                // display audit log records one by one
                while ($row = mysqli_fetch_assoc($result)) {

                ?>

                    <!-- display audit log information -->
                    <tr>

                        <td>
                            <?php echo htmlspecialchars($row['user_email']); ?>
                        </td>

                        <td>
                            <?php echo htmlspecialchars($row['action_done']); ?>
                        </td>

                        <td>
                            <?php echo htmlspecialchars($row['log_date']); ?>
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