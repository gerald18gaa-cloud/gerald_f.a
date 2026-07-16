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

    <title>View Products</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light d-flex flex-column min-vh-100">

    <?php include("../includes/navbar.php"); ?>

    <div class="container mt-5 flex-grow-1">

        <h1 class="mb-4">
            Product Management
        </h1>

        <a href="add_product.php" class="btn btn-primary mb-3">Add New Product</a>

        <table class="table table-bordered table-striped">

            <tr class="table-dark">

                <th>ID</th>
                <th>Category</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Action</th>

            </tr>

            <?php

            // get all products from the database
            $result = mysqli_query(
                $conn,
                "SELECT * FROM products"
            );

            // display products one by one
            while ($row = mysqli_fetch_assoc($result)) {

            ?>

                <!-- display product information -->
                <tr>

                    <td>
                        <?php echo $row['id']; ?>
                    </td>

                    <td>
                        <?php echo $row['category']; ?>
                    </td>

                    <td>
                        <?php echo $row['product_name']; ?>
                    </td>

                    <td>
                        ₱<?php echo number_format($row['price'], 2); ?>
                    </td>

                    <td>
                        <?php echo $row['stock']; ?>
                    </td>

                    <td>
                        <a href="edit_product.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">
                            Edit
                        </a>
                    </td>

                </tr>

            <?php

            }

            ?>

        </table>

    </div>

    <?php include("../includes/footer.php"); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>