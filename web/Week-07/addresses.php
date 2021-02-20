<?php

// Initialize the session
session_start();

// Include config file
require_once '../shared/dbconnect.php';

$db = get_db();

// Prepare a select statement
        $query = 'SELECT address_type, address_line1, address_line2, city, state, zipcode FROM anniesattic.addresses WHERE customers_idcustomers = :customerid;';
        $stmt = $db->prepare($query);
//        echo var_dump($stmt);
        
        $param_id = $_SESSION["id"];
        $stmt->bindValue(':customerid', $param_id, PDO::PARAM_STR);
        
        
//        echo var_dump($stmt);
        
        $stmt->execute();
//        echo var_dump($stmt);
        
        $addresses = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo var_dump($addresses);
        
?>

<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Project 1 | Addresses</title>
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
            echo '<h3>Week 07 | Project 1 | Addresses</h3></span>';
        ?>
    </header>
    </div>
    
    <main>
        
        <div>
        <?php 
            if (!empty($addresses)) {
                
                echo '
                    <table style="width:100%">
                      <tr>
                        <th>Address Type</th>
                        <th>Line 1</th>
                        <th>Line 2</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Zipcode</th>
                      </tr>
                ';
                
                
                foreach ($addresses as $address) {
                    $type =             $address['address_type'];
                    $address_line1 =    $address['address_line1'];
                    $address_line2 =    $address['address_line2'];
                    $city =             $address['city'];
                    $state =            $address['state'];
                    $zipcode =          $address['zipcode'];
                    
                    
                    
                    echo "<tr><td>$type</td> <td>$address_line1</td> <td>$address_line2</td> <td>$city</td> <td>$state</td> <td>$zipcode</td></tr>";
                }
                
                echo '</table>';
                
            } else {
                echo 'You do not have any saved addresses';
            }
        ?>
            
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