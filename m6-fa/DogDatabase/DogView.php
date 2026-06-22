<?php
$conn = new mysqli('localhost', 'root', 'root', 'DogDatabase', 8889);

$result = $conn->query("SELECT * FROM Dogs");

echo "<h1>All Registered Dogs</h1>";

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div style='border:1px solid #000; padding:10px; margin-bottom:10px; width:300px;'>";
        echo "Name: " . $row["name"] . "<br>";
        echo "Breed: " . $row["breed"] . "<br>";
        echo "Age: " . $row["age"] . "<br>";
        echo "Address: " . $row["address"] . "<br>";
        echo "Color: " . $row["color"] . "<br>";
        echo "Height: " . $row["height"] . "<br>";
        echo "Weight: " . $row["weight"] . "<br>";
        echo "</div>";
    }
} else {
    echo "No records found.";
}

$conn->close();
?>