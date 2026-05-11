<!DOCTYPE html>
<html>
<head>
    <title>Multiplication Table</title>
    <style>
        table {
            border-collapse: collapse;
            border: 1px solid black;
        }
        td {
            width: 30px;
            height: 30px;
            text-align: center;
            border: 1px solid black;
            font-family: serif;
            font-weight: bold;
        }
        .yellow {
            background-color: yellow;
        }
        .red {
            background-color: red;
        }
    </style>
</head>
<body>

<h1>Multiplication Table</h1>

<table>
<?php
for ($row = 0; $row <= 10; $row++) {
    echo "<tr>";

    for ($col = 0; $col <= 10; $col++) {
        $product = $row * $col;

        if (($row + $col) % 2 == 0) {
            $colorClass = "yellow";
        } else {
            $colorClass = "red";
        }

        echo "<td class='$colorClass'>$product</td>";
    }

    echo "</tr>";
}
?>
</table>

</body>
</html>
