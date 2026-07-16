<?php

session_start();
include("includes/db.php");

// ensure user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

// get user id from session 
$email = $_SESSION['email'];
$user_query = mysqli_query($conn, "SELECT id FROM users WHERE email = '$email'");
$user_data = mysqli_fetch_assoc($user_query);
$user_id = $user_data['id'];

$total = 0;

// get cart items and prices for the logged in user
$result = mysqli_query(
    $conn,
    "SELECT cart.product_id, cart.quantity, products.product_name, products.price 
     FROM cart 
     INNER JOIN products ON cart.product_id = products.id 
     WHERE cart.user_id = '$user_id'"
);

?>

<!DOCTYPE html>
<html>

<head>
    <title>Checkout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100">

    <?php include("includes/navbar.php"); ?>

    <div class="container mt-5 mb-5 flex-grow-1">
        <div class="card shadow">
            <div class="card-body">
                <h1 class="mb-4">Checkout</h1>

                <div class="mb-4">
                    <h5>Customer Information</h5>
                    <p>Logged in as: <strong><?php echo htmlspecialchars($_SESSION['email']); ?></strong></p>
                </div>

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        // calculate subtotal for each product and add it to the total amount
                        while ($row = mysqli_fetch_assoc($result)) {
                            $subtotal = $row['price'] * $row['quantity'];
                            $total += $subtotal;
                        ?>

                        <!-- display product name, quantity, price and subtotal -->
                        <tr>
                            <td><?php echo htmlspecialchars($row['product_name']); ?></td>
                            <td><?php echo htmlspecialchars($row['quantity']); ?></td>
                            <td>₱<?php echo number_format($row['price'], 2); ?></td>
                            <td>₱<?php echo number_format($subtotal, 2); ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>

                <div class="text-end">
                    <h2 class="fw-bold">Total: ₱<?php echo number_format($total, 2); ?></h2>
                </div>

                <div class="text-center mt-4">
                    <a href="payment.php" class="btn btn-success btn-lg px-5">Proceed to Payment</a>
                </div>
            </div>
        </div>
    </div>

    <?php include("includes/footer.php"); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>