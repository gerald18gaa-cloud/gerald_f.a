<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP Technical Assessment</title>

    <style>
        :root {
            --dark-navy: #1e272e;
            --accent-blue: #0fbcf9;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, sans-serif;
        }

        body {
            background-color: #d2dae2;
            display: flex;
            justify-content: center;
            padding: 50px 0;
        }

        .resume-wrapper {
            width: 900px;
            background: #ffffff;
            display: flex;
            min-height: 1100px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }

        /* SIDEBAR */
        .sidebar {
            width: 35%;
            background-color: var(--dark-navy);
            color: #ffffff;
            padding: 50px 30px;
        }

        .photo-container {
            width: 150px;
            height: 150px;
            margin: 0 auto 30px;
            border-radius: 50%;
            border: 3px solid var(--accent-blue);
            overflow: hidden;
        }

        .photo-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .sidebar h1 {
            font-size: 22px;
            text-align: center;
            margin-bottom: 5px;
        }

        .subtitle {
            font-size: 11px;
            color: var(--accent-blue);
            text-align: center;
            font-weight: bold;
            margin-bottom: 40px;
        }

        .contact-info p {
            font-size: 12px;
            margin-bottom: 10px;
            color: #808e9b;
        }

        .skills h3 {
            margin-top: 50px;
            font-size: 14px;
            border-bottom: 1px solid var(--accent-blue);
            padding-bottom: 5px;
            margin-bottom: 15px;
        }

        .sidebar ul {
            list-style: none;
        }

        .sidebar ul li {
            font-size: 13px;
            margin-bottom: 12px;
        }

        /* MAIN CONTENT */
        .main-content {
            width: 65%;
            padding: 70px 50px;
        }

        h2 {
            font-size: 18px;
            color: var(--dark-navy);
            border-bottom: 1px solid #eee;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .main-content p {
            font-size: 15px;
            line-height: 1.7;
            color: #485460;
            margin-bottom: 40px;
        }

        .edu-item {
            margin-bottom: 20px;
        }

        .edu-item strong {
            display: block;
            color: var(--accent-blue);
        }

        .edu-item span {
            font-size: 13px;
            color: #808e9b;
        }

        .cert-list {
            list-style: none;
            padding-left: 0;
        }

        .cert-list li {
            font-size: 14px;
            margin-bottom: 10px;
            color: #485460;
            padding-left: 15px;
            position: relative;
        }

        .cert-list li::before {
            content: "✔";
            position: absolute;
            left: 0;
            color: var(--accent-blue);
        }
    </style>
</head>

<body>

<div class="resume-wrapper">
<?php
    $firstname = "Gerald";
    $lastname = "Arago";
    $course = "Bachelor of Science in Information Technology";
    $location = "Manila, Philippines";
    $email = "gcarago@fit.edu.ph";
    $profilePhoto = "gerald.jpg";

    $profileBio = "A technology student at FEU Institute of Technology specializing in web development. I have a strong interest in building responsive and user-friendly web applications, with a focus on writing clean, maintainable code and implementing efficient server-side logic using PHP.";

    $expertise = [
        "SQL Databases",
        "Network Config",
        "UI Design",
        "Basic JavaScript",
        "Basic Python",
        "Problem Solving",
        "Team Collaboration"
    ];

    $education = [
        [
            "year" => "2024–Present",
            "school" => "FEU Institute of Technology",
            "degree" => "BSIT Web and Mobile Application"
        ],
        [
            "year" => "2019–2023",
            "school" => "Previous School",
            "degree" => "Senior High School"
        ]
    ];

    $certifications = [
        "Python Programming (Basic)",
        "JavaScript (Basic)"
    ];
?>

<!-- SIDEBAR -->
<aside class="sidebar">
    <div class="photo-container">
        <img src="<?php echo $profilePhoto; ?>" alt="Profile Photo">
    </div>

    <h1><?php echo $firstname . " " . $lastname; ?></h1>
    <p class="subtitle"><?php echo $course; ?></p>

    <div class="contact-info">
        <p>Location: <?php echo $location; ?></p>
        <p>Email: <?php echo $email; ?></p>
    </div>

    <section class="skills">
        <h3>EXPERTISE</h3>
        <ul>
            <?php foreach ($expertise as $skill): ?>
                <li><?php echo $skill; ?></li>
            <?php endforeach; ?>
        </ul>
    </section>
</aside>

<!-- MAIN CONTENT -->
<main class="main-content">
    <section>
        <h2>PROFILE</h2>
        <p><?php echo $profileBio; ?></p>
    </section>

    <section>
        <h2>EDUCATION</h2>
        <?php foreach ($education as $edu): ?>
            <div class="edu-item">
                <strong><?php echo $edu['degree']; ?></strong>
                <span><?php echo $edu['school']; ?> (<?php echo $edu['year']; ?>)</span>
            </div>
        <?php endforeach; ?>
    </section>

    <section>
        <h2>CERTIFICATIONS</h2>
        <ul class="cert-list">
            <?php foreach ($certifications as $cert): ?>
                <li><?php echo $cert; ?></li>
            <?php endforeach; ?>
        </ul>
    </section>
</main>
</div>

</body>
</html>
