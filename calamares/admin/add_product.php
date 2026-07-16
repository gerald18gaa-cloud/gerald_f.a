<?php

session_start();

// allow access to admin accounts only
if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit();
}

include("../includes/db.php");
$message = "";

// add new product
if (isset($_POST['save'])) {

    // get product information from the form
    $category = $_POST['category'];
    $product_name = $_POST['product_name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];

    // save product information
    mysqli_query(
        $conn,
        "INSERT INTO products
        (
            category,
            product_name,
            description,
            price,
            stock
        )
        VALUES
        (
            '$category',
            '$product_name',
            '$description',
            '$price',
            '$stock'
        )"
    );

    // get current date and time
    $date = date("Y-m-d H:i:s");

    // record the action in the audit log
    mysqli_query(
        $conn,
        "INSERT INTO audit_logs
        (
            user_email,
            action_done,
            log_date
        )
        VALUES
        (
            '" . $_SESSION['admin'] . "',
            'Added Product',
            '$date'
        )"
    );

    $message = "Product Added Successfully";
}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Add Product</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light d-flex flex-column min-vh-100">

    <?php include("../includes/navbar.php"); ?>

    <div class="container mt-5 flex-grow-1">

        <h1 class="mb-4">
            Add Product
        </h1>

        <?php

        // display success message after adding a product
        if ($message != "") {
            echo "<div class='alert alert-success'>$message</div>";
        }
        ?>

        <div class="card shadow">

            <div class="card-body">

                <form method="POST">

                    <label class="form-label">
                        Category
                    </label>

                    <select name="category" class="form-select mb-3">
                        <option>Processor</option>
                        <option>Graphics Card</option>
                        <option>RAM</option>
                        <option>Storage</option>
                        <option>Motherboard</option>
                        <option>Power Supply</option>
                    </select>

                    <label class="form-label">
                        Product Name
                    </label>

                    <input type="text" name="product_name" class="form-control mb-3" required>

                    <label class="form-label">
                        Description
                    </label>

                    <textarea name="description" class="form-control mb-3" required></textarea>

                    <label class="form-label">
                        Price
                    </label>

                    <input type="number" name="price" class="form-control mb-3" required>

                    <label class="form-label">
                        Stock
                    </label>

                    <input type="number" name="stock" class="form-control mb-3" required>

                    <button type="submit" name="save" class="btn btn-success">
                        Save Product
                    </button>

                </form>

            </div>

        </div>

    </div>

    <?php include("../includes/footer.php"); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>