<?php

require '../shared/dbconnect.php';
$db = get_db();

$query = 'SELECT * FROM anniesattic.customers';
$stmt = $db->prepare($query);
$stmt->execute();
$customer = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
        <?php
            foreach ($customer as $user)
            {
                $id = $user['idcustomers'];
                $fname = $user['first_name'];
                $lname = $user['last_name'];
                $uname = $user['username'];
                $email = $user['email'];
                $password = $user['password'];
                
                
                echo "<p>$id, $fname, $lname, $uname, $email, $password</p>";
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