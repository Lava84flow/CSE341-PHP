<?php
/*
require '../shared/dbconnect.php';
$db = get_db();
*/
/*
$query1 = 'SELECT * FROM anniesattic.customers';
$stmt = $db->prepare($query1);
$stmt->execute();
$customers = $stmt->fetchAll(PDO::FETCH_ASSOC);
*/
/*
$query2 = 'SELECT * FROM anniesattic.orders o JOIN anniesattic.customers c ON o.customers_idcustomers = c.idcustomers WHERE c.first_name = \'Mary\'';
$stmt = $db->prepare($query2);
$stmt->execute();
$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
*/

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>PHP Data Access</title>
    
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
            echo '<h3>Week 05 | PHP Data Access</h3></span>';
        ?>    
    </header>
    </div>
    
    <main>
        <p>
            <?php
/*
            foreach ($customers as $customer)
                {
                    $id = $customer['idcustomers'];
                    $fname = $customer['first_name'];
                    $lname = $customer['last_name'];
                    $uname = $customer['username'];
                    $email = $customer['email'];
                    $password = $customer['password'];


                    echo "<p>$id, $fname, $lname, $uname, $email, $password</p>";
                }
*/
            ?>
        </p>
        <p>
            <?php
/*
            foreach ($orders as $order)
                {
                    $id = $order['idorders'];
                    $userid = $order['customers_idcustomers'];
                    $subtotal = $order['subtotal'];
                    $taxes = $order['taxes'];
                    $shipping = $order['shipping'];
                    $status = $order['status'];
                    $shipping = $order['shipping_address'];
                    $billing = $order['billing_address'];


                    echo "<p>$id, $userid, $subtotal, $taxes, $shipping, $status, $shipping, $billing</p>";
                }
*/
            ?>
        </p>
        
        <div>
            <p>
                Search for orders from a customer. Your choices are "Mary" or "John" right now.
            </p>
            
        <form action="orderresults.php" method="post">
            First Name: <input type="text" name="fname">
            <input type=submit value="Search">
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