<?php
// Start the session
session_start();

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Week 03 | Checkout</title>
    
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
        <div class="centered-button" style="padding: 1em">
            <form action="shoppingcart.php" method="post" class="submit">
                <button class="rounded" type="submit">Back to Cart</button>
            </form>
        </div>
        
        <div style="text-align: center">
        
            <span><h3>Subtotal: $<?php echo number_format((float)array_sum($_SESSION["price"]), 2, '.', ''); ?></h3></span>
        
        </div>
        
        <div class="centered-button" style="padding-top: 1em">
            <form action="confirmation.php" method="post" class="submit">
                <div style="text-align: left">
                <div style="width: 100%">
                <label>First Name</label><br>
                <input type="text" name="first_name">
                </div>
                    
                <div style="width: 100%"> 
                <label>Last Name</label><br>
                <input type="text" name="last_name">
                    </div>
                    
                    <br>
                    
                    <div style="width: 100%">
                        <label>Address Line 1</label><br>
                        <input type="text" name="line1">
                    </div>
                    
                    <div style="width: 100%">
                        <label>Address Line 2</label><br>
                        <input type="text" name="line2">
                    </div>
                    
                    <br>
                    
                    <div style="width: 100%">
                        <label>City</label><br>
                        <input type="text" name="city">
                    </div>
                    
                    <div style="width: 100%">
                        <label>State</label><br>
                        <input type="text" name="state">
                    </div>
                    
                    <div style="width: 100%">
                        <label>Zip Code</label><br>
                        <input type="text" name="zip">
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