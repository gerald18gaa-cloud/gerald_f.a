<?php
session_start();
if (isset($_POST['submit'])) {
    $_SESSION['color1'] = $_POST['color1'];
    $_SESSION['color2'] = $_POST['color2'];
    $_SESSION['color3'] = $_POST['color3'];
    $_SESSION['color4'] = $_POST['color4'];
    $_SESSION['color5'] = $_POST['color5'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>My Favorite Color</title>
</head>
<body>
    My Favorite Color 1: <?php echo isset($_SESSION['color1']) ? $_SESSION['color1'] : ''; ?><br>
    My Favorite Color 2: <?php echo isset($_SESSION['color2']) ? $_SESSION['color2'] : ''; ?><br>
    My Favorite Color 3: <?php echo isset($_SESSION['color3']) ? $_SESSION['color3'] : ''; ?><br>
    My Favorite Color 4: <?php echo isset($_SESSION['color4']) ? $_SESSION['color4'] : ''; ?><br>
    My Favorite Color 5: <?php echo isset($_SESSION['color5']) ? $_SESSION['color5'] : ''; ?><br>
</body>
</html>