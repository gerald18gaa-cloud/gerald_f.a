<?php
$firstName = $_POST['fname'];
$middleName = $_POST['mname'];
$lastName = $_POST['lname'];
$address = $_POST['address'];
 
echo "<h2>Submitted Information</h2>";
echo "First Name: " . $firstName . "<br>";
echo "Middle Name: " . $middleName . "<br>";
echo "Last Name: " . $lastName . "<br>";
echo "Address: " . $address . "<br>";
?>