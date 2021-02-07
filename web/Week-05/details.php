<?php

require '../shared/dbconnect.php';

if (!isset($_GET['id']))
{
	die("Error, id not specified...");
}

$sid = htmlspecialchars($_GET['id']);

$db = get_db();

$stmt = $db->prepare('SELECT * FROM scripture WHERE id = :id');
$stmt->bindValue(':id', $sid, PDO::PARAM_INT);
$stmt->execute();
$details = $stmt->fetchAll(PDO::FETCH_ASSOC);



?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Scripture Details</title>
    
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
            echo '<h3>Week 05 | Scripture Details</h3></span>';
        ?>    
    </header>
    </div>
    
    <main>
        <h1>Scripture Details</h1>

        <?php
            foreach ($details as $detail)
            {
                $book = $detail['book'];
                $chapter = $detail['chapter'];
                $verse = $detail['verse'];
                $content = $detail['content'];
                echo "<p><b>$book&nbsp;$chapter:$verse</b> - \"$content\"</p>";
            }
        ?>


    </main>
        
    <div>
    <footer class="clearfix">
        <?php include '../shared/footer.php'; ?>
    </footer>
    </div>
    </div>
    
</body>
</html>