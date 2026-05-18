<?php
$choice = isset($_GET['friend']) ? $_GET['friend'] : '';
 
if ($choice == "karlo") {
    ?>
    <h2>Karlo Dalangin</h2>
    <img src="picture1.jpg" alt="Karlo">
    <p>Karlo Dalangin is an awesome friend who has a strong passion for technology and learning new things. He is always curious and motivated to improve his skills, especially when it comes to coding and exploring new ideas. What makes him stand out is his reliability and willingness to help others, as he is 
        always ready to assist his classmates with their coding projects and challenges. He explains things clearly and makes sure everyone understands, creating a supportive and positive environment. Overall, Karlo is not only skilled in technology but also a dependable and kind friend.</p>
    <?php
} elseif ($choice == "dreyred") {
    ?>
    <h2>Dreyred Arenas</h2>
    <img src="picture2.jpg" alt="Dreyred">
    <p>Dreyred Arenas is a creative and focused individual who enjoys spending his time exploring interesting hobbies and learning new things. He has a calm and thoughtful personality, which makes him a great person to talk to, especially when 
        you need advice or someone to listen. His ability to stay focused helps him do well in what he is passionate about, and his friendly nature makes others feel comfortable around him. Overall, Dreyred is a reliable and easygoing person who values both personal growth and meaningful conversations.</p>
    <?php
} elseif ($choice == "jose") {
    ?>
    <h2>Jose Ong</h2>
    <img src="picture3.jpg" alt="Jose">
    <p>Jose Ong is a cheerful and supportive friend who always brings positive energy wherever he goes. He has a friendly personality that makes people feel comfortable and included, especially during study sessions or group activities. Jose is someone who encourages others and lifts their spirits, helping 
        create a fun and welcoming environment. Overall, he is a kind and dependable friend who values teamwork and makes everyone feel appreciated.</p>
    <?php
} elseif ($choice == "jairus") {
    ?>
    <h2>Jairus Galicia</h2>
    <img src="picture4.jpg" alt="Jairus">
    <p>Jairus Galicia is a hardworking and dedicated student who consistently puts effort into everything he does. He is highly organized, which helps him manage his tasks efficiently and stay on top of his responsibilities. Jairus also enjoys solving challenging logic puzzles, showing his strong critical thinking skills and love 
        for problem solving. In addition to his individual strengths, he values teamwork and works well with others, contributing positively to group activities and making sure everyone collaborates effectively toward a common goal.</p>
    <?php
} elseif ($choice == "paramveer") {
    ?>
    <h2>Paramveer Bolla</h2>
    <img src="picture5.jpg" alt="Paramveer">
    <p>Paramveer Bolla is an easygoing and dependable friend who is always pleasant to be around. He enjoys discovering new things and has a natural curiosity that keeps him engaged and open to different experiences. One of his standout qualities is his fantastic sense of humor, which brings laughter and good vibes to any 
        group he is in. Along with that, he is also a wonderful teammate who works well with others, contributing positively and making collaboration enjoyable and productive for everyone.</p>
    <?php
} else {
    ?>
    <h2>Welcome!</h2>
    <p>Please click on a friend above to read their biography.</p>
    <?php
}
?>
 