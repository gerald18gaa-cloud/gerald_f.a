<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>String Functions Activity</title>
    <style>
        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
            font-family: Arial, sans-serif;
        }
        th, td {
            border: 2px solid #a0a0a0;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
 
<?php
$names = [
    "chrisa", "karlo", "dreyred", "jose", "jairus",
    "paramveer", "gerald", "karl", "paolo", "john",
    "alice", "bob", "charlie", "diana", "ethan",
    "fiona", "george", "hannah", "ian", "kevin"
];
?>
 
<table>
    <thead>
        <tr>
            <th colspan="6">List of names</th>
        </tr>
        <tr>
            <th>Name</th>
            <th>Number of characters</th>
            <th>Uppercase first character</th>
            <th>Replace vowels with @</th>
            <th>Check position of character 'a'</th>
            <th>Reverse name</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($names as $name) { ?>
            <tr>
                <td><?php echo $name; ?></td>
                <td><?php echo strlen($name); ?></td>
                <td><?php echo ucfirst($name); ?></td>
                <td>
                    <?php
                    $vowels = ['a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U'];
                    echo str_replace($vowels, '@', $name);
                    ?>
                </td>
                <td>
                    <?php
                    $pos = strpos($name, 'a');
                    if ($pos === false) {
                        echo "Not found";
                    } else {
                        echo $pos;
                    }
                    ?>
                </td>
                <td><?php echo strrev($name); ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
 
</body>
</html>