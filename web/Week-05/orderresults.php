<?php

require '../shared/dbconnect.php';

$fname = htmlspecialchars($_POST["fname"]);


$db = get_db();

/*
$query1 = 'SELECT * FROM anniesattic.customers';
$stmt = $db->prepare($query1);
$stmt->execute();
$customers = $stmt->fetchAll(PDO::FETCH_ASSOC);
*/

$query = 'SELECT * FROM anniesattic.orders o JOIN anniesattic.customers c ON o.customers_idcustomers = c.idcustomers WHERE c.first_name = \''.$fname.'\'';
$stmt = $db->prepare($query);
$stmt->execute();
$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Orders</title>
    
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
            echo '<h3>Week 05 | Orders</h3></span>';
        ?>    
    </header>
    </div>
    
    <main>
        
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
        
        <table style="width:100%">
  <tr>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Subtotal</th>
    <th>Taxes</th>
    <th>Shipping</th>
    <th>Status</th>
    <th>Shipping Address</th>
    <th>Billing Address</th>
  </tr>
<!--  <tr>
    <td>Jill</td>
    <td>Smith</td>
    <td>50</td>
  </tr>-->
        
        <?php

            foreach ($orders as $order)
                {
                    $fname = $order['first_name'];
                    $lname = $order['last_name'];
                    $subtotal = $order['subtotal'];
                    $taxes = $order['taxes'];
                    $shipping = $order['shipping'];
                    $status = $order['status'];
                    $shippinga = $order['shipping_address'];
                    $billinga = $order['billing_address'];


                    echo "<tr><td>$fname</td> <td>$lname</td> <td>$subtotal</td> <td>$taxes</td> <td>$shipping</td> <td>$status</td> <td>$shippinga</td> <td>$billinga</td></tr>";
                }

            ?>
        </table>
    </main>
        
    <div>
    <footer class="clearfix">
        <?php include '../shared/footer.php'; ?>
    </footer>
    </div>
    </div>
    
</body>
</html>