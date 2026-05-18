<?php
$institute = "Institute of Computing and Information Technology";
$department = "BSIT - Web and Mobile Applications";
$specialization = "Web Development and Mobile Computing";

$studentNum = "202411541";
$email = "gcarago@fit.edu.ph";

$yearLevel = "2nd Year";
$academicYear = "2025-2026";
$term = "2nd Term";
$status = "Regular";

$rawName = "gerald aldridige arago";
$dob = "June 18, 2003";
$gender = "Male";
$isFilipino = true;

$rawSchool = "apec";
$lastYear = "2022";
$medical = "No medical history / Fit to study";

$fullName = ucwords(strtolower($rawName));
$schoolName = strtoupper($rawSchool);
?>

<!DOCTYPE html>
<html>
<head>
    <title>FEU Tech Student Record</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 30px;
            line-height: 1.4;
            color: #333;
        }

        .container {
            width: 850px;
            margin: auto;
            border: 1px solid #000;
            padding: 25px;
            background: #fff;
        }

        .header {
            text-align: right;
            font-size: 26px;
            font-weight: bold;
            border-bottom: 3px solid #000;
            padding-bottom: 5px;
            margin-bottom: 20px;
        }

        .top-info-box {
            border: 1px solid #000;
            padding: 10px;
            margin-bottom: 15px;
            font-size: 13px;
            background-color: #fcfcfc;
        }

        .black-section {
            background: #000;
            color: #fff;
            padding: 5px 10px;
            font-weight: bold;
            margin-top: 20px;
            font-size: 14px;
            text-transform: uppercase;
        }

        .data-row {
            margin: 12px 0;
            border-bottom: 1px solid #eee;
            padding-bottom: 8px;
            font-size: 15px;
        }

        b {
            color: #000;
            font-size: 11px;
            text-transform: uppercase;
            margin-right: 8px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header">Student Registration Form</div>

    <div class="top-info-box">
        <b>Student Number:</b> <?php echo $studentNum; ?>&nbsp;&nbsp;&nbsp;
        <b>Email:</b> <?php echo $email; ?>&nbsp;&nbsp;&nbsp;
        <b>AY/Term:</b> <?php echo $academicYear . " / " . $term; ?>
    </div>

    <div class="data-row">
        <b>Institute:</b> <?php echo $institute; ?>
    </div>

    <div class="data-row">
        <b>Department:</b> <?php echo $department; ?>
    </div>

    <div class="data-row">
        <b>Specialization:</b> <?php echo $specialization; ?>
    </div>

    <div class="black-section">Personal Information</div>

    <div class="data-row">
        <b>Full Name:</b> <?php echo $fullName; ?>
    </div>

    <div class="data-row">
        <b>Date of Birth:</b> <?php echo $dob; ?> &nbsp; | &nbsp;
        <b>Gender:</b> <?php echo $gender; ?>
    </div>

    <div class="black-section">Academic Enrollment</div>

    <div class="data-row">
        <b>Classification:</b> <?php echo $yearLevel . " - " . $status; ?>
    </div>

    <div class="data-row">
        <b>Programming Focus:</b> PHP Web Architecture
    </div>

    <div class="black-section">Previous School Record</div>

    <div class="data-row">
        <b>Last Institution:</b> <?php echo $schoolName; ?>
    </div>

    <div class="data-row">
        <b>Year Graduated:</b> <?php echo $lastYear; ?>
    </div>

    <div class="black-section">Health and Citizenship</div>

    <div class="data-row">
        <b>Medical Record:</b> <?php echo $medical; ?>
    </div>

    <div class="data-row">
        <b>Citizenship Status:</b>
        <?php
        if ($isFilipino) {
            echo "Filipino Citizen";
        } else {
            echo "International Student";
        }
        ?>
    </div>
</div>

</body>
</html>