<?php
// Start the session
session_start();

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
        
        <?php 
            print_r($_SESSION["shopping_cart"]);
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