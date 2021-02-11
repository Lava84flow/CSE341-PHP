<?php

require '../shared/dbconnect.php';
$db = get_db();

$query = 'SELECT * FROM public.topic';
$stmt = $db->prepare($query);
$stmt->execute();
$topics = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Team activity</title> 
<link href="../shared/main.css" rel="stylesheet" type="text/css">
<script src="../shared/main.js" defer></script>
</head>

<body>
    
    <div class="nav-bar sticky clearfix">
    <nav>
        <?php include '../shared/nav.php'; ?>  
    </nav>
    </div>
    
    <div id="wrapper">
        
    <div>
    <header>
        <?php
            include '../shared/header.php';
            echo '<h3>Week 06 | Team activity</h3></span>';
        ?>
    </header>
    </div>

    <main>
        <form action="teaminsert06.php" method="post">
            <p><strong>Book:</strong><br><input type="text" name="Book"></p>
            <p><strong>Chapter:</strong><br><input type="text" name="Chapter"></p>
            <p><strong>Verse:</strong><br><input type="text" name="Verse"></p>
            <p><span>
                <label for="Content"><strong>Content</strong></label>
            </span>
            <br>
                <textarea rows="10" cols="40" id="Content" name="Content"></textarea></p>
            <p>
            <?php 
                foreach ($topics as $topic)
                {
                    $topic_id = $topic['topic_id'];
                    $topic_name = $topic['topic_name'];
                    echo "<input type=\"checkbox\" name=\"Topic[]\" value=\"Topic$topic_id\">$topic_name<br>";
                }
            ?>
            </p>
            <p><input type="submit" value="Submit"></p>
        </form>
    </main>

    <div>
    <footer class="clearfix">
        <?php include '../shared/footer.php'; ?>
    </footer>
    </div>
    </div>

</body>
</html>