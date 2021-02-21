<?php
// Start the session
session_start();

require '../shared/dbconnect.php';
$db = get_db();

$price_total = [];

function getproduct($id) {
    
    $db = get_db();
    
    $query =    'SELECT price, img_url 
                FROM anniesattic.products
                WHERE idproducts = :id;';

    $stmt = $db->prepare($query);
    
    $param_id = $id;
    $stmt->bindValue(':id', $param_id, PDO::PARAM_INT);    
    
    $stmt->execute();
    $product = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    $productout = $product['0'];
    
    return $productout;
}


if (isset($shopping_cart)) {
    
} else {
    $shopping_cart = $_SESSION["shopping_cart"];
}
    


if (isset($_POST['RemoveCart'])) {
    unset($shopping_cart[$_POST['RemoveCart']]);
    $_SESSION["shopping_cart"] = $shopping_cart;
}

//var_dump($shopping_cart)

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
        
        <form style="text-align: center" action="shopping-cart.php" method="post" class="submit">
            
            
        
        <?php
            
            
            /*
        foreach ($products as $product)
            {
                $productid =    $product['idproducts'];
                $title =        $product['title'];
                $media_name =   $product['media_name'];
                $dimensions =   $product['dimensions'];
                $img_url =      $product['img_url'];
                $price =        $product['price'];
            }
            
            */
            
        if(isset($_SESSION["shopping_cart"]))
        {
            foreach($shopping_cart as $id)
            {
                
                $cart_item = getproduct($id);
                    
                //var_dump($cart_item);
                
                //var_dump($cart_item["img_url"]);
                    
                echo    '<div class="store-item"><img class="thumb" src="'.$cart_item["img_url"].'">'.
                    '<div class="centered-button">
                        <button type="submit" name="RemoveCart" value="'.key($shopping_cart).'">Delete From Cart</button>
                    </div></div>';
                    next($shopping_cart);
                
                    array_push($price_total, ltrim($cart_item["price"], ' $'));
                
                //var_dump($price_total);
                //<img class="thumb" src="img/pixelart_P1_900x420-thumb.png">
            }
        }
            
        ?>
        
            <span><strong>Subtotal: $<?php echo $_SESSION["price_total"] number_format((float)array_sum($price_total), 2, '.', ''); ?></strong></span>
            
        </form>
        
        
            
        <div style="text-align: center;">
            <a href="checkout.php" class="project-button centered-button">Checkout</a>
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