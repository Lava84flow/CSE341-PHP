<?php

// Initialize the session
session_start();

// Include config file
require_once '../shared/dbconnect.php';
 
// Define variables and initialize with empty values
$line1 = $line2 = $city = $state = $zipcode = $type = "";
$line1_err = $line2_err = $city_err = $state_err = $zipcode_err = $type_err = "";


$db = get_db();

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    
    // Validate Line 1
    if(empty(trim($_POST["line1"]))){
        $line1_err = "Please fill out this line";     
    } else {
        $line1 = trim($_POST["line1"]);
    }
    
    $line2 = trim($_POST["line2"]);
    
   // Validate City
    if(empty(trim($_POST["city"]))){
        $city_err = "Please enter a City";     
    } else {
        $city = trim($_POST["city"]);
    }
    
    // Validate State
    if(empty(trim($_POST["state"]))){
        $state_err = "Please enter a State code";     
    } elseif(strlen(trim($_POST["state"])) != 2) {
        $state_err = "State code must be used";
    } else {
        $state = trim($_POST["state"]);
    }
    
    // Validate Zipcode
    if(empty(trim($_POST["zipcode"]))){
        $zipcode_err = "Please enter a Zipcode.";     
    } elseif(strlen(trim($_POST["zipcode"])) != 5) {
        $zipcode_err = "Zipcode must be 5 digits";
    } else {
        $zipcode = trim($_POST["zipcode"]);
    }
       
    $type = trim($_POST["address_type"]);
    
    // Check input errors before inserting in database
    if(empty($line1_err) && empty($line2_err) && empty($city_err) && empty($state_err) && empty($$zipcode_err) && empty($type_err)){
        
        // Prepare an insert statement
        $query = "INSERT INTO anniesattic.addresses VALUES (DEFAULT, :customers_idcustomers, :address_type, :address_line1, :address_line2, :city, :state, :zipcode);";

        $stmt = $db->prepare($query);
        
//        echo var_dump($stmt);
        $param_id = $_SESSION["id"];
        $param_line1 = $line1;
        
        if(!empty($line2)) {
            $param_line2 = $line2;
        } else {
            $param_line2 = NULL;
        }        
        
        $param_city = $city;
        $param_state = $state;
        $param_zipcode = $zipcode;
        $param_type = $type;
        
        var_dump($type);
        var_dump($param_type);
        
        $stmt->bindValue(':customers_idcustomers', $param_id, PDO::PARAM_INT);
        $stmt->bindValue(':address_type', $param_type, PDO::PARAM_STR);
        $stmt->bindValue(':address_line1', $param_line1, PDO::PARAM_STR);
        $stmt->bindValue(':address_line2', $param_line2, PDO::PARAM_STR);
        $stmt->bindValue(':city', $param_city, PDO::PARAM_STR);
        $stmt->bindValue(':state', $param_state, PDO::PARAM_STR);
        $stmt->bindValue(':zipcode', $param_zipcode, PDO::PARAM_STR);
        
        $stmt->execute();
        
        
    }
    
}

?>


<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Project 1 | Register User</title> 
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
            echo '<h3>Week 07 | Project 1 | Add Address</h3></span>';
        ?>
    </header>
    </div>
    
    <main>
        <p>Please fill this form to add an Address</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            
            <div class="form-group <?php echo (!empty($line1_err)) ? 'has-error' : ''; ?>">
                <label>Address Line 1</label>
                <input type="text" name="line1" class="form-control" value="<?php echo $line1; ?>">
                <span class="help-block"><?php echo $line1_err; ?></span>
            </div>
            
            <div class="form-group <?php echo (!empty($line2_err)) ? 'has-error' : ''; ?>">
                <label>Address Line 2 (Optional)</label>
                <input type="text" name="line2" class="form-control" value="<?php echo $line2; ?>">
                <span class="help-block"><?php echo $line2_err; ?></span>
            </div>
            
            <div class="form-group <?php echo (!empty($city_err)) ? 'has-error' : ''; ?>">
                <label>City</label>
                <input type="text" name="city" class="form-control" value="<?php echo $city; ?>">
                <span class="help-block"><?php echo $city_err; ?></span>
            </div>
            
            <div class="form-group <?php echo (!empty($state_err)) ? 'has-error' : ''; ?>">
                <label>State</label>
                <input type="text" name="state" class="form-control" value="<?php echo $state; ?>">
                <span class="help-block"><?php echo $state_err; ?></span>
            </div>
            
            <div class="form-group <?php echo (!empty($zipcode_err)) ? 'has-error' : ''; ?>">
                <label>Zipcode</label>
                <input type="text" name="zipcode" class="form-control" value="<?php echo $zipcode; ?>">
                <span class="help-block"><?php echo $zipcode_err; ?></span>
            </div>
            
            <div class="form-group <?php echo (!empty($type_err)) ? 'has-error' : ''; ?>">                
                <label>Address Type</label>
                <select name="address_type" style="color: black;">
                    <option value="shipping">Shipping</option>
                    <option value="billing">Billing</option>
                </select> 
                <span class="help-block"><?php echo $type_err; ?></span>
            </div>
            
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <a class="btn btn-link" href="addresses.php">Cancel</a>
            </div>
            
        </form>
    </main>

    <div>
    <footer class="clearfix">
        <?php include '../shared/footer.php'; ?>
    </footer>
    </div>
    </div>

</body>
</html>