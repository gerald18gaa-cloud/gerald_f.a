<?php
$conn = new mysqli('localhost', 'root', 'root', 'DogDatabase', 8889);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "INSERT INTO Dogs (name, breed, age, address, color, height, weight) 
            VALUES ('$_POST[name]', '$_POST[breed]', '$_POST[age]', '$_POST[address]', '$_POST[color]', '$_POST[height]', '$_POST[weight]')";
    if ($conn->query($sql) === TRUE) echo "<p style='color:green;'>Record saved!</p>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Register a Dog</h2>
    <form method="POST">
        Name: <input type="text" name="name" required>
        Breed: <input type="text" name="breed" required>
        Age: <input type="text" name="age" required>
        Address: <input type="text" name="address" required>
        Color: <input type="text" name="color" required>
        Height: <input type="text" name="height" required>
        Weight: <input type="text" name="weight" required>
        <button type="submit">Save Dog</button>
    </form>
    <br><a href="DogView.php">View All Dogs</a>
</body>
</html>