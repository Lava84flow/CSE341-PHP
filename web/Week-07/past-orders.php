<?php

// Initialize the session
session_start();

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
                        <th>Delete Address</th>
                      </tr>
                ';
                
                
                foreach ($addresses as $address) {
                    $address_id =       $address['idaddresses'];
                    $type =             $address['address_type'];
                    $address_line1 =    $address['address_line1'];
                    $address_line2 =    $address['address_line2'];
                    $city =             $address['city'];
                    $state =            $address['state'];
                    $zipcode =          $address['zipcode'];
                    
                    
                    
                    echo "<tr><td>$type</td> <td>$address_line1</td> <td>$address_line2</td> <td>$city</td> <td>$state</td> <td>$zipcode</td> <td><a href=\"delete-address.php?ID=$address_id\">Delete</a></td></tr>";
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