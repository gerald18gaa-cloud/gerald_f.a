<?php

session_start();

// allow access to admin accounts only
if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit();
}

include("../includes/db.php");

// check if user id exists and is numeric
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // delete selected user
    mysqli_query(
        $conn,
        "DELETE FROM users
        WHERE id='$id'"
    );
}

// return to user management page
header("Location: users.php");
exit();

?>