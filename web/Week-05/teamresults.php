<?php

require '../shared/dbconnect.php';

$book1 = htmlspecialchars($_POST["book"]);

$db = get_db();
$query = 'SELECT * FROM scripture WHERE book = \''.$book1.'\'';
$stmt = $db->prepare($query);
$stmt->execute();
$scripture = $stmt->fetchAll(PDO::FETCH_ASSOC);



?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Scripture Results</title>
    
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
            echo '<h3>Week 05 | Scripture Results</h3></span>';
        ?>    
    </header>
    </div>
    
    <main>
        <h1>Scripture Results</h1>

        <?php
            foreach ($scripture as $script)
            {
                $book = $script['book'];
                $chapter = $script['chapter'];
                $verse = $script['verse'];
                $id = $script['id'];
                echo "<p><a href='details.php?id=$id'>$book&nbsp;$chapter:$verse</a></p>";
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