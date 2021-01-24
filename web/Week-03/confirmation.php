<?php
// Start the session
session_start();


$firstName = htmlspecialchars($_POST["first_name"]);
$lastName = htmlspecialchars($_POST["last_name"]);

$addressLine1 = htmlspecialchars($_POST["line1"]);
$addressLine2 = htmlspecialchars($_POST["line2"]);

$city = htmlspecialchars($_POST["city"]);
$state = htmlspecialchars($_POST["state"]);
$zip = htmlspecialchars($_POST["zip"]);

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Week 03 | Confirmation</title>
    
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
            echo '<h3>Week 03 | Confirmation</h3></span>';
        ?>    
    </header>
    </div>
    
    <main>
        
        <div>
            
            <?php 
            
                $title_map = [
                    "bull" => '"Red Bull"',
                    "cliffs" => '"Town on the Cliffs"',
                    "orc" => '"Green Orc"',
                    "space" => '"Space from a Moon"'
                ];
            
                $price_map = [
                    "bull" => '$20.00',
                    "cliffs" => '$25.00',
                    "orc" => '$15.00',
                    "space" => '$10.00'
                    
                ]
            
            ?>
            
            <p>
                You Ordered: 
                
                <br>
                <?php
                    if(isset($_SESSION["shopping_cart"]))
                        {
                            foreach($_SESSION["shopping_cart"] as $id)
                            {
                                echo $title_map[$id]. ' for ' . $price_map[$id] . '<br>' ;
                            }
                        }
                ?>
            </p>
            
            <p>
                Your Total is: $<?php echo number_format((float)array_sum($_SESSION["price"]), 2, '.', ''); ?>
            </p>
            
            <p>
                Your order will be sent to:
                
                <br>
                
                <?php echo $firstName . ' ' . $lastName ?>
                
                <br>
                
                <?php echo $addressLine1 . ' ' . $addressLine2 ?>
                
                <br>
                
                <?php echo $city . ', ' . $state . ' ' . $zip ?> 
            </p>
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

<?php
// remove all session variables
session_unset();

// destroy the session
session_destroy();
?>