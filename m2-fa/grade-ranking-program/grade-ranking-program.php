<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Grade Ranking</title>

    <style>
        body {
            font-family: sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 50px;
            background-color: #f4f4f4;
        }

        .input-form {
            margin-bottom: 20px;
            background: #fff;
            padding: 15px;
            border: 1px solid #7a8d7a;
        }

        .card-container {
            border: 1px solid #7a8d7a;
            padding: 40px;
            background-color: #ffffff;
            width: 600px;
            height: 300px;
        }

        .name-box {
            border: 1px solid #7a8d7a;
            padding: 10px;
            width: 350px;
            font-size: 18px;
            margin-bottom: 20px;
        }

        .flex-row {
            display: flex;
            gap: 20px;
            align-items: flex-start;
        }

        .data-box {
            border: 1px solid #7a8d7a;
            padding: 20px;
            width: 80px;
            text-align: center;
        }

        .picture-box {
            border: 1px solid #7a8d7a;
            width: 150px;
            height: 180px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-left: auto;
        }

        .label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="input-form">
    <form method="post">
        <label>Enter Grade:</label>
        <input type="number" name="grade_input"
               value="<?php echo isset($_POST['grade_input']) ? $_POST['grade_input'] : 95; ?>"
               min="0" max="100" required>
        <button type="submit">Update Rank</button>
    </form>
</div>

<div class="card-container">
    <?php
        // Student information
        $firstName = "First Name";
        $mi = "MI.";
        $lastName = "Last Name";

        // Get grade input safely
        $grade = isset($_POST['grade_input']) ? (int)$_POST['grade_input'] : 95;
        $rank = "";

        // Grade to rank conversion
        if ($grade >= 93 && $grade <= 100) {
            $rank = "A";
        } elseif ($grade >= 90) {
            $rank = "A-";
        } elseif ($grade >= 87) {
            $rank = "B+";
        } elseif ($grade >= 83) {
            $rank = "B";
        } elseif ($grade >= 80) {
            $rank = "B-";
        } elseif ($grade >= 77) {
            $rank = "C+";
        } elseif ($grade >= 73) {
            $rank = "C";
        } elseif ($grade >= 70) {
            $rank = "C-";
        } elseif ($grade >= 67) {
            $rank = "D+";
        } elseif ($grade >= 63) {
            $rank = "D";
        } elseif ($grade >= 60) {
            $rank = "D-";
        } else {
            $rank = "F";
        }
    ?>

    <div class="name-box">
        Name: <?php echo "$firstName $mi $lastName"; ?>
    </div>

    <div class="flex-row">
        <div class="data-box">
            <span class="label">Rank</span>
            <?php echo $rank; ?>
        </div>

        <div class="data-box">
            <span class="label">Grade</span>
            <?php echo $grade; ?>
        </div>

        <div class="picture-box">
            Picture
        </div>
    </div>
</div>

</body>
</html>