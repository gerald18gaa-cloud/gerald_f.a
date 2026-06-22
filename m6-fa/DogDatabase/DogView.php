<?php
$conn = new mysqli('localhost', 'root', 'root', 'DogDatabase', 8889);
$result = $conn->query("SELECT * FROM Dogs");
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Registered Dogs</h1>
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div class='dog-box'>";
            echo "<strong>" . $row["name"] . "</strong><br>";
            echo "Breed: " . $row["breed"] . "<br>";
            echo "Age: " . $row["age"] . "<br>";
            echo "Address: " . $row["address"] . "<br>";
            echo "Color: " . $row["color"] . "<br>";
            echo "Height: " . $row["height"] . "<br>";
            echo "Weight: " . $row["weight"];
            echo "</div>";
        }
    } else {
        echo "<p>No records found.</p>";
    }
    $conn->close();
    ?>
    <br><a href="register.php">Add Another Dog</a>
</body>
</html>