<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Fruit Directory</title>
    <style>
        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
            font-family: Arial, sans-serif;
        }
        th, td {
            border: 2px solid #a0a0a0;
            padding: 15px;
            text-align: center;
        }
        th {
            background-color: #ffffff;
            font-weight: normal;
        }
        .main-header {
            font-size: 1.2em;
        }
        img {
            width: 150px;
            height: auto;
            object-fit: cover;
        }
        .left-align {
            text-align: left;
        }
    </style>
</head>
<body>

<?php
$fruits = [
    [
        "name" => "Banana",
        "image" => "banana.jpg",
        "description" => "Color Yellow",
        "facts" => "Bananas are a healthful addition to a balanced diet, as they provide a range of vital nutrients and are a good source of fiber."
    ],
    [
        "name" => "Apple",
        "image" => "Apple.jpg",
        "description" => "Color Red",
        "facts" => "Apples are high in fiber and vitamin C. They are also rich in various antioxidants, which may help protect your cells."
    ],
    [
        "name" => "Orange",
        "image" => "Orange.jpeg",
        "description" => "Color Orange",
        "facts" => "Oranges are widely known for their high vitamin C content, a powerful antioxidant that protects cells from damage."
    ],
    [
        "name" => "Grapes",
        "image" => "Grapes.jpeg",
        "description" => "Color Purple",
        "facts" => "Grapes offer a wealth of health benefits, primarily due to their high antioxidant and nutrient content."
    ],
    [
        "name" => "Mango",
        "image" => "Mango.jpeg",
        "description" => "Color Yellow",
        "facts" => "Mangoes are rich in vitamins, minerals, and antioxidants, and they have been associated with many health benefits."
    ],
    [
        "name" => "Strawberry",
        "image" => "Strawberry.avif",
        "description" => "Color Red",
        "facts" => "Strawberries are an excellent source of vitamin C and manganese and also contain decent amounts of folate and potassium."
    ],
    [
        "name" => "Watermelon",
        "image" => "Watermelon.avif",
        "description" => "Color Green",
        "facts" => "Watermelon has a very high water content and provides nutrients like lycopene, citrulline, and vitamins A and C."
    ],
    [
        "name" => "Pineapple",
        "image" => "pineapple.webp",
        "description" => "Color Yellow-Brown",
        "facts" => "Pineapples are packed with a variety of vitamins and minerals. They are especially rich in vitamin C and manganese."
    ],
    [
        "name" => "Kiwi",
        "image" => "Kiwi.jpeg",
        "description" => "Color Brown/Green",
        "facts" => "Kiwis are small fruits that pack a lot of flavor and plenty of health benefits, filled with nutrients like vitamin C, vitamin K, and vitamin E."
    ],
    [
        "name" => "Papaya",
        "image" => "Papaya.jpeg",
        "description" => "Color Orange-Green",
        "facts" => "Papayas contain high levels of antioxidants vitamin A, vitamin C, and vitamin E. Diets high in antioxidants may reduce the risk of heart disease."
    ]
];

sort($fruits);
?>

<table>
    <thead>
        <tr>
            <th colspan="4" class="main-header">My Fruits</th>
        </tr>
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Description</th>
            <th>Facts</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($fruits as $fruit) { ?>
            <tr>
                <td><img src="<?php echo $fruit['image']; ?>" alt="<?php echo $fruit['name']; ?>"></td>
                <td><?php echo $fruit['name']; ?></td>
                <td><?php echo $fruit['description']; ?></td>
                <td class="left-align"><?php echo $fruit['facts']; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

</body>
</html>