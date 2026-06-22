<?php
$conn = new mysqli('localhost', 'root', 'root', 'DogDatabase', 8889);

$sql = "INSERT INTO Dogs (name, breed, age, address, color, height, weight) 
        VALUES ('$_POST[name]', '$_POST[breed]', '$_POST[age]', '$_POST[address]', '$_POST[color]', '$_POST[height]', '$_POST[weight]')";

if ($conn->query($sql) === TRUE) {
    echo "Record saved!";
} else {
    echo "Error: " . $conn->error;
}
$conn->close();
?>