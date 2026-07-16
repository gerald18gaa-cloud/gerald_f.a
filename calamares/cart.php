<?php

session_start();

include("includes/db.php");

// ensure user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

// find the logged in user id for cart and order transactions
$email = $_SESSION['email'];
$user_query = mysqli_query(
    $conn,
    "SELECT id FROM users
    WHERE email='$email'"
);

// get the user id from the database result
$user_data = mysqli_fetch_assoc($user_query);
$user_id = $user_data['id'];

// add product to cart
if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    // check if the selected product is already in the cart
    $check = mysqli_query(
        $conn,
        "SELECT *
        FROM cart
        WHERE user_id='$user_id'
        AND product_id='$product_id'"
    );

    // if product already exists in cart
    if (mysqli_num_rows($check) > 0) {

        // increase quantity if product already exists in cart
        mysqli_query(
            $conn,
            "UPDATE cart
            SET quantity = quantity + 1
            WHERE user_id='$user_id'
            AND product_id='$product_id'"
        );
    } else {

        // add new product to cart
        mysqli_query(
            $conn,
            "INSERT INTO cart
            (
                user_id,
                product_id,
                quantity
            )
            VALUES
            (
                '$user_id',
                '$product_id',
                '1'
            )"
        );
    }

    // refresh cart page after adding a product
    header("Location: cart.php");
    exit();
}

// remove item from cart
if (isset($_GET['remove'])) {

    // get selected product to remove from cart
    $remove_id = $_GET['remove'];
    mysqli_query(
        $conn,
        "DELETE FROM cart
        WHERE product_id='$remove_id'
        AND user_id='$user_id'"
    );

    header("Location: cart.php");
    exit();
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Shopping Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100 bg-light">

    <?php include("includes/navbar.php"); ?>

    <div class="container my-5 flex-grow-1">
        <div class="card shadow-sm">
            <div class="card-body p-4">
                <h1 class="mb-4">Shopping Cart</h1>

                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Subtotal</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total = 0;

                        // get cart items and prices for the logged in user
                        $result = mysqli_query(
                            $conn,
                            "SELECT
                            cart.product_id,
                            cart.quantity,
                            products.product_name,
                            products.price
                            FROM cart
                            INNER JOIN products
                            ON cart.product_id = products.id
                            WHERE cart.user_id='$user_id'"
                        );

                        // calculate subtotal and total amount
                        while ($row = mysqli_fetch_assoc($result)) {
                            $subtotal = $row['price'] * $row['quantity'];
                            $total += $subtotal;
                        ?>
                            <!-- display cart item details -->
                            <tr>
                                <td><strong><?php echo $row['product_name']; ?></strong></td>
                                <td><?php echo $row['quantity']; ?></td>
                                <td>₱<?php echo number_format($row['price'], 2); ?></td>
                                <td>₱<?php echo number_format($subtotal, 2); ?></td>
                                <td class="text-center">
                                    <a href="cart.php?remove=<?php echo $row['product_id']; ?>" class="btn btn-outline-danger btn-sm">
                                        Remove
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

                <hr>

                <div class="d-flex justify-content-between align-items-center mt-4">
                    <h3>Total: ₱<?php echo number_format($total, 2); ?></h3>
                    <a href="checkout.php" class="btn btn-success btn-lg px-5">Proceed to Checkout</a>
                </div>
            </div>
        </div>
    </div>

    <?php include("includes/footer.php"); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>