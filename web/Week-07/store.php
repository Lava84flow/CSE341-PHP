<?php

// Initialize the session
//session_start();

require '../shared/dbconnect.php';
$db = get_db();

$query =    'SELECT p.idproducts, p.title, mt.media_name, p.dimensions, p.price, p.description, p.img_url 
            FROM anniesattic.products p JOIN anniesattic.media_type mt 
            ON p.media_type_idmedia_type = mt.idmedia_type
            ORDER BY p.idproducts;';

$stmt = $db->prepare($query);
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
var_dump($products);


if (isset($_SESSION["shopping_cart"])) {
    if (isset($_POST['AddCart'])) {
        array_push($_SESSION["shopping_cart"], $_POST['AddCart']);
    }
} else {
    $_SESSION["shopping_cart"] = [];
}


var_dump($_SESSION["shopping_cart"]);






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
        
        <div>
            <a href="prove07.php" class="project-button centered-button">Go Back</a>
        </div>
        
        <form action="" method="post" class="store">
      
        <?php 
            foreach ($products as $product)
            {
                $productid =    $product['idproducts'];
                $title =        $product['title'];
                $media_name =   $product['media_name'];
                $dimensions =   $product['dimensions'];
                $price =        $product['price'];
                $description =  $product['description'];
                $img_url =      $product['img_url'];
                echo "
                    <div class=\"store-item\">
                        <h3>$title</h3>
                        <span><strong>$price</strong></span>
                        
                        <span>$media_name, $dimensions inches</span>
                        
                        <span>$description</span>
                        
                        <img class=\"thumb\" src=\"$img_url\">
                        
                        <div class=\"centered-button\">
                            <button type=\"submit\" name=\"AddCart\" value=\"$productid\">Add To Cart</button>
                        </div>
                    
                    </div>
                ";
            }
        ?>
            
        </form>
        
        <div>
            <a href="prove07.php" class="project-button centered-button">Go Back</a>
        </div>
        
        <form action="shoppingcart.php" method="post" class="submit">
            <div style="text-align: center">
                <button class="rounded" type="submit" value="View Cart">View Cart</button>
            </div>
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