<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "root",
    "sa3db",
    8889
);

if(!$conn)
{
    die("Connection Failed: " . mysqli_connect_error());
}

echo "Connected Successfully";

?>