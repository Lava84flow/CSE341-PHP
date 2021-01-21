<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Form Results | 03</title>
<link href="team03.css" rel="stylesheet" type="text/css">
</head>
  
    
    <?php
        // First let's process all the input

        // using constants for the names of the elements in the form would be better...

        // It would also be better to use an ID of some sort for the
        // value that is submitted such as "cs" as opposed to "Computer Science",
        // then in PHP we could process that value and determine the exact
        // presentation text to render.
//        $name = htmlspecialchars($_POST["name"]);
//        $email = htmlspecialchars($_POST["email"]);
//        $major = htmlspecialchars($_POST["major"]);
//        $places = $_POST["places"];
//        $comments = htmlspecialchars($_POST["comments"]);

    ?>
    
    <span>Welcome <?php echo $_POST["name"]; ?></span><br>
    
    <br>
    
    <span>Your email address is: <a href="mailto:<?php echo $_POST["email"]; ?>"><?php echo $_POST["email"]; ?></a></span><br>
    
    <br>
    
    <span>Your Major is: <?php echo $_POST["major"]; ?></span><br>
    
    <br>
    
    
    <span>We don't know why this part doesn't work on heroku but it works locally</span><br>
    <span>You Visited: 
        
        <?php
            $con_map = array(
                "NA" => "North America",
                "SA" => "South America",
                "EU" => "Europe",
                "AS" => "Asia",
                "AU" => "Australia",
                "AF" => "Africa",
                "AN" => "Antarctica"
            );
        
        
        if(isset($_POST['continents']))
        {
            foreach($_POST['continents'] as $id)
            {
                echo $con_map[$id].', ';
            }
        }
        ?>
</span>
    <br>
    <br>
    
    <span>Your comment was: <br/><?php echo $_POST["comments"]; ?> </span><br>

<body>
</body>
</html>