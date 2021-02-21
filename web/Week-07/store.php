<?php

// Initialize the session
//session_start();

require '../shared/dbconnect.php';
$db = get_db();

$query =    'SELECT p.idproducts, p.title, mt.media_name, p.dimensions, p.price, p.description, p.img_url 
            FROM anniesattic.products p JOIN anniesattic.media_type mt ON p.media_type_idmedia_type = mt.idmedia_type;';
$stmt = $db->prepare($query);
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
var_dump($products);
?>

<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Project 1 | Store</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
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
            echo '<h3>Week 07 | Project 1 | Store</h3></span>';
        ?>
    </header>
    </div>
    
    <main>
        
        <form action="" method="post" class="store">
            
        <div class="store-item">
            
            <h3>Red Bull</h3>
            <span><strong>$20.00</strong></span> 
            
            <img class="thumb" src="img/f05c82111541689.60041b9f63641-thumb.png">
            <div class="centered-button">
                <button type="submit" name="AddCart" value="bull">Add To Cart</button>
            </div>
        </div>
        
        <?php 
            foreach ($products as $product)
            {
                $productid = $script['book'];
                $media_type_idmedia_type = $script['chapter'];
                $verse = $script['verse'];
                $content = $script['content'];
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