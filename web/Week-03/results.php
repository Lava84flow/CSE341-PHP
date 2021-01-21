<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Form Results | 03</title>
<link href="team03.css" rel="stylesheet" type="text/css">
</head>
    
    <span>Welcome <?php echo $_POST["name"]; ?></span><br>
    
    <br>
    
    <span>Your email address is: <a href="mailto:<?php echo $_POST["email"]; ?>"><?php echo $_POST["email"]; ?></a></span><br>
    
    <br>
    
    <span>Your Major is: <?php echo $_POST["major"]; ?></span><br>
    
    <br>
    
    <span>Your comment was: <br/><?php echo $_POST["comments"]; ?> </span><br>

<body>
</body>
</html>