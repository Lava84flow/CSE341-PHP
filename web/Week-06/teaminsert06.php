<?php

$Book = htmlspecialchars($_POST['Book']);
$Chapter = htmlspecialchars($_POST['Chapter']);
$Verse = htmlspecialchars($_POST['Verse']);
$Content = htmlspecialchars($_POST['Content']);

require '../shared/dbconnect.php';
$db = get_db();

$stmt = $db->prepare('INSERT INTO public.scripture (book, chapter, verse, content) VALUES (:book, :chapter, :verse, :content);');
$stmt->bindValue(':book', $Book, PDO::PARAM_STR);
$stmt->bindValue(':chapter', $Chapter, PDO::PARAM_INT);
$stmt->bindValue(':verse', $Verse, PDO::PARAM_INT);
$stmt->bindValue(':content', $Content, PDO::PARAM_STR);
$stmt->execute();

$query = 'SELECT * FROM public.scripture';
$stmt = $db->prepare($query);
$stmt->execute();
$scripture = $stmt->fetchAll(PDO::FETCH_ASSOC);

var_dump($_POST[])

?>

<!doctype html>
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
         <h1>Scripture Dump</h1>
        
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
        <div>
        </div>
    </main>
        
    <div>
    <footer class="clearfix">
        <?php include '../shared/footer.php'; ?>
    </footer>
    </div>
    </div>
    
</body>
</html>