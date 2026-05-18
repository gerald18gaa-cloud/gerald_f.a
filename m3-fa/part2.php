<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Activity 2</title>

    <style>
        table {
            width: 50%;
            margin: 20px auto;
            border-collapse: collapse;
            font-family: Arial, sans-serif;
        }

        th, td {
            border: 2px solid #a0a0a0;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>

<?php
$numbers = [1, 2, 3, 4, 5, 6, 7, 8, 10];

$sum = 0;
foreach ($numbers as $num) {
    $sum += $num;
}

$diff = $numbers[0];
for ($i = 1; $i < count($numbers); $i++) {
    $diff -= $numbers[$i];
}

$prod = 1;
foreach ($numbers as $num) {
    $prod *= $num;
}

$quot = $numbers[0];
for ($i = 1; $i < count($numbers); $i++) {
    $quot /= $numbers[$i];
}
?>

<table>
    <thead>
        <tr>
            <th colspan="2">
                Array list: <?php echo implode(", ", $numbers); ?>
            </th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>Addition</td>
            <td><?php echo $sum; ?></td>
        </tr>

        <tr>
            <td>Subtraction</td>
            <td><?php echo $diff; ?></td>
        </tr>

        <tr>
            <td>Multiplication</td>
            <td><?php echo $prod; ?></td>
        </tr>

        <tr>
            <td>Division</td>
            <td><?php echo $quot; ?></td>
        </tr>
    </tbody>
</table>

</body>
</html>