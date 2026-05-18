<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Two-Digit Decimal Combinations</title>
    <style>
        /* CSS to match the style of a program output box */
        .output-box {
            border: 1px solid #000;
            padding: 20px;
            background-color: #f4f4f4;
            font-family: 'Courier New', Courier, monospace;
            width: 80%;
            margin: 20px auto;
            line-height: 1.6;
            word-wrap: break-word;
        }
        h2 {
            text-align: center;
            font-family: Arial, sans-serif;
        }
    </style>
</head>
<body>

<h2>Two-Digit Combinations (00–99)</h2>

<div class="output-box">
    <?php
    /*
     * The loop starts at 0 and continues
     * while the value is less than or equal to 99.
     */
    for ($i = 0; $i <= 99; $i++) {

        // Add a leading zero for numbers less than 10
        if ($i < 10) {
            echo "0" . $i;
        } else {
            echo $i;
        }

        // Add comma except after the last number
        if ($i < 99) {
            echo ", ";
        }
    }
    ?>
</div>

</body>
</html>