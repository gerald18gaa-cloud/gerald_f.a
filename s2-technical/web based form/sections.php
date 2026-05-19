<?php
$page = isset($_GET['page']) ? $_GET['page'] : 'personal';

if ($page == 'objective') {
    echo "<p><strong>Career Objective</strong><br><br>Motivated IT student from FEU Tech aiming to secure a professional office-based position where I can apply my technical training, administrative capabilities, and software skills.</p>";
} else if ($page == 'education') {
    echo "<p><strong>Educational Attainment page</strong><br><br>FEU Institute of Technology<br>Bachelor of Science in Information Technology<br>2024–Present</p>";
} else if ($page == 'skills') {
    echo "<p><strong>Skills page</strong><br><br>Programming & Web: HTML, Python, Java, JavaScript<br>Certifications: JavaScript (Basic), Python Programming (Basic)</p>";
} else if ($page == 'affiliation') {
    echo "<p><strong>Affiliation page</strong><br><br>Student Associate<br>FEU Institute of Technology</p>";
} else if ($page == 'experience') {
    echo "<p><strong>Work Experience Page</strong><br><br>No formal work experience yet. Highly capable in academic computing tasks, lab project executions, and corporate office applications.</p>";
} else {
    echo "<p><strong>Personal information</strong><br><br>Name: Gerald Arago<br>Location: Manila, Philippines<br>Email: gcarago@fit.edu.ph</p>";
}
?>