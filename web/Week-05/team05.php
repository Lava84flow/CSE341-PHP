<?php

require '../shared/dbconnect.php';
$db = get_db();

$query = 'SELECT * FROM public.scripture';
$stmt = $db->prepare($query);
$stmt->execute();
$scripture = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Team activity</title>
    
    <link href="../shared/main.css" rel="stylesheet" type="text/css">
    <script src="../shared/main.js" defer></script>
    <script src="shoppingcart.js" defer></script>
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
            echo '<h3>Week 05 | Team activity</h3></span>';
        ?>    
    </header>
    </div>
    
    <main>
        <?php
            foreach ($scripture as $script)
            {
                $book = $script['book'];
                $chapter = $script['chapter'];
                $verse = $script['verse'];
                $content = $script['content'];
                echo "<p><b>$book&nbsp;$chapter:$verse</b> - \"$content\"</p>";
            }
        ?>
        
        <form action="teamresults.php" method="post">
            Book: <input type="text" name="book">
            <input type=submit value="Search">
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