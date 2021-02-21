<?php
// Start the session
session_start();

require '../shared/dbconnect.php';
$db = get_db();

$query =    'SELECT idaddresses, address_line1, address_line2, city, state, zipcode 
            FROM anniesattic.addresses WHERE customers_idcustomers = :customerid;';

$stmt = $db->prepare($query);

        $param_id = $_SESSION["id"];
        $stmt->bindValue(':customerid', $param_id, PDO::PARAM_STR);

$stmt->execute();
$addresses = $stmt->fetchAll(PDO::FETCH_ASSOC);

$shipping_err = $billing_err = '';

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Week 07 | Project 1 | Checkout</title>
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
            echo '<h3>Week 07 | Project 1 | Checkout</h3></span>';
        ?>    
    </header>
    </div>
    
    <main>
        
        <div style="text-align: center;">
            <a href="shopping-cart.php" class="project-button centered-button">Back to Cart</a>
        </div>
        
        <div style="text-align: center">
        
            <span><h3>Subtotal: $<?php echo $_SESSION["price_subtotal"]; ?></h3></span>
        
        </div>
        
        <div class="centered-button" style="padding-top: 1em">
            <form action="confirmation.php" method="post" class="submit">
                
                <p>What address would you like to use?</p>
                
                <div class="form-group <?php echo (!empty($shipping_err)) ? 'has-error' : ''; ?>">                
                    <label>Shipping Address</label>
                    <select name="shipping-address" style="color: black;">
                        <?php
                            
                            foreach ($addresses as $address) {
                                $address_id =       $address['idaddresses'];
                                $type =             $address['address_type'];
                                $address_line1 =    $address['address_line1'];
                                $address_line2 =    $address['address_line2'];
                                $city =             $address['city'];
                                $state =            $address['state'];
                                $zipcode =          $address['zipcode'];
                    
                    
                    
                                echo "<option value=\"$address_id\">$address_line1 $address_line2, $city, $zipcode</option>";
                            }
                                
                        ?>
                    </select> 
                    <span class="help-block"><?php echo $shipping_err; ?></span>
                </div>
                
                <div class="form-group <?php echo (!empty($billing_err)) ? 'has-error' : ''; ?>">                
                    <label>Billing Address</label>
                    <select name="billing-address" style="color: black;">
                        <?php
                            
                            foreach ($addresses as $address) {
                                $address_id =       $address['idaddresses'];
                                $type =             $address['address_type'];
                                $address_line1 =    $address['address_line1'];
                                $address_line2 =    $address['address_line2'];
                                $city =             $address['city'];
                                $state =            $address['state'];
                                $zipcode =          $address['zipcode'];
                    
                    
                    
                                echo "<option value=\"$address_id\">$address_line1 $address_line2, $city, $zipcode</option>";
                            }
                                
                        ?>
                    </select> 
                    <span class="help-block"><?php echo $billing_err; ?></span>
                </div>
                <br />
                <p>Don't have any saved addresses? <a href="add-addresses.php">Click here</a> to add one.</p>
                
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