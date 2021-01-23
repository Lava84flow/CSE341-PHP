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
        <div style="text-align: center">
        
            <span><strong>Subtotal: $<?php echo number_format((float)array_sum($_SESSION["price"]), 2, '.', ''); ?></strong></span>
        
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