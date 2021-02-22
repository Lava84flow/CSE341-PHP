<?php
// Start the session
session_start();

require '../shared/dbconnect.php';
//$db = get_db();
    
$subtotal = $_SESSION["price_subtotal"];

$taxes = floatval($subtotal) * 0.05;

$shipping = 10.00;
    
$price_total = $subtotal + $taxes + $shipping;

$orderid = getorderid();

$shipping_address = getaddress($_POST['shipping-address']);

$billing_address = getaddress($_POST['billing-address']);

function getaddress($id) {
    
    $db = get_db();
    
    $query = 'SELECT address_line1, address_line2, city, state, zipcode FROM anniesattic.addresses WHERE idaddresses = :addressid;';
        $stmt = $db->prepare($query);
//        echo var_dump($stmt);
        
        $param_id = $id;
        $stmt->bindValue(':addressid', $param_id, PDO::PARAM_STR);
        
        
//        echo var_dump($stmt);
        
        $stmt->execute();
//        echo var_dump($stmt);
        
        $addresses = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $address = $addresses['0'];
        //echo var_dump($addresses);
    
    return $address;
    
}



function getproduct($id) {
    
    $db = get_db();
    
    $query =    'SELECT title, price 
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

function getorderid() {    
    
    $db = get_db();
    
    $query = 'SELECT last_value FROM anniesattic.orders_idorders_seq;';
        $stmt = $db->prepare($query); 
        
        $stmt->execute();
    
        $curvalues = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $inbetween = $curvalues['0'];
    
        $curvalue = $inbetween['last_value'];
        //echo var_dump($curvalues);
    
    return $curvalue;
    
}

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION["shopping_cart"])) {
    // Prepare an insert statement
    $query = "INSERT INTO anniesattic.orders VALUES (DEFAULT, :customers_idcustomers, :subtotal, :taxes, :shipping, :status, :shipping_address, :billing_address);";

    $stmt = $db->prepare($query);

//        echo var_dump($stmt);
    $param_id = $_SESSION["id"];
    $param_subtotal = $subtotal;

    $param_taxes = $taxes;

    $param_shipping = $shipping;
    $param_status = 'In Progress';
    
    $param_shipping_address = $shipping_address["address_line1"].' '.$shipping_address["address_line2"].', '.$shipping_address["city"] . ', ' . $shipping_address["state"] . ' ' . $shipping_address["zipcode"];
    
    var_dump($param_billing_address);
    
    $param_billing_address = $$billing_address["address_line1"].' '.$$billing_address["address_line2"].', '.$$billing_address["city"] . ', ' . $$billing_address["state"] . ' ' . $$billing_address["zipcode"];
    
    var_dump($param_billing_address);

    //var_dump($type);
    //var_dump($param_type);

    $stmt->bindValue(':customers_idcustomers', $param_id, PDO::PARAM_INT);
    $stmt->bindValue(':subtotal', $param_subtotal, PDO::PARAM_INT);
    $stmt->bindValue(':taxes', $param_taxes, PDO::PARAM_INT);
    $stmt->bindValue(':shipping', $param_shipping, PDO::PARAM_INT);
    $stmt->bindValue(':status', $param_status, PDO::PARAM_STR);
    $stmt->bindValue(':shipping_address', $param_shipping_address, PDO::PARAM_STR);
    $stmt->bindValue(':billing_address', $param_billing_address, PDO::PARAM_STR);

//    $stmt->execute();
}
 

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
                    if(isset($_SESSION["shopping_cart"])) {
                            foreach($_SESSION["shopping_cart"] as $id) {
                                $current_product = getproduct($id);
                                echo $current_product["title"]. ' for ' . $current_product["price"] . '<br>' ;
                            }
                        }
                ?>
            </p>
            
            <div style="border-bottom: medium solid darkred; border-top: medium solid darkred; width: 100%;">
            
            <p>Your subtotal is $<?php echo $subtotal ?></p>
            <p>Your taxes are $<?php echo $taxes ?></p>
            <p>Your shipping is $<?php echo $shipping ?></p>
            
            <p>
                Your Total is: $<?php echo $price_total; ?>
            </p>
            
            </div>
            
            <p>
                Your order will be sent to:
                
                <br>
                
                <?php echo htmlspecialchars($_SESSION["fname"]) . ' ' . htmlspecialchars($_SESSION["lname"]) ?>
                
                <br>
                
                <?php echo $shipping_address["address_line1"] . ' ' . $shipping_address["address_line2"] ?>
                
                <br>
                
                <?php echo $shipping_address["city"] . ', ' . $shipping_address["state"] . ' ' . $shipping_address["zipcode"] ?> 
            </p>
            
            <p>
                The billing address is:
                
                <br>
                
                <?php echo htmlspecialchars($_SESSION["fname"]) . ' ' . htmlspecialchars($_SESSION["lname"]) ?>
                
                <br>
                
                <?php echo $billing_address["address_line1"] . ' ' . $billing_address["address_line2"] ?>
                
                <br>
                
                <?php echo $billing_address["city"] . ', ' . $billing_address["state"] . ' ' . $billing_address["zipcode"] ?> 
            </p>
        </div>
        <div style="text-align: center;">
            <a href="prove07.php" class="project-button centered-button">Back to Main Menu</a>
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