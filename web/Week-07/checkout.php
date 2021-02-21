<?php
// Start the session
session_start();

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Week 07 | Project 1 | Checkout</title>
    
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
            echo '<h3>Week 07 | Project 1 | Checkout</h3></span>';
        ?>    
    </header>
    </div>
    
    <main>
        <div class="centered-button" style="padding: 1em">
            <form action="shoppingcart.php" method="post" class="submit">
                <button class="rounded" type="submit">Back to Cart</button>
            </form>
        </div>
        
        <div style="text-align: center">
        
            <span><h3>Subtotal: $<?php echo $_SESSION["price_total"]; ?></h3></span>
        
        </div>
        
        <div class="centered-button" style="padding-top: 1em">
            <form action="confirmation.php" method="post" class="submit">
                <div style="text-align: left">
                <div style="width: 100%">
                <label>First Name</label><br>
                <input type="text" name="first_name">
                </div>
                    
                </div>
                
                <div style="padding: 1em">
                <button class="rounded" name="purchase" type="submit">Purchase</button>
                </div>
            </form>
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