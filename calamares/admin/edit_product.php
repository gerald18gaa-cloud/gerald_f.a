<?php

session_start();

// allow access to admin accounts only
if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit();
}

include("../includes/db.php");

// check if product id exists
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: view_products.php");
    exit();
}

$id = $_GET['id'];

// get selected product information
$result = mysqli_query(
    $conn,
    "SELECT * FROM products
    WHERE id='$id'"
);

// store product information for display
$product = mysqli_fetch_assoc($result);

$message = "";

// update product information
if (isset($_POST['update'])) {

    // get updated product details from the form
    $category = $_POST['category'];
    $product_name = $_POST['product_name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];

    // save updated product information
    mysqli_query(
        $conn,
        "UPDATE products
        SET
        category='$category',
        product_name='$product_name',
        description='$description',
        price='$price',
        stock='$stock'
        WHERE id='$id'"
    );

    // get current date and time
    $date = date("Y-m-d H:i:s");

    // record the update in the audit log
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
            'Updated Product: $product_name',
            '$date'
        )"
    );

    $message = "Product Updated Successfully";

    // reload updated product information
    $result = mysqli_query(
        $conn,
        "SELECT * FROM products
        WHERE id='$id'"
    );

    $product = mysqli_fetch_assoc($result);
}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Edit Product</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light d-flex flex-column min-vh-100">

    <?php include("../includes/navbar.php"); ?>

    <div class="container mt-5 flex-grow-1">

        <div class="row justify-content-center">

            <div class="col-md-8">

                <h1 class="mb-4">
                    Edit Product
                </h1>

                <?php

                // display success message after updating a product
                if ($message != "") {
                    echo "<div class='alert alert-success'>$message</div>";
                }
                ?>

                <div class="card shadow-sm border-0">

                    <div class="card-body p-4">

                        <form method="POST">

                            <div class="mb-3">
                                <label class="form-label">Category</label>
                                <input type="text"
                                       name="category"
                                       class="form-control"
                                       value="<?php echo $product['category']; ?>"
                                       required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Product Name</label>
                                <input type="text"
                                       name="product_name"
                                       class="form-control"
                                       value="<?php echo $product['product_name']; ?>"
                                       required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea
                                    name="description"
                                    class="form-control"
                                    rows="3"
                                    required><?php echo $product['description']; ?></textarea>
                            </div>

                            <div class="row">

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Price</label>
                                    <input type="number"
                                           step="0.01"
                                           name="price"
                                           class="form-control"
                                           value="<?php echo $product['price']; ?>"
                                           required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Stock</label>
                                    <input type="number"
                                           name="stock"
                                           class="form-control"
                                           value="<?php echo $product['stock']; ?>"
                                           required>
                                </div>

                            </div>

                            <div class="mt-3">

                                <button type="submit"
                                        name="update"
                                        class="btn btn-primary px-4">
                                    Update Product
                                </button>

                                <a href="view_products.php" class="btn btn-secondary px-4">
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