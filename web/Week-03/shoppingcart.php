<?php
// Start the session
session_start();



if (isset($shopping_cart)) {
    
} else {
    $shopping_cart = $_SESSION["shopping_cart"];
}

if (isset($price)) {
    
} else {
    $price = $_SESSION["price"];
}
    


if (isset($_POST['RemoveCart'])) {
    unset($shopping_cart[$_POST['RemoveCart']]);
    unset($price[$_POST['RemoveCart']]);
    $_SESSION["shopping_cart"] = $shopping_cart;
    $_SESSION["price"] = $price;
}

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Week 03 | Shopping Cart</title>
    
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
            echo '<h3>Week 03 | Shopping Cart</h3></span>';
        ?>    
    </header>
    </div>
    
    <main>
        
        <div class="centered-button" style="padding: 1em">
            <form action="store.php" method="post" class="submit">
                <button class="rounded" type="submit">Back to Store</button>
            </form>
        </div>
        
        <?php 
            /*print_r($shopping_cart);
            echo "<br>";
            print_r($price);
            echo '<br>';*/   
        
        $img_map = array(
                "bull" => "img/f05c82111541689.60041b9f63641-thumb.png",
                "cliffs" => "img/jbCNvTM4gwr2qV8X8fW3ZB-970-80-thumb.png",
                "orc" => "img/orc07-thumb.png",
                "space" => "img/pixelart_P1_900x420-thumb.png"
            );

        ?>
        <form style="text-align: center" action="shoppingcart.php" method="post" class="submit">
        
        <?php
        if(isset($_SESSION["shopping_cart"]))
        {
            foreach($shopping_cart as $id)
            {
                echo    '<div class="store-item"><img class="thumb" src="'.$img_map[$id].'">'.
                    '<div class="centered-button">
                        <button type="submit" name="RemoveCart" value="'.key($shopping_cart).'">Delete From Cart</button>
                    </div></div>';
                    next($shopping_cart);
                //<img class="thumb" src="img/pixelart_P1_900x420-thumb.png">
            }
        }
        
            
            
        ?>
        
            <span><strong>Subtotal: $<?php echo number_format((float)array_sum($price), 2, '.', ''); ?></strong></span>
            
        </form>
        
            
        <div class="centered-button" style="padding: 1em">
            <form action="checkout.php" method="post" class="submit">
                <button class="rounded centered-button" type="submit">Checkout</button>
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