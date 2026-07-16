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

    <title>Inventory Report</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light d-flex flex-column min-vh-100">

    <?php include("../includes/navbar.php"); ?>

    <div class="container mt-5 flex-grow-1">

        <div class="card shadow">

            <div class="card-body">

                <h1 class="mb-4">
                    Inventory Report
                </h1>

                <a href="dashboard.php" class="btn btn-secondary mb-3">
                    Back to Dashboard
                </a>

                <table class="table table-bordered table-striped">

                    <thead>
                        <tr class="table-dark">
                            <th>Product</th>
                            <th>Category</th>
                            <th>Stock</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php

                        // get all products for the inventory report
                        $result = mysqli_query($conn, "SELECT * FROM products");

                        // display products one by one
                        while ($row = mysqli_fetch_assoc($result)) {

                            // highlight products with low stock
                            $stockClass = ($row['stock'] < 5) ? 'text-danger fw-bold' : '';

                        ?>
                            
                            <!-- display product inventory information -->
                            <tr>

                                <td>
                                    <?php echo htmlspecialchars($row['product_name']); ?>
                                </td>

                                <td>
                                    <?php echo htmlspecialchars($row['category']); ?>
                                </td>

                                <td class="<?php echo $stockClass; ?>">
                                    <?php echo htmlspecialchars($row['stock']); ?>
                                </td>

                                <td>

                                    <?php if ($row['stock'] == 0) { ?>

                                        <span class="badge bg-danger">
                                            Out of Stock
                                        </span>

                                    <?php } elseif ($row['stock'] < 5) { ?>

                                        <span class="badge bg-warning text-dark">
                                            Low Stock
                                        </span>

                                    <?php } else { ?>

                                        <span class="badge bg-success">
                                            In Stock
                                        </span>

                                    <?php } ?>

                                </td>

                            </tr>

                        <?php

                        }

                        ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

    <?php include("../includes/footer.php"); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>