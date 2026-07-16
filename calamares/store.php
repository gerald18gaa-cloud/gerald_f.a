<?php

session_start();

include("includes/db.php");

?>

<!DOCTYPE html>
<html>

<head>

    <title>Store</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="d-flex flex-column min-vh-100">

    <?php include("includes/navbar.php"); ?>

    <div class="container mt-5 mb-5 flex-grow-1">

        <h1 class="text-center mb-4">
            Computer Parts Store
        </h1>

        <div class="row">

            <?php

            // get all products from the database
            $result = mysqli_query(
                $conn,
                "SELECT * FROM products"
            );

            // display each product
            while ($row = mysqli_fetch_assoc($result)) {

            ?>

                <div class="col-md-4 mb-4">

                    <div class="card shadow h-100">

                        <div class="card-body d-flex flex-column">

                            <h5 class="card-title">
                                <?php echo $row['product_name']; ?>
                            </h5>

                            <p>
                                <strong>Category:</strong>
                                <?php echo $row['category']; ?>
                            </p>

                            <p style="min-height: 40px;">
                                <?php echo $row['description']; ?>
                            </p>

                            <p>
                                <strong>Price:</strong>
                                ₱<?php echo number_format($row['price'], 2); ?>
                            </p>

                            <p>
                                <strong>Stock:</strong>
                                <?php echo $row['stock']; ?>
                            </p>

                            <?php if ($row['stock'] > 0) { ?>

                                <!-- show add to cart button if stock is available -->
                                <a href="cart.php?product_id=<?php echo $row['id']; ?>"
                                   class="btn btn-primary w-100 mt-auto">
                                    Add To Cart
                                </a>

                            <?php } else { ?>

                                <!-- show out of stock button if no stock is left -->
                                <button class="btn btn-secondary w-100 mt-auto" disabled>
                                    Out Of Stock
                                </button>

                            <?php } ?>

                        </div>

                    </div>

                </div>

            <?php

            }

            ?>

        </div>

    </div>

    <?php include("includes/footer.php"); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>