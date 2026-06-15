<?php
// Person 1 (10 seconds)
setcookie("p1", "Juan Santos Dela Cruz", time() + 10, "/");

// Person 2 (20 seconds)
setcookie("p2", "Maria Reyes Lopez", time() + 20, "/");

// Person 3 (30 seconds)
setcookie("p3", "Carlos Garcia Mendoza", time() + 30, "/");
?>

<html>
<body>
    <h1>Personal Information (Cookies)</h1>

    <?php
    echo "<h3>Person 1 (10 sec)</h3>";
    if (isset($_COOKIE["p1"])) {
        echo "Name: " . $_COOKIE["p1"];
    } else {
        echo "Not available yet. Please refresh.";
    }

    echo "<h3>Person 2 (20 sec)</h3>";
    if (isset($_COOKIE["p2"])) {
        echo "Name: " . $_COOKIE["p2"];
    } else {
        echo "Not available yet. Please refresh.";
    }

    echo "<h3>Person 3 (30 sec)</h3>";
    if (isset($_COOKIE["p3"])) {
        echo "Name: " . $_COOKIE["p3"];
    } else {
        echo "Not available yet. Please refresh.";
    }
    ?>

</body>
</html>