<?php

$Book = htmlspecialchars($_POST['Book']);
$Chapter = htmlspecialchars($_POST['Chapter']);
$Verse = htmlspecialchars($_POST['Verse']);
$Content = htmlspecialchars($_POST['Content']);
$topic_ids = $_POST['Topics'];

require '../shared/dbconnect.php';
$db = get_db();

$stmt = $db->prepare('INSERT INTO public.scripture (book, chapter, verse, content) VALUES (:book, :chapter, :verse, :content);');
$stmt->bindValue(':book', $Book, PDO::PARAM_STR);
$stmt->bindValue(':chapter', $Chapter, PDO::PARAM_INT);
$stmt->bindValue(':verse', $Verse, PDO::PARAM_INT);
$stmt->bindValue(':content', $Content, PDO::PARAM_STR);
$stmt->execute();

$scripture_id = $db->lastInsertId("scripture_scripture_id_seq");

	// Now go through each topic id in the list from the user's checkboxes
	foreach ($topic_ids as $topic_id)
	{
		//echo "scriptureId: $scripture_id, topicId: $topic_id";

		// Again, first prepare the statement
		$statement = $db->prepare('INSERT INTO topic_scripture(scripture_id, topic_id) VALUES(:scriptureId, :topicId)');

		// Then, bind the values
		$statement->bindValue(':scriptureId', $scripture_id);
		$statement->bindValue(':topicId', $topic_id);

		$statement->execute();
	}


/*
$query = 'SELECT * FROM public.scripture';
$stmt = $db->prepare($query);
$stmt->execute();
$scripture = $stmt->fetchAll(PDO::FETCH_ASSOC);
*/
//echo var_dump($_POST);

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
        /*
            foreach ($scripture as $script)
            {
                $book = $script['book'];
                $chapter = $script['chapter'];
                $verse = $script['verse'];
                $content = $script['content'];
                echo "<p><b>$book&nbsp;$chapter:$verse</b> - \"$content\"</p>";
            }
        */
        ?>
        
        <?php
        
            // prepare the statement
	$statement = $db->prepare('SELECT scripture_id, book, chapter, verse, content FROM public.scripture');
	$statement->execute();

	// Go through each result
	while ($row = $statement->fetch(PDO::FETCH_ASSOC))
	{
		echo '<p>';
		echo '<strong>' . $row['book'] . ' ' . $row['chapter'] . ':';
		echo $row['verse'] . '</strong>' . ' - ' . $row['content'];
		echo '<br />';
		echo 'Topics: ';

		// get the topics now for this scripture
		$stmtTopics = $db->prepare('SELECT topic_name FROM topic t'
			. ' INNER JOIN topic_scripture ts ON ts.topic_id = t.topic_id'
			. ' WHERE ts.scripture_id = :scripture_id');

		$stmtTopics->bindValue(':scripture_id', $row['id']);
		$stmtTopics->execute();

		// Go through each topic in the result
		while ($topicRow = $stmtTopics->fetch(PDO::FETCH_ASSOC))
		{
			echo $topicRow['topic_name'] . ' ';
		}

		echo '</p>';
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