<?php
// Start the session
session_start();

$query = 'SELECT idaddresses, address_line1, address_line2, city, state, zipcode FROM anniesattic.addresses WHERE customers_idcustomers = :customerid;';
        $stmt = $db->prepare($query);
//        echo var_dump($stmt);
        
        $param_id = $_SESSION["id"];
        $stmt->bindValue(':customerid', $param_id, PDO::PARAM_STR);
        
        
//        echo var_dump($stmt);
        
        $stmt->execute();
//        echo var_dump($stmt);
        
        $addresses = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //echo var_dump($addresses);






?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Week 07 | Project 1 | Confirmation</title>
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
            echo '<h3>Week 07 | Project 1 | Confirmation</h3></span>';
        ?>    
    </header>
    </div>
    
    <main>
        
        <div>
            
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
session_unset($_SESSION["shopping_cart"]);

?>