<?php

session_start();

include("includes/db.php");

$message = "";

if (isset($_POST['confirm'])) {

    // get logged in user
    $email = $_SESSION['email'];

    // get the user id of the logged in account
    $user_query = mysqli_query(
        $conn,
        "SELECT id
        FROM users
        WHERE email='$email'"
    );

    // store the user id so it can be used when saving the order
    $user = mysqli_fetch_assoc($user_query);
    $user_id = $user['id'];

    // get selected payment method
    $payment_method = $_POST['payment_method'];

    // compute total amount from cart
    $total = 0;
    $cart_result = mysqli_query(
        $conn,
        "SELECT cart.*, products.price
        FROM cart
        INNER JOIN products
        ON cart.product_id = products.id
        WHERE cart.user_id = '$user_id'"
    );

    // calculate total order amount
    while ($cart = mysqli_fetch_assoc($cart_result)) {
        $total += ($cart['price'] * $cart['quantity']);
    }

    // get current date and time
    $date = date("Y-m-d H:i:s");

    // save order information
    mysqli_query(
        $conn,
        "INSERT INTO orders
        (
            user_id,
            total,
            payment_method,
            status,
            order_date
        )
        VALUES
        (
            '$user_id',
            '$total',
            '$payment_method',
            'Pending',
            '$date'
        )"
    );

    // clear shopping cart after successful order
    mysqli_query(
        $conn,
        "DELETE FROM cart
        WHERE user_id='$user_id'"
    );

    $message = "Order Successfully Placed.";
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Payment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100 bg-light">

    <?php include("includes/navbar.php"); ?>

    <div class="container mt-5 flex-grow-1">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-4">
                        <h1 class="mb-4">Payment Method</h1>

                        <?php

                        // display success message after placing the order
                        if ($message != "") {
                            echo "<div class='alert alert-success'>$message</div>";
                        }
                        ?>

                        <form method="POST">
                            <div class="mb-3">
                                <label class="form-label">Select Payment Method</label>
                                <select name="payment_method" class="form-select">
                                    <option>Cash On Delivery</option>
                                    <option>GCash</option>
                                    <option>Bank Transfer</option>
                                </select>
                            </div>

                            <button type="submit" name="confirm" class="btn btn-primary w-100">
                                Confirm Order
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include("includes/footer.php"); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>