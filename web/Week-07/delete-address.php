<?php

// Include config file
require_once '../shared/dbconnect.php';

$db = get_db();


if(isset($_GET['ID'])){
    
    $query_delete = 'DELETE FROM anniesattic.addresses WHERE idaddresses = :addressid';
  
    $stmt = $db->prepare($query_delete);
    
    $addressid = $_GET['ID'];
    $stmt->bindValue(':addressid', $$addressid, PDO::PARAM_STR);
    
    $stmt->execute();
 }

header("location: addresses.php");
exit();


?>