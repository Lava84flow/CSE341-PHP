<div style="width: 100%; margin: auto;">
<div class="page-header" style="width: 100%; margin: auto;">
    <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["fname"]); ?> <?php echo htmlspecialchars($_SESSION["lname"]); ?></b>. Welcome to our site.</h1>
    <h2>Your username is: <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b></h2>
</div>

<div style="padding-top: 0.5em; width: 100%; margin: auto;">
    <h3>What would you like to do today?</h3>
    
</div>
    
<div class="centered-button" style="padding-top: 0.5em; width: 100%; margin: auto;">    
    <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
    <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
</div>
    
</div>