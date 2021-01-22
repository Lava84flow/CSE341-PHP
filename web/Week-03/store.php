<?php
// Start the session
session_start();


$shopping_cart = [];

if (isset($_POST['AddCart'])) {

    switch ($_POST['AddCart']) {
        case "bull":
            echo "You pressed Button 1";
            break;
        case "cliffs":
            echo "You pressed Button 2";
            break;
        case "orc":
            echo "You pressed Button 3";
            break;
        case "space":
            echo "You pressed Button 4";
            break;
        }
    }

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Week 03 | Store</title>
    
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
            echo '<h3>Week 03 | Store</h3></span>';
        ?>    
    </header>
    </div>
    
    <main>
        
        <form action="" method="post" class="store">
            
        <div class="store-item">
            
            <img class="thumb" src="img/f05c82111541689.60041b9f63641-thumb.png">
            <div class="centered-button">
                <button type="submit" name="AddCart" value="bull">Add To Cart</button>
            </div>
        </div>
        
        <div class="store-item">
            
            <img class="thumb" src="img/jbCNvTM4gwr2qV8X8fW3ZB-970-80-thumb.png">
            
            <div class="centered-button">
                <button type="submit" name="AddCart" value="cliffs">Add To Cart</button>
            </div>
            
        </div>
        
        <div class="store-item">
            
            <img class="thumb" src="img/orc07-thumb.png">
            
            <div class="centered-button">
                <button type="submit" name="AddCart" value="orc">Add To Cart</button>
            </div>
            
        </div>
        
        <div class="store-item">
            
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
                <button type="submit" value="View Cart">View Cart</button>
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