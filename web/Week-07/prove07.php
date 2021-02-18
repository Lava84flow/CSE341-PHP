<?php

// Initialize the session
session_start();

?>

<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Project 1</title>
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
            echo '<h3>Week 07 | Project 1</h3></span>';
        ?>
    </header>
    </div>
    
    <main>
        
        <?php 
            // Check if the user is already logged in, if yes then redirect him to welcome page
            if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
                include 'welcome.php'; 
            } else {
                echo '
                    <a href="register.php">New User</a>
                    <br>
                    <a href="login.php">Login</a>
                ';
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