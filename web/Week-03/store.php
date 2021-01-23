<?php
// Start the session
session_start();

if (isset($_SESSION["shopping_cart"])) {
    if (isset($_POST['AddCart'])) {

    switch ($_POST['AddCart']) {
        case "bull":
            array_push($_SESSION["shopping_cart"], "bull");
            array_push($_SESSION["price"], 20.00);
            break;
        case "cliffs":
            array_push($_SESSION["shopping_cart"], "cliffs");
            array_push($_SESSION["price"], 25.00);
            break;
        case "orc":
            array_push($_SESSION["shopping_cart"], "orc");
            array_push($_SESSION["price"], 15.00);
            break;
        case "space":
            array_push($_SESSION["shopping_cart"], "space");
            array_push($_SESSION["price"], 10.00);
            break;
        }
    }
} else {
    $_SESSION["shopping_cart"] = [];
    $_SESSION["price"] = [];
}

//$_SESSION["shopping_cart"] = []/* = $shopping_cart */;

/*if (isset($_POST['AddCart'])) {

    switch ($_POST['AddCart']) {
        case "bull":
            array_push($_SESSION["shopping_cart"], "bull");
            break;
        case "cliffs":
            array_push($_SESSION["shopping_cart"], "cliffs");
            break;
        case "orc":
            array_push($_SESSION["shopping_cart"], "orc");
            break;
        case "space":
            array_push($_SESSION["shopping_cart"], "space");
            break;
        }
    }
*/

//  print_r($_SESSION["shopping_cart"]);
//print_r($_SESSION["price"]);
//echo '<br>';
//print_r($shopping_cart);


?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Week 03 | Store</title>
    
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
            echo '<h3>Week 03 | Store</h3></span>';
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
        
        <div class="store-item">
            
            <h3>Town on the Cliffs</h3>
            <span><strong>$25.00</strong></span>
            
            <img class="thumb" src="img/jbCNvTM4gwr2qV8X8fW3ZB-970-80-thumb.png">
            
            <div class="centered-button">
                <button type="submit" name="AddCart" value="cliffs">Add To Cart</button>
            </div>
            
        </div>
        
        <div class="store-item">
            
            <h3>Green Orc</h3>
            <span><strong>$15.00</strong></span>
            
            <img class="thumb" src="img/orc07-thumb.png">
            
            <div class="centered-button">
                <button type="submit" name="AddCart" value="orc">Add To Cart</button>
            </div>
            
        </div>
        
        <div class="store-item">
            
            <h3>Space from a Moon </h3>
            <span><strong>$10.00</strong></span>
            
            <img class="thumb" src="img/pixelart_P1_900x420-thumb.png">
            
            <div class="centered-button">
                <button type="submit" name="AddCart" value="space">Add To Cart</button>
            </div>
            
        </div>
            
            <div style="text-align: center">
                
            </div>
        </form>
        <form action="shoppingcart.php" method="post" class="submit">
            <div style="text-align: center">
                <button id="viewcart" type="submit" value="View Cart">View Cart</button>
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