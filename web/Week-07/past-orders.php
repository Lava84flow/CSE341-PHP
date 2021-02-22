<?php

// Initialize the session
session_start();

// Include config file
require_once '../shared/dbconnect.php';

$db = get_db();

// Check if the user is logged in, otherwise redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: prove07.php");
    exit;
}

// Prepare a select statement
        $query = 'SELECT * FROM anniesattic.orders o JOIN anniesattic.customers c ON o.customers_idcustomers = c.idcustomers WHERE c.idcustomers = :customerid;';
        $stmt = $db->prepare($query);
//        echo var_dump($stmt);
        
        $param_id = $_SESSION["id"];
        $stmt->bindValue(':customerid', $param_id, PDO::PARAM_STR);
        
        
//        echo var_dump($stmt);
        
        $stmt->execute();
//        echo var_dump($stmt);
        
        $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //echo var_dump($addresses);

?>

<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Project 1 | Past Orders</title>
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
            echo '<h3>Week 07 | Project 1 | Past Orders</h3></span>';
        ?>
    </header>
    </div>
    
    <main>
        <?php 
            if (!empty($orders)) {
                
                echo '
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
                ';
                
                
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
                
                echo '</table>';
                
            } else {
                echo 'You do not have any past orders';
            }
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