<?php
// Start the session
session_start();

require '../shared/dbconnect.php';
//$db = get_db();
    
$subtotal = $_SESSION["price_subtotal"];

$taxes = floatval($subtotal) * 0.05;

$shipping = 10.00;
    
$price_total = $subtotal + $taxes + $shipping;



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


$orderid = getorderid();

var_dump($orderid);

/*
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION["shopping_cart"])) {
    // Prepare an insert statement
    $query = "INSERT INTO anniesattic.orders VALUES (DEFAULT, :customers_idcustomers, :address_type, :address_line1, :address_line2, :city, :state, :zipcode);";

    $stmt = $db->prepare($query);

//        echo var_dump($stmt);
    $param_id = $_SESSION["id"];
    $param_line1 = $line1;

    $param_line2 = $line2;

    $param_city = $city;
    $param_state = $state;
    $param_zipcode = $zipcode;
    $param_type = $type;

    //var_dump($type);
    //var_dump($param_type);

    $stmt->bindValue(':customers_idcustomers', $param_id, PDO::PARAM_INT);
    $stmt->bindValue(':address_type', $param_type, PDO::PARAM_STR);
    $stmt->bindValue(':address_line1', $param_line1, PDO::PARAM_STR);
    $stmt->bindValue(':address_line2', $param_line2, PDO::PARAM_STR);
    $stmt->bindValue(':city', $param_city, PDO::PARAM_STR);
    $stmt->bindValue(':state', $param_state, PDO::PARAM_STR);
    $stmt->bindValue(':zipcode', $param_zipcode, PDO::PARAM_STR);

    $stmt->execute();
}


*/

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
                <?php $shipping_address = getaddress($_POST['shipping-address']) ?>
                
                <br>
                
                <?php echo htmlspecialchars($_SESSION["fname"]) . ' ' . htmlspecialchars($_SESSION["lname"]) ?>
                
                <br>
                
                <?php echo $shipping_address["address_line1"] . ' ' . $shipping_address["address_line2"] ?>
                
                <br>
                
                <?php echo $shipping_address["city"] . ', ' . $shipping_address["state"] . ' ' . $shipping_address["zipcode"] ?> 
            </p>
            
            <p>
                The billing address is:
                <?php $billing_address = getaddress($_POST['billing-address']) ?>
                
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