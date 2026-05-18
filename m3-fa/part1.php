<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Activity</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
        }

        th, td {
            border: 2px solid #a0a0a0;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
        }
    </style>
</head>

<body>

<?php

$people = [
    ["name" => "John Doe", "image" => "icon.jpg", "age" => "21", "birthday" => "Jan 15", "contact" => "098376232"],
    ["name" => "Alice Smith", "image" => "icon.jpg", "age" => "22", "birthday" => "Mar 22", "contact" => "098376232"],
    ["name" => "Charlie Brown", "image" => "icon.jpg", "age" => "20", "birthday" => "Nov 05", "contact" => "098376232"],
    ["name" => "Bob Martin", "image" => "icon.jpg", "age" => "23", "birthday" => "Jul 19", "contact" => "098376232"],
    ["name" => "Fiona Gallagher", "image" => "icon.jpg", "age" => "21", "birthday" => "Sep 30", "contact" => "098376232"],
    ["name" => "Ethan Hunt", "image" => "icon.jpg", "age" => "25", "birthday" => "May 14", "contact" => "098376232"],
    ["name" => "Diana Prince", "image" => "icon.jpg", "age" => "24", "birthday" => "Dec 25", "contact" => "098376232"],
    ["name" => "George Costanza", "image" => "icon.jpg", "age" => "22", "birthday" => "Feb 12", "contact" => "098376232"],
    ["name" => "Hannah Baker", "image" => "icon.jpg", "age" => "19", "birthday" => "Aug 08", "contact" => "098376232"],
    ["name" => "Ian Malcolm", "image" => "icon.jpg", "age" => "26", "birthday" => "Jun 11", "contact" => "098376232"]
];

sort($people);

?>

<table>
    <thead>
        <tr>
            <th>no.</th>
            <th>name</th>
            <th>Image</th>
            <th>age</th>
            <th>birthday</th>
            <th>contact number</th>
        </tr>
    </thead>

    <tbody>
        <?php
        $i = 1;
        foreach ($people as $person) {
        ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $person['name']; ?></td>
                <td>
                    <img src="<?php echo $person['image']; ?>" alt="Profile">
                </td>
                <td><?php echo $person['age']; ?></td>
                <td><?php echo $person['birthday']; ?></td>
                <td><?php echo $person['contact']; ?></td>
            </tr>
        <?php
            $i++;
        }
        ?>
    </tbody>
</table>

</body>
</html>
``