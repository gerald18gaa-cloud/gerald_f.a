<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Activity 3</title>

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

function calculate($p1, $p2, $p3) {

    $sum = $p1 + $p2 + $p3;

    $diff = $p1 - $p2 - $p3;

    $prod = $p1 * $p2 * $p3;

    $quot = $p1 / $p2 / $p3;

    return [

        "addition" => $sum,

        "subtraction" => $diff,

        "multiplication" => $prod,

        "division" => $quot

    ];
}

$val1 = 25;

$val2 = 13;

$val3 = 6;

$results = calculate($val1, $val2, $val3);

?>

<table>
    <thead>
        <tr>
            <th colspan="2">
                My Parameter values: <?php echo "$val1, $val2, $val3"; ?>
            </th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>Addition</td>
            <td><?php echo $results['addition']; ?></td>
        </tr>

        <tr>
            <td>Subtraction</td>
            <td><?php echo $results['subtraction']; ?></td>
        </tr>

        <tr>
            <td>Multiplication</td>
            <td><?php echo $results['multiplication']; ?></td>
        </tr>

        <tr>
            <td>Division</td>
            <td><?php echo $results['division']; ?></td>
        </tr>
    </tbody>
</table>

</body>
</html>