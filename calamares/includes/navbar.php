<?php

// start session if no session exists
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// check if the current page is inside the admin folder
// this is used to load the correct links for admin and buyer pages
$isAdminPage = strpos($_SERVER['PHP_SELF'], '/admin/') !== false;

?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <div class="container">

        <!-- website logo and brand name -->
        <a class="navbar-brand d-flex align-items-center" href="<?php echo $isAdminPage ? '../index.php' : 'index.php'; ?>">
            <img src="<?php echo $isAdminPage ? '../logo.png' : 'logo.png'; ?>"
                 alt="CALAMARES Logo"
                 width="50"
                 height="50"
                 class="me-2">
            CALAMARES Tech Hub
        </a>

        <!-- mobile menu button -->
        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menu">

            <ul class="navbar-nav ms-auto">

                <!-- links visible to everyone -->
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $isAdminPage ? '../index.php' : 'index.php'; ?>">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $isAdminPage ? '../store.php' : 'store.php'; ?>">Store</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $isAdminPage ? '../about.php' : 'about.php'; ?>">About</a>
                </li>

                <?php if (isset($_SESSION['admin'])) { ?>

                    <!-- links shown when an admin is logged in -->
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $isAdminPage ? 'dashboard.php' : 'admin/dashboard.php'; ?>">Admin Dashboard</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $isAdminPage ? '../logout.php' : 'logout.php'; ?>">Logout</a>
                    </li>

                <?php } elseif (isset($_SESSION['email'])) { ?>

                    <!-- links shown when a buyer is logged in -->
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $isAdminPage ? '../cart.php' : 'cart.php'; ?>">Cart</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $isAdminPage ? '../logout.php' : 'logout.php'; ?>">Logout</a>
                    </li>

                <?php } else { ?>

                    <!-- links shown when no user is logged in -->
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $isAdminPage ? '../register.php' : 'register.php'; ?>">Register</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $isAdminPage ? '../login.php' : 'login.php'; ?>">Login</a>
                    </li>

                <?php } ?>

            </ul>

        </div>

    </div>

</nav>